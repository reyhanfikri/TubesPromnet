  <br>
  <h5><b>Laporan Pendapatan Service -Tahunan- (<?php echo $tahun; ?>)</b></h5>
  <div class="col-md-6" style="float: left; padding-left: 0px;">
    <table class="table table-hover">
      <thead>
        <tr class="table-info">
          <th scope="col" style="padding-top: 4px; padding-bottom: 4px;">No</th>
          <th scope="col" style="padding-top: 4px; padding-bottom: 4px;">Bulan/Tahun</th>
          <th align="center" scope="col" style="padding-top: 4px; padding-bottom: 4px;">Jumlah Part/Service</th>
          <th align="center" scope="col" style="padding-top: 4px; padding-bottom: 4px;">Total Harga</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          $total = 0; 

          for ($i = 1; $i < 13; $i++) {
            
            $found = 0;
            
            foreach ($data2 as $val) { 

              if ($i == $val->bulan) {
                
                $found = 1;
        ?>
          <tr>
            <td style="padding-top: 4px; padding-bottom: 4px;"><?php echo $i; ?></td>
            <td style="padding-top: 4px; padding-bottom: 4px;"><?php echo $val->bulan_tahun; $graph_bulan_tahun[] = $val->bulan_tahun; ?></td>
            <td width="170" align="right" style="padding-top: 4px; padding-bottom: 4px;"><?php echo $val->jumlah_service; $graph_jumlah_service[] = $val->jumlah_service; ?></td>
            <td width="170" align="right" style="padding-top: 4px; padding-bottom: 4px;"><?php echo number_format($val->total_harga); $total += $val->total_harga; ?></td>
          </tr>
        <?php
              }
            }

            if ($found == 0) {
        ?>
          <tr>
            <td style="padding-top: 4px; padding-bottom: 4px;"><?php echo $i; ?></td>
            <td style="padding-top: 4px; padding-bottom: 4px;"><?php echo sprintf("%02d", $i)."/".$val->tahun; $graph_bulan_tahun[] = sprintf("%02d", $i)."/".$val->tahun; ?></td>
            <td width="170" align="right" style="padding-top: 4px; padding-bottom: 4px;"><?php echo 0; $graph_jumlah_service[] = 0; ?></td>
            <td width="170" align="right" style="padding-top: 4px; padding-bottom: 4px;"><?php echo 0; ?></td>
          </tr>
        <?php
            }
          } 
        ?>
      </tbody>
    </table>
  </div>
  <div class="col-md-6" style="float: left;">
    <canvas id="canvas2" width="400" height="310"></canvas>
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
  <div class="col-md-6" style="float: left;">
    <table class="table table-hover">
      <tr>
        <td style="padding-top: 4px; padding-bottom: 4px;"> </td>
        <td style="padding-top: 4px; padding-bottom: 4px;"> </td>
        <td width="170" align="right" style="padding-top: 4px; padding-bottom: 4px;"><b>TOTAL</b></td>
        <td width="170" align="right" style="padding-top: 4px; padding-bottom: 4px;"><b><?php echo number_format($total); ?></b></td>
      </tr>
    </table>
  </div>
  <div class="col-md-offset-6">&nbsp;</div>
  <br>
  <div style="padding-left: 767px;">
    <form class="form-inline" method="post" action="<?php echo site_url('LaporanPendapatanTahunan'); ?>">
      <h5>Filter Laporan: </h5>
      <select name="year" class="form-control" style="width: 90px; margin-left: 9px; margin-right: 10px;">
        <option value="2015" <?php if ($tahun == 2015) { ?> selected <?php } ?>>2015</option>
        <option value="2016" <?php if ($tahun == 2016) { ?> selected <?php } ?>>2016</option>
        <option value="2017" <?php if ($tahun == 2017) { ?> selected <?php } ?>>2017</option>
        <option value="2018" <?php if ($tahun == 2018) { ?> selected <?php } ?>>2018</option>
        <option value="2019" <?php if ($tahun == 2019) { ?> selected <?php } ?>>2019</option>
      </select>
      <input class="btn btn-primary" type="submit" name="updatelaporan" value="Filter">
    </form>
  </div>
</div>
<br><br>