<?php

if (!defined('BASEPATH'))
exit('No direct script access allowed');

class Usuario extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("usuario_model", "usuario");
        $this->load->model("acesso_model", "acesso");
    }

    public function index() {
        $this->acesso->fields['login']['label'] = '';
        $this->acesso->fields['login']['type'] = 'hidden';
        $this->acesso->fields['login']['rules'] = '';
        $this->acesso->fields['senha2'] = array(
            'type' => 'password',
            'label' => 'Confirmar Senha',
            'class' => '',
            'rules' => 'required|matches[senha]',
            'label_class' => 'col-md-4',
            'prepend' => '<div class="col-md-8">',
            'append' => '</div>',

        );
        
        $post = $this->input->posts();

        if (!empty($post)) {
            $this->load->model('Solucao_model','solucoes');

            if ($this->usuario->validar() && $this->acesso->validar()) {


                //verificar se cpf existe
                $dadosUsuario = array(
                        "id_distribuidor" => (trim($post['id_distribuidor']) == "" ? null : $post['id_distribuidor']),
                        "id_regional" => (trim($post['id_regional']) == "" ? null : $post['id_regional']),
                        "cpf" => $post['cpf'],
                        "nome" => $post['nome'],
                        "email" => $post['email'],
                        "telefone" => $post['telefone'],
                        "celular" => $post['celular'],
                        "camiseta" => $post['camiseta'],
                        );


                $usuario = $this->usuario->get_where(array('cpf' => $this->input->post('cpf')))->row();
                if($usuario)
                    $dadosUsuario['id_usuario'] = $usuario->id_usuario;

                $id_usuario = $this->usuario->save($dadosUsuario);              
                $this->load->library('encrypt');

                $dadosAcesso = array(
                        "login" => $post['cpf'],
                        "senha" => $this->encrypt->encode($post['senha']),
                        "ativo" => 0,
                        "id_perfil" => $post['id_perfil'],
                        "id_distribuidor" => (trim($post['id_distribuidor']) == "" ? null : $post['id_distribuidor']),
                        "id_usuario" => $id_usuario,
                        );

                $acesso = $this->acesso->get_where(array('login' => $this->input->post('cpf')))->row();
                if($acesso)
                    $dadosAcesso['id_acesso'] = $acesso->id_acesso;

                $id_acesso = $this->acesso->save($dadosAcesso);

                $solucoes = $this->solucoes->get_all()->result();
                foreach ($solucoes as $solucao) {
                    $acesso_solucao[] = array('id_acesso' => $id_acesso,
                                              'id_solucao' => $solucao->id_solucao
                                             );
                }
                $this->db->insert_batch('acesso_solucao', $acesso_solucao);

                $msg = $this->load->view('emails/cadastro', $post, true);

                $this->load->library('email');
                $this->email->to($post['email']);
                $this->email->from('site@syngenta.com.br');
                $this->email->subject('Cadastro efetuado com sucesso');
                $this->email->message($msg);
                $this->email->send();

                $where_login['acesso.login'] = $this->input->post('cpf');
                $this->usuario->login($where_login, 'usuario');
                $this->session->unset_userdata('cpf');
                $message = 'Prezado '.$dadosUsuario['nome'].', Sua inscrição foi 
                    feita com sucesso. Por favor, memorize sua senha para acesso à 
                    este site. Muito obrigado!';
                $this->session->set_flashdata('message_name',$message);
                redirect('site/');
            }
            foreach ($this->usuario->fields as $key => $item) 
                $this->usuario->fields[$key]['value'] = $this->input->post($key);
            
            foreach ($this->acesso->fields as $key => $item) 
                $this->acesso->fields[$key]['value'] = $this->input->post($key);
            
        }
        $dadosUsuario = $this->usuario->get_where(array('cpf' => $this->session->userdata('cpf')))->row();
        if($dadosUsuario){
            preenche_form($this->usuario->fields, $dadosUsuario);
            $this->usuario->fields['cpf']['value'] = $this->session->userdata('cpf');
        }
            

       
        $this->data["form_acesso"] = $this->acesso->form("id_acesso", "login", "senha", "senha2");
        $this->data["form_acesso_perfil"] = $this->acesso->form("id_perfil");
        $this->data["form"] = $this->usuario->form();
        
        $this->load->view("/site/cadastro_usuario", $this->data);
    }

    function cpf_usuario_existe() {
        $post = $this->input->posts();
        $error = false;
        $this->form_validation->set_message('cpf_usuario_existe', 'o CPF já existe.');


        if ($this->uri->segment(2) == 'editar') {
            //verifica se existe o cpf digitado na base
            $resultado = $this->usuario->get_where(array("id_usuario !=" => $this->session->userdata('usuario')->id_usuario, "cpf" => $post['cpf']))->num_rows();
            if($resultado > 0){
                return false;
            }else{
                return true;
            }
        } else {
            $this->db->join('acesso', 'acesso.id_usuario=usuario.id_usuario');
            $resultado = $this->usuario->get_where(array("cpf" => $post['cpf']))->row();


            if(!empty($resultado))
                return false;
            else
                return true;
        }

    }

    public function lembrete() 
    {
        $this->load->model('usuario_model');
        if ($this->input->posts()) {
            $this->db->join('acesso', 'acesso.id_usuario=usuario.id_usuario');
            $usuario = $this->usuario_model->get_where(array('cpf' => $this->input->post('cpf')))->row();
            echo $this->encrypt->decode($usuario->senha);
            exit();
            if ($usuario) {
                $this->load->library('email');
                $this->load->library('encrypt');
                $this->email->subject('Recurar Senha');
                $this->email->to($usuario->email);
                $this->email->from('site@syngenta.com.br');
                $this->email->message(utf8_decode('Sua senha é: '.$this->encrypt->decode($usuario->senha)));
                exit();
                $this->email->send();
                 echo "<script>alert('Sua senha foi enviada com sucesso!');
                window.location='".base_url()."site';</script>";
                //$this->data['msg'] = 'Sua senha foi enviada para o email: '.$usuario->email;
            }
        }
        $this->data['form'] = $this->usuario_model->form('cpf');
        $this->load->view('site/lembrete', $this->data);
    }

    public function editar() 
    {
        if(!$this->session->userdata('usuario'))
            redirect('/');
        $this->load->library('encrypt');
        $this->acesso->fields['login']['label'] = '';
        $this->acesso->fields['login']['type'] = 'hidden';
        $this->acesso->fields['login']['rules'] = '';
        $this->acesso->fields['senha2'] = array(
            'type' => 'password',
            'label' => 'Confirmar Senha',
            'class' => '',
            'rules' => 'required|matches[senha]',
            'label_class' => 'col-md-2',
            'prepend' => '<div class="col-md-10">',
            'append' => '</div>',
        );
        if($this->input->posts()){
            if($this->usuario->validar() and $this->acesso->validar()){
                $post = $this->input->posts();
                foreach ($this->usuario->fields as $key => $item) {
                    // if($post[$key])
                        $save_usuario[$key] = (empty($post[$key]))?null:$post[$key];
                }
                $save_usuario['id_usuario'] = $this->session->userdata('usuario')->id_usuario;
                $this->usuario->save($save_usuario);
                $dadosAcesso = array(
                        "login" => $post['cpf'],
                        "senha" => $this->encrypt->encode($post['senha']),
                        "ativo" => 1,
                        "id_perfil" => $post['id_perfil'],
                        "id_distribuidor" => (trim($post['id_distribuidor']) == "" ? null : $post['id_distribuidor']),
                        );
                $this->acesso->update($dadosAcesso, array('id_usuario' => $this->session->userdata('usuario')->id_usuario));
            }
        }
        $usuario = $this->usuario->get($this->session->userdata('usuario')->id_usuario)->row();
        preenche_form($this->usuario->fields, $usuario);
        $this->data['form'] = $this->usuario->form();
        $acesso = $this->acesso->get_where(array('id_usuario' => $this->session->userdata('usuario')->id_usuario))->row();
        preenche_form($this->acesso->fields, $acesso);
        $this->data["form_acesso"] = $this->acesso->form("id_acesso", "login", "senha", "senha2");
        $this->data["form_acesso_perfil"] = $this->acesso->form("id_perfil");
        $this->load->view('site/cadastro_usuario', $this->data);
    }

}
