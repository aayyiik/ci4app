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

        $tombolcari = $this->request->getPost('tombolcari');

        if(isset($tombolcari)){
            $cari = $this->request->getPost('cari');
            session()->set('cari_barang', $cari);
            redirect()->to('/barang/index');
        }else{
            $cari = session()->get('cari_barang');
        }

        // if($databarang = $cari){
        //     $barang->tampilcari($cari)->paginate(10, 'barang');
        // }else{
        //     $barang->tampildata();
        // }
        $databarang = $cari ? $barang->tampilcari($cari): $barang->tampildata();

        $data = [
            'tampildata' => $barang->tampildata(),
            'pager' => $barang->pager,
        ];
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

        $kodebarang = $this->request->getVar('kodebarang');
        $namabarang = $this->request->getVar('namabarang');
        $spesifikasibarang = $this->request->getVar('spesifikasibarang');
        $kategoribarang = $this->request->getVar('kategoribarang');
        $satuanbarang = $this->request->getVar('satuanbarang');
        $stockbarang = $this->request->getVar('stockbarang');
        $hargabarang = $this->request->getVar('hargabarang');
        $gambarbarang = $this->request->getVar('gambarbarang');

        $validation = \Config\Services::validation();

        $valid = $this->validate([
            'kodebarang' => [
                'rules' => 'required',
                'label' => 'Kode barang',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ],
            ],

            'namabarang' => [
                'rules' => 'required',
                'label' => 'Nama barang',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ],
            ],

            'spesifikasibarang' => [
                'rules' => 'required',
                'label' => 'Spesifikasi Barang',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ],
            ],

            'hargabarang' => [
                'rules' => 'required',
                'label' => 'Harga Barang',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ],
            ],

            'stockbarang' => [
                'rules' => 'required',
                'label' => 'Stock Barang',
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

            'gambarbarang' => [
                'rules' => 'mime_in[gambarbarang,image/png,image/jpeg, image/jpg] |ext_in[gambarbarang,png,jpg,gif,jpeg]',
                'label' => 'Gambar Barang',
            ],
        ]);

        if (!$valid) {
            $pesan = [
                'error' =>
                '<div class="alert alert-danger">' . $validation->listErrors() . '</div>'
            ];
            session()->setFlashdata($pesan);
            return redirect()->to('/barang/formtambah');
        } else {
            $gambarbarang = $_FILES['gambarbarang']['name'];
            if($gambarbarang!=null){
                $namaFileGambar = $kodebarang;
                $fileGambar = $this->request->getFile('gambarbarang');
                $fileGambar->move('upload', $namaFileGambar. '.'.$fileGambar->getExtension());
            
                $pathGambar = 'upload/'.$fileGambar->getName();
            }else{
                $pathGambar = '';
            }

            $barang->insert([
                'brgkode' => $kodebarang,
                'brgnama' => $namabarang,
                'brgkatid' => $kategoribarang,
                'brgsatid' => $satuanbarang,
                'brgharga' => $hargabarang,
                'brgstock' => $stockbarang,
                'brgspesifikasi' => $spesifikasibarang,
                'brggambar' => $pathGambar
            ]);
            $pesan = [
                'sukses' => '<div class="alert alert-success"> Data barang Berhasil ditambah</div>'
            ];

            session()->setFlashdata($pesan);
            return redirect()->to('/barang/index');
        }
    }


    public function formedit($kode){

        $barang = model(Modelbarang::class);

        $cekData = $barang->find($kode);
        if ($cekData) {

            $kategori = model(Modelkategori::class);
            $satuan = model(Modelsatuan::class);

            $data = [
                'kodebarang' => $cekData['brgkode'],
                'namabarang' => $cekData['brgnama'],
                'kategoribarang' => $cekData['brgkatid'],
                'satuanbarang' => $cekData['brgsatid'],
                'spesifikasibarang' => $cekData['brgspesifikasi'],
                'stockbarang' => $cekData['brgstock'],
                'hargabarang' => $cekData['brgharga'],
                'gambarbarang' => $cekData['brggambar'],
                'datakategori' => $kategori->findAll(),
                'datasatuan' => $satuan->findAll()
            ];
            return view('barang/formedit', $data);

        } else {
            $pesan_error = [
                'error' =>
                '<div class="alert alert-danger">Data barang tidak ditemukan</div>'
            ];
        }

        session()->setFlashdata($pesan_error);
        return redirect()->to('/barang/index');

    }

    public function updatedata(){
        
        $barang = model(Modelbarang::class);

        $kodebarang = $this->request->getVar('kodebarang');
        $namabarang = $this->request->getVar('namabarang');
        $spesifikasibarang = $this->request->getVar('spesifikasibarang');
        $kategoribarang = $this->request->getVar('kategoribarang');
        $satuanbarang = $this->request->getVar('satuanbarang');
        $stockbarang = $this->request->getVar('stockbarang');
        $hargabarang = $this->request->getVar('hargabarang');
        $gambarbarang = $this->request->getVar('gambarbarang');

        $validation = \Config\Services::validation();

        $valid = $this->validate([

            'namabarang' => [
                'rules' => 'required',
                'label' => 'Nama barang',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ],
            ],

            'spesifikasibarang' => [
                'rules' => 'required',
                'label' => 'Spesifikasi Barang',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ],
            ],

            'hargabarang' => [
                'rules' => 'required',
                'label' => 'Harga Barang',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ],
            ],

            'stockbarang' => [
                'rules' => 'required',
                'label' => 'Stock Barang',
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

            'gambarbarang' => [
                'rules' => 'mime_in[gambarbarang,image/png,image/jpeg, image/jpg] |ext_in[gambarbarang,png,jpg,gif,jpeg]',
                'label' => 'Gambar Barang',
            ],
        ]);

        if (!$valid) {
            $pesan = [
                'error' =>
                '<div class="alert alert-danger">' . $validation->listErrors() . '</div>'
            ];
            session()->setFlashdata($pesan);
            return redirect()->to('/barang/formedit');
        } else {
            $cekData = $barang->find($kodebarang);
            $pathGambarLama = $cekData['brggambar'];

            $gambarbarang = $_FILES['gambarbarang']['name'];

            if($gambarbarang!=null){
                unlink($pathGambarLama);
            
                $namaFileGambar = $kodebarang;
                $fileGambar = $this->request->getFile('gambarbarang');
                $fileGambar->move('upload', $namaFileGambar. '.'.$fileGambar->getExtension());
            
                $pathGambar = 'upload/'.$fileGambar->getName();
            }else{
                $pathGambar = $pathGambarLama;
            }

            $barang->update($kodebarang, [
                'brgnama' => $namabarang,
                'brgkatid' => $kategoribarang,
                'brgsatid' => $satuanbarang,
                'brgharga' => $hargabarang,
                'brgstock' => $stockbarang,
                'brgspesifikasi' => $spesifikasibarang,
                'brggambar' => $pathGambar
            ]);
            $pesan = [
                'sukses' => '<div class="alert alert-success"> Data barang Berhasil ditambah</div>'
            ];

            session()->setFlashdata($pesan);
            return redirect()->to('/barang/index');
        }
    }

    public function delete($kode){
        $barang = model(Modelbarang::class);

        $cekData = $barang->find($kode);

        if($cekData){
            $pathGambarLama = $cekData['brggambar'];
            unlink($pathGambarLama);
            $barang->delete($kode);

            $pesan = [
                'sukses' => '<div class="alert alert-danger"> Data barang Berhasil dihapus</div>'
            ];

            session()->setFlashdata($pesan);
            return redirect()->to('/barang/index');

        }else{
            exit('data tidak ditemukan');
        }
    }

}
