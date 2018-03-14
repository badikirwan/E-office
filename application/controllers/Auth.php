<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('Login_model');
	}

	function index() {
		if (is_logged()) {
				redirect('home');
		}
		$this->load->view('template/login');
	}

	function login() {
		$user = $this->security->xss_clean($this->input->post('user'));
		$pass = md5($this->security->xss_clean($this->input->post('pass')));

		$q_cek	= $this->db->query("SELECT * FROM t_admin WHERE username = '".$user."' AND password = '".$pass."'");
		$j_cek	= $q_cek->num_rows();
		$d_cek	= $q_cek->row();

		if($j_cek == 1) {
			$data = array(
							'admin_id' => $d_cek->id,
							'admin_user' => $d_cek->username,
							'admin_nama' => $d_cek->nama,
							'admin_ta' => date('Y'),
							'admin_foto' => $d_cek->foto,
							'admin_level' => $d_cek->level,
							'admin_valid' => true
						);
			$this->session->set_userdata($data);
			redirect('home');
		} else {
			$this->session->set_flashdata("k", "<div id=\"alert\" class=\"alert alert-error\">username or password is not valid</div>");
			redirect('login');
		}
	}

	function logout() {
		$this->session->sess_destroy();
		redirect('auth');
	}
}
