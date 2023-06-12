<div class="content-wrapper" style="margin-bottom: 20px">
    <div style="margin-left: 20px;margin-right: 20px">

 <div class="row">
 <div class="col-lg-8">          

 <div class="card shadow mb-4" >
 	<div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Form Transaksi Lain</h6>
     </div>	
     <div class="card-body">
        <?php if( validation_errors() ) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= validation_errors(); ?>
                        </div>
                    <?php endif; ?>
 <form action="<?= base_url(); ?>index.php/keuangan/tambahtransaksilain " method="post" enctype="multipart/form-data">

     	<div class="form-group">
              	<label class="col-md-6" align="margin-left">ID Transaksi</label>
              <div class="col-md-12">
              	 <input type="text" name="id_transaksi" id="id_transaksi" class="form-control" value="<?php echo $idtran?>" style="text-align: center;" readonly="readonly">
              </div> 
         </div>
   		<div class="form-group">
              	<label class="col-md-6" align="margin-left">Jenis Transaksi :</label>
              <div class="col-md-12">
                <select class="form-control" id="jenistransaksi" name="jenistransaksi" style="text-align: center;">
                <option>---Pilih Jenis Transaksi ---</option>
                	<?php foreach($trans as $tran){?>

    			<option value="<?php echo $tran->id_jenis_tran ;?>"><?php echo $tran->nama_trans?></option>

  				<?php }?>
                </select>
              </div> 
         </div>
        	<div class="form-group">
             	 <label class="col-md-12" align="margin-left">Tanggal Transaksi</label>
              <div class="col-md-12">
                <input type="date" name="tanggal_trans" id="tanggal_trans" class="form-control" >
              </div> 
            </div>
        	<div class="form-group">
              	<label class="col-md-12" align="margin-left">Total Transaksi</label>
              <div class="col-md-12">
                <input type="text" name="total_trans" id="total_trans" class="form-control" style="text-align: center;" >
              </div> 
         	</div>
            	<div class="form-group">
              	<label class="col-md-6" align="margin-left">Jenis Pembayaran</label>
              <div class="col-md-12">
                <select class="form-control" name="jenisbayar" id="jenisbayar" style="text-align: center;">
                <option>---Pilih Cara Bayar ---</option>
				<?php foreach($kas as $bayar){?>

    			<option value="<?php echo $bayar->id_kas ;?>"><?php echo $bayar->nama_kas?></option>

  				<?php }?>
                </select>
              </div> 
         </div>
               <div class="form-group">
              	<label class="col-md-12" align="margin-left">Keterangan</label>
              <div class="col-md-12">
                <input type="text" name="Keterangan" id="Keterangan" class="form-control"  style="text-align: center;" >
              </div> 
         	</div>
         	<button type="submit" class="btn btn-primary float-right">Simpan</button>

</div>   
</div>
</div>

 <div class="col-lg-4">
 <div class="card shadow mb-4" >
     <div class="card-body">
     	        	<div class="form-group">
              	<label class="col-md-12" align="margin-left">Bukti Transaksi</label>
              <div class="col-md-12">
                <input type="file" name="bukti" id="bukti">
              </div> 
         	</div>
  </div>
 </div>

	</div>
</form>
</div>
</div>

