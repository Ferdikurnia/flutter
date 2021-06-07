<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller
{
  function __construct()
  {
    parent:: __construct();
    $this->load->model('Siswa_m');
    
  }

  public function index() {

    $data['Siswa'] = $this->Siswa_m->getAllSiswa('siswa','kelas','siswa.id_kelas=kelas.id_kelas');
    $this->load->view('template/header_v');
    $this->load->view('siswa/siswa', $data);
    $this->load->view('template/footer_v');
  }

  public function tambah_siswa() {
    $this->form_validation->set_rules('nis','Nis','required');
    $this->form_validation->set_rules('nama','Nama','required');
    $this->form_validation->set_rules('jenis_kelamin','Jenis_kelamin','required');
    $this->form_validation->set_rules('tempat_lahir','Tempat_lahir','required');
    $this->form_validation->set_rules('tgl_lahir','Tgl_lahir','required');
    $this->form_validation->set_rules('alamat','Alamat','required');
  
    if($this->form_validation->run() == FALSE){
      $this->load->view('template/header_v');
      $this->load->view('siswa/siswa', $data);
      $this->load->view('template/footer_v');
    }else{
      $this->Siswa_m->tambahDataSiswa(); 
      $this->session->set_flashdata('success','Ditambahkan');
      redirect('Siswa');
    }
  }
  
  public function hapus_siswa($id) {
    $this->Siswa_m->hapusDataSiswa($id);
    $this->session->set_flashdata('success','dihapus');
    redirect('Siswa');
  }

  public function edit_siswa()
  {
    $this->form_validation->set_rules('id_siswa','Id_siswa','required');
    $this->form_validation->set_rules('nis','Nis','required');
    $this->form_validation->set_rules('nama','Nama','required');
    $this->form_validation->set_rules('jenis_kelamin','Jenis_kelamin','required');
    $this->form_validation->set_rules('tempat_lahir','Tempat_lahir','required');
    $this->form_validation->set_rules('tgl_lahir','Tgl_lahir','required');
    $this->form_validation->set_rules('alamat','Alamat','required');
  
    if ($this->form_validation->run() == FALSE) {
      $this->load->view('template/header_v');
      $this->load->view('siswa/siswa');
      $this->load->view('template/footer_v');
    }else{
      $id_siswa = $this->input->post('id_siswa');
      $nis = $this->input->post('nis');
      $nama = $this->input->post('nama');
      $jenis_kelamin = $this->input->post('jenis_kelamin');
      $tempat_lahir = $this->input->post('tempat_lahir');
      $tgl_lahir = $this->input->post('tgl_lahir');
      $alamat = $this->input->post('alamat');
      $data = array(
            'id_siswa' => $id_siswa,
            'nis' => $nis,
            'nama' => $nama,
            'jenis_kelamin' => $jenis_kelamin,
            'tempat_lahir' => $tempat_lahir,
            'tgl_lahir' => $tgl_lahir,
            'alamat' => $alamat,
      );
      $this->Siswa_m->editDataSiswa($data, $id_siswa);
      $this->session->set_flashdata('success','diedit');
      redirect('siswa');
    }
  }

}


