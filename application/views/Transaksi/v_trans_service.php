<div class="container">
  <center> <h2>Transaksi Service</h2> </center><br>
	<legend>Data Transaksi</legend>
  <form class="" action="<?php echo site_url();?>TransaksiPart/tambahTempTransPart" method="post">
    <div class="form-group">
      <label class="col-form-label">Pelanggan</label>
      <select name="pelanggan" class="form-control col-sm-3" id="exampleSelect1">
        <?php foreach ($pelanggan as $value) { ?>
        <option><?php echo $value->nama_pelanggan; ?></option>
        <?php } ?>
      </select>
    </div>
    <div class="form-group">
      <label class="col-form-label">Tanggal</label>
      <input name="tanggal" class="form-control col-sm-3" type="date" value="<?php echo date('d-m-Y'); ?>">
    </div>
    <div class="form-group">
      <label class="col-form-label">Mekanik</label>
      <select name="pelanggan" class="form-control col-sm-3" id="exampleSelect1">
        <?php foreach ($mekanik as $value) { ?>
          <option><?php echo $value->nama_mekanik; ?></option>
        <?php } ?>
      </select>
    </div>
    <div class="form-group">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>
      <script type="text/javascript">
        $(document).ready(function() {

          $("#service option").filter(function() {
              return $(this).val() == $("#harga").val();
          }).attr('selected', true);

          $("#service").live("change", function() {

              $("#harga").val($(this).find("option:selected").attr("name"));
          });
        });
      </script>
      <label class="col-form-label">Service</label>
      <select name="service" class="form-control col-sm-4" id="service">
        <option>none</option>
        <?php foreach ($service as $value) { ?>
          <option name="<?php echo $value->harga_jasa; ?>"><?php echo $value->nama_jasa; ?></option>
        <?php } ?>
      </select>
    </div>
    <div class="form-group">
      <label class="col-form-label">Harga</label>
      <input name="harga" id="harga" class="form-control col-sm-3" type="text" value="">
    </div>
    <button type="submit" class="btn btn-primary">Tambah</button>
    <a href="<?php echo site_url(); ?>TransaksiService/clearTempTransService" class="btn btn-danger">Clear</a>
    <a href="<?php echo site_url(); ?>TransaksiService/clearTempTransService" class="btn btn-success">Selesai</a>
  </form>
</div>
