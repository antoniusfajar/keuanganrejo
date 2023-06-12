   <?php if( $this->session->flashdata('msg') ) : ?>


      <div class="row mt-3">


        <div class="col-md-6">


          <div class="alert alert-success alert-dismissible fade show"  

            role="alert">


            Data <strong>berhasil</strong> <?= $this->session->flashdata('msg'); ?>


            <button type="button" class="close" data-dismiss="alert"  

             aria-label="Close">


              <span aria-hidden="true">&times;</span>


            </button>


          </div>


        </div>


      </div>


    <?php endif; ?>
 
          <h1>Data User</h1>


          <table class="table table-stripped">
            <thead>
              <tr>
                <th scope="col">Username</th>

                <th scope="col">Status</th>

                <th scope="col" width="200px">Action</th>


              </tr>
            </thead>
            <tbody>
              <?php foreach ($users as $users) :?>
                <tr>
                  <td><?= $users['username'];?></td>
                  <td><?= $users['status'];?></td>
                  <td>
                    <a href="<?= base_url(); ?>index.php/admin/detailuser/<?= $users['user_id']; ?>"  
                   class="badge badge-primary badge-pill">Detail</a>
                    <a href="<?= base_url(); ?>index.php/admin/edituser/<?= $users['user_id']; ?>"  
                   class="badge badge-primary badge-pill tampilModalUbah">Edit</a>
                    <a href="<?= base_url(); ?>index.php/admin/hapususer/<?= $users['user_id']; ?>" 
                              class="badge badge-danger badge-pill"  
                              onclick="return confirm('Hapus data?');">Hapus</a>
                  </td>
                </tr>
              <?php endforeach; ?>


            </tbody>


          </table>    

 <div class="row">


        <div class="col-md-12">


          <a href="<?= base_url(); ?>index.php/admin/tambahuser"  

               class="btn btn-primary" onclick="return confirm('Tambah User ?')"> Tambah Users</a>


        </div>


    </div>


</div>
