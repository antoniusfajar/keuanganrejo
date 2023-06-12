<div class="container-fluid">


   <div class="row"> 
<?php foreach ($saldo as $akun){ ?>
   <?php if ($akun['total_saldo'] > 0) { ?>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><?= $akun['nama_ref'];?></div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">RP <?= number_format($akun['total_saldo'],0,',','.');?> </div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
<?php } ?>
<?php } ?>
</div>


          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Jurnal Transaksi</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No Jurnal</th>
                      <th>ID Transaksi</th>
                      <th>Tanggal Transaksi</th>
                      <th>No Referensi</th>
                      <th>Keterangan</th> 
                      <th>Debit</th>
                      <th>Kredit</th> 
                    </tr>
                  </thead>
                  <tbody>
                    <?php $tot_debit='0';?>
                    <?php $tot_kredit='0';?>
                    <?php foreach ($bukubesar as $key) :?>
                    <tr>
                      <td><?= $key['no_jurnal'] ;?></td>
                      <td><?= $key['id_transaksi'];?></td>
                      <td><?= $key['tanggal'];?></td>
                      <td><?= $key['no_ref'];?></td>
                      <td><?= $key['keterangan'];?></td>
                      <td><?= number_format($key['debit'],0,',','.');?></td>
                      <td><?= number_format($key['kredit'],0,',','.');?></td>
<?php
$tot_debit += $key['debit'];
$tot_kredit += $key['kredit'];
?>
                    <?php endforeach; ?>
                    </tr>
                  </tbody>
                </table>

              <label><?php echo "Jumlah Debit Sebesar ".number_format($tot_debit,0,',','.')." Rupiah" ;?></label><br>
              <label><?php echo "Jumlah Kredit Sebesar ".number_format($tot_kredit,0,',','.')." Rupiah" ;?></label></div>
              </div>
            </div>
          </div>

        </div>

      </div>

    </div>
