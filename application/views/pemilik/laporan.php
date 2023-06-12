<div class="content-wrapper" style="margin-bottom: 20px">
  <div style="margin-left: 20px;margin-right: 20px">
 <div class="row">
<div class="col-lg-12">

 <div class="card shadow mb-4" >
 	<div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Form Pembuatan Laporan Keuangan </h6>
     </div>	
     <div class="card-body">
 
<form action="<?= base_url(); ?>index.php/pemilik/laporanbulan " method="post">
      <div class="form-group">
              <label class="col-md-6" align="margin-left"> Tahun Laporan</label>
              <div class="col-md-12">
                <select class="form-control" name="tahun" id="tahun" style="text-align: center;">
                <option>---Pilih Tahun Transaksi ---</option>
                <?php foreach($tahun as $tahun){?> 
                <option value="<?php echo $tahun['tahun'] ;?>"><?php echo $tahun['tahun'] ?></option>
                <?php }?>
                </select>
              </div> 
         </div>
    <button type="submit" class="btn btn-primary" align="margin-right" onclick="return confirm('Buat laporan ?')">Pilih tahun</button>
    </div>
    </div>