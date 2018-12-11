<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class Admin extends CI_Controller {

        public function __construct()
        {
            parent::__construct();
            $this->load->helper('url','form');
            $this->load->library('form_validation');
        }

        public function index()
        {
            $this->load->view('admin/index');
        }

        public function data_server()
        {
            $this->load->library('Datatables');
            $this->datatables
                    ->select('nama_wisata , alamat, deskripsi, longitude, latitude, image')
                    ->from('tbl_wisata');
                    echo $this->datatables->generate();
        }



    }

    /* End of file Admin.php */



?>