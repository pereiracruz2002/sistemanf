<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Distribuidor_model extends MY_Model
{
  var $id_col = 'id_distribuidor';

  var $fields = array(
    'id_regional' => array(
      'type' => 'select',
      'label' => 'Regional',
      'rules' => 'required',
      'values' => array(),
      'from' => array('model' => 'regional', 'value' => 'codigo_regional'),
      'label_class' => 'col-md-2',
      'prepend' => '<div class="col-md-10">',
      'append' => '</div>'
    ),
    'cnpj' => array(
      'type' => 'text',
      'label' => 'CNPJ',
      'rules' => 'required',
      'label_class' => 'col-md-2',
      'prepend' => '<div class="col-md-10">',
      'append' => '</div>'
    ),
    'nome_fantasia' => array(
      'type' => 'text',
      'label' => 'Nome Fantasia',
      'rules' => 'required',
      'label_class' => 'col-md-2',
      'prepend' => '<div class="col-md-10">',
      'append' => '</div>'
    ),
    'razao_social' => array(
      'type' => 'text',
      'label' => 'Razão Social',
      'rules' => 'required',
      'label_class' => 'col-md-2',
      'prepend' => '<div class="col-md-10">',
      'append' => '</div>'
    ),
    'grupo' => array(
      'type' => 'text',
      'label' => 'Grupo',
      'rules' => 'required',
      'label_class' => 'col-md-2',
      'values' => array('revenda' => 'Revenda', 'coperativa' => 'Coperativa'),
      'prepend' => '<div class="col-md-10">',
      'append' => '</div>'
    ),
    'focalizacao' => array(
      'type' => 'select',
      'label' => 'Focalização',
      'rules' => 'required',
      'label_class' => 'col-md-2',
      'values' => array('Não', 'Sim'),
      'prepend' => '<div class="col-md-10">',
      'append' => '</div>'
    ),
    'id_usuario_gerente_regional' => array(
      'type' => 'select',
      'label' => 'Gerente Regional',
      'rules' => 'required',
      'label_class' => 'col-md-2',
      'values' => array(),
      'from' => array('model' => 'usuario', 
                      'value' => 'nome', 
                      'where' => array('id_perfil' => 1), 
                      'join' => array('acesso', 'acesso.id_usuario=usuario.id_usuario')
                     ),
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
    'uf' => array(
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
    'telefone' => array(
      'type' => 'text',
      'label' => 'Telefone',
      'rules' => 'required',
      'label_class' => 'col-md-2',
      'prepend' => '<div class="col-md-10">',
      'append' => '</div>'
    ),
    'presidente' => array(
      'type' => 'text',
      'label' => 'Presidente',
      'rules' => 'required',
      'label_class' => 'col-md-2',
      'prepend' => '<div class="col-md-10">',
      'append' => '</div>'
    ),
    'celular_presidente' => array(
      'type' => 'text',
      'label' => 'Celular do Presidente',
      'rules' => '',
      'label_class' => 'col-md-2',
      'prepend' => '<div class="col-md-10">',
      'append' => '</div>'
    ),
  );
}
