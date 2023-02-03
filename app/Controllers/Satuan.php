<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Modelsatuan;

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
        return view('satuan/formtambah');
    }
    
    public function simpandata()
    {
        $satuan = model(Modelsatuan::class);

        $namasatuan = $this->request->getVar('namasatuan');

        $validation = \Config\Services::validation();

        $valid = $this->validate([
            'namasatuan' => [
                'rules' => 'required',
                'label' => 'Nama Satuan',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ],
            ],
        ]);

        if (!$valid) {
            $pesan = [
                'errorNamaSatuan' =>
                '<br><div class="alert alert-danger">' . $validation->getError('namasatuan') . '</div>'
            ];

            session()->setFlashdata($pesan);
            return redirect()->to('/satuan/formtambah');
        } else {

            $satuan->insert([
                'satnama' => $namasatuan
            ]);


            $pesan = [
                'sukses' => '<div class="alert alert-success"> Data Kategori Berhasil ditambah</div>'
            ];

            session()->setFlashdata($pesan);
            return redirect()->to('/satuan/index');
        }
    }

}
