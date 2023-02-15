<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelbarang extends Model
{
    protected $table            = 'barang';
    protected $primaryKey       = 'brgkode';
    protected $allowedFields    = [
        'brgkode', 'brgnama', 'brgkatid', 'brgsatid', 'brgharga', 'brgstock', 'brgspesifikasi', 'brggambar'
    ];

    function tampildata(){
        return $this->table('barang')->join('kategori', 'brgkatid = katid')->join('satuan', 'brgsatid = satid');
    }

    function tampilcari($cari){
        return $this->table('barang')->join('kategori', 'brgkatid = katid')->join('satuan', 'brgsatid = satid')->orlike('brgkode',$cari)->orlike('brgnama',$cari);
    }


}
