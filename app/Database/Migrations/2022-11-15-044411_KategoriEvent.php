<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class KategoriEvent extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_kategori' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_kategori' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'slug_kategori' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP',
        ]);
        $this->forge->addKey('id_kategori', true);
        $this->forge->createTable('kategori_event');
    }

    public function down()
    {
        $this->forge->dropTable('kategori_event');
    }
}
