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
            $data = array(
                'nama_wisata'       => $this->post('nama_wisata'),
                'id_kategori'       => $this->post('id_kategori'),
                'alamat'            => $this->post('alamat'),
                'deskripsi'         => $this->post('deskripsi'),
                'longitude'         => $this->post('longitude'),
                'latitude'          => $this->post('latitude'),
                'image'             => $this->post('image'));
                $insert = $this->db->insert('tbl_wisata', $data);
                if ($insert) {
                    $this->response($data, 200);
                } else {
                    $this->response(array('status' => 'fail', 502));
            }
        }

        public function kategori_post()
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