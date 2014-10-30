<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Auth extends CI_Controller
{
    var $data = array();
    public function __construct() 
    {
        parent::__construct();
    }

    public function index() 
    {
        if($this->session->userdata('admin'))
            redirect('painel');
        else
            redirect('auth/login');
    }

    public function login() 
    {
        $this->load->model('usuario_model','usuarios');
        if($this->input->posts()){
            $where['login'] = $this->input->post('login');
            if($this->usuarios->login($where, 'admin')){
                redirect('painel');
            }else{
                $this->data['erro'] = 'Login ou senha Inválidos';
            }
        }
        $this->load->view('login', $this->data);
    }

    public function sair() {
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}
