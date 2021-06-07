<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas_m extends CI_Model{
    public function getAllKelas(){
        $this->db->order_by('id_kelas', 'DESC');
        return $this->db->get('tbl_kelas')->result_array();
    }

    public function tambahDataKelas() {
        $data = [
        "jenjang" => $this->input->post('jenjang', true),
        "jurusan" => $this->input->post('jurusan', true),
        "jmlh" => $this->input->post('jmlh', true)
        ];     
        $this->db->insert('tbl_kelas', $data);
       
    }

    public function hapusDataKelas($id)
    {
        $this->db->where('id_kelas', $id);
        $this->db->delete('tbl_kelas');
        }

    public function editDataKelas($data, $id_kelas)
    {
        $this->db->where('id_kelas', $id_kelas);
        $this->db->update('tbl_kelas', $data);
    }
}

