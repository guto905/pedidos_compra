<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Firebase\JWT\JWT;

class Clientes extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('clientes_model');
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

    public function index()
    {
        // Implemente a listagem de clientes aqui

        // Implementação de paginação
        $page = $this->input->get('page') ? $this->input->get('page') : 1;
        $per_page = $this->input->get('per_page') ? $this->input->get('per_page') : 10;

        // Implementação de filtro de dados
        $filter = $this->input->get('filter');

        $clientes = $this->clientes_model->getPaginatedClientes($page, $per_page, $filter);

        // Exemplo de retorno JSON
        $response = array(
            'cabecalho' => array(
                'status' => 200,
                'mensagem' => 'Dados retornados com sucesso'
            ),
            'retorno' => $clientes
        );

        $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode($response));
    }

    public function show($id)
    {
        // Implemente a exibição de detalhes de um cliente aqui

        // Exemplo de retorno JSON
        $response = array(
            'cabecalho' => array(
                'status' => 200,
                'mensagem' => 'Dados retornados com sucesso'
            ),
            'retorno' => array(
                // Detalhes do cliente
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

        // Se o token é válido, continue com a criação do cliente
        $data = $this->request->getJSON();

        // Crie o cliente
        $cliente = $this->clientes_model->insert($data->parametros);

        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode([
                'message' => 'Cliente criado com sucesso',
                'cliente' => $cliente
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

        // Se o token é válido, continue com a atualização do cliente
        $data = $this->request->getJSON();

        // Atualize o cliente
        $atualizado = $this->clientes_model->update($id, $data->parametros);

        if ($atualizado) {
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(200)
                ->set_output(json_encode([
                    'message' => 'Cliente atualizado com sucesso'
                ]));
        } else {
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(400)
                ->set_output(json_encode([
                    'message' => 'Erro ao atualizar o cliente'
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

        // Se o token é válido, continue com a exclusão do cliente
        $excluido = $this->clientes_model->delete($id);

        if ($excluido) {
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(200)
                ->set_output(json_encode([
                    'message' => 'Cliente excluído com sucesso'
                ]));
        } else {
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(400)
                ->set_output(json_encode([
                    'message' => 'Erro ao excluir o cliente'
                ]));
        }
    }
}
