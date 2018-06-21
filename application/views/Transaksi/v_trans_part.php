<div class="container">
  <div class="row">
      <form method="post" action="<?php echo site_url(); ?>search/test">
           <div class="form-group">
              <label>Part</label>
              <input type="text" class="form-control" name="part" id="search_part" placeholder="Cari Part" style="width:500px;">
              <input type="submit" name="submit">
            </div>
      </form>
  </div>
  <center> <h2>Transaksi Part</h2> </center><br>
	<legend>Data Transaksi</legend>
  <form class="" action="<?php echo site_url();?>TransaksiPart/tambahTempTransPart" method="post">
    <div class="form-group">
      <label class="col-form-label">Pelanggan</label>
      <select name="pelanggan" class="form-control col-sm-3" id="exampleSelect1">
        <option><?php echo $nama_pelanggan; ?></option>
        <?php foreach ($pelanggan as $value) { ?>
        <option><?php echo $value->nama_pelanggan; ?></option>
        <?php } ?>
      </select>
    </div>
    <div class="form-group">
      <label class="col-form-label">Tanggal</label>
      <input name="tanggal" class="form-control col-sm-3" type="date" value="<?php echo $tanggal; ?>">
    </div>
    <div class="form-group">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>
      <script type="text/javascript">
        $(document).ready(function() {

          $("#barang option").filter(function() {
              return $(this).val() == $("#harga").val();
          }).attr('selected', true);

          $("#barang").live("change", function() {

              $("#harga").val($(this).find("option:selected").attr("name"));
          });
        });
      </script>
      <label class="col-form-label">Barang</label>
      <select name="barang" class="form-control col-sm-4" id="barang">
        <option>none</option>
        <?php foreach ($part as $value) { ?>
          <option name="<?php echo $value->harga_part; ?>"><?php echo $value->nama_part; ?></option>
        <?php } ?>
      </select>
    </div>
    <div class="form-group">
      <label class="col-form-label">Harga</label>
      <input name="harga" id="harga" class="form-control col-sm-3" type="text" value="">
    </div>
    <div class="form-group">
      <label class="col-form-label">Jumlah</label>
      <input name="jumlah" class="form-control col-sm-3" type="text">
    </div>
    <button type="submit" class="btn btn-primary">Tambah</button>
    <a href="<?php echo site_url(); ?>TransaksiPart/clearTempTransPart" class="btn btn-danger">Clear</a>
    <a href="<?php echo site_url(); ?>TransaksiPart/tambahTransPartMain" class="btn btn-success">Selesai</a>
  </form>
</div>
