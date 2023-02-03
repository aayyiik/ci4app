<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Modelkategori;

class Kategori extends BaseController
{

    private $findAll;

    public function __construct()
    {

        $kategori = model(Modelkategori::class);

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

    public function simpandata()
    {

        $kategori = model(Modelkategori::class);

        $namakategori = $this->request->getVar('namakategori');

        $validation = \Config\Services::validation();

        $valid = $this->validate([
            'namakategori' => [
                'rules' => 'required',
                'label' => 'Nama Kategori',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ],
            ],
        ]);

        if (!$valid) {
            $pesan = [
                'errorNamaKategori' =>
                '<br><div class="alert alert-danger">' . $validation->getError('namakategori') . '</div>'
            ];

            session()->setFlashdata($pesan);
            return redirect()->to('/kategori/formtambah');
        } else {

            $kategori->insert([
                'katnama' => $namakategori
            ]);


            $pesan = [
                'sukses' => '<div class="alert alert-success"> Data Kategori Berhasil ditambah</div>'
            ];

            session()->setFlashdata($pesan);
            return redirect()->to('/kategori/index');
        }
    }

    public function formedit($id){
        $kategori = model(Modelkategori::class);

        $rowData = $kategori->find($id);

        if($rowData){
            $data = [
                'id' => $id,
                'nama' => $rowData['katnama']
            ];
            return view('kategori/formedit', $data);

        }else{
            exit("data tidak ditemukan");
        }
    }

    public function update(){
        
        $kategori = model(Modelkategori::class);

        $namakategori = $this->request->getVar('namakategori');

        $validation = \Config\Services::validation();

        $valid = $this->validate([
            'namakategori' => [
                'rules' => 'required',
                'label' => 'Nama Kategori',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ],
            ],
        ]);

        if (!$valid) {
            $pesan = [
                'errorNamaKategori' =>
                '<br><div class="alert alert-danger">' . $validation->getError('namakategori') . '</div>'
            ];

            session()->setFlashdata($pesan);
            return redirect()->to('/kategori/formtambah');
        } else {

            $kategori->insert([
                'katnama' => $namakategori
            ]);


            $pesan = [
                'sukses' => '<div class="alert alert-success"> Data Kategori Berhasil ditambah</div>'
            ];

            session()->setFlashdata($pesan);
            return redirect()->to('/kategori/index');
        }
    }
}
