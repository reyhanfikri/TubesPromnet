<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class NotaTransPart extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->library('pdf');
        $this->load->model('MNotaTransPart');
    }

    function nota($id)
    {
      $pdf = new FPDF('l','mm','A5');
      // membuat halaman baru
      $pdf->AddPage();
      // setting jenis font yang akan digunakan
      $pdf->SetFont('Arial','B',16);
      // mencetak string
      $pdf->Cell(190,7,'BENGKEL BARU',0,1,'C');
      $pdf->SetFont('Arial','B',12);
      $pdf->Cell(190,7,'NOTA SPAREPART',0,1,'C');
      // Memberikan space kebawah agar tidak terlalu rapat

      $transPartMain = $this->MNotaTransPart->getNota($id)->last_row();
      if (isset($transPartMain))
      {
          // $pdf->Cell(20,7,$row->id_trans_part,0,0);
          $pdf->Cell(30,7,'Tanggal/jam : '.$transPartMain->tanggal_jam,0,1);
          $pdf->Cell(30,7,'Kasir : '.$transPartMain->kasir,0,1);
          $kasir = $transPartMain->kasir;
      }
      $pdf->Cell(190,7,'',0,1,'C');

      // Tabel
      $pdf->SetFont('Arial','B',10);
      $pdf->Cell(10,6,'No.',1,0);
      $pdf->Cell(25,6,'Id Part',1,0);
      $pdf->Cell(85,6,'Nama Part',1,0);
      $pdf->Cell(10,6,'Qty',1,0);
      $pdf->Cell(28,6,'Harga',1,0);
      $pdf->Cell(28,6,'Subtotal',1,1);
      $pdf->SetFont('Arial','',10);

      $transPart = $this->MNotaTransPart->getNota($id)->result();
      $i = 1;
      $totalJumlah = 0;
      $totalHarga = 0;
      foreach ($transPart as $row)
      {
        $pdf->Cell(10,6,$i++,1,0);
        $pdf->Cell(25,6,$row->id_part,1,0);
        $pdf->Cell(85,6,$row->nama_part,1,0);
        $pdf->Cell(10,6,$row->qty,1,0,'R');
        $pdf->Cell(28,6,number_format($row->harga),1,0,'R');
        $pdf->Cell(28,6,number_format($row->subtotal),1,1,'R');

        $totalJumlah = $totalJumlah + $row->qty;
        $totalHarga = $totalHarga + $row->subtotal;
      }

      $pdf->Cell(10,6,'',0,0);
      $pdf->Cell(25,6,'',0,0);
      $pdf->Cell(85,6,'Total Barang : ',0,0,'R');
      $pdf->Cell(10,6,$totalJumlah,0,0,'R');
      $pdf->Cell(28,6,'Total Harga :',0,0,'R');
      $pdf->Cell(28,6,number_format($totalHarga),0,1,'R');

      $pdf->Cell(10,6,'',0,1);
      $pdf->Cell(10,6,'',0,1);
      $pdf->Cell(10,6,'',0,1);
      $pdf->Cell(10,6,'',0,0);
      $pdf->Cell(25,6,'',0,0);
      $pdf->Cell(85,6,'',0,0,'R');
      $pdf->Cell(10,6,'',0,0,'R');
      $pdf->Cell(28,6,'Hormat Kami',0,1,'C');

      $pdf->Cell(10,6,'',0,1);
      $pdf->Cell(10,6,'',0,1);
      $pdf->Cell(10,6,'',0,1);
      $pdf->Cell(10,6,'',0,0);
      $pdf->Cell(25,6,'',0,0);
      $pdf->Cell(85,6,'',0,0);
      $pdf->Cell(10,6,'',0,0);
      $pdf->Cell(28,6,$kasir,0,1,'C');
      $pdf->Output();
    }
}
