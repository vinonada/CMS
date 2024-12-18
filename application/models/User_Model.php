<?php
class User_Model extends CI_Model{
    //function simpan_data(){
        //$data = array(
            //'judul' => $this->input->post('judul'),
            //'deskripsi' => $this->input->post('deskripsi')
        //);
        //$this->db->insert('buku', $data);
    //}
    public function get_all_user(){
        $query = $this->db->get('user');
        return $query->result();  
    }

    function add_users(){
        $this->db->insert('user', $this->input->post());
    }

    function delete_user($id_user){
        $this->db->where('id_user', $id_user);
        $this->db->delete('user');
    }

    function get_user_by_id($id_user){
        $this->db->where('id_user', $id_user);
        $data = $this->db->get('user');
        return $data->row();
    }

    function update_user(){
        $data = array(
            'username' => $this->input->post('username'),
            'nama' => $this->input->post('nama'),
            'password' => $this->input->post('password'),
            'level' => $this->input->post('level')
        );
        $this->db->where('id_user', $this->input->post('id_user'));
        $this->db->update('user', $data);
    }
  
}