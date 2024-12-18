<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller {
    public function __construct(){
        parent:: __construct();
        if($this->session->userdata('level')!="admin"){
            redirect('auth');
        }
    }   

    public function index(){
        $data = array (
            'title' => 'Dashboard Admin',
            'judul' => 'Dashboard Admin'
        );
    //echo "Selamat Datang di Toko Buku Dongeng";
   // $this->load->model('Buku_Model');
    //$data['books'] = $this->Buku_Model->get_all_buku();
    //var_dump($data->judul);
    $this->load->view('template/header', $data);
    $this->load->view('template/sidebar');
    $this->load->view('sample');
    $this->load->view('template/footer');
    $this->load->view('template/japa');

    }


}