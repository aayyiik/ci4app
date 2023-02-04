<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Modelbarang;

class Barang extends BaseController
{

    private $findAll;
    public function __construct()
    {
        $barang = model(Modelbarang::class);
        
        $this->findAll=[
            'tampildata' => $barang->table('barang')->findAll()
        ];
    }
    public function index()
    {
        $data = [
            'tampildata' => $this->findAll['tampildata']
        ];

        return view('barang/viewbarang', $data);
    }
}
