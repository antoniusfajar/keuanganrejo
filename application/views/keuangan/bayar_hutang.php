<div class="content-wrapper" style="margin-bottom: 20px">
  <div style="margin-left: 20px;margin-right: 20px">
 <div class="row">
<div class="col-lg-8">


	<form action="<?= base_url(); ?>index.php/keuangan/simpanbayar_hutang " method="post" enctype="multipart/form-data">
 <div class="card shadow mb-4" >
 	<div class="card-header py-3">
    
                    <?php if( validation_errors() ) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= validation_errors(); ?>
                        </div>
                    <?php endif; ?>
                  <h6 class="m-0 font-weight-bold text-primary">Form Transaksi Pembelian Barang</h6>
     </div>	
     <div class="card-body">
      	<div class="form-group">
           <label class="col-md-6" align="margin-left">ID Nota Pembelian</label>
          <div class="col-md-12">
           <input type="text" name="idpembelian" id="idpembelian" hidden="hidden" readonly= "readonly" value="<?php echo $piutang->id_pembelian?>">
           <input type="text" name="idnota" id="idnota" class="form-control" style="text-align: center;" value="<?php echo $piutang->id_nota_beli?> ">
         </div>
         <div class="form-group">
           <label class="col-md-6" align="margin-left">Nama Pemasok</label>
          <div class="col-md-12">
           <input type="text" name="nama_pemasok" id="nama_pemasok" class="form-control" style="text-align: center;" readonly= "readonly" value="<?php echo $piutang->nama_pemasok?> ">
         </div>
         </div>
        </div>
         <div class="form-group">
           <label class="col-md-6" align="margin-left">Tanggal Pembayaran Hutang</label>
        <div class="col-md-12">
           <input type="date" name="tanggalbyr" id="tanggalbyr" class="form-control" style="text-align: center;" >
         </div>
     	</div>
         	<div class="form-group">
         		<label class="col-md-6" align="margin-left">Cara Bayar </label>
         	<div class="col-md-12">
         	<select class="form-control" id="carabayar" name="carabayar" style="text-align: center;" >
                <option>---Cara Bayar ---</option>
                <option value="Kas01">Kas</option>
    			<option value="Kas02">Rekening</option>
                </select>
         	</div>
     		</div>
     	<div class="form-group">
           <label class="col-md-6" align="margin-left">Total Hutang</label>
        <div class="col-md-12">
           <input type="text" name="total_hutang" id="total_hutang" class="form-control" value="<?php echo $piutang->sisa?>" readonly="" style="text-align: center;">
         </div>
     	</div>
     	<div class="form-group">
           <label class="col-md-6" align="margin-left">jumlah Bayar</label>
        <div class="col-md-12">
           <input type="text" name="jumlahbyr" id="jumlahbyr" class="form-control" style="text-align: center;">
         </div>
     	</div>
     	<div class="form-group">
           <label class="col-md-6" align="margin-left">Sisa Hutang</label>
        <div class="col-md-12">
           <input type="text" name="sisahutang" id="sisahutang" class="form-control" style="text-align: center;" readonly="">
         </div>
     	</div>
     	<div class="text-right"> 
		<button type="submit" class="btn btn-primary" align="margin-right" onclick="return confirm('Bayar Hutang ?')">Bayar</button>
		</div>