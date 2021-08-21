<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Laporan extends MY_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('gajipensiunan_model');
  }

	public function pdfgajipensiunan()
  {
    $tanggal_awal   =  $this->input->post('tanggal_awal');
    $tanggal_akhir  =  $this->input->post('tanggal_akhir');
        // $query = "SELECT * from gajipensiunan WHERE tanggal='$tanggal' ORDER BY idgajipensiunan DESC";
        // echo($query);
        // exit();
    $title = "PT POS Indonesia";
        // $hasil = $this->db->query($query);
    $hasil  = $this->gajipensiunan_model->getsemuagajipensiunan($tanggal_awal, $tanggal_akhir);
    $pdf    = new FPDF('l', 'mm', 'Legal');

        // membuat halaman baru
    $pdf->AddPage();
        // setting jenis font yang akan digunakan
    $pdf->SetFillColor(112, 226, 137);
    $pdf->SetFont('Arial', 'B', 16);

		$pdf->Image('upload/logo.png',10,15,30,30);
		//Arial bold 15
		$pdf->SetFont('Arial','B',15);
		//pindah ke posisi ke tengah untuk membuat judul
		$pdf->Cell(80);
		//judul
		// $pdf->Cell(330,7,'LAPORAN',0,1,'C');
		//pindah baris
		// $pdf->Ln(20);
		$pdf->Cell(330,7,'',0,1,'C');


		//$pdf->Image('uploads/LOGO KOPERASI PT POS Indonesia.png',140,140,50,50);
        // mencetak string 
    $pdf->Cell(330, 7, "LAPORAN GAJI PENSIUNAN", 0, 1, 'C');
        // $pdf->Cell(10,10,'',0,1);
    $pdf->SetFont('Arial', 'B', 14);
    $pdf->Cell(330, 7, "PT POS Indonesia", 0, 1, 'C');
    $pdf->Ln(7);
		$pdf->Cell(330,7,'',0,1,'C');
        // $pdf->Rect(0, 15, 80, 15, 'F');
        // $pdf->SetLeftMargin(50);
    $pdf->SetFont('Times', 'B', 12);
    $pdf->Cell(10, 10, 'No', 1, 0, 'C', 1);
    $pdf->Cell(80, 10, 'Judul', 1, 0, 'C', 1);
    $pdf->Cell(60, 10, 'NIP', 1, 0, 'C', 1);
    $pdf->Cell(60, 10, 'Nama', 1, 0, 'C', 1);
    $pdf->Cell(60, 10, 'Gaji', 1, 0, 'C', 1);
    $pdf->Cell(25, 10, 'Deskripsi', 1, 0, 'C', 1);
		$pdf->Cell(30, 10, 'Tanggal', 1, 1, 'C', 1);
    $pdf->SetFont('Times', '', 10);
    $i          = 1;
    $pendapatan = 0;
    foreach ($hasil->result_array() as $ss) {
      $pdf->Cell(10, 10, $i . '.', 1, 0, 'C');
      $pdf->Cell(80, 10, $ss['judul']. '.', 1, 0, 'l');
      $pdf->Cell(60, 10, $ss['nip'] . '.', 1, 0, 'l');
      $pdf->Cell(60, 10, $ss['nama'] . '.', 1, 0, 'l');
      $pdf->Cell(60, 10, "RP. ".$ss['gaji'] . '.', 1, 0, 'l');
      $pdf->Cell(25, 10, $ss['deskripsi'], 1, 0, 'l');
			$pdf->Cell(30, 10, date('d-m-Y', strtotime($ss['tanggal'])), 1, 1, 'l');
      $i++;
    }
    $pdf->SetFont('Times', 'B', 12);
    $pdf->Output('D', $title . '.pdf');
  }

  public function pdfwesel()
  {
    $tanggal  = $this->input->post('tanggalwesel');
    $query    = "SELECT * from wesel WHERE tanggalwesel ='$tanggal' ORDER BY idwesel DESC";
        // echo($query);
        // exit();
    $title  = "PT POS Indonesia";
    $hasil  = $this->db->query($query);
    $pdf    = new FPDF('l', 'mm', 'Legal');

        // membuat halaman baru
    $pdf->AddPage();
        // setting jenis font yang akan digunakan
    $pdf->SetFillColor(112, 226, 137);
    $pdf->SetFont('Arial', 'B', 16);

		$pdf->Image('upload/logo.png',10,15,30,30);
		//Arial bold 15
		$pdf->SetFont('Arial','B',15);
		//pindah ke posisi ke tengah untuk membuat judul
		$pdf->Cell(80);
		//judul
		// $pdf->Cell(330,7,'LAPORAN',0,1,'C');
		//pindah baris
		// $pdf->Ln(20);
		$pdf->Cell(330,7,'',0,1,'C');


		//$pdf->Image('uploads/LOGO KOPERASI PT POS Indonesia.png',140,140,50,50);
        // mencetak string 
    $pdf->Cell(330, 7, "LAPORAN WESEL", 0, 1, 'C');
        // $pdf->Cell(10,10,'',0,1);
    $pdf->SetFont('Arial', 'B', 14);
    $pdf->Cell(330, 7, "PT POS Indonesia", 0, 1, 'C');
    $pdf->Ln(7);
		$pdf->Cell(330,7,'',0,1,'C');
    $pdf->Ln(7);
		$pdf->Cell(330,7,'',0,1,'C');
        
    $pdf->SetFont('Times', 'B', 12);
    $pdf->Cell(10, 10, 'No', 1, 0, 'C', 1);
    $pdf->Cell(80, 10, 'No Wesel', 1, 0, 'C', 1);
    $pdf->Cell(60, 10, 'Nama', 1, 0, 'C', 1);
    $pdf->Cell(60, 10, 'No KTP', 1, 0, 'C', 1);
    $pdf->Cell(60, 10, 'Biaya', 1, 0, 'C', 1);
		$pdf->Cell(60, 10, 'Tanggal Wesel', 1, 1, 'C', 1);
    $pdf->SetFont('Times', '', 10);
    $i          = 1;
    $pendapatan = 0;
    foreach ($hasil->result_array() as $ss) {
      $pdf->Cell(10, 10, $i . '.', 1, 0, 'C');
      $pdf->Cell(80, 10, $ss['nowesel']. '.', 1, 0, 'l');
      $pdf->Cell(60, 10, $ss['nama'] . '.', 1, 0, 'l');
      $pdf->Cell(60, 10, $ss['noktp'] . '.', 1, 0, 'l');
      $pdf->Cell(60, 10, "RP. ".$ss['biaya'] . '.', 1, 0, 'l');
			$pdf->Cell(60, 10, date('d-m-Y', strtotime($ss['tanggalwesel'])), 1, 1, 'l');
      $i++;
    }
    $pdf->SetFont('Times', 'B', 12);
    $pdf->Output('D', $title . '.pdf');
  }

  public function pdfpembayaran()
  {
    $tanggal  =  $this->input->post('tanggal');
    $query    = "SELECT * from Pembayaran WHERE tanggalpembayaran ='$tanggal' ORDER BY idpembayaran DESC";
        // echo($query);
        // exit();
    $title  = "PT POS Indonesia";
    $hasil  = $this->db->query($query);
    $pdf    = new FPDF('l', 'mm', 'Legal');

        // membuat halaman baru
    $pdf->AddPage();
        // setting jenis font yang akan digunakan
    $pdf->SetFillColor(112, 226, 137);
    $pdf->SetFont('Arial', 'B', 16);

		$pdf->Image('upload/logo.png',10,15,30,30);
		//Arial bold 15
		$pdf->SetFont('Arial','B',15);
		//pindah ke posisi ke tengah untuk membuat judul
		$pdf->Cell(80);
		//judul
		// $pdf->Cell(330,7,'LAPORAN',0,1,'C');
		//pindah baris
		// $pdf->Ln(20);
		$pdf->Cell(330,7,'',0,1,'C');


		//$pdf->Image('uploads/LOGO KOPERASI PT POS Indonesia.png',140,140,50,50);
        // mencetak string 
    $pdf->Cell(330, 7, "LAPORAN PEMBAYARAN", 0, 1, 'C');
        // $pdf->Cell(10,10,'',0,1);
    $pdf->SetFont('Arial', 'B', 14);
    $pdf->Cell(330, 7, "PT POS Indonesia", 0, 1, 'C');
    $pdf->Ln(7);
		$pdf->Cell(330,7,'',0,1,'C');
    $pdf->Ln(7);
		$pdf->Cell(330,7,'',0,1,'C');
        // $pdf->Rect(0, 15, 80, 15, 'F');
        // $pdf->SetLeftMargin(50);
    $pdf->SetFont('Times', 'B', 12);
    $pdf->Cell(25, 10, 'No', 1, 0, 'C', 1);
    $pdf->Cell(70, 10, 'No Virtual', 1, 0, 'C', 1);
    $pdf->Cell(70, 10, 'Nama', 1, 0, 'C', 1);
    $pdf->Cell(80, 10, 'Biaya', 1, 0, 'C', 1);
		$pdf->Cell(90, 10, 'Tanggal Pembayaran', 1, 1, 'C', 1);
    $pdf->SetFont('Times', '', 10);
    $i          = 1;
    $pendapatan = 0;
    foreach ($hasil->result_array() as $ss) {
      $pdf->Cell(25, 10, $i . '.', 1, 0, 'C');
      $pdf->Cell(70, 10, $ss['novirtual']. '.', 1, 0, 'l');
      $pdf->Cell(70, 10, $ss['nama'] . '.', 1, 0, 'l');
      $pdf->Cell(80, 10, "RP. ".$ss['biaya'] . '.', 1, 0, 'l');
			$pdf->Cell(90, 10, date('d-m-Y', strtotime($ss['tanggalpembayaran'])), 1, 1, 'l');
      $i++;
    }
    $pdf->SetFont('Times', 'B', 12);
    $pdf->Output('D', $title . '.pdf');
  }

  public function pdfpengiriman()
  {
    $tanggal_awal   =  $this->input->post('tanggal_awal');
    $tanggal_akhir  =  $this->input->post('tanggal_akhir');
    // $query    = "SELECT * from pengiriman WHERE tanggalpengiriman ='$tanggal' ORDER BY idpengiriman DESC";
        // echo($query);
        // exit();
    $title  = "PT POS Indonesia";
    // $hasil  = $this->db->query($query);
    $hasil  = $this->pengiriman_model->getsemuapengiriman($date, $tanggal_akhir);
    $pdf = new FPDF('l', 'mm', 'Legal');

        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFillColor(112, 226, 137);
        $pdf->SetFont('Arial', 'B', 16);

		$pdf->Image('upload/logo.png',10,15,30,30);
		//Arial bold 15
		$pdf->SetFont('Arial','B',15);
		//pindah ke posisi ke tengah untuk membuat judul
		$pdf->Cell(80);
		//judul
		// $pdf->Cell(330,7,'LAPORAN',0,1,'C');
		//pindah baris
		// $pdf->Ln(20);
		$pdf->Cell(330,7,'',0,1,'C');


		//$pdf->Image('uploads/LOGO KOPERASI PT POS Indonesia.png',140,140,50,50);
        // mencetak string 
        $pdf->Cell(330, 7, "LAPORAN PENGIRIMAN", 0, 1, 'C');
        // $pdf->Cell(10,10,'',0,1);
        $pdf->SetFont('Arial', 'B', 14);
        $pdf->Cell(330, 7, "PT POS Indonesia", 0, 1, 'C');
        $pdf->Ln(7);
		$pdf->Cell(330,7,'',0,1,'C');
        $pdf->Ln(7);
		$pdf->Cell(330,7,'',0,1,'C');
        // $pdf->Rect(0, 15, 80, 15, 'F');
        // $pdf->SetLeftMargin(50);
        $pdf->SetFont('Times', 'B', 12);
        $pdf->Cell(10, 10, 'No', 1, 0, 'C', 1);
        $pdf->Cell(25, 10, 'No Resi', 1, 0, 'C', 1);
        $pdf->Cell(35, 10, 'Nama Pengirim', 1, 0, 'C', 1);
        $pdf->Cell(35, 10, 'Nama Penerima', 1, 0, 'C', 1);
        $pdf->Cell(35, 10, 'Alamat', 1, 0, 'C', 1);
        $pdf->Cell(25, 10, 'Kota', 1, 0, 'C', 1);
        $pdf->Cell(35, 10, 'Nama Barang', 1, 0, 'C', 1);
        $pdf->Cell(25, 10, 'Jenis', 1, 0, 'C', 1);
        $pdf->Cell(25, 10, 'Berag', 1, 0, 'C', 1);
        $pdf->Cell(25, 10, 'Jumlah', 1, 0, 'C', 1);
        $pdf->Cell(25, 10, 'Biaya', 1, 0, 'C', 1);
		$pdf->Cell(25, 10, 'Tanggal', 1, 1, 'C', 1);
        $pdf->SetFont('Times', '', 10);
        $i = 1;
        $pendapatan = 0;
        foreach ($hasil->result_array() as $ss) {

            $pdf->Cell(10, 10, $i . '.', 1, 0, 'C');
            $pdf->Cell(25, 10, $ss['noresi']. '.', 1, 0, 'l');
            $pdf->Cell(35, 10, $ss['namapengirim'] . '.', 1, 0, 'l');
            $pdf->Cell(35, 10, $ss['namapenerima'] . '.', 1, 0, 'l');
            $pdf->Cell(35, 10, $ss['alamatpenerima'] . '.', 1, 0, 'l');
            $pdf->Cell(25, 10, $ss['kota'] . '.', 1, 0, 'l');
            $pdf->Cell(35, 10, $ss['namabarang'] . '.', 1, 0, 'l');
            $pdf->Cell(25, 10, $ss['jenisbarang'], 1, 0, 'l');
            $pdf->Cell(25, 10, $ss['beratbarang'], 1, 0, 'l');
            $pdf->Cell(25, 10, $ss['jumlahbarang'], 1, 0, 'l');
            $pdf->Cell(25, 10, "RP. ".$ss['biaya'] . '.', 1, 0, 'l');
			$pdf->Cell(25, 10, date('d-m-Y', strtotime($ss['tanggalpengiriman'])), 1, 1, 'l');
            $i++;
        }
        $pdf->SetFont('Times', 'B', 12);
        $pdf->Output('D', $title . '.pdf');
    }
}
