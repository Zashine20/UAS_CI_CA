<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    /**
     * Get all users
     * @return array
     */
    public function get_all_users() {
        $query = $this->db->get('users');
        return $query->result_array(); // Mengembalikan array dari semua pengguna
    }

    /**
     * Delete a user by ID
     * @param int $user_id
     * @return bool
     */
    public function delete_user_by_id($user_id) {
        // Pastikan user_id yang diberikan bukan milik admin yang sedang login (opsional, tapi baik)
        // if ($user_id == $this->session->userdata('user_id')) {
        //     return false; // Mencegah admin menghapus diri sendiri
        // }
        $this->db->where('id', $user_id);
        return $this->db->delete('users');
    }
}