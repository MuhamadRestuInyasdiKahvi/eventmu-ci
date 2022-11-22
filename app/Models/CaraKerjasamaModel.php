<?php

namespace App\Models;

use CodeIgniter\Model;

class CaraKerjasamaModel extends Model
{
    protected $table            = 'cara_kerjasama';
    protected $primaryKey       = 'id_cara_kerjasama';
    protected $returnType       = 'object';
    protected $allowedFields    = ['title', 'keterangan', 'icon_cara_kerjasama'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
