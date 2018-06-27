<div class="container">
  <br>
  <h4 style="padding-bottom: 10px;"><b>Edit Laporan (No. INVOICE: <?php echo $data->nomor_invoice; ?>)</b></h4>
  <div style="padding-top: 5px; padding-bottom: 30px; padding-left: 7px; padding-right: 7px; background-color: #f2f2f2;">
    <div style="font-size: 18px;"><b>
      <?php if ($data->hari == "Monday") {

        echo "Senin";

      } else if ($data->hari == "Tuesday") {

        echo "Selasa";

      } else if ($data->hari == "Wednesday") {

        echo "Rabu";

      } else if ($data->hari == "Thursday") {

        echo "Kamis";

      } else if ($data->hari == "Friday") {

        echo "Jumat";

      } else if ($data->hari == "Saturday") {

        echo "Sabtu";

      } else if ($data->hari == "Sunday") {

        echo "Minggu";

      } echo ", ".$data->tanggal_pembelian; ?>
    </b></div>
    <br>
    <form method="post" action="<?php echo site_url(); ?>LaporanPembelianPart/updateLaporan">
      <table class="table table-hover">
      <thead>
        <tr class="table-info">
          <th scope="col" style="padding-top: 4px; padding-bottom: 4px;">No</th>
          <th scope="col" style="padding-top: 4px; padding-bottom: 4px;">Id Part</th>
          <th scope="col" style="padding-top: 4px; padding-bottom: 4px;">Nama Part</th>
          <th align="right" scope="col" style="padding-top: 4px; padding-bottom: 4px;">Qty Awal</th>
          <th align="right" scope="col" style="padding-top: 4px; padding-bottom: 4px;">Qty Tambah</th>
          <th align="right" scope="col" style="padding-top: 4px; padding-bottom: 4px;">Harga Beli</th>
          <th align="right" scope="col" style="padding-top: 4px; padding-bottom: 4px;">Subtotal</th>
        </tr>
      </thead>
      <tbody>
        <?php $no = 1; $total_item = 0; $total_qty_tambah = 0; $total = 0; foreach ($data_detail as $val) { ?>
          <tr>
            <td style="padding-top: 4px; padding-bottom: 4px;"><?php echo $no++; $total_item++; ?></td>
            <td style="padding-top: 4px; padding-bottom: 4px;"><?php echo $val->id_part; ?></td>
            <td style="padding-top: 4px; padding-bottom: 4px;"><?php echo $val->nama_part; ?></td>
            <td align="right" width="150" style="padding-top: 4px; padding-bottom: 4px;"><?php echo $val->qty_awal." Pcs"; ?></td>
            <td align="right" width="150" style="padding-top: 4px; padding-bottom: 4px;"><input style="padding-left: 5px; width: 50px; border-radius: 5px;" type="number" name="qty_tambah_<?php echo $no; ?>" value="<?php echo $val->qty_tambah; $total_qty_tambah += $val->qty_tambah; ?>"> Pcs</td>
            <td align="right" width="150" style="padding-top: 4px; padding-bottom: 4px;"><?php echo number_format($val->harga_beli); ?></td>
            <td align="right" width="150" style="padding-top: 4px; padding-bottom: 4px;"><?php echo number_format($val->subtotal); $total += $val->subtotal; ?></td>
          </tr>
          <input type="hidden" name="kode_<?php echo $no; ?>" value="<?php echo $val->kode; ?>">
          <input type="hidden" name="kode2_<?php echo $no; ?>" value="<?php echo $val->kode2; ?>">
          <input type="hidden" name="stok_part_<?php echo $no; ?>" value="<?php echo $val->qty_awal; ?>">
        <?php } ?>
          <tr>
            <td style="padding-top: 4px; padding-bottom: 4px;"></td>
            <td style="padding-top: 4px; padding-bottom: 4px;"></td>
            <td style="padding-top: 4px; padding-bottom: 4px;"><b></b></td>
            <td align="right" width="150" style="padding-top: 4px; padding-bottom: 4px;"><b><?php echo "ITEM: [".$total_item."]"; ?></b></td>
            <td align="right" width="150" style="padding-top: 4px; padding-bottom: 4px;"><b><?php echo "QTY: [".$total_qty_tambah."]"; ?></b></td>
            <td align="right" width="150" style="padding-top: 4px; padding-bottom: 4px;"><b>TOTAL</b></td>
            <td align="right" width="150" style="padding-top: 4px; padding-bottom: 4px;"><b><?php echo number_format($total); ?></b></td>
          </tr>
        </tbody>
      </table>
    <input type="hidden" name="no" value="<?php echo $no; ?>">
    <br>
    <center>
      <div>
        <a href="<?php echo site_url(); ?>LaporanPembelianPart" class="btn btn-danger">Batal</a>
        <input class="btn btn-success" type="submit" name="submit" value="Selesai">
      </div>
    </center>
    </form>
    </div>
  <br>
  <br>
</div>