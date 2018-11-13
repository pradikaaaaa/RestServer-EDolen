<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Wisata extends CI_Model{
    public function __construct(){
		parent::__construct();
    }
    
    public function getDetailWisata($id){
        $this->db->select('id_wisata, nama_wisata, kategori_wisata, alamat,deskripsi, image, longitude, latitude');
        $this->db->from('tbl_wisata');
        $this->db->join('tbl_kategori','tbl_wisata.id_kategori = tbl_kategori.id_kategori','inner');
        $this->db->where('id_wisata',$id);
        $data = $this->db->get();

        return $data->result();
    }

    public function getAllWisata(){
        $this->db->from('tbl_wisata');
        $data = $this->db->get();

        return $data->result();
    }

    public function getAllWisatabyKategori($id){
        $this->db->select('id_wisata, nama_wisata, id_kategori, image');
        $this->db->from('tbl_wisata');
        $this->db->where('id_kategori',$id);
        $data = $this->db->get();

        return $data->result();
    }




}

?>