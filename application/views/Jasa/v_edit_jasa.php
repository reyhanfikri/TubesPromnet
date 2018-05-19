<div class="container">
  <?php foreach ($jasa as $val) { ?>
  <form class="" action="<?php echo site_url();?>Jasa/editJasa" method="post">
    <fieldset>
      <legend>Mengedit Jasa</legend>
      <input name="id_jasa" type="text" class="form-control col-sm-3" value="<?php echo $val->id_jasa; ?>" hidden>
      <div class="form-group">
        <label class="col-form-label">Nama Jasa</label>
        <input name="nama_jasa" type="text" class="form-control col-sm-3" value="<?php echo $val->nama_jasa; ?>">
      </div>
      <div class="form-group">
        <label class="col-form-label">Harga Jasa</label>
        <input name="harga_jasa" type="text" class="form-control col-sm-3" value="<?php echo $val->harga_jasa; ?>">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </fieldset>
  </form>
<?php } ?>
</div>
