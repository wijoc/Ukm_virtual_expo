<?php 
defined('BASEPATH') OR exit('No direct script access allowed !');

class Crud_c extends MY_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('Crud_m'); // Load Model Crud_m
	}

	public function index(){
	  /* Data yang akan dikirim ke view */
		$this->pageData = array(
			'title'  => 'Starter | CRUD',
			'assets' => array()
		); 

      /* View file */
        $this->page = "crud/index_crud_v";

      /* Call function layout dari MY_Controller Class */
        $this->layout();
	}

  /* Function : Halaman Form Insert */
	public function createPage(){
		$this->pageData = array(
			'title'  => 'CRUD | Create',
			'assets' => array()
		);
		$this->page = 'crud/create_crud_v';
		$this->layout();
	}

  /* Function : Proses Insert dari form ke Database */
	function createProses(){
	  /* Ambil value post dari form */
	  	$postData = array(
	  		'crud_field_1' => $this->input->post('postField1'),
	  		'crud_field_2' => $this->input->post('postField2')
	  	);

	  /* Pas array post ke model */
	  	$inputData = $this->Crud_m->insertCrud($postData);

	  /* return & redirect */
		/* Set session untuk alert */
	   	if($inputData > 0){
	   		$this->session->set_flashdata('flashStatus', 'sucessInsert');
	   		$this->session->set_flashdata('flashMsg', 'Pesan success');
	   	} else {
	   		$this->session->set_flashdata('flashStatus', 'failedInsert');
	   		$this->session->set_flashdata('flashMsg', 'Pesan failed');
	   	}

	   	/* Redirect */
	   	redirect('Crud_c/createPage');
	}
}