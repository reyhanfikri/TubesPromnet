<div class="container">
  <form class="" action="<?php echo site_url();?>Pelanggan/tambahPelanggan" method="post">
    <fieldset>
      <div class="jumbotron">
        <center><legend class="display-4">Menambahkan Pelanggan</legend>
          <br>
        <div class="row">
          <div class="col-lg-6">

            <div class="form-group row">
              <label class="col-form-label">&emsp;&emsp;&emsp; Nomor Polisi &emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;</label>
              <div class="col-sm-6">
                <input name="nomor_polisi" type="text" class="form-control" placeholder="Nomor Polisi">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-form-label">&emsp;&emsp;&emsp; Alamat Pelanggan &emsp;&emsp;&emsp;</label>
              <div class="col-sm-7">
                <textarea name="alamat_pelanggan" rows="3" cols="40" class="form-control" placeholder="Alamat Pelanggan"></textarea>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-form-label">&emsp;&emsp;&emsp; Merk Type Kendaraan &emsp;&nbsp;</label>
              <div class="col-sm-6">
                <input name="merk_type_kendaraan" type="text" class="form-control" placeholder="Merk Type Kendaraan">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-form-label">&emsp;&emsp;&emsp; Isi Silinder &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;</label>
              <div class="col-sm-3">
                <input name="isi_silinder" type="text" class="form-control" placeholder="Isi Silinder">
              </div>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="form-group row">
              <label class="col-form-label">&emsp;&emsp;&emsp; Nama Pelanggan &emsp;&nbsp;&nbsp;&nbsp;</label>
              <div class="col-sm-6">
                <input name="nama_pelanggan" type="text" class="form-control" placeholder="Nama Pelanggan">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-form-label">&emsp;&emsp;&emsp; Jenis Kendaraan &emsp;&nbsp;&nbsp;&nbsp;</label>
              <div class="col-sm-6">
                <input name="jenis_kendaraan" type="text" class="form-control" placeholder="Jenis Kendaraan">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-form-label">&emsp;&emsp;&emsp; Nomor Rangka &emsp;&emsp;&nbsp;</label>
              <div class="col-sm-6">
                <input name="nomor_rangka" type="text" class="form-control" placeholder="Nomor Rangka">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-form-label">&emsp;&emsp;&emsp; Bahan Bakar &emsp;&emsp;&emsp;&nbsp;</label>
              <div class="col-sm-6">
                <input name="bahan_bakar" type="text" class="form-control" placeholder="Bahan Bakar">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-form-label">&emsp;&emsp;&emsp; Nomor Mesin &emsp;&emsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
              <div class="col-sm-6">
                <input name="nomor_mesin" type="text" class="form-control" placeholder="Nomor Mesin">
              </div>
            </div>
          </div>
        </div>
          <br>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </fieldset>
  </form>
</div>
