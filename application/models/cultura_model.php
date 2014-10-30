<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Cultura_model extends MY_Model
{
  var $id_col = 'id_cultura';

  var $fields = array(
    'cultura' => array(
      'type' => 'text',
      'label' => 'Cultura',
      'rules' => 'required',
      'label_class' => 'col-md-2',
      'prepend' => '<div class="col-md-10">',
      'append' => '</div>'
    ),

  );

  public function getFromSolucao($id_solucao) 
  {
      $this->db->join('solucao', 'solucao.id_cultura=cultura.id_cultura')
               ->group_by('solucao.id_cultura');
      $where['solucao.id_solucao'] = $id_solucao;
      return $this->get_where($where)->result();
  }

}
