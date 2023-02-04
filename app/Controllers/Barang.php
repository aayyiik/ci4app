<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Modelbarang;
use App\Models\Modelkategori;
use App\Models\Modelsatuan;

class Barang extends BaseController
{

    private $findAll;

    public function __construct()
    {
        $barang = model(Modelbarang::class);
        $kategori = model(Modelkategori::class);
        $satuan = model(Modelsatuan::class);
        $this->findAll=[
            'tampildata' => $barang->table('barang')->findAll(),
            'tampilkat' => $kategori->table('kategori')->findAll(),
            'tampilsat' => $satuan->table('satuan')->findAll()
        ];

    }
    public function index()
    {
        $data = [
            'tampildata' => $this->findAll['tampildata']
        ];

        return view('barang/viewbarang', $data);
    }

    public function formtambah(){

        $data = [
            'tampilkat' => $this->findAll['tampilkat'],
            'tampilsat' => $this->findAll['tampilsat']
        ];

       
        return view('barang/formtambah', $data);
    }
}
