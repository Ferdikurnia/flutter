<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller
{
  function __construct()
  {
    parent:: __construct();
    $this->load->model('Kelas_m');
    $this->load->library('form_validation');
  }

  public function index() {

    $data['kelas'] = $this->Kelas_m->getAllKelas();
    $this->load->view('template/header_v');
    $this->load->view('kelas/kelas', $data);
    $this->load->view('template/footer_v');
  }

  public function tambah_kelas() {
    $this->form_validation->set_rules('jenjang','Jenjang','required');
    $this->form_validation->set_rules('jurusan','Jurusan','required');
    $this->form_validation->set_rules('jmlh','Jmlh','required');
  
    if($this->form_validation->run() == FALSE){
      $this->load->view('template/header_v');
      $this->load->view('kelas/kelas', $data);
      $this->load->view('template/footer_v');
    }else{
      $this->Kelas_m->tambahDataKelas(); 
      $this->session->set_flashdata('success','Ditambahkan');
      redirect('kelas');
    }
  }
  
  public function hapus_kelas($id) {
    $this->Kelas_m->hapusDataKelas($id);
    $this->session->set_flashdata('success','dihapus');
    redirect('Kelas');
  }

  public function edit_kelas()
  {
    $this->form_validation->set_rules('id_kelas','Id_kelas','required');
    $this->form_validation->set_rules('jenjang','Jenjang','required');
    $this->form_validation->set_rules('jurusan','Jurusan','required');
    $this->form_validation->set_rules('jmlh','Jlmh','required');
  
    if ($this->form_validation->run() == FALSE) {
      $this->load->view('template/header_v');
      $this->load->view('kelas/kelas');
      $this->load->view('template/footer_v');
    }else{
      $id_kelas = $this->input->post('id_kelas');
      $jenjang = $this->input->post('jenjang');
      $jurusan = $this->input->post('jurusan');
      $jmlh = $this->input->post('jmlh');
      $data = array(
            'id_kelas' => $id_kelas,
            'jenjang' => $jenjang,
            'jurusan' => $jurusan,
            'jmlh' => $jmlh
      );
      $this->Kelas_m->editDataKelas($data, $id_kelas);
      $this->session->set_flashdata('success','diedit');
      redirect('kelas');
    }
  }

}


