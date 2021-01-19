<?php
defined('BASEPATH') OR exit('No direct script access allowed !');

Class Produk_c extends MY_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Kategori_m');
        $this->load->model('Toko_m');
        $this->load->model('Produk_m');
    }

    /** Halaman data product */
    public function index(){
        /* Data yang akan dikirim ke view */
        $this->pageData = array(
            'title'  => 'Data Toko | Rembang Expo',
            'assets' => array('datatables', 'sweetalert2', 'func_confirm'),
            'dataToko' => $this->Toko_m->getSemuaToko()
        ); 

        /* View file */
        $this->page = "admin/data_toko_v";

        /* Call function layout dari MY_Controller Class */
        $this->admin_layout();
    }

    /** Halaman tampil produk berdasar toko */
        public function dataProdukonToko($encoded_toko_id){
            /* Data yang akan dikirim ke view */
            $this->pageData = array(
                'title'  => 'Data Toko | Rembang Expo',
                'assets' => array('datatables', 'sweetalert2', 'func_confirm'),
                'tokoID' => $encoded_toko_id,
                'namaToko' => $this->Toko_m->getTokoOnID(base64_decode(urldecode($encoded_toko_id))),
                'dataProduk' => $this->Produk_m->getProdukOnToko(base64_decode(urldecode($encoded_toko_id)))
            ); 

            /* View file */
            $this->page = "admin/data_produk_on_toko_v";

            /* Call function layout dari MY_Controller Class */
            $this->admin_layout();
        }

    /** Halaman tambah produk */
        public function tambahProduk($encoded_toko_id){
            $this->pageData = array(
                'title'  => 'Data Toko | Rembang Expo',
                'assets' => array('sweetalert2', 'tambah_prd_page'),
                'tokoID' => $encoded_toko_id
            ); 
            $this->page = "admin/tambah_produk_v";
            $this->admin_layout();
        }

    /** Halaman edit produk */
        public function editProduk($encoded_prd_id){
            $this->pageData = array(
                'title'  => 'Edit Produk | Rembang Expo',
                'assets' => array('sweetalert2', 'tambah_prd_page'),
                'dataPrd' => $this->Produk_m->getProdukOnID(base64_decode(urldecode($encoded_prd_id)))
            ); 
            $this->page = "admin/edit_produk_v";
            $this->admin_layout();
        }
    
    /** Detail Produk */
        public function detailProduk($encoded_toko_id, $encoded_prd_id){
            /* Data yang akan dikirim ke view */
            $this->pageData = array(
                'title'  => 'Detail Produk | Rembang Expo',
                'assets' => array(),
                'tokoID' => $encoded_toko_id,
                'namaToko' => $this->Toko_m->getTokoOnID(base64_decode(urldecode($encoded_toko_id))),
                'detailProduk' => $this->Produk_m->getProdukOnID(base64_decode(urldecode($encoded_prd_id)))
            ); 

            /* View file */
            $this->page = "admin/detail_produk_on_toko_v";

            /* Call function layout dari MY_Controller Class */
            $this->admin_layout();
        }

    /** Proses tambah produk */
        function tambahProdukProses(){
            /** Load lib dan helper untuk upload */
              $this->load->helper('file');
              $this->load->library('upload');

            /** Simpan data post dari form */
            $dataPost = array(
                'prd_nama' => $this->input->post('postPrdNama'),
                'prd_harga' => $this->input->post('postPrdHarga'),
                'prd_deskripsi' => $this->input->post('postPrdDeskripsi'),
                'toko_id_fk' => base64_decode(urldecode($this->input->post('postPrdTokoID'))),
                'prd_thumbnail' => NULL
            );

            /** Cek form upload logo */
            if(!empty($_FILES['postPrdFoto']['name'])){
                /* Prepare config tambahan */
                    $config['upload_path']   = 'assets/expo_img/product_img/'; // Path folder untuk upload file
                    $config['allowed_types'] = 'jpeg|jpg|png|bmp|svg'; // Allowed types 
                    $config['max_size']      = '2048'; // Max size in KiloBytes
                    $config['encrypt_name']  = TRUE; // Encrypt nama file ketika diupload
                
                /** Initialize config upload */
                    $this->upload->initialize($config);

                /* Upload proses dan Simpan file ke database */
                    $upload = $this->upload->do_upload('postPrdFoto');
                    if($upload){
                        /* Get data upload file */
                        $uploadData = $this->upload->data();
                        $dataPost['prd_thumbnail'] = $config['upload_path'].$uploadData['file_name'];
                    } else {
                        $error    = 'failedUploadFile';
                        $errorMsg = $this->upload->display_errors();
                    }
            }

            /** Proses input ke database */
            if(isset($error) && $error == 'failedUploadFile'){
                $this->session->set_flashdata('flashStatus', 'failedInsert');
                $this->session->set_flashdata('flashMsg', 'Gagal menambahkan data produk baru ,'.$errorMsg.' !');
            } else {
                $resultInput = $this->Produk_m->insertProduk($dataPost);
                if($resultInput > 0){
                    $this->session->set_flashdata('flashStatus', 'successInsert');
                    $this->session->set_flashdata('flashMsg', 'Berhasil menambahkan data produk baru !');
                } else {
                    unlink($dataPost['prd_thumbnail']);
                    $this->session->set_flashdata('flashStatus', 'failedInsert');
                    $this->session->set_flashdata('flashMsg', 'Gagal menambahkan data produk baru !');
                }
            }
            $this->session->set_flashdata('flashRedirect', 'Produk_c/dataProdukonToko/'.$this->input->post('postPrdTokoID').'/');
  
            redirect('Produk_c/tambahProduk/'.$this->input->post('postPrdTokoID'));
        }

    /** Proses edit Produk */
        function editProdukProses(){
            /** Get id produk */
            $prdID = base64_decode(urldecode($this->input->post('postPrdID')));

            /** Simpan data post dari form */
            $dataPost = array(
                'prd_nama' => $this->input->post('postPrdNama'),
                'prd_harga' => $this->input->post('postPrdHarga'),
                'prd_deskripsi' => $this->input->post('postPrdDeskripsi'),
                'toko_id_fk' => base64_decode(urldecode($this->input->post('postPrdTokoID')))
            );


            /* Cek foto baru */
            if(empty($_FILES['postPrdFoto']['name'])){
                $updatePrd = $this->Produk_m->updateProduk($dataPost, $prdID);
            } else {
                /** Load lib dan helper untuk upload */
                $this->load->helper('file');
                $this->load->library('upload');

                /* Prepare config tambahan */
                $config['upload_path']   = 'assets/expo_img/store_img/'; // Path folder untuk upload file
                $config['allowed_types'] = 'jpeg|jpg|png|bmp|svg'; // Allowed types 
                $config['max_size']      = '2048'; // Max size in KiloBytes
                $config['encrypt_name']  = TRUE; // Encrypt nama file ketika diupload
            
                /** Initialize config upload */
                $this->upload->initialize($config);

                /* Upload proses dan Simpan file ke database */
                $upload = $this->upload->do_upload('postPrdFoto');
                if($upload){
                    /* Get data upload file */
                    $uploadData = $this->upload->data();

                /* Delete last logo */
                    if(!empty($this->input->post('postOldPrdFoto'))){
                        unlink($this->input->post('postOldPrdFoto'));
                    }

                /* Set new update logo */
                    $dataPost['prd_thumbnail'] = $config['upload_path'].$uploadData['file_name'];
                    $updatePrd = $this->Produk_m->updateProduk($dataPost, $prdID);
                } else {
                    //$this->upload->display_errors();
                        $error    = 'failedUploadFile';
                        $errorMsg = $this->upload->display_errors();
                }
            }

            /** Proses input ke database */
              if(isset($error) && $error == 'failedUploadFile'){
                    $this->session->set_flashdata('flashStatus', 'failedUpdate');
                    $this->session->set_flashdata('flashMsg', 'Gagal mengubah data produk ,'.$errorMsg.' !');
              } else {
                if($updatePrd > 0){
                  $this->session->set_flashdata('flashStatus', 'successUpdate');
                  $this->session->set_flashdata('flashMsg', 'Berhasil mengubah data produk !');
                } else {
                  $this->session->set_flashdata('flashStatus', 'failedUpdate');
                  $this->session->set_flashdata('flashMsg', 'Gagal mengubah data produk !');
                }
              }
              $this->session->set_flashdata('flashRedirect', 'Toko_c');
      
              redirect('Produk_c/editProduk/'.$this->input->post('postPrdID'));
            
        }

    /** Proses hapuss data produk */
        function hapusProdukProses($encoded_toko_id){
            $prdID = base64_decode(urldecode($this->input->post("postID")));
            $resultDel = $this->Produk_m->deleteProduk($prdID);
            if($resultDel > 0){
              echo 'successDelete';
            } else {
              echo 'failedDelete';
            }
        }

}