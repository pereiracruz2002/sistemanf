<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Relatorios extends CI_Controller
{
    var $data = array();

    public function __construct() 
    {
        parent::__construct();
        if(!$this->session->userdata('usuario'))
            redirect('/');
    }

    public function index() 
    {
        redirect('relatorios/adesoes');
    }

    public function adesoes() 
    {
        $this->load->model('usuario_model', 'usuarios');
        $this->load->model('solucao_model', 'solucao');
        if($this->input->posts()){
            $this->load->model('cultura_model','culturas');
            $this->data['filtros'] = $this->input->posts();
            $this->load->model('adesao_model','adesoes');
            $this->data['resultado'] = $this->adesoes->report($this->input->posts());
            if($this->input->post('id_solucao'))
                $this->data['culturas'] = $this->culturas->getFromSolucao($this->input->post('id_solucao'));
        }
        $this->data['perfis'] = $this->usuarios->getCanRegister();
        $this->db->where_in('id_solucao', $this->session->userdata('usuario')->solucoes);
        $this->data['solucoes'] = $this->solucao->get_all()->result();


        $this->load->view('site/relatorio_adesoes', $this->data);
    }


    public function pessoa_fisica($xlsx=false){
        $this->load->model('usuario_model', 'usuarios');
        if($this->input->posts()){
             $this->data['filtros'] = $this->input->posts();
        } 
        $this->data['resultado'] = $this->usuarios->report($this->input->posts());
        if($xlsx)
            $this->xlsx($this->data['resultado']);
        else
            $this->load->view('site/relatorio_pessoa_fisica', $this->data); 
    }


    public function produtor($xlsx=false){
        $this->load->model('produtor_model', 'produtor');
        $filtros = array();
        if($this->input->posts()){
             $this->data['filtros'] = $this->input->posts();
        }
        if($this->session->userdata('usuario')->can_register==1)
            $filtros['id_perfil'][$this->session->userdata('usuario')->id_perfil] = $this->session->userdata('usuario')->id_usuario;
        $this->data['resultado'] = $this->produtor->report($filtros);
        if($xlsx){
            $csv_data = unserialize($this->session_infos->get($this->session->userdata('id_session_info'))->row()->dados);
            $this->xlsx($csv_data);
        }else{
            $this->load->view('site/relatorio_produtor', $this->data);     
        }
    }

    public function adesao($exportar=false){
        $this->load->model('solucao_model', 'solucao');
        $this->load->model('cultura_model', 'cultura');
        $this->load->model('distribuidor_model', 'distribuidor');
        $this->load->model('adesao_model', 'adesao');
        $this->load->model('session_infos_model','session_infos');
        $this->load->model('regional_model','regional');
        $this->data['perfil_acesso1'] = array(1,5,10,11,12);
        $this->data['perfil_acesso2'] = array(1,4,5,10,11,12);
        $filtros = array();
        if($this->input->posts()){
            $filtros = $this->input->posts();
        }
        if($this->session->userdata('usuario')->can_register==1)
            $filtros['id_perfil'][$this->session->userdata('usuario')->id_perfil] = $this->session->userdata('usuario')->id_usuario;

        

        //$this->data['resultado'] = $this->adesao->reportRelatorioAdesao($filtros);



        if(!$exportar){

            $this->data['resultado'] = $this->adesao->reportRelatorioAdesao($filtros);
            $this->data['solucoes'] = $this->solucao->get_all()->result();
            $this->data['culturas'] = $this->cultura->get_all()->result();
            if ($this->session->userdata('usuario')->id_distribuidor) 
                $this->data['distribuidores'] = $this->distribuidor->get($this->session->userdata('usuario')->id_distribuidor)->result();
            else
                $this->data['distribuidores'] = $this->adesao->getDistribuidorAdesao();
            $this->data['regionais'] = $query = $this->db->query("SELECT CONCAT (regional.unidade,'/ ',regional.codigo_regional,' / ',regional.cultura) as regional_nome,regional.id_regional,regional.filial FROM regional")->result();
            $this->data['filiais']['FILIAL 1'] = "FILIAL 1";
            $this->data['filiais']['FILIAL 2'] = "FILIAL 2";
           
            /*foreach($this->data['regionais'] as $filial){
                $this->data['filiais'][] = $filial->filial;
            }*/

            $this->load->view('site/relatorio_adesao', $this->data);   
        } else {
            $csv_data = unserialize($this->session_infos->get($this->session->userdata('id_session_info'))->row()->dados);
            $this->xlsx($csv_data);
        }
    }

    public function resultados($exportar=false){
        $this->load->model('solucao_model', 'solucao');
        $this->load->model('cultura_model', 'cultura');
        $this->load->model('adesao_model', 'adesao');
        $this->load->model('regional_model','regional');
        $this->data['perfil_acesso1'] = array(1,5,10,11,12);
        $this->data['perfil_acesso2'] = array(1,4,5,10,11,12);
        $filtros = array();
        if($this->input->posts()){
            $filtros = $this->input->posts();
            
            if(isset($filtros['id_regional'])){
                $filtros['regional.id_regional'] = $filtros['id_regional'];
                unset($filtros['id_regional']);
            }

            if(isset($filtros['filial'])){
                $filtros['regional.filial'] = $filtros['filial'];
                unset($filtros['filial']);
            }
        }
        if($this->session->userdata('usuario')->can_register==1)
            $filtros['id_perfil'][$this->session->userdata('usuario')->id_perfil] = $this->session->userdata('usuario')->id_usuario;
        $this->data['resultado'] = $this->adesao->reportRelatorio($filtros);
            
        if(!$exportar){
            $this->data['solucoes'] = $this->solucao->get_all()->result();
            $this->data['culturas'] = $this->cultura->get_all()->result();

            $this->data['regionais'] = $query = $this->db->query("SELECT CONCAT (regional.unidade,'/ ',regional.codigo_regional,' / ',regional.cultura) as regional_nome,regional.id_regional,regional.filial FROM regional")->result();
           
            /*foreach($this->data['regionais'] as $filial){
                if(!empty($filial->filial))
                    $this->data['filiais'][] = $filial->filial;
            }*/
            $this->data['filiais']['FILIAL 1'] = "FILIAL 1";
            $this->data['filiais']['FILIAL 2'] = "FILIAL 2";
            $this->load->view('site/relatorio_adesao', $this->data);  
        } else {
            $this->xlsx($this->data['resultado']);
        }
    }

    public function xlsx($tabela) 
    {
        $csv = implode("\n", $tabela);
        $this->load->helper('download');
        force_download($this->uri->segment(2).'.csv', utf8_decode($csv));
    }

    public function getCulturas($id_solucao) 
    {
        $this->load->model('cultura_model','culturas');
        $culturas = $this->culturas->getFromSolucao($id_solucao);
        $html = '<option value="">--Cultura--</option>';
        foreach ($culturas as $item) 
            $html .= '<option value="'.$item->id_cultura.'" selected>'.$item->cultura.'</option>';
        $this->output->set_output($html);
    }
}
