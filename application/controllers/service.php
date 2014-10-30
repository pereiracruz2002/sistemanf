<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Service extends CI_Controller
{
    public function endereco($cep) 
    {
        $cep = str_replace('-', '', $cep);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://cep.correiocontrol.com.br/" . $cep . ".json");
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        $dados = json_decode(curl_exec($ch));
        curl_close($ch);
        if(isset($dados->cep)){
            unset($dados->cep);
            $dados->endereco = $dados->logradouro;
            $dados->cidade = $dados->localidade;
            $dados->estado = $dados->uf;
        }else{
            $dados = new stdClass();
            $dados->erro = 'Endereço não encontrado';
        }
        $this->output->set_content_type('application/json')
            ->set_output(json_encode($dados));
    }
}
