<div class="container">
  <?php foreach ($mekanik as $val) { ?>
  <form class="" action="<?php echo site_url();?>Mekanik/editMekanik" method="post">
    <fieldset>
      <legend>Mengedit Mekanik</legend>
      <input name="id_mekanik" type="text" class="form-control col-sm-3" value="<?php echo $val->id_mekanik; ?>" hidden>
      <div class="form-group">
        <label class="col-form-label">Nama Mekanik</label>
        <input name="nama_mekanik" type="text" class="form-control col-sm-3" placeholder="Nama Mekanik" value="<?php echo $val->nama_mekanik; ?>">
      </div>
      <div class="form-group">
        <label class="col-form-label">Alamat Mekanik</label>
        <input name="alamat_mekanik" type="text" class="form-control col-sm-3" placeholder="Alamat Mekanik" value="<?php echo $val->alamat_mekanik; ?>">
      </div>
      <div class="form-group">
        <label class="col-form-label">Nomor Telepon</label>
        <input name="nomor_telepon" type="text" class="form-control col-sm-3" placeholder="Nomor Telepon" value="<?php echo $val->nomor_telepon; ?>">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </fieldset>
  </form>
<?php } ?>
</div>
