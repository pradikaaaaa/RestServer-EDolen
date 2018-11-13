<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_User extends CI_Model{
    public function __construct(){
		parent::__construct();
    }

    function getUsername($user,$pass){
        $this->db->from('tbl_user');
        $this->db->where('username',$user);
        $this->db->where('password',$pass);

        $data = $this->db->get();
        return $data->result();

    }

    function getAllUser(){
        $this->db->from('tbl_user');
        $data = $this->db->get();
        return $data->result();
    }

    function insertUser($data){
        $insert = $this->db->insert('tbl_user',$data);
        return $insert;
    }

    public function updateUser($id,$data){
        $this->db->where('id_user',$id);
        $update = $this->db->update('tbl_user',$data);
        return $update;
    }

    public function deleteUser($id){
        $this->db->where('id_user',$id);
        $delete = $this->db->delete('tbl_user');
        return $delete;
    }


}

?>