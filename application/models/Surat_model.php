<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Surat_model extends CI_Model {

		private $table = 't_surat_masuk';

		function __construct() {
				if (!$this->db->table_exists($this->table)) {
						$this->create_table();
				}
		}

		function check_disposisi($id) {
			$query = $this->db->get_where('t_disposisi', array('id_surat' => $id));
			return $query->result();
		}

		function get_data($id) {
			$query = $this->db->get_where($this->table, array('id' => $id));
			return $query->row();
		}

		function get_data_dispos($id) {
			$query = $this->db->get_where('t_disposisi', array('id' => $id));
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

		function insert_disposisi($data) {
			$this->db->insert('t_disposisi', $data);
		}

		function edit_disposisi($data, $id) {
			$this->db->where('id', $id);
			$this->db->update('t_disposisi', $data);
		}

		function delete_disposisi($id) {
			$this->db->where('id', $id);
			$this->db->delete('t_disposisi');
			return true;
		}
}
