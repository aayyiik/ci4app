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

    public function formtambah(){
        return view('barangmasuk/formbarangmasuk');
    }

    public function dataTemp(){
        if($this->request->isAJAX()){
            //menangkap parameter faktur di data daktur
            $faktur = $this->request->getPost('faktur');

            $modelTemp = new Modeltempbarangmasuk();
            $data = [
                'datatemp' => $modelTemp->tampilDataTemp($faktur)
            ];

            $json = [
                'data' => view('barangmasuk/dataTemp',$data)
            ];
            echo json_encode($json);

        }else{
            exit('maaf tidak dapat dipanggil');
        }
    }

    public function ambilDataBarang(){
        if($this->request->isAJAX()){
            $kodebarang = $this->request->getPost('kodebarang');

            $modelbarang = new Modelbarang();
            $ambilData = $modelbarang->find($kodebarang);

            if($ambilData == NULL){
                $json = [
                    'error' => 'Maaf Barang Tidak Ditemukan'
                ];
            }else{
                $data = [
                    'namabarang' => $ambilData['brgnama'],
                    'hargajual' => $ambilData['brgharga']
                ];
    
                $json = [
                    'sukses' => $data
                ];
    
            }
        
            echo json_encode($json);
        }else{
            exit('data tidak bisa diambil');
        }
    }
}
