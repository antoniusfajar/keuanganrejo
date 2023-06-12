<div class="container">


    <div class="row mt-3">


        <div class="col-md-6">


            <div class="card">


                <div class="card-header">


                    Detail Data Kategori


                </div>


                <div class="card-body">


                    <?php if( validation_errors() ) : ?>


                        <div class="alert alert-danger" role="alert">


                            <?= validation_errors(); ?>


                        </div>


                    <?php endif; ?>


                    <form action="" method="post">


                            <label >ID Kategori</label>

                        <div class="form-group">
                              <input type="text" name="id_kat" id="id_kat"  

                value="<?= $detail->id_kat; ?>" class="form-control" readonly="true">


                        </div>

                        <div class="form-group">


                            <label >Nama Kategori<label>


                            <input type="text" name="nama_kat" id="nama_kat"  

                value="<?= $detail->nama_kat; ?>" class="form-control" readonly="true">


                        </div>


                        <div class="form-group">


                            <label >Satuan</label>


                            <input type="text" name="full_name" id="full_name"  

               value="<?= $detail->satuan; ?>" class="form-control" readonly="true">


                        </div>

                        <a href="<?= base_url(); ?>index.php/admin/tampil_kategori" class="btn btn-primary float-right mr-2" onclick="return confirm('Kembali?')">Kembali</a>


                    </form>


                </div>


            </div>


        </div>


    </div>


</div>

