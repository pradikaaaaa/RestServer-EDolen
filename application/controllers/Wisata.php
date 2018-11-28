<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    require APPPATH . '/libraries/REST_Controller.php';
    use Restserver\Libraries\REST_Controller;

    class Wisata extends REST_Controller {

        function __construct($config = 'rest') {
            parent::__construct($config);
            $this->load->database();
        }

        public function index_get()
        {
            $this->db->select('*');
            $this->db->from('tbl_wisata');
            $query = $this->db->get()->result();
            $this->response($query, 200);
        }

        public function index_post()
        {
            $kategori = $this->input->post('id_kategori');
            $this->db->select('*');
            $this->db->from('tbl_wisata as w');
            $this->db->join('tbl_kategori as k', 'w.id_kategori = k.id_kategori');
            $this->db->where('w.id_kategori',$kategori);
            $query = $this->db->get()->result();
            $this->response($query, 200);
        }


    }

    /* End of file Wisata.php */

?>