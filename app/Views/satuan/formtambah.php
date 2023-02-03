<?= $this->extend('main/layouts') ?>

<?= $this->section('judul') ?>
Form Tambah Satuan
<?= $this->endSection('judul') ?>

<?= $this->section('subjudul') ?>

<?= form_button('', '<i class="fa fa-backward"></i> kembali', [
    'class' => 'btn btn-info',
    'onclick' => "location.href=('" . site_url('satuan/index') . "')"

]);

?>
<?= $this->endSection('subjudul') ?>

<?= $this->section('isi') ?>
<?= form_open('satuan/simpandata')?>
    <div class="card-body">
        <div class="form-group">
            <label for="namasatuan">Nama Satuan</label>
            <?= form_input('namasatuan', '', [
                'class' => 'form-control',
                'id'=> 'namasatuan',
                'autofocus' => true,
                'placeholder' => 'isikan nama satuan'
            ]) ?>
            
        </div>
        <?= session()->getFlashdata('errorNamaSatuan'); ?>

    </div>

    <div class="card-footer">
        <?= form_submit('', 'Simpan', [
            'class' => 'btn btn-primary'
        ])?>

    </div>
<?= form_close();?>
<?= $this->endSection('isi') ?>