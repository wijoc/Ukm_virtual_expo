<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {

	public function index(){
		$this->pageData['title'] = 'Page Title';
		$this->page = "sample_content";
		$this->admin_layout();
	}

	public function homePage(){
		$this->pageData['title'] = 'Rembang Expo';
		$this->page = "visitor/home_content";
		$this->visitor_layout();
	}

	public function expoCategoryPage(){
		$this->pageData['title'] = 'Pameran | Rembang Expo';
		$this->page = "visitor/pameran_content";
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

	public function productListPage(){
		$this->pageData['title'] = 'Produk | Rembang Expo';
		$this->page = "visitor/product_list_content";
		$this->visitor_layout();
	}

	public function productDetailPage(){
		$this->pageData['title'] = 'Produk | Rembang Expo';
		$this->page = "visitor/product_detail_content";
		$this->visitor_layout();
	}
}
