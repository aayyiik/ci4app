<?= $this->extend('main/layouts') ?>

<?= $this->section('judul') ?>
Form Tambah Barang
<?= $this->endSection('judul') ?>

<?= $this->section('subjudul') ?>

<?= form_button('', '<i class="fa fa-backward"></i> kembali', [
    'class' => 'btn btn-info',
    'onclick' => "location.href=('" . site_url('barang/index') . "')"

]);

?>
<?= $this->endSection('subjudul') ?>

<?= $this->section('isi') ?>
<?= form_open('barang/simpandata') ?>
<div class="card-body">
    <div class="form-group">
        <label for="namabarang">Nama barang</label>
        <?= form_input('namabarang', '', [
            'class' => 'form-control',
            'id' => 'namabarang',
            'autofocus' => true,
            'placeholder' => 'isikan nama barang'
        ]) ?>
    </div>
    <?= session()->getFlashdata('errorNamabarang'); ?>

    <div class="form-group">
        <label for="kategoribarang">Kategori Barang</label>
        <select class="custom-select form-control-border">
            <option>--Pilih--</option>
            <?php foreach ($tampilkat as $value) : ?>
                <option value="<?= $value['katid']; ?>"><?= $value['katnama']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group">
        <label for="satuanbarang">Satuan Barang</label>
        <select class="custom-select form-control-border">
            <option>--Pilih--</option>
            <?php foreach ($tampilsat as $value) : ?>
                <option value="<?= $value['satid']; ?>"><?= $value['satnama']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group">
        <label for="hargabarang">Harga</label>
        <?= form_input('hargabarang', '', [
            'class' => 'form-control',
            'id' => 'hargabarang',
            'autofocus' => true,
            'placeholder' => 'isikan harga barang'
        ]) ?>
    </div>


</div>
<!-- /.card-body -->

<div class="card-footer">
    <?= form_submit('', 'Simpan', [
        'class' => 'btn btn-primary'
    ]) ?>

</div>
<?= form_close(); ?>
<?= $this->endSection('isi') ?>