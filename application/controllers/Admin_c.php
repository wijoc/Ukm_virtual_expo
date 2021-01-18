<?php
defined('BASEPATH') OR exit('No Direct script access allowed !');

Class Admin_c extends MY_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Kategori_m');
    }

    /** Halaman Dashboard admin */
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

    /** CRUD Data Kategori */
      /** Tampil data kategori */
        public function dataKategori(){
            $this->pageData = array(
                    'title'  => 'Tambah Kategori | Rembang Expo',
                    'assets' => array('datatables', 'sweetalert2', 'func_confirm'),
                    'dataKategori' => $this->Kategori_m->getSemuaKategori()
            ); 
            
            $this->page = "admin/data_kategori_v";
            $this->admin_layout();
        }

      /** Tambah data kategori */
        function tambahKategoriProses(){
            /* Simpan data yang dikirim dari form */
                $dataPost = array(
                    'ktgr_nama' => $this->input->post('postKtgrNama')
                );

            /* Kirim ke model untuk simpan ke database */
                $resultInput = $this->Kategori_m->insertKategori($dataPost);

            /** Redirect */ 
                if($resultInput > 0){
                    $this->session->set_flashdata('flashStatus', 'successInsert');
                    $this->session->set_flashdata('flashMsg', 'Berhasil menambahkan kategori baru !');
                } else {
                    $this->session->set_flashdata('flashStatus', 'failedInsert');
                    $this->session->set_flashdata('flashMsg', 'Gagal menambahkan kategori baru !');
                }

                redirect('Admin_c/dataKategori');
        }

      /** Edit data kategori */
        function editKategoriProses(){
            /* set kategori id */
                $ktgrID = base64_decode(urldecode($this->input->post('postEditKtgrID')));

            /* simpan data dari form */
                $dataPost = array(
                    'ktgr_nama' => $this->input->post('postEditKtgrNama')
                );

            /* Kirim ke model untuk simpan ke database */
                $resultEdit = $this->Kategori_m->updateKategori($dataPost, $ktgrID);

            /** Redirect */ 
                if($resultEdit > 0){
                    $this->session->set_flashdata('flashStatus', 'successUpdate');
                    $this->session->set_flashdata('flashMsg', 'Berhasil mengubah data kategori !');
                } else {
                    $this->session->set_flashdata('flashStatus', 'failedUpdate');
                    $this->session->set_flashdata('flashMsg', 'Gagal mengubah data kategori !');
                }

                redirect('Admin_c/dataKategori');
        }

      /** Hapus data kategori */
        function hapusKategoriProses(){
            $ktgrID = base64_decode(urldecode($this->input->post("postID")));
            $resultDel = $this->Kategori_m->deleteKategori($ktgrID);
            if($resultDel > 0){
                echo 'successDelete';
            } else {
                echo 'failedDelete';
            }
        }
}