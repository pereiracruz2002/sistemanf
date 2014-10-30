<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Usuario_model extends MY_Model {

    var $id_col = 'id_usuario';
    var $fields = array(
        'cpf' => array(
            'type' => 'text',
            'label' => 'CPF',
            'rules' => 'required|valid_cpf|callback_cpf_usuario_existe',
            'label_class' => 'col-md-4',
            'prepend' => '<div class="col-md-8">',
            'append' => '</div>',
            'extra' => array('required' => 'required')
        ),
//        'id_solucao' => array(
//            'type' => 'select',
//            'label' => 'Solução (opcional)',
//            'rules' => '',
//            'label_class' => 'col-md-4',
//            'prepend' => '<div class="col-md-8">',
//            'append' => '</div>',
//            'values' => array(),
//            'empty' => '--Nenhum --',
//            'from' => array('model' => 'solucao', 'value' => 'solucao')
//        ),
        'id_distribuidor' => array(
            'type' => 'select',
            'label' => 'Selecione Canal/Distribuidor',
            'label_class' => 'col-md-4',
            'prepend' => '<div class="col-md-8">',
            'append' => '</div>',
            'values' => array(),
            'empty' => 'Distribuidor/Canal',
            'from' => array('model' => 'distribuidor', 'value' => 'distribuidor_nome','order'=>'razao_social',
            'select'=> "concat(razao_social, ' (CNPJ: ', cnpj, ')') as distribuidor_nome, id_distribuidor")
        ),
        /*
        'id_regional' => array(
            'type' => 'select',
            'label' => 'Selecione Unidade/Filial/Regional ou Cultura',
            'rules' => '',
            'label_class' => 'col-md-4',
            'prepend' => '<div class="col-md-8">',
            'append' => '</div>',
            'values' => array(),
            'extra' => array('required' => 'required'),
            'empty' => 'Unidade / Filial / Regional / Cultura',
            'from' => array(
                        'model' => 'Regional', 
                        'value' => 'regional_nome',
                        'select' =>"
                                        concat(
                                                unidade.nome,
                                               ' / ',regional.codigo_regional, 
                                               ' / ',regional.filial,
                                               ' / ',cultura.cultura
                                               ) 
                                    as regional_nome, regional.id_regional",
                        'join' => array(
                                    'unidade', 'unidade.id_unidade=regional.id_unidade',
                                    'cultura', 'cultura.id_cultura=regional.id_cultura',
                                ),
                        )


        ),*/
         'id_regional' => array(
            'type' => 'select',
            'label' => 'Selecione Unidade/Filial/Regional ou Cultura',
            'label_class' => 'col-md-4',
            'prepend' => '<div class="col-md-8">',
            'append' => '</div>',
            'values' => array(),
            'extra' => array(),
            'empty' => 'Unidade / Filial / Regional / Cultura',
            'from' => array(
                        'model' => 'Regional', 
                        'value' => 'regional_nome',
                        'select' =>"
                                        concat(
                                                regional.unidade,
                                               ' / ',regional.filial, 
                                               ' / ',regional.codigo_regional,
                                               ' / ',regional.cultura
                                               ) 
                                    as regional_nome, regional.id_regional",
                       
                        )


        ),
        'nome' => array(
            'type' => 'text',
            'label' => 'Nome',
            'rules' => 'required',
            'label_class' => 'col-md-4',
            'prepend' => '<div class="col-md-8">',
            'append' => '</div>',
            'extra' => array('required' => 'required')
        ),
        'email' => array(
            'type' => 'text',
            'label' => 'Email',
            'rules' => 'required|valid_email',
            'label_class' => 'col-md-4',
            'prepend' => '<div class="col-md-8">',
            'append' => '</div>',
            'extra' => array('required' => 'required')
        ),
        'telefone' => array(
            'type' => 'text',
            'label' => 'Telefone',
            'rules' => 'required',
            'label_class' => 'col-md-4',
            'prepend' => '<div class="col-md-8">',
            'append' => '</div>',
            'extra' => array('required' => 'required')
        ),
        'celular' => array(
            'type' => 'text',
            'label' => 'Celular',
            'rules' => 'required',
            'label_class' => 'col-md-4',
            'prepend' => '<div class="col-md-8">',
            'append' => '</div>',
            'extra' => array('required' => 'required')
        ),
        'camiseta' => array(
            'type' => 'select',
            'label' => 'Camiseta',
            'rules' => 'required',
            'label_class' => 'col-md-4',
            'prepend' => '<div class="col-md-8">',
            'append' => '</div>',
            'extra' => array('required' => 'required'),           
      'from' => array('model' => 'tamanho', 'value' => 'tamanho')
        ),
    );
  var $csv_data = array();

    public function _filter_pre_save(&$data) {
//        if ($data['senha']) {
//            $this->load->library('encrypt');
//            $data['senha'] = $this->encrypt->encode($data['senha']);
//        }
    }

    public function login($where, $sessao) {
        $this->load->library('encrypt');
        $this->db->join('acesso', 'acesso.id_usuario=usuario.id_usuario');
        $this->db->join('perfil', 'perfil.id_perfil=acesso.id_perfil');
        if($sessao == 'usuario'){
            $this->db->join('acesso_solucao', 'acesso_solucao.id_acesso=acesso.id_acesso');
            $this->db->join('regional','regional.id_regional=usuario.id_regional','left');
            $this->db->where('acesso.senha is not null', null, false);
            $dados_usuario = $this->get_where($where)->result();
            if($dados_usuario){
                foreach ($dados_usuario as $item) {
                    if(!isset($usuario))
                        $usuario = $item;
                    $usuario->solucoes[] = $item->id_solucao;
                }
                unset($usuario->id_solucao);
            } else {
                $usuario = false;
            }
        } else {
            $usuario = $this->get_where($where)->row();
        }

        if ($usuario and ($this->encrypt->decode($usuario->senha) == $this->input->post('senha'))) {
            unset($usuario->senha);
            $this->session->set_userdata($sessao, $usuario);
            return true;
        } else {
            return false;
        }
    }

    public function getFromSolucao($id_solucao, $select = false) {
        $where['usuarios.id_solucao'] = $id_solucao;
        $where['perfis.nivel'] = 1;
        if ($select)
            $this->db->select($select);
        $this->db->join('perfis', 'perfis.id_perfil=usuarios.id_perfil');
        return $this->get_where($where)->result();
    }

    public function getCanRegister() 
    {
        $perfis = array();
        $where['perfil.can_register'] = 1;
        $this->db->select('usuario.id_usuario,
                           usuario.nome,
                           perfil.id_perfil,
                           perfil.perfil
                          ')
                 ->join('acesso', 'acesso.id_usuario=usuario.id_usuario')
                 ->join('perfil', 'perfil.id_perfil=acesso.id_perfil');
        $usuarios = $this->get_where($where)->result();
        foreach ($usuarios as $item) {
            $perfis[$item->id_perfil]['id_perfil'] = $item->id_perfil;
            $perfis[$item->id_perfil]['perfil'] = $item->perfil;
            $perfis[$item->id_perfil]['usuarios'][] = $item;
        }
        return $perfis;
    }

    public function report($filtros) 
    {
        $cabecalho = array('Nome','CPF','Email', 'Telefone','Celular','Tamanho', 'Perfil');
        $this->db->select('usuario.*,perfil.perfil,tamanho.tamanho')
                 ->join('acesso', 'acesso.id_usuario=usuario.id_usuario')
                 ->join('perfil', 'perfil.id_perfil=acesso.id_perfil')
                 ->join('tamanho','tamanho.id_tamanho=usuario.camiseta')
                 ->join('distribuidor','distribuidor.id_distribuidor=usuario.id_distribuidor','left');
        foreach ($filtros as $filtro => $valor) {
            if($filtro){
                if($valor){
                    $col = (strstr($filtro, '.') ? $filtro : 'usuario.'.$filtro);
                    $this->db->where($col, $valor);
                }
            }
        }
        if($this->session->userdata('usuario')->id_distribuidor and $this->session->userdata('usuario')->id_perfil==3)
        {
            $this->db->where('acesso.id_distribuidor',$this->session->userdata('usuario')->id_distribuidor);  
        }
        if($this->session->userdata('usuario')->id_regional and ($this->session->userdata('usuario')->id_perfil==5 or $this->session->userdata('usuario')->id_perfil==11 ) ){
          $this->db->where('usuario.id_regional',$this->session->userdata('usuario')->id_regional); 
        }
        if($this->session->userdata('usuario')->id_regional and $this->session->userdata('usuario')->id_perfil==10  ){
            $this->db->join('regional','regional.id_regional=usuario.id_regional');
            $this->db->where('regional.filial',$this->session->userdata('usuario')->filial); 
        }
        $cabecalho[] = 'Distribuidor';          
        if ($this->session->userdata('usuario')->id_perfil==12) {
            $this->db->select('regional.codigo_regional,distribuidor.razao_social')
                     ->join('regional','regional.id_regional=usuario.id_regional','left');
            $cabecalho[] = 'Área';          
        }
        if ($this->session->userdata('usuario')->id_distribuidor) {
            $this->db->select('distribuidor.razao_social');
            $this->db->where('acesso.id_distribuidor',$this->session->userdata('usuario')->id_distribuidor);   
        }
        $resultado = $this->get_all()->result();
        $this->load->library('table', array(), 'lib_table');
        
        $this->lib_table->set_heading($cabecalho);
        $this->csv_data[] = implode(';',$cabecalho);
        foreach ($resultado as $item) {
            $row = array($item->nome,$item->cpf,$item->email, $item->telefone,$item->celular,$item->tamanho,$item->perfil);
            $row[] = $item->razao_social;
            if($this->session->userdata('usuario')->id_perfil==12){
                $row[] = $item->codigo_regional;
            };
            ($this->session->userdata('usuario')->id_distribuidor)?$row[] = $item->razao_social:$row;
            $this->lib_table->add_row($row);
            $this->csv_data[] = implode(';', $row);
        }
        if($this->uri->segment(3))
            return $this->csv_data;
        else
            return $this->lib_table->generate();
    }


}
