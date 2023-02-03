<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Satuan extends BaseController
{
    private $findAll;
    public function __construct()
    {
        $satuan = model(Modelsatuan::class);

        $this->findAll = [
            'tampildata' => $satuan->table('satuan')->findAll()
        ];
    }
    public function index()
    {
        $data = [
            'tampildata' => $this->findAll['tampildata']
        ];
        return view('satuan/viewsatuan', $data);
    }

    public function formtambah(){

    }
}
