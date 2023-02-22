<!-- Modal -->
<div class="modal fade" id="modalcaribarang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Silahkan Cari Data Barang</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Kode Barang" id="kdbarang" name="kdbarang">
          <button class="btn btn-outline-primary" type="button" id="btndetailcaribarang">
            <i class="fa fa-search"></i>
          </button>
        </div>
        <div class="row viewdetailcaribarang"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<script>
 function detailcaribarang(){

  let kdbarang = $('#kdbarang').val();
    $.ajax({
      type: "post",
      url: "/barangmasuk/detailCariBarang",
      data: {
        cari: kdbarang
      },
      dataType: "json",
      success: function (response) {
        if(response.data){
          $('.viewdetailcaribarang').html(response.data);
        }
      },

      error: function(xhr, ajaxOptions, thrownError){
        alert(xhr.status +'\n'+ thrownError);
      }
    });
    
 }

 $(document).ready(function () {
    $('#btndetailcaribarang').click(function (e) { 
      e.preventDefault();
      detailcaribarang();
    });
    
    $('#kdbarang').keydown(function (e) { 
    if(e.keyCode == '13'){
      e.preventDefault();
      detailcaribarang();
    }
 });
 });



</script>