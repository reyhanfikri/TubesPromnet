<div class="container">
  <?php foreach ($pelanggan as $val) { ?>
  <form class="" action="<?php echo site_url();?>Pelanggan/editPelanggan" method="post">
    <fieldset>
      <legend>Mengedit Pelanggan</legend>
      <input name="id_pelanggan" type="text" class="form-control col-sm-3" value="<?php echo $val->id_pelanggan; ?>" hidden>
      <div class="form-group">
        <label class="col-form-label">Nomor Polisi</label>
        <input name="nomor_polisi" type="text" class="form-control col-sm-3" placeholder="Nomor Polisi" value="<?php echo $val->nomor_polisi; ?>">
      </div>
      <div class="form-group">
        <label class="col-form-label">Nama Pelanggan</label>
        <input name="nama_pelanggan" type="text" class="form-control col-sm-3" placeholder="Nama Pelanggan" value="<?php echo $val->nama_pelanggan; ?>">
      </div>
      <div class="form-group">
        <label class="col-form-label">Alamat Pelanggan</label>
        <input name="alamat_pelanggan" type="text" class="form-control col-sm-3" placeholder="Alamat Pelanggan" value="<?php echo $val->alamat_pelanggan; ?>">
      </div>
      <div class="form-group">
        <label class="col-form-label">Merk Type Kendaraan</label>
        <input name="merk_type_kendaraan" type="text" class="form-control col-sm-3" placeholder="Merk Type Kendaraan" value="<?php echo $val->merk_type_kendaraan; ?>">
      </div>
      <div class="form-group">
        <label class="col-form-label">Jenis Kendaraan</label>
        <input name="jenis_kendaraan" type="text" class="form-control col-sm-3" placeholder="Jenis Kendaraan" value="<?php echo $val->jenis_kendaraan; ?>">
      </div>
      <div class="form-group">
        <label class="col-form-label">Isi Silinder</label>
        <input name="isi_silinder" type="text" class="form-control col-sm-3" placeholder="Isi Silinder" value="<?php echo $val->isi_silinder; ?>">
      </div>
      <div class="form-group">
        <label class="col-form-label">Nomor Rangka</label>
        <input name="nomor_rangka" type="text" class="form-control col-sm-3" placeholder="Nomor Rangka" value="<?php echo $val->nomor_rangka; ?>"> 
      </div>
      <div class="form-group">
        <label class="col-form-label">Nomor Mesin</label>
        <input name="nomor_mesin" type="text" class="form-control col-sm-3" placeholder="Nomor Mesin" value="<?php echo $val->nomor_mesin; ?>">
      </div>
      <div class="form-group">
        <label class="col-form-label">Bahan Bakar</label>
        <input name="bahan_bakar" type="text" class="form-control col-sm-3" placeholder="Bahan Bakar" value="<?php echo $val->bahan_bakar; ?>">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </fieldset>
  </form>
<?php } ?>
</div>
