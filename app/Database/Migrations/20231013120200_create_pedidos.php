<?php
namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePedidos extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'status' => [
                'type'       => 'ENUM',
                'constraint' => ['Em Aberto', 'Pago', 'Cancelado'],
                'default'    => 'Em Aberto',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('pedidos');
    }

    public function down()
    {
        $this->forge->dropTable('pedidos');
    }
}
