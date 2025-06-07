<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_berita extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('HomeBerita_Model');
        $this->load->library('session');
        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }
    }

    public function index(){
        $data['berita'] = $this->HomeBerita_Model->get_all();
        $this->load->view('layout/header');
        $this->load->view('home/index',$data);
        $this->load->view('layout/footer');
    }

    public function detail($id){
        // Validate input
        if (!is_numeric($id) || intval($id) <= 0) {
            show_404();
        }
    
        $this->load->model('HomeBerita_Model');
        $data['berita'] = $this->HomeBerita_Model->get_by_id($id);
    
        if (!$data['berita']) { // Fixed condition
            show_404();
        }
    
        $this->load->view('layout/header');
        $this->load->view('home/detail', $data);
        $this->load->view('layout/footer');
    }
}