<div class="container">
  <center> <h2>Tabel Jasa</h2> </center>
  <a href="<?php echo site_url();?>Jasa/formTambahJasa" class="btn btn-success"><i class="fa fa-plus-square"></i> Tambah Jasa</a>
  <table class="table table-hover">
    <thead>
      <tr class="table-info">
        <th scope="col">No</th>
        <th scope="col">Id Jasa</th>
        <th scope="col">Nama Jasa</th>
        <th scope="col">Harga Part</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($jasa as $val) { ?>
        <tr>
          <td><?php echo $val->id_jasa ?></td>
          <td><?php echo $val->no_jasa ?></td>
          <td><?php echo $val->nama_jasa; ?></td>
          <td><?php echo $val->harga_jasa; ?></td>
          <td>
            <a href="<?php echo site_url(); ?>Jasa/formEditJasa/<?php echo $val->id_jasa; ?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
            <a href="<?php echo site_url(); ?>Jasa/hapusJasa/<?php echo $val->id_jasa; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
  <?php echo $links; ?>
</div>
