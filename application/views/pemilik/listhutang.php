<div class="container-fluid">


          <h1 class="h3 mb-2 text-gray-800">Data Hutang Pembelian Barang</h1>

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">List Hutang</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID Nota</th>
                      <th>Nama Pemasok</th>
                      <th>Total Pembelian</th>
                      <th>Jumlah Bayar</th>
                      <th>Total Hutang</th> 
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($pembelian as $key): ?>
                    <tr>
                      <td><?= $key['id_nota_beli'];?></td>
                      <td><?= $key['nama_pemasok'];?></td>
                      <td><?= number_format($key['total_pembelian'],0,',','.');?></td>
                      <td><?= number_format($bayar = $key['total_pembelian'] - $key['sisa'],0,',','.');?></td>
                      <td><?= number_format($key['sisa'],0,',','.');?></td>
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
