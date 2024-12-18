<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Kategori extends CI_Controller {
    
public function __construct(){
        parent:: __construct();
        if($this->session->userdata('level')!="admin"){
            redirect('auth');
        }
    }
    public function index(){
        //echo "Selamat Datang di Toko Buku Dongeng";
       $data['categories'] = $this->Kategori_model->get_all_kategori();
        //var_dump($data->judul);
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('kategori', $data);
        $this->load->view('template/japa');
   }

    function simpan(){
        $this->db->from('kategori');
        $this->db->where('nama_kategori', $this->input->post('nama_kategori'));
        $cek = $this->db->get()->result_array();
        if($cek<>NULL){
            $this->session->set_flashdata('alert', '
                <div class="alert alert-danger" role="alert">
                Kategori sudah digunakan
                </div>
                ');
                redirect(site_url('kategori'));
        }
        $this->Kategori_model->add_categories();
            $this->session->set_flashdata('alert', '
            <div class="alert alert-info" role="alert">
            yey berhasil disimpan
            </div>
            ');
            redirect(site_url('kategori'));
        //$this->buku_model->simpan_data();
        //return redirect('')
       
        //var_dump($this->input->post());
    }

    function hapus($id_kategori){
        $this->load->model('Kategori_model');
        $this->Kategori_model->delete_kategori($id_kategori);
        redirect(site_url('kategori'));
    }


    function edit($id_kategori){
        $this->load->model('Kategori_model');
        $data['kategori'] = $this->Kategori_model->get_kategori_by_id($id_kategori);
        $this->load->view('edit_kategori', $data);
    }
    function update(){
        $this->Kategori_model->update_kategori();
        redirect(site_url('kategori'));
    }
    
    }
