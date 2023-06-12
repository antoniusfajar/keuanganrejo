<div class="content-wrapper" style="margin-bottom: 20px">
  <div style="margin-left: 20px;margin-right: 20px">
 <div class="row">
<div class="col-lg-8">          
 <?php if( validation_errors() ) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= validation_errors(); ?>
                      </div>
                    <?php endif; ?>

<form action="<?= base_url(); ?>index.php/keuangan/tambahtransaksipembelian " method="post" enctype="multipart/form-data">
 <div class="card shadow mb-4" >
 	<div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Form Transaksi Pembelian Barang</h6>
     </div>	
     <div class="card-body">
      	<div class="form-group">
           <label class="col-md-6" align="margin-left">ID Nota Pembelian</label>
          <div class="col-md-12">
           <input type="text" name="idpembelian" id="idpembelian" hidden="hidden" value="<?php echo $nota->id_pembelian?> ">
           <input type="text" name="idnota" id="idnota" class="form-control" style="text-align: center;" value="<?php echo $nota->id_nota_beli?> ">
         </div>
        </div>
         <div class="form-group">
           <label class="col-md-6" align="margin-left">Tanggal Pembelian</label>
        <div class="col-md-12">
           <input type="date" name="tanggalbeli" id="tanggalbeli" class="form-control" style="text-align: center;" value="<?php echo $nota->tanggal?>">
         </div>
     </div>
     	<table border="0" class="table">
     		<tr>
     			<td> <label class="col-md-12" align="left">Nama Barang :</label></td>
     			 <td><label class="col-md-12" align="left">Jumlah Beli :</label></td>
     			 <td><label class="col-md-12" align="left">Harga Beli :</label></td>
     			 <td></td>
     		</tr>
     		<tr>
     			<td><input type="text" name="namabar" id="namabar" aria-label="Search" aria-describedby="basic-addon2"></td>
     			<td><input type="text" name="jumlahbeli" id="jumlahbeli"  ></td>
     			<td><input type="text" name="hargabeli" id="hargabeli"  ></td>
     			<td><button onclick="return confirm('Yakin Menambah data ini?');">Tambah</button></td>
     		</tr>
     		<input type="text" name="idbar" name="idbar" hidden="hidden">
     		<input type="text" name="hargabelilama" id="hargabelilama" hidden="hidden">
         </table>
 </div>
</div>
</div>

<div class="col-lg-4">          

 <div class="card shadow mb-4" >
 	<div class="card-header py-3">
 				                  <h6 class="m-0 font-weight-bold text-primary">Form Transaksi Pembelian Barang</h6>
     </div>	
     <div class="card-body">
 
          	<div class="form-group">
              	<label class="col-md-6" align="margin-left">Nama Pemasok</label>
              <div class="col-md-12">
              	 <input type="text" name="nama_pemasok" id="nama_pemasok" class="form-control" style="text-align: center;" value="<?php echo $nota->nama_pemasok?> ">
              </div>
             <div class="form-group">
              	<label class="col-md-6" align="margin-left">Status Pembelian</label>
              <div class="col-md-12">
                <select class="form-control" id="statusbeli" name="statusbeli" style="text-align: center;" >
                <option>---Status Beli ---</option>
                <option value="hutang" <?php if($nota->status_beli =="hutang") echo 'selected="selected"'; ?> >Hutang</option>
    			<option value="lunas" <?php if($nota->status_beli =="lunas") echo 'selected="selected"'; ?>  >Lunas</option>
                </select>
              </div> 
         </div>
             <div class="form-group">
              	<label class="col-md-12" align="margin-left">Nota Pembelian</label>
              <div class="col-md-12">
                <input type="file" name="nota" id="nota">
              </div> 
         	</div>
         </div>	
     </div>
 </div>
</div>
</form>
 
	<div class="col-lg-12">          

 <div class="card shadow mb-4" >
 	<div class="card-header py-3">
 				                  <h6 class="m-0 font-weight-bold text-primary">List Barang Beli</h6>
     </div>	
     <div class="card-body">

<table id="tbUser" class="table ">
              <thead>
                <tr>
                  <td align="center">Aksi</td>
                  <td>ID Detail Pembelian</td>
                  <td>Nama Barang</td>
                  <td align="right">Harga Beli</td>
                  <td align="center">Jumlah Beli</td>
                  <td align="center">Satuan</td>
                  <td align="left">Subtotal</td>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($list->result() as $key): ?>
                <tr>
                  <td align="center"><a onclick="return confirm('Yakin hapus data ini?');" href="<?php echo base_url('index.php/keuangan/hapus_barang_beli/') . $key->id_pembelian . "/" . $key->id_bar . "/" . $key->id_det_beli ?>">Hapus</a></td>
                  <td><?php echo $key->id_det_beli ?></td>
                  <td><?php echo $key->nama_bar ?></td>
                  <td align="right"><?php echo number_format($key->harga_beli, 0, ',', '.') ?></td>
                  <td align="center"><?php echo $key->jumlah_beli ?></td>
                  <td align="center">
                    <?php echo $key->satuan ?>
                  </td>
                  <td align="left"><?php echo number_format($key->sub_total_beli, 0, ',', '.') ?></td>
                </tr>
<?php
$tot_item += $key->jumlah_beli;
$tot_belanja += $key->sub_total_beli;
?>
                <?php endforeach?>
              </tbody>
<form action="<?= base_url(); ?>index.php/keuangan/pembelianselesai" method="post" enctype="multipart/form-data">
              <tr>
                <td colspan="5" align="right"></td>
                	<td align="left"><strong>Total Harga</strong></td>
                <td align="left"><strong>Rp. <?php echo number_format($tot_belanja, 0, ',', '.') ?></strong></td>
              </tr>
              <tr>
              	<td colspan="5" align="right"></td>
              		<td align="left"><strong>Jumlah Bayar</strong></td>
              		<td><input type="text" id="jumlahbayar" name="jumlahbayar"></td>
              </tr>
              <tr>
              	<td colspan="5" ></td>
              		<td><strong>Sisa</strong></td>
              		<td><input type="text" name="sisab" id="sisab"></td>
              </tr>
              <tr>
              	<td colspan="5" ></td>
              		<td><strong>Cara Bayar</strong></td>
              		<td>
              	<select id="carabayar" name="carabayar" style="text-align: center;" >
                <option>---Cara Bayar ---</option>
                <option value="Kas01">Kas</option>
    			<option value="Kas02">Rekening</option>
                </select></td>
              </tr>
              <tr>
              	<input type="date" id="tglbeli" name="tglbeli" value="<?php echo $nota->tanggal?>" hidden="hidden">
              	<input type="text" id="idpembelian"name="idpembelian" hidden="hidden" value="<?php echo $nota->id_pembelian?>">
              	<input type="text" name="totalblanja" id="totalblanja" value="<?php echo $tot_belanja?>" hidden="hidden">
              	<td colspan="6" align="right"></td>
              		<td><button type="submid" onclick="return confirm('Apakah mau menyimpan data ini ?')"> Selesai </button></td>
              </tr>
            </table>
</form>
	</div>
	</div>
	</div>
</div>
</div>
</div>


