<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class User extends REST_Controller{
    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->model('Model_User');
        $this->load->database();
    }

    function index_get(){
        $user = $this->get('username');
        $pass = $this->get('password');

        if($user == '' && $pass == ''){
            $data = $this->Model_User->getAllUser();
        }else{
            $data = $this->Model_User->getUsername($user,$pass);
        }

        $this->response($data,200);
    }

    function index_post(){
        $data = array(
            'id_user' => $this->post('id_user'),
            'username' => $this->post('username'),
            'password' => $this->post('password'),
            'nama' => $this->post('nama'),
            'tanggal_lahir' => 'null',
            'status' => 'user'
        );

        $insert = $this->Model_User->insertUser($data);
        if($insert){
    		$this->response($data,200);
    	}else{
    		$this->response(array('status' => 'fail', 502));
    	}
    }

    function index_put(){
        $id = $this->put('id_user');
        $data = array(
            'id_user' => $this->put('id_user'),
            'username' => $this->put('username'),
            'password' => $this->put('password'),
            'nama' => $this->put('nama'),
            'tanggal_lahir' => $this->put('tanggal_lahir'),
            'status' => 'user'
        );
        $update = $this->Model_User->updateUser($id,$data);
        if($update){
    		$this->response($data,200);
    	}else{
    		$this->response(array('status'=>'fail',502));
        }
    }

    function index_delete(){
        $id = $this->delete('id_user');
        $delete = $this->Model_User->deleteUser($id);
    	if($delete){
    		$this->response(array('status' => 'succes'),201);
    	}else{
    		$this->response(array('status' => 'fail'),502);
    	}
    }


}


?>