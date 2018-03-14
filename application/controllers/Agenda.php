<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Agenda extends CI_Controller {

	function __construct() {
		parent::__construct();
	}

	function surat_masuk() {
		$a['title'] = "Agenda Surat Masuk";
		$a['page'] 	= "agenda_surat";
		$this->load->view('template/index', $a);
	}

	function surat_keluar() {
		$a['title'] = "Agenda Surat Keluar";
		$a['page'] 	= "agenda_surat";
		$this->load->view('template/index', $a);
	}

	function cetak_agenda_masuk() {
		$tgl_start		= $this->input->post('tgl_start');
		$tgl_end		  = $this->input->post('tgl_end');
		$data         = $this->db->query("SELECT * FROM t_surat_masuk WHERE tgl_diterima >= '$tgl_start' AND tgl_diterima <= '$tgl_end' ORDER BY id")->result();
		//config pdf
		$pdf = new FPDF('L','mm','A4');
		$pdf->AddPage();
		$pdf->SetFont('Times','B',14);
		$pdf->Cell(0,7,'AGENDA SURAT MASUK',0,1,'C');
    $pdf->SetFont('Times','',12);
    $pdf->Cell(0,7,'Dari tanggal ' .date('d F Y', strtotime($tgl_start)).' sampai dengan tanggal ' .date('d F Y', strtotime($tgl_end)),0,1,'C');
    $pdf->Cell(10,7,'',0,1);
    $pdf->SetFont('Times','B',9);
    $pdf->Cell(8,6,'No',1,0,'C');
    $pdf->Cell(20,6,'Kode',1,0,'C');
    $pdf->Cell(70,6,'Isi Ringkas',1,0,'C');
    $pdf->Cell(40,6,'Dari',1,0,'C');
		$pdf->Cell(30,6,'Nomor Surat',1,0,'C');
		$pdf->Cell(30,6,'Tgl. Surat',1,0,'C');
		$pdf->Cell(25,6,'Pengolah',1,0,'C');
		$pdf->Cell(30,6,'Tgl. Paraf',1,0,'C');
		$pdf->Cell(25,6,'Ket',1,1,'C');
    $pdf->SetFont('Times','',10);

		$no = 0;
    foreach ($data as $row){
			$no++;
			$pdf->Cell(8,6,$no,1,0);
      $pdf->Cell(20,6,$row->kode,1,0);
      $pdf->Cell(70,6,$row->isi_ringkas,1,0);
      $pdf->Cell(40,6,$row->dari,1,0);
      $pdf->Cell(30,6,$row->no_surat,1,0);
			$pdf->Cell(30,6,date('d F Y', strtotime($row->tgl_surat)),1,0);
      $pdf->Cell(25,6,get_pengolah("t_admin", "id", "nama",$row->pengolah),1,0);
      $pdf->Cell(30,6,date('d F Y', strtotime($row->tgl_diterima)),1,0);
      $pdf->Cell(25,6,$row->keterangan,1,1);
    }

    $pdf->Output('Agenda_surat.pdf', 'I');
	}

	function cetak_agenda_keluar() {
		$tgl_start		= $this->input->post('tgl_start');
		$tgl_end		  = $this->input->post('tgl_end');
		$data         = $this->db->query("SELECT * FROM t_surat_keluar WHERE tgl_catat >= '$tgl_start' AND tgl_catat <= '$tgl_end' ORDER BY id")->result();
		//config pdf
		$pdf = new FPDF('L','mm','A4');
		$pdf->AddPage();
		$pdf->SetFont('Times','B',14);
		$pdf->Cell(0,7,'AGENDA SURAT KELUAR',0,1,'C');
    $pdf->SetFont('Times','',12);
    $pdf->Cell(0,7,'Dari tanggal ' .date('d F Y', strtotime($tgl_start)).' sampai dengan tanggal ' .date('d F Y', strtotime($tgl_end)),0,1,'C');
    $pdf->Cell(10,7,'',0,1);
    $pdf->SetFont('Times','B',9);
    $pdf->Cell(8,6,'No',1,0,'C');
    $pdf->Cell(20,6,'Kode',1,0,'C');
    $pdf->Cell(70,6,'Isi Ringkas',1,0,'C');
    $pdf->Cell(40,6,'Tujuan Surat',1,0,'C');
		$pdf->Cell(30,6,'Nomor Surat',1,0,'C');
		$pdf->Cell(30,6,'Tgl. Surat',1,0,'C');
		$pdf->Cell(25,6,'Pengolah',1,0,'C');
		$pdf->Cell(25,6,'Ket',1,1,'C');
    $pdf->SetFont('Times','',10);

		$no = 0;
    foreach ($data as $row){
			$no++;
			$pdf->Cell(8,6,$no,1,0);
      $pdf->Cell(20,6,$row->kode,1,0);
      $pdf->Cell(70,6,$row->isi_ringkas,1,0);
      $pdf->Cell(40,6,$row->tujuan,1,0);
      $pdf->Cell(30,6,$row->no_surat,1,0);
			$pdf->Cell(30,6,date('d F Y', strtotime($row->tgl_surat)),1,0);
      $pdf->Cell(25,6,get_pengolah("t_admin", "id", "nama",$row->pengolah),1,0);
      $pdf->Cell(25,6,$row->keterangan,1,1);
    }

    $pdf->Output('Agenda_surat.pdf', 'I');
	}


}
