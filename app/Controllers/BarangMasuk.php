<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Modelbarang;
use App\Models\Modelbarangmasuk;
use App\Models\Modeltempbarangmasuk;

class BarangMasuk extends BaseController
{
    public function index()
    {
    }

    public function formtambah()
    {
        return view('barangmasuk/formbarangmasuk');
    }

    public function dataTemp()
    {
        if ($this->request->isAJAX()) {
            //menangkap parameter faktur di data daktur
            $faktur = $this->request->getPost('faktur');

            $modelTemp = new Modeltempbarangmasuk();
            $data = [
                'datatemp' => $modelTemp->tampilDataTemp($faktur)
            ];

            $json = [
                'data' => view('barangmasuk/dataTemp', $data)
            ];
            echo json_encode($json);
        } else {
            exit('maaf tidak dapat dipanggil');
        }
    }

    public function ambilDataBarang()
    {
        if ($this->request->isAJAX()) {
            $kodebarang = $this->request->getPost('kodebarang');

            $modelbarang = new Modelbarang();
            $ambilData = $modelbarang->find($kodebarang);

            if ($ambilData == NULL) {
                $json = [
                    'error' => 'Maaf Barang Tidak Ditemukan'
                ];
            } else {
                $data = [
                    'namabarang' => $ambilData['brgnama'],
                    'hargajual' => $ambilData['brgharga']
                ];

                $json = [
                    'sukses' => $data
                ];
            }

            echo json_encode($json);
        } else {
            exit('data tidak bisa diambil');
        }
    }


    public function simpanTemp()
    {
        if ($this->request->isAJAX()) {
            $idfaktur = $this->request->getPost('idfaktur');
            $kdbarang = $this->request->getPost('kdbarang');
            $hargajual = $this->request->getPost('hargajual');
            $hargabeli = $this->request->getPost('hargabeli');
            $jumlah = $this->request->getPost('jumlah');

            $modelTempBarang = new Modeltempbarangmasuk();

            $modelTempBarang->insert([
                'iddetail' => 1,
                'detidfaktur' => $idfaktur,
                'detbrgkode' => $kdbarang,
                'dethargamasuk' => $hargabeli,
                'dethargajual' => $hargajual,
                'detjumlah' => $jumlah,
                'detsubtotal' => intval($jumlah) * intval($hargabeli)
            ]);

            $json = [
                'sukses' => 'item berhasil ditambahkan'
            ];
            echo json_encode($json);
        } else {
            exit('Maaf data tidak dapat disimpan');
        }
    }
}

//error di iddetail tabel temp barang masuk
//membuat id otomatis auto_increment