<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include_once(dirname(__FILE__).'/BaseCrud.php');

class Assuntos extends BaseCrud 
{
  var $modelname = 'assunto'; /* Nome do model sem o "_model" */
  var $base_url = '/assuntos';
  var $actions = 'CRUD';
  var $acoes_extras = array(); //array("url" => "methodo do controller", "title" => "texto que aparece", "class" => "classe do link")
  var $acoes_controller = array(); //array("url" => "methodo do controller", "title" => "texto que aparece", "class" => "classe do link")
  var $titulo = 'Assuntos';
  var $tabela = 'assunto,email';
  var $campos_busca = 'assunto';
}
