<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Regional_model extends MY_Model
{
  var $id_col = 'id_regional';

  var $fields = array(
    'codigo_regional' => array(
      'type' => 'text',
      'label' => 'Código Regional',
      'rules' => 'required',
      'label_class' => 'col-md-2',
      'prepend' => '<div class="col-md-10">',
      'append' => '</div>'
    ),
    'id_unidade' => array(
      'type' => 'select',
      'label' => 'Únidade',
      'rules' => 'required',
      'label_class' => 'col-md-2',
      'values' => array(),
      'from' => array('model' => 'unidade', 'value' => 'nome'),
      'prepend' => '<div class="col-md-10">',
      'append' => '</div>'
    ),
    'filial' => array(
      'type' => 'text',
      'label' => 'Filial',
      'rules' => 'required',
      'label_class' => 'col-md-2',
      'prepend' => '<div class="col-md-10">',
      'append' => '</div>'
    ),
    'endereco' => array(
      'type' => 'text',
      'label' => 'Endereço',
      'rules' => 'required',
      'label_class' => 'col-md-2',
      'prepend' => '<div class="col-md-10">',
      'append' => '</div>'
    ),
    'bairro' => array(
      'type' => 'text',
      'label' => 'Bairro',
      'rules' => 'required',
      'label_class' => 'col-md-2',
      'prepend' => '<div class="col-md-10">',
      'append' => '</div>'
    ),
    'cidade' => array(
      'type' => 'text',
      'label' => 'Cidade',
      'rules' => 'required',
      'label_class' => 'col-md-2',
      'prepend' => '<div class="col-md-10">',
      'append' => '</div>'
    ),
    'estado' => array(
      'type' => 'text',
      'label' => 'Estado',
      'rules' => 'required',
      'label_class' => 'col-md-2',
      'prepend' => '<div class="col-md-10">',
      'append' => '</div>'
    ),
    'cep' => array(
      'type' => 'text',
      'label' => 'CEP',
      'rules' => 'required',
      'label_class' => 'col-md-2',
      'prepend' => '<div class="col-md-10">',
      'append' => '</div>'
    ),

  );

}
