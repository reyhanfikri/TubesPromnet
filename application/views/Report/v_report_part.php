<div class="container">
  <center> <h2>Tabel Laporan Penjualan Part</h2> </center><br>
  <date-util format="yyyy-MM-dd">
	  <form class="form-inline" action="ReportPart" method="post">
	  	<legend>Filter Periode Per Hari</legend>
	  	Periode&nbsp;&nbsp;<input class="form-control" type="date" name="from">&nbsp;&nbsp;s/d&nbsp;&nbsp;<input class="form-control" type="date" name="to">&nbsp;&nbsp;
	  	<input class="btn btn-success" type="submit" name="filter">
	  </form><br>
  </date-util>
  <table class="table table-hover">
    <thead>
      <tr class="table-info">
        <th scope="col">No</th>
        <th scope="col">Tanggal Penjualan</th>
        <th scope="col">Id Part</th>
        <th scope="col">Nama Pelanggan</th>
        <th scope="col">Jumlah Part</th>
        <th scope="col">Total Harga</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($reportpart as $val) { ?>
        <tr>
          <td><?php echo $val->id_trans_part; ?></td>
          <td><?php echo $val->tanggal_trans_part; ?></td>
          <td><?php echo $val->id_part; ?></td>
          <td><?php echo $val->nama_pelanggan; ?></td>
          <td><?php echo $val->jumlah_part; ?></td>
          <td><?php echo $val->total_harga; ?></td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
  <?php echo $links; ?>
</div>
