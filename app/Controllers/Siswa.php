<?php

namespace App\Controllers;

class Siswa extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }

    public function detail_siswa($id){
        echo"<h1>halo id siswa id kamu $id</h1>";
        $this->validation();
        // return view('welcome_message_kedua', $id);
    }

    protected function validation(){
        echo"ini merupakan fungsi validasi";
    }
}
