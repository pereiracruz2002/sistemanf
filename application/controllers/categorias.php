<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include_once(dirname(__FILE__).'/BaseCrud.php');

class Categorias extends BaseCrud 
{
  var $modelname = 'categoria'; /* Nome do model sem o "_model" */
  var $base_url = '/categorias';
  var $actions = 'CRUD';
  var $acoes_extras = array(); //array("url" => "methodo do controller", "title" => "texto que aparece", "class" => "classe do link")
  var $acoes_controller = array(); //array("url" => "methodo do controller", "title" => "texto que aparece", "class" => "classe do link")
  var $titulo = 'Categorias';
  var $tabela = 'categoria';
  var $campos_busca = 'categoria';
}
