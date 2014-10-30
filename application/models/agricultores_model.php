<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Agricultores_model extends MY_Model
{
  var $id_col = 'id_agricultor';

  var $fields = array(
    'id_solucao' => array(
      'type' => 'select',
      'label' => 'Solução',
      'rules' => 'required',
      'label_class' => 'col-md-2',
      'prepend' => '<div class="col-md-10">',
      'append' => '</div>',
      'values' => array(),
      'class' => '',
      'from' => array(
        'model' => 'solucoes', 
        'value' => 'solucao', 
      )
    ),

    'id_usuario_consultor' => array(
      'type' => 'select',
      'label' => 'Consultor',
      'rules' => 'required',
      'class' => '',
      'label_class' => 'col-md-2',
      'prepend' => '<div class="col-md-10">',
      'append' => '</div>',
      'values' => array(),
      'empty' => '--Selecione uma Solução--',
      'from' => array(
        'model' => 'usuarios', 
        'value' => 'nome', 
        'join' => array('perfis', 'perfis.id_perfil=usuarios.id_perfil'),
        'where' => array('perfis.nivel' => 1)
      )
    ),
    'agricultor' => array(
      'type' => 'text',
      'label' => 'Nome',
      'class' => '',
      'rules' => 'required',
      'label_class' => 'col-md-2',
      'prepend' => '<div class="col-md-10">',
      'append' => '</div>'
    ),
    'email' => array(
      'type' => 'text',
      'class' => '',
      'label' => 'Email',
      'rules' => 'required|valid_email',
      'label_class' => 'col-md-2',
      'prepend' => '<div class="col-md-10">',
      'append' => '</div>'
    ),
    'cpf' => array(
      'type' => 'text',
      'label' => 'CPF',
      'class' => '',
      'rules' => 'required',
      'label_class' => 'col-md-2',
      'prepend' => '<div class="col-md-10">',
      'append' => '</div>'
    ),
    'rg' => array(
      'type' => 'text',
      'label' => 'RG',
      'class' => '',
      'rules' => 'required',
      'label_class' => 'col-md-2',
      'prepend' => '<div class="col-md-10">',
      'append' => '</div>',
    ),
    'esposa' => array(
      'type' => 'text',
      'label' => 'Nome da Esposa',
      'class' => '',
      'rules' => '',
      'label_class' => 'col-md-2',
      'prepend' => '<div class="col-md-10">',
      'append' => '</div>'
    ),
    'cpf_esposa' => array(
      'type' => 'text',
      'class' => '',
      'label' => 'CPF da Esposa',
      'rules' => '',
      'label_class' => 'col-md-2',
      'prepend' => '<div class="col-md-10">',
      'append' => '</div>'
    ),
    'rg_esposa' => array(
      'type' => 'text',
      'label' => 'RG da Esposa',
      'class' => '',
      'rules' => '',
      'label_class' => 'col-md-2',
      'prepend' => '<div class="col-md-10">',
      'append' => '</div>'
    ),
    'cep' => array(
      'type' => 'text',
      'label' => 'CEP',
      'class' => '',
      'rules' => 'required',
      'label_class' => 'col-md-2',
      'prepend' => '<div class="col-md-10">',
      'append' => '</div>'
    ),
    'endereco' => array(
      'type' => 'text',
      'label' => 'Endereço',
      'class' => '',
      'rules' => 'required',
      'label_class' => 'col-md-2',
      'prepend' => '<div class="col-md-10">',
      'append' => '</div>'
    ),
    'numero' => array(
      'type' => 'text',
      'label' => 'Número',
      'class' => '',
      'rules' => '',
      'label_class' => 'col-md-2',
      'prepend' => '<div class="col-md-10">',
      'append' => '</div>'
    ),
    'complemento' => array(
      'type' => 'text',
      'label' => 'Complemento',
      'rules' => '',
      'class' => '',
      'label_class' => 'col-md-2',
      'prepend' => '<div class="col-md-10">',
      'append' => '</div>'
    ),
    'estado' => array(
      'type' => 'text',
      'label' => 'Estado',
      'class' => '',
      'rules' => 'required',
      'label_class' => 'col-md-2',
      'prepend' => '<div class="col-md-10">',
      'append' => '</div>'
    ),
    'cidade' => array(
      'type' => 'text',
      'label' => 'Cidade',
      'class' => '',
      'rules' => 'required',
      'label_class' => 'col-md-2',
      'prepend' => '<div class="col-md-10">',
      'append' => '</div>'
    ),
    'id_categoria' => array(
      'type' => 'select',
      'label' => 'Categoria',
      'class' => '',
      'rules' => 'required',
      'label_class' => 'col-md-2',
      'prepend' => '<div class="col-md-10">',
      'append' => '</div>',
      'values' => array(),
      'from' => array('model' => 'categorias', 'value' => 'categoria')
    ),
    'contrato' => array(
      'type' => 'text',
      'label' => 'Contrato',
      'class' => '',
      'rules' => 'required',
      'label_class' => 'col-md-2',
      'prepend' => '<div class="col-md-10">',
      'append' => '</div>'
    ),
    'cultura' => array(
      'type' => 'text',
      'label' => 'Cultura',
      'class' => '',
      'rules' => '',
      'label_class' => 'col-md-2',
      'prepend' => '<div class="col-md-10">',
      'append' => '</div>'
    ),
    'area_total' => array(
      'type' => 'text',
      'label' => 'Área Total',
      'class' => '',
      'rules' => 'required',
      'label_class' => 'col-md-2',
      'prepend' => '<div class="col-md-10">',
      'append' => '</div>'
    ),
    'area_contratada' => array(
      'type' => 'text',
      'label' => 'Área Contratada',
      'class' => '',
      'rules' => 'required',
      'label_class' => 'col-md-2',
      'prepend' => '<div class="col-md-10">',
      'append' => '</div>'
    ),
    
  );

  public function _pre_save(&$data) 
  {
    if($data['senha']){
      $this->load->library('encrypt');
      $data['senha'] = $this->encrypt->encode($data['senha']);
    }
  }

  public function login() 
  {
    $this->load->library('encrypt');
    $where['login'] = $this->input->post('login');
    $usuario = $this->get_where($where)->row();
    if($usuario and ($this->encrypt->decode($usuario->senha) == $this->input->post('senha'))){
      unset($usuario->senha);
      $this->session->set_userdata('admin', $usuario);
      return true;
    }else{
      return false;
    }
  }
}
