<?php

namespace App\Models;

use CodeIgniter\Model;

class Modeltempbarangmasuk extends Model
{
    protected $table            = 'tempbarangmasuk';
    protected $primaryKey       = 'iddetail';
    protected $allowedFields    = [
         'detidfaktur', 'detbrgkode','dethargamasuk','dethargajual','detjumlah','detsubtotal'
    ];

    public function tampilDataTemp($idfaktur){
        return $this->table('tempbarangmasuk')->join('barang', 'brgkode = detbrgkode')->where(['detidfaktur' => $idfaktur])->get();
    }
    
   
}
