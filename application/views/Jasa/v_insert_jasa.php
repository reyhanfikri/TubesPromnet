<div class="container">
  <form class="" action="<?php echo site_url();?>Jasa/tambahJasa" method="post">
    <fieldset>
      <legend>Menambahkan Jasa</legend>
      <div class="form-group">
        <label class="col-form-label">Id Jasa</label>
        <input name="no_jasa" type="text" class="form-control col-sm-3" placeholder="Id Jasa">
      </div>
      <div class="form-group">
        <label class="col-form-label">Nama Jasa</label>
        <input name="nama_jasa" type="text" class="form-control col-sm-3" placeholder="Nama Jasa">
      </div>
      <div class="form-group">
        <label class="col-form-label">Harga Jasa</label>
        <input name="harga_jasa" type="text" class="form-control col-sm-3" placeholder="Harga Jasa">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </fieldset>
  </form>
</div>
