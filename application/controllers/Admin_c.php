<?php
defined('BASEPATH') OR exit('No Direct script access allowed !');

Class Admin_c extends MY_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Kategori_m');
    }

	public function index(){
        /* Data yang akan dikirim ke view */
          $this->pageData = array(
              'title'  => 'Admin | Rembang Expo',
              'assets' => array()
          ); 
  
        /* View file */
          $this->page = "admin/dashboard_v";
  
        /* Call function layout dari MY_Controller Class */
          $this->admin_layout();
      }

    public function dataKategori(){
        $this->pageData = array(
                'title'  => 'Tambah Kategori | Rembang Expo',
                'assets' => array(),
                'dataKategori' => $this->Kategori_m->getSemuaKategori()
        ); 
        
        $this->page = "admin/data_kategori_v";
        $this->admin_layout();
    }

    function tambahKategoriProses(){
        /* Simpan data yang dikirim dari form */
            $dataPost = array(
                'ktgr_nama' => $this->input->post('postKtgrNama')
            );

        /* Kirim ke model untuk simpan ke database */
            $resultInput = $this->Kategori_m->insertKategori($dataPost);

        /* Redirect 
            if($resultInput > 0){
                
            }*/

            redirect('Admin_c/dataKategori');

            //print("<pre>".print_r($dataPost, true)."</pre>");
    }

    function editKategoriProses(){
        /* set kategori id */
            $ktgrID = base64_decode(urldecode($this->input->post('postEditKtgrID')));

        /* simpan data dari form */
            $dataPost = array(
                'ktgr_nama' => $this->input->post('postEditKtgrNama')
            );

        /* Kirim ke model untuk simpan ke database */
            $resultEdit = $this->Kategori_m->updateKategori($dataPost, $ktgrID);

        /* Redirect 
            if($resultInput > 0){
                
            }*/

            redirect('Admin_c/dataKategori');
    }

    function hapusKategori($encodedID){
        $ktgrID = base64_decode(urldecode($encodedID));
        $resultDel = $this->Kategori_m->deleteKategori($ktgrID);
        redirect('Admin_c/dataKategori');
    }
}