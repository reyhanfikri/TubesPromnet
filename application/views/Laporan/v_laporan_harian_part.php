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
          <th align="center" scope="col" style="padding-top: 4px; padding-bottom: 4px;">Qty</th>
          <th align="center" scope="col" style="padding-top: 4px; padding-bottom: 4px;">Harga</th>
          <th align="center" scope="col" style="padding-top: 4px; padding-bottom: 4px;">Subtotal</th>
          <th scope="col" style="padding-top: 4px; padding-bottom: 4px;">Kasir</th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 1; $total_item = 0; $total_qty = 0; $total = 0; foreach ($data as $val) { ?>
          <tr>
            <td style="padding-top: 4px; padding-bottom: 4px;"><?php echo $i++; $total_item++; ?></td>
            <td style="padding-top: 4px; padding-bottom: 4px;">
              <a target="_blank" href="<?php echo site_url(); ?>NotaTransPart/nota/<?php echo $val->no_transaksi; ?>" class=""><?php echo $val->tanggal_jam; ?></a>
            </td>
            <td style="padding-top: 4px; padding-bottom: 4px;"><?php echo $val->id_part; ?></td>
            <td style="padding-top: 4px; padding-bottom: 4px;"><?php echo $val->nama_part; ?></td>
            <td align="right" width="65" style="padding-top: 4px; padding-bottom: 4px;"><?php echo $val->qty." Pcs"; $total_qty += $val->qty; ?></td>
            <td align="right" width="120" style="padding-top: 4px; padding-bottom: 4px;"><?php echo number_format($val->harga); ?></td>
            <td align="right" width="120" style="padding-top: 4px; padding-bottom: 4px;"><?php echo number_format($val->subtotal); $total += $val->subtotal; ?></td>
            <td style="padding-top: 4px; padding-bottom: 4px;"><?php echo $val->kasir; ?></td>
          </tr>
        <?php $total_transaksi[] = $val->no_transaksi; } ?>
        <tr class="table-secondary">
            <td style="padding-top: 4px; padding-bottom: 4px;"></td>
            <td style="padding-top: 4px; padding-bottom: 4px;"><b><?php if (isset($total_transaksi)) { echo count(array_count_values($total_transaksi))." Transaksi"; } ?></b></td>
            <td style="padding-top: 4px; padding-bottom: 4px;"><b><?php echo $total_item; ?></b></td>
            <td style="padding-top: 4px; padding-bottom: 4px;"><b><?php echo $total_item." ITEM"; ?></b></td>
            <td align="right" width="65" style="padding-top: 4px; padding-bottom: 4px;"><b><?php echo $total_qty." Pcs"; ?></b></td>
            <td align="right" width="120" style="padding-top: 4px; padding-bottom: 4px;">-</td>
            <td align="right" width="120" style="padding-top: 4px; padding-bottom: 4px;"><b><?php echo number_format($total); ?></b></td>
            <td style="padding-top: 4px; padding-bottom: 4px;">-</td>
          </tr>
      </tbody>
    </table>
  </div>
  <br>
