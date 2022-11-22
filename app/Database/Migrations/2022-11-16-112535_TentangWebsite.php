<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TentangWebsite extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_tentang' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'slogan' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'deskripsi' => [
                'type' => 'TEXT',
            ],
            'img_samping' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP',
        ]);
        $this->forge->addKey('id_tentang', true);
        $this->forge->createTable('tentang_website');
    }

    public function down()
    {
        $this->forge->dropTable('tentang_website');
    }
}
