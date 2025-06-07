<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan_model extends CI_Model {

    private $table = 'pelanggan';
    private $pk = 'id_pelanggan'; 

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_all_pelanggan() {
        $this->db->order_by($this->pk, 'DESC'); 
        return $this->db->get($this->table)->result();
    }

    public function get_pelanggan_by_id($id_pelanggan) {
        return $this->db->get_where($this->table, [$this->pk => $id_pelanggan])->row();
    }

    public function insert_pelanggan($data) {
        return $this->db->insert($this->table, $data);
    }

    public function update_pelanggan($id_pelanggan, $data) {
        $this->db->where($this->pk, $id_pelanggan);
        return $this->db->update($this->table, $data);
    }

    public function delete_pelanggan($id_pelanggan) {
        $this->db->where($this->pk, $id_pelanggan);
        return $this->db->delete($this->table);
    }
    public function is_pelanggan_in_use($id_pelanggan) {
        $this->db->where('id_pelanggan', $id_pelanggan);
        $query = $this->db->get('sales_orders');
        if ($query->num_rows() > 0) {
            return true; 
        }
        return false;
    }
}