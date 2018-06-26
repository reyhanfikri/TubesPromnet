  <br>
  <h5><b>Laporan Pendapatan Service -Bulanan- (<?php echo $bulan_tahun; ?>)</b></h5>
  <div style="padding-left: 0px;">
    <table class="table table-hover">
      <thead>
        <tr class="table-info">
          <th scope="col" style="padding-top: 4px; padding-bottom: 4px;">No</th>
          <th scope="col" style="padding-top: 4px; padding-bottom: 4px;">Tanggal/Jam</th>
          <th scope="col" style="padding-top: 4px; padding-bottom: 4px;">No Kuitansi</th>
          <th scope="col" style="padding-top: 4px; padding-bottom: 4px;">Id Part/Id Jasa</th>
          <th scope="col" style="padding-top: 4px; padding-bottom: 4px;">Nama Part/Nama Jasa</th>
          <th scope="col" style="padding-top: 4px; padding-bottom: 4px;">Qty</th>
          <th scope="col" style="padding-top: 4px; padding-bottom: 4px;">Harga</th>
          <th scope="col" style="padding-top: 4px; padding-bottom: 4px;">Subtotal</th>
          <th scope="col" style="padding-top: 4px; padding-bottom: 4px;">Kasir</th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 1; $total_item = 0; $total_service = 0; $total_qty = 0; $total = 0; foreach ($data2 as $val) { ?>
          <tr>
            <td style="padding-top: 4px; padding-bottom: 4px;"><?php echo $i++; ?></td>
            <td style="padding-top: 4px; padding-bottom: 4px;"><?php echo $val->tanggal_jam; ?></td>
            <td style="padding-top: 4px; padding-bottom: 4px;">
              <a target="_blank" href="<?php echo site_url(); ?>NotaTransService/nota/<?php echo $val->no_kuitansi; ?>" class=""><?php echo $val->no_kuitansi; $total_transaksi[] = $val->no_kuitansi; ?></a>
            </td>
            <td style="padding-top: 4px; padding-bottom: 4px;"><?php echo $val->id_part_jasa; if ($val->tipe == "Sparepart") { $total_item++; } else if ($val->tipe == "Jasa") { $total_service++; } ?></td>
            <td style="padding-top: 4px; padding-bottom: 4px;"><?php echo $val->nama_part_jasa; ?></td>
            <td style="padding-top: 4px; padding-bottom: 4px;"><?php echo $val->qty; $total_qty += $val->qty; ?></td>
            <td style="padding-top: 4px; padding-bottom: 4px;"><?php echo number_format($val->harga); ?></td>
            <td style="padding-top: 4px; padding-bottom: 4px;"><?php echo number_format($val->subtotal); $total += $val->subtotal; ?></td>
            <td style="padding-top: 4px; padding-bottom: 4px;"><?php echo $val->kasir; ?></td>
          </tr>
        <?php } ?>
        <tr class="table-secondary">
            <td style="padding-top: 4px; padding-bottom: 4px;"></td>
            <td style="padding-top: 4px; padding-bottom: 4px;"></td>
            <td style="padding-top: 4px; padding-bottom: 4px;"><b><?php if (isset($total_transaksi)) { echo count(array_count_values($total_transaksi))." Transaksi"; } ?></b></td>
            <td style="padding-top: 4px; padding-bottom: 4px;"><b><?php echo $total_item + $total_service; ?></b></td>
            <td style="padding-top: 4px; padding-bottom: 4px;"><b><?php echo $total_item." ITEM / ".$total_service." SERVICE"; ?></b></td>
            <td style="padding-top: 4px; padding-bottom: 4px;"><b><?php echo $total_qty; ?></b></td>
            <td style="padding-top: 4px; padding-bottom: 4px;">-</td>
            <td style="padding-top: 4px; padding-bottom: 4px;"><b><?php echo number_format($total); ?></b></td>
            <td style="padding-top: 4px; padding-bottom: 4px;">-</td>
          </tr>
      </tbody>
    </table>
  </div>
  <br>
  <div style="padding-left: 695px;">
    <form class="form-inline" method="post" action="<?php echo site_url('LaporanPendapatanBulanan'); ?>">
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
