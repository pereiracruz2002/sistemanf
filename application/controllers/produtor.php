<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Produtor extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("produtor_model", "produtor");
    }

    function cpf_produtor_existe() {
        $post = $this->input->posts();
        $error = false;
        $this->form_validation->set_message('cpf_produtor_existe', 'o %s CPF já existe.');

        if (isset($post['id_produtor'])) {
            //verifica se existe o cpf digitado na base
            $resultado = $this->produtor->get_where(array("id_produtor !=" => $post['id_usuario'], "OR cpf_produtor" => $post['cpf_produtor']));
//            $error = ($resultado->num_rows == 0);
            exit;
        } else {
            $resultado = $this->produtor->get_where(array("cpf_produtor" => $post['cpf_produtor']));
            $error = ($resultado->num_rows == 0);
        }

        return $error;
    }

    function index() 
    {
        $where = array();
        //verificar se o cara que tá logado é RTV ou consultor
         if ($this->session->userdata("usuario")) {
            if ($this->session->userdata("usuario")->id_perfil == 4) { //RTV
                $where['id_usuario_rtv'] = $this->session->userdata("usuario")->id_usuario;
                $where['OR id_usuario_rtv_auxiliar'] = $this->session->userdata("usuario")->id_usuario;
            } else if ($this->session->userdata("usuario")->id_perfil == 2) { //CONSULTOR
                $where['id_usuario_consultor'] = $this->session->userdata("usuario")->id_usuario;             
            }
         }
        $produtores = $this->produtor->get_where($where);
        $this->data['produtores'] = $produtores->result();

        $this->load->model('solucao_model','solucoes');
        $this->data['solucoes'] = $this->solucoes->get_all()->result();
        $this->load->view("/site/listar_produtor.php", $this->data);
        
    }

    public function lista() 
    {
        $where = array();
        //verificar se o cara que tá logado é RTV ou consultor
         if ($this->session->userdata("usuario")) {
            if ($this->session->userdata("usuario")->id_perfil == 4) { //RTV
                $where['id_usuario_rtv'] = $this->session->userdata("usuario")->id_usuario;
                $where['OR id_usuario_rtv_auxiliar'] = $this->session->userdata("usuario")->id_usuario;
            } else if ($this->session->userdata("usuario")->id_perfil == 2) { //CONSULTOR
                $where['id_usuario_consultor'] = $this->session->userdata("usuario")->id_usuario;             
            }
         }
        $produtores = $this->produtor->get_where($where);
        $this->data['produtores'] = $produtores->result();

        $this->load->model('solucao_model','solucoes');
        $this->data['solucoes'] = $this->solucoes->get_all()->result();
       
        $this->load->view("/site/listar_produtor.php", $this->data);

    }

    function cadastrar($cadastro=false) {

        $post = $this->input->posts();

        if (!empty($post)) {

            if ($this->produtor->validar()) {

                $post['id_usuario_consultor'] = ($post['id_usuario_consultor'] != null ? $post['id_usuario_consultor'] : null);
                $post['id_usuario_rtv'] = ($post['id_usuario_rtv'] != null ? $post['id_usuario_rtv'] : null);
                $post['id_usuario_rtv_auxiliar'] = ($post['id_usuario_rtv_auxiliar'] != null ? $post['id_usuario_rtv_auxiliar'] : null);

                $this->db->trans_start();
                $this->data['id_produtor'] = $this->produtor->save($post);
                $this->db->trans_complete();

            }else{
                foreach ($this->produtor->fields as $key => $item) 
                    $this->produtor->fields[$key]['value'] = $this->input->post($key);

            }
        }
        if ($this->session->userdata("usuario")) {
            if ($this->session->userdata("usuario")->id_perfil == 4) { //RTV
                //seleciona o primeiro RTV
                $this->produtor->fields['id_usuario_rtv']['value'] = $this->session->userdata("usuario")->id_usuario;
                $this->produtor->fields['id_usuario_rtv_auxiliar']['from']['where']['usuario.id_usuario !='] = $this->session->userdata("usuario")->id_usuario;
                $this->produtor->fields['id_usuario_rtv']['readonly'] = 'readonly';
            } else if ($this->session->userdata("usuario")->id_perfil == 2) { //CONSULTOR
                //seleciona o primeiro Consultor
                $this->produtor->fields['id_usuario_consultor']['from']['where']['acesso.id_usuario'] = $this->session->userdata("usuario")->id_usuario;
                $this->produtor->fields['id_usuario_consultor']['value'] = $this->session->userdata("usuario")->id_usuario;
                $this->produtor->fields['id_usuario_consultor']['readonly'] = 'readonly';
            }
        }

        $this->data["form"] = $this->produtor->form();
//            exit;

        $this->load->view("/site/cadastro_produtor", $this->data);
    }

    public function editar($id_produtor) 
    {
        if($this->input->posts()){
            $dados = $this->input->posts();
            $dados['id_produtor'] = $id_produtor;
            $this->produtor->save($dados);
        }
        $produtor = $this->produtor->get($id_produtor)->row();
        preenche_form($this->produtor->fields, $produtor);
        $this->data['form'] = $this->produtor->form();
        $this->load->view('site/alterar_cadastro', $this->data);
    }

}
