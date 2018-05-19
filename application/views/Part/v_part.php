<div class="container">
  <center> <h2>Tabel Part</h2> </center>
  <a href="#" class="btn btn-success">Tambah Part</a>
  <form class="" action="<?php echo site_url();?>Part" method="post">
    <!-- Split Tabel -->
    <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
      <div class="btn-group mr-2" role="group" aria-label="First group">
        <?php for ($i=1; $i <= 3; $i++) {?>
        <button name="nomor" type="submit" class="btn btn-outline-info" value="<?php echo $i; ?>"><?php echo $i; ?></button>
          <?php if ($i == 3) { ?>
        <button name="nomor" type="button" class="btn btn-outline-info" value="...">...</button>
          <?php } ?>
        <?php } ?>
        <button name="nomor" type="submit" class="btn btn-outline-info" value="<?php echo $numrows-1; ?>"><?php echo $numrows-1; ?></button>
        <button name="nomor" type="submit" class="btn btn-outline-info" value="<?php echo $numrows; ?>"><?php echo $numrows; ?></button>
      </div>
    </div>
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
        <?php foreach ($part as $val) { ?>
          <tr>
            <td><?php echo $val->id_part; ?></td>
            <td><?php echo $val->no_part; ?></td>
            <td><?php echo $val->nama_part; ?></td>
            <td><?php echo $val->stok_part; ?></td>
            <td><?php echo $val->harga_part; ?></td>
            <td>
              <a href="" class="btn btn-danger">Hapus</a>
    					<a href="" class="btn btn-warning">Edit</a>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </form>
</div>
