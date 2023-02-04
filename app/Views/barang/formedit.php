<?= $this->extend('main/layouts') ?>

<?= $this->section('judul') ?>
Form Edit Barang
<?= $this->endSection('judul') ?>

<?= $this->section('subjudul') ?>

<?= form_button('', '<i class="fa fa-backward"></i> kembali', [
    'class' => 'btn btn-info',
    'onclick' => "location.href=('" . site_url('barang/index') . "')"

]);

?>
<?= $this->endSection('subjudul') ?>

<?= $this->section('isi') ?>
<?= form_open_multipart('barang/updatedata') ?>
<div class="card-body">

<?= session()->getFlashdata('error'); ?>

    <div class="form-group">
        <label for="namabarang">Kode barang</label>
        <?= form_input('kodebarang', $kodebarang, [
            'class' => 'form-control',
            'id' => 'kodebarang',
            'autofocus' => true,
        ]) ?> 
    </div>

    <div class="form-group">
        <label for="namabarang">Nama barang</label>
        <?= form_input('namabarang', $namabarang, [
            'class' => 'form-control',
            'id' => 'namabarang',
            'autofocus' => true,
        ]) ?>
    </div>

    <div class="form-group">
        <label for="kategoribarang">Kategori Barang</label>
        <select class="custom-select form-control-border" name="kategoribarang" id="kategoribarang">
            <?php foreach ($datakategori as $value) : ?>
                <?php if($value['katid'] == $kategoribarang) : ?>
                    <option selected value="<?= $value['katid']; ?>"><?= $value['katnama']; ?></option>
                <?php else : ?>
                    <option value="<?= $value['katid']; ?>"><?= $value['katnama']; ?></option>
                <?php endif; ?>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group">
        <label for="satuanbarang">Satuan Barang</label>
        <select class="custom-select form-control-border" name="satuanbarang"  id="satuanbarang">
            <?php foreach ($datasatuan as $value) : ?>
                <?php if($value['satid'] == $satuanbarang) : ?>
                    <option selected value="<?= $value['satid']; ?>"><?= $value['satnama']; ?></option>
                <?php else : ?>
                    <option value="<?= $value['satid']; ?>"><?= $value['satnama']; ?></option>
                <?php endif; ?>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group">
        <label for="spesifikasibarang">Spesifikasi barang</label>
        <?= form_input('spesifikasibarang', $spesifikasibarang, [
            'class' => 'form-control',
            'id' => 'spesifikasibarang',
            'autofocus' => true,
        ]) ?>
    </div>

    <div class="form-group">
        <label for="hargabarang">Harga</label>
        <?= form_input('hargabarang', $hargabarang, [
            'class' => 'form-control',
            'id' => 'hargabarang',
            'autofocus' => true,
            'placeholder' => 'isikan harga barang'
        ]) ?>
    </div>

    <div class="form-group">
        <label for="hargabarang">Stock</label>
        <?= form_input('stockbarang', $stockbarang, [
            'class' => 'form-control',
            'id' => 'stockbarang',
            'autofocus' => true,
            'placeholder' => 'isikan stock barang'
        ]) ?>
    </div>
    
    <div class="form-group">
        <label for="exampleInputFile">Gambar</label>
                <img src="<?= base_url(). '/' . $gambarbarang ?>" class="img-thumbnail" style="width: 40%;">       
    </div>

    <div class="form-group">
        <div class="input-group">
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="gambarbarang" name="gambarbarang">
                <label class="custom-file-label" for="gambarbarang"></label>
            </div>
        </div>
    </div>

</div>

<div class="card-footer">
    <?= form_submit('', 'Simpan', [
        'class' => 'btn btn-primary'
    ]) ?>

</div>
<?= form_close(); ?>
<?= $this->endSection('isi') ?>