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

        public function update(){
        $this->load->helper('url','form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('judul','Judul','trim|required');
        
        $this->load->model('post_model');
        $isi['review']=$this->post_model->getReview($id);
        
        if($this->form_validation->run() == FALSE) {
            $this->load->view('user/updatereview',$isi);
        } else {
                //$data = array('upload_data' => $this->upload->data());
                $this->post_model->updateReview($id);
                $this->load->view('user/review_sukses');
            }
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