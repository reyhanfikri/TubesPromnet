<table class="table table-hover">
  <thead>
    <tr class="table-info">
      <th scope="col">No</th>
      <th scope="col">Nama Jasa</th>
      <th scope="col">Harga Part</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php $i=1; foreach ($jasa as $val) { ?>
      <tr>
        <td><?php echo $i++; ?></td>
        <td><?php echo $val->nama_jasa; ?></td>
        <td><?php echo $val->harga_jasa; ?></td>
        <td>
          <a href="" class="btn btn-danger">Hapus</a>
					<a href="" class="btn btn-warning">Edit</a>
        </td>
      </tr>
    <?php } ?>
  </tbody>
</table>
