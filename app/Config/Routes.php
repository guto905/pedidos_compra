<?php

defined('BASEPATH') or exit('No direct script access allowed');

$routes->get('/clientes', 'Clientes::index'); // Listar todos os clientes
$routes->get('/clientes/(:num)', 'Clientes::show/$1'); // Exibir detalhes de um cliente específico
$routes->post('/clientes', 'Clientes::create'); // Criar um novo cliente
$routes->put('/clientes/(:num)', 'Clientes::update/$1'); // Atualizar um cliente
$routes->delete('/clientes/(:num)', 'Clientes::delete/$1'); // Excluir um cliente

$routes->get('/produtos', 'Produtos::index'); // Listar todos os produtos
$routes->get('/produtos/(:num)', 'Produtos::show/$1'); // Exibir detalhes de um produto específico
$routes->post('/produtos', 'Produtos::create'); // Criar um novo produto
$routes->put('/produtos/(:num)', 'Produtos::update/$1'); // Atualizar um produto
$routes->delete('/produtos/(:num)', 'Produtos::delete/$1'); // Excluir um produto

$routes->get('/pedidos', 'Pedidos::index'); // Listar todos os pedidos
$routes->get('/pedidos/(:num)', 'Pedidos::show/$1'); // Exibir detalhes de um pedido específico
$routes->post('/pedidos', 'Pedidos::create'); // Criar um novo pedido
$routes->put('/pedidos/(:num)', 'Pedidos::update/$1'); // Atualizar um pedido
$routes->delete('/pedidos/(:num)', 'Pedidos::delete/$1'); // Excluir um pedido

$routes->get('/', 'Welcome::index');
$routes->get('404_override', 'Errors::show_404');
$routes->get('translate_uri_dashes', false);
