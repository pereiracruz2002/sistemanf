<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Contato_model extends MY_Model
{
  var $id_col = 'id_contato';

  var $fields = array(
    'nome' => array(
      'type' => 'text',
      'label' => 'Nome',
      'rules' => 'required',
      'label_class' => 'col-md-2',
      'extra' => array('required' => 'required'),
      'prepend' => '<div class="col-md-10">',
      'append' => '</div>'
    ),


    'email' => array(
      'type' => 'email',
      'label' => 'Email',
      'rules' => 'required|valid_email',
      'extra' => array('required' => 'required'),
      'label_class' => 'col-md-2',
      'prepend' => '<div class="col-md-10">',
      'append' => '</div>'
    ),
    'celular' => array(
      'type' => 'text',
      'label' => 'Telefone',
      'rules' => 'required',
      'label_class' => 'col-md-2',
      'extra' => array('required' => 'required'),
      'prepend' => '<div class="col-md-10">',
      'append' => '</div>'
    ),
    'assunto' => array(
      'type' => 'select',
      'label' => 'Assunto',
      'extra' => array('required' => 'required'),
      'rules' => 'required',
      'label_class' => 'col-md-2',
      'values' => array(),
      'from' => array('model' => 'assunto', 'value' => 'assunto'),
      'prepend' => '<div class="col-md-10">',
      'append' => '</div>'
    ),
    'mensagem' => array(
      'type' => 'textarea',
      'label' => 'Mensagem',
      'rules' => 'required',
      'label_class' => 'col-md-2',
      'extra' => array('required' => 'required'),
      'prepend' => '<div class="col-md-10">',
      'append' => '</div>'
    ),

  );

}
