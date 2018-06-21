<div class="container">
  <center> <h2>Transaksi Part</h2> </center><br>
	<legend>Data Transaksi</legend>
    <form class="" action="<?php echo site_url();?>TransaksiPart/tambahTempTransPart" method="post">

        <div class="form-group row">
          <div class="col-sm-6">
                <input type="text" class="form-control" name="part" id="search_part" placeholder="Cari Part">
          </div>

          <div class="col-sm-1">
            <input name="jumlah" class="form-control" type="text" placeholder="Qty" value="1">
          </div>

          <button type="submit" class="btn btn-primary">Tambah</button>
        </div>

      <a href="<?php echo site_url(); ?>TransaksiPart/clearTempTransPart" class="btn btn-danger">Clear</a>
      <a href="<?php echo site_url(); ?>TransaksiPart/tambahTransPartMain" class="btn btn-success">Selesai</a>
    </form>
</div>
