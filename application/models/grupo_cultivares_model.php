<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class grupo_cultivares_model extends MY_Model
{
  var $id_col = 'id_grupo_cultivares';

  var $fields = array(
    'grupo' => array(
      'type' => 'text',
      'label' => 'Grupo',
      'rules' => 'required|numeric',
      'label_class' => 'col-md-2',
      'prepend' => '<div class="col-md-10">',
      'append' => '</div>'
    ),
    'nome' => array(
      'type' => 'text',
      'label' => 'Nome',
      'rules' => 'required',
      'label_class' => 'col-md-2',
      'prepend' => '<div class="col-md-10">',
      'append' => '</div>'
    ),
  );

}
