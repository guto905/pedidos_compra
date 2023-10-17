<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$autoload['packages'] = array();
$autoload['libraries'] = array('database', 'session', 'form_validation'); // Adicione as bibliotecas que você deseja carregar automaticamente.
$autoload['drivers'] = array();
$autoload['helper'] = array('url', 'form', 'file'); // Adicione os helpers que você deseja carregar automaticamente.
$autoload['config'] = array();
$autoload['language'] = array();
$autoload['model'] = array('clientes_model', 'produtos_model', 'pedidos_model'); // Adicione os modelos que você deseja carregar automaticamente.
