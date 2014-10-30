<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Assunto_model extends MY_Model
{
  var $id_col = 'id_assunto';

  var $fields = array(
    'assunto' => array(
      'type' => 'text',
      'label' => 'Assunto',
      'rules' => 'required',
      'label_class' => 'col-md-2',
      'prepend' => '<div class="col-md-10">',
      'append' => '</div>'
    ),

    'email' => array(
      'type' => 'email',
      'label' => 'Email',
      'rules' => 'required',
      'label_class' => 'col-md-2',
      'prepend' => '<div class="col-md-10">',
      'append' => '</div>'
    ),
  );

}
