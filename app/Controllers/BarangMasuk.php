<?php

namespace App\Controllers;

use App\Controllers\BaseController;
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
}
