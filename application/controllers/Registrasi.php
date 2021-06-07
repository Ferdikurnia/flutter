<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrasi extends CI_Controller
{
  function __construct()
  {
    parent:: __construct();
  }

  public function index() {
    $this->load->view('template/header_v');
    $this->load->view('registrasi/registrasi');
    $this->load->view('template/footer_v');
  }

}
