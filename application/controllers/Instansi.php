<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Instansi extends CI_Controller {

	function index() {
		$a['data'] = $this->db->query("SELECT * FROM tr_instansi WHERE id = '1' LIMIT 1")->row();
		$a['page'] = 'instansi';
		$this->load->view('template/index', $a);
	}

	function save($uri3 = '') {
			//cek status admin
			if (!is_admin()) {
					redirect('home');
			}
			//id
			$id = (int) $uri3;
			//config upload
			$config['upload_path']   = './upload/foto';
			$config['allowed_types'] = 'jpg|jpeg|png';
			$config['max_size']      = '0';
			$config['max_width']     = '0';
			$config['max_height']    = '0';
			$config['file_name']     = 'logo';

			$this->load->library('upload', $config);
			//validasi input
			$this->form_validation->set_rules('nama', 'nama instansi', 'required');
			$this->form_validation->set_rules('alamat', 'alamat instansi', 'required');
			$this->form_validation->set_rules('pimpinan', 'nama pimpinan', 'required');
			$this->form_validation->set_rules('nip', 'nip pimpinan', 'required');

			if ($this->form_validation->run() == TRUE) {
						$nama = $this->input->post('nama');
						$alamat = $this->input->post('alamat');
						$pimpinan = $this->input->post('pimpinan');
						$nip_pimpinan = $this->input->post('nip');

					if ($this->upload->do_upload('userfile')) {
							$up_data = $this->upload->data();
							$this->db->query("UPDATE tr_instansi SET nama = '$nama', alamat = '$alamat', pimpinan = '$pimpinan', nip_pimpinan = '$nip_pimpinan', logo = '".$up_data['file_name']."' WHERE id = '$id'");
					} else {
							$this->db->query("UPDATE tr_instansi SET nama = '$nama', alamat = '$alamat', pimpinan = '$pimpinan', nip_pimpinan = '$nip_pimpinan' WHERE id = '$id'");
					}
					$this->session->set_flashdata('notif', alert('success', 'Pengaturan instansi berhasil.'));
					redirect('instansi');
			}

			$a['data'] = $this->db->query("SELECT * FROM tr_instansi WHERE id = '1' LIMIT 1")->row();
			$a['page'] = 'instansi';
			$this->load->view('template/index', $a);
	}

}
