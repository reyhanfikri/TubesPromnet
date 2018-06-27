<div class="container">
  <center> <h2>Pembelian Part</h2> </center><br>
	<legend>Data Pembelian</legend>
  <form class="" action="<?php echo site_url();?>PembelianPart/tambahTempPembelianPart" method="post">

      <div class="form-group row">
        <div class="col-sm-6">
            <input type="text" class="form-control" name="part" id="search_pembelian_part" placeholder="Cari Part">
        </div>

        <div class="col-sm-1">
          <input name="jumlah" class="form-control" type="text" placeholder="Qty" value="1">
        </div>

        <button type="submit" class="btn btn-primary">Tambah</button>
      </div>
  </form>
  <legend>Tabel Pembelian Part</legend>
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
        <th align="right" scope="col" style="padding-top: 4px; padding-bottom: 4px;">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php $no = 1; $total_item = 0; $total_qty_tambah = 0; $total = 0; foreach ($data as $val) { ?>
        <tr>
          <td style="padding-top: 4px; padding-bottom: 4px;"><?php echo $no++; $total_item++; ?></td>
          <td style="padding-top: 4px; padding-bottom: 4px;"><?php echo $val->id_part; ?></td>
          <td style="padding-top: 4px; padding-bottom: 4px;"><?php echo $val->nama_part; ?></td>
          <td align="right" width="150" style="padding-top: 4px; padding-bottom: 4px;"><?php echo $val->qty_awal." Pcs"; ?></td>
          <td align="right" width="150" style="padding-top: 4px; padding-bottom: 4px;"><?php echo $val->qty_tambah." Pcs"; $total_qty_tambah += $val->qty_tambah; ?></td>
          <td align="right" width="150" style="padding-top: 4px; padding-bottom: 4px;"><?php echo number_format($val->harga_beli); ?></td>
          <td align="right" width="150" style="padding-top: 4px; padding-bottom: 4px;"><?php echo number_format($val->subtotal); $total += $val->subtotal; ?></td>
          <td align="center" style="padding-top: 4px; padding-bottom: 4px;">
            <a href="<?php echo site_url(); ?>PembelianPart/hapusTempPembelianPart/<?php echo $val->id_temp_pembelian_part; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
          </td>
        </tr>
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
  <br>
  <center>
    <div class="">
      <a href="<?php echo site_url(); ?>PembelianPart/clearTempPembelianPart" class="btn btn-danger">Batal</a>
      <a href="<?php echo site_url(); ?>PembelianPart/tambahPembelianPartMain" class="btn btn-success">Selesai</a>
    </div>
  </center>
</div>
