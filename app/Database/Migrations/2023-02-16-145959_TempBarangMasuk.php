<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TempBarangMasuk extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'iddetail' => [
                'type' => 'bigint',
                'auto_increment' => true
            ],
            'detidfaktur' => [
                'type' => 'char',
                'constraint' => '10'
            ],
            'detbrgkode' => [
                'type' => 'char',
                'constraint' => '10'
            ],
            'dethargamasuk' => [
                'type' => 'double',
            ],
            'dethargajual' => [
                'type' => 'double',
            ],
            'detjumlah' => [
                'type' => 'int',
            ],
            'detsubtotal' => [
                'type' => 'double'
            ]
            ]);

            $this->forge->addPrimaryKey('iddetail');
            $this->forge->createTable('tempbarangmasuk');
    }

    public function down()
    {
        $this->forge->dropTable('tempbarangmasuk');
    }
}
