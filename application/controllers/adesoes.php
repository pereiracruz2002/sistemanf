<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include_once(dirname(__FILE__).'/BaseCrud.php');

class Adesoes extends BaseCrud 
{
    var $modelname = 'adesao'; /* Nome do model sem o "_model" */
    var $base_url = '/adesoes';
    var $actions = 'CRUD';
    var $acoes_extras = array(0 => array('url' => 'agricultores/adesao', 'title' => 'Ver', 'class' => 'btn-success')); //array("url" => "methodo do controller", "title" => "texto que aparece", "class" => "classe do link")
    var $acoes_controller = array(); //array("url" => "methodo do controller", "title" => "texto que aparece", "class" => "classe do link")
    var $titulo = 'Adeões';
    var $tabela = 'controle,produtor';
    var $campos_busca = 'controle';
    var $joins = array(
         'produtor' => 'produtor.id_produtor=adesao.id_produtor',
    );
    var $selects = 'adesao.*, produtor.produtor';

    public function _filter_pre_listar()
    {
        $this->model->fields['produtor']['label'] = 'Produtor';
    }

}
