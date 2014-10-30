<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Tamanho_model extends MY_Model
{
  var $id_col = 'id_tamanho';

  var $fields = array(
    'tamanho' => array(
      'type' => 'text',
      'label' => 'Tamanho',
      'rules' => 'required',
      'label_class' => 'col-md-2',
      'prepend' => '<div class="col-md-10">',
      'append' => '</div>'
    ),
  );

}
