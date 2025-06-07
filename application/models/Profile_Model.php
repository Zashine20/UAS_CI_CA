<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    /**
     * Get user details by user ID
     * @param int $user_id
     * @return object|null
     */
    public function get_user_by_id($user_id) {
        $query = $this->db->get_where('users', array('id' => $user_id));
        return $query->row(); // Return single row as object
    }

    /**
     * Update user data
     * @param int $user_id
     * @param array $data
     * @return bool
     */
    public function update_user($user_id, $data) {
        $this->db->where('id', $user_id);
        return $this->db->update('users', $data);
    }

    /**
     * Check if username exists, excluding a specific user ID
     * @param string $username
     * @param int $exclude_user_id
     * @return bool
     */
    public function check_username_exists($username, $exclude_user_id) {
        $this->db->where('username', $username);
        $this->db->where('id !=', $exclude_user_id);
        $query = $this->db->get('users');
        return $query->num_rows() > 0;
    }
}