<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Wisata extends REST_Controller{
    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->model('model_wisata');
        $this->load->database();
    }

    function index_get(){
        $id = $this->get('id_kategori');
        if($id == ''){
            $data = $this->model_wisata->getAllWisata();
        }else{
            $data = $this->model_wisata->getAllWisatabyKategori($id);
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

        $insert = $this->model_wisata->insertWisata($data);
        if($insert){
    		$this->response($data,200);
    	}else{
    		$this->response(array('status' => 'fail', 502));
    	}
    }

    function index_put(){
        $id = $this->put('id_wisata');
        $data = array(
            'id_wisata' => $this->put('id_wisata'),
            'nama_wisata' => $this->put('nama_wisata'),
            'id_kategori' => $this->put('id_kategori'),
            'alamat' => $this->put('alamat'),
            'deskripsi' => $this->put('deskripsi'),
            'longitude' => $this->put('longitude'),
            'latitude' => $this->put('latitude'),
            'image' => $this->put('image')
        );
        $update = $this->model_wisata->updateWisata($id,$data);
        if($update){
    		$this->response($data,200);
    	}else{
    		$this->response(array('status'=>'fail',502));
    	}
    }

    function index_delete(){
        $id = $this->delete('id_wisata');
        $this->db->where('id_wisata',$id);
        $delete = $this->model_wisata->deleteWisata($id);
        if($delete){
    		$this->response(array('status' => 'succes'),201);
    	}else{
    		$this->response(array('status' => 'fail'),502);
    	}
    }

}
?>