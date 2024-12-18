<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends CI_Controller {
      
    public function index(){
        //echo "Selamat Datang di Toko Buku Dongeng";
       // $this->load->model('Buku_Model');
        //$data['books'] = $this->Buku_Model->get_all_buku();
        //var_dump($data->judul);
       // $this->load->view('template/header');
        $this->load->view('login');
        //$this->load->view('template/japa');
    
        }
     
        function logiin(){
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $this->db->from('user')->where('username', $username);
            $user = $this->db->get()->row();
            if($user==NULL){
                $this->session->set_flashdata('alert', '
                <div class="alert alert-info" role="alert">
                Username tidak ada
                </div>
                ');
                redirect('auth');
            } else if($user->password==$password){
                $data = array(
                    'username' => $user->username,
                    'nama' => $user->nama,
                    'level' => $user->level,
                    'id_user' => $user->id_user, 
                );
                $this->session->set_userdata($data);
                
                // Redirect berdasarkan level
                if ($user->level == 'admin') {
                    redirect('home');
                } elseif ($user->level == 'user') {
                    redirect('welcome');
                } else {
                    redirect('auth'); // Default jika level tidak valid
                }

            } else {
                $this->session->set_flashdata('alert', '
                <div class="alert alert-info" role="alert">
                Password salah
                </div>
                ');
                redirect('auth');
            }
        }

        function logout(){
            $this->session->sess_destroy();
            redirect('auth');
        }

        function registrasi(){
            $this->load->view('registrasi');
        }
        
        function simpan(){
            //$this->buku_model->simpan_data();
            //return redirect('');
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('nama', 'Nama', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('registrasi');
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
                    redirect(site_url('auth'));
                }
                $this->User_Model->add_users();
                $this->session->set_flashdata('alert', '
                <div class="alert alert-info" role="alert">
                yey berhasil disimpan
                </div>
                ');
                redirect(site_url('auth'));
    
            }
            //var_dump($this->input->post());
        }

        function kirim(){
            $this->form_validation->set_rules('nama', 'Nama Anda', 'required');
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
          //  $this->form_validation->set_rules('alamat', 'Alamat', 'required');
            //$this->form_validation->set_rules('no_telp', 'No Telepon', 'required');
            $this->form_validation->set_rules('level', 'user', 'required');
            if($this->form_validation->run() == FALSE){
                $this->load->view('registrasi');
            } else {
                $this->load->model('User_Model');
                $this->User_Model->add_users();
                redirect(site_url('auth'));
            }
        }
    
}