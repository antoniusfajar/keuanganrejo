<div class="container">


    <div class="row mt-3">


        <div class="col-md-6">


            <div class="card">


                <div class="card-header">


                    Form Tambah Kategori


                </div>


                <div class="card-body">


                    <?php if( validation_errors() ) : ?>


                        <div class="alert alert-danger" role="alert">


                            <?= validation_errors(); ?>


                        </div>


                    <?php endif; ?>




                    <form action="<?= base_url(); ?>index.php/admin/tambahkategori " method="post">

                        <div class="form-group">

                            <label for="id_bar">ID Kategori</label>

                            <input type="text" name="id_kat" id="id_kat" class="form-control" value="<?= $id_kat ?>" readonly="readonly">
                        </div>
                   

                        <div class="form-group">

                            <label for="nama_bar">Nama Kategori</label>

                            <input type="text" name="nama_kat" id="nama_kat" 

                            class="form-control" placeholder="Masukkan Nama Kategori">
                        </div>

                        <div class="form-group">

                            <label for="harga_jual">Satuan</label>

                            <input type="text" name="satuan" id="satuan"  

                            class="form-control" placeholder="Masukkan Satuan">

                        </div>

                        
                        <button type="submit" 

                        class="btn btn-primary float-right" onclick="return confirm('Tambah Kategori ?')">Tambah Data Kategori</button>


                        <a href="<?= base_url(); ?>index.php/admin/tampil_kategori"  

                        class="btn btn-primary float-right mr-2" onclick="return confirm('Kembali ?')">Kembali</a>


                    </form>


                </div>


            </div>


        </div>


    </div>


</div>

