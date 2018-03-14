<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model {

	function check_user($data) {
		$query = $this->db->get_where('t_admin', $data);
		return $query;
	}
}
