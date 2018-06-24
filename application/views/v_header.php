<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>assets/css/jquery-ui.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="utf-8">
    <title>Bengkel Baru</title>
  </head>
  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <div class="container">
        <a class="navbar-brand" href="<?php echo site_url();?>Pelanggan">Bengkel Baru</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation" style="">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor01">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="<?php echo site_url();?>Pelanggan">Pelanggan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo site_url();?>Mekanik">Mekanik</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo site_url();?>Jasa">Jasa</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" id="laporan" data-toggle="dropdown" href="#" aria-expanded="false">Part</a>
                <div class="dropdown-menu" aria-labelledby="laporan">
                  <a class="dropdown-item" href="<?php echo site_url();?>Part">Data Part</a>
                  <a class="dropdown-item" href="<?php echo site_url();?>TransaksiPart">Transaksi Part</a>
                </div>
            </li>
            <!-- <li class="nav-item">
              <a class="nav-link" href="<?php echo site_url();?>TransaksiService">Transaksi Service</a>
            </li> -->
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" id="laporan" data-toggle="dropdown" href="#" aria-expanded="false">Laporan</a>
              <div class="dropdown-menu" aria-labelledby="laporan">
                <a class="dropdown-item" href="<?php echo site_url();?>LaporanTahunan">Laporan Tahunan</a>
                <a class="dropdown-item" href="<?php echo site_url();?>LaporanBulanan">Laporan Bulanan</a>
                <a class="dropdown-item" href="<?php echo site_url();?>LaporanHarian">Laporan Harian</a>
              </div>
            </li>
          </ul>
          <a href="<?php echo site_url();?>Login/Logout">
            <button type="button" class="btn btn-danger">Logout <i class="fa fa-sign-out"></i></button>
          </a>
        </div>
      </div>
    </nav>
    <!-- Navbar End -->
