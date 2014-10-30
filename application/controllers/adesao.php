<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Adesao extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("adesao_model", "adesao");
        $this->load->model("produtor_model", "produtor");
    }

    public function index() 
    {
        $this->load->model('solucao_model', 'solucao');
        $this->load->model('cultura_model', 'cultura');
        if($this->input->posts()){
            $filtros = $this->input->posts();
            if($filtros['cpf_produtor']){
                $filtros['produtor.cpf_produtor'] = $filtros['cpf_produtor'];
                unset($filtros['cpf_produtor']);
            }
        }
        $filtros['id_perfil'][$this->session->userdata('usuario')->id_perfil] = $this->session->userdata('usuario')->id_usuario;
        $this->data['resultado'] = $this->adesao->report($filtros);
        $this->data['solucoes'] = $this->solucao->get_all()->result();
        $this->data['culturas'] = $this->cultura->get_all()->result();
        $this->load->view('site/adesoes', $this->data);
    }

    function listar($id_produtor = null) 
    {
        $produtor = $this->validarAcesso($id_produtor);
        $this->produtor->fields['data'] = array('label' => 'Data de Cadastro', 'class' => 'date_time', 'type' => 'text');
        $this->produtor->fields['categoria'] = array('label' => 'Categoria', 'class' => '', 'type' => 'text');
        $this->produtor->fields['usuario_consultor_nome'] = array('label' => 'Consultor', 'class' => '', 'type' => 'text');
        $this->produtor->fields['usuario_rtv_nome'] = array('label' => 'RTV', 'class' => '', 'type' => 'text');
        $this->produtor->fields['usuario_rtv_auxiliar_nome'] = array('label' => 'RTV Auxiliar', 'class' => '', 'type' => 'text');
        $this->produtor->fields['esposa_camiseta'] = array('label' => 'Camiseta da Esposa', 'class' => '', 'type' => 'text');
        $this->produtor->fields['produtor_camiseta'] = array('label' => 'Camiseta do Produtor', 'class' => '', 'type' => 'text');

        unset($this->produtor->fields['id_usuario_consultor'], $this->produtor->fields['id_usuario_rtv'], $this->produtor->fields['id_usuario_rtv_auxiliar'], $this->produtor->fields['id_categoria'], $this->produtor->fields['camiseta_esposa'], $this->produtor->fields['camiseta_produtor']);
        preenche_form($this->produtor->fields, $produtor);
        $adesoes = $this->adesao->buscarMinhasAdesoesPorProdutorId($id_produtor);

        $this->data['produtor'] = $produtor;
        $this->data['adesoes'] = $adesoes;


        $this->load->view("/site/listar_adesao", $this->data);
    }

    function cadastrar($id_produtor = null, $id_solucao=null) {
        $this->load->model('cultura_model','cultura');
        $produtor = $this->validarAcesso($id_produtor);

        $this->adesao->fields['id_produtor']['value'] = $id_produtor;
        $post = $this->input->posts();

        if (!empty($post)) {
            if ($this->adesao->validar()) {
                $id_adesao = $this->adesao->save($post);
                $set['controle'] = $this->input->post('id_solucao').'/'.str_pad($id_adesao, 4, 0, STR_PAD_LEFT);
                $this->adesao->update($set, $id_adesao);
            }
        }
        $this->load->model('solucao_model','solucao');
        if($id_solucao)
            $this->data['solucao'] = $this->solucao->get($id_solucao)->row();
        $this->adesao->fields['id_solucao']['div_class'] = 'hide';
        $this->adesao->fields['id_cultura']['div_class'] = 'hide';
        $this->adesao->fields['id_solucao']['value'] = $this->data['solucao']->id_solucao;
        $this->data['cultura'] = $this->cultura->getFromSolucao($id_solucao); 

        $this->adesao->fields['id_cultivares_ciclos'] = array(
                'label' => 'Cultivares/Ciclos',
                'type' => 'select',
                'class' => '',
                'values' => array('' => '-- Selecione uma Opção --'),
                'rules' => 'required',
                'label_class' => 'col-md-2',
                'prepend' => '<div class="col-md-6">',
                'append' => '</div>',
                'extra'=>array('required'=>'required')
            ); 

        if($id_solucao==1 || $id_solucao==2){
            $this->adesao->fields['variedade']['div_class'] = 'hide';
            $solucao = 1; 
        }elseif($id_solucao==3){
            $solucao = 3;
            $this->adesao->fields['cultivar']['div_class'] = 'hide';
            $this->adesao->fields['id_cultivares_ciclos']['label']="Grupo/Cultivares/Fungicidas";
            $this->adesao->fields['id_cultivares_ciclos']['label_class'] = 'col-md-3';

        }elseif($id_solucao==4){
            $this->adesao->fields['hibrido']['div_class'] = 'hide';
            $solucao = 4;
            $this->adesao->fields['id_cultivares_ciclos']['label']="Ciclo/Grupos Híbridos";
             
        }elseif($id_solucao==5){
            $this->adesao->fields['hibrido']['div_class'] = 'hide';
            $solucao= 5;
            $this->adesao->fields['id_cultivares_ciclos']['label']="Ciclo/Grupos Híbridos";
        }

        $cultivosCiclos = $this->db->where(array('id_solucao'=>$solucao))->get('cultivares_ciclos')->result();  

        if($cultivosCiclos){
              foreach ($cultivosCiclos as $cultivosCiclo) {
                $this->adesao->fields['id_cultivares_ciclos']['values'][$cultivosCiclo->id_cultivares_ciclos] = $cultivosCiclo->cultivares."-".$cultivosCiclo->ciclos;
              }
        }

        $this->data["form"] = $this->adesao->form('id_produtor', "id_solucao", 'id_cultura', 'area_contratada', 'area_total', 'variedade', 'hibrido', 'cultivar','id_cultivares_ciclos');

        $this->data['produtor'] = $produtor;

        $this->data['area_title'] = 'Nova adesão';

        $this->load->view("/site/cadastro_adesao", $this->data);
    }

//    verificar se o usuario pode acessar as adesoes desse usuario
    function validarAcesso($id_produtor) {

        if ($id_produtor == null)
            redirect('/');

        $produtor = $this->produtor->buscarProdutorPorId($id_produtor);

        if (empty($produtor)) {
            redirect('/');
        }

        if ($this->session->userdata("usuario") && !empty($produtor)) {

            if ($this->session->userdata("usuario")->id_perfil == 4) { //RTV
                if ($produtor->id_usuario_rtv == $this->session->userdata("usuario")->id_usuario ||
                        $produtor->id_usuario_rtv_auxiliar == $this->session->userdata("usuario")->id_usuario) {
                    return $produtor;
                }
            } else if ($this->session->userdata("usuario")->id_perfil == 2) { //CONSULTOR
                if ($produtor->id_usuario_consultor == $this->session->userdata("usuario")->id_usuario) {
                    return $produtor;
                }
            } else if($this->session->userdata('usuario')->nivel > 3) {
                return $produtor;
            }
        }

        redirect('/');
    }

    function visualizar($id_produtor, $id_adesao) {
        $this->data['produtor'] = $this->validarAcesso($id_produtor);
        $this->data['adesao'] = $this->adesao->buscarAdesaoPorId($id_adesao);

        $id_solucao = $this->data['adesao']->id_solucao;
        $this->adesao->fields['cultura'] = array('label' => 'Cultura', 'class' => '', 'type' => 'text');
        $this->adesao->fields['solucao'] = array('label' => 'Solução', 'class' => '', 'type' => 'text');
        if($id_solucao==1 || $id_solucao==2){
            $this->adesao->fields['cultivares'] = array('label' => 'Cultivares', 'class' => '', 'type' => 'text');
            $this->adesao->fields['ciclos'] = array('label' => 'Ciclos', 'class' => '', 'type' => 'text');
        }elseif($id_solucao==4 || $id_solucao==5){
            $this->adesao->fields['cultivares'] = array('label' => 'Grupos_Híbridicos', 'class' => '', 'type' => 'text');
            $this->adesao->fields['ciclos'] = array('label' => 'Ciclos', 'class' => '', 'type' => 'text');
        }elseif($id_solucao==3){
            $this->adesao->fields['cultivares'] = array('label' => 'Cultivares', 'class' => '', 'type' => 'text');
            $this->adesao->fields['ciclos'] = array('label' => 'Fungicidas', 'class' => '', 'type' => 'text');
        }
        
        unset($this->adesao->fields['id_solucao'], 
              $this->adesao->fields['id_cultura'],
              $this->adesao->fields['id_adesao'],
              $this->adesao->fields['id_produtor']
             );
        preenche_form($this->adesao->fields, $this->data['adesao']);
        $this->load->view("/site/visualizar_adesao", $this->data);
    }

    function editar($id_produtor, $id_adesao) {
        $this->data['area_title'] = "Editar adesão";
        $campo = 'id_adesao,id_produtor,id_solucao,controle,id_cultura,area_contratada,area_total,variedade,hibrido';
        $this->editar_modulo($id_produtor, $id_adesao, $campo);
    }

    function editar_resultado($id_produtor, $id_adesao) {
        $this->data['area_title'] = "Editar resuldado da colheita da adesão";
        $campo = 'id_adesao,data_plantio,data_colheita,produtividade_padrao,produtividade_pin';
        $this->editar_modulo($id_produtor, $id_adesao, $campo);
    }

    private function editar_modulo($id_produtor, $id_adesao, $campo) {
        $this->data['produtor'] = $this->validarAcesso($id_produtor);

        $post = $this->input->posts();

        if (!empty($post)) {

            if ($this->adesao->validar()) {
                $this->db->trans_start();
                $this->adesao->save($post);
                $this->db->trans_complete();
            }
        }
        $this->data['adesao'] = $this->adesao->buscarAdesaoPorId($id_adesao);
        if($this->data['adesao']){
            $this->data['area_title'] .= ' <strong>'.$this->data['adesao']->controle.'</strong> ';

            preenche_form($this->adesao->fields, $this->data['adesao']);
            $this->data["form"] = $this->adesao->form($campo);
            $this->load->view("/site/cadastro_adesao", $this->data);
        }else{
            redirect('adesao');
        }
    }

    function consultor_avaliar($id_produtor, $id_adesao) {
        $campo = 'id_adesao,certificacao_consultor,observacao_consultor';
        $this->editar_modulo($id_produtor, $id_adesao, $campo);
    }

    function rtv_avaliar($id_produtor, $id_adesao) {
        $campo = 'id_adesao,certificacao_rtv,observacao_rtv';
        $this->editar_modulo($id_produtor, $id_adesao, $campo);
    }

}
