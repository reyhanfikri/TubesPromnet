<div class="container">
  <br>
  <h5><b>Laporan Penjualan Part -Tahunan- (<?php echo $tahun; ?>)</b></h5>
  <div class="col-md-6" style="float: left; padding-left: 0px;">
    <table class="table table-hover">
      <thead>
        <tr class="table-info">
          <th scope="col" style="padding-top: 4px; padding-bottom: 4px;">No</th>
          <th scope="col" style="padding-top: 4px; padding-bottom: 4px;">Bulan/Tahun</th>
          <th align="center" scope="col" style="padding-top: 4px; padding-bottom: 4px;">Jumlah Part</th>
          <th align="center" scope="col" style="padding-top: 4px; padding-bottom: 4px;">Total Harga</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          $total = 0; 

          for ($i = 1; $i < 13; $i++) {
            
            $found = 0;
            
            foreach ($data as $val) { 

              if ($i == $val->bulan) {
                
                $found = 1;
        ?>
          <tr>
            <td style="padding-top: 4px; padding-bottom: 4px;"><?php echo $i; ?></td>
            <td style="padding-top: 4px; padding-bottom: 4px;"><?php echo $val->bulan_tahun; $graph_bulan_tahun[] = $val->bulan_tahun; ?></td>
            <td width="170" align="right" style="padding-top: 4px; padding-bottom: 4px;"><?php echo $val->jumlah_part; $graph_jumlah_part[] = $val->jumlah_part; ?></td>
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
            <td width="170" align="right" style="padding-top: 4px; padding-bottom: 4px;"><?php echo 0; $graph_jumlah_part[] = 0; ?></td>
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
    <canvas id="canvas" width="400" height="310"></canvas>
    <script type="text/javascript" src="<?php echo site_url(); ?>assets/js/Chart.js"></script>
    <script>
      var myLine = document.getElementById("canvas").getContext("2d");
      var lineChartData = new Chart(myLine, {
          type: 'line',
          data: {
            labels : <?php echo json_encode($graph_bulan_tahun);?>,
            datasets : [

                {
                    label: "Jumlah part yang terjual",
                    backgroundColor: 'rgb(255, 99, 132)',
                    borderColor: 'rgb(255, 99, 132)',
                    fill: null,
                    data : <?php echo json_encode($graph_jumlah_part);?>
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
