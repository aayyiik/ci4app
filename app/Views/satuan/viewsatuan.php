<?= $this->extend('main/layouts')?>

<?= $this->section('judul')?>
Manajemen Data Satuan
<?= $this->endSection('judul')?>

<?= $this->section('subjudul')?>
Data Satuan
<?= $this->endSection('subjudul')?>

<?= $this->section('isi')?>
<?= session()->getFlashdata('sukses') ?>

<table class="table table-bordered">
  <thead>
    <tr>
      <th style="width: 10px">No</th>
      <th>Nam Satuan</th>
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
          <button type="button" class="btn btn-warning" title="Edit Data" onclick="edit('<?= $row['satid'] ?>')" >
          <i class="fa fa-edit"></i>
          </button>
          <form method="POST" action="/satuan/delete/<?= $row['satid'] ?>" style="display: inline;">
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
    window.location=('/satuan/formedit/'+id);
  }

  function hapus(){
    $pesan = confirm('Yakin data satuan dihapus?');

    if($pesan==true){
      return true;
    }else{ 
      return false;
    }
  }
  </script>
<?= $this->endSection('isi')?>
