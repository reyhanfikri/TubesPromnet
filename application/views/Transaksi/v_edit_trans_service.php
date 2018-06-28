<div class="container">
  <center> <h2>Edit Transaksi Service</h2> </center><br>
    <form class="" action="<?php echo site_url(); ?>TransaksiService/editTransService/<?php echo $noKwitansi; ?>" method="post">

    <table class="table table-hover">
      <thead>
        <tr class="table-info">
          <th scope="col" style="padding-top: 4px; padding-bottom: 4px;">No</th>
          <th scope="col" style="padding-top: 4px; padding-bottom: 4px;">Id Part/Id Jasa</th>
          <th scope="col" style="padding-top: 4px; padding-bottom: 4px;">Nama Part/Id Jasa</th>
          <th scope="col" style="padding-top: 4px; padding-bottom: 4px;">Qty</th>
          <th align="center" scope="col" style="padding-top: 4px; padding-bottom: 4px;">Action</th>
        </tr>
      </thead>
      <tbody>
      <?php $i = 1; $totalHarga = 0; $totalJumlah = 0; foreach ($transService as $val) { ?>
        <tr>
          <td style="padding-top: 4px; padding-bottom: 4px;"><?php echo $i++; ?></td>
          <td style="padding-top: 4px; padding-bottom: 4px;"><?php echo $val->no_part_jasa; ?></td>
          <td style="padding-top: 4px; padding-bottom: 4px;"><?php echo $val->nama_part_jasa; ?></td>

          <td align="" width="150" style="padding-top: 4px; padding-bottom: 4px;">
            <input style="padding-left: 5px; width: 50px; border-radius: 5px;" type="number" min="1" name="jumlah[]" value="<?php echo $val->jumlah; $totalJumlah = $totalJumlah + $val->jumlah; ?>"
            <?php if (substr($val->no_part_jasa, 0, 2) == "JS")
            {
              echo "readonly";
            } ?>>
          </td>

          <td align="center" style="padding-top: 4px; padding-bottom: 4px;">
            <a href="<?php echo site_url(); ?>TransaksiService/hapusTempTransService/<?php echo $val->id_temp_trans_service; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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
      <a href="<?php echo site_url(); ?>TransaksiService/detailTransService/<?php echo $noKwitansi; ?>" class="btn btn-danger">Batal</a>
      <button type="submit" class="btn btn-primary">Selesai</button>
    </div>
    </center>
  </form>
</div>
