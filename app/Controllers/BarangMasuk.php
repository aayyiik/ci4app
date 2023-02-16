<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class BarangMasuk extends BaseController
{
    public function index()
    {
        
    }

    public function formtambah(){
        return view('barangmasuk/formbarangmasuk');
    }
}
