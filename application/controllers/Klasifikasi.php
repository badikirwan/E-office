<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Klasifikasi extends CI_Controller {

	function __construct() {
		parent::__construct();
		//load model
		$this->load->model('klasifikasi_model');
	}
	function index() {
		//cek login
		must_login();
		//pagination
		$total_row = $this->klasifikasi_model->get_count_data();
		$limit = 5;
		$awal = $this->uri->segment(3);
		$awal	= (empty($awal) || $awal == 1) ? 0 : $awal;
		$akhir = $limit;
		$a['pagi'] = _page($total_row, $limit, 3, base_url()."/klasifikasi/index");
		//$a['all']  = array('tampil' => $limit, 'total' => $total_row);
		$a['data'] = $this->klasifikasi_model->get_all_data($akhir, $awal);
		$a['page'] = 'l_klasifikasi';
		$this->load->view('template/index', $a);
	}

	function add()
	{
			//cek status admin
			if (!is_admin()) {
				redirect('klasifikasi');
			}
			//validasi input
			$this->form_validation->set_rules('kode', 'Kode', 'required');
			$this->form_validation->set_rules('nama', 'Nama', 'required');
			$this->form_validation->set_rules('uraian', 'Uraian', 'required');
			//cek validasi
			if ($this->form_validation->run() == true) {
					$data = array (
						'kode' => addslashes($this->input->post('kode')),
						'nama' => addslashes($this->input->post('nama')),
						'uraian' => addslashes($this->input->post('uraian'))
					);
					//insert data
					$this->klasifikasi_model->insert($data);
					$this->session->set_flashdata('notif', alert('success', 'Klasifikasi surat berhasil ditambahkan.'));
					redirect('klasifikasi');
			}

		$a['page'] = 't_klasifikasi';
		$this->load->view('template/index', $a);
	}

	function edit($uri3 = '')
	{
			//cek status admin
			if (!is_admin()) {
					redirect('klasifikasi');
			}
			//id surat
			$id = (int) $uri3;
			//validasi input
			$this->form_validation->set_rules('kode', 'Kode', 'required');
			$this->form_validation->set_rules('nama', 'Nama', 'required');
			$this->form_validation->set_rules('uraian', 'Uraian', 'required');
			//ambil data
			$klasifikasi = $this->klasifikasi_model->get_data($id);
			//cek data
			if (empty($klasifikasi)) {
					$this->session->set_flashdata('notif', alert('warning', 'Klasifikasi surat tidak ditemukan.'));
					redirect('klasifikasi');
			}
			//cek validasi
			if ($this->form_validation->run() == true) {
					$data = array (
						'kode' => addslashes($this->input->post('kode')),
						'nama' => addslashes($this->input->post('nama')),
						'uraian' => addslashes($this->input->post('uraian'))
					);
					//update data
					$this->klasifikasi_model->update($data, $id);
					$this->session->set_flashdata('notif', alert('success', 'Klasifikasi surat berhasil diperbaharui.'));
					redirect('klasifikasi');
			}

		$a['data'] = $klasifikasi;
		$a['page'] = 'e_klasifikasi';
		$this->load->view('template/index', $a);
	}

	function delete($uri3 = '')
	{
			//cek status admin
			if (!is_admin()) {
					redirect('klasifikasi');
			}
			//id surat
			$id = (int) $uri3;
			//ambil data
			$klasifikasi = $this->klasifikasi_model->get_data($id);
			//cek data
			if (empty($klasifikasi)) {
					$this->session->set_flashdata('notif', alert('warning', 'Klasifikasi surat tidak ditemukan.'));
					redirect('klasifikasi');
			}
			//hapus data
			$this->klasifikasi_model->delete($id);
			$this->session->set_flashdata('notif', alert('success', 'Klasifikasi surat berhasil dihapus.'));
			redirect('klasifikasi');
	}

	function detail() {

	}

	function search() {
		$keyword = $this->input->post('q');
		$query = $this->db->query("SELECT * FROM ref_klasifikasi WHERE nama LIKE '%$keyword%' OR uraian LIKE '%$keyword%' ORDER BY id DESC");
		$hasil = $query->result();
		$total_row = $query->num_rows();
		$limit = 5;
		$awal = $this->uri->segment(3);
		$awal	= (empty($awal) || $awal == 1) ? 0 : $awal;
		$akhir = $limit;
		$a['pagi'] = _page($total_row, $limit, 3, base_url()."/klasifikasi/search");
		$a['data'] = $this->db->query("SELECT * FROM ref_klasifikasi WHERE nama LIKE '%$keyword%' OR uraian LIKE '%$keyword%' ORDER BY id DESC LIMIT $limit, 100")->result();
		$a['page'] = 'l_klasifikasi';
		$this->load->view('template/index', $a);
	}
}
