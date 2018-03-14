<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	function index() {
		must_login();
		$a['page'] = 'home';
		$this->load->view('template/index', $a);
	}
}
