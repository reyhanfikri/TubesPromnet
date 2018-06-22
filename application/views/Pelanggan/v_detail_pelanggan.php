<div class="container">
  <?php foreach ($pelanggan as $val) { ?>
  <form class="" action="<?php echo site_url();?>Pelanggan/editPelanggan" method="post">
    <fieldset>
      <input name="id_pelanggan" type="text" class="form-control" value="<?php echo $val->id_pelanggan; ?>" hidden>
      <div class="jumbotron">
        <center><legend class="display-4">Data Pelanggan</legend>
          <br>
        <div class="row">
          <div class="col-lg-6">

            <div class="form-group row">
              <label class="col-form-label">&emsp;&emsp;&emsp; Nomor Polisi &emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;</label>
              <div class="col-sm-6">
                <input name="nomor_polisi" type="text" class="form-control-plaintext" placeholder="Nomor Polisi" value="<?php echo $val->nomor_polisi; ?>" readonly>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-form-label">&emsp;&emsp;&emsp; Alamat Pelanggan &emsp;&emsp;&emsp;</label>
              <div class="col-sm-7">
                <textarea name="alamat_pelanggan" rows="3" cols="40" class="form-control-plaintext" placeholder="Alamat Pelanggan"><?php echo $val->alamat_pelanggan; ?></textarea>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-form-label">&emsp;&emsp;&emsp; Merk Type Kendaraan &emsp;&nbsp;</label>
              <div class="col-sm-6">
                <input name="merk_type_kendaraan" type="text" class="form-control-plaintext" placeholder="Merk Type Kendaraan" value="<?php echo $val->merk_type_kendaraan; ?>" readonly>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-form-label">&emsp;&emsp;&emsp; Isi Silinder &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;</label>
              <div class="col-sm-3">
                <input name="isi_silinder" type="text" class="form-control-plaintext" placeholder="Isi Silinder" value="<?php echo $val->isi_silinder; ?>" readonly>
              </div>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="form-group row">
              <label class="col-form-label">&emsp;&emsp;&emsp; Nama Pelanggan &emsp;&nbsp;&nbsp;&nbsp;</label>
              <div class="col-sm-6">
                <input name="nama_pelanggan" type="text" class="form-control-plaintext" placeholder="Nama Pelanggan" value="<?php echo $val->nama_pelanggan; ?>" readonly>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-form-label">&emsp;&emsp;&emsp; Jenis Kendaraan &emsp;&nbsp;&nbsp;&nbsp;</label>
              <div class="col-sm-6">
                <input name="jenis_kendaraan" type="text" class="form-control-plaintext" placeholder="Jenis Kendaraan" value="<?php echo $val->jenis_kendaraan; ?>" readonly>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-form-label">&emsp;&emsp;&emsp; Nomor Rangka &emsp;&emsp;&nbsp;</label>
              <div class="col-sm-6">
                <input name="nomor_rangka" type="text" class="form-control-plaintext" placeholder="Nomor Rangka" value="<?php echo $val->nomor_rangka; ?>" readonly>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-form-label">&emsp;&emsp;&emsp; Bahan Bakar &emsp;&emsp;&emsp;&nbsp;</label>
              <div class="col-sm-6">
                <input name="bahan_bakar" type="text" class="form-control-plaintext" placeholder="Bahan Bakar" value="<?php echo $val->bahan_bakar; ?>" readonly>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-form-label">&emsp;&emsp;&emsp; Nomor Mesin &emsp;&emsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
              <div class="col-sm-6">
                <input name="nomor_mesin" type="text" class="form-control-plaintext" placeholder="Nomor Mesin" value="<?php echo $val->nomor_mesin; ?>" readonly>
              </div>
            </div>
          </div>
        </div>
          <br>

          <center>
          <div class="">
            <a href="<?php echo site_url(); ?>Pelanggan/formEditPelanggan/<?php echo $val->id_pelanggan; ?>" class="btn btn-warning">Edit</i></a>
            <a href="<?php echo site_url(); ?>Pelanggan/hapusPelanggan/<?php echo $val->id_pelanggan; ?>" class="btn btn-danger">Hapus</a>
            <a href="<?php echo site_url(); ?>TransaksiService/service/<?php echo $val->id_pelanggan; ?>" class="btn btn-primary">Service</a>
          </div>
          </center>
      </div>
    </fieldset>
  </form>
<?php } ?>
</div>
