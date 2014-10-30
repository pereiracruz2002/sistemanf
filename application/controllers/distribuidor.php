<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include_once(dirname(__FILE__).'/BaseCrud.php');

class Distribuidor extends BaseCrud 
{
  var $modelname = 'distribuidor'; /* Nome do model sem o "_model" */
  var $base_url = '/distribuidor';
  var $actions = 'CRUD';
  var $acoes_extras = array(); //array("url" => "methodo do controller", "title" => "texto que aparece", "class" => "classe do link")
  var $acoes_controller = array(); //array("url" => "methodo do controller", "title" => "texto que aparece", "class" => "classe do link")
  var $titulo = 'distribuidor';
  var $tabela = 'cnpj,nome_fantasia,razao_social';
  var $campos_busca = 'cnpj';

}
