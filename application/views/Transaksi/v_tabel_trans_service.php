<div class="container">
  <div class="jumbotron">
    <legend>Work Order (<?php echo $noKwitansi; ?>)</legend>
    <hr>
    <?php foreach ($pelanggan as $val) { ?>
      <fieldset>

        <div class="row">
          <div class="col-lg-6">

            <div class="row">
              <label class="col-form-label">&emsp;&emsp;&emsp; Nomor Polisi &emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;</label>
              <label class="col-form-label">:</label>
              <div class="col-sm-6">
                <input name="nomor_polisi" type="text" class="form-control-plaintext" placeholder="Nomor Polisi" value="<?php echo $val->nomor_polisi; ?>" readonly>
              </div>
            </div>

            <div class="row">
              <label class="col-form-label">&emsp;&emsp;&emsp; Alamat Pelanggan &emsp;&emsp;&emsp;</label>
              <label class="col-form-label">:</label>
              <div class="col-sm-6">
                <textarea name="alamat_pelanggan" rows="2" cols="40" class="form-control-plaintext" placeholder="Alamat Pelanggan" readonly><?php echo $val->alamat_pelanggan; ?></textarea>
              </div>
            </div>

            <div class="row">
              <label class="col-form-label">&emsp;&emsp;&emsp; Merk Type Kendaraan &emsp;&nbsp;</label>
              <label class="col-form-label">:</label>
              <div class="col-sm-6">
                <input name="merk_type_kendaraan" type="text" class="form-control-plaintext" placeholder="Merk Type Kendaraan" value="<?php echo $val->merk_type_kendaraan; ?>" readonly>
              </div>
            </div>

            <div class="row">
              <label class="col-form-label">&emsp;&emsp;&emsp; Isi Silinder &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;</label>
              <label class="col-form-label">:</label>
              <div class="col-sm-3">
                <input name="isi_silinder" type="text" class="form-control-plaintext" placeholder="Isi Silinder" value="<?php echo $val->isi_silinder; ?>" readonly>
              </div>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="row">
              <label class="col-form-label">&emsp;&emsp;&emsp; Nama Pelanggan &emsp;&nbsp;&nbsp;&nbsp;</label>
              <label class="col-form-label">:</label>
              <div class="col-sm-6">
                <input name="nama_pelanggan" type="text" class="form-control-plaintext" placeholder="Nama Pelanggan" value="<?php echo $val->nama_pelanggan; ?>" readonly>
              </div>
            </div>

            <div class="row">
              <label class="col-form-label">&emsp;&emsp;&emsp; Jenis Kendaraan &emsp;&nbsp;&nbsp;&nbsp;</label>
              <label class="col-form-label">:</label>
              <div class="col-sm-6">
                <input name="jenis_kendaraan" type="text" class="form-control-plaintext" placeholder="Jenis Kendaraan" value="<?php echo $val->jenis_kendaraan; ?>" readonly>
              </div>
            </div>

            <div class="row">
              <label class="col-form-label">&emsp;&emsp;&emsp; Nomor Rangka &emsp;&emsp;&nbsp;</label>
              <label class="col-form-label">:</label>
              <div class="col-sm-6">
                <input name="nomor_rangka" type="text" class="form-control-plaintext" placeholder="Nomor Rangka" value="<?php echo $val->nomor_rangka; ?>" readonly>
              </div>
            </div>

            <div class="row">
              <label class="col-form-label">&emsp;&emsp;&emsp; Bahan Bakar &emsp;&emsp;&emsp;&nbsp;</label>
              <label class="col-form-label">:</label>
              <div class="col-sm-6">
                <input name="bahan_bakar" type="text" class="form-control-plaintext" placeholder="Bahan Bakar" value="<?php echo $val->bahan_bakar; ?>" readonly>
              </div>
            </div>

            <div class="row">
              <label class="col-form-label">&emsp;&emsp;&emsp; Nomor Mesin &emsp;&emsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
              <label class="col-form-label">:</label>
              <div class="col-sm-6">
                <input name="nomor_mesin" type="text" class="form-control-plaintext" placeholder="Nomor Mesin" value="<?php echo $val->nomor_mesin; ?>" readonly>
              </div>
            </div>
          </div>
        </div>
      </fieldset>
    <?php } ?>

    <table class="table table-hover">
      <thead>
        <tr class="table-info">
          <th scope="col" style="padding-top: 4px; padding-bottom: 4px;">No</th>
          <th scope="col" style="padding-top: 4px; padding-bottom: 4px;">Id Part/Id Jasa</th>
          <th scope="col" style="padding-top: 4px; padding-bottom: 4px;">Nama Part/Nama Jasa</th>
          <th scope="col" style="padding-top: 4px; padding-bottom: 4px;">Qty</th>
          <th scope="col" align="center" style="padding-top: 4px; padding-bottom: 4px;">Harga(Rp)</th>
          <th scope="col" style="padding-top: 4px; padding-bottom: 4px;">Subtotal(Rp)</th>
          <th scope="col" align="center" style="padding-top: 4px; padding-bottom: 4px;">Action</th>
        </tr>
      </thead>
      <tbody>
      <?php $i = 1; $totalHarga = 0; $totalJumlah = 0; foreach ($transService as $val) { ?>
        <tr>
          <td style="padding-top: 4px; padding-bottom: 4px;"><?php echo $i++; ?></td>
          <td style="padding-top: 4px; padding-bottom: 4px;"><?php echo $val->no_part_jasa; ?></td>
          <td style="padding-top: 4px; padding-bottom: 4px;"><?php echo $val->nama_part_jasa; ?></td>
          <td align="right" width="70px" style="padding-top: 4px; padding-bottom: 4px;"><?php echo $val->jumlah; $totalJumlah = $totalJumlah + $val->jumlah; ?></td>
          <td align="right" width="200px" style="padding-top: 4px; padding-bottom: 4px;"><?php echo number_format($val->harga); ?></td>
          <td align="right" width="120px" style="padding-top: 4px; padding-bottom: 4px;"><?php echo number_format($val->harga*$val->jumlah); $totalHarga = $totalHarga + ($val->harga*$val->jumlah); ?></td>
          <td align="center" style="padding-top: 4px; padding-bottom: 4px;">
            <a href="<?php echo site_url(); ?>TransaksiService/hapusTempTransService/<?php echo $id_pelanggan; ?>/<?php echo $val->id_temp_trans_service; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
          </td>
        </tr>
        <?php } ?>
        <tr class="table-active">
          <td style="padding-top: 4px; padding-bottom: 4px;"></td>
          <td style="padding-top: 4px; padding-bottom: 4px;"></td>
          <td style="padding-top: 4px; padding-bottom: 4px;">Total Qty:</td>
          <td align="right" style="padding-top: 4px; padding-bottom: 4px;"><?php echo $totalJumlah; ?></td>
          <td style="padding-top: 4px; padding-bottom: 4px;">Grand Total(Rp.):</td>
          <td align="right" style="padding-top: 4px; padding-bottom: 4px;"><?php echo number_format($totalHarga); ?></td>
          <td style="padding-top: 4px; padding-bottom: 4px;"></td>
        </tr>
      </tbody>
    </table>

    <center>
    <div class="">
      <a href="<?php echo site_url(); ?>TransaksiService/cancelTempTransService" class="btn btn-danger">Batal</a>
      <a href="<?php echo site_url(); ?>TransaksiService/clearTempTransService/<?php echo $id_pelanggan; ?>" class="btn btn-secondary">Clear</a>
      <a href="<?php echo site_url(); ?>TransaksiService/tambahTransServicetMain" class="btn btn-success">Selesai</a>
    </div>
    </center>
  </div>
</div>
