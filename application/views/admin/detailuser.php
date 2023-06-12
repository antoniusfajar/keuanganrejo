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


                        <input type="hidden" name="user_id" id="user_id"  

                            value="<?= $detail->user_id; ?>">                        

                            <label for="photo">Photo</label>

                        <div class="form-group">


                             <img src="<?= base_url('asset/img/foto/').$detail->photo;?>" width="300px" high="300px">

                        </div>

                        <div class="form-group">


                            <label for="nim">Username</label>


                            <input type="text" name="Username" id="Username"  

                value="<?= $detail->username; ?>" class="form-control" readonly="true">


                        </div>


                        <div class="form-group">


                            <label for="nama">Nama</label>


                            <input type="text" name="full_name" id="full_name"  

               value="<?= $detail->full_name; ?>" class="form-control" readonly="true">


                        </div>


                        <div class="form-group">


                            <label for="jurusan">Status</label>


                            <input type="text" name="status" id="status" value="<?= $detail->status; ?>" class="form-control" readonly="true">


                        </div>


                        <a href="<?= base_url(); ?>index.php/admin/tampil_user" class="btn btn-primary float-right mr-2" onclick="return confirm('Kembali ?')">Kembali</a>


                    </form>


                </div>


            </div>


        </div>


    </div>


</div>

