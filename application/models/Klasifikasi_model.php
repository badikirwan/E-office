<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Klasifikasi_model extends CI_Model {

	private $table = 'ref_klasifikasi';

	function __construct() {
			if (!$this->db->table_exists($this->table)) {
					$this->create_table();
			}
	}

	function get_count_data() {
		$query = $this->db->get($this->table);
		return $query->num_rows();
	}

	function get_all_data($a, $b) {
		$this->db->from($this->table);
    $this->db->order_by('id', 'DESC');
		$this->db->limit($a, $b);
		$query = $this->db->get();
		return $query->result();
	}

	function get_data($id) {
		$query = $this->db->get_where($this->table, array('id' => $id));
		return $query->row();
	}

	function insert($data) {
		$this->db->insert($this->table, $data);
	}

	function update($data, $id) {
		$this->db->where('id', $id);
		$this->db->update($this->table, $data);
	}

	function delete($id) {
		$this->db->where('id', $id);
		$this->db->delete($this->table);
		return true;
	}
}
