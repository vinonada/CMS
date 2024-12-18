<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller {
    
public function __construct(){
        parent:: __construct();
        if($this->session->userdata('level')<>'admin'){
            redirect('auth');
        }
    }
    public function index(){
       
        //echo "Selamat Datang di Toko Buku Dongeng";
       $data['users'] = $this->User_Model->get_all_user();
        //var_dump($data->judul);
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('user', $data);
        $this->load->view('template/japa');
   }

   function user1(){
    $data['users'] = $this->User_Model->get_all_user();

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('user', $data);
        $this->load->view('template/japa');
    }

    function tambah(){
        //$this->load->view('template/header');
        $this->load->view('tambah_user');
        //$this->load->view('template/japa');
    }

    function simpan(){
        //$this->buku_model->simpan_data();
        //return redirect('');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('level', 'Level', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('tambah_user');
        } else {
            //echo "berhasil";
            $this->load->model('User_Model');
            $username = $this->input->post('username');
            $this->db->from('user');
            $this->db->where('username', $username);
            $cek = $this->db->get()->result_array();
            if($cek<>NULL){
                $this->session->set_flashdata('alert', '
                <div class="alert alert-danger" role="alert">
                Username sudah digunakan
                </div>
                ');
                redirect(site_url('user'));
            }
            $this->User_Model->add_users();
            $this->session->set_flashdata('alert', '
            <div class="alert alert-info" role="alert">
            yey berhasil disimpan
            </div>
            ');
            redirect(site_url('user'));

        }
        //var_dump($this->input->post());
    }

    function hapus($id_user){
        $this->load->model('User_Model');
        $this->User_Model->delete_user($id_user);
        redirect(site_url('user'));
    }


    function edit($id_user){
        $this->load->model('User_Model');
        $data['user'] = $this->User_Model->get_user_by_id($id_user);
        $this->load->view('edit_user', $data);
    }
    function update(){
        $this->load->model('User_Model');
        $this->User_Model->update_user();
        redirect(site_url('user'));
    }
    
    }
