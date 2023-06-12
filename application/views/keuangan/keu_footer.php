  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?= base_url('index.php/user_login/logout'); ?>">Logout</a>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url('asset/') ; ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url('asset/') ; ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url('asset/') ; ?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url('asset/') ; ?>js/sb-admin-2.min.js"></script>
  <script src="<?php echo base_url() ?>asset/js/jquery-3.3.1.js"></script>
  <script src="<?php echo base_url() ?>asset/js/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url() ?>asset/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?php echo base_url() ?>asset/js/jquery-ui.min.js"></script>
  <script src="<?php echo base_url() ?>asset/js/jquery.price_format.min.js"></script>


<script>
  $('.custom-file-input').on('change', function(){
    let fileName= $(this).val().split('\\').pop();
    $(this).next('.custom-file-label').addClass("selected").html(fileName);
  });

        $(document).ready(function() {
        $('#dataTable').DataTable();  
        $('#namabar').autocomplete({
          source: "<?php echo site_url('keuangan/get_autocomplete/?'); ?>",
          select: function (event, ui) {
            $('[name="namabar"]').val(ui.item.label);
            $('[name="idbar"]').val(ui.item.key);
            $('[name="hargabelilama').val(ui.item.pros);
         }
      });
      
    $('#jumlahbayar').keyup(function(e){
    total();
    });

  $('#jumlahbyr').keyup(function(e){
    totala();
    });

  $('#jumlahbyr').keyup(function(e){
    totalb();
    });
  
     });

 function total() {
    let totalblanja = $('#totalblanja').val();
    let jumlahbayar = $('#jumlahbayar').val();

    hitungbayar = totalblanja - jumlahbayar;
    if (hitungbayar >= 0 ) {
       let sisa = hitungbayar;   
    $('#sisab').val(sisa);
    }
    else {
    let sisa = 0 ;
    $('#sisab').val(sisa);
    }
    }
  function totala() {
    let totalblanja = $('#total_hutang').val();
    let jumlahbayar = $('#jumlahbyr').val();

    hitungbayar = totalblanja - jumlahbayar;
    if (hitungbayar >= 0 ) {
       let sisa = hitungbayar;   
    $('#sisahutang').val(sisa);
    }
    else {
    let sisa = 0 ;
    $('#sisahutang').val(sisa);
    }
    }
    function totalb(){
    let totalblanja = $('#total_piutang').val();
    let jumlahbayar = $('#jumlahbyr').val();

    hitungbayar = totalblanja - jumlahbayar;
    if (hitungbayar >= 0 ) {
       let sisa = hitungbayar;   
    $('#sisapiutang').val(sisa);
    }
    else {
    let sisa = 0 ;
    $('#sisapiutang').val(sisa);
    } 
    }  
</script>
</body>

</html>
