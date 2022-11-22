<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CaraBayar extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_cara_kerjasama' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'title' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'keterangan' => [
                'type' => 'TEXT',
            ],
            'icon_cara_kerjasama' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP',
        ]);
        $this->forge->addKey('id_cara_kerjasama', true);
        $this->forge->createTable('cara_kerjasama');
    }

    public function down()
    {
        $this->forge->dropTable('cara_kerjasama');
    }
}
