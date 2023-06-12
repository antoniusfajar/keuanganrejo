<div class="container">


    <div class="row mt-3">


        <div class="col-md-6">


            <div class="card">


                <div class="card-header">


                    Form Tambah Data User


                </div>


                <div class="card-body">




                    <?php if( validation_errors() ) : ?>


                        <div class="alert alert-danger" role="alert">


                            <?= validation_errors(); ?>


                        </div>


                    <?php endif; ?>




                    <form action="<?= base_url(); ?>index.php/admin/tambahuser " method="post">

                        <input type="hidden" name="user_id" id="user_id">                           

                        <div class="form-group">

                            <label for="nim">Username</label>

                            <input type="text" name="username" id="username" 

                            class="form-control" placeholder="Masukkan username">
                        </div>

                        <div class="form-group">

                            <label for="nama">password</label>

                            <input type="password" name="password" id="password"  

                            class="form-control" placeholder="Masukkan Password">

                        </div>

                        <div class="form-group">

                            <label for="nama">fullname</label>

                            <input type="text" name="full_name" id="full_name"  

                            class="form-control" placeholder="Masukkan nama">

                        </div>

                        <div class="form-group">

                            <label for="nama">email</label>

                            <input type="text" name="email" id="email"  

                            class="form-control" placeholder="Masukkan email">

                        </div>

                        <input type="hidden" name="photo" id="photo" value="user_no_image.jpg">         
                        <div class="form-group">


                            <label for="Status">status</label>


                            <select name="status" id="status" 

                             class="form-control" required="true">


                                <option>-- Pilih Status--</option>


                                <option value="keuangan">keuangan</option>


                                <option value="admin">admin</option>


                                <option value="kasir">kasir</option>


                                <option value="pemilik">pemilik</option>


                            </select>


                        </div>


                        <button type="submit" 

                        class="btn btn-primary float-right" onclick="return confirm('Tambah User ?')">Tambah Data</button>


                        <a href="<?= base_url(); ?>index.php/admin/tampil_user"  

                        class="btn btn-primary float-right mr-2" onclick="return confirm('Kembali ?')">Kembali</a>


                    </form>


                </div>


            </div>


        </div>


    </div>


</div>

