<?php 
defined('BASEPATH') OR exit ('No direct script access allowed');

Class Produk_m extends CI_Model {

  /* Declare Table */
  	var $tb = 'tb_produk';
  	var $f  = array(
  		'0' => 'prd_id',
  		'1' => 'prd_nama',
  		'2' => 'toko_id_fk',
  		'3' => 'prd_harga',
  		'4' => 'prd_deskripsi',
  		'5' => 'prd_thumbanil'
  	);

  /* Insert */
  	function insertProduk($data){
  		$resultInsert = $this->db->insert($this->tb, $data);
  		return $resultInsert;
	  }
	  
  /* Select semua data berdasar toko */
	function getProdukOnToko(){
		$this->db->select('ptb.*, ttb.toko_nama');
		$this->db->from($this->tb.' as ptb');
		$this->db->join('tb_toko as ttb', 'ttb.toko_id=ptb.'.$this->f[2]);
		$resultSelect = $this->db->get();
		return $resultSelect->result_array();
	}
	  
  /* Select data produk berdasar ID */
	function getProdukOnID($prd_id){
		$this->db->where($this->f[0], $prd_id);
		$resultSelect = $this->db->get($this->tb);
		return $resultSelect->result_array();
	}

  /* Update data Produk on ID */
	function updateProduk($data, $id){
		$this->db->set($data);
		$this->db->where($this->f['0'], $id);
		$resultUpdate = $this->db->update($this->tb);
		return $resultUpdate;
	}

  /* Delete data produk on ID */
	function deleteProduk($id){
		$resultDelete = $this->db->delete($this->tb, array($this->f[0] => $id));
		return $resultDelete;
	}
}