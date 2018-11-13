<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Model_KategoriWisata extends CI_Model{
    public function __construct(){
		parent::__construct();
    }
    
    public function getAllKategori(){
        return $this->db->get('tbl_kategori')->result();
    }

    public function getAllKategoribyId($id){
        $this->db->where('id_kategori',$id);
        $data = $this->db->get('tbl_kategori');
        return $data->result();
    }

    public function insertKategori($data){
        $insert = $this->db->insert('tbl_kategori',$data);
        return $insert;
    }

    public function updateKategori($id,$data){
        $this->db->where('id_kategori',$id);
        $update = $this->db->update('tbl_kategori',$data);
        return $update;
    }

    public function deleteKategori($id){
        $this->db->where('id_kategori',$id);
        $delete = $this->db->delete('tbl_kategori');
        return $delete;
    }

}
  
?>