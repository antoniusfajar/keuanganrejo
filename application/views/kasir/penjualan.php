  <div class="content-wrapper" style="margin-bottom: 20px">
    <div style="margin-left: 20px;margin-right: 20px">
      <div class="row">

        <div class="col-md-6">
          <div class="panel panel-default">
            <div class="panel-body">
               <?php if( validation_errors() ) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= validation_errors(); ?>
                      </div>
                    <?php endif; ?>
              <div class="form-horizontal">
                <div class="form-group">
                  <label class="control-label col-md-6">ID Barang</label>
                  <div class="col-md-6">
                    <input type="hidden" id="id_nota" name="id_nota" value="<?php echo $nota->id_nota ?>" >
                  <div class="input-group">
                    <input type="text" class="form-control" id="id_bar" name="id_bar" required placeholder="ID Barang">
                    <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                <i class="fas fa-plus fa-sm"></i>
                </button>
              </div>
              </div>
              </div>
              </div>



              <div class="form-group">
              <label class="control-label col-sm-6"> Nama Barang</label>
              <div class="col-md-6">
              <div class="input-group">
              <input type="text" class="form-control" id="nama_bar" placeholder="Cari Nama Barang" aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
            <div class="col-md-6"> 
            <div class="panel panel-default">
            <div class="panel-body">
            <div class="form-horizontal">
            <div class="form-group" >
            <label class="control-label col-sm-6">ID Nota</label>
            <div class="col-md-6">
                    <input type="text" class="form-control" id="nota_id" readonly="readonly" value="<?php echo $nota->id_nota ?> ">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-6">Tanggal</label>
                  <div class="col-md-6">
                    <input type="text" class="form-control" id="tanggal" name="tanggal" readonly="readonly" value=" <?php echo $tgl ?> ">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


        <div class="col-md-12" >
          <div class="panel panel-default">
            <div class="panel-body" >
            <table id="tbUser" class="table ">
              <thead>
                <tr>
                  <td align="center">Aksi</td>
                  <td>ID Detail Penjualan</td>
                  <td>Nama Barang</td>
                  <td align="right">Harga</td>
                  <td align="center">Jumlah</td>
                  <td align="center">Satuan</td>
                  <td align="right">Subtotal</td>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($list->result() as $key): ?>
                <tr>
                  <td align="center"><a onclick="return confirm('Yakin hapus barang ini?');" href="<?php echo base_url('index.php/kasir/hapus_barang_beli/') . $key->id_nota . "/" . $key->id_bar . "/" . $key->id_detail ?>" >Hapus</a></td>
                  <td><?php echo $key->id_detail ?></td>
                  <td><?php echo $key->nama_bar ?></td>
                  <td align="right"><?php echo number_format($key->harga_jual, 0, ',', '.') ?></td>
                  <td align="center">
                  <form action="<?php echo base_url('index.php/kasir/edit_jumlah_beli/') ?>" method="post">
                    <input name="id_det_h" type="hidden" id="id_det_h" value="<?php echo $key->id_detail ?>"/>
                    <input name="id_bar_h" type="hidden" id="id_bar_h" value="<?php echo $key->id_bar ?>"/>
                    <input name="id_nota_h" type="hidden" id="id_nota_h" value="<?php echo $key->id_nota ?>"/>
                    <input style="text-align: center;" name="jml" type="text" id="jml" size="3"  value="<?php echo $key->jml_beli ?>" />
                  </form>
                  <td align="center">
                    <?php echo $key->satuan ?>
                  </td>
                  </td>
                  <td align="right"><?php echo number_format($key->sub_total, 0, ',', '.') ?></td>
                </tr>
<?php
$tot_item += $key->jml_beli;
$tot_belanja += $key->sub_total;
?>
                <?php endforeach?>
              </tbody>
              <tr>
                <td colspan="4" align="right"><strong>Total Harga</strong></td>
                <td align="center"><strong><?php echo $tot_item ?> Items</strong></td>
                <td align="margin-left"></td>
                <td align="right"><strong>Rp. <?php echo number_format($tot_belanja, 0, ',', '.') ?></strong></td>
              </tr>
            </table>
          </div>
        </div>
      </div>

             
        <div class="col-md-12">
        <div class="panel panel-default">
        <div class="panel-body">

        <form target="printnota" id="formcetak" action="<?php echo base_url('index.php/kasir/print_nota') ?>"  onsubmit="window.open('about:blank','printnota','width=500,height=400');" method="post"> 
            <div class="form-group">
              <label class="col-md-12" align="center">Nama Pembeli :</label>
              <div class="col-md-12">
                <input type="text" name="nama_pembeli" id="nama_pembeli" class="form-control" placeholder="Nama Pembeli" style="text-align: center;" >
              </div> 
            </div>
            <div class="form-group">
              <label class="col-md-12" align="center">No Telephone :</label>
              <div class="col-md-12">
                <input type="text" name="no_tlf" id="no_tlf" class="form-control" placeholder="Nama Pembeli" style="text-align: center;" >
              </div> 
            </div>
            <div class="form-group">
              <label class="col-md-12" align="center">Alamat :</label>
              <div class="col-md-12">
                <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Nama Pembeli" style="text-align: center;" >
              </div> 
            </div>
              <div class="form-group">
                <label class="col-md-12" align="center">Total Belanja :</label>
              <div class="col-md-12">
                <input type="hidden" name="id_nota_p" id="id_nota_p" value="<?php echo $nota->id_nota ?>" align="center">
                <input type="text" name="total_belanja" id="total_belanja" readonly="readonly" value="<?php echo number_format($tot_belanja, 0, ',', '.')?>" class="form-control" style="text-align: center;">
                <input type="hidden" name="total_belanjak" id="total_belanjak" value="<?php echo $tot_belanja ?>" class="form-control" style="text-align: center;">
              </div>
            </div>
            </div>
              <div class="form-group">
                <label class="col-md-12" align="center">Jumlah Bayar :</label>
              <div class="col-md-12">
                <input type="text" name="jml_bayar" id="jml_bayar" class="form-control" placeholder="Jumlah Bayar" style="text-align: center;" autocomplete="off">
                <input type="hidden" name="jml_bayarp" id="jml_bayarp">
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-12" align="center">Kembali Rp :</label>
              <div class="col-md-12">
                <input type="text" name="kembali" id="kembali" placeholder="Kembali" readonly="readonly" class="form-control" style="text-align: center;">
                <input type="hidden" name="kembalik" id="kembalik" class="form-control" style="text-align: center;">
              </div>
            </div>
              <div class="form-group">
                <label class="col-md-12" align="center">Sisa :</label>
              <div class="col-md-12">
                <input type="text" name="sisa" id="sisa" placeholder="Sisa " readonly="readonly" class="form-control" style="text-align: center;">
                <input type="hidden" name="sisak" id="sisak" class="form-control" style="text-align: center;">
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-12">
                <button onclick="transaksibaru();" type="submit" class="btn btn-danger col-md-12" id="btncetak" align="pull-right" onclick="return confirm('Simpan pembayaran ?')">Bayar</button>
              </div>
          </div>
        </form>    
        </div>
      </div>
    </div>
  </div>  
</div>

  <script src="<?= base_url('asset/') ; ?>js/sb-admin-2.min.js"></script>
  <script src="<?php echo base_url() ?>asset/js/jquery-3.3.1.js"></script>
  <script src="<?php echo base_url() ?>asset/js/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url() ?>asset/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?php echo base_url() ?>asset/js/jquery-ui.min.js"></script>
  <script src="<?php echo base_url() ?>asset/js/jquery.price_format.min.js"></script>
   <script>

      function startTime() {
        var today = new Date();
        var h = today.getHours();
        var m = today.getMinutes();
        var s = today.getSeconds();
        m = checkTime(m);
        s = checkTime(s);
        document.getElementById('waktu').innerHTML = h + ":" + m + ":" + s;
        var t = setTimeout(startTime, 500);
      }

      function checkTime(i) {
          if (i < 10) {i = "0" + i};
          return i;
      }

          $(function(){
          $('#jml_bayar').priceFormat({
                  prefix: '',
                  centsLimit: 0,
                  thousandsSeparator: '.'
          });
          $('#sisa').priceFormat({
                  prefix: '',
                  centsLimit: 0,
                  thousandsSeparator: '.'
          });
          $('#kembali').priceFormat({
                  prefix: '',
                  centsLimit: 0,
                  thousandsSeparator: '.'
          });
        });

     $(document).ready(function() {
        $('#id_bar').focus();
        $('#nama_bar').autocomplete({
          source: "<?php echo site_url('kasir/get_autocomplete/?');?>" ,
          select: function (event, ui) {
          $('[name="nama_bar"]').val(ui.item.label);
          $('[name="id_bar"]').val(ui.item.key);
          $('#id_bar').focus();
         }
      });

    $('#jml_bayar').keyup(function(e){
    total();
    });


    $("#id_bar").keypress(function(e){
        var id_bar= $('#id_bar').val();
        var id_nota = $('#id_nota').val();
        var code = e.which
        if(code==13){
          if (id_bar) {
            window.top.location.href = "<?php echo site_url('kasir/cekbarang/') ?>"+id_nota+"/"+id_bar;
          }
          return false;
        }
    });

    $("#btncetak").on('click',function(e){
    $("#formcetak").submit(function(){
      window.open('about:blank','printnota','width=500,height=400');
      this.target ='printnota';
      window.location.href = "<?php echo site_url('kasir/transaksi_selesai/'); ?>";
    });
    });


  function transaksibaru(){
    window.location.href = "<?php echo site_url('kasir/transaksi_selesai/') ?>";
  }
  });


  function total() {
    let totalblanja = $('#total_belanjak').val();
    let jmlbayar = $('#jml_bayar').val();
    
    let hitungbayar;
    let totalblanjax = totalblanja.replace(/[^\d]/g,"");
    let jmlbayarx = jmlbayar.replace(/[^\d]/g,"");
    hitungbayar = totalblanjax - jmlbayarx;
    if (hitungbayar >= 0 ) {
       let sisa = hitungbayar;
       let kembali = 0 ;

    sisax = (new Intl.NumberFormat('ja-JP', { maximumSignificantDigits: 3 }).format(sisa));
    kembalix = (new Intl.NumberFormat('ja-JP', { maximumSignificantDigits: 3 }).format(kembali));
    $('#sisa').val(sisax);
    $('#sisak').val(sisa);
    $('#kembalik').val(kembali);
    $('#kembali').val(kembalix);
    }
    else {
    let kembali = -1 * hitungbayar;
    let sisa = 0 ;

    let sisax = (new Intl.NumberFormat('ja-JP', { maximumSignificantDigits: 3 }).format(sisa));
    let kembalix = (new Intl.NumberFormat('ja-JP', { maximumSignificantDigits: 3 }).format(kembali));
    $('#sisak').val(sisa);
    $('#kembalik').val(kembali);
    $('#sisa').val(sisax);
    $('#kembali').val(kembalix);
    }
    $('#jml_bayarp').val(jmlbayarx);
    }
</script>
</body>
</html>