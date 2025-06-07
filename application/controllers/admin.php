<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Admin_Model');
        $this->load->library('session');
        $this->load->helper('url'); // Untuk base_url dan redirect
        $this->load->helper('form'); // Untuk form_open jika diperlukan

        // Proteksi halaman: Hanya admin yang bisa akses
        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }
        if ($this->session->userdata('role') !== 'Admin') {
            $this->session->set_flashdata('error', 'Anda tidak memiliki hak akses ke halaman ini.');
            redirect('dashboard');
        }
    }

    public function index() {
        $data['title'] = 'Manage Users';
        $data['users'] = $this->Admin_Model->get_all_users();

        $this->load->view('Tamplates/header', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('Tamplates/footer');
    }

    public function delete($user_id) {

        if (empty($user_id) || !is_numeric($user_id)) {
            $this->session->set_flashdata('error', 'User ID tidak valid.');
            redirect('admin');
            return;
        }

        if ($user_id == $this->session->userdata('user_id')) {
            $this->session->set_flashdata('error', 'Anda tidak dapat menghapus akun Anda sendiri.');
            redirect('admin');
            return;
        }

        if ($this->Admin_Model->delete_user_by_id($user_id)) {
            $this->session->set_flashdata('success', 'Pengguna berhasil dihapus.');
        } else {
            $user_exists_query = $this->db->get_where('users', array('id' => $user_id));
            if ($user_exists_query->num_rows() == 0) {
                 $this->session->set_flashdata('error', 'Gagal menghapus pengguna: Pengguna tidak ditemukan.');
            } else {
                 $this->session->set_flashdata('error', 'Gagal menghapus pengguna. Silakan coba lagi.');
            }
        }
        redirect('admin');
    }
}