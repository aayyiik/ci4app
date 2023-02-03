<?= $this->extend('main/layouts') ?>

<?= $this->section('judul') ?>
Manajemen Data Kategori
<?= $this->endSection('judul') ?>

<?= $this->section('subjudul') ?>

<?= form_button('', '<i class="fa fa-plus-circle"></i> Tambah Data', [
  'class' => 'btn btn-primary',
  'onclick' => "location.href=('" . site_url('kategori/formtambah') . "')"
]) ?>

<?= $this->endSection('subjudul') ?>

<?= $this->section('isi') ?>

<?= session()->getFlashdata('sukses') ?>

<table class="table table-bordered">
  <thead>
    <tr>
      <th style="width: 10px">No</th>
      <th>Nam Kategori</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php $nomor = 1;
    foreach ($tampildata as $row) :
    ?>
      <tr>
        <td><?= $nomor++; ?></td>
        <td><?= $row['katnama'] ?></td>
        <td>
          <?= form_button('', 'Edit', [
            'class' => 'btn btn-warning',
            'onclick' => "location.href=('" . site_url('kategori/edit') . "')"
          ]) ?>
          <?= form_button('', 'Delete', [
            'class' => 'btn btn-danger',
            'onclick' => "location.href=('".site_url('kategori/delete'). "')"
          ])?>
        </td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>
<?= $this->endSection('isi') ?>