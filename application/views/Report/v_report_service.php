<?php
  foreach ($graphicreportservice as $value) {
    $tanggal_trans_service[] = $value->tanggal_trans_service;
    $jumlah_service_terjual[] = $value->jumlah_service_terjual;
  }
?>
<div class="container">
  <br>
  <center> <h2>Laporan Penjualan Service</h2> </center><br>
  <div style="padding-top: 20px; padding-bottom: 20px; padding-left: 20px; padding-right: 20px; margin-bottom: 40px; background-color: #e8e8e8;">
    <form class="form-inline" action="ReportService" method="post">
      <h5>Filter Periode</h5>
      <input class="form-control" style="margin-left: 100px; margin-right: 20px;" type="date" name="from" value="<?php if (isset($from)) { echo $from; } ?>">s/d
      <input class="form-control" style="margin-left: 20px; margin-right: 20px;" type="date" name="to" value="<?php if (isset($to)) { echo $to; } ?>">
      <input class="btn btn-success" type="submit" name="filter" value="Filter">
    </form><br>
    <form class="form-inline" action="ReportService" method="post">
      <h5>Filter Periode Per Bulan</h5>
      <input class="form-control" style="margin-left: 17px; margin-right: 20px;" type="month" name="month" value="<?php if (isset($month)) { echo $month; } ?>">
      <input class="btn btn-success" type="submit" name="filterperbulan" value="Filter">
    </form>
    <br>
    <form action="ReportService" method="post">
      <input class="btn btn-warning" type="submit" value="Reset Filter">
    </form>
  </div>
  <canvas id="canvas" width="1000" height="220"></canvas>
  <script type="text/javascript" src="<?php echo site_url(); ?>assets/js/Chart.js"></script>
  <script>
    var myLine = document.getElementById("canvas").getContext("2d"); 
    var lineChartData = new Chart(myLine, {
        type: 'line',
        data: {
          labels : <?php echo json_encode($tanggal_trans_service);?>,
          datasets : [
               
              {
                  label: "Jumlah service yang terjual",
                  backgroundColor: 'rgb(99, 132, 255)',
                  borderColor: 'rgb(99, 132, 255)',
                  fill: null,
                  data : <?php echo json_encode($jumlah_service_terjual);?>
              }

          ]

        },
        options: {
          scales: {
             yAxes: [{
                 ticks: {
                     beginAtZero: true,
                     stepSize: 1,
                 }
             }],
         },
        }
    });
  </script>
  <br><br>
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
