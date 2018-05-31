<div class="container">
  <form class="" action="<?php echo site_url();?>" method="post">
    <fieldset>
      <legend>Transaksi Part</legend>
      <div class="form-group">
        <label class="col-form-label"></label>
        <input name="id_part" type="text" class="form-control col-sm-3" placeholder="Id Part">
      </div>
      <div class="form-group">
        <label class="col-form-label">Nama Part</label>
        <input name="nama_part" type="text" class="form-control col-sm-3" placeholder="Nama Part">
      </div>
      <div class="form-group">
        <label class="col-form-label">Stok Part</label>
        <input name="stok_part" type="text" class="form-control col-sm-3" placeholder="Stok Part">
      </div>
      <div class="form-group">
        <label class="col-form-label">Harga Part</label>
        <input name="harga_part" type="text" class="form-control col-sm-3" placeholder="Harga Part">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </fieldset>
  </form>
</div>
