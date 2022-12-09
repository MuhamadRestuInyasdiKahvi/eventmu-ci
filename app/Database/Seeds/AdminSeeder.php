<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'email' => 'admin@admin.com',
            'username' => 'admin',
            'password' => password_hash('admin123', PASSWORD_BCRYPT),
        ];
        $this->db->table('admins')->insert($data);
    }
}
