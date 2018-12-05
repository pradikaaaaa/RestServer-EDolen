<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    require APPPATH . '/libraries/REST_Controller.php';
    use Restserver\Libraries\REST_Controller;

    class Register extends REST_Controller {

        function __construct($config = 'rest') {
            parent::__construct($config);
            $this->load->database();
        }

        public function index_post()
        {
            $data = array(
                'username'          => $this->post('username'),
                'password'          => $this->post('password'),
                'nama'              => $this->post('nama'),
                'tanggal_lahir'     => $this->post('tanggal_lahir'),
                'status'            => $this->post('status'));
                $insert = $this->db->insert('tbl_user', $data);
                if ($insert) {
                    $this->response($data, 200);
                } else {
                    $this->response(array('status' => 'fail', 502));
            }
        }

        public function index_put()
        {
            $id_user = $this->put('id_user');
            $data = array(
                'username'          => $this->put('username'),
                'password'          => $this->put('password'),
                'nama'              => $this->put('nama'),
                'tanggal_lahir'     => $this->put('tanggal_lahir'),
                'status'            => $this->put('status'));
                $this->db->where('id_user', $id_user);
                $update = $this->db->update('tbl_user', $data);
                if ($update) {
                    $this->response($data, 200);
                } else {
                    $this->response(array('status' => 'fail', 502));
            }
        }

    }

    /* End of file Register.php */

?>