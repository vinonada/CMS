<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Video extends CI_Controller {
    
    public function __construct(){
        parent:: __construct();
        //if($this->session->userdata('level')==NULL){
          //  redirect('auth');
       // }
    }   
    public function index(){
        $this->db->from('kategori');
        $this->db->order_by('nama_kategori', 'ASC');
        $kategori = $this->db->get()->result_array();
       
        $this->db->from('video d');
        $this->db->join('kategori b', 'd.id_kategori=b.id_kategori');
       // $this->db->join('user c', 'a.username=c.username', 'left');
       // $this->db->order_by('tanggal', 'DESC');
        $video = $this->db->get()->result_array();
      //$this->db->from('video');
//$this->db->order_by('nama_kategori', 'ASC');
       //$video = $this->db->get()->result_array();
       
        //$this->db->order_by('tanggal', 'DESC');
        //$kontenn = $this->db->get('kontenn')->result_array();
        $data = array(
           'judul_halaman' => 'Halaman Konten',
           'kategori' => $kategori,
            'video' => $video,
        );
       //$data['contents'] = $this->Konten_model->get_all_konten();
        //var_dump($data->judul);
        $this->load->view('template/header');
        $this->load->view('template/sidebar'); 
        $this->load->view('video', $data);
        $this->load->view('template/japa');
        
  }

   public function tampil($id_video){
    $this->db->from('konfigurasi');
    $konfig = $this->db->get()->row();

    $this->db->from('kategori');
    $kategori = $this->db->get()->result_array();

    $this->db->from('video');
    $this->db->where('id_video', $id_video);
    $video = $this->db->get()->result_array();
    // Mengirimkan data ke view
   $data = array(
        'video'    => $video,
        'konfig' => $konfig,
        'kategori' => $kategori
        
    );

    // Load view dengan data yang dikirimkan
    $this->load->view('video_index', $data);
}

    function tambah(){
       $this->db->from('kategori');
        $this->db->order_by('nama_kategori', 'ASC');
        $kategori = $this->db->get()->result_array();

       $data = array(
       //  'judul_halaman' => 'Halaman Tambah Konten',
            'kategori' => $kategori
            
        );

       // $this->load->view('template/header');
        $this->load->view('tambah_video', $data);
       // $this->load->view('template/japa');
    }

    function simpan() {
        $judul = $this->input->post('judul');
       // $isi_konten = $this->input->post('isi_konten');
       // $id_kategori = $this->input->post('id_kategori');
       // $tanggal = $this->input->post('tanggal');
    
        // Proses upload foto
        $foto = $_FILES['foto']['name'];
        if (!empty($foto)) {
            $namafoto = date('YmdHis') . '.jpg';
            $config['upload_path'] = './tema/assets/images/video/';
            $config['allowed_types'] = 'png|jpg|jpeg|gif';
            $config['file_name'] = $namafoto;
    
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('foto')) {
                echo "Gambar gagal diupload";
            } else {
                $foto = $this->upload->data('file_name');
            }
        }

        $url = $this->input->post('url');
        $id_kategori = $this->input->post('id_kategori');
       // $ost = $this->input->post('ost');
    
        // Data yang akan disimpan ke database
        $data = array(
            'judul' => $judul,
            'foto' => $foto,
            'url' => $url, // Simpan URL audio di kolom audio
            'id_kategori' => $id_kategori
           // 'slug' => strtolower(preg_replace('/[^a-zA-Z0-9äöüß]+/', '-', $this->input->post('judul'))),
        );
    
        // Simpan data ke database
        $this->Konten_model->add_video($data, 'video');
        redirect('video');
    }
    

    function hapus($id_video){
        $this->load->model('Konten_model');
        $this->Konten_model->delete_video($id_video);
        redirect(site_url('video'));
    }


    function edit($id_video){
        $this->db->from('kategori');
        $this->db->order_by('nama_kategori', 'ASC');
        $kategori = $this->db->get()->result_array();

        $this->db->from('video');
        $this->db->where('id_video', $id_video);
        $video = $this->db->get()->row();
        //$this->db->where('id_konten', $id_konten);
        //$konten = $this->db->get('kontenn');
        //return $data->row();

        $data = array(
            
              'kategori' => $kategori,
               'video' => $video
               
           );

        //$this->load->model('Konten_model');
        //$data['konten'] = $this->Konten_model->get_konten_by_id($id_konten);
        $this->load->view('edit_video', $data);
    }

    function update(){
        $this->Konten_model->update_video();
        redirect(site_url('video'));
    }

    
    }
