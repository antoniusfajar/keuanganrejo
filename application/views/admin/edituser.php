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




                    <form action="<?= base_url(); ?>index.php/admin/edituser/<?= $detail->user_id; ?>" method="post">


                        <input type="hidden" name="user_id" id="user_id" 

                                value="<?= $detail->user_id; ?>">                        

   <input type="hidden" name="photo" id="photo" 

                                value="<?= $detail->photo; ?>">                        
                        <div class="form-group">


                            <label for="username">Username</label>


                            <input type="text" name="username" id="username" 

       value="<?= $detail->username; ?>" class="form-control" placeholder="Masukkan Username">



                        <div class="form-group">


                            <label for="password">Pasword</label>


                            <input type="password" name="password" id="password"  

    value="<?= $detail->password; ?>" class="form-control" placeholder="Masukkan password">


                        </div>

                        </div>


                        <div class="form-group">


                            <label for="full_name">Nama Lengkap</label>


                            <input type="text" name="full_name" id="full_name"  

    value="<?= $detail->full_name; ?>" class="form-control" placeholder="Masukkan nama">


                        </div>




                        <div class="form-group">


                            <label for="status">Status</label>


                            <select name="status" id="status" class="form-control" required="true">


                                <option value="<?= $detail->status; ?>"><?= $detail->status; ?></option>


                                <option value="admin">admin</option>


                                <option value="keuangan">keuangan</option>


                                <option value="kasir">kasir</option>


                                <option value="pemilk">pemilik</option>


                            </select>


                        </div>


                        <button type="submit" class="btn btn-primary float-right" onclick="return confirm('Ubah Data ?')">Ubah Data</button>


                        <a href="<?= base_url(); ?>index.php/admin/tampil_user" class="btn btn-primary float-right mr-2" onclick="return confirm('Kembali ?')">Kembali</a>


                    </form>


                </div>


            </div>


        </div>


    </div>


</div>
