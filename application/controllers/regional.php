<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include_once(dirname(__FILE__).'/BaseCrud.php');

class Regional extends BaseCrud 
{
  var $modelname = 'regional'; /* Nome do model sem o "_model" */
  var $base_url = '/regional';
  var $actions = 'CRUD';
  var $acoes_extras = array(); //array("url" => "methodo do controller", "title" => "texto que aparece", "class" => "classe do link")
  var $acoes_controller = array(); //array("url" => "methodo do controller", "title" => "texto que aparece", "class" => "classe do link")
  var $titulo = 'Regional';
  var $tabela = 'codigo_regional,filial';
  var $campos_busca = 'codigo_regional';
}
