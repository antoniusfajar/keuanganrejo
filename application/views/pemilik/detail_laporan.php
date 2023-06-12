
<div class="container-fluid">

          <h1 class="h3 mb-2 text-gray-800" align="Center"><?= $laporan['nama_laporan'] ?></h1>
  <div class="row">
            <div class="col-lg-8">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"> Laporan Keuangan</h6>
            </div>

            <div class="card-body">
              <div class="chart-pie pt-8">
                    <canvas id="myPieChart"></canvas>
                  </div>
                  <br>
                  <br>
               <table class="table table-bordered" id="" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Nama Akun</th>
                      <th>Total Saldo</th> 
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Saldo Uang</td>
                      <td><?= $laporan['total_Uang']; ?></td>
                    </tr>
                     <tr>
                      <td>Saldo Barang dagang </td>
                      <td><?= $laporan['total_barangdagang']; ?></td>
                    </tr>
                    <tr>
                      <td>Saldo Piutang</td>
                      <td><?= $laporan['total_Piutang']; ?></td>
                    </tr>
                    <tr>
                      <td>Saldo Biaya</td>
                      <td><?= $laporan['total_biaya']; ?></td>
                    </tr>
                    <tr>
                      <td>Saldo Hutang</td>
                      <td><?= $laporan['total_Hutang']; ?></td>
                    </tr>
                     <tr>
                      <td>Saldo Modal</td>
                      <td><?= $laporan['total_modal']; ?></td>
                    </tr>
                  </tbody>
                </table>

<input type="text" name="uang" id="uang" hidden="hidden" value="<?= $laporan['total_Uang'] ?>">
<input type="text" name="barang" id="barang" hidden="hidden" value="<?= $laporan['total_barangdagang'] ?>">
<input type="text" name="piutang" id="piutang" hidden="hidden" value="<?= $laporan['total_Piutang'] ?>">
<input type="text" name="biaya" id="biaya" hidden="hidden" value="<?= $laporan['total_biaya'] ?>">
<input type="text" name="hutang" id="hutang" hidden="hidden" value="<?= $laporan['total_Hutang'] ?>">
<input type="text" name="modal" id="modal" hidden="hidden" value="<?= $laporan['total_modal'] ?>">

                  <p class="text-center" > Laba/Rugi Transaksi Rejojaya pada Periode <?= $laporan['periode_awal'];?> Sampai dengan Periode <?= $laporan['periode_akhir'];?> adalah 
                    <?php $laba1= $laporan['total_saldo'];
                      if($laba1 >= '0') {
                        echo "<font color='green'>".number_format($laba1,0,',','.')."</font>";
                      }
                      else {
                       echo "<font color='red'>".number_format($laba1,0,',','.')."</font>"; 
                      }
                  ?>
                </p>
            </div>
          </div>
        </div>
        
            <div class="col-lg-4">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"> Keterangan </h6>
            </div>
            <div class="card-body">
          <table border="0">
          <tr>
            <td style="background-color:#4e73df" width="40"></td>
            <td>Saldo Uang</td>
          </tr>
           <tr>
            <td style="background-color:#1cc88a"></td>
            <td>Saldo Barang</td>
          </tr>
          <tr>
            <td style="background-color:#36b9cc"></td>
            <td>Saldo Piutang</td>
          </tr>
          <tr>
            <td style="background-color:#80ced6"></td>
            <td>Saldo Hutang</td>
          </tr>
          <tr>
            <td style="background-color:#fefbd8"></td>
            <td>Saldo Biaya</td>
          </tr>
          <tr>
            <td style="background-color:#d5f4e6"></td>
            <td>Saldo modal</td>
          </tr>
          </table>
            </div>
          </div>
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
  <script src="<?php echo base_url() ?>asset/js/chart.js/Chart.min.js"></script>
  <script src="<?php echo base_url() ?>asset/js/laporanchart.js"></script>
