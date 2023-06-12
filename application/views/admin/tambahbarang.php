<div class="container">


    <div class="row mt-3">


        <div class="col-md-6">


            <div class="card">


                <div class="card-header">


                    Form Tambah Barang


                </div>


                <div class="card-body">


                    <?php if( validation_errors() ) : ?>


                        <div class="alert alert-danger" role="alert">


                            <?= validation_errors(); ?>


                        </div>


                    <?php endif; ?>




                    <form action="<?= base_url(); ?>index.php/admin_barang/tambahbarang " method="post">

                        <div class="form-group">

                            <label for="id_bar">ID Barang</label>

                            <input type="text" name="id_bar" id="id_bar" class="form-control" value="<?php echo $kd_bar ?>" readonly="">
                        </div>
                   

                        <div class="form-group">

                            <label for="nama_bar">Nama Barang</label>

                            <input type="text" name="nama_bar" id="nama_bar" 

                            class="form-control" placeholder="Masukkan Nama Barang">
                        </div>

                        <div class="form-group">

                            <label for="harga_jual">Harga Jual</label>

                            <input type="text" name="harga_jual" id="harga_jual"  

                            class="form-control" placeholder="Masukkan Harga Jual">

                        </div>

                        <div class="form-group">

                            <label for="stock">Stock</label>

                            <input type="text" name="stock" id="stock"  

                            class="form-control" placeholder="Jumlah Stock">

                        </div>

                        <input type="hidden" name="harga_beli" id="harga_beli" value="">         
                        <div class="form-group">

<div class="form-group">
                <label class="col-md-6" align="margin-left"> ID Kategoti</label>
              <div class="col-md-12">
                <select class="form-control" name="id_kat" id="id_kat" style="text-align: center;">
                <option>---Pilih ID Kategoti ---</option>
                <?php foreach($kategori as $kategori){?>

                <option value="<?php echo $kategori->id_kat ;?>"><?php echo $kategori->nama_kat ?></option>

                <?php }?>
                </select>
              </div> 
         </div>


                        <button type="submit" 

                        class="btn btn-primary float-right" onclick="return confirm('Tambah Barang ?')">Tambah Data Barang</button>


                        <a href="<?= base_url(); ?>index.php/admin_barang/tampil_barang"  

                        class="btn btn-primary float-right mr-2" onclick="return confirm('Kembali ?')">Kembali</a>


                    </form>


                </div>


            </div>


        </div>


    </div>


</div>

