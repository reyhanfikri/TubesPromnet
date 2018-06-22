<div class="container">
  <center> <h2>Tabel Pelanggan</h2> </center>
  <a href="<?php echo site_url();?>Pelanggan/formTambahPelanggan" class="btn btn-success"><i class="fa fa-plus-square"></i> Tambah Pelanggan</a>
  <table class="table table-hover">
    <thead>
      <tr class="table-info">
        <th scope="col">No</th>
        <th scope="col">Nomor Polisi</th>
        <th scope="col">Nama Pelanggan</th>
        <th scope="col">Alamat Pelanggan</th>
        <!-- <th scope="col">Merk Type Kendaraan</th>
        <th scope="col">Jenis Kendaraan</th>
        <th scope="col">Isi Silinder</th>
        <th scope="col">Nomor Rangka</th>
        <th scope="col">Nomor Mesin</th>
        <th scope="col">Bahan Bakar</th> -->
        <th scope="col">Datail</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($pelanggan as $val) { ?>
        <tr>
          <td><?php echo $val->id_pelanggan; ?></td>
          <td>
            <a href="<?php echo site_url(); ?>TransaksiService/service/<?php echo $val->id_pelanggan; ?>" class=""><?php echo $val->nomor_polisi; ?></a>
          </td>
          <td><?php echo $val->nama_pelanggan; ?></td>
          <td><?php echo $val->alamat_pelanggan; ?></td>
          <!-- <td><?php echo $val->merk_type_kendaraan; ?></td>
          <td><?php echo $val->jenis_kendaraan; ?></td>
          <td><?php echo $val->isi_silinder; ?></td>
          <td><?php echo $val->nomor_rangka; ?></td>
          <td><?php echo $val->nomor_mesin; ?></td>
          <td><?php echo $val->bahan_bakar; ?></td> -->
          <td>
            <a href="<?php echo site_url(); ?>Pelanggan/tampilanDetail/<?php echo $val->id_pelanggan; ?>" class="btn btn-outline-primary">Detail</a>
            <!-- <a href="<?php echo site_url(); ?>Pelanggan/formEditPelanggan/<?php echo $val->id_pelanggan; ?>" class="btn btn-warning"><i class="fa fa-edit"></i></a> -->
            <!-- <a href="<?php echo site_url(); ?>Pelanggan/hapusPelanggan/<?php echo $val->id_pelanggan; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a> -->
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
  <?php echo $links; ?>
</div>
