<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Adesao_model extends MY_Model
{
	var $id_col = 'id_adesao';

	var $fields = array(

       'id_adesao' => array(
        'type' => 'hidden',
        'label' => '',
        'class' => '',
        'label_class' => 'col-md-2',
        'prepend' => '<div class="col-md-10">',
        'append' => '</div>',
        'values' => array(),
	//        'from' => array('model' => 'usuario', 'value' => 'nome')
	),
       'id_produtor' => array(
        'type' => 'hidden',
        'label' => '',
        'class' => '',
        'rules' => 'required',
        'label_class' => 'col-md-2',
        'prepend' => '<div class="col-md-10">',
        'append' => '</div>',
        'values' => array(),
	//        'from' => array('model' => 'usuario', 'value' => 'nome')
	),
       'id_solucao' => array(
        'type' => 'select',
        'label' => 'Solução',
        'class' => '',
        'rules' => 'required',
        'label_class' => 'col-md-2',
        'prepend' => '<div class="col-md-10">',
        'append' => '</div>',
        'values' => array(),
        'from' => array('model' => 'solucao', 'value' => 'solucao')
	),
       'controle' => array(
        'type' => 'text',
        'label' => 'Código de controle',
        'class' => '',
        'rules' => 'required',
        'label_class' => 'col-md-2',
        'prepend' => '<div class="col-md-2">',
        'append' => '</div>',
        'values' => array(),
	),
      'id_cultura' => array(
        'type' => 'select',
        'label' => 'Cultura',
        'class' => '',
        'rules' => 'required',
        'label_class' => 'col-md-2',
        'prepend' => '<div class="col-md-2">',
        'append' => '</div>',
        'values' => array(),
        'from' => array('model' => 'cultura', 'value' => 'cultura')
	),
       'area_contratada' => array(
        'type' => 'text',
        'label' => 'Área contratada',
        'class' => '',
        'rules' => 'required|numeric',
        'label_class' => 'col-md-2',
        'prepend' => '<div class="col-md-2">',
        'append' => '</div><div class="form-control-static">ha</div>',
        'values' => array(),
	),
       'area_total' => array(
        'type' => 'text',
        'label' => 'Área total',
        'class' => '',
        'rules' => 'required|numeric',
        'label_class' => 'col-md-2',
        'prepend' => '<div class="col-md-2">',
        'append' => '</div><div class="form-control-static">ha</div>',
        'values' => array(),
	),
       'variedade' => array(
        'type' => 'text',
        'label' => 'Variedade',
        'class' => '',
        'rules' => '',
        'label_class' => 'col-md-2',
        'prepend' => '<div class="col-md-2 variedade solucao_producao">',
        'append' => '</div>',
        'values' => array(),
	),
       'hibrido' => array(
        'type' => 'text',
        'label' => 'Híbrido',
        'class' => '',
        'rules' => '',
        'label_class' => 'col-md-2',
        'prepend' => '<div class="col-md-2 hibrido solucao_producao">',
        'append' => '</div>',
        'values' => array(),
	),
       'cultivar' => array(
        'type' => 'text',
        'label' => 'Cultivar',
        'class' => '',
        'rules' => '',
        'label_class' => 'col-md-2',
        'prepend' => '<div class="col-md-2 cultivar solucao_producao">',
        'append' => '</div>',
        'values' => array(),
	),
       'data_plantio' => array(
        'type' => 'text',
        'label' => 'Data do plantio',
        'class' => 'data',
        'rules' => 'required',
        'label_class' => 'col-md-3',
        'prepend' => '<div class="col-md-2">',
        'append' => '</div>',
        'extra' => array('class' => 'datepicker'),
        'values' => array(),
	),
       'data_colheita' => array(
        'type' => 'text',
        'label' => 'Data da colheita',
        'class' => 'data',
        'rules' => 'required',
        'label_class' => 'col-md-3',
        'extra' => array('class' => 'datepicker'),
        'prepend' => '<div class="col-md-2">',
        'append' => '</div>',
        'values' => array(),
	),
       'produtividade_padrao' => array(
        'type' => 'text',
        'label' => 'Produtividade padrão',
        'class' => '',
        'rules' => 'required',
        'label_class' => 'col-md-3',
        'prepend' => '<div class="col-md-2">',
        'append' => '</div>',
        'values' => array(),
	),
       'produtividade_pin' => array(
        'type' => 'text',
        'label' => 'Produtividade PIN',
        'class' => '',
        'rules' => 'required',
        'label_class' => 'col-md-3',
        'prepend' => '<div class="col-md-2">',
        'append' => '</div>',
        'values' => array(),
	),
       'certificacao_consultor' => array(
        'type' => 'select',
        'label' => 'Certificação do consultor',
        'class' => '',
        'rules' => 'required',
        'label_class' => 'col-md-2',
        'prepend' => '<div class="col-md-10">',
        'append' => '</div>',
        'values' => array("SIM"=>"SIM","NÃO"=>"NÃO"),
	),
       'observacao_consultor' => array(
        'type' => 'text',
        'label' => 'Observação do consultor',
        'class' => '',
        'rules' => 'required',
        'label_class' => 'col-md-2',
        'prepend' => '<div class="col-md-10">',
        'append' => '</div>',
        'values' => array(),
	),
       'certificacao_rtv' => array(
        'type' => 'select',
        'label' => 'Certificação do RTV',
        'class' => '',
        'rules' => 'required',
        'label_class' => 'col-md-2',
        'prepend' => '<div class="col-md-10">',
        'append' => '</div>',
        'values' => array("SIM"=>"SIM","NÃO"=>"NÃO"),
	),
       'observacao_rtv' => array(
        'type' => 'text',
        'label' => 'Observação do RTV',
        'class' => '',
        'rules' => 'required',
        'label_class' => 'col-md-2',
        'prepend' => '<div class="col-md-10">',
        'append' => '</div>',
        'values' => array(),
	),
	);
	var $cabecalho = array();

	public function _filter_pre_save(&$dada)
	{
		if(isset($dada['data_plantio']))
		$dada['data_plantio'] = formata_data($dada['data_plantio']);

		if(isset($dada['data_colheita']))
		$dada['data_colheita'] = formata_data($dada['data_colheita']);
	}

	function buscarMinhasAdesoesPorProdutorId($id_produtor) {
		$where = array(
            "adesao.id_produtor" => $id_produtor
		);
		$join = array(
            "solucao" => "solucao.id_solucao = adesao.id_solucao",
            "cultura" => "cultura.id_cultura = adesao.id_cultura",
            "produtor" => "produtor.id_produtor=adesao.id_produtor",
            "usuario as consultor" => "consultor.id_usuario=produtor.id_usuario_consultor",
            "usuario as rtv" => "rtv.id_usuario=produtor.id_usuario_rtv OR rtv.id_usuario=produtor.id_usuario_rtv_auxiliar" 
            );
            $select = "adesao.*, solucao.*, cultura.*, produtor.produtor, consultor.nome as consultor, rtv.nome as rtv";
            $adesoes = $this->search($where, 1, 500, $select, $join);
            return $adesoes['resultados'];
	}
	function buscarAdesaoPorId($id_adesao) {
		$where = array(
            "id_adesao" => $id_adesao
		);
		$join = array(
            "solucao" => "solucao.id_solucao = adesao.id_solucao",
            "cultura" => "cultura.id_cultura = adesao.id_cultura",
            "produtor" => "produtor.id_produtor=adesao.id_produtor",
            "cultivares_ciclos" =>"cultivares_ciclos.id_cultivares_ciclos=adesao.id_cultivares_ciclos"
            );
            $adesoes = $this->search($where, 1, 1, "*", $join);
            if($adesoes)
            return $adesoes['resultados'][0];
            else
            return false;
	}

	public function report($filtros)
	{
		$this->db->select('adesao.*,
                           produtor.*,
                           categoria.categoria,
                           solucao.solucao,
                           cultura.cultura,
                           consultor.nome as consultor,
                           rtv.nome as rtv
                          ')
		->join('produtor', 'produtor.id_produtor=adesao.id_produtor')
		->join('categoria', 'categoria.id_categoria=produtor.id_categoria')
		->join('solucao', 'solucao.id_solucao=adesao.id_solucao')
		->join('cultura', 'cultura.id_cultura=adesao.id_cultura')
		->join('usuario as consultor', 'consultor.id_usuario=produtor.id_usuario_consultor')
		->join('usuario as rtv', 'rtv.id_usuario=produtor.id_usuario_rtv OR rtv.id_usuario=produtor.id_usuario_rtv_auxiliar')
		->group_by('id_adesao');
		foreach ($filtros as $filtro => $valor) {
			if($filtro != 'id_perfil'){
				if($valor){
					$col = (strstr($filtro, '.') ? $filtro : 'adesao.'.$filtro);
					$this->db->where($col, $valor);
				}
			}
		}
		if($filtros['id_perfil']){
			foreach ($filtros['id_perfil'] as $id_perfil => $id_usuario) {
				if($id_usuario){
					if($id_perfil == 2){
						$this->db->where('produtor.id_usuario_consultor', $id_usuario);
					}
					if($id_perfil == 4){
						$this->db->where('( produtor.id_usuario_rtv = ', $id_usuario)
						->or_where('produtor.id_usuario_rtv_auxiliar', $id_usuario);
						$this->db->ar_where[] = ')';
					}
				}
			}
			 
		}
		$resultado = $this->get_all()->result();
		$this->load->library('table', array(), 'lib_table');
		$this->lib_table->set_heading(array('#','Adesão', 'Produtor', 'Consultor', 'RTV', 'Solução', 'Cultura'));
		foreach ($resultado as $item) {
			$this->lib_table->add_row('<a class="btn btn-xs btn-success" href="'.site_url("/adesao/editar_resultado/")."/".$item->id_produtor.'/'.$item->id_adesao.'">Incluir resultado</a>','<a href="'.site_url('adesao/visualizar/'.$item->id_produtor.'/'.$item->id_adesao).'">'.$item->controle.'</a>', $item->produtor, $item->consultor, $item->rtv, $item->solucao, $item->cultura);

		}

		return $this->lib_table->generate();
	}

	public function reportRelatorio($filtros)
	{
		$this->db->select('adesao.*,
                           produtor.*,
                           categoria.categoria,
                           solucao.solucao,
                           cultura.cultura,
                           consultor.nome as consultor,
                           rtv.nome as rtv
                          ')
		->join('produtor', 'produtor.id_produtor=adesao.id_produtor')
		->join('categoria', 'categoria.id_categoria=produtor.id_categoria')
		->join('solucao', 'solucao.id_solucao=adesao.id_solucao')
		->join('cultura', 'cultura.id_cultura=adesao.id_cultura')
		->join('usuario as consultor', 'consultor.id_usuario=produtor.id_usuario_consultor')
		->join('usuario as rtv', 'rtv.id_usuario=produtor.id_usuario_rtv OR rtv.id_usuario=produtor.id_usuario_rtv_auxiliar')
		->join('regional','regional.id_cultura=adesao.id_cultura')
		->group_by('id_adesao');
		foreach ($filtros as $filtro => $valor) {
			if($filtro != 'id_perfil'){
				if($valor){
					$col = (strstr($filtro, '.') ? $filtro : 'adesao.'.$filtro);
					$this->db->where($col, $valor);
				}
			}
		}
		if(isset($filtros['id_perfil'])){
			foreach ($filtros['id_perfil'] as $id_perfil => $id_usuario) {
				if($id_usuario){

					if($id_perfil == 2){
						$this->db->where('produtor.id_usuario_consultor', $id_usuario);
					}
					if($id_perfil == 4){
						$this->db->where('( produtor.id_usuario_rtv = ', $id_usuario)
						->or_where('produtor.id_usuario_rtv_auxiliar', $id_usuario);
						$this->db->ar_where[] = ')';
					}
				}
			}
		}
		if($this->session->userdata('usuario')->can_register==0){
			if($this->session->userdata('usuario')->id_distribuidor and $this->session->userdata('usuario')->id_perfil==3){
				$this->db->join('distribuidor','distribuidor.id_regional=regional.id_regional');
				$this->db->where('distribuidor.id_distribuidor',$this->session->userdata('usuario')->id_distribuidor);
			}
			if($this->session->userdata('usuario')->id_regional and $this->session->userdata('usuario')->id_perfil==10 ){
				$this->db->where('regional.filial',$this->session->userdata('usuario')->filial);
			}
		}
		 
		$resultado = $this->get_all()->result();
		 
		$this->load->library('table', array(), 'lib_table');
		$cabecalho = array('Produtor', 'Consultor', 'RTV', 'Solução', 'Cultura','Área Total','Área Contratada','Prod. Padrão','Data Plantio','Data Colheita','Prod. Pin');
		$this->lib_table->set_heading($cabecalho);
		$this->csv_data[] = implode(';',$cabecalho);
		foreach ($resultado as $item) {
			$row = array($item->produtor, $item->consultor, $item->rtv, $item->solucao, $item->cultura, $item->area_total,$item->area_contratada,$item->produtividade_padrao,formata_data($item->data_plantio),formata_data($item->data_colheita),$item->produtividade_pin);
			$this->lib_table->add_row($row);
			$this->csv_data[] = implode(';', $row);
		}
		if($this->uri->segment(3))
		return $this->csv_data;
		else
		return $this->lib_table->generate();
		 
	}

	public function reportRelatorioAdesao($filtros)
	{
		$id_perfil = $this->session->userdata('usuario')->id_perfil;
		$this->db->select(' adesao.controle,produtor.produtor,consultor.nome as consultor,distribuidor.razao_social,rtv.nome as rtv,
                            adesao.area_total,adesao.area_contratada,adesao.data_plantio,adesao.data_colheita,
                            adesao.produtividade_pin,adesao.produtividade_padrao,categoria.categoria,regional.codigo_regional,
                            regional.filial,solucao.solucao,cultura.cultura,cultivares_ciclos.ciclos,cultivares_ciclos.cultivares') 
		->join('produtor', 'produtor.id_produtor=adesao.id_produtor')
		->join('categoria', 'categoria.id_categoria=produtor.id_categoria')
		->join('usuario as consultor', 'consultor.id_usuario=produtor.id_usuario_consultor')
		->join('usuario as rtv', 'rtv.id_usuario=produtor.id_usuario_rtv OR rtv.id_usuario=produtor.id_usuario_rtv_auxiliar')
		//->join('usuario as rtv', 'rtv.id_usuario=produtor.id_usuario_rtv','left')
		//->join('usuario as rtv', 'rtv.id_usuario=produtor.id_usuario_rtv','left')
		->join('usuario as rtv_aux', 'rtv_aux.id_usuario=produtor.id_usuario_rtv_auxiliar','left')
		->join('distribuidor','distribuidor.id_distribuidor=consultor.id_distribuidor','left')
		//->join('regional','regional.id_regional=consultor.id_regional or regional.id_regional=rtv.id_regional')
		->join('regional','regional.id_regional=rtv.id_regional')
		->join('solucao', 'solucao.id_solucao=adesao.id_solucao')
		->join('cultura', 'cultura.id_cultura=adesao.id_cultura')
		->join('cultivares_ciclos', 'cultivares_ciclos.id_cultivares_ciclos = adesao.id_cultivares_ciclos')
		->group_by('id_adesao');




		
		foreach ($filtros as $filtro => $valor) {
			if($filtro != 'id_perfil'){
				if($valor){
					if ($filtro == 'id_regional') {
						$where['rtv.'.$filtro] = $valor;
						$where['consultor.'.$filtro] = $valor;
					}  else if($filtro == 'filial'){
						$where['regional.'.$filtro] =$valor;
					} else if($filtro == 'id_distribuidor'){
						$this->db->or_where('distribuidor.'.$filtro.' = ',$valor);
					}else{
						$where['adesao.'.$filtro] = $valor;
					}
				}
			}
		}
		(isset($where))?$this->db->where($where):'';
		if(isset($filtros['id_perfil'])){
			foreach ($filtros['id_perfil'] as $perfil => $id_usuario) {
				if($id_usuario){
					if($perfil == 2){
						$this->db->where('produtor.id_usuario_consultor', $id_usuario);
					}
					if($perfil == 4){
						$this->db->where('( produtor.id_usuario_rtv = ', $id_usuario)
						->or_where('produtor.id_usuario_rtv_auxiliar', $id_usuario);
						$this->db->ar_where[] = ')';
					}
				}
			}
		}
		switch ($id_perfil) {
			case 2:
				$this->db->where('consultor.id_usuario',$this->session->userdata('usuario')->id_usuario);
				break;
			case 3:
				$this->db->where('consultor.id_distribuidor',$this->session->userdata('usuario')->id_distribuidor);
				break;
			case 4:
				$this->db->where('rtv.id_usuario',$this->session->userdata('usuario')->id_usuario);
				break;
			case 5:
				if (!empty($this->session->userdata('usuario')->cultura))
				$this->db->where('adesao.id_cultura',$this->session->userdata('usuario')->id_cultura);
				break;
			case 10:
				if (!empty($this->session->userdata('usuario')->filial))
				$this->db->where('regional.filial',$this->session->userdata('usuario')->filial);
				break;
			case 11:
				if (!empty($this->session->userdata('usuario')->codigo_regional))
				$this->db->where('regional.codigo_regional',$this->session->userdata('usuario')->codigo_regional);
				break;
		}
		$resultado = $this->get_all();
		$total = $resultado->num_rows;
		$resultado = $resultado->result();
		$resultado = $this->createCsv($resultado);

		$this->load->model('session_infos_model','session_infos');
		$set = array('dados'=>serialize($resultado));
		($this->session->userdata('id_session_info'))?$set['id_session_info'] = $this->session->userdata('id_session_info'):'';
		$id_session_info = $this->session_infos->save($set);
		$this->session->set_userdata('id_session_info',$id_session_info);

		$result['total'] = $total;
		return $result;
	}
	public function createCsv($adesao_relatorio)
	{
		$this->cabecalho = array( 'Número de controle','Produtor', 'Consultor', 'Distribuidor','RTV','Categoria','Código regional',
                                'Filial', 'Área Total (HA)','Área Contratada','Solução','Cultura','Ciclos','Cultivares','Data do Plantio',
                                'Data da Colheita','Produtividade padrão','Produtividade ICS',);
		$csv_data[] = implode(';',$this->cabecalho);
		foreach ($adesao_relatorio  as $item) {
			$row = array($item->controle,$item->produtor,$item->consultor,$item->razao_social,$item->rtv,$item->categoria,
			$item->codigo_regional,$item->filial,$item->area_total,$item->area_contratada,$item->solucao,
			$item->cultura,$item->ciclos,$item->cultivares,$item->data_plantio,$item->data_colheita,
			$item->produtividade_padrao,$item->produtividade_pin);
			$csv_data[] = implode(';', $row);
		}
		return $csv_data;
	}

	public function getDistribuidorAdesao()
	{
		$this->db->select(' distribuidor.id_distribuidor,distribuidor.razao_social,distribuidor.cnpj,')
		->join('produtor', 'produtor.id_produtor=adesao.id_produtor')
		->join('usuario as consultor', 'consultor.id_usuario=produtor.id_usuario_consultor')
		->join('usuario as rtv', 'rtv.id_usuario=produtor.id_usuario_rtv OR rtv.id_usuario=produtor.id_usuario_rtv_auxiliar')
		->join('distribuidor', 'distribuidor.id_distribuidor=consultor.id_distribuidor or distribuidor.id_distribuidor=rtv.id_distribuidor')
		->where(array('rtv.id_distribuidor IS NOT NULL' => NULL,'consultor.id_distribuidor IS NOT NULL' => NULL))
		->order_by('distribuidor.id_distribuidor')
		->group_by('distribuidor.id_distribuidor');
		$result = $this->get_all()->result();
		return $result;
	}
}
