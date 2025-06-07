<?php
defined('BASEPATH')OR exit('No direct script access allowed');
class Profile_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function update_username($username) {
        $this->db->where('id');
        $this->db->update('users', ['username' => $username]);
    }
}