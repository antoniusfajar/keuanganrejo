<div class="container">


    <div class="row mt-3">


        <div class="col-md-6">


            <div class="card">


                <div class="card-header">


                    Form Edit User

                </div>


                <div class="card-body">




                    <?php if( validation_errors() ) : ?>


                        <div class="alert alert-danger" role="alert">


                            <?= validation_errors(); ?>


                        </div>


                    <?php endif; ?>




                    <form action="<?= base_url(); ?>index.php/admin_barang/editbarang/<?= $detail->id_bar; ?>" method="post">


                        <label for="username">ID Barang</label>


                            <input type="text" name="id_bar" id="id_bar" 

       value="<?= $detail->id_bar; ?>" class="form-control" readonly="readonly">

                            <label for="nama_bar">Nama Barang</label>


                            <input type="text" name="nama_bar" id="nama_bar" 

       value="<?= $detail->nama_bar; ?>" class="form-control">



                            <label for="harga_jual">Harga Jual</label>


                            <input type="text" name="harga_jual" id="harga_jual" 

       value="<?= $detail->harga_jual; ?>" class="form-control" >


                          <label for="harga_beli">Harga Beli</label>


                            <input type="text" name="harga_beli" id="harga_beli" 

       value="<?= $detail->harga_beli; ?>" class="form-control" placeholder="Masukkan harga beli">



                          <label for="stock">Stock</label>


                            <input type="text" name="stock" id="stock" 

       value="<?= $detail->stock; ?>" class="form-control" placeholder="masukkan jumlah stock">



                        <div class="form-group">


                            <label for="id_kat">ID Kategori</label>


                            <select name="id_kat" id="id_kat" class="form-control" required="true">


                                <option value="<?= $detail->id_kat; ?>"><?= $detail->id_kat; ?></option>


                                <option value="kat01">Semen </option>


                                <option value="kat02">Pasir</option>


                                <option value="kat03">Paku</option>


                                <option value="kat04">Cat</option>


                            </select>


                        </div>


                        <button type="submit" class="btn btn-primary float-right" onclick="return confirm('Ubah Kategori ?')">Ubah Data</button>


                        <a href="<?= base_url(); ?>index.php/admin_barang/tampil_barang" class="btn btn-primary float-right mr-2" onclick="return confirm('Kembali ?')">Kembali</a>


                    </form>


                </div>


            </div>


        </div>


    </div>


</div>
