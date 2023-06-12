
<div class="card mb" style="max-width: 1000px;">
  <div class="row g-0">
    <div class="col-md-2">
      <img src="<?= base_url('asset/img/foto/').$user['photo'] ;?>" class="card-img">
    </div>
<div class="col-md">
    <div class="card-body">
<form action="<?php echo base_url('index.php/profil/updateprofile/') ?>" method="post">
    <div class="form-group row">
	     <label for="username" class="col-sm-3 col-form-label">Username</label>
	   <div class="col-sm-8">
		    <input type="text" class="form-control" id="username" name="username" readonly="readonly" value="<?= $user['username']; ?>">
	   </div>
</div>
</div>
    <div class="form-group row">
	     <label for="fullname" class="col-sm-3 col-form-label">Nama lengkap</label>
	       <div class="col-sm-8">
		    <input type="text" class="form-control" id="fullname" name="fullname" value="<?= $user['full_name']; ?>">
	</div>
</div>
<div class="form-group row">
       <label for="email" class="col-sm-3 col-form-label">Email</label>
         <div class="col-sm-8">
        <input type="text" class="form-control" id="email" name="email" value="<?= $user['email']; ?>">
  </div>
</div>
  <div class="form-group row">
       <label for="photo" class="col-sm-3 col-form-label">Ganti Foto</label>
         <div class="col-sm-8">
        <div class="custom-file">
        <input type="file" class="custom-file-input" id="photo" name="photo">
        <label class="custom-file-label" for="photo">Choose file</label>
  </div>
</div>
      </div>
            <button type="submit"> Update </button>
    </div>
  </form>
  </div>
</div>
