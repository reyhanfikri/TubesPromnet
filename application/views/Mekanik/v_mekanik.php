<div class="container">
  <center> <h2>Tabel Mekanik</h2> </center>
  <a href="<?php echo site_url();?>Mekanik/formTambahMekanik" class="btn btn-success"><i class="fa fa-plus-square"></i> Tambah Mekanik</a>
  <table class="table table-hover">
    <thead>
      <tr class="table-info">
        <th scope="col">No</th>
        <th scope="col">Nama Mekanik</th>
        <th scope="col">Alamat Mekanik</th>
        <th scope="col">Nomor Telepon</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($mekanik as $val) { ?>
        <tr>
          <td><?php echo $val->id_mekanik; ?></td>
          <td><?php echo $val->nama_mekanik; ?></td>
          <td><?php echo $val->alamat_mekanik; ?></td>
          <td><?php echo $val->nomor_telepon; ?></td>
          <td>
            <a href="<?php echo site_url(); ?>Mekanik/formEditMekanik/<?php echo $val->id_mekanik; ?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
            <a href="<?php echo site_url(); ?>Mekanik/hapusMekanik/<?php echo $val->id_mekanik; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
  <?php echo $links; ?>
</div>
