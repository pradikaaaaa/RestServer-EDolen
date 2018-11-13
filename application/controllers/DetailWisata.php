<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class DetailWisata extends REST_Controller{
    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->model('Model_Wisata');
        $this->load->database();
    }

    function index_get(){
        $id = $this->get('id_wisata');
        $data = $this->Model_Wisata->getDetailWisata($id);
        $this->response($data,200);
    }


}
?>