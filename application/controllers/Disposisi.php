<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Disposisi extends CI_Controller {

		function __construct() {
				parent::__construct();
				must_login();
				$this->load->model('surat_model');
		}

		function index($uri3 = '')
		{
				$id = (int) $uri3;
				$a['id'] = $id;
				$a['judul_surat']	= get_value("t_surat_masuk", "id", "isi_ringkas", $id);
				$a['data'] = $this->surat_model->check_disposisi($id);
				$a['page'] = 'disposisi_surat';
				$this->load->view('template/index', $a);
		}

		function add($uri3 = '')
		{
				$id = (int) $uri3;

				$this->config_validation();

				if ($this->form_validation->run() == TRUE) {
						$data = array(
							'id_surat'			=> $id ,
							'id_user' 			=> $this->input->post('id_user') ,
							'kpd_yth' 			=> $this->input->post('tujuan') ,
							'isi_disposisi' => $this->input->post('isi_disposisi') ,
							'sifat' 				=> $this->input->post('sifat'),
							'batas_waktu' 	=> $this->input->post('batas_waktu') ,
							'catatan' 			=> $this->input->post('catatan') ,
						);
						$this->surat_model->insert_disposisi($data);
						$this->session->set_flashdata('notif', alert('success', 'Disposisi surat berhasil ditambahkan.'));
						redirect('disposisi/index/'.$id);
				}

				$a['page'] = 'tambah_disposisi';
				$this->load->view('template/index', $a);

		}

		function edit($uri3 = '')
		{
				if (is_admin()) {
						redirect('disposisi');
				}

				$this->config_validation();
				$id = (int) $uri3;
				$id_surat = $this->input->post('id_surat');
				$disposisi = $this->surat_model->get_data_dispos($id);

				if (empty($disposisi)) {
						$this->session->set_flashdata('notif', alert('warning', 'Disposisi tidak ditemukan.'));
						redirect('disposisi');
				}

				if ($this->form_validation->run() == TRUE) {
						$data = array(
							'id_surat'			=> $this->input->post('id_surat') ,
							'id_user' 			=> $this->input->post('id_user') ,
							'kpd_yth' 			=> $this->input->post('tujuan') ,
							'isi_disposisi' => $this->input->post('isi_disposisi') ,
							'sifat' 				=> $this->input->post('sifat'),
							'batas_waktu' 	=> $this->input->post('batas_waktu') ,
							'catatan' 			=> $this->input->post('catatan') ,
						);
						$this->surat_model->edit_disposisi($data, $id);
						$this->session->set_flashdata('notif', alert('success', 'Disposisi berhasil dirubah.'));
						redirect('disposisi/index/'.$id_surat);
				}

				$a = array('data' => $disposisi , 'page' => 'edit_disposisi' );
				$this->load->view('template/index', $a);
		}

		function delete($uri3 = '')
		{


				$id = (int) $uri3;
				//ambil data
				$klasifikasi = $this->surat_model->get_data_dispos($id);
				//cek data
				if (empty($klasifikasi)) {
						$this->session->set_flashdata('notif', alert('warning', 'Disposisi surat tidak ditemukan.'));
						redirect('disposisi');
				}
				//hapus data
				$this->surat_model->delete_disposisi($id);
				$this->session->set_flashdata('notif', alert('success', 'Disposisi surat berhasil dihapus.'));
		}

		function config_validation()
		{
				$this->form_validation->set_rules('tujuan', 'tujuan disposisi', 'required');
				$this->form_validation->set_rules('batas_waktu', 'batas waktu', 'required');
				$this->form_validation->set_rules('isi_disposisi', 'isi disposisi', 'required');
				$this->form_validation->set_rules('catatan', 'catatan', 'required');
				$this->form_validation->set_rules('sifat', 'sifat disposisi', 'required');
		}

		function get_tujuan_disposisi()
		{
			$kode = $this->input->post('tujuan',TRUE);
			$data = $this->db->query("SELECT id, nama FROM t_admin WHERE nama LIKE '%$kode%' ORDER BY id ASC")->result();

			$klasifikasi 		=  array();
	        foreach ($data as $d) {
				$json_array				= array();
	      $json_array['value']	= $d->id;
				$json_array['label']	= $d->nama;
				$klasifikasi[] 			= $json_array;
			}

			echo json_encode($klasifikasi);
		}
}
