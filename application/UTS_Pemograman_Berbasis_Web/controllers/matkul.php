<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class matkul extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Matkul_Model');
        $this->load->library('session');
        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }
    }
    public function tambah() {
        $this->load->view('Tamplates/header');
        $this->load->view('matkul/tambah_mat.php');
        $this->load->view('Tamplates/footer');
    }
    public function index() {
        $data['matkul']=$this->Matkul_Model->get_all_matkul();
        $this->load->view('Tamplates/header');
        $this->load->view('matkul/muka.php',$data);
        $this->load->view('Tamplates/footer');
    }
    public function insert(){
        $data = array(
            'kdmat' => $this->input->post('kdmat'),
            'namat' => $this->input->post('namat'),
            'sks' => $this->input->post('sks'),
            'semester' => $this->input->post('semester'),
            'jenis' => $this->input->post('jenis'),
            'prodi' => $this->input->post('prodi')
        );

        $this->load->model('Matkul_model');
        $this->Matkul_model->insert_matkul($data);

        redirect('matkul');
    }
    public function hapus($kdmat){
        $this->Matkul_Model->delete_matkul($kdmat);
        redirect('matkul');
    }
    public function edit ($kdmat){
        $data['matkul'] = $this->Matkul_Model->get_matkul_by_id($kdmat);
        $this->load->view('Tamplates/header');
        $this->load->view('matkul/edit_matkul', $data);
        $this->load->view('Tamplates/footer');
    }
    public function update($id){
        $this ->form_validation->set_rules('kdmat', 'kdmat', 'required');
        $this ->form_validation->set_rules('namat', 'namat', 'required');
        $this ->form_validation->set_rules('jenis', 'jenis', 'required');
        $this ->form_validation->set_rules('prodi', 'prodi', 'required');
        if ($this -> form_validation -> run() == FALSE) {
            $this->index($id);
        } else {
            $data =[
                'kdmat' => $this->input->post('kdmat'),
                'namat' => $this->input->post('namat'),
                'jenis' => $this->input->post('jenis'),
                'prodi' => $this->input->post('prodi')
            ];
            $this ->Matkul_Model->update_matkul($id, $data);
            $this->session->set_flashdata('success','Matakuliah berhasil diubah');
            redirect('matkul');
        }

    }
}