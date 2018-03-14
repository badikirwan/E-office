<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Arsip extends CI_Controller {

	function __construct() {
			parent::__construct();

	}

	function surat_masuk() {
			//cek status admin
			if (is_admin()) {
					redirect('home');
			}

			$tahun = $this->session->userdata('admin_ta');
			$cari = $this->input->post('q');

			$total_row = $this->db->query("SELECT * FROM t_surat_masuk")->num_rows();
			$limit = 8;
			$awal	= $this->uri->segment(4);
			$awal	= (empty($awal) || $awal == 1) ? 0 : $awal;
			$akhir	= $limit;
			$a['pagi']	= _page($total_row, $limit, 4, base_url()."arsip/surat_masuk/p");

			$act = $this->uri->segment(3);
			if ($act == 'cari') {
				$a['data'] = $this->db->query("SELECT * FROM t_surat_masuk WHERE isi_ringkas LIKE '%$cari%' OR dari LIKE '%$cari%' OR no_surat LIKE '%$cari%' ORDER BY id DESC")->result();
				$a['page'] = "arsip_surat_masuk";
			} else {
				$a['data'] = $this->db->query("SELECT * FROM t_surat_masuk WHERE YEAR(tgl_diterima) = '$tahun' ORDER BY id DESC LIMIT $awal, $akhir")->result();
				$a['page'] = "arsip_surat_masuk";
			}

			$this->load->view('template/index', $a);
	}

	function surat_keluar() {
			//cek status admin
			if (is_admin()) {
					redirect('home');
			}

			$tahun = $this->session->userdata('admin_ta');
			$cari = $this->input->post('q');

			$total_row = $this->db->query("SELECT * FROM t_surat_keluar")->num_rows();
			$limit = 8;
			$awal	= $this->uri->segment(4);
			$awal	= (empty($awal) || $awal == 1) ? 0 : $awal;
			$akhir	= $limit;
			$a['pagi']	= _page($total_row, $limit, 4, base_url()."arsip/surat_keluar/p");

			$act = $this->uri->segment(3);
			if ($act == 'cari') {
				$a['data'] = $this->db->query("SELECT * FROM t_surat_keluar WHERE isi_ringkas LIKE '%$cari%' OR dari LIKE '%$cari%' OR no_surat LIKE '%$cari%' ORDER BY id DESC")->result();
				$a['page'] = "arsip_surat_keluar";
			} else {
				$a['data'] = $this->db->query("SELECT * FROM t_surat_keluar WHERE YEAR(tgl_catat) = '$tahun' ORDER BY id DESC LIMIT $awal, $akhir")->result();
				$a['page'] = "arsip_surat_keluar";
			}

			$this->load->view('template/index', $a);
	}
}
