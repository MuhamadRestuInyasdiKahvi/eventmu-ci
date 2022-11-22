<?php

namespace App\Models;

use CodeIgniter\Model;

class TentangWebsiteModel extends Model
{
    protected $table            = 'tentang_website';
    protected $primaryKey       = 'id_tentang';
    protected $returnType       = 'object';
    protected $allowedFields    = ['slogan','deskripsi','img_samping'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
