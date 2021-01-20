<?php 
defined('BASEPATH') OR exit ('No direct script access allowed');

Class Auth_m extends CI_Model {

    protected $tb = 'tb_user';
    protected $f  = array(
        '0' => 'user_id',
        '1' => 'user_name',
        '2' => 'user_username',
        '3' => 'user_password',
        '4' => 'user_level'
    );

    function getUser($username){
        $this->db->where($this->f[2], $username);
        $resultSelect = $this->db->get($this->tb);
        return $resultSelect->result_array();
    }
}