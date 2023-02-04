<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelbarang extends Model
{
    protected $table            = 'barang';
    protected $primaryKey       = 'brgkode';
    protected $allowedFields    = [
        'brgkode', 'brgnama', 'brgkatid', 'btgsatid'
    ];

    function getAll(){
        $builder = $this->db->table('kategori');
        $builder->join('kategori', 'kategori.katid = barang.brgkatid');
        $query = $builder->get();
        return $query->getResult();
    }
}
