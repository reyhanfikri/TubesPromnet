<div class="container">
  <form class="" action="<?php echo site_url();?>Mekanik/tambahMekanik" method="post">
    <fieldset>
      <legend>Menambahkan Mekanik</legend>
      <div class="form-group">
        <label class="col-form-label">Nama Mekanik</label>
        <input name="nama_mekanik" type="text" class="form-control col-sm-3" placeholder="Nama Mekanik">
      </div>
      <div class="form-group">
        <label class="col-form-label">Alamat Mekanik</label>
        <input name="alamat_mekanik" type="text" class="form-control col-sm-3" placeholder="Alamat Mekanik">
      </div>
      <div class="form-group">
        <label class="col-form-label">Nomor Telepon</label>
        <input name="nomor_telepon" type="text" class="form-control col-sm-3" placeholder="Nomor Telepon">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </fieldset>
  </form>
</div>
