<div class="container">


    <div class="row mt-3">


        <div class="col-md-6">


            <div class="card">


                <div class="card-header">


                    Detail Data User


                </div>


                <div class="card-body">


                    <?php if( validation_errors() ) : ?>


                        <div class="alert alert-danger" role="alert">


                            <?= validation_errors(); ?>


                        </div>


                    <?php endif; ?>


                    <form action="" method="post">
                        <div class="form-group">


                            <label for="id_bar">ID Barang</label>


                            <input type="text" name="id_bar" id="id_bar"  

                value="<?= $detail->id_bar; ?>" class="form-control" readonly="true">


                        </div>


                        <div class="form-group">


                            <label for="nama_bar">nama barang</label>


                            <input type="text" name="nama_bar" id="nama_bar"  

                value="<?= $detail->nama_bar; ?>" class="form-control" readonly="true">


                        </div>


                        <div class="form-group">


                            <label for="harga_jual">Harga Jual</label>


                            <input type="text" name="harga_jual" id="harga_jual"  

               value="<?= $detail->harga_jual; ?>" class="form-control" readonly="true">


                        </div>


                        <div class="form-group">


                            <label for="harga_beli">Harga Beli</label>


                            <input type="text" name="harga_beli" id="harga_beli"  

               value="<?= $detail->harga_beli; ?>" class="form-control" readonly="true">


                        </div>


                        <div class="form-group">


                            <label for="stock">Stock</label>


                            <input type="text" name="stock" id="stock"  

               value="<?= $detail->stock; ?>" class="form-control" readonly="true">


                        </div>


                        <div class="form-group">


                            <label for="id_kat">Id Kategori</label>


                            <input type="text" name="id_kat" id="id_kat"  

               value="<?= $detail->id_kat; ?>" class="form-control" readonly="true">


                        </div>


                        <a href="<?= base_url(); ?>index.php/admin_barang/tampil_barang" class="btn btn-primary float-right mr-2">Kembali</a>


                    </form>


                </div>


            </div>


        </div>


    </div>


</div>

