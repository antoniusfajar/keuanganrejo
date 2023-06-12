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
 
          <h1>Data Barang</h1>


          <table class="table table-stripped">


            <thead>


              <tr>


                <th scope="col">Id Barang</th>

                <th scope="col">Nama Barang</th>

                <th scope="col">Stock</th>

                <th scope="col" width="200px">Action</th>


              </tr>


            </thead>


            <tbody>


              <?php foreach ($barang as $barang) :?>


                <tr>


                  <td><?= $barang['id_bar'];?></td>

                  <td><?= $barang['nama_bar'];?></td>
                  <td><?= $barang['stock'];?></td>

                  <td>
                    <a href="<?= base_url(); ?>index.php/admin_barang/detailbarang/<?= $barang['id_bar']; ?>"  

                   class="badge badge-primary badge-pill">Detail</a>


                    <a href="<?= base_url(); ?>index.php/admin_barang/editbarang/<?= $barang['id_bar']; ?>"  

                   class="badge badge-primary badge-pill tampilModalUbah">Edit</a>


                    <a href="<?= base_url(); ?>index.php/admin_barang/hapusbarang/<?= $barang['id_bar']; ?>" 

                              class="badge badge-danger badge-pill"  

                              onclick="return confirm('Hapus data?');">Hapus</a>
                  </td>


                </tr>


              <?php endforeach; ?>


            </tbody>


          </table>    

 <div class="row">


        <div class="col-md-12">


          <a href="<?= base_url(); ?>index.php/admin_barang/tambahbarang"  

               class="btn btn-primary" onclick="return confirm('Tambah Barang ?')"> Tambah Barang</a>


        </div>


    </div>


</div>
