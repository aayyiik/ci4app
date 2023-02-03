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
          <button type="button" class="btn btn-warning" title="Edit Data" onclick="edit('<?= $row['katid'] ?>')">
          <i class="fa fa-edit"></i>
          </button>

          <button type="button" class="btn btn-danger" title="Hapus Data" onclick="delete('<?= $row['katid'] ?>')">
          <i class="fa fa-trash-alt"></i>
          </button>
        </td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>

<script>
  function edit(id){
    window.location=('/kategori/formedit/'+id);
  }
  </script>

<?= $this->endSection('isi') ?>