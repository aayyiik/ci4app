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
                'sukses' => '<div class="alert alert-success"> Data satuan Berhasil ditambah</div>'
            ];

            session()->setFlashdata($pesan);
            return redirect()->to('/satuan/index');
        }
    }

    public function formedit($id){
        $satuan = model(Modelsatuan::class);

        $rowData = $satuan->find($id);

        if($rowData){
            $data = [
                'id' => $id,
                'nama' => $rowData['satnama']
            ];
            return view('satuan/formedit', $data);

        }else{
            exit("data tidak ditemukan");
        }
    }

    public function updatedata(){
        
        $satuan = model(Modelsatuan::class);

        $idsatuan = $this->request->getVar('idsatuan');
        $namasatuan = $this->request->getVar('namasatuan');

        $validation = \Config\Services::validation();

        $valid = $this->validate([
            'namasatuan' => [
                'rules' => 'required',
                'label' => 'Nama satuan',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ],
            ],
        ]);

        if (!$valid) {
            $pesan = [
                'errorNamasatuan' =>
                '<br><div class="alert alert-danger">' . $validation->getError('namasatuan') . '</div>'
            ];

            session()->setFlashdata($pesan);
            return redirect()->to('/satuan/formedit/'.$idsatuan);
        } else {

            $satuan->update($idsatuan, [
                'katnama' => $namasatuan
            ]);


            $pesan = [
                'sukses' => '<div class="alert alert-success"> Data satuan Berhasil ditambah</div>'
            ];

            session()->setFlashdata($pesan);
            return redirect()->to('/satuan/index');
        }
    }

    public function delete($id){
        $satuan = model(Modelsatuan::class);

        $rowData = $satuan->find($id);

        if($rowData){
            $satuan->delete($id);

            $pesan = [
                'sukses' => '<div class="alert alert-danger"> Data satuan Berhasil dihapus</div>'
            ];

            session()->setFlashdata($pesan);
            return redirect()->to('/satuan/index');

        }else{
            exit('data tidak ditemukan');
        }
    }
}
