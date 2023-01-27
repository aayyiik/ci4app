<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;

class Siswa extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }
}
