<?php
defined('BASEPATH') OR exit('No direct script access allowed !');

Class Stream_c extends MY_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Stream_m');
    }

    /** Halaman data livestream */
    public function index(){
        /* Data yang akan dikirim ke view */
        $this->pageData = array(
            'title'  => 'Data Stream | Rembang Expo',
            'assets' => array('datatables', 'sweetalert2', 'func_confirm', 'stream_page'),
            'dataStream' => $this->Stream_m->getSemuaStream()
        ); 

        /* View file */
        $this->page = "admin/data_stream_v";

        /* Call function layout dari MY_Controller Class */
        $this->admin_layout();
    }

    /** Halaman tambah Stream */
        public function tambahStream(){
            $this->pageData = array(
                'title'  => 'Data Stream | Rembang Expo',
                'assets' => array('sweetalert2', 'tambah_stream_page')
            ); 
            $this->page = "admin/tambah_stream_v";
            $this->admin_layout();
        }

    /** Proses tambah produk */
        function tambahStreamProses(){
            /** Load lib dan helper untuk upload */
              $this->load->helper('file');
              $this->load->library('upload');

            /** Simpan data post dari form */
            $dataPost = array(
                'str_judul' => $this->input->post('postStrJudul'),
                'str_jadwal' => $this->input->post('postStrJadwal'),
                'str_jadwal_jam' => $this->input->post('postStrJadwalJam'),
                'str_link' => $this->input->post('postStrLink'),
                'str_banner' => NULL
            );

            /** Cek form upload logo */
            if(!empty($_FILES['postStrBanner']['name'])){
                /* Prepare config tambahan */
                    $config['upload_path']   = 'assets/expo_img/stream_img/'; // Path folder untuk upload file
                    $config['allowed_types'] = 'jpeg|jpg|png|bmp|svg'; // Allowed types 
                    $config['max_size']      = '2048'; // Max size in KiloBytes
                    $config['encrypt_name']  = TRUE; // Encrypt nama file ketika diupload
                
                /** Initialize config upload */
                    $this->upload->initialize($config);

                /* Upload proses dan Simpan file ke database */
                    $upload = $this->upload->do_upload('postStrBanner');
                    if($upload){
                        /* Get data upload file */
                        $uploadData = $this->upload->data();
                        $dataPost['str_banner'] = $config['upload_path'].$uploadData['file_name'];
                    } else {
                        $error    = 'failedUploadFile';
                        $errorMsg = $this->upload->display_errors();
                    }
            }

            /** Proses input ke database */
            if(isset($error) && $error == 'failedUploadFile'){
                $this->session->set_flashdata('flashStatus', 'failedInsert');
                $this->session->set_flashdata('flashMsg', 'Gagal menambahkan data live stream,'.$errorMsg.' !');
            } else {
                $resultInput = $this->Stream_m->insertStream($dataPost);
                if($resultInput > 0){
                    $this->session->set_flashdata('flashStatus', 'successInsert');
                    $this->session->set_flashdata('flashMsg', 'Berhasil menambahkan data live stream !');
                } else {
                    unlink($dataPost['prd_thumbnail']);
                    $this->session->set_flashdata('flashStatus', 'failedInsert');
                    $this->session->set_flashdata('flashMsg', 'Gagal menambahkan data live stream !');
                }
            }
            $this->session->set_flashdata('flashRedirect', 'Stream_c');
  
            redirect('Stream_c/tambahStream/');
        }

    /** Proses edit stream */
        function editStreamProses(){
            $strID = base64_decode(urldecode($this->input->post("postStrID")));
            $dataPost = array(
                'str_judul' => $this->input->post("postStrJudul"),
                'str_link' => $this->input->post("postStrLink"),
                'str_jadwal' => $this->input->post("postStrJadwal"),
                'str_jadwal_jam' => $this->input->post("postStrJadwalJam")
            );
            /* Cek foto baru */
            if(empty($_FILES['postStrBanner']['name'])){
                $updateStr = $this->Stream_m->updateStream($dataPost, $strID);
            } else {
                /** Load lib dan helper untuk upload */
                $this->load->helper('file');
                $this->load->library('upload');

                /* Prepare config tambahan */
                $config['upload_path']   = 'assets/expo_img/stream_img/'; // Path folder untuk upload file
                $config['allowed_types'] = 'jpeg|jpg|png|bmp|svg'; // Allowed types 
                $config['max_size']      = '2048'; // Max size in KiloBytes
                $config['encrypt_name']  = TRUE; // Encrypt nama file ketika diupload
            
                /** Initialize config upload */
                $this->upload->initialize($config);

                /* Upload proses dan Simpan file ke database */
                $upload = $this->upload->do_upload('postStrBanner');
                if($upload){
                    /* Get data upload file */
                    $uploadData = $this->upload->data();

                /* Delete last logo */
                    if(!empty($this->input->post('postOldBanner'))){
                        unlink($this->input->post('postOldBanner'));
                    }

                /* Set new update logo */
                    $dataPost['str_banner'] = $config['upload_path'].$uploadData['file_name'];
                    $updateStr = $this->Stream_m->updateStream($dataPost, $strID);
                } else {
                    //$this->upload->display_errors();
                        $error    = 'failedUploadFile';
                        $errorMsg = $this->upload->display_errors();
                }
            }

            /** Proses input ke database */
              if(isset($error) && $error == 'failedUploadFile'){
                    $this->session->set_flashdata('flashStatus', 'failedUpdate');
                    $this->session->set_flashdata('flashMsg', 'Gagal mengubah data live stream ,'.$errorMsg.' !');
              } else {
                if($updateStr > 0){
                  $this->session->set_flashdata('flashStatus', 'successUpdate');
                  $this->session->set_flashdata('flashMsg', 'Berhasil mengubah data live stream !');
                } else {
                  $this->session->set_flashdata('flashStatus', 'failedUpdate');
                  $this->session->set_flashdata('flashMsg', 'Gagal mengubah data live stream !');
                }
              }
            
            redirect('Stream_c/');
        }

    /** Proses hapuss data stream */
        function hapusStreamProses(){
            $strID = base64_decode(urldecode($this->input->post("postID")));
            $resultDel = $this->Stream_m->deleteStream($strID);
            if($resultDel > 0){
              echo 'successDelete';
            } else {
              echo 'failedDelete';
            }
        }
}