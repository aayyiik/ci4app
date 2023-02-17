<?= $this->extend('main/layouts'); ?>
<?= $this->section('judul'); ?>
Barang Masuk
<?= $this->endSection('judul'); ?>
<?= $this->section('subjudul'); ?>

<?= $this->endSection('subjudul'); ?>
<?= $this->section('isi'); ?>

<div class="form-row">
    <div class="form-group col-md-6">
        <label for="inputCity" class="form-label">No. Faktur Barang Masuk</label>
        <input type="text" class="form-control" id="idfaktur" name="idfaktur">
    </div>
    <div class="form-group col-md-6">
        <label for="inputCity" class="form-label">Tgl. Barang Masuk</label>
        <input type="date" class="form-control" id="tglfaktur" name="tglfaktur" value="<?= ('Y-m-d') ?>">
    </div>
</div>

<div class="card">
    <div class="card-header">
        Card Data Barang
    </div>
    <div class="card-body">
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="kodebarang" class="form-label">Kode Barang</label>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Kode Barang">
                    <button class="btn btn-outline-primary" type="button" id="btncaribarang">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>

            <div class="form-group col-md-3">
                <label for="" class="form-label">Nama Barang</label>
                <input type="text" class="form-control" id="namabarang" name="namabarang" readonly>
            </div>

            <div class="form-group col-md-2">
                <label for="" class="form-label">Harga Jual</label>
                <input type="text" class="form-control" id="hargajual" name="hargajual" readonly>
            </div>

            <div class="form-group col-md-2">
                <label for="" class="form-label">Harga Beli</label>
                <input type="text" class="form-control" id="hargabeli" name="hargabeli">
            </div>

            <div class="form-group col-md-1">
                <label for="" class="form-label">Jumlah</label>
                <input type="text" class="form-control" id="jumlah" name="jumlah">
            </div>

            <div class="form-group col-md-1">
                <label  for="" class="form-label">Aksi</label><br>
                <button class="btn btn-sm btn-info" type="button" id="tomboladd">
                    <i class="fa fa-plus-square"></i>
                </button>&nbsp;
                <button class="btn btn-sm btn-warning" type="button" id="tombolreload">
                    <i class="fa fa-sync-alt"></i>
                </button>
            </div>
        </div>

        <div class="row" id="tampilDataTemp">

        </div>
    </div>
</div>
<script>
    function dataTemp(){
        let faktur = $('#idfaktur').val();

        $.ajax({
            type: "post",
            url: "/barangmasuk/dataTemp",
            data: {
                faktur : faktur
            },
            dataType: "json",
            success: function (response) {
                if(response.data){
                    $('#tampilDataTemp').html(response.data);
                }
            },
            error : function(xhr, ajaxOptions, thrownError ){
                alert(xhr.status +'\n'+ thrownError);
            }
        });
    }

    $(document).ready(function () {
        dataTemp();
    });
</script>
<?= $this->endSection('isi'); ?>