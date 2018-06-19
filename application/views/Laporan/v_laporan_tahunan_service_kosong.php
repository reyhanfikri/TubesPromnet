  <br>
  <h5><b>Laporan Pendapatan Service -Tahunan- (<?php echo $tahun; ?>)</b></h5>
  <div class="col-md-6" style="float: left; padding-left: 0px;">
    <table class="table table-hover">
      <thead>
        <tr class="table-info">
          <th scope="col" style="padding-top: 4px; padding-bottom: 4px;">No</th>
          <th scope="col" style="padding-top: 4px; padding-bottom: 4px;">Bulan/Tahun</th>
          <th scope="col" style="padding-top: 4px; padding-bottom: 4px;">Jumlah Service</th>
          <th scope="col" style="padding-top: 4px; padding-bottom: 4px;">Total Harga</th>
        </tr>
      </thead>
      <tbody>
        <?php for ($i = 1; $i < 13; $i++) { ?>
        <tr>
          <td style="padding-top: 4px; padding-bottom: 4px;"><?php echo $i; ?></td>
          <td style="padding-top: 4px; padding-bottom: 4px;"><?php echo sprintf("%02d", $i)."/".$tahun; $graph_bulan_tahun[] = sprintf("%02d", $i)."/".$tahun; ?></td>
          <td style="padding-top: 4px; padding-bottom: 4px;"><?php echo 0; $graph_jumlah_service[] = 0; ?></td>
          <td style="padding-top: 4px; padding-bottom: 4px;"><?php echo 0; ?></td>
        </tr>
      <?php } ?>
      </tbody>
    </table>
  </div>
  <div class="col-md-6" style="float: left;">
    <canvas id="canvas2" width="400" height="315"></canvas>
    <script type="text/javascript" src="<?php echo site_url(); ?>assets/js/Chart.js"></script>
    <script>
      var myLine = document.getElementById("canvas2").getContext("2d");
      var lineChartData = new Chart(myLine, {
          type: 'line',
          data: {
            labels : <?php echo json_encode($graph_bulan_tahun);?>,
            datasets : [

                {
                    label: "Jumlah pendapatan service",
                    backgroundColor: 'rgb(255, 99, 132)',
                    borderColor: 'rgb(255, 99, 132)',
                    fill: null,
                    data : <?php echo json_encode($graph_jumlah_service);?>
                }

            ]

          },
          options: {
            scales: {
               yAxes: [{
                   ticks: {
                       beginAtZero: true,
                       userCallback: function(label, index, labels) {
                           if (Math.floor(label) === label) {
                               return label;
                           }

                       },
                   }
               }],
           },
          }
      });
    </script><br>
  </div>
  <div style="float: left; padding-left: 283px;"><b>TOTAL</b></div>
  <div style="float: left; padding-left: 70px;"><b><?php echo 0; ?></b></div>
  <div class="col-md-offset-6">&nbsp;</div>
  <br>
  <div style="padding-left: 767px;">
    <form class="form-inline" method="post" action="<?php echo site_url('LaporanTahunan'); ?>">
      <h5>Update Laporan: </h5>
      <select name="year" class="form-control" style="width: 90px; margin-left: 9px; margin-right: 10px;">
        <option value="2015" <?php if ($tahun == 2015) { ?> selected <?php } ?>>2015</option>
        <option value="2016" <?php if ($tahun == 2016) { ?> selected <?php } ?>>2016</option>
        <option value="2017" <?php if ($tahun == 2017) { ?> selected <?php } ?>>2017</option>
        <option value="2018" <?php if ($tahun == 2018) { ?> selected <?php } ?>>2018</option>
        <option value="2019" <?php if ($tahun == 2019) { ?> selected <?php } ?>>2019</option>
      </select>
      <input class="btn btn-primary" type="submit" name="updatelaporan" value="Update">
    </form>
  </div>
</div>
<br><br>