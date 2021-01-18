<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Visitor_c extends MY_Controller {

	public function __construct(){
		parent::__construct();
        $this->load->model('Kategori_m');
        $this->load->model('Toko_m');
        $this->load->model('Produk_m');
	}

	public function index(){
		$this->pageData['title'] = 'Rembang Expo';
		$this->page = "visitor/home_content";
		$this->visitor_layout();
	}

	public function expoCategoryPage(){
		$this->pageData = array(
			'title'  => 'Pameran | Rembang Expo',
			'assets' => array(),
			'dataKategori' => $this->Kategori_m->getSemuaKategori()
		); 
		$this->page = "visitor/pameran_content";
		$this->visitor_layout();
	}

	public function expoCategoryStore($encoded_ktgr_id){
		$this->pageData = array(
			'title'  => 'Pameran | Rembang Expo',
			'assets' => array(),
			'dataToko' => $this->Toko_m->getTokoOnKategori(base64_decode(urldecode($encoded_ktgr_id)))
		); 
		$this->page = "visitor/store_list_content";
		$this->visitor_layout();
	}

	public function streamListPage(){
		$this->pageData['title'] = 'Stream | Rembang Expo';
		$this->page = "visitor/stream_content";
		$this->visitor_layout();
	}

	public function storeListPage(){
		$this->pageData['title'] = 'Toko | Rembang Expo';
		$this->page = "visitor/store_list_content";
		$this->visitor_layout();
	}

	public function productListPage($encoded_toko_id){
		$this->pageData = array(
			'title'  => 'Produk | Rembang Expo',
			'assets' => array(),
			'idToko' => $encoded_toko_id,
			'dataToko' => $this->Toko_m->getTokoOnID(base64_decode(urldecode($encoded_toko_id))),
			'dataProduk' => $this->Produk_m->getProdukOnToko(base64_decode(urldecode($encoded_toko_id)))
		); 
		$this->page = "visitor/product_list_content";
		$this->visitor_layout();
	}

	public function productDetailPage($encoded_toko_id, $encoded_prd_id){
		$this->pageData = array(
			'title' => 'Produk | Rembang Expo',
			'idToko' => $encoded_toko_id,
			'dataToko' => $this->Toko_m->getTokoOnID(base64_decode(urldecode($encoded_toko_id))),
			'tigaProduk' => $this->Produk_m->getTigaProdukOnToko(base64_decode(urldecode($encoded_toko_id))),
			'detailProduk' => $this->Produk_m->getProdukOnID(base64_decode(urldecode($encoded_prd_id)))
		);
		$this->page = "visitor/product_detail_content";
		$this->visitor_layout();
	}
}
