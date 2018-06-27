<div class="container">
  <center> <h2>Detail Transaksi Part</h2> </center><br>
  <div class="jumbotron">
    <?php if (isset($transPartMain)) { ?>
    <div class="row">
      <div class="col-lg-6">

        <div class="row">
          <label class="col-form-label">&emsp;&emsp;&emsp; Tanggal/Jam &emsp;&emsp;&nbsp;&nbsp;</label>
          <label class="col-form-label">:</label>
          <div class="col-sm-6">
            <input name="nomor_polisi" type="text" class="form-control-plaintext" placeholder="Nomor Polisi" value="<?php echo $transPartMain->tanggal_jam; ?>" readonly>
          </div>
        </div>

        <div class="row">
          <label class="col-form-label">&emsp;&emsp;&emsp; Kasir &emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;</label>
          <label class="col-form-label">:</label>
          <div class="col-sm-6">
            <input name="nomor_polisi" type="text" class="form-control-plaintext" placeholder="Nomor Polisi" value="<?php echo $transPartMain->kasir; ?>" readonly>
          </div>
        </div>

      </div>
    </div>
    <?php } ?>

    <table class="table table-hover">
      <thead>
        <tr class="table-info">
          <th scope="col" style="padding-top: 4px; padding-bottom: 4px;">No</th>
          <th scope="col" style="padding-top: 4px; padding-bottom: 4px;">Id Part</th>
          <th scope="col" style="padding-top: 4px; padding-bottom: 4px;">Nama Barang</th>
          <th scope="col" style="padding-top: 4px; padding-bottom: 4px;">Qty</th>
          <th align="center" scope="col" style="padding-top: 4px; padding-bottom: 4px;">Harga(Rp)</th>
          <th scope="col" style="padding-top: 4px; padding-bottom: 4px;">Sub Total(Rp)</th>
        </tr>
      </thead>
      <tbody>
      <?php $i = 1; $totalHarga = 0; $totalJumlah = 0; foreach ($transPart as $val) { ?>
        <tr>
          <td style="padding-top: 4px; padding-bottom: 4px;"><?php echo $i++; ?></td>
          <td style="padding-top: 4px; padding-bottom: 4px;"><?php echo $val->id_part; ?></td>
          <td style="padding-top: 4px; padding-bottom: 4px;"><?php echo $val->nama_part; ?></td>
          <td align="right" width="60px" style="padding-top: 4px; padding-bottom: 4px;"><?php echo $val->qty; $totalJumlah = $totalJumlah + $val->qty; ?></td>
          <td align="right" width="200px" style="padding-top: 4px; padding-bottom: 4px;">
            <?php echo number_format($val->harga); ?></td>
          <td align="right" width="150px" style="padding-top: 4px; padding-bottom: 4px;">
            <?php echo number_format($val->harga*$val->qty); $totalHarga = $totalHarga + ($val->harga*$val->qty); ?></td>
        </tr>
        <?php } ?>
        <tr class="table-active">
          <td style="padding-top: 4px; padding-bottom: 4px;"></td>
          <td style="padding-top: 4px; padding-bottom: 4px;"></td>
          <td style="padding-top: 4px; padding-bottom: 4px;">Total Qty</td>
          <td align="right" style="padding-top: 4px; padding-bottom: 4px;"><?php echo $totalJumlah; ?></td>
          <td style="padding-top: 4px; padding-bottom: 4px;">Grand Total Belanja(Rp.):</td>
          <td align="right" style="padding-top: 4px; padding-bottom: 4px;"><?php echo number_format($totalHarga); ?></td>
        </tr>
      </tbody>
    </table>

    <center>
    <div class="">
      <?php if (isset($transPartMain)) { ?>
      <a href="<?php echo site_url(); ?>TransaksiPart/formEditTransPart/<?php echo $transPartMain->no_transaksi; ?>" class="btn btn-warning">Edit</a>
      <a href="<?php echo site_url(); ?>NotaTransPart/nota/<?php echo $transPartMain->no_transaksi; ?>" class="btn btn-primary">Print</a>
      <?php } ?>
    </div>
    </center>
  </div>
</div>
