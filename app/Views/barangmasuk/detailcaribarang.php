<table class="table table-bordered">
    <thead>
        <tr>
            <th style="width: 10px">No</th>
            <th>Kode Barang</th>
            <th>Nama barang</th>
            <th>Harga</th>
            <th>Stock</th>
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
                <td><?= $row['brgharga'] ?></td>
                <td><?= $row['brgstock'] ?></td>
                <td>
                    <button type="button" class="btn btn-info" title="Pilih Data" id="pilihbarang" onclick="pilih('<?= $row['brgkode'] ?>')">
                        Pilih
                    </button>
                    </form>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>

<script>
    function pilih(kode) {
        $('#kdbarang').val(kode);
        const myModalEl = document.getElementById('#modalcaribarang')
        $('#modalcaribarang').on('hidden.bs.modal', function (event) { 
            ambilDataBarang()
        })
        $('#modalcaribarang').modal('hide');

    }
</script>