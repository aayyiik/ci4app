<?= $this->extend('main/layouts') ?>

<?= $this->section('judul') ?>
Form Edit Satuan
<?= $this->endSection('judul') ?>

<?= $this->section('subjudul') ?>

<?= form_button('', '<i class="fa fa-backward"></i> kembali', [
    'class' => 'btn btn-info',
    'onclick' => "location.href=('" . site_url('satuan/index') . "')"

]);
?>
<?= $this->endSection('subjudul') ?>

<?= $this->section('isi') ?>
<?= form_open('satuan/updatedata', '', [
    'idsatuan' => $id
]) ?>
<div class="card-body">
    <div class="form-group">
        <label for="namasatuan">Nama satuan</label>
        <?= form_input('namasatuan', $nama, [
            'class' => 'form-control',
            'id' => 'namasatuan',
            'autofocus' => true
        ]) ?>

    </div>
    <?= session()->getFlashdata('errorNamasatuan'); ?>

</div>

<div class="card-footer">
    <?= form_submit('', 'Update', [
        'class' => 'btn btn-primary'
    ]) ?>
</div>
<?= form_close(); ?>
<?= $this->endSection('isi') ?>