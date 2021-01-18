<?php 
defined('BASEPATH') OR exit ('No direct script access allowed');

Class Kategori_m extends CI_Model {

  /* Declare Table */
  	var $tb = 'tb_kategori';
  	var $f  = array(
  		'0' => 'ktgr_id',
  		'1' => 'ktgr_nama'
  	);

  /* Insert */
  	function insertKategori($data){
  		$resultInsert = $this->db->insert($this->tb, $data);
  		return $resultInsert;
	  }
	  
  /* Select semua data */
	function getSemuaKategori(){
		$resultSelect = $this->db->get($this->tb);
		return $resultSelect->result_array();
	}

  /* Update data kategori on ID */
	function updateKategori($data, $id){
		$this->db->set($data);
		$this->db->where($this->f['0'], $id);
		$resultUpdate = $this->db->update($this->tb);
		return $resultUpdate;
	}

  /* Delete data kategori on ID */
	function deleteKategori($id){
		$resultDelete = $this->db->delete($this->tb, array($this->f[0] => $id));
		return $resultDelete;
	}
}