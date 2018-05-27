<div class="container">
  <form class="" action="<?php echo site_url();?>Pelanggan/tambahPelanggan" method="post">
    <fieldset>
      <legend>Menambahkan Pelanggan</legend>
      <div class="form-group">
        <label class="col-form-label">Nomor Polisi</label>
        <input name="nomor_polisi" type="text" class="form-control col-sm-3" placeholder="Nomor Polisi">
      </div>
      <div class="form-group">
        <label class="col-form-label">Nama Pelanggan</label>
        <input name="nama_pelanggan" type="text" class="form-control col-sm-3" placeholder="Nama Pelanggan">
      </div>
      <div class="form-group">
        <label class="col-form-label">Alamat Pelanggan</label>
        <input name="alamat_pelanggan" type="text" class="form-control col-sm-3" placeholder="Alamat Pelanggan">
      </div>
      <div class="form-group">
        <label class="col-form-label">Merk Type Kendaraan</label>
        <input name="merk_type_kendaraan" type="text" class="form-control col-sm-3" placeholder="Merk Type Kendaraan">
      </div>
      <div class="form-group">
        <label class="col-form-label">Jenis Kendaraan</label>
        <input name="jenis_kendaraan" type="text" class="form-control col-sm-3" placeholder="Jenis Kendaraan">
      </div>
      <div class="form-group">
        <label class="col-form-label">Isi Silinder</label>
        <input name="isi_silinder" type="text" class="form-control col-sm-3" placeholder="Isi Silinder">
      </div>
      <div class="form-group">
        <label class="col-form-label">Nomor Rangka</label>
        <input name="nomor_rangka" type="text" class="form-control col-sm-3" placeholder="Nomor Rangka">
      </div>
      <div class="form-group">
        <label class="col-form-label">Nomor Mesin</label>
        <input name="nomor_mesin" type="text" class="form-control col-sm-3" placeholder="Nomor Mesin">
      </div>
      <div class="form-group">
        <label class="col-form-label">Bahan Bakar</label>
        <input name="bahan_bakar" type="text" class="form-control col-sm-3" placeholder="Bahan Bakar">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </fieldset>
  </form>
</div>
