<?php 
defined('BASEPATH') OR exit ('No direct script access allowed');

Class Toko_m extends CI_Model {

  /* Declare Table */
  	var $tb = 'tb_toko';
  	var $f  = array(
  		'0' => 'toko_id',
  		'1' => 'toko_nama',
  		'2' => 'kategori_id_fk',
  		'3' => 'toko_owner',
  		'4' => 'toko_kontak',
  		'5' => 'toko_alamat',
  		'6' => 'toko_logo'
  	);

  /* Insert */
  	function insertToko($data){
  		$resultInsert = $this->db->insert($this->tb, $data);
  		return $resultInsert;
	  }
	  
  /* Select semua data */
	function getSemuaToko(){
		$this->db->select('ttb.*, ktb.ktgr_nama');
		$this->db->from($this->tb.' as ttb');
		$this->db->join('tb_kategori as ktb', 'ktb.ktgr_id=ttb.'.$this->f[2]);
		$resultSelect = $this->db->get();
		return $resultSelect->result_array();
	}
	  
  /* Select data toko berdasar kategori */
	function getTokoOnKategori($ktgr_id){
		$this->db->where($this->f[2], $ktgr_id);
		$resultSelect = $this->db->get($this->tb);
		return $resultSelect->result_array();
	}
	  
  /* Select data toko berdasar ID */
	function getTokoOnID($toko_id){
		$this->db->select('ttb.*, ktb.ktgr_nama');
		$this->db->from($this->tb.' as ttb');
		$this->db->join('tb_kategori as ktb', 'ktb.ktgr_id=ttb.'.$this->f[2]);
		$this->db->where($this->f[0], $toko_id);
		$resultSelect = $this->db->get();
		return $resultSelect->result_array();
	}

  /* Update data Toko on ID */
	function updateToko($data, $id){
		$this->db->set($data);
		$this->db->where($this->f['0'], $id);
		$resultUpdate = $this->db->update($this->tb);
		return $resultUpdate;
	}

  /* Delete data toko on ID */
	function deleteToko($id){
		$resultDelete = $this->db->delete($this->tb, array($this->f[0] => $id));
		return $resultDelete;
	}
}