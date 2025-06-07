<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Profile_Model');
        $this->load->library('session');
        $this->load->library('form_validation');
    }

    public function profile(){
        $this->load->view('Tamplates/header');
        $this->load->view('profile/profile');
        $this->load->view('Tamplates/footer');
    }

    public function update_profile() {
        if ($this->input->post()) {
            $this->form_validation->set_rules('username', 'username', 'required');

            if ($this->form_validation->run() === FALSE) {
                // Form validation failed, display error messages
                $this->session->set_flashdata('error', validation_errors());
                redirect('profile/profile');
            } else {
                // Form validation passed, update the profile
                $username = $this->input->post('username');

    
                // Update username
                $this->Profile_Model->update_username($username);
    
                $this->session->set_flashdata('success', 'Profile updated successfully');
                redirect('profile/profile');
            }
        } else {
            redirect('profile/profile');
        }
    }
}
