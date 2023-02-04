<?= $this->extend('main/layouts')?>

<?= $this->section('judul')?>
Manajemen Data Barang
<?= $this->endSection('judul')?>

<?= $this->section('subjudul')?>

<?= form_button('', '<i class="fa fa-plus-circle"></i> Tambah Data', [
  'class' => 'btn btn-primary',
  'onclick' => "location.href=('" . site_url('barang/formtambah') . "')"
]) ?>

<?= $this->endSection('subjudul')?>

<?= $this->section('isi')?>
<?= session()->getFlashdata('sukses') ?>
<?= session()->getFlashdata('error') ?>
<table class="table table-bordered">
  <thead>
    <tr>
      <th style="width: 10px">No</th>
      <th>Kode Barang</th>
      <th>Nama barang</th>
      <th>Spesifikasi</th>
      <th>Kategori</th>
      <th>Satuan</th>
      <th>Harga</th>
      <th>Stock</th>
      <th>Gambar</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php $nomor = 1;
    foreach ($tampildata->getResultArray() as $row) :
    ?>
      <tr>
        <td><?= $nomor++; ?></td>
        <td><?= $row['brgkode'] ?></td>
        <td><?= $row['brgnama'] ?></td>
        <td><?= $row['brgspesifikasi'] ?></td>
        <td><?= $row['katnama'] ?></td>
        <td><?= $row['satnama'] ?></td>
        <td><?= $row['brgharga'] ?></td>
        <td><?= $row['brgstock'] ?></td>
        <td><?= $row['brggambar'] ?></td>
        <td>
          <button type="button" class="btn btn-warning" title="Edit Data" onclick="edit('<?= $row['brgkode'] ?>')" >
          <i class="fa fa-edit"></i>
          </button>
          <form method="POST" action="/barang/delete/<?= $row['brgkode'] ?>" style="display: inline;">
            <input type="hidden" value="DELETE" name="_method">
            <button type="submit" class="btn btn-danger" title="Hapus Data" onsubmit="hapus()">
            <i class="fa fa-trash-alt"></i>
            </button>
        </form>
        </td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>

<script>
  function edit(kode){
    window.location=('/barang/formedit/'+kode);
  }

  function hapus(){
    $pesan = confirm('Yakin data barang dihapus?');

    if($pesan==true){
      return true;
    }else{ 
      return false;
    }
  }
  </script>
<?= $this->endSection('isi')?>

