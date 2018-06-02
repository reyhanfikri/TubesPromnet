<?php
  foreach ($graphicreportpart as $value) {
    $tanggal_trans_part[] = $value->tanggal_trans_part;
    $jumlah_part_terjual[] = $value->jumlah_part_terjual;
  }
?>
<div class="container">
  <center> <h2>Laporan Penjualan Part</h2> </center><br>
  <form class="form-inline" action="ReportPart" method="post">
  	<legend>Filter Periode</legend>
  	Periode&nbsp;&nbsp;<input class="form-control" type="date" name="from">&nbsp;&nbsp;s/d&nbsp;&nbsp;<input class="form-control" type="date" name="to">&nbsp;&nbsp;
  	<input class="btn btn-success" type="submit" name="filter">
  </form><br>
  <form class="form-inline" action="ReportPart" method="post">
    <legend>Filter Periode Per Bulan</legend>
    Periode&nbsp;&nbsp;<input class="form-control" type="month" name="month">&nbsp;&nbsp;
    <input class="btn btn-success" type="submit" name="filterperbulan">
  </form><br>
  <canvas id="canvas" width="1000" height="280"></canvas>
  <script type="text/javascript" src="<?php echo site_url(); ?>assets/js/Chart.js"></script>
  <script>
    var myLine = document.getElementById("canvas").getContext("2d"); 
    var lineChartData = new Chart(myLine, {
        type: 'line',
        data: {
          labels : <?php echo json_encode($tanggal_trans_part);?>,
          datasets : [
               
              {
                  label: "Jumlah part yang terjual",
                  backgroundColor: 'rgb(255, 99, 132)',
                  borderColor: 'rgb(255, 99, 132)',
                  fill: null,
                  data : <?php echo json_encode($jumlah_part_terjual);?>
              }

          ]

        }
         
    });
  </script>
  <br>
  <table class="table table-hover">
    <thead>
      <tr class="table-info">
        <th scope="col">No</th>
        <th scope="col">Tanggal Penjualan</th>
        <th scope="col">Nama Part</th>
        <th scope="col">Nama Pelanggan</th>
        <th scope="col">Jumlah Part</th>
        <th scope="col">Total Harga</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($reportpart as $val) { ?>
        <tr>
          <td><?php echo $val->id_detail_trans_part; ?></td>
          <td><?php echo $val->tanggal_trans_part; ?></td>
          <td><?php echo $val->nama_part; ?></td>
          <td><?php echo $val->nama_pelanggan; ?></td>
          <td><?php echo $val->jumlah_part; ?></td>
          <td><?php echo $val->total_harga; ?></td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
  <?php if (isset($links)) { echo $links; } ?>
</div>
