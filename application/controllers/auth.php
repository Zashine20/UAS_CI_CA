<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class auth extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('session');
        $this->load->library('upload');
        $this->load->helper('url');
        $this->load->library('form_validation');
    }

    public function register(){
        $this->load->view('auth/register');
    }
    public function process_register(){
        $this->form_validation->set_rules('username','username','required|is_unique[users.username]');
        $this->form_validation->set_rules('password','password','required|min_length[6]');
        $this->form_validation->set_rules('confirm_password','password','required|matches[password]');
        $this->form_validation->set_rules('role','role','required');


        if($this->form_validation->run()==false){
            $this->load->view('auth/register');
        }else{
            $profile_picture_filename = 'user2-160x160.jpg';


            if (!empty($_FILES['profile_picture']['name'])) {
                $config['upload_path'] = './aset/uploads/profile_pictures/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '2048'; 
                $config['encrypt_name'] = TRUE; 


                if (!is_dir($config['upload_path'])) {
                    mkdir($config['upload_path'], 0777, TRUE);
                }

                $this->upload->initialize($config);

                if ($this->upload->do_upload('profile_picture')) {
                    $upload_data = $this->upload->data();
                    $profile_picture_filename = $upload_data['file_name'];
                } else {

                    $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">'.$this->upload->display_errors().'</div>');
                    redirect('auth/register');
                    return;
                }
            }

            $data = [
                'username' => $this->input->post('username'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role' => $this->input->post('role'),
                'profile_picture' => $profile_picture_filename
            ];
            if($this->User_model->insert_user($data)){
                $this->session->set_flashdata('success', 'Register berhasil,Silahkan login');
                redirect('auth/login');
            }else{
                $this->session->set_flashdata('error', 'Register gagal');
                redirect('auth/register');
            }
        }
    }
    public function login(){
        $this->load->view('auth/login');
    }
    public function process_login(){
        $this->form_validation->set_rules('username','username','required');
        $this->form_validation->set_rules('password','password','required');
        if($this->form_validation->run()==false){
            $this->load->view('auth/login');
        }else{
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $user = $this->User_model->get_user_by_username($username);
            if($user){
                if(password_verify($password, $user['password'])){
                    $data = [
                        'user_id'  => $user['id'], 
                        'username' => $user['username'],
                        'role' => $user['role'],
                        'logged_in' => true,
                        'profile_picture' => $user['profile_picture'] 
                    ];
                    $this->session->set_userdata($data);
                    if($user['role'] == 'Admin'){
                        $this->session->set_flashdata('success', 'Login berhasil');
                        redirect('dashboard_user'); 
                    } else {
                        $this->session->set_flashdata('success', 'Login berhasil');
                        redirect('dashboard');
                    }
                }else{
                    $this->session->set_flashdata('error', 'Password salah');
                    redirect('auth/login');
                }
            }else{
                $this->session->set_flashdata('error', 'Username tidak ditemukan');
                redirect('auth/login');
            
            }
        }
    }
    public function logout(){
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}