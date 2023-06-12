<div class="container-fluid">


          <h1 class="h3 mb-2 text-gray-800">Data Laporan Keuangan</h1>

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">List Laporan</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID laporan</th>
                      <th>Nama laporan</th>
                      <th>Periode awal</th>
                      <th>Periode Akhir</th>
                      <th>Laba Rugi</th> 
                      <th>Action</th> 
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($laporan as $key): ?>
                    <tr>
                      <td><?= $key['id_laporan'];?></td>
                      <td><?= $key['nama_laporan'];?></td>
                      <td><?= $key['periode_awal'];;?></td>
                      <td><?= $key['periode_akhir'];?></td>
                      <td><?= number_format($key['total_saldo'],0,',','.');?></td>
                      <td><a href="<?php echo base_url('index.php/pemilik/detail_laporan/') . $key['id_laporan'] ?>"><button onclick="return confirm('Lihat detail ?');" >Lihat Detail</button></a>
                        <a href="<?php echo base_url('index.php/pemilik/hapus_laporan/') . $key['id_laporan'] ?>"><button onclick="return confirm('Hapus laporan ?');" >Hapus Laporan</button><a>
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
