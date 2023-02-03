<?= $this->extend('main/layouts') ?>

<?= $this->section('judul') ?>
Form Tambah Kategori
<?= $this->endSection('judul') ?>

<?= $this->section('subjudul') ?>

<?= form_button('', '<i class="fa fa-backward"></i> kembali', [
    'class' => 'btn btn-info',
    'onclick' => "location.href=('" . site_url('kategori/index') . "')"

]);

?>
<?= $this->endSection('subjudul') ?>

<?= $this->section('isi') ?>
<?= form_open('kategori/simpandata')?>
    <div class="card-body">
        <div class="form-group">
            <label for="namakategori">Nama Kategori</label>
            <?= form_input('namakategori', '', [
                'class' => 'form-control',
                'id'=> 'namakategori',
                'autofocus' => true,
                'placeholder' => 'isikan nama kategori'
            ]) ?>
            
        </div>
        <?= session()->getFlashdata('errorNamaKategori'); ?>

    </div>
    <!-- /.card-body -->

    <div class="card-footer">
        <?= form_submit('', 'Simpan', [
            'class' => 'btn btn-primary'
        ])?>

    </div>
<?= form_close();?>
<?= $this->endSection('isi') ?>