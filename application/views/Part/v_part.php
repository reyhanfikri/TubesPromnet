<div class="container">
  <center> <h2>Tabel Part</h2> </center>
  <a href="<?php echo site_url();?>Part/formTambahPart" class="btn btn-success"><i class="fa fa-plus-square"></i> Tambah Part</a>
  <table class="table table-hover">
    <thead>
      <tr class="table-info">
        <th scope="col">No</th>
        <th scope="col">Id Part</th>
        <th scope="col">Nama Part</th>
        <th scope="col">Stok Part</th>
        <th scope="col">Harga Part</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php $i = 1; foreach ($part as $val) { ?>
        <tr>
          <td><?php echo $i++; ?></td>
          <td><?php echo $val->no_part_jasa; ?></td>
          <td><?php echo $val->nama_part_jasa; ?></td>
          <td><?php echo $val->stok_part; ?></td>
          <td><?php echo $val->harga_jual_part_jasa; ?></td>
          <td>
            <a href="<?php echo site_url(); ?>Part/formEditPart/<?php echo $val->id_part_jasa; ?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
            <a href="<?php echo site_url(); ?>Part/hapusPart/<?php echo $val->id_part_jasa; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
  <?php echo $links; ?>
</div>
