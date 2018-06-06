<div class="container">
  <table class="table table-hover">
    <thead>
      <tr class="table-info">
        <th scope="col">No</th>
        <th scope="col">Nama Barang</th>
        <th scope="col">Harga(Rp)</th>
        <th scope="col">Jumlah</th>
        <th scope="col">Sub Total(Rp)</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
    <?php $totalHarga = 0; $totalJumlah = 0; foreach ($transPart as $val) { ?>
      <tr>
        <td><?php echo $val->id_temp_trans_part; ?></td>
        <td><?php echo $val->nama_part; ?></td>
        <td><?php echo $val->harga_part; ?></td>
        <td><?php echo $val->jumlah; $totalJumlah = $totalJumlah + $val->jumlah; ?></td>
        <td><?php echo $val->harga_part*$val->jumlah; $totalHarga = $totalHarga + ($val->harga_part*$val->jumlah); ?></td>
        <td>
          <a href="<?php echo site_url(); ?>TransaksiPart/hapusTempTransPart/<?php echo $val->id_temp_trans_part; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
        </td>
      </tr>
      <?php } ?>
      <tr class="table-active">
        <td></td>
        <td></td>
        <td>Grand Total Belanja(Rp.):</td>
        <td><?php echo $totalJumlah; ?></td>
        <td><?php echo $totalHarga; ?></td>
        <td></td>
      </tr>
    </tbody>

  </table>
</div>