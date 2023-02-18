<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DetailBarangMasuk extends Migration
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
                'constraint' => '5'
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
                'type' => 'double',
            ]
            ]);

            $this->forge->addPrimaryKey('iddetail');
            $this->forge->addForeignKey('detidfaktur', 'barangmasuk', 'idfaktur');
            $this->forge->addForeignKey('detbrgkode', 'barang','brgkode');

            $this->forge->createTable('detailbarangmasuk');
    }

    public function down()
    {
        $this->forge->dropTable('detailbarangmasuk');
    }
}
