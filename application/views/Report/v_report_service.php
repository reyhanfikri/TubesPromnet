<div class="container">
  <center> <h2>Laporan Penjualan Service</h2> </center><br>
	  <form class="form-inline" action="ReportService" method="post">
	  	<legend>Filter Periode</legend>
	  	Periode&nbsp;&nbsp;<input class="form-control" type="date" name="from">&nbsp;&nbsp;s/d&nbsp;&nbsp;<input class="form-control" type="date" name="to">&nbsp;&nbsp;
	  	<input class="btn btn-success" type="submit" name="filter">
	  </form><br>
    <form class="form-inline" action="ReportService" method="post">
      <legend>Filter Periode Per Bulan</legend>
      Periode&nbsp;&nbsp;<input class="form-control" type="month" name="month">&nbsp;&nbsp;
      <input class="btn btn-success" type="submit" name="filterperbulan">
    </form><br>
  <table class="table table-hover">
    <thead>
      <tr class="table-info">
        <th scope="col">No</th>
        <th scope="col">Tanggal Service</th>
        <th scope="col">Nama Jasa</th>
        <th scope="col">Nama Mekanik</th>
        <th scope="col">Nama Pelanggan</th>
        <th scope="col">Harga</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($reportservice as $val) { ?>
        <tr>
          <td><?php echo $val->id_detail_trans_service; ?></td>
          <td><?php echo $val->tanggal_trans_service; ?></td>
          <td><?php echo $val->nama_jasa; ?></td>
          <td><?php echo $val->nama_mekanik; ?></td>
          <td><?php echo $val->nama_pelanggan; ?></td>
          <td><?php echo $val->harga; ?></td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
  <?php if (isset($links)) { echo $links; } ?>
</div>
