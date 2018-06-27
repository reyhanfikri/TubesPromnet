<div class="container">
  <center> <h2>Edit Transaksi Part</h2> </center><br>
    <form class="" action="<?php echo site_url(); ?>TransaksiPart/editTransPart/<?php echo $id; ?>" method="post">

    <table class="table table-hover">
      <thead>
        <tr class="table-info">
          <th scope="col" style="padding-top: 4px; padding-bottom: 4px;">No</th>
          <th scope="col" style="padding-top: 4px; padding-bottom: 4px;">Id Part</th>
          <th scope="col" style="padding-top: 4px; padding-bottom: 4px;">Nama Barang</th>
          <th scope="col" style="padding-top: 4px; padding-bottom: 4px;">Qty</th>
          <!-- <th align="center" scope="col" style="padding-top: 4px; padding-bottom: 4px;">Harga(Rp)</th>
          <th scope="col" style="padding-top: 4px; padding-bottom: 4px;">Sub Total(Rp)</th> -->
          <th align="center" scope="col" style="padding-top: 4px; padding-bottom: 4px;">Action</th>
        </tr>
      </thead>
      <tbody>
      <?php $i = 1; $totalHarga = 0; $totalJumlah = 0; foreach ($transPart as $val) { ?>
        <tr>
          <td style="padding-top: 4px; padding-bottom: 4px;"><?php echo $i++; ?></td>
          <td style="padding-top: 4px; padding-bottom: 4px;"><?php echo $val->no_part_jasa; ?></td>
          <td style="padding-top: 4px; padding-bottom: 4px;"><?php echo $val->nama_part_jasa; ?></td>

          <td align="right" width="150px" style="padding-top: 4px; padding-bottom: 4px;">
            <div class="form-group row">
              <div class="col-sm-6">
                <input class="form-control" type="text" name="jumlah[]" value="<?php echo $val->jumlah; $totalJumlah = $totalJumlah + $val->jumlah; ?>">
              </div>
            </div>
          </td>

          <!-- <td align="right" width="200px" style="padding-top: 4px; padding-bottom: 4px;">
            <?php echo number_format($val->harga_jual_part_jasa); ?></td> -->
          <!-- <td align="right" width="150px" style="padding-top: 4px; padding-bottom: 4px;">
            <?php echo number_format($val->harga_jual_part_jasa*$val->jumlah); $totalHarga = $totalHarga + ($val->harga_jual_part_jasa*$val->jumlah); ?></td> -->
          <td align="center" style="padding-top: 4px; padding-bottom: 4px;">
            <a href="<?php echo site_url(); ?>TransaksiPart/hapusTempTransPart/<?php echo $val->id_temp_trans_part; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
          </td>
        </tr>
        <?php } ?>
        <tr class="table-active">
          <td style="padding-top: 4px; padding-bottom: 4px;"></td>
          <td style="padding-top: 4px; padding-bottom: 4px;"></td>
          <td style="padding-top: 4px; padding-bottom: 4px;">Total Qty</td>
          <td style="padding-top: 4px; padding-bottom: 4px;"> &emsp;<?php echo $totalJumlah; ?></td>
          <!-- <td style="padding-top: 4px; padding-bottom: 4px;">Grand Total Belanja(Rp.):</td>
          <td align="right" style="padding-top: 4px; padding-bottom: 4px;"><?php echo number_format($totalHarga); ?></td> -->
          <td align="center" style="padding-top: 4px; padding-bottom: 4px;"></td>
        </tr>
      </tbody>
    </table>

    <center>
    <div class="">
      <a href="<?php echo site_url(); ?>TransaksiPart/detailTransPart/<?php echo $id; ?>" class="btn btn-danger">Batal</a>
      <button type="submit" class="btn btn-primary">Selesai</button>
    </div>
    </center>
  </form>
</div>
