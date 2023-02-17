<?= $this->extend('main/layouts'); ?>
<?= $this->section('judul'); ?>
Barang Masuk
<?= $this->endSection('judul'); ?>
<?= $this->section('subjudul'); ?>

<?= $this->endSection('subjudul'); ?>
<?= $this->section('isi'); ?>

<div class="form-row">
    <div class="form-group col-md-6">
        <label for="inputCity" class="form-label">No. Faktur Barang Masuk</label>
        <input type="text" class="form-control" id="detidfaktur" name="detidfaktur">
    </div>
    <div class="form-group col-md-6">
        <label for="inputCity" class="form-label">Tgl. Barang Masuk</label>
        <input type="date" class="form-control" id="tglbrgmasuk" name="dettglfaktur" value="<?= ('Y-m-d') ?>">
    </div>
</div>

<div class="card">
    <div class="card-header">
        Card Data Barang
    </div>
    <div class="card-body">
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="kodebarang" class="form-label">Kode Barang</label>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Kode Barang">
                    <button class="btn btn-outline-primary" type="button" id="btncaribarang">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>

            <div class="form-group col-md-3">
                <label for="namabarang" class="form-label">Nama Barang</label>
                <input type="text" class="form-control" id="namabarang" name="namabarang" readonly>
            </div>

            <div class="form-group col-md-2">
                <label for="namabarang" class="form-label">Harga Jual</label>
                <input type="text" class="form-control" id="namabarang" name="namabarang" readonly>
            </div>

            <div class="form-group col-md-2">
                <label for="namabarang" class="form-label">Harga Beli</label>
                <input type="text" class="form-control" id="namabarang" name="namabarang">
            </div>

            <div class="form-group col-md-1">
                <label for="namabarang" class="form-label">Jumlah</label>
                <input type="text" class="form-control" id="namabarang" name="namabarang">
            </div>

            <div class="form-group col-md-1">
                <label for="namabarang" class="form-label">Aksi</label><br>
                <button class="btn btn-sm btn-info" type="button" id="add">
                    <i class="fa fa-plus-square"></i>
                </button>
                <button class="btn btn-sm btn-warning" type="button" id="reload">
                    <i class="fa fa-sync-alt"></i>
                </button>
            </div>

        </div>

    </div>
</div>

<?= $this->endSection('isi'); ?>