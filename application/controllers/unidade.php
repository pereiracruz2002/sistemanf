<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include_once(dirname(__FILE__).'/BaseCrud.php');

class Unidade extends BaseCrud 
{
  var $modelname = 'unidade'; /* Nome do model sem o "_model" */
  var $base_url = '/unidade';
  var $actions = 'CRUD';
  var $acoes_extras = array(); //array("url" => "methodo do controller", "title" => "texto que aparece", "class" => "classe do link")
  var $acoes_controller = array(); //array("url" => "methodo do controller", "title" => "texto que aparece", "class" => "classe do link")
  var $titulo = 'Unidade';
  var $tabela = 'nome,sigla';
  var $campos_busca = 'nome';
}
