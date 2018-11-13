<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Wisata extends REST_Controller{
    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->model('Model_Wisata');
        $this->load->database();
    }

    function index_get(){
        $id = $this->get('id_kategori');
        if($id == ''){
            $data = $this->Model_Wisata->getAllWisata();
        }else{
            $data = $this->Model_Wisata->getAllWisatabyKategori($id);
        }

        $this->response($data,200);
    }

    function index_post(){
        $data = array(
            'id_wisata' => $this->post('id_wisata'),
            'nama_wisata' => $this->post('nama_wisata'),
            'id_kategori' => $this->post('id_kategori'),
            'alamat' => $this->post('alamat'),
            'deskripsi' => $this->post('deskripsi'),
            'longitude' => $this->post('longitude'),
            'latitude' => $this->post('latitude'),
            'image' => $this->post('image')
        );
    }

}
?>