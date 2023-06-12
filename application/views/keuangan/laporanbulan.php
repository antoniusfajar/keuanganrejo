<div class="content-wrapper" style="margin-bottom: 20px">
  <div style="margin-left: 20px;margin-right: 20px">
 <div class="row">
<div class="col-lg-12">
 	<div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Form Pembuatan Laporan Keuangan </h6>
     </div>	
     <div class="card-body">


<form action="<?= base_url(); ?>index.php/keuangan/buat_laporan " method="post">

                  <div class="form-group">
                            <label for="id_bar">Tahun laporan</label>
                            <input type="text" name="tahun" id="tahun" class="form-control" value="<?php echo $tahun ?>" readonly="">
                        </div>

      <div class="form-group">
              <label class="col-md-6" align="margin-left"> Bulan Laporan</label>
              <div class="col-md-12">
                <select class="form-control" name="bulan" id="bulan" style="text-align: center;">
                <option>---Pilih Bulan Transaksi ---</option>
                <?php foreach($bulan as $bulan){ ?>
               <?php if($bulan['bulan']=='1'){
                  $nama ='Januari';
                  }
                  else if($bulan['bulan']=='2'){
                    $nama ='Februari';
                  }
                  else if($bulan['bulan']=='3'){
                    $nama ='Maret';
                  }
                  else if($bulan['bulan']=='4'){
                    $nama ='April';
                  }
                  else if($bulan['bulan']=='5'){
                    $nama ='Mei';
                  }
                  else if($bulan['bulan']=='6'){
                    $nama ='Juni';
                  }
                  else if($bulan['bulan']=='7'){
                    $nama ='Juli';
                  }
                  else if($bulan['bulan']=='8'){
                    $nama ='Agustus';
                  }
                  else if($bulan['bulan']=='9'){
                    $nama ='September';
                  }
                  else if($bulan['bulan']=='10'){
                    $nama ='Oktober';
                  }
                  else if($bulan['bulan']=='11'){
                    $nama ='Nofember';
                  }else if($bulan['bulan']=='12'){
                    $nama ='Desember';
                  } ?>
                <option value="<?php echo $bulan['bulan'] ;?>"><?php echo $nama ?></option>

                <?php } ?>
                </select>
              </div> 
         </div>
    <button type="submit" class="btn btn-primary" align="margin-right" onclick="return confirm('Buat laporan ?')">Buat Laporan</button>
    </div>
    </div>