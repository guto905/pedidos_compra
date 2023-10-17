<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Firebase\JWT\JWT;

class Pedidos extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('pedidos_model');
        $this->load->helper('url');
        $this->load->config('jwt');
        $this->load->library('session');
        $this->load->library('form_validation');
    }

    private function verificarToken()
    {
        $token = $this->input->get_request_header('Authorization', true);

        try {
            $tokenData = JWT::decode($token, $this->config->item('jwt_key'), array('HS256'));
            return $tokenData;
        } catch (Exception $e) {
            return false;
        }
    }

    private function consultarEnderecoPorCEP($cep)
    {
        // Aqui você coloca a lógica para consultar a API de CEP e retornar os dados de endereço
        // Exemplo fictício:
        return array(
            'logradouro' => 'Rua Exemplo',
            'numero' => '123',
            'bairro' => 'Bairro Exemplo',
            'cidade' => 'Cidade Exemplo',
            'estado' => 'EX'
        );
    }

    public function index()
    {
        // Implemente a listagem de pedidos aqui

        // Implementação de paginação
        $page = $this->input->get('page') ? $this->input->get('page') : 1;
        $per_page = $this->input->get('per_page') ? $this->input->get('per_page') : 10;

        // Implementação de filtro de dados
        $filter = $this->input->get('filter');

        $pedidos = $this->pedidos_model->getPaginatedPedidos($page, $per_page, $filter);

        // Exemplo de retorno JSON
        $response = array(
            'cabecalho' => array(
                'status' => 200,
                'mensagem' => 'Dados retornados com sucesso'
            ),
            'retorno' => $pedidos
        );

        $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode($response));
    }

    public function show($id)
    {
        // Implemente a exibição de detalhes de um pedido aqui

        // Exemplo de retorno JSON
        $response = array(
            'cabecalho' => array(
                'status' => 200,
                'mensagem' => 'Dados retornados com sucesso'
            ),
            'retorno' => array(
                // Detalhes do pedido
            )
        );

        $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode($response));
    }

    public function create()
    {
        // Verifica o token
        $tokenData = $this->verificarToken();
        if (!$tokenData) {
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(401)
                ->set_output(json_encode([
                    'message' => 'Token inválido ou expirado.'
                ]));
        }

        // Se o token é válido, continue com a criação do pedido
        $data = $this->request->getJSON();

        // Consulta dados de endereço por CEP
        $cep = $data->parametros->endereco->cep;
        $endereco = $this->consultarEnderecoPorCEP($cep);

        if (!$endereco) {
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(400)
                ->set_output(json_encode([
                    'message' => 'CEP não encontrado ou inválido.'
                ]));
        }

        // Adicione os dados do endereço aos dados do pedido
        $data->parametros->endereco = $endereco;

        // Crie o pedido
        $pedido = $this->pedidos_model->insert($data->parametros);

        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode([
                'message' => 'Pedido criado com sucesso',
                'pedido' => $pedido
            ]));
    }

    public function update($id)
    {
        // Verifica o token
        $tokenData = $this->verificarToken();
        if (!$tokenData) {
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(401)
                ->set_output(json_encode([
                    'message' => 'Token inválido ou expirado.'
                ]));
        }

        // Se o token é válido, continue com a atualização do pedido
        $data = $this->request->getJSON();

        // Consulta dados de endereço por CEP
        $cep = $data->parametros->endereco->cep;
        $endereco = $this->consultarEnderecoPorCEP($cep);

        if (!$endereco) {
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(400)
                ->set_output(json_encode([
                    'message' => 'CEP não encontrado ou inválido.'
                ]));
        }

        // Adicione os dados do endereço aos dados do pedido
        $data->parametros->endereco = $endereco;

        // Atualize o pedido
        $atualizado = $this->pedidos_model->update($id, $data->parametros);

        if ($atualizado) {
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(200)
                ->set_output(json_encode([
                    'message' => 'Pedido atualizado com sucesso'
                ]));
        } else {
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(400)
                ->set_output(json_encode([
                    'message' => 'Erro ao atualizar o pedido'
                ]));
        }
    }

    public function delete($id)
    {
        // Verifica o token
        $tokenData = $this->verificarToken();
        if (!$tokenData) {
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(401)
                ->set_output(json_encode([
                    'message' => 'Token inválido ou expirado.'
                ]));
        }

        // Se o token é válido, continue com a exclusão do pedido
        $excluido = $this->pedidos_model->delete($id);

        if ($excluido) {
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(200)
                ->set_output(json_encode([
                    'message' => 'Pedido excluído com sucesso'
                ]));
        } else {
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(400)
                ->set_output(json_encode([
                    'message' => 'Erro ao excluir o pedido'
                ]));
        }
    }
}
