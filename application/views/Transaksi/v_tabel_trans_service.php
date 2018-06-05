<div class="container">
  <table class="table table-hover">
    <thead>
      <tr class="table-info">
        <th scope="col">No</th>
        <th scope="col">Nama Service</th>
        <th scope="col">Harga(Rp)</th>
        <th scope="col">Sub Total(Rp)</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
    <?php $totalHarga = 0; $totalJumlah = 0; foreach ($transService as $val) { ?>
      <tr>
        <td><?php echo $val->id_temp_trans_part; ?></td>
        <td><?php echo $val->nama_part; ?></td>
        <td><?php echo $val->harga; ?></td>
        <td><?php echo $val->jumlah; $totalJumlah = $totalJumlah + $val->jumlah; ?></td>
        <td><?php echo $val->harga*$val->jumlah; $totalHarga = $totalHarga + ($val->harga*$val->jumlah); ?></td>
        <td>
          <a href="<?php echo site_url(); ?>TransaksiPart/hapusTempTransPart/<?php echo $val->id_temp_trans_part; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
        </td>
      </tr>
      <?php } ?>
      <tr class="table-active">
        <td></td>
        <td>Grand Total(Rp.):</td>
        <td><?php echo $totalJumlah; ?></td>
        <td><?php echo $totalHarga; ?></td>
        <td></td>
      </tr>
    </tbody>

  </table>
</div>
