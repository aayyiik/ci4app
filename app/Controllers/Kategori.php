<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Modelkategori;

class Kategori extends BaseController
{

    private $findAll;

    public function __construct()
    {
        $kategori = new Modelkategori();

        $this->findAll = [
            'tampildata' => $kategori->table('kategori')->findAll()
        ];
    }
        
    public function index()
    {
        $data = [
            'tampildata' => $this->findAll['tampildata']
        ];
        return view('kategori/viewkategori', $data);
    }

    public function formtambah()
    {
        return view('kategori/formtambah');
    }
}
