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
        $this->findAll = [
            'tampildata' => $barang->table('barang')->findAll(),
            'tampilkat' => $kategori->table('kategori')->findAll(),
            'tampilsat' => $satuan->table('satuan')->findAll()
        ];

        // $this->barang = new Modelbarang();
    }
    public function index()
    {

        $barang = model(Modelbarang::class);

        $data = [
            'tampildata' => $barang->tampildata()
        ];

        // $data = [
        //     'tampildata' => $this->barang->tampildata()
        // ];
        return view('barang/viewbarang', $data);
    }

    public function formtambah()
    {
        $data = [
            'tampilkat' => $this->findAll['tampilkat'],
            'tampilsat' => $this->findAll['tampilsat']
        ];
        return view('barang/formtambah', $data);
    }

    public function simpandata()
    {

        $barang = model(Modelbarang::class);

        $namabarang = $this->request->getVar('namabarang');
        $hargabarang = $this->request->getVar('hargabarang');
        $kategoribarang = $this->request->getVar('kategoribarang');
        $satuanbarang = $this->request->getVar('satuanbarang');

        $validation = \Config\Services::validation();

        $valid = $this->validate([
            'namabarang' => [
                'rules' => 'required',
                'label' => 'Nama barang',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ],
            ],

            'hargabarang' => [
                'ruler' => 'required',
                'label' => 'Harga Barang',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ],
            ],

            'kategoribarang' => [
                'rules' => 'required',
                'label' => 'Kategori Barang',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ],
            ],

            'satuanbarang' => [
                'rules' => 'required',
                'label' => 'Satuan Barang',
                'errors' => [
                    '{field} tidak boleh kosong'
                ],
            ],
        ]);

        if (!$valid) {
            $pesan = [
                'errorNamabarang' =>
                '<br><div class="alert alert-danger">' . $validation->getError('namabarang') . '</div>',
                'errorHargabarang' => 
                '<br><div class="alert alert-danger">' . $validation->getError('hargabarang') . '</div>',
                'errorKategoribarang' =>
                '<br><div class="alert alert-danger">' . $validation->getError('kategoribarang') . '</div>',
                'errorSatuanbarang' => 
                '<br><div class="alert alert-danger">' . $validation->getError('satuanbarang') . '</div>',
            ];

            session()->setFlashdata($pesan);
            return redirect()->to('/barang/formtambah');
        } else {

            $barang->insert([
                'brgnama' => $namabarang,
                'brgharga' => $hargabarang,
                'brgkatid' => $kategoribarang,
                'brgsatid' => $satuanbarang
            ]);


            $pesan = [
                'sukses' => '<div class="alert alert-success"> Data barang Berhasil ditambah</div>'
            ];

            session()->setFlashdata($pesan);
            return redirect()->to('/barang/index');
        }
    }
}
