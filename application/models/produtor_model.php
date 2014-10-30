<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Produtor_model extends MY_Model
{
  var $id_col = 'id_produtor';

  var $fields = array(
//    'id_solucao' => array(
//      'type' => 'select',
//      'label' => 'Solução',
//      'rules' => 'required',
//      'label_class' => 'col-md-2',
//      'prepend' => '<div class="col-md-10">',
//      'append' => '</div>',
//      'values' => array(),
//      'class' => '',
//      'from' => array(
//            'model' => 'solucoes', 
//            'value' => 'solucao', 
//      )
//    ),

//    'id_usuario_consultor' => array(
//      'type' => 'select',
//      'label' => 'Consultor',
//      'rules' => 'required',
//      'class' => '',
//      'label_class' => 'col-md-2',
//      'prepend' => '<div class="col-md-10">',
//      'append' => '</div>',
//      'values' => array(),
//      'empty' => '--Selecione uma Solução--',
//      'from' => array(
//        'model' => 'usuarios', 
//        'value' => 'nome', 
//        'join' => array('perfis', 'perfis.id_perfil=usuarios.id_perfil'),
//        'where' => array('perfis.nivel' => 1)
//      )
//    ),
      
      'id_usuario_consultor' => array(
        'type' => 'select',
        'label' => 'Consultor',
        'class' => '',
        'rules' => 'required',
        'label_class' => 'col-md-4',
        'prepend' => '<div class="col-md-8">',
        'append' => '</div>',
        'values' => array(),
        'from' => array(
            'model' => 'usuario', 
            'value' => 'nome',
            'join' => array("acesso", "acesso.id_usuario = usuario.id_usuario"),
            'where' => array("acesso.id_perfil" => "2")
            )
      ), 
      'id_usuario_rtv' => array(
        'type' => 'select',
        'label' => 'RTV Principal',
        'class' => '',
        'rules' => 'required',
        'label_class' => 'col-md-4',
        'prepend' => '<div class="col-md-8">',
        'append' => '</div>',
        'values' => array(),
        'from' => array(
            'model' => 'usuario', 
            'value' => 'nome',
            'join' => array("acesso", "acesso.id_usuario = usuario.id_usuario"),
            'where' => array("acesso.id_perfil" => "4")
            )
      ),
      'id_usuario_rtv_auxiliar' => array(
        'type' => 'select',
        'label' => 'RTV Secundario (opcional)',
        'class' => '',
        'rules' => '',
        'label_class' => 'col-md-4',
        'prepend' => '<div class="col-md-8">',
        'append' => '</div>',
        'values' => array(),
         'empty' => '-- Tenho apenas o RTV Principal --',
       'from' => array(
            'model' => 'usuario', 
            'value' => 'nome',
            'join' => array("acesso", "acesso.id_usuario = usuario.id_usuario"),
            'where' => array("acesso.id_perfil" => "4")
            )
      ),
    'id_categoria' => array(
      'type' => 'select',
      'label' => 'Categoria',
      'class' => '',
      'rules' => 'required',
      'label_class' => 'col-md-4',
      'prepend' => '<div class="col-md-8">',
      'append' => '</div>',
      'values' => array(),
      'from' => array('model' => 'categoria', 'value' => 'categoria')
    ),
     
    'produtor' => array(
      'type' => 'text',
      'label' => 'Nome do produtor',
      'class' => '',
      'rules' => 'required',
      'label_class' => 'col-md-4',
      'prepend' => '<div class="col-md-8">',
      'append' => '</div>'
    ),
    'email_produtor' => array(
      'type' => 'text',
      'class' => '',
      'label' => 'Email do produtor',
      'rules' => 'required|valid_email',
      'label_class' => 'col-md-4',
      'prepend' => '<div class="col-md-8">',
      'append' => '</div>'
    ),
    'cpf_produtor' => array(
      'type' => 'text',
      'label' => 'CPF do produtor',
      'class' => '',
      'rules' => 'required|valid_cpf|callback_cpf_produtor_existe',
      'label_class' => 'col-md-4',
      'prepend' => '<div class="col-md-8">',
      'append' => '</div>'
    ),
    'rg_produtor' => array(
      'type' => 'text',
      'label' => 'RG do produtor',
      'class' => '',
      'rules' => 'required',
      'label_class' => 'col-md-4',
      'prepend' => '<div class="col-md-8">',
      'append' => '</div>'
    ),
    'camiseta_produtor' => array(
      'type' => 'select',
      'label' => 'Tamanho da camiseta do produtor',
      'class' => '',
      'rules' => 'required',
      'label_class' => 'col-md-4',
      'prepend' => '<div class="col-md-8">',
      'append' => '</div>',
      'from' => array('model' => 'tamanho', 'value' => 'tamanho')
    ),
      'esposa' => array(
      'type' => 'text',
      'label' => 'Nome da esposa',
      'class' => '',
      'rules' => '',
      'label_class' => 'col-md-4',
      'prepend' => '<div class="col-md-8">',
      'append' => '</div>'
    ),
    'email_esposa' => array(
      'type' => 'text',
      'class' => '',
      'label' => 'Email da esposa',
      'rules' => 'valid_email',
      'label_class' => 'col-md-4',
      'prepend' => '<div class="col-md-8">',
      'append' => '</div>'
    ),
    'cpf_esposa' => array(
      'type' => 'text',
      'label' => 'CPF da esposa',
      'class' => '',
      'rules' => 'valid_cpf',
      'label_class' => 'col-md-4',
      'prepend' => '<div class="col-md-8">',
      'append' => '</div>'
    ),
    'rg_esposa' => array(
      'type' => 'text',
      'label' => 'RG da esposa',
      'class' => '',
      'rules' => '',
      'label_class' => 'col-md-4',
      'prepend' => '<div class="col-md-8">',
      'append' => '</div>'
    ),
    'camiseta_esposa' => array(
      'type' => 'select',
      'label' => 'Tamanho da camiseta da esposa',
      'class' => '',
      'rules' => '',
      'label_class' => 'col-md-4',
      'prepend' => '<div class="col-md-8">',
      'append' => '</div>',
      'from' => array('model' => 'tamanho', 'value' => 'tamanho')
    ),
    'telefone' => array(
        'type' => 'text',
        'label' => 'Telefone',
        'class' => '',
        'rules' => 'required',
        'label_class' => 'col-md-4',
        'prepend' => '<div class="col-md-8">',
        'append' => '</div>'
    ),
    'celular' => array(
        'type' => 'text',
        'label' => 'Celular',
        'class' => '',
        'rules' => 'required',
        'label_class' => 'col-md-4',
        'prepend' => '<div class="col-md-8">',
        'append' => '</div>'
    ),
    
    'cep' => array(
      'type' => 'text',
      'label' => 'CEP',
      'class' => '',
      'rules' => 'required',
      'label_class' => 'col-md-4',
      'prepend' => '<div class="col-md-8">',
      'append' => '</div>'
    ),
      
    'endereco' => array(
      'type' => 'text',
      'label' => 'Endereço',
      'class' => '',
      'rules' => 'required',
      'label_class' => 'col-md-4',
      'prepend' => '<div class="col-md-8">',
      'append' => '</div>'
    ),
    'numero' => array(
      'type' => 'text',
      'label' => 'Número',
      'class' => '',
      'rules' => '',
      'label_class' => 'col-md-4',
      'prepend' => '<div class="col-md-8">',
      'append' => '</div>'
    ),
    'complemento' => array(
      'type' => 'text',
      'label' => 'Complemento',
      'rules' => '',
      'class' => '',
      'label_class' => 'col-md-4',
      'prepend' => '<div class="col-md-8">',
      'append' => '</div>'
    ),
    'bairro' => array(
      'type' => 'text',
      'label' => 'Bairro',
      'class' => '',
      'rules' => 'required',
      'label_class' => 'col-md-4',
      'prepend' => '<div class="col-md-8">',
      'append' => '</div>'
    ),
    'cidade' => array(
      'type' => 'text',
      'label' => 'Cidade',
      'class' => '',
      'rules' => 'required',
      'label_class' => 'col-md-4',
      'prepend' => '<div class="col-md-8">',
      'append' => '</div>'
    ),
    /*'estado' => array(
      'type' => 'text',
      'label' => 'Estado',
      'class' => '',
      'rules' => 'required',
      'label_class' => 'col-md-4',
      'prepend' => '<div class="col-md-8">',
      'append' => '</div>'
    )*/

    'estado' => array(
            'type' => 'select',
            'label' => 'Estado',
            'rules' => '',
            'label_class' => 'col-md-4',
            'prepend' => '<div class="col-md-8">',
            'append' => '</div>',
            'empty' => 'Estado',
            'values' => array(
              ''=>'Selecione',
              'AC'=>'AC',
              'AL'=>'AL',
              'AP'=>'AP',
              'AM'=>'AM',
              'BA'=>'BA',
              'CE'=>'CE',
              'DF'=>'DF',
              'ES'=>'ES',
              'GO'=>'GO',
              'MA'=>'MA',
              'MT'=>'MT',
              'MS'=>'MS',
              'MG'=>'MG',
              'PA'=>'PA',
              'PB'=>'PB',
              'PR'=>'PR',
              'PE'=>'PE',
              'PI'=>'PI',
              'RJ'=>'RJ',
              'RN'=>'RN',
              'RS'=>'RS',
              'RO'=>'RO',
              'RR'=>'RR',
              'SC'=>'SC',
              'SP'=>'SP',
              'SE'=>'SE',
              'TO'=>'TO'
              ),
            'extra' => array('required' => 'required'),
            'empty' => 'Estado',
      
        ),
      );
  var $csv_data = array();
    
    function buscarProdutorPorId($id_produtor){
        $where = array(
            "id_produtor" => $id_produtor
        );
          $join = array(
            "categoria" => "categoria.id_categoria = produtor.id_categoria",
              
            "tamanho tamanho_esposa" => "tamanho_esposa.id_tamanho = produtor.camiseta_esposa",
            "tamanho tamanho_produtor" => "tamanho_produtor.id_tamanho = produtor.camiseta_produtor",
              
            "usuario as usuario_consultor" => array("usuario_consultor.id_usuario = produtor.id_usuario_consultor","left"),
            "usuario as usuario_rtv" => array("usuario_rtv.id_usuario = produtor.id_usuario_rtv","left"),
            "usuario as usuario_rtv_auxiliar" => array("usuario_rtv_auxiliar.id_usuario = produtor.id_usuario_rtv_auxiliar","left"),
            );
        $campos = "
            produtor.*,
            categoria.*,
            usuario_consultor.nome as usuario_consultor_nome,
            usuario_rtv.nome as usuario_rtv_nome,
            usuario_rtv_auxiliar.nome as usuario_rtv_auxiliar_nome,
            produtor.telefone as produtor_telefone,
            produtor.celular as produtor_celular,
            tamanho_esposa.tamanho as esposa_camiseta,
            tamanho_produtor.tamanho as produtor_camiseta
            ";       
        $resultado = $this->search($where,1,1,$campos,$join);
        return $resultado['resultados'][0];
    }

    public function report($filtros) 
    {
      $id_perfil = $this->session->userdata('usuario')->id_perfil;
      $this->db->select('
                          produtor.*,
                          tamanho.*,
                          consultor.nome as consultorName,
                          consultor.cpf as consultorCpf,
                          distribuidor.razao_social,
                          rtv.nome as rtvName,
                          categoria.categoria,
                          regional.codigo_regional,
                          regional.filial,
                          cultura.cultura
                        ')
                ->join('categoria','categoria.id_categoria=produtor.id_categoria')
                ->join('usuario as consultor', 'consultor.id_usuario=produtor.id_usuario_consultor')
                ->join('usuario as rtv', 'rtv.id_usuario=produtor.id_usuario_rtv OR rtv.id_usuario=produtor.id_usuario_rtv_auxiliar')
                ->join('adesao','adesao.id_produtor=produtor.id_produtor','left')
                ->join('tamanho','tamanho.id_tamanho=produtor.camiseta_produtor')
                ->join('cultura', 'cultura.id_cultura=adesao.id_cultura','left')
                ->join('regional','regional.id_regional=consultor.id_regional or regional.id_regional=rtv.id_regional')
                ->join('distribuidor','distribuidor.id_distribuidor=consultor.id_distribuidor','left')
                ->group_by('produtor.id_produtor');

      if(isset($filtros['id_perfil'])){
        foreach ($filtros['id_perfil'] as $id_perfil => $id_usuario) {
          if($id_usuario){
            if($id_perfil == 2){
              $this->db->where('produtor.id_usuario_consultor', $id_usuario);
            }
            if($id_perfil == 4){
              $this->db->where('( produtor.id_usuario_rtv = ', $id_usuario)
                       ->or_where('produtor.id_usuario_rtv_auxiliar', $id_usuario);
              $this->db->ar_where[] = ')';
            }
          }
        }
        unset($filtros['id_perfil']);     
      }
      foreach ($filtros as $filtro => $valor) {
        if($filtro){
          if($valor){
            $col = (strstr($filtro, '.') ? $filtro : 'produtor.'.$filtro);
            $this->db->where($col, $valor);
          }
        }
      }
      switch ($id_perfil) {
        case 2:
          $this->db->where('consultor.id_usuario',$this->session->userdata('usuario')->id_usuario);
        break;
        case 3:
          $this->db->where('consultor.id_distribuidor',$this->session->userdata('usuario')->id_distribuidor);
        break;
        case 4:
          $this->db->where('rtv.id_usuario',$this->session->userdata('usuario')->id_usuario);
        break;
        case 5:
          if (!empty($this->session->userdata('usuario')->cultura)) 
            $this->db->where('adesao.id_cultura',$this->session->userdata('usuario')->id_cultura);
        break;
        case 10:
          if (!empty($this->session->userdata('usuario')->filial)) 
            $this->db->where('regional.filial',$this->session->userdata('usuario')->filial);
        break;
        case 11:
          if (!empty($this->session->userdata('usuario')->codigo_regional)) 
            $this->db->where('regional.codigo_regional',$this->session->userdata('usuario')->codigo_regional);
        break;
      }
      $resultado = $this->get_all();
      $total = $resultado->num_rows;
      $resultado = $resultado->result();
      $resultado = $this->createCsv($resultado);
      $this->load->model('session_infos_model','session_infos');
      $set = array('dados'=>serialize($resultado));
      ($this->session->userdata('id_session_info'))?$set['id_session_info'] = $this->session->userdata('id_session_info'):''; 
      $id_session_info = $this->session_infos->save($set);
      $this->session->set_userdata('id_session_info',$id_session_info);


      $result['total'] = $total;
      return $result;
    }
    public function createCsv($adesao_relatorio)
    {      
      $cabecalho = array(
                          'Consultor CPF','Consultor','Distribuidor','RTV','Categoria' ,'Filial','Regional',
                          'Cultura', 'Nome do Agricultor:','RG','CPF','Email','Camiseta Agricultor','Telefone',
                          'Celular','Endereço','Número','Complemento','CEP','Bairro','Cidade','Estado','Data',
                          'Esposa do Agricultor:','CPF Esposa','RG Esposa','Email Esposa'
                        );
      $csv_data[] = implode(';',$cabecalho);
     foreach ($adesao_relatorio as $item) {
        $row = array($item->consultorCpf,$item->consultorName,$item->razao_social,$item->rtvName,$item->categoria,
                     $item->filial,$item->codigo_regional,$item->cultura, $item->produtor,$item->rg_produtor,
                     $item->cpf_produtor,$item->email_produtor,$item->tamanho,$item->telefone, $item->celular,
                     $item->endereco,$item->numero,$item->complemento,$item->cep,$item->bairro,$item->cidade,
                     $item->estado,formata_data($item->data),$item->esposa,$item->cpf_esposa,$item->rg_esposa,
                     $item->email_esposa);
        $csv_data[] = implode(';', $row);
      }
      return $csv_data;
    }
}
