<?php

namespace App\Models;

use CodeIgniter\Model;

class EventModel extends Model
{
    protected $table            = 'events';
    protected $primaryKey       = 'id_event';
    protected $returnType       = 'object';
    protected $allowedFields    = ['slug_event', 'slug_kategori', 'judul', 'penyelenggara', 'deskripsi', 'img_event', 'start_event', 'end_event'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
