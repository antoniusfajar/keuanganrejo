<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Autocomplete</title>
    <link rel="stylesheet" href="<?php echo base_url().'asset/css/bootstrap.css'?>">
    <link rel="stylesheet" href="<?php echo base_url().'asset/css/jquery-ui.css'?>">
</head>
<body>
    <div class="container">
        <div class="row">
            <h2>Autocomplete Codeigniter</h2>
        </div>
        <div class="row">
            <form>
                <div class="form-group">
                    <label>id Barang</label>
                    <input type="text" class="form-control" id="id_bar" placeholder="Title" style="width:500px;">
                  </div>
                 <div class="form-group">
                    <label>Cari Barang</label>
                    <input type="text" class="form-control" id="nama_bar" placeholder="Title" style="width:500px;">
                  </div>
                  
            </form>
        </div>
    </div>
    <script src="<?php echo base_url().'asset/js/jquery-3.3.1.js'?>" type="text/javascript"></script>
    <script src="<?php echo base_url().'asset/js/bootstrap.js'?>" type="text/javascript"></script>
    <script src="<?php echo base_url().'asset/js/jquery-ui.js'?>" type="text/javascript"></script>
    <script type="text/javascript">
       $(document).ready(function() {
        $('#id_bar').focus();
        $('#nama_bar').autocomplete({
          source: "<?php echo site_url('kasir/get_autocomplete/?'); ?>",

          select: function (event, ui) {
            $('[name="nama_bar"]').val(ui.item.label);
            $('[name="id_bar"]').val(ui.item.idbarang);
            $('#id_bar').focus();
         }
        });
    });

    </script>

</body>
</html>