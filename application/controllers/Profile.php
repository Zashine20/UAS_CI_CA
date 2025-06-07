<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Profile_Model');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->library('upload'); 
        $this->load->helper('form'); 


        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }
        if (!$this->session->userdata('user_id')) {
            $this->session->set_flashdata('error', 'Sesi pengguna tidak valid atau telah berakhir. Silakan login kembali.');
            redirect('auth/login');
        }
    }

    public function profile(){
        $data['title'] = 'User Profile';
        $this->load->view('Tamplates/header');
        $this->load->view('profile/profile', $data);
        $this->load->view('Tamplates/footer');
    }

    public function update_profile() {

        $user_id = $this->session->userdata('user_id');
        $current_user = $this->Profile_Model->get_user_by_id($user_id);


        if (!$current_user) {
            $this->session->set_flashdata('error', 'Gagal memuat data pengguna. Silakan coba lagi atau login ulang.');
            redirect('profile/profile');
            return; 
        }


        $this->form_validation->set_rules('username', 'Username', 'required|trim|callback_username_check['.$user_id.']');

        $new_password = $this->input->post('new_password');
        if (!empty($new_password)) {
            $this->form_validation->set_rules('current_password', 'Current Password', 'required|callback_current_password_check['.$current_user->password.']');
            $this->form_validation->set_rules('new_password', 'New Password', 'required|min_length[6]');
            $this->form_validation->set_rules('confirm_new_password', 'Confirm New Password', 'required|matches[new_password]');
        }

        if ($this->form_validation->run() === FALSE) {

            $this->profile();
        } else {

            $update_data = array();


            $new_username = $this->input->post('username');
            if ($new_username !== $current_user->username) {
                $update_data['username'] = $new_username;
            }


            if (!empty($new_password)) {
                $update_data['password'] = password_hash($new_password, PASSWORD_DEFAULT);
            }


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
                    $update_data['profile_picture'] = $upload_data['file_name'];


                    $old_picture = $current_user->profile_picture; 
                    if ($old_picture && $old_picture != 'user2-160x160.jpg' && file_exists($config['upload_path'] . $old_picture)) {
                        unlink($config['upload_path'] . $old_picture);
                    }
                } else {
                    $this->session->set_flashdata('error', 'Gagal mengunggah foto profil: ' . $this->upload->display_errors());
                    redirect('profile/profile');
                    return;
                }
            }




            if (!empty($update_data)) {
                if ($this->Profile_Model->update_user($user_id, $update_data)) {
                    if (isset($update_data['username'])) {
                        $this->session->set_userdata('username', $update_data['username']);
                    }
                    $this->session->set_flashdata('success', 'Profil berhasil diperbarui.');
                    if (isset($update_data['profile_picture'])) {
                        $this->session->set_userdata('profile_picture', $update_data['profile_picture']);
                    }
                } else {
                    $this->session->set_flashdata('error', 'Gagal memperbarui profil. Silakan coba lagi.');
                }
            } else {
                $this->session->set_flashdata('success', 'Tidak ada perubahan pada profil.'); 
            }
            redirect('profile/profile');
        }
    }


    public function username_check($username, $user_id) {
        $current_user = $this->Profile_Model->get_user_by_id($user_id);
        if (!$current_user) { 
            $this->form_validation->set_message('username_check', 'Gagal memvalidasi pengguna.');
            return FALSE;
        }

        if ($username === $current_user->username) {
            return TRUE; 
        }
        if ($this->Profile_Model->check_username_exists($username, $user_id)) {
            $this->form_validation->set_message('username_check', 'Username {field} sudah digunakan.');
            return FALSE;
        }
        return TRUE;
    }

    public function current_password_check($current_password_input, $current_password_hash) {
        if (empty($current_password_input) && !empty($this->input->post('new_password'))) {
             $this->form_validation->set_message('current_password_check', '{field} wajib diisi jika ingin mengubah password.');
            return FALSE;
        }
        if (!empty($current_password_input) && !password_verify($current_password_input, $current_password_hash)) {
            $this->form_validation->set_message('current_password_check', '{field} salah.');
            return FALSE;
        }
        return TRUE;
    }
}
