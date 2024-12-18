<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Beranda extends CI_Controller {
   
    public function __construct(){
        parent:: __construct();
        if($this->session->userdata('level')!='user'){
            redirect('auth');
        }
    } 

     
        public function tambah_komentar() {
            $id_konten = $this->input->post('id_konten');  // Mendapatkan ID konten dari form
           // $username = $this->input->post('username');            // Nama pengirim komentar
            $isi_komen = $this->input->post('isi_komen');    // Isi komentar
        
            // Simpan komentar ke database
            $data = array(
                
                'id_konten'    => $id_konten,
                'id_user' => $this->session->userdata('id'),
                //'username'         => $username,
                'isi_komen' => $isi_komen,
                'tanggal'      => date('Y-m-d H:i:s'),
            );
        
            // Insert komentar
            $this->db->insert('komen', $data);
        
            // Dapatkan slug dari id_konten
            $slug = $this->get_slug_by_id($id_konten);
        
            // Redirect ke halaman artikel dengan slug yang benar
            redirect('welcome/artikel/' . $slug);
        }
        
        // Fungsi untuk mendapatkan slug berdasarkan id_konten
        public function get_slug_by_id($id_konten) {
            $this->db->from('kontenn');
            $this->db->where('id_konten', $id_konten);
            $konten = $this->db->get()->row();
            return $konten->slug;  // Mengembalikan slug artikel
        }
        
}
