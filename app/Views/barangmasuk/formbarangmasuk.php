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
        <input type="date" class="form-control" id="tglfaktur" name="tglfaktur" value="<?= date('Y-m-d') ?>">
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
                    <input type="text" class="form-control" placeholder="Kode Barang" id="kdbarang" name="kdbarang">
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
                <input type="number" class="form-control" id="hargajual" name="hargajual" readonly>
            </div>

            <div class="form-group col-md-2">
                <label for="" class="form-label">Harga Beli</label>
                <input type="number" class="form-control" id="hargabeli" name="hargabeli">
            </div>

            <div class="form-group col-md-1">
                <label for="" class="form-label">Jumlah</label>
                <input type="number" class="form-control" id="jumlah" name="jumlah">
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

        <div class="row" id="tampilDataTemp"></div>
    </div>
</div>
<script>
    function dataTemp(){
        let idfaktur = $('#idfaktur').val();

        $.ajax({
            type: "post",
            url: "/barangmasuk/dataTemp",
            data: {
                faktur : idfaktur
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

    function kosong(){
        $('#kdbarang').val();
        $('#namabarang').val();
        $('#hargajual').val();
        $('#kdbarang').focus();
    }

    $(document).ready(function () {
        //ready datatemp
        dataTemp();

        
        $('#kdbarang').keydown(function (e) { 
            //13 artinya menekan enter
            if(e.keyCode == 13){
                e.preventDefault();
             //   alert('ini ditekan enter');
             let kodebarang = $('#kdbarang').val();

             $.ajax({
                type: "post",
                url: "/barangmasuk/ambilDataBarang",
                data: {
                    kodebarang : kodebarang
                },
                dataType: "json",
                success: function (response) {
                    if(response.sukses){
                        let data = response.sukses;
                        $('#namabarang').val(data.namabarang);
                        $('#hargajual').val(data.hargajual);

                        //agar ketika setelah dienter menjadi fokus ke field berikutnya maka menggunakan focus
                        $('#hargabeli').focus();
                    }

                    if(response.error){
                        alert(response.error);
                        kosong();
                    }
                }, 
                error : function(xhr, ajaxOptions, thrownError){
                    alert(xhr.status +'\n'+ thrownError);
                }
             });
            }
        });
    });

    $('#tomboladd').click(function (e) { 
        e.preventDefault();
        // alert('ini tombol add');

        let idfaktur = $('#idfaktur').val();
        let kdbarang = $('#kdbarang').val();
        let hargabeli = $('#hargabeli').val();
        let hargajual = $('#hargajual').val();
        let jumlah = $('#jumlah').val();
        let id = $('#iddetail').val();
        //membuat validasi data tidak kosong sebelum diklik add
        if(idfaktur.length == 0){
            alert('Maaf Semua Data Wajib Diisi');
        }else if(kdbarang.length==0){
            alert('Maaf Semua Data Wajib Diisi');
        }else if(hargabeli==''){
            alert('Maaf Semua Data Wajib Diisi');
        }else if(jumlah==''){
            alert('Maaf Semua Data Wajib Diisi');
        }else{
            //ajax
            $.ajax({
                type: "post",
                url: "/barangmasuk/simpanTemp",
                data: {
                    idfaktur : idfaktur,
                    kdbarang : kdbarang,
                    hargajual : hargajual,
                    hargabeli : hargabeli,
                    jumlah : jumlah,
                },
                dataType: "json",
                success: function (response) {
                    if(response.sukses){
                        alert(response.sukses);
                        dataTemp();
                    }
                },
                error : function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status +'\n'+ thrownError);
                }
            });
        }
         
    });

</script>
<?= $this->endSection('isi'); ?>