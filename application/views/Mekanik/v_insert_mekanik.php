<div class="container">
  <form class="" action="<?php echo site_url();?>Mekanik/tambahMekanik" method="post">
    <fieldset>
      <div class="jumbotron">
        <center><legend class="display-4">Menambahkan Mekanik</legend>
        <div class="form-group row">
          <label class="col-form-label">Nama Mekanik</label>
          <div class="col-sm-3">
            <input name="nama_mekanik" type="text" class="form-control" placeholder="Nama Mekanik">
          </div>

          <label class="col-form-label">Nomor Telepon</label>
          <div class="col-sm-3">
            <input name="nomor_telepon" type="text" class="form-control" placeholder="Nomor Telepon">
          </div>
        </div>
        <div class="form-group">
          <label class="col-form-label">Alamat Mekanik</label>
          <input name="alamat_mekanik" type="text" class="form-control col-sm-3" placeholder="Alamat Mekanik">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </fieldset>
  </form>
</div>
