<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include_once(dirname(__FILE__).'/BaseCrud.php');

class Grupo_cultivares extends BaseCrud 
{
  var $modelname = 'Grupo_cultivares'; /* Nome do model sem o "_model" */
  var $base_url = '/grupo_cultivares';
  var $actions = 'CRUD';
  var $acoes_extras = array(); //array("url" => "methodo do controller", "title" => "texto que aparece", "class" => "classe do link")
  var $acoes_controller = array(); //array("url" => "methodo do controller", "title" => "texto que aparece", "class" => "classe do link")
  var $titulo = 'Grupos cultivares';
  var $tabela = 'grupo,nome';
  var $campos_busca = 'grupo,nome';
}
