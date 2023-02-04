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

<table class="table table-bordered">
  <thead>
    <tr>
      <th style="width: 10px">No</th>
      <th>Nam barang</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php $nomor = 1;
    foreach ($tampildata as $row) :
    ?>
      <tr>
        <td><?= $nomor++; ?></td>
        <td><?= $row['satnama'] ?></td>
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
  function edit(id){
    window.location=('/barang/formedit/'+id);
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

