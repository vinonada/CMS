<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Caraousel extends CI_Controller {
    
    public function __construct(){
        parent:: __construct();
        if($this->session->userdata('level')!="admin"){
            redirect('auth');
        }
    }
    public function index(){
       $this->db->from('caraousel');
        $caraousel = $this->db->get()->result_array();
        //echo "Selamat Datang di Toko Buku Dongeng";
       // $this->db->from('kontenn');
        //$this->db->order_by('tanggal', 'DESC');
        //$contents = $this->db->get()->result_array();
        $data = array(
            'judul_halaman' => 'Halaman caraousel',
            'caraousel' => $caraousel,
            
        );
       //$data['caraousels'] = $this->_model->get_all_konten();
        //var_dump($data->judul);
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('caraousel', $data);
        $this->load->view('template/japa');
        //$this->load->view('template/footer');
   }

    function tambah(){
        $this->db->from('kategori');
        $this->db->order_by('nama_kategori', 'ASC');
        $kategori = $this->db->get()->result_array();

        $data = array(
         'judul_halaman' => 'Halaman Tambah Konten',
            'kategori' => $kategori
            
        );

        $this->load->view('template/header');
        $this->load->view('tambah_konten', $data);
        $this->load->view('template/japa');
    }

    function simpan(){
        $judul = $this->input->post('judul');
        
        $foto = $_FILES['foto']['name'];
        if ($foto = ''){}else{
            $namafoto = date('YmdHis').'jpg';
            $config ['upload_path'] = './tema/assets/images/caraousel';
            $config ['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['file_name'] = $namafoto;

            $this->load->library('upload', $config);
            if(!$this->upload->do_upload('foto')){
                echo "Gambar gagal diupload";
            } else {
                $foto = $this->upload->data('file_name');
            }
        }

        $data = array(
            'judul' => $judul,
            
            'foto' => $foto
        );
        $this->db->insert('caraousel', $data);
        //$this->Konten_model->add_contents($data, 'kontenn');
        redirect('caraousel');
       // $this->db->insert('kontenn',$data);
        //redirect('konten');
    }

    function hapus($id_caraousel){
       
        $this->Caraousel_model->delete_caraousel($id_caraousel);
        redirect(site_url('caraousel'));
    }


    function edit($id_konten){
        $this->load->model('Konten_model');
        $data['konten'] = $this->Konten_model->get_konten_by_id($id_kkonten);
        $this->load->view('edit_konten', $data);
    }
    function update(){
        $this->Konten_model->update_konten();
        redirect(site_url('konten'));
    }
    
    }
