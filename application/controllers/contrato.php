<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Contrato extends CI_Controller
{
    var $data = array();

    public function __construct() 
    {
        parent::__construct();
        if(!$this->session->userdata('usuario'))
            redirect('/');
    }

    public function adesao()
    {
        $this->load->model('solucoes_model','solucoes');
        $solucoes = $this->solucoes->get_all();
        $this->data['solucoes'] = $solucoes->result();
        $this->data['col'] = ceil(12 / $solucoes->num_rows());
        $this->load->view('contrato/adesao', $this->data);
    }

    public function ficha($id_solucao=false) 
    {
        if(!$id_solucao){
            redirect('contrato/adesao');
        }
        $this->load->model('agricultores_model','agricultores');
        if($this->input->posts()){
            if($this->agricultores->validar()){
                $dados = $this->input->posts(array('id_solucao' => $id_solucao, 'id_usuario_adesao' => $this->session->userdata('usuario')->id_usuario));
                $this->agricultores->save($dados);
                $this->data['save'] = true;
            }
        }
        $this->load->model('solucoes_model','solucoes');
        $this->data['titulo'] = $this->solucoes->get($id_solucao)->row()->solucao;
        unset($this->agricultores->fields['id_solucao']);
        $this->agricultores->fields['id_usuario_consultor']['from'] = array(
            'model' => 'usuarios',
            'value' => 'nome',
            'join' => array('perfis', 'perfis.id_perfil=usuarios.id_perfil'),
            'where' => array('perfis.nivel' => 1)
        );
        $this->agricultores->fields['id_usuario_consultor']['empty'] = '--Selecione um consultor--';
        $this->data['form'] = $this->agricultores->form();
        $this->load->view('contrato/ficha', $this->data);
    }

    public function listagem() 
    {
        $this->load->model('agricultores_model','agricultores');
        $where['id_usuario_adesao'] = $this->session->userdata('usuario')->id_usuario;
        $this->db->join('solucoes', 'solucoes.id_solucao=agricultores.id_solucao')
                 ->join('usuarios', 'usuarios.id_usuario=agricultores.id_usuario_consultor');

        $this->data['agricultores'] = $this->agricultores->get_where($where)->result();
        $this->load->view('contrato/listagem', $this->data);

    }

    public function detalhes($id_agricultor) 
    {
        $this->load->model('agricultores_model','agricultor');
        $where['id_agricultor'] = $id_agricultor;
        $where['id_usuario_adesao'] = $this->session->userdata('usuario')->id_usuario;
        if($this->input->posts()){
            if($this->agricultor->validar()){
                $set = $this->input->posts();
                $this->agricultor->update($set, $where);
                $this->data['save'] = true;
            }
        }
        $agricultor = $this->agricultor->get_where($where)->row();
        preenche_form($this->agricultor->fields, $agricultor);
        $this->data['form'] = $this->agricultor->form();
        $this->data['titulo'] = 'Detalhes';
        $this->load->view('contrato/ficha', $this->data);
    }
}
