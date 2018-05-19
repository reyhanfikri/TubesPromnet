<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>assets/css/bootstrap.css">
    <meta charset="utf-8">
    <title>Bengkel Baru</title>
  </head>
  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <div class="container">
        <a class="navbar-brand" href="#">Bengkel Baru</a>
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
            <li class="nav-item">
              <a class="nav-link" href="<?php echo site_url();?>Part">Part</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo site_url();?>TransaksiPart">Transaksi Part</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo site_url();?>TransaksiService">Transaksi Service</a>
            </li>
          </ul>
          <a href="<?php echo site_url();?>Login/Logout">
            <button type="button" class="btn btn-danger">Logout</button>
          </a>
        </div>
      </div>
    </nav>
    <!-- Navbar End -->
