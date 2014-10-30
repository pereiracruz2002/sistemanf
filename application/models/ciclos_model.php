<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Ciclos_model extends MY_Model
{
  var $id_col = 'id_ciclo';

  var $fields = array(
    'ciclo' => array(
      'type' => 'text',
      'label' => 'Ciclo',
      'rules' => '',
      'label_class' => 'col-md-2',
      'prepend' => '<div class="col-md-10">',
      'append' => '</div>'
    ),
  );

}
