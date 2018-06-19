  <br>
  <h5><b>Laporan Pendapatan Service -Harian- (<?php echo $hari; ?>, <?php echo $tanggal; ?>)</b></h5>
  <div style="padding-left: 0px;">
    <table class="table table-hover">
      <thead>
        <tr class="table-info">
          <th scope="col" style="padding-top: 4px; padding-bottom: 4px;">No</th>
          <th scope="col" style="padding-top: 4px; padding-bottom: 4px;">Tanggal/Jam</th>
          <th scope="col" style="padding-top: 4px; padding-bottom: 4px;">Id Jasa</th>
          <th scope="col" style="padding-top: 4px; padding-bottom: 4px;">Nama Jasa</th>
          <th scope="col" style="padding-top: 4px; padding-bottom: 4px;">Qty</th>
          <th scope="col" style="padding-top: 4px; padding-bottom: 4px;">Harga</th>
          <th scope="col" style="padding-top: 4px; padding-bottom: 4px;">Subtotal</th>
          <th scope="col" style="padding-top: 4px; padding-bottom: 4px;">Kasir</th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 1; $total_qty = 0; $total = 0; foreach ($data2 as $val) { ?>
          <tr>
            <td style="padding-top: 4px; padding-bottom: 4px;"><?php echo $i++; ?></td>
            <td style="padding-top: 4px; padding-bottom: 4px;"><?php echo $val->tanggal_jam; ?></td>
            <td style="padding-top: 4px; padding-bottom: 4px;"><?php echo $val->id_jasa; ?></td>
            <td style="padding-top: 4px; padding-bottom: 4px;"><?php echo $val->nama_jasa; ?></td>
            <td style="padding-top: 4px; padding-bottom: 4px;"><?php echo $val->qty; $total_qty += $val->qty; ?></td>
            <td style="padding-top: 4px; padding-bottom: 4px;"><?php echo number_format($val->harga); ?></td>
            <td style="padding-top: 4px; padding-bottom: 4px;"><?php echo number_format($val->subtotal); $total += $val->subtotal; ?></td>
            <td style="padding-top: 4px; padding-bottom: 4px;"><?php echo $val->kasir; ?></td>
          </tr>
        <?php } ?>
        <tr class="table-secondary">
            <td style="padding-top: 4px; padding-bottom: 4px;"></td>
            <td style="padding-top: 4px; padding-bottom: 4px;"></td>
            <td style="padding-top: 4px; padding-bottom: 4px;"></td>
            <td style="padding-top: 4px; padding-bottom: 4px;"><b><?php echo "TOTAL"; ?></b></td>
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
      <input class="form-control" style="width: 165px; margin-left: 9px; margin-right: 10px;" type="date" name="tanggal">
      <input class="btn btn-primary" type="submit" name="updatelaporan" value="Update">
    </form>
  </div>
</div>
