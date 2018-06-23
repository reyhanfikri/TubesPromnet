<div class="container">
  <legend>Tabel Transaksi</legend>
  <table class="table table-hover">
    <thead>
      <tr class="table-info">
        <th scope="col" style="padding-top: 4px; padding-bottom: 4px;">No</th>
        <th scope="col" style="padding-top: 4px; padding-bottom: 4px;">Id Part</th>
        <th scope="col" style="padding-top: 4px; padding-bottom: 4px;">Nama Barang</th>
        <th scope="col" style="padding-top: 4px; padding-bottom: 4px;">Qty</th>
        <th scope="col" style="padding-top: 4px; padding-bottom: 4px;">Harga(Rp)</th>
        <th scope="col" style="padding-top: 4px; padding-bottom: 4px;">Sub Total(Rp)</th>
        <th scope="col" style="padding-top: 4px; padding-bottom: 4px;">Action</th>
      </tr>
    </thead>
    <tbody>
    <?php $i = 1; $totalHarga = 0; $totalJumlah = 0; foreach ($transPart as $val) { ?>
      <tr>
        <td style="padding-top: 4px; padding-bottom: 4px;"><?php echo $i++; ?></td>
        <td style="padding-top: 4px; padding-bottom: 4px;"><?php echo $val->no_part; ?></td>
        <td style="padding-top: 4px; padding-bottom: 4px;"><?php echo $val->nama_part; ?></td>
        <td style="padding-top: 4px; padding-bottom: 4px;"><?php echo $val->jumlah; $totalJumlah = $totalJumlah + $val->jumlah; ?></td>
        <td style="padding-top: 4px; padding-bottom: 4px;"><?php echo number_format($val->harga_part); ?></td>
        <td style="padding-top: 4px; padding-bottom: 4px;"><?php echo number_format($val->harga_part*$val->jumlah); $totalHarga = $totalHarga + ($val->harga_part*$val->jumlah); ?></td>
        <td style="padding-top: 4px; padding-bottom: 4px;">
          <a href="<?php echo site_url(); ?>TransaksiPart/hapusTempTransPart/<?php echo $val->id_temp_trans_part; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
        </td>
      </tr>
      <?php } ?>
      <tr class="table-active">
        <td style="padding-top: 4px; padding-bottom: 4px;"></td>
        <td style="padding-top: 4px; padding-bottom: 4px;"></td>
        <td style="padding-top: 4px; padding-bottom: 4px;">Total Qty</td>
        <td style="padding-top: 4px; padding-bottom: 4px;"><?php echo $totalJumlah; ?></td>
        <td style="padding-top: 4px; padding-bottom: 4px;">Grand Total Belanja(Rp.):</td>
        <td style="padding-top: 4px; padding-bottom: 4px;"><?php echo number_format($totalHarga); ?></td>
        <td style="padding-top: 4px; padding-bottom: 4px;"></td>
      </tr>
    </tbody>

  </table>
  <center>
  <div class="">
    <a href="<?php echo site_url(); ?>TransaksiPart/clearTempTransPart" class="btn btn-danger">Clear</a>
    <a href="<?php echo site_url(); ?>TransaksiPart/tambahTransPartMain" class="btn btn-success">Selesai</a>
  </div>
  </center>
</div>
