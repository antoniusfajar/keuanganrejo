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

  <script src="<?= base_url('asset/') ; ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url('asset/') ; ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url('asset/') ; ?>vendor/jquery-easing/jquery.easing.min.js"></script>
 <script src="<?php echo base_url() ?>/assets/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/bootstrap.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/custom.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/sweetalert.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/toastr.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/jquery-ui.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/jquery.price_format.min.js"></script>
   <script src="<?php echo base_url() ?>/assets/js/jquery-3.3.1.js"></script>
    <link href="<?php echo base_url() ?>/assets/css/bootstrap.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>/assets/css/font-awesome.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>/assets/css/style.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>/assets/css/toastr.min.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>/assets/css/jquery.dataTables.min.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>/assets/css/buttons.dataTables.min.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>/assets/css/jquery-ui.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>/assets/css/bootstrap-select.min.css" rel="stylesheet" >
  <script src="<?= base_url('asset/') ; ?>js/sb-admin-2.min.js"></script>

  <script>
  $('.custom-file-input').on('change', function(){
    let fileName= $(this).val().split('\\').pop();
    $(this).next('.custom-file-label').addClass("selected").html(fileName);
  });
$('form').attr('autocomplete', 'off');
      $('input').attr('autocomplete', 'off');
      $("ul.nav li.dropdown").hover(function(){$(this).find(".dropdown-menu").stop(!0,!0).delay(100).fadeIn(500)},function(){$(this).find(".dropdown-menu").stop(!0,!0).delay(100).fadeOut(500)});
      var pesan="<?php echo $this->session->flashdata('msg'); ?>",error="<?php echo $this->session->flashdata('error'); ?>";pesan?(toastr.options={positionClass:"toast-top-right"},toastr.success(pesan)):error&&swal(error,"","error");

</script>
</body>

</html>
