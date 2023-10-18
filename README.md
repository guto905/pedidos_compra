# API de Cadastro de Pedidos de Compra

Esta é uma API REST desenvolvida em PHP utilizando o framework CodeIgniter e um banco de dados relacional MySQL. Ela permite o cadastro, consulta, atualização e exclusão de clientes, produtos e pedidos de compra.

Requisitos
PHP 7.0 ou superior
MySQL
CodeIgniter 3.x
Composer (para instalação de dependências)
Instalação
Configuração do Banco de Dados:

Crie um banco de dados MySQL para a aplicação.
Configure as credenciais do banco de dados no arquivo app/config/database.php.
Migrações:

Utilize as migrações do CodeIgniter para criar as tabelas necessárias. Execute os comandos no terminal:
Copy code
php index.php migrate create_clientes
php index.php migrate create_produtos
php index.php migrate create_pedidos
Modelos e Controladores:

Crie os modelos e controladores para cada recurso (Clientes, Produtos e Pedidos) e configure as rotas.
Autenticação JWT:

Para a autenticação JWT, é necessário configurar uma chave secreta no arquivo app/config/jwt.php.
Executando o Servidor Local:

Inicie um servidor local usando o PHP:
Copy code
php -S localhost:8000
O servidor estará rodando em http://localhost:8000.
Uso
A API aceita e retorna dados no formato JSON. Abaixo estão os endpoints disponíveis:

Clientes
Listar Todos os Clientes

Método: GET
Endpoint: /clientes
Parâmetros de Paginação e Filtro: page, per_page, filter
Exibir Detalhes de um Cliente

Método: GET
Endpoint: /clientes/{id}
Criar um Cliente

Método: POST
Endpoint: /clientes
Corpo da Requisição (JSON):
json
Copy code
{
  "parametros": {
    "cpf_cnpj": "12345678900",
    "nome_razao_social": "Nome Cliente",
    "endereco": "Endereço do Cliente"
  }
}
Atualizar um Cliente

Método: PUT
Endpoint: /clientes/{id}
Corpo da Requisição (JSON):
json
Copy code
{
  "parametros": {
    "nome_razao_social": "Novo Nome do Cliente",
    "endereco": "Novo Endereço do Cliente"
  }
}
Excluir um Cliente

Método: DELETE
Endpoint: /clientes/{id}
Produtos
(Adapte e descreva aqui os endpoints para os produtos, seguindo o mesmo padrão dos clientes)
Pedidos
(Adapte e descreva aqui os endpoints para os pedidos, seguindo o mesmo padrão dos clientes)
Consulta de Dados de Endereço por CEP
(Explique como a API consulta dados de endereço por CEP, se aplicável)
Token JWT
(Explique como gerar e utilizar o token JWT para autenticação)
Contribuindo
(Adicione informações sobre como os colaboradores podem contribuir com o projeto)
Licença
Este projeto está sob a licença MIT - veja o arquivo LICENSE para detalhes.
