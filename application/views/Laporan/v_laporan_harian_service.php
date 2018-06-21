  <br>
  <h5><b>Laporan Pendapatan Service -Harian- (<?php echo $hari; ?>, <?php echo $tanggal; ?>)</b></h5>
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
            <td style="padding-top: 4px; padding-bottom: 4px;"><?php echo $val->no_kuitansi; $total_transaksi[] = $val->no_kuitansi; ?></td>
            <td style="padding-top: 4px; padding-bottom: 4px;"><?php if ($val->id_jasa != null) { echo $val->id_jasa; $total_service++; } else { echo $val->id_part; $total_item++; } ?></td>
            <td style="padding-top: 4px; padding-bottom: 4px;"><?php if ($val->nama_jasa != null) { echo $val->nama_jasa; } else { echo $val->nama_part; } ?></td>
            <td style="padding-top: 4px; padding-bottom: 4px;"><?php echo $val->qty; $total_qty += $val->qty; ?></td>
            <td style="padding-top: 4px; padding-bottom: 4px;"><?php if ($val->harga_jasa != null) { echo number_format($val->harga_jasa); } else { echo number_format($val->harga_part); } ?></td>
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
  <div style="padding-left: 700px;">
    <form class="form-inline" method="post" action="<?php echo site_url('LaporanHarian'); ?>">
      <h5>Update Laporan: </h5>
      <input class="form-control" style="width: 165px; margin-left: 9px; margin-right: 10px;" type="date" name="tanggal" value="<?php echo $tanggal_raw; ?>">
      <input class="btn btn-primary" type="submit" name="updatelaporan" value="Update">
    </form>
  </div>
  <br><br>
</div>
