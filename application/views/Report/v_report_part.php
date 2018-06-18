<?php
  foreach ($graphicreportpart as $value) {
    $tanggal_trans_part[] = $value->tanggal_trans_part;
    $jumlah_part_terjual[] = $value->jumlah_part_terjual;
  }
?>
<div class="container">
  <br>
  <center><h2>Laporan Penjualan Part</h2> </center><br>
  <div style="padding-top: 20px; padding-bottom: 20px; padding-left: 20px; padding-right: 20px; margin-bottom: 40px; background-color: #e8e8e8;">
    <form class="form-inline" action="ReportPart" method="post">
      <h5>Filter Periode</h5>
      <input class="form-control" style="margin-left: 100px; margin-right: 20px;" type="date" name="from" value="<?php if (isset($from)) { echo $from; } ?>">s/d
      <input class="form-control" style="margin-left: 20px; margin-right: 20px;" type="date" name="to" value="<?php if (isset($to)) { echo $to; } ?>">
      <input class="btn btn-success" type="submit" name="filter" value="Filter">
    </form><br>
    <form class="form-inline" action="ReportPart" method="post">
      <h5>Filter Periode Per Bulan</h5>
      <input class="form-control" style="margin-left: 17px; margin-right: 20px;" type="month" name="month" value="<?php if (isset($month)) { echo $month; } ?>">
      <input class="btn btn-success" type="submit" name="filterperbulan" value="Filter">
    </form>
    <br>
    <form action="ReportPart" method="post">
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
        <th scope="col">Tanggal Penjualan</th>
        <th scope="col">Nama Part</th>
        <th scope="col">Nama Pelanggan</th>
        <th scope="col">Jumlah Part</th>
        <th scope="col">Harga</th>
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
          <td><?php echo $val->harga; ?></td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
  <?php if (isset($links)) { echo $links; } ?>
</div>
