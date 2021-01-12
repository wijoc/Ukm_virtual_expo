<?php 
defined('BASEPATH') OR exit ('No direct script access allowed');

Class Crud_m extends CI_Model {

  /* Declare Table */
  	var $tb = 'tb_crud';
  	var $f  = array(
  		'0' => 'crud_id',
  		'1' => 'crud_field_1',
  		'2' => 'crud_field_2'
  	);

  /* Insert */
  	function insertCrud($data){
  		$resultInsert = $this->db->insert($this->tb, $data);
  		return $resultInsert;
  	}
}