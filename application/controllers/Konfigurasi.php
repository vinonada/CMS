<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Konfigurasi extends CI_Controller {
    public function __construct(){
        parent:: __construct();
        if($this->session->userdata('level')!="admin"){
            redirect('auth');
        }
    }   

    public function index(){
      $this->db->from('konfigurasi');
      $konfig = $this->db->get()->row();
      $data = array(
        'judul_halaman' => 'Halaman Konfigurasi',
        'konfig' => $konfig
      );
      //  $data = array (
        //    'title' => 'Dashboard Admin',
          //  'judul' => 'Dashboard Admin'
        //);
    //echo "Selamat Datang di Toko Buku Dongeng";
   // $this->load->model('Buku_Model');
    //$data['books'] = $this->Buku_Model->get_all_buku();
    //var_dump($data->judul);
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('konfigurasi', $data);
   // $this->load->view('template/footer');
    $this->load->view('template/japa');

    }

    function update(){
      $this->Konfigurasi_model->update();
      redirect(site_url('konfigurasi'));
    }
  }

