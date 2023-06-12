<div class="container">


    <div class="row mt-3">


        <div class="col-md-6">


            <div class="card">


                <div class="card-header">


                    Form Edit Kategori

                </div>


                <div class="card-body">




                    <?php if( validation_errors() ) : ?>


                        <div class="alert alert-danger" role="alert">


                            <?= validation_errors(); ?>


                        </div>


                    <?php endif; ?>




                    <form action="<?= base_url(); ?>index.php/admin/editkategori/<?= $detail->id_kat; ?>" method="post">


                        <input type="hidden" name="id_kat" id="id_kat" 

                                value="<?= $detail->id_kat; ?>">                        


                    <label for="username">Nama Kategori</label>


                            <input type="text" name="nama_kat" id="nama_kat" 

       value="<?= $detail->nama_kat; ?>" class="form-control" placeholder="Masukkan Nama Kategori">



                        <div class="form-group">


                            <label for="full_name">Satuan</label>


                            <input type="text" name="satuan" id="satuan"  

    value="<?= $detail->satuan; ?>" class="form-control" placeholder="Masukkan Satuan">


                        </div>


                        <button type="submit" class="btn btn-primary float-right" onclick="return confirm('Ubah Data ?')">Ubah Data</button>


                        <a href="<?= base_url(); ?>index.php/admin/tampil_kategori" class="btn btn-primary float-right mr-2" onclick="return confirm('Kembali ?')">Kembali</a>


                    </form>


                </div>


            </div>


        </div>


    </div>


</div>
