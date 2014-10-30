<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include_once(dirname(__FILE__).'/BaseCrud.php');

class Cultura extends BaseCrud 
{
  var $modelname = 'cultura'; /* Nome do model sem o "_model" */
  var $base_url = '/cultura';
  var $actions = 'CRUD';
  var $acoes_extras = array(); //array("url" => "methodo do controller", "title" => "texto que aparece", "class" => "classe do link")
  var $acoes_controller = array(); //array("url" => "methodo do controller", "title" => "texto que aparece", "class" => "classe do link")
  var $titulo = 'Cultura';
  var $tabela = 'cultura';
  var $campos_busca = 'cultura';
}
