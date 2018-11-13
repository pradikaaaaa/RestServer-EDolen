<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class KategoriWisata extends REST_Controller{
    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->model('model_kategoriwisata');
        $this->load->database();
    }

    function index_get(){
        $id = $this->get('id_kategori');

        if($id == ''){
            $data = $this->model_kategoriwisata->getAllKategori();
        }else{
            $data = $this->model_kategoriwisata->getAllKategoribyId($id);
        }
        $this->response($data,200);   
    }


    function index_post(){
        $data = array(
            'id_kategori' => $this->post('id_kategori'),
            'kategori_wisata' => $this->post('kategori_wisata'));
        $insert = $this->model_kategoriwisata->insertKategori($data);
        if($insert){
            $this->response($data,200);
        }else{
            $this->response(array('status' => 'fail', 502));
        }
    }


    function index_put(){
        $id = $this->put('id_kategori');
        $data = array(
            'id_kategori' => $this->put('id_kategori'),
            'kategori_wisata' => $this->put('kategori_wisata'));

       
        $update = $this->model_kategoriwisata->updateKategori($id,$data);

        if($update){
    		$this->response($data,200);
    	}else{
    		$this->response(array('status'=>'fail',502));
        }
    }

    function index_delete(){
        $id = $this->delete('id_kategori');
        $delete = $this->model_kategoriwisata->deletekategori($id);
    	if($delete){
    		$this->response(array('status' => 'succes'),201);
    	}else{
    		$this->response(array('status' => 'fail'),502);
    	}
    }

}

?>