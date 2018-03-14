<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function is_logged() {
		$CI =& get_instance();
		$user = $CI->session->userdata('admin_valid');
		if (!empty($user)) {
			return true;
		}
	return false;
}

function is_admin() {
	if (!is_logged()) {
			return false;
	}

	$CI =& get_instance();
	$level = $CI->session->userdata('admin_level');
	if ($level == 'Administrator') {
			return true;
	}
	return false;
}

function must_login() {
		if (!is_logged()) {
			redirect('auth');
			die;
		}
}

function get_value($tabel, $field_kunci, $diambil, $where) {
	$CI =& get_instance();
	$nama	= $CI->db->query("SELECT $diambil FROM $tabel WHERE $field_kunci = '$where'")->row();
	$data	= empty($nama) ? "-" : $nama->$diambil;
	return $data;
}

function alert($notif = '', $msg = '') {
    return '<div class="alert alert-'.$notif.'"><button type="button" class="close" data-dismiss="alert">×</button> '.$msg.'</div>';
}

function get_noagenda() {
	$CI =& get_instance();
	$q_nomer_terakhir = $CI->db->query("SELECT (MAX(no_agenda)) AS last FROM t_surat_masuk WHERE YEAR(tgl_diterima) = '".$CI->session->userdata('admin_ta')."'")->row_array();
	$last	= str_pad(intval($q_nomer_terakhir['last']+1), 4, '0', STR_PAD_LEFT);
	return $last;
}

function _page($total_row, $per_page, $uri_segment, $url) {
	$CI 	=& get_instance();
	$CI->load->library('pagination');
	$config['base_url'] 	= $url;
	$config['total_rows'] 	= $total_row;
	$config['uri_segment'] 	= $uri_segment;
	$config['per_page'] 	= $per_page;
	$config['num_tag_open'] = '<li>';
	$config['num_tag_close']= '</li>';
	$config['prev_tag_open']='<li>';
	$config['prev_tag_close']='</li>';
	$config['next_tag_open']='<li>';
	$config['next_tag_close']='</li>';
	$config['cur_tag_open']='<li class="active disabled"><a href="#"  style="background: #e3e3e3">';
	$config['cur_tag_close']='</a></li>';
	$config['first_tag_open']='<li>';
	$config['first_tag_close']='</li>';
	$config['last_tag_open']='<li>';
	$config['last_tag_close']='</li>';

	$CI->pagination->initialize($config);
	return $CI->pagination->create_links();
}
