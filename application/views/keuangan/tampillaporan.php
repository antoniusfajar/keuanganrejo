
<div class="container-fluid">

          <h1 class="h3 mb-2 text-gray-800" align="Center">Data Laporan Keuangan</h1>
  <div class="row">

          <div class="col-lg-8">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"> Grafik Laporan</h6>
            </div>
            <div class="card-body">
                    <canvas id="myPieChart"></canvas>
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
          <tr>
            <td style="background-color:#F0F8FF"></td>
            <td>Saldo Prife</td>
          </tr>
          </table>
            </div>
          </div>
        </div>

 
        <div class="col-lg-12">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"> Neraca saldo </h6>
            </div>
            <div class="card-body">
                  <div class="table-responsive">
                  <table class="table table-bordered" id="" width="100%" cellspacing="0">
                    <tr>
                    <td rowspan="2" align="Center">No ref</td>
                    <td rowspan="2" align="Center">Nama Akun
                    <td colspan="2" align="Center">Total Saldo</td>
                  </tr>
                  <tr>
                  <td align="Center">Debit</td>
                  <td align="Center">Kredit</td>
                  </tr>
                    <tr>
                    <?php foreach ($uang as $uang) {?>
                    <?php if($uang['debit']== NULL && $uang['kredit'] == NULL ){
                      $debit1='0';
                      $kredit1='0';
                      }
                      else {
                      $debit1=$uang['debit'];
                      $kredit1=$uang['kredit']; 
                      }
                     ?>
                    <td>111</td>
                    <td>Uang/ Kas</td>
                 <?php
                    $saldo2 ='0';
                    $saldo = $debit1-$kredit1; 
                    if($saldo < 0){
                      $debit1='0';
                      $kredit1=$saldo * 1; 
                      echo '<td>' . number_format($saldo2) . '</td>';
                      echo '<td>' . number_format($saldo * -1)  . '</td>';
                    }
                    else if($saldo > 0){
                      $debit1=$saldo;
                      $kredit1=$saldo2; 
                      echo '<td>' . number_format($saldo) . '</td>';
                      echo '<td>' . number_format($saldo2) . '</td>';
                    }
                    else if($saldo == 0) {
                      $debit1='0';
                      $kredit1='0';
                      echo '<td>' . number_format($saldo2) . '</td>';
                      echo '<td>' . number_format($saldo2) . '</td>';
                    }
                     } ?>
                  </tr>
                     <tr>
                    <?php foreach ($barang as $uang) {?>
                    <?php if($uang['debit']== NULL && $uang['kredit'] == NULL ){
                      $debit2='0';
                      $kredit2='0';
                      }
                      else {
                      $debit2=$uang['debit'];
                      $kredit2=$uang['kredit']; 
                      }
                     ?>
                    <td>112</td>
                    <td>Barang Dagang</td>
                 <?php
                    $saldo2 ='0';
                    $saldo = $debit2-$kredit2; 
                    if($saldo < 0){
                      $debit2='0';
                      $kredit2=$saldo * 1; 
                      echo '<td>' . number_format($saldo2) . '</td>';
                      echo '<td>' . number_format($saldo * -1)  . '</td>';
                    }
                    else if($saldo > 0){
                      $debit2=$saldo;
                      $kredit2=$saldo2; 
                      echo '<td>' . number_format($saldo) . '</td>';
                      echo '<td>' . number_format($saldo2) . '</td>';
                    }
                    else if($saldo == 0) {
                      $debit2='0';
                      $kredit2='0';
                      echo '<td>' . number_format($saldo2) . '</td>';
                      echo '<td>' . number_format($saldo2) . '</td>';
                    }
                     } ?>
                  </tr>
                  <tr>
                    <?php foreach ($piutang as $uang) {?>
                    <?php if($uang['debit']== NULL && $uang['kredit'] == NULL ){
                      $debit3='0';
                      $kredit3='0';
                      }
                      else {
                      $debit3=$uang['debit'];
                      $kredit3=$uang['kredit']; 
                      }
                     ?>
                    <td>113</td>
                    <td>Piutang</td>
                  <?php
                    $saldo2 ='0';
                    $saldo = $debit3-$kredit3; 
                    if($saldo < 0){
                      $debit3='0';
                      $kredit3=$saldo * 1; 
                      echo '<td>' . number_format($saldo2) . '</td>';
                      echo '<td>' . number_format($saldo * -1)  . '</td>';
                    }
                    else if($saldo > 0){
                      $debit3=$saldo;
                      $kredit3=$saldo2; 
                      echo '<td>' . number_format($saldo) . '</td>';
                      echo '<td>' . number_format($saldo2) . '</td>';
                    }
                    else if($saldo == 0) {
                      $debit3='0';
                      $kredit3='0';
                      echo '<td>' . number_format($saldo2) . '</td>';
                      echo '<td>' . number_format($saldo2) . '</td>';
                    }
                     } ?>
                  </tr>
                  <tr>
                    <?php foreach ($prif as $uang) {?>
                    <?php if($uang['debit']== NULL && $uang['kredit'] == NULL ){
                      $debit4='0';
                      $kredit4='0';
                      }
                      else {
                      $debit4=$uang['debit'];
                      $kredit4=$uang['kredit']; 
                      }
                     ?>
                    <td>211</td>
                    <td>Prife</td>
                 <?php
                    $saldo2 ='0';
                    $saldo = $debit4-$kredit4; 
                    if($saldo < 0){
                      $debit4='0';
                      $kredit4=$saldo * 1; 
                      echo '<td>' . number_format($saldo2) . '</td>';
                      echo '<td>' . number_format($saldo * -1)  . '</td>';
                    }
                    else if($saldo > 0){
                      $debit4=$saldo;
                      $kredit4=$saldo2; 
                      echo '<td>' . number_format($saldo) . '</td>';
                      echo '<td>' . number_format($saldo2) . '</td>';
                    }
                    else if($saldo == 0) {
                      $debit4='0';
                      $kredit4='0';
                      echo '<td>' . number_format($saldo2) . '</td>';
                      echo '<td>' . number_format($saldo2) . '</td>';
                    }
                     } ?>
                  </tr>
                   <tr>
                    <?php foreach ($biaya as $uang) {?>
                    <?php if($uang['debit']== NULL && $uang['kredit'] == NULL ){
                      $debit5='0';
                      $kredit5='0';
                      }
                      else {
                      $debit5=$uang['debit'];
                      $kredit5=$uang['kredit']; 
                      }
                     ?>
                    <td>311</td>
                    <td>Biaya</td>
                 <?php
                    $saldo2 ='0';
                    $saldo = $debit5-$kredit5; 
                    if($saldo < 0){
                      $debit5='0';
                      $kredit5=$saldo * 1; 
                      echo '<td>' . number_format($saldo2) . '</td>';
                      echo '<td>' . number_format($saldo * -1)  . '</td>';
                    }
                    else if($saldo > 0){
                      $debit5=$saldo;
                      $kredit5=$saldo2; 
                      echo '<td>' . number_format($saldo) . '</td>';
                      echo '<td>' . number_format($saldo2) . '</td>';
                    }
                    else if($saldo == 0) {
                      $debit5='0';
                      $kredit5='0';
                      echo '<td>' . number_format($saldo2) . '</td>';
                      echo '<td>' . number_format($saldo2) . '</td>';
                    }
                     } ?>
                  </tr>
                      <tr>
                    <?php foreach ($hutang as $uang) {?>
                    <?php if($uang['debit']== NULL && $uang['kredit'] == NULL ){
                      $debit6='0';
                      $kredit6='0';
                      }
                      else {
                      $debit6=$uang['debit'];
                      $kredit6=$uang['kredit']; 
                      }
                     ?>
                    <td>411</td>
                    <td>Hutang</td>
                 <?php
                    $saldo2 ='0';
                    $saldo = $debit6-$kredit6; 
                    if($saldo < 0){
                      $debit6='0';
                      $kredit6=$saldo * 1; 
                      echo '<td>' . number_format($saldo2) . '</td>';
                      echo '<td>' . number_format($saldo * -1)  . '</td>';
                    }
                    else if($saldo > 0){
                      $debit6=$saldo;
                      $kredit6=$saldo2; 
                      echo '<td>' . number_format($saldo) . '</td>';
                      echo '<td>' . number_format($saldo2) . '</td>';
                    }
                    else if($saldo == 0) {
                      $debit6='0';
                      $kredit6='0';
                      echo '<td>' . number_format($saldo2) . '</td>';
                      echo '<td>' . number_format($saldo2) . '</td>';
                    }
                     } ?>
                  </tr>
                    <tr>
                    <?php foreach ($modal as $uang) {?>
                    <?php if($uang['debit']== NULL && $uang['kredit'] == NULL ){
                      $debit7='0';
                      $kredit7='0';
                      }
                      else {
                      $debit7=$uang['debit'];
                      $kredit7=$uang['kredit']; 
                      }
                     ?>
                    <td>611</td>
                    <td>Modal</td>
                 <?php
                    $saldo2 ='0';
                    $saldo = $debit7-$kredit7; 
                    if($saldo < 0){
                      $debit7='0';
                      $kredit7=$saldo * 1; 
                      echo '<td>' . number_format($saldo2) . '</td>';
                      echo '<td>' . number_format($saldo * -1)  . '</td>';
                    }
                    else if($saldo > 0){
                      $debit7=$saldo;
                      $kredit7=$saldo2; 
                      echo '<td>' . number_format($saldo) . '</td>';
                      echo '<td>' . number_format($saldo2) . '</td>';
                    }
                    else if($saldo == 0) {
                      $debit7='0';
                      $kredit7='0';
                      echo '<td>' . number_format($saldo2) . '</td>';
                      echo '<td>' . number_format($saldo2) . '</td>';
                    }
                     } ?>
                  </tr>
                  <tr>
                    <td colspan="2" align="Center">TOTAL</td>
                    <?php $debit=$debit1+$debit2+$debit3+$debit4+$debit5+$debit6+$debit7; ?> 
                    <td><?= number_format($debit,0,',','.') ?></td>
                    <?php $kredit=($kredit1+$kredit2+$kredit3+$kredit4+$kredit5+$kredit6+$kredit7) * -1; ?>
                    <td><?= number_format($kredit,0,',','.') ?></td>
                  </tr>
                  </table>
                  <a></a>
<input type="text" name="uang" id="uang" hidden="hidden" value="<?= $uang=$debit1-$kredit1; ?>">
<input type="text" name="barang" id="barang" hidden="hidden" value="<?=  $barang=$debit2-$kredit2;?>">
<input type="text" name="piutang" id="piutang" hidden="hidden" value="<?= $piutang=$debit3-$kredit3; ?>">
<input type="text" name="prif" id="prif" hidden="hidden" value="<?=  $prif=$debit4-$kredit4;?>">
<input type="text" name="biaya" id="biaya" hidden="hidden" value="<?=  $biaya=$debit5-$kredit5;?>">
<input type="text" name="hutang" id="hutang" hidden="hidden" value="<?=  $hutang=$debit6-$kredit6;?>">
<input type="text" name="modal" id="modal" hidden="hidden" value="<?= $modal=$debit7-$kredit7;?>">

                  </div>
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
