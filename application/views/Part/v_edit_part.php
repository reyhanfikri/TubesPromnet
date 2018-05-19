<div class="container">
  <?php foreach ($part as $val) { ?>
  <form class="" action="<?php echo site_url();?>Part/editPart" method="post">
    <fieldset>
      <legend>Mengedit Part</legend>
      <input name="id_part" type="text" class="form-control col-sm-3" value="<?php echo $val->id_part; ?>" hidden>
      <div class="form-group">
        <label class="col-form-label">Id Part</label>
        <input name="no_part" type="text" class="form-control col-sm-3" value="<?php echo $val->no_part; ?>">
      </div>
      <div class="form-group">
        <label class="col-form-label">Nama Part</label>
        <input name="nama_part" type="text" class="form-control col-sm-3" value="<?php echo $val->nama_part; ?>">
      </div>
      <div class="form-group">
        <label class="col-form-label">Stok Part</label>
        <input name="stok_part" type="text" class="form-control col-sm-3" value="<?php echo $val->stok_part; ?>">
      </div>
      <div class="form-group">
        <label class="col-form-label">Harga Part</label>
        <input name="harga_part" type="text" class="form-control col-sm-3" value="<?php echo $val->harga_part; ?>">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </fieldset>
  </form>
<?php } ?>
</div>
