<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Unidade_model extends MY_Model
{
  var $id_col = 'id_unidade';

  var $fields = array(
    'nome' => array(
      'type' => 'text',
      'label' => 'Nome',
      'rules' => 'required',
      'label_class' => 'col-md-2',
      'prepend' => '<div class="col-md-10">',
      'append' => '</div>'
    ),
    'sigla' => array(
      'type' => 'text',
      'label' => 'Sigla',
      'rules' => 'required',
      'label_class' => 'col-md-2',
      'prepend' => '<div class="col-md-10">',
      'append' => '</div>'
    ),
  );

}
