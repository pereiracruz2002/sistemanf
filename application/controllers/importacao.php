<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Importacao extends CI_Controller
{
    var $data = array();

    public function __construct() 
    {
        parent::__construct();
    }

    public function importarRegional() 
    {
        $query = $this->db->get('dados_regional');
        foreach ($query->result() as $row){
            $busca = $this->db->get_where('regional', array('codigo_regional' => $row->codigo_regional))->num_rows();
            if($busca == 0){
                $data = array(
                'id_unidade '=>1,
                'codigo_regional' => $row->codigo_regional,
                'filial'=>ucfirst($row->filial)
                );
                $this->db->insert('regional', $data);    
            }else{
                echo "Não vai gravar o código".$row->codigo_regional;
                echo "<br />";
            }
            
        }
    }

    public function importarUsuarios(){
        $query = $this->db->get_where('usuarios', array('status' => 0));
        foreach ($query->result() as $row){ 
            $id_regional = $this->db->get_where('regional', array('codigo_regional' => $row->id_regional))->row();

            $data = array(
                'cpf '=>$row->cpf,
                'nome' => $row->nome,
                'email'=>ucfirst($row->email),
                'celular'=>$row->celular,
                'id_regional'=>$id_regional->id_regional
            );
            $this->db->insert('usuario', $data);
            $id_usuario = $this->db->insert_id();
            $data_acesso = array(
                'login '=>$row->cpf,
                'id_perfil'=>$row->perfil,
                'id_usuario'=>$id_usuario
            );
            $this->db->insert('acesso', $data_acesso);
            $id_acesso = $this->db->insert_id();
            $this->acessoSolucao($id_acesso);  
        } 
    }


    public function acessoSolucao($id_acesso){
        $query = $this->db->get('solucao');
            foreach ($query->result() as $row){
                 $data_acesso_solucao = array(
                    'id_acesso'=>$id_acesso,
                    'id_solucao'=>$row->id_solucao
                );
            $this->db->insert('acesso_solucao', $data_acesso_solucao);
        }  
    }

    public function importarDistribuidor(){
        //$query = $this->db->get('distribuidores');
        $query = $this->db->get_where('distribuidores', array('unidade' => 'DS'));
        foreach ($query->result() as $row){
            $data_distribuidor = array(
                'razao_social'=>$row->razao_social,
                'cnpj'=>$row->cnpj   
            );
            //$busca_codReg = $this->db->get_where('regional', array('codigo_regional' => $row->id_regional))->row();
            //$busca_gerenteReg = $this->db->like('nome',ucfirst(strtolower($row->gerente)))->get('usuario');

             $this->db->insert('distribuidor', $data_distribuidor);

            
            /*
            $data_distribuidor = array(
                'id_regional'=>$busca_codReg->id_regional,
                'cnpj'=>$row->cnpj,
                'nome_fantasia'=>$row->nome_fantasia,
                'razao_social'=>$row->razao_social,
                'grupo'=>$row->grupo,
                'focalizacao'=>strtolower($row->focalizacao),
                'endereco'=>$row->endereco,
                'bairro'=>$row->bairro,
                'cidade'=>$row->cidade,
                'uf'=>$row->uf,
                'cep'=>$row->cep,
                'telefone'=>$row->telefone,
                'presidente'=>$row->proprietario,
                'celular_presidente'=>$row->celular_pres
            ); */
        }  
    }

    public function importarUnidade_filial(){
        $query = $this->db->get('unidade_filial_regional_cultura');
         foreach ($query->result() as $row){
            if($row->unidade=="DS")
                $unidade = 1;
            echo $row->cultura;
            echo "<br />";
            if($row->cultura=="Milho")
                $cultura = 1;
            elseif ($row->cultura=="Soja")
                 $cultura = 2;
            elseif ($row->cultura=="Trigo")
                $cultura = 3;

                 $data_regional = array(
                    'id_unidade'=>$unidade,
                    'codigo_regional'=>$row->regional,
                    'filial'=>$row->filial,
                    'id_cultura'=>$cultura,
                    'unidade'=>$row->unidade,
                    'cultura'=>$row->cultura
                );
            $this->db->insert('regional', $data_regional);
        }    
    }
 
}
