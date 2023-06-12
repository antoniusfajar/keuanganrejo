<div class="container-fluid">


          <h1 class="h3 mb-2 text-gray-800">Data Penjualan</h1>
          <p class="mb-4"> Berikut Merupakan Data data Penjualan dan Status penjualan  </p>

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">List Penjualan</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID Nota</th>
                      <th>Nama Pembeli</th>
                      <th>Grand Total</th>
                      <th>Status Pembayaran</th>  
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>ID Nota</th>
                      <th>Nama Pembeli</th>
                      <th>Grand Total</th>
                      <th>Status Pembayaran</th>  
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php foreach ($barang as $barang) :?>
                    <tr>
                      <td><?= $barang['id_nota'];?></td>
                      <td><?= $barang['nama_pembeli'];?></td>
                      <td><?= $barang['grand_total'];?></td>
                      <td><?= $barang['status_byr'];?></td>
                    <?php endforeach; ?>
                    </tr>
                  </tbody>
                </table>
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
