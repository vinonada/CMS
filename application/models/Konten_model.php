<?php
class Konten_model extends CI_Model{
    //function simpan_data(){
        //$data = array(
            //'judul' => $this->input->post('judul'),
            //'deskripsi' => $this->input->post('deskripsi')
        //);
        //$this->db->insert('buku', $data);
    //}
    public function get_all_konten(){
        $query = $this->db->get('kontenn');
        return $query->result();  
    }

    function add_contents($data, $table){
        $this->db->insert($table, $data);
    }

    function delete_konten($id_konten){
        $this->db->where('id_konten', $id_konten);
        $this->db->delete('kontenn');
    }

    function get_konten_by_id($id_konten){
        $this->db->where('id_konten', $id_konten);
        $data = $this->db->get('kontenn');
        return $data->row();
    }

    function update_konten() {
        $id_konten = $this->input->post('id_konten'); // Ambil id konten
        $namafoto_lama = $this->input->post('nama_foto'); // Nama file lama
    
        // Konfigurasi upload
        $config['upload_path'] = './tema/assets/images/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['file_name'] = time() . "_" . $_FILES['foto']['name'];
        $config['overwrite'] = true;
    
        $this->load->library('upload', $config);
    
        $file_name = $namafoto_lama; // Default: gunakan foto lama
    
        // Proses upload jika ada file baru
        if (!empty($_FILES['foto']['name'])) {
            if ($this->upload->do_upload('foto')) {
                $upload_data = $this->upload->data();
                $file_name = $upload_data['file_name'];
    
                // Hapus file lama jika berhasil upload baru
                if (file_exists('./tema/assets/images/' . $namafoto_lama)) {
                    unlink('./tema/assets/images/' . $namafoto_lama);
                }
            } else {
                // Log error upload
                echo "Upload Gagal: " . $this->upload->display_errors();
                exit;
            }
        }
    
        // Data yang akan diupdate
        $data = array(
            'judul' => $this->input->post('judul'),
            'id_kategori' => $this->input->post('id_kategori'),
            'isi_konten' => $this->input->post('isi_konten'),
            'tanggal' => $this->input->post('tanggal'),
            'audio' => $this->input->post('audio'),
            'foto' => $file_name, // Update dengan foto baru
            'ost' => $this->input->post('ost'),
            'slug' => trim(strtolower(preg_replace('/[^a-zA-Z0-9]+/', '-', $this->input->post('judul'))), '-')
        );
    
        // Update berdasarkan id_konten
        $this->db->where('id_konten', $id_konten);
        if ($this->db->update('kontenn', $data)) {
            echo "Data berhasil diupdate!";
        } else {
            echo "Gagal mengupdate data!";
        }
    }
    
    function add_video($data, $table){
        $this->db->insert($table, $data);
    }

    function delete_video($id_video){
        $this->db->where('id_video', $id_video);
        $this->db->delete('video');
    }

    function get_video_by_id($id_video){
        $this->db->where('id_video', $id_video);
        $data = $this->db->get('video');
        return $data->row();
    }

    function update_video() {
        $id_video = $this->input->post('id_video'); // Ambil id konten
        $namafoto_lama = $this->input->post('nama_foto'); // Nama file lama
    
        // Konfigurasi upload
        $config['upload_path'] = './tema/assets/images/video/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['file_name'] = time() . "_" . $_FILES['foto']['name'];
        $config['overwrite'] = true;
    
        $this->load->library('upload', $config);
    
        $file_name = $namafoto_lama; // Default: gunakan foto lama
    
        // Proses upload jika ada file baru
        if (!empty($_FILES['foto']['name'])) {
            if ($this->upload->do_upload('foto')) {
                $upload_data = $this->upload->data();
                $file_name = $upload_data['file_name'];
    
                // Hapus file lama jika berhasil upload baru
                if (file_exists('./tema/assets/images/video/' . $namafoto_lama)) {
                    unlink('./tema/assets/images/video/' . $namafoto_lama);
                }
            } else {
                // Log error upload
                echo "Upload Gagal: " . $this->upload->display_errors();
                exit;
            }
        }
    
        // Data yang akan diupdate
        $data = array(
            'judul' => $this->input->post('judul'),
           
            'foto' => $file_name, // Update dengan foto baru
            'url' => $this->input->post('url'),
            
        );
    
        // Update berdasarkan id_konten
        $this->db->where('id_video', $id_video);
        if ($this->db->update('video', $data)) {
            echo "Data berhasil diupdate!";
        } else {
            echo "Gagal mengupdate data!";
        }
    }
}