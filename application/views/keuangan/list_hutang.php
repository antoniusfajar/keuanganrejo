<div class="container-fluid">


          <h1 class="h3 mb-2 text-gray-800">Data Piutang Penjualan</h1>

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">List Tanggungan Piutang</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID Nota</th>
                      <th>Nama Pembeli</th>
                      <th>NO telephone</th>
                      <th>Alamat</th>
                      <th>Total Hutang</th> 
                      <th>Action</th> 
                    </tr>
                  </thead>
      
                  <tbody>
                    <?php foreach ($penjualan as $key) :?>
                    <tr>
                      <td><?= $key['id_nota'] ;?></td>
                      <td><?= $key['nama_pembeli'];?></td>
                      <td><?= $key['no_telf'];?></td>
                      <td><?= $key['alamat'];?></td>
                      <td><?= number_format($key['sisa'],0,',','.');?></td>
                      <td><a href="<?php echo base_url('index.php/keuangan/bayar_piutang/') . $key['id_nota']?>"> <button onclick="return confirm('Apakah Akan membayar Pitang ini?');"> Bayar </button></a>
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
