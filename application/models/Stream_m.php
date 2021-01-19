<?php 
defined('BASEPATH') OR exit ('No direct script access allowed');

Class Stream_m extends CI_Model {

  /* Declare Table */
  	var $tb = 'tb_stream';
  	var $f  = array(
  		'0' => 'str_id',
  		'1' => 'str_judul',
  		'2' => 'str_link',
        '3' => 'str_jadwal',
        '4' => 'str_jadwal_jam',
        '5' => 'str_banner'
  	);

  /* Insert */
  	function insertStream($data){
  		$resultInsert = $this->db->insert($this->tb, $data);
  		return $resultInsert;
	  }
	  
  /* Select semua data stream */
	function getSemuaStream(){
		$this->db->order_by($this->f[3], 'DESC');
		$resultSelect = $this->db->get($this->tb);
		return $resultSelect->result_array();
	}
	  
  /* Select data stream hari ini */
	function getTodayStream($day){
		$this->db->where($this->f[3], $day);
		$resultSelect = $this->db->get($this->tb);
		return $resultSelect->result_array();
	}
	  
  /* Select data stream sebelumnya */
	function getPastStream(){
		$this->db->where($this->f[3].' < DATE(NOW())');
		$resultSelect = $this->db->get($this->tb);
		return $resultSelect->result_array();
	}
	  
  /* Select data stream selanjutnya */
	function getNextStream(){
		$this->db->where($this->f[3].' > DATE(NOW())');
		$resultSelect = $this->db->get($this->tb);
		return $resultSelect->result_array();
	}

  /* Update data Stream on ID */
	function updateStream($data, $id){
		$this->db->set($data);
		$this->db->where($this->f['0'], $id);
		$resultUpdate = $this->db->update($this->tb);
		return $resultUpdate;
	}

  /* Delete data Stream on ID */
	function deleteStream($id){
		$resultDelete = $this->db->delete($this->tb, array($this->f[0] => $id));
		return $resultDelete;
	}
}