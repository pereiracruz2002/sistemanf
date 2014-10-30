<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include_once(dirname(__FILE__).'/BaseCrud.php');

class Solucoes extends BaseCrud 
{
  var $modelname = 'solucao'; /* Nome do model sem o "_model" */
  var $base_url = '/solucoes';
  var $actions = 'CRUD';
  var $acoes_extras = array(); //array("url" => "methodo do controller", "title" => "texto que aparece", "class" => "classe do link")
  var $acoes_controller = array(); //array("url" => "methodo do controller", "title" => "texto que aparece", "class" => "classe do link")
  var $titulo = 'Soluções';
  var $tabela = 'solucao';
  var $campos_busca = 'solucao';
}
