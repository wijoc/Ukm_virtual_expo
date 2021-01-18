<?php
defined('BASEPATH') OR exit('No direct script access allowed !');

Class Toko_c extends MY_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Kategori_m');
        $this->load->model('Toko_m');
    }

    /** Halaman data toko semua kategori */
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

    /** Halaman Tambah Toko */
        public function tambahToko(){
            $this->pageData = array(
                'title'  => 'Tambah Toko | Rembang Expo',
                'assets' => array('sweetalert2', 'tambah_toko_page'),
                'dataKategori' => $this->Kategori_m->getSemuaKategori()
            ); 
            $this->page = "admin/tambah_toko_v";
            $this->admin_layout();
        }

    /** HalamanEdit data toko */
      function editToko($encoded_id){
        $tokoID = base64_decode(urldecode($encoded_id));
        $this->pageData = array(
            'title'  => 'Edit Toko | Rembang Expo',
            'assets' => array('sweetalert2', 'tambah_toko_page'),
            'dataKategori' => $this->Kategori_m->getSemuaKategori(),
            'dataTokoID' => $this->Toko_m->getTokoOnID($tokoID)
        ); 
        $this->page = "admin/edit_toko_v";
        $this->admin_layout();
      }

    /** Proses tambah toko */
        function tambahTokoProses(){
          /** Load lib dan helper untuk upload */
            $this->load->helper('file');
            $this->load->library('upload');

          /** Simpan data post dari form ke variable */
            $dataPost = array(
                'toko_nama'     => $this->input->post('postTokoNama') ,
                'toko_owner'    => $this->input->post('postTokoOwner') ,
                'kategori_id_fk'    => base64_decode(urldecode($this->input->post('postTokoKategori'))) ,
                'toko_alamat'   => $this->input->post('postTokoAlamat') ,
                'toko_kontak'   => $this->input->post('postTokoKontak'),
                'toko_logo'     => NULL
            );

          /** Cek form upload logo */
            if(!empty($_FILES['postTokoLogo']['name'])){
              /* Prepare config tambahan */
                $config['upload_path']   = 'assets/expo_img/store_img/'; // Path folder untuk upload file
                $config['allowed_types'] = 'jpeg|jpg|png|bmp|svg'; // Allowed types 
                $config['max_size']      = '2048'; // Max size in KiloBytes
                $config['encrypt_name']  = TRUE; // Encrypt nama file ketika diupload
            
              /** Initialize config upload */
                $this->upload->initialize($config);

              /* Upload proses dan Simpan file ke database */
                $upload = $this->upload->do_upload('postTokoLogo');
                if($upload){
                    /* Get data upload file */
                      $uploadData = $this->upload->data();
                      $dataPost['toko_logo'] = $config['upload_path'].$uploadData['file_name'];
                } else {
                      $error    = 'failedUploadFile';
                      $errorMsg = $this->upload->display_errors();
                }
            }
        
          /** Proses input ke database */
            if(isset($error) && $error == 'failedUploadFile'){
                $this->session->set_flashdata('flashStatus', 'failedInsert');
                $this->session->set_flashdata('flashMsg', 'Gagal menambahkan data toko baru ,'.$errorMsg.' !');
            } else {
                $resultInput = $this->Toko_m->insertToko($dataPost);
                if($resultInput > 0){
                    $this->session->set_flashdata('flashStatus', 'successInsert');
                    $this->session->set_flashdata('flashMsg', 'Berhasil menambahkan data toko baru !');
                } else {
                    unlink($dataPost['toko_logo']);
                    $this->session->set_flashdata('flashStatus', 'failedInsert');
                    $this->session->set_flashdata('flashMsg', 'Gagal menambahkan data toko baru !');
                }
            }
            $this->session->set_flashdata('flashRedirect', 'Toko_c');
  
            redirect('Toko_c/tambahToko');
        }
      
    /** Proses edit toko */
      function editTokoProses(){
        /* Get id Toko */
          $tokoID = base64_decode(urldecode($this->input->post('postTokoID')));

        /* Get data POST */
          $dataPost = array(
            'toko_nama'     => $this->input->post('postTokoNama') ,
            'toko_owner'    => $this->input->post('postTokoOwner') ,
            'kategori_id_fk'    => base64_decode(urldecode($this->input->post('postTokoKategori'))) ,
            'toko_alamat'   => $this->input->post('postTokoAlamat') ,
            'toko_kontak'   => $this->input->post('postTokoKontak')
          );

        /* Cek logo baru */
          if(empty($_FILES['postTokoLogo']['name'])){
            $updateToko = $this->Toko_m->updateToko($dataPost, $tokoID);
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
              $upload = $this->upload->do_upload('postTokoLogo');
              if($upload){
                /* Get data upload file */
                  $uploadData = $this->upload->data();

              /* Delete last logo */
                if(!empty($this->input->post('postOldTokoLogo'))){
                  unlink($this->input->post('postOldTokoLogo'));
                }

              /* Set new update logo */
                $dataPost['toko_logo'] = $config['upload_path'].$uploadData['file_name'];
                $updateToko = $this->Toko_m->updateToko($dataPost, $tokoID);
              } else {
                    $error    = 'failedUploadFile';
                    $errorMsg = $this->upload->display_errors();
              }
          }
        
        /** Proses input ke database */
          if(isset($error) && $error == 'failedUploadFile'){
                $this->session->set_flashdata('flashStatus', 'failedUpdate');
                $this->session->set_flashdata('flashMsg', 'Gagal mengubah data toko ,'.$errorMsg.' !');
          } else {
            if($updateToko > 0){
              $this->session->set_flashdata('flashStatus', 'successUpdate');
              $this->session->set_flashdata('flashMsg', 'Berhasil mengubah data toko !');
            } else {
              $this->session->set_flashdata('flashStatus', 'failedUpdate');
              $this->session->set_flashdata('flashMsg', 'Gagal mengubah data toko !');
            }
          }
          $this->session->set_flashdata('flashRedirect', 'Toko_c');
  
          redirect('Toko_c/editToko/'.$this->input->post('postTokoID'));
        
      }

    /** Hapus data toko */
      function hapusTokoProses(){
        $tokoID = base64_decode(urldecode($this->input->post("postID")));
        $resultDel = $this->Toko_m->deleteToko($tokoID);
        if($resultDel > 0){
          echo 'successDelete';
        } else {
          echo 'failedDelete';
        }
      }
}