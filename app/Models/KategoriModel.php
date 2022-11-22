<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{
    protected $table            = 'kategori_event';
    protected $primaryKey       = 'id_kategori';
    protected $returnType       = 'object'; //array => default
    protected $allowedFields    = ['nama_kategori','slug_kategori'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
