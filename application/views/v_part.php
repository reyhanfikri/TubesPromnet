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
    <?php $i=1; foreach ($part as $val) { ?>
      <tr>
        <td><?php echo $i++; ?></td>
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
