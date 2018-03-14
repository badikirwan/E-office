<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Akun extends CI_Controller {

	function __construct() {
			parent::__construct();
			//cek login
			must_login();
			//load model
			$this->load->model('akun_model');
	}

	function index() {
			$row = $this->akun_model->get_count_data();
			$limit = 10;
			$awal = $this->uri->segment(3);
			$awal	= (empty($awal) || $awal == 1) ? 0 : $awal;
			$akhir = $limit;
			$a['pagi'] = _page($row, $limit, 3, base_url()."/akun/index");
			//$a['all']  = array('tampil' => $limit, 'total' => $total_row);
			$a['data'] = $this->akun_model->get_all_data($akhir, $awal);
			$a['page'] = 'akun';
			$this->load->view('template/index', $a);
	}

	function add($uri3 = '') {
			//cek status admin
			if (!is_admin()) {
					redirect('akun');
			}

			//cek uri_segment
			$uri = (int) $uri3;
			if ($uri == null OR $uri > 1) {
					redirect('akun');
			}
			//config upload
			$config['upload_path']   = './upload/foto';
			$config['allowed_types'] = 'jpg|jpeg|png';
			$config['max_size']      = '0';
			$config['max_width']     = '0';
			$config['max_height']    = '0';
			$config['file_name']     = 'pengajar-'.time();

			$this->load->library('upload', $config);
			//validasi input
			$this->form_validation->set_rules('nama', 'nama', 'required');
			$this->form_validation->set_rules('nip', 'nip', 'required');
			$this->form_validation->set_rules('jabatan', 'jabatan', 'required');
			$this->form_validation->set_rules('username', 'username', 'required|min_length[5]|max_length[12]|callback_check_username');
			$this->form_validation->set_rules('password', 'password', 'required|min_length[5]|max_length[12]');
			$this->form_validation->set_rules('password2', 'password konfirmasi', 'required|matches[password]');
			$this->form_validation->set_rules('userfile', 'foto', 'callback_check_foto');

			if ($this->form_validation->run() == TRUE) {
					$data = array(
							'nama' 			=> $this->input->post('nama'),
							'nip' 			=> $this->input->post('nip'),
							'jabatan' 	=> $this->input->post('jabatan'),
							'username' 	=> $this->input->post('username'),
							'password' 	=> md5($this->input->post('password')),
							'level' 		=> $this->input->post('level'),
							'foto' 			=> $this->upload->data('file_name')
					);

					$this->akun_model->insert($data);
					$this->session->set_flashdata('notif', alert('success', 'Akun berhasil ditambahkan.'));
					redirect('akun');
			}

			$a['page'] = 't_akun';
			$this->load->view('template/index', $a);
	}

	function edit($uri3 = '') {
		//cek status admin
		if (!is_admin()) {
				redirect('akun');
		}
		//id akun
		$id = (int) $uri3;
		//config upload
		$config['upload_path']   = './upload/foto';
		$config['allowed_types'] = 'jpg|jpeg|png';
		$config['max_size']      = '0';
		$config['max_width']     = '0';
		$config['max_height']    = '0';
		$config['file_name']     = 'Akun_'.time();

		$this->load->library('upload', $config);
		//validasi input
		$this->form_validation->set_rules('nama', 'nama', 'required');
		$this->form_validation->set_rules('nip', 'nip', 'required');
		$this->form_validation->set_rules('jabatan', 'jabatan', 'required');
		$this->form_validation->set_rules('username', 'username', 'required|min_length[5]|max_length[12]|callback_check_username');
		$this->form_validation->set_rules('password', 'password', 'required|min_length[5]|max_length[12]');
		$this->form_validation->set_rules('password2', 'password konfirmasi', 'required|matches[password]');
		$this->form_validation->set_rules('userfile', 'foto', 'callback_check_foto');
		//ambil data
		$akun = $this->akun_model->get_data($id);
		//cek Data
		if (empty($akun)) {
				$this->session->set_flashdata('notif', alert('warning', 'Akun tidak ditemukan.'));
				redirect('akun');
		}
		//cek validasi
		if ($this->form_validation->run() == TRUE) {
				$data = array(
					'nama' 			=> $this->input->post('nama'),
					'nip' 			=> $this->input->post('nip'),
					'jabatan' 	=> $this->input->post('jabatan'),
					'username' 	=> $this->input->post('username'),
					'password' 	=> md5($this->input->post('password')),
					'level' 		=> $this->input->post('level'),
					'foto' 			=> $this->upload->data('file_name')
				);

				$this->akun_model->update($data, $id);
				$this->session->set_flashdata('notif', alert('success', 'Akun berhasil dirubah.'));
				redirect('akun');
		}

		$a['data'] = $akun;
		$a['page'] = 'e_akun';
		$this->load->view('template/index', $a);
	}

	function delete($uri3 = '') {
			//cek status admin
			if (!is_admin()) {
					redirect('akun');
			}
			//id surat
			$id = (int) $uri3;
			//ambil data
			$akun = $this->akun_model->get_data($id);
			//cek data
			if (empty($akun)) {
					$this->session->set_flashdata('notif', alert('warning', 'Akun tidak ditemukan.'));
					redirect('akun');
			}
			//hapus data
			$this->akun_model->delete($id);
			$this->session->set_flashdata('notif', alert('success', 'Akun berhasil dihapus.'));
			redirect('akun');
	}

	function detail($uri3 = '') {
			//cek status admin
			if (!is_admin()) {
					redirect('akun');
			}
			//id akun
			$id = (int) $uri3;
			//ambil data
			$akun = $this->akun_model->get_data($id);
			//cek data
			if (empty($akun)) {
					$this->session->set_flashdata('notif', alert('warning', 'Akun tidak ditemukan.'));
					redirect('akun');
			}
			$a['data'] = $akun;
			$a['page'] = 'd_akun';
			$this->load->view('template/index', $a);
	}

	function check_foto() {
			if(isset($_FILES['userfile']['tmp_name'])) {

				if (!$this->upload->do_upload('userfile')) {
						$this->form_validation->set_message('check_foto', $this->upload->display_errors());
						return FALSE;
				}

			}	else {
				$this->form_validation->set_message('check_foto', "No file select");
				return FALSE;
			}
	}

	function check_username($str) {
			$check = $this->akun_model->is_username_exist($str);
			if ($check == TRUE) {
          $this->form_validation->set_message('check_username', 'This userName already exist!');
          return FALSE;
      } else {
          return TRUE;
    	}
	}

}
