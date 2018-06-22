<div class="container">
  <center> <h2>Transaksi Service</h2> </center><br>
	<legend>Data Transaksi</legend>
  <form class="" action="<?php echo site_url();?>TransaksiService/tambahTempTransService" method="post">

    <div class="form-group row">
      <div class="col-sm-4">
        <select name="service" class="form-control" id="service">
          <option>-- Pilih Sevice --</option>
          <?php foreach ($service as $value) { ?>
            <option name="<?php echo $value->harga_jasa; ?>"><?php echo $value->nama_jasa; ?></option>
          <?php } ?>
        </select>
      </div>

      <button type="submit" class="btn btn-primary">Tambah</button>
    </div>
  </form>

  <form class="" action="<?php echo site_url();?>TransaksiService/tambahTempTransService" method="post">

    <div class="form-group row">
      <div class="col-sm-6">
            <input type="text" class="form-control" name="part" id="search_part" placeholder="Cari Part">
      </div>

      <div class="col-sm-1">
        <input name="jumlah" class="form-control" type="text" placeholder="Qty" value="1">
      </div>

      <button type="submit" class="btn btn-primary">Tambah</button>
    </div>
  </form>
</div>
