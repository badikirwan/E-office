<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Surat_masuk extends CI_Controller {

		function __construct() {
				parent::__construct();
				//must_login();
				$this->load->model('surat_model');
		}

		function index() {
				//ambil ID dan TAHUN
				$id = $this->session->userdata('admin_id');
				$tahun = $this->session->userdata('admin_ta');
				$level = $this->session->userdata('admin_level');

				//pagination
				if ($level == 'Staf') {
						$total_row = $this->db->query("SELECT * FROM t_surat_masuk WHERE YEAR(tgl_diterima) = '$tahun' AND pengolah = '$id'")->num_rows();
				} else {
						$total_row = $this->db->query("SELECT * FROM t_surat_masuk WHERE YEAR(tgl_diterima) = '$tahun'")->num_rows();
				}
				$per_page		= 10;

				$awal	= $this->uri->segment(3);
				$awal	= (empty($awal) || $awal == 1) ? 0 : $awal;

				//if (empty($awal) || $awal == 1) { $awal = 0; } { $awal = $awal; }
				$akhir	= $per_page;

				$a['pagi']	= _page($total_row, $per_page, 3, base_url()."surat_masuk/index");

				if ($this->session->userdata('admin_level') == 'Staf') {
					$result1 = $this->db->query("SELECT a.*, b.id_user FROM t_surat_masuk a JOIN t_disposisi b ON a.id = b.id_surat WHERE YEAR(tgl_diterima) = '$tahun' AND b.id_user = '$id' ORDER BY a.id DESC LIMIT $awal, $akhir ")->result();
					$result2  = $this->db->query("SELECT * FROM t_surat_masuk WHERE YEAR(tgl_diterima) = '$tahun' AND pengolah = '$id' ORDER BY id DESC LIMIT $awal, $akhir ")->result();
					$a['data'] = array_merge($result1, $result2);
				} else {
					$a['data']		= $this->db->query("SELECT * FROM t_surat_masuk WHERE YEAR(tgl_diterima) = '$tahun' ORDER BY id DESC LIMIT $awal, $akhir ")->result();
				}

				$a['page'] = 'surat_masuk';
				$this->load->view('template/index', $a);
		}

		function add()
		{
				//cek status admin
				if (is_admin()) {
						redirect('surat_masuk');
				}

				$this->config_upload();
				$this->config_validation();

				if ($this->form_validation->run() == TRUE) {
						$data = array(
								'kode' 					=> $this->input->post('kode_klas'),
								'no_agenda' 		=> $this->input->post('no_agenda'),
								'indek_berkas' 	=> $this->input->post('indeks'),
								'isi_ringkas' 	=> $this->input->post('isi_ringkas'),
								'dari' 					=> $this->input->post('asal_surat'),
								'no_surat' 			=> $this->input->post('no_surat'),
								'tgl_surat' 		=> $this->input->post('tgl_surat'),
								'tgl_diterima' 	=> date('Y-m-d'),
								'keterangan' 		=> $this->input->post('keterangan'),
								'file' 					=> $this->upload->data('file_name'),
								'pengolah' 			=> $this->session->userdata('admin_id')
						);
						$this->surat_model->insert($data);

						$this->session->set_flashdata('notif', alert('success', 'Surat masuk berhasil ditambahkan.'));
						redirect('surat_masuk');
				}

				$a['page'] = 'tambah_surat_masuk';
				$this->load->view('template/index', $a);
		}

		function edit($uri3 = '')
		{
				if (is_admin()) {
						redirect('surat_masuk');
				}

				$id = (int) $uri3;

				$this->config_upload();
				$this->config_validation();

				$surat = $this->surat_model->get_data($id);

				if (empty($surat)) {
						$this->session->set_flashdata('notif', alert('warning', 'Surat tidak ditemukan.'));
						redirect('surat_masuk');
				}

				if ($this->form_validation->run() == TRUE) {
						$data = array(
								'kode' 					=> $this->input->post('kode_klas'),
								'no_agenda' 		=> $this->input->post('no_agenda'),
								'indek_berkas' 	=> $this->input->post('indeks'),
								'isi_ringkas' 	=> $this->input->post('isi_ringkas'),
								'dari' 					=> $this->input->post('asal_surat'),
								'no_surat' 			=> $this->input->post('no_surat'),
								'tgl_surat' 		=> $this->input->post('tgl_surat'),
								'tgl_diterima' 	=> date('Y-m-d'),
								'keterangan' 		=> $this->input->post('keterangan'),
								'file' 					=> $this->upload->data('file_name'),
								'pengolah' 			=> $this->session->userdata('admin_id')
						);
						$this->surat_model->update($data, $id);

						$this->session->set_flashdata('notif', alert('success', 'Surat masuk berhasil dirubah.'));
						redirect('surat_masuk');
				}

				$a = array('data' => $surat , 'page' => 'edit_surat_masuk' );
				$this->load->view('template/index', $a);
		}

		function delete($uri3 = '')
		{
				if (is_admin()) {
						redirect('surat_masuk');
				}

				$id = (int) $uri3;
				$surat = $this->surat_model->get_data($id);

				if (empty($surat)) {
						$this->session->set_flashdata('notif', alert('warning', 'Surat tidak ditemukan.'));
						redirect('surat_masuk');
				}

				$this->surat_model->delete($id);
				$this->session->set_flashdata('notif', alert('success', 'surat berhasil dihapus.'));
				redirect('surat_masuk');
		}

		function detail($uri3 = '')
		{
				$id = (int) $uri3;
				$data = $this->surat_model->get_data($id);

				if (empty($data)) {
						$this->session->set_flashdata('notif', alert('warning', 'Surat tidak ditemukan.'));
						redirect('surat_masuk');
				}

				$a = array(
					'data' => $data,
					'page' => 'detail_surat'
				);
				$this->load->view('template/index', $a);
		}


		function config_upload()
		{
				$config['upload_path']   = './upload/surat_masuk';
				$config['allowed_types'] = 'jpg|jpeg|png';
				$config['max_size']      = '0';
				$config['max_width']     = '0';
				$config['max_height']    = '0';
				$config['file_name']     = 'SM_'.time();

				$this->load->library('upload', $config);
		}

		function config_validation()
		{
				$this->form_validation->set_rules('no_agenda', 'nomor agenda', 'required');
				$this->form_validation->set_rules('no_surat', 'nomor surat', 'required');
				$this->form_validation->set_rules('asal_surat', 'asal surat', 'required');
				$this->form_validation->set_rules('isi_ringkas', 'isi ringkas', 'required');
				$this->form_validation->set_rules('kode_klas', 'kode klasifikasi', 'required');
				$this->form_validation->set_rules('indeks', 'indeks berkas', 'required');
				$this->form_validation->set_rules('tgl_surat', 'tanggal surat', 'required');
				$this->form_validation->set_rules('keterangan', 'keterangan', 'required');
				$this->form_validation->set_rules('userfile', 'file surat', 'callback_check_file');
		}

		function check_file()
		{
				if(isset($_FILES['userfile']['tmp_name']) AND !$this->upload->do_upload()) {
						$this->form_validation->set_message('check_file', $this->upload->display_errors());
						return FALSE;
				}
		}

		function get_klasifikasi()
		{
			$kode = $this->input->post('kode_klas',TRUE);

			$data =  $this->db->query("SELECT id, kode, nama FROM ref_klasifikasi WHERE kode LIKE '%$kode%' ORDER BY id ASC")->result();

			$klasifikasi = array();
	        foreach ($data as $d) {
							$json_array				= array();
	            $json_array['value']	= $d->kode;
							$json_array['label']	= $d->kode." - ".$d->nama;
							$klasifikasi[] 			  = $json_array;
					}
			echo json_encode($klasifikasi);
		}
}
