<?php

namespace App\Models;

use CodeIgniter\Model;

class Modeldetailbarangmasuk extends Model
{
    protected $table            = 'detailbarangmasuk';
    protected $primaryKey       = 'iddetail';
    protected $allowedFields    = [
         'detidfaktur', 'detbrgkode','dethargamasuk','dethargajual','detjumlah','detsubtotal'
    ];
}
