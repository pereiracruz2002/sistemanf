<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include_once(dirname(__FILE__).'/BaseCrud.php');

class Agricultores extends BaseCrud 
{
    var $modelname = 'produtor'; /* Nome do model sem o "_model" */
    var $base_url = '/agricultores';
    var $actions = 'CRUD';
    var $acoes_extras = array(0 => array('url' => 'agricultores/adesoes', 'title' => 'Adesões', 'class' => 'btn-success')); //array("url" => "methodo do controller", "title" => "texto que aparece", "class" => "classe do link")
    var $acoes_controller = array(); //array("url" => "methodo do controller", "title" => "texto que aparece", "class" => "classe do link")
    var $titulo = 'Produtores';
    var $tabela = 'cpf_produtor,produtor,consultor';
    var $campos_busca = 'produtor,cpf_produtor';
    var $joins = array(
         'usuario' => 'usuario.id_usuario=produtor.id_usuario_consultor',
    );
    var $selects = 'produtor.*, usuario.nome as consultor';

    public function _filter_pre_listar()
    {
        $this->model->fields['consultor']['label'] = 'Consultor';
    }

    public function adesoes($id_produtor) 
    {
        $this->load->model('adesao_model','model');
        $this->data['itens'] = $this->model->buscarMinhasAdesoesPorProdutorId($id_produtor);
        $this->data['titulo'] = 'Adeões do '.$this->data['itens'][0]->produtor;
        $this->load->view('agricultores_adesoes', $this->data);
    }

    public function adesao($id_adesao) 
    {
        $this->load->model('adesao_model','model');
        $this->model->fields['id_produtor']['label'] = 'Produtor';
        unset($this->model->fields['id_adesao']);
        $this->data['adesao'] = $this->model->buscarAdesaoPorId($id_adesao);
        $this->data['adesao']->id_produtor = $this->data['adesao']->produtor;
        $this->data['adesao']->id_solucao= $this->data['adesao']->solucao;

        $this->load->view('agricultores_adesao', $this->data);
    }
}
