<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelbarangmasuk extends Model
{
    protected $table            = 'barangmasuk';
    protected $primaryKey       = 'idfaktur';
    protected $allowedFields    = [
        'idfaktur', 'tglfaktur','totalharga'
    ];

}
