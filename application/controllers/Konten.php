<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Konten extends CI_Controller {
    
    public function __construct(){
        parent:: __construct();
        if($this->session->userdata('level')!='admin'){
            redirect('auth');
        }
    }   
    public function index(){
       $this->db->from('kategori');
        $this->db->order_by('nama_kategori', 'ASC');
        $kategori = $this->db->get()->result_array();
       
        $this->db->from('kontenn a');
        $this->db->join('kategori b', 'a.id_kategori=b.id_kategori');
       // $this->db->join('user c', 'a.username=c.username', 'left');
        $this->db->order_by('tanggal', 'DESC');
        $kontenn = $this->db->get()->result_array();

        //$this->db->order_by('tanggal', 'DESC');
        //$kontenn = $this->db->get('kontenn')->result_array();
        $data = array(
            'judul_halaman' => 'Halaman Konten',
            'kategori' => $kategori,
            'kontenn' => $kontenn
        );
      // $data['contents'] = $this->Konten_model->get_all_konten();
        //var_dump($data->judul);
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('konten', $data);
        $this->load->view('template/japa');
   }

    function tambah(){
        $this->db->from('kategori');
        $this->db->order_by('nama_kategori', 'ASC');
        $kategori = $this->db->get()->result_array();

        $data = array(
         'judul_halaman' => 'Halaman Tambah Konten',
            'kategori' => $kategori
            
        );

       // $this->load->view('template/header');
        $this->load->view('tambah_konten', $data);
       // $this->load->view('template/japa');
    }

    function simpan() {
        $judul = $this->input->post('judul');
        $isi_konten = $this->input->post('isi_konten');
        $id_kategori = $this->input->post('id_kategori');
        $tanggal = $this->input->post('tanggal');
    
        // Proses upload foto
        $foto = $_FILES['foto']['name'];
        if (!empty($foto)) {
            $namafoto = date('YmdHis') . '.jpg';
            $config['upload_path'] = './tema/assets/images/';
            $config['allowed_types'] = 'png|jpg|jpeg|gif';
            $config['file_name'] = $namafoto;
    
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('foto')) {
                echo "Gambar gagal diupload";
            } else {
                $foto = $this->upload->data('file_name');
            }
        }

        $audio_url = $this->input->post('audio_url');
        $ost = $this->input->post('ost');
        // Proses upload audio
    $audio = $_FILES['audio']['name'];
    if (!empty($audio)) {
        $namaaudio = date('YmdHis') . '.mp3'; // Nama file unik
        $config_audio['upload_path']   = './tema/assets/audio/'; // Folder penyimpanan audio
        $config_audio['allowed_types'] = 'mp3|ogg|wav';
        $config_audio['file_name']     = $namaaudio;

        $this->upload->initialize($config_audio); // Konfigurasi ulang upload
        if (!$this->upload->do_upload('audio')) {
            echo "Audio gagal diupload";
        } else {
            $audio = $this->upload->data('file_name'); // Ambil nama file audio
        }
    }
      
        // Data yang akan disimpan ke database
        $data = array(
            'judul' => $judul,
            'id_kategori' => $id_kategori,
            'isi_konten' => $isi_konten,
            'tanggal' => $tanggal,
            'foto' => $foto,
            'audio_url' => $audio_url, // Simpan URL audio di kolom audio
            'audio'       => isset($audio) ? $audio : null, // Simpan nama file audio
            'ost' => $ost,
            'slug' => strtolower(preg_replace('/[^a-zA-Z0-9äöüß]+/', '-', $this->input->post('judul'))),
        );
    
        // Simpan data ke database
        $this->Konten_model->add_contents($data, 'kontenn');
        redirect('konten');
    }
    

    function hapus($id_konten){
        $this->load->model('Konten_model');
        $this->Konten_model->delete_konten($id_konten);
        redirect(site_url('konten'));
    }


    function edit($id_konten){
        $this->db->from('kategori');
        $this->db->order_by('nama_kategori', 'ASC');
        $kategori = $this->db->get()->result_array();

        $this->db->from('kontenn');
        $this->db->where('id_konten', $id_konten);
        $kontenn = $this->db->get()->row();
        //$this->db->where('id_konten', $id_konten);
        //$konten = $this->db->get('kontenn');
        //return $data->row();

        $data = array(
            
              'kategori' => $kategori,
               'kontenn' => $kontenn
               
           );

        //$this->load->model('Konten_model');
        //$data['konten'] = $this->Konten_model->get_konten_by_id($id_konten);
        $this->load->view('edit_konten', $data);
    }

    function update(){
        $this->Konten_model->update_konten();
        redirect(site_url('konten'));
    }

    
    }
