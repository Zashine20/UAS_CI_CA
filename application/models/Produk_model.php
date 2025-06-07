<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk_model extends CI_Model {

    private $table = 'produk';
    private $pk = 'id_produk'; 

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_all_produk() {
        $this->db->order_by($this->pk, 'DESC'); 
        return $this->db->get($this->table)->result();
    }

    public function get_produk_by_id($id_produk) {
        return $this->db->get_where($this->table, [$this->pk => $id_produk])->row();
    }

    public function insert_produk($data) {
        return $this->db->insert($this->table, $data);
    }

    public function update_produk($id_produk, $data) {
        $this->db->where($this->pk, $id_produk);
        return $this->db->update($this->table, $data);
    }

    public function delete_produk($id_produk) {
        $this->db->where($this->pk, $id_produk);
        return $this->db->delete($this->table);
    }

    public function kurangi_stok($id_produk, $jumlah_pengurangan) {
        $this->db->where($this->pk, $id_produk);
        $this->db->set('stok_produk', 'stok_produk - ' . (int)$jumlah_pengurangan, FALSE);
        return $this->db->update($this->table);
    }
    public function is_produk_in_use($id_produk) {
        $this->db->where('id_produk', $id_produk);
        $query = $this->db->get('sales_order_items'); 
        if ($query->num_rows() > 0) {
            return true; 
        }
        return false;
    }
}