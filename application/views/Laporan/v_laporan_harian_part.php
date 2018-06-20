<div class="container">
  <br>
  <h5><b>Laporan Penjualan Part -Harian- (<?php echo $hari; ?>, <?php echo $tanggal; ?>)</b></h5>
  <div style="padding-left: 0px;">
    <table class="table table-hover">
      <thead>
        <tr class="table-info">
          <th scope="col" style="padding-top: 4px; padding-bottom: 4px;">No</th>
          <th scope="col" style="padding-top: 4px; padding-bottom: 4px;">Tanggal/Jam</th>
          <th scope="col" style="padding-top: 4px; padding-bottom: 4px;">Id Part</th>
          <th scope="col" style="padding-top: 4px; padding-bottom: 4px;">Nama Part</th>
          <th scope="col" style="padding-top: 4px; padding-bottom: 4px;">Qty</th>
          <th scope="col" style="padding-top: 4px; padding-bottom: 4px;">Harga</th>
          <th scope="col" style="padding-top: 4px; padding-bottom: 4px;">Subtotal</th>
          <th scope="col" style="padding-top: 4px; padding-bottom: 4px;">Kasir</th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 1; $total_item = 0; $total_qty = 0; $total = 0; foreach ($data as $val) { ?>
          <tr>
            <td style="padding-top: 4px; padding-bottom: 4px;"><?php echo $i++; $total_item++; ?></td>
            <td style="padding-top: 4px; padding-bottom: 4px;"><?php echo $val->tanggal_jam; ?></td>
            <td style="padding-top: 4px; padding-bottom: 4px;"><?php echo $val->id_part; ?></td>
            <td style="padding-top: 4px; padding-bottom: 4px;"><?php echo $val->nama_part; ?></td>
            <td style="padding-top: 4px; padding-bottom: 4px;"><?php echo $val->qty." Pcs"; $total_qty += $val->qty; ?></td>
            <td style="padding-top: 4px; padding-bottom: 4px;"><?php echo number_format($val->harga); ?></td>
            <td style="padding-top: 4px; padding-bottom: 4px;"><?php echo number_format($val->subtotal); $total += $val->subtotal; ?></td>
            <td style="padding-top: 4px; padding-bottom: 4px;"><?php echo $val->kasir; ?></td>
          </tr>
        <?php } ?>
        <tr class="table-secondary">
            <td style="padding-top: 4px; padding-bottom: 4px;"></td>
            <td style="padding-top: 4px; padding-bottom: 4px;"></b></td>
            <td style="padding-top: 4px; padding-bottom: 4px;"><b><?php echo "TOTAL"; ?></td>
            <td style="padding-top: 4px; padding-bottom: 4px;"><b><?php echo $total_item." ITEM"; ?></b></td>
            <td style="padding-top: 4px; padding-bottom: 4px;"><b><?php echo $total_qty." Pcs"; ?></b></td>
            <td style="padding-top: 4px; padding-bottom: 4px;">-</td>
            <td style="padding-top: 4px; padding-bottom: 4px;"><b><?php echo number_format($total); ?></b></td>
            <td style="padding-top: 4px; padding-bottom: 4px;">-</td>
          </tr>
      </tbody>
    </table>
  </div>
  <br>