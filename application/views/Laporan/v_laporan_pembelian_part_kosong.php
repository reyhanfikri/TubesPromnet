<div class="container">
  <br>
  <h5 style="padding-bottom: 10px;"><b>Laporan Pembelian Part -Bulanan- (Bulan: <?php echo $bulan_tahun; ?>)&nbsp;|&nbsp;Jumlah Transaksi Pembelian: [<?php echo $data2->total_transaksi_pembelian ?>], Total Nilai Pembelian: [<?php echo number_format($data2->total_nilai_pembelian) ?>]&nbsp;|</b></h5>
  <br>
  <div style="padding-top: 30px; padding-bottom: 30px; padding-left: 7px; padding-right: 7px; background-color: #f2f2f2;">
    <h3 style="color: #a8a8a8;"><center><i>LAPORAN KOSONG</i></center></h3>
  </div>
  <br>
  <div style="padding-left: 695px;">
    <form class="form-inline" method="post" action="<?php echo site_url('LaporanPembelianPart'); ?>">
      <h5>Filter Laporan: </h5>
      <select name="bulan" class="form-control" style="width: 70px; margin-left: 9px; margin-right: 1px;">
        <option value="01" <?php if ($bulan == 1) { ?> selected <?php } ?>>01</option>
        <option value="02" <?php if ($bulan == 2) { ?> selected <?php } ?>>02</option>
        <option value="03" <?php if ($bulan == 3) { ?> selected <?php } ?>>03</option>
        <option value="04" <?php if ($bulan == 4) { ?> selected <?php } ?>>04</option>
        <option value="05" <?php if ($bulan == 5) { ?> selected <?php } ?>>05</option>
        <option value="06" <?php if ($bulan == 6) { ?> selected <?php } ?>>06</option>
        <option value="07" <?php if ($bulan == 7) { ?> selected <?php } ?>>07</option>
        <option value="08" <?php if ($bulan == 8) { ?> selected <?php } ?>>08</option>
        <option value="09" <?php if ($bulan == 9) { ?> selected <?php } ?>>09</option>
        <option value="10" <?php if ($bulan == 10) { ?> selected <?php } ?>>10</option>
        <option value="11" <?php if ($bulan == 11) { ?> selected <?php } ?>>11</option>
        <option value="12" <?php if ($bulan == 12) { ?> selected <?php } ?>>12</option>
      </select>
      <select name="tahun" class="form-control" style="width: 90px; margin-left: 9px; margin-right: 10px;">
        <option value="2015" <?php if ($tahun == 2015) { ?> selected <?php } ?>>2015</option>
        <option value="2016" <?php if ($tahun == 2016) { ?> selected <?php } ?>>2016</option>
        <option value="2017" <?php if ($tahun == 2017) { ?> selected <?php } ?>>2017</option>
        <option value="2018" <?php if ($tahun == 2018) { ?> selected <?php } ?>>2018</option>
        <option value="2019" <?php if ($tahun == 2019) { ?> selected <?php } ?>>2019</option>
      </select>
      <input class="btn btn-primary" type="submit" name="updatelaporan" value="Filter">
    </form>
  </div>
  <br><br>
</div>