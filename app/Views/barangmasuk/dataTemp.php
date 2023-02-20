<!-- <table class="table table-sm table-striped table-hover">
    <thead>
        <tr>
            <th>No</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Harga Jual</th>
            <th>Harga Beli</th>
            <th>Jumlah</th>
            <th>Sub Total</th>
            <th>#</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $nomor = 1;
        foreach ($datatemp->getResultArray() as $row) :
        ?>
            <tr>
                <td><?= $nomor++ ?></td>
                <td><?= $row['brgkode'] ?></td>
                <td><?= $row['brgnama'] ?></td>
                <td><?= $row['dethargajual'] ?></td>
                <td><?= $row['dethargamasuk'] ?></td>
                <td><?= $row['detjumlah'] ?></td>
                <td><?= $row['detsubtotal'] ?></td>
                <td>
                    <button type="button" class="btn btn-sm btn-outline-danger" onclick="hapusItem('<?= $row['iddetail'] ?>')">
                        <i class="fa fa-trash-alt"></i>
                    </button>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
 -->
<table class="table table-bordered">
    <thead>
        <tr>
            <th style="width: 10px">No</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Harga Jual</th>
            <th>Harga Beli</th>
            <th>Jumlah</th>
            <th>Sub Total</th>
            <th style="width: 10px">#</th>
        </tr>
    </thead>
    <tbody>
        <?php $nomor = 1;
        foreach ($datatemp->getResultArray() as $row) :
        ?>
            <tr>
                <td><?= $nomor++ ?></td>
                <td><?= $row['brgkode'] ?></td>
                <td><?= $row['brgnama'] ?></td>
                <td><?= $row['dethargajual'] ?></td>
                <td><?= $row['dethargamasuk'] ?></td>
                <td><?= $row['detjumlah'] ?></td>
                <td><?= $row['detsubtotal'] ?></td>
                <td>
                    <button type="button" class="btn btn-sm btn-outline-danger" onclick="hapusItem('<?= $row['iddetail'] ?>')">
                        <i class="fa fa-trash-alt"></i>
                    </button>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<script>
    function hapusItem(id) {
        Swal.fire({
            title: 'Apakah Anda yakin akan menghapus?',
            confirmButtonText: 'Ya, Hapus',
            showCancelButton: true,
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                $.ajax({
                    type: "post",
                    url: "/barangmasuk/deleteItem",
                    data: {
                        id: id
                    },
                    dataType: "json",
                    success: function(response) {
                        if (response.sukses) {
                            dataTemp();
                            Swal.fire('Berhasil dihapus!', '', 'success')
                        }

                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        alert(xhr.status + '\n' + thrownError);
                    }
                });

            }
        })
    }
</script>