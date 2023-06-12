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
 
          <h1>Data Kategori</h1>


          <table class="table table-stripped">


            <thead>


              <tr>


                <th scope="col">Id Kategori</th>

                <th scope="col">Nama Kategori</th>

                <th scope="col">Satuan</th>

                <th scope="col" width="200px">Action</th>


              </tr>


            </thead>


            <tbody>


              <?php foreach ($kategori as $Kategori) :?>


                <tr>


                  <td><?= $Kategori['id_kat'];?></td>

                  <td><?= $Kategori['nama_kat'];?></td>
                  <td><?= $Kategori['satuan'];?></td>

                  <td>
                    <a href="<?= base_url(); ?>index.php/admin/detailkategori/<?= $Kategori['id_kat']; ?>"  

                   class="badge badge-primary badge-pill">Detail</a>


                    <a href="<?= base_url(); ?>index.php/admin/editkategori/<?= $Kategori['id_kat']; ?>"  

                   class="badge badge-primary badge-pill tampilModalUbah">Edit</a>


                    <a href="<?= base_url(); ?>index.php/admin/hapuskategori/<?= $Kategori['id_kat']; ?>" 

                              class="badge badge-danger badge-pill"  

                              onclick="return confirm('Hapus data?');">Hapus</a>
                  </td>


                </tr>


              <?php endforeach; ?>


            </tbody>


          </table>    

 <div class="row">


        <div class="col-md-12">


          <a href="<?= base_url(); ?>index.php/admin/tambahkategori"  

               class="btn btn-primary" onclick="return confirm('Tambah Kategori ?')"> Tambah Kategori</a>


        </div>


    </div>


</div>
