<div class="container-fluid">


          <h1 class="h3 mb-2 text-gray-800" align="center">Data Penjualan</h1>
          <p class="mb-4" align="center"> Berikut Merupakan Data pemasukan Penjualan pada tanggal <?= $tanggal; ?> </p>

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">List Penjualan</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID Bayar</th>
                      <th>Jumlah Bayar</th>
                      <th>Keterangan</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $tot_pemasukan ='0' ;
                    ?>
                    <?php foreach ($jual as $key) :?>
                    <tr>
                      <td><?= $key['id_pembayaran'];?></td>
                      <td><?= number_format($key['jml_byr'], 0, ',', '.') ?></td>
                      <td><?= $key['keterangan'];?></td>
<?php
$tot_pemasukan += $key['jml_byr'];
?>
                    <?php endforeach; ?>
                    </tr>
                  </tbody>
                </table>
                <p>Total Pemasukan Penjualan hari ini adalah <?= $tot_pemasukan; ?></p>
              </div>
            </div>
          </div>

        </div>

      </div>

    </div>

  </div>
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

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
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <script src="<?php echo base_url() ?>asset/js/jquery-3.3.1.js"></script>
  <script src="<?php echo base_url() ?>asset/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url() ?>asset/js/jquery.easing.min.js"></script>
  <script src="<?php echo base_url() ?>asset/js/sb-admin-2.min.js"></script>
  <script src="<?php echo base_url() ?>asset/js/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url() ?>asset/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?php echo base_url() ?>asset/js/demo/datatables-demo.js"></script>

</body>

</html>
