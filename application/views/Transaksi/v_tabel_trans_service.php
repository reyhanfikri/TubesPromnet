<div class="container">
  <table class="table table-hover">
    <thead>
      <tr class="table-info">
        <th scope="col">No</th>
        <th scope="col">Nama Service</th>
        <th scope="col">Harga(Rp)</th>
        <th scope="col">Netto(Rp)</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
    <?php $totalHarga = 0; foreach ($transService as $val) { ?>
      <tr>
        <td><?php echo $val->id_temp_trans_service; ?></td>
        <td><?php echo $val->nama_jasa; ?></td>
        <td><?php echo $val->harga_jasa; ?></td>
        <td><?php echo $val->harga_jasa; $totalHarga = $totalHarga + ($val->harga_jasa); ?></td>
        <td>
          <a href="<?php echo site_url(); ?>TransaksiService/hapusTempTransService/<?php echo $val->id_temp_trans_service; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
        </td>
      </tr>
      <?php } ?>
      <tr class="table-active">
        <td></td>
        <td></td>
        <td>Grand Total(Rp.):</td>
        <td><?php echo $totalHarga; ?></td>
        <td></td>
      </tr>
    </tbody>

  </table>
</div>
