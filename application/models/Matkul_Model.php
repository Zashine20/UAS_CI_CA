<?php
defined('BASEPATH')OR exit('No direct script access allowed');
class Matkul_Model extends CI_Model{
    public function insert_matkul($data){
        $this->db->insert('matkul', $data);
    }
    public function get_all_matkul(){
        return $this->db->get('matkul')->result_array();
    }
    public function delete_matkul($kdmat){
        return $this->db->delete('matkul',array('kdmat' => $kdmat));
    }
    public function get_matkul_by_id($kdmat){
        return $this->db->get_where('matkul',array('kdmat' => $kdmat))->row_array();
    }
    public function update_matkul($id,$data){
        $this->db->where('kdmat',$id);
        return $this->db->update('matkul',$data);
    }
}