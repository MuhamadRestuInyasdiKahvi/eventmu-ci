<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Event extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_event' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'slug_event' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'slug_kategori' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'judul' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'penyelenggara' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'deskripsi' => [
                'type' => 'TEXT',
            ],
            'img_event' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'start_event' => [
                'type' => 'DATETIME',
            ],
            'end_event' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP',
        ]);
        $this->forge->addKey('id_event', true);
        $this->forge->createTable('events');
    }

    public function down()
    {
        $this->forge->dropTable('events');
    }
}
