<!DOCTYPE html PUBLIC >
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Struk Penjualan</title>
<style type="text/css">
body {
	font-family: Calibri;
	font-size: 8pt;
	color: #000;}
</style>
</head>

<body onload="print()">
<table width="250" border="0" align="center">
  <tr>
    <td colspan="4" align="center"><font color="#000000" size="+2" style="text-transform:uppercase"> TB REJO JAYA</font></td>
  </tr>
  <tr>
    <td><?php echo $nota->id_nota; ?></td>
    <td colspan="3" align="right"><?php echo $tgl . " " . $waktu ?></td>
  </tr>
  <tr>
    <td colspan="2">Nama Pembeli</td>
    <td colspan="2"><?php echo $napem?></td>
  </tr>
  <tr>
    <td colspan="2">Nama Kasir</td>
    <td colspan="2"><?php echo $naka?></td>
  </tr>
  <tr>
  	<td colspan="4"><hr /> </td>
  </tr>
  </table>
<table width="250" border="0" align="center">
  <?php foreach ($produk as $key): ?>
  <tr>
    <td>
    <div style="font-size: 10px;text-transform:uppercase;"><?php echo $key->nama_bar ?></div></td>
    <td valign="bottom"><?php echo $key->jml_beli ?></td>
    <td valign="bottom"><div align="right"><?php echo number_format($key->harga_jual, 0, ',', '.') ?></div> </td>
    <td valign="bottom"><div align="right"><?php echo number_format($key->sub_total, 0, ',', '.') ?></div></td>
  </tr>
<?php
$total_item += $key->jml_beli;
$subtotal += $key->sub_total;
?>
 <?php endforeach?>
 <tr>
    <td colspan="4"><hr /> </td>
  </tr>
  <tr>
    <td>TOTAL</td>
    <td colspan="2"><?php echo $total_item ?> ITEM</td>
    <td></td>
  </tr>
  <tr>
    <td align="right">GRAND TOTAL</td>
    <td></td>
    <td colspan="2"><div align="right"><?php echo number_format($subtotal, 0, ',', '.') ?></div></td>
  </tr>
  <tr>
    <td align="right">TUNAI</td>
    <td></td>
    <td colspan="2"><div align="right"><?php echo number_format($bayar, 0, ',', '.') ?></div></td>
  </tr>
  <tr>
    <td align="right">KEMBALI</td>
    <td></td>
    <td colspan="2"><div align="right"><?php echo number_format($kembali, 0, ',', '.') ?></div></td>
  </tr>
  <tr>
    <tr>
    <td colspan="4"><hr /> </td>
  </tr>
   <tr>
    <td align="right">SISA</td>
    <td></td>
    <td colspan="2"><div align="right"><?php echo number_format($sisa, 0, ',', '.') ?></div></td>
  </tr>
    <td align="right">Status</td>
    <td></td>
    <td colspan="2"><div align="right"><?php echo $status ?></div></td>
  </tr>
  
  <tr>
    <td colspan="4" align="center"><hr />
    <p>TERIMA KASIH ATAS KUNJUNGAN ANDA</p></td>
  </tr>
</table>
<script>
      if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
</body>
</html>