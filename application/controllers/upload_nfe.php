<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include_once('BaseCrud.php');

class Upload_nfe extends BaseCrud
{
  var $modelname = 'upload'; //Nome da model sem o "_model"
  var $titulo = 'Upload';
  var $campos_busca = 'nome'; //Campos para filtragem
  var $base_url = 'upload_nfe';
  var $actions = '';
  var $delete_fields = '';
  var $tabela = 'id_upload,nome,file,data'; //Campos que aparecerão na tabela de listagem
  var $base_ativo = '';
  var $title = 'Upload nfe';
  var $tituloMenu = 'Upload nfe';

  function __contruct(){
    parent::__construct();
  }
  public function _filter_pre_listar(&$where) 
  {
    $this->model->fields['id_upload']['label'] = 'ID Upload';
    $this->model->fields['data']['label'] = 'Data';
  }
  public function _filter_pre_save(&$data) 
  {
    $data['file'] = $this->upload_data['file_name'];
  }
  public function uploadFoto() 
  {
      $this->load->library('upload');
      if($_FILES['file']['name']){
          $config['upload_path'] = FCPATH.'upload/';
          $config['allowed_types'] = 'pdf';
          $config['max_size'] = '300000';
          $this->upload->initialize($config);
          
          if($this->upload->do_upload('file')){
              $this->upload_data = $this->upload->data();
              return true;
          } else {
              $this->form_validation->set_message('error', $this->upload->display_errors());
              return false;
          }
      }
      return true;
  }

}
