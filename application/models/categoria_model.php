<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Categoria_model extends MY_Model
{
  var $id_col = 'id_categoria';

  var $fields = array(
    'categoria' => array(
      'type' => 'text',
      'label' => 'Categoria',
      'rules' => '',
      'label_class' => 'col-md-2',
      'prepend' => '<div class="col-md-10">',
      'append' => '</div>'
    ),
  );

}
