<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BarangMasuk extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'idfaktur' => [
                'type' => 'char',
                'constraint' => '20',
            ],
            'tglfaktur' => [
                'type' => 'date',
            ],
            'totalharga' => [
                'type' => 'double',
            ]
            ]);

            $this->forge->addPrimaryKey('idfaktur');
            $this->forge->createTable('barangmasuk');
    }

    public function down()
    {
        $this->forge->dropTable('barangmasuk');
    }
}
