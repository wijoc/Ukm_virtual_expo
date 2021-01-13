    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Halaman Kategori</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo site_url('Admin_c') ?>"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item"><a href="<?php echo site_url('Admin_c/dataKategori') ?>"><i class="fas fa-cubes"></i> CRUD</a></li>
              <li class="breadcrumb-item active">Create</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="card-title">Data Kategori</h5>
                <a class="float-right btn btn-sm btn-success" data-toggle="modal" data-target="#modal-tambah-kategori"><i class="fas fa-plus"></i> Kategori baru</a>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="table-kategori">
                        <thead class="text-center">
                          <tr>
                            <th>No. </th>
                            <th>Kategori</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                            $no = 1; 
                            if(count($dataKategori) > 0 ){
                              foreach($dataKategori as $showKtgr): ?>
                              <tr>
                                <td class="text-center"><?php echo $no++ ?></td>
                                <td><?php echo $showKtgr['ktgr_nama']; ?></td>
                                <td class="text-center">
                                  <a class="btn btn-xs btn-warning edit-ktgr" data-toggle="modal" data-target="#modal-edit-kategori" data-id="<?php echo urlencode(base64_encode($showKtgr['ktgr_id'])) ?>" data-name="<?php echo $showKtgr['ktgr_nama'] ?>"><i class="fas fa-edit"></i></a>
                                  <a class="btn btn-xs btn-danger" onclick="confirmDelete('ktgr', '<?php echo urlencode(base64_encode($showKtgr['ktgr_id'])) ?>', '<?php echo site_url('Admin_c/hapusKategoriProses') ?>')" data-toggle="tooltip" data-placement="top" title="Hapus Kategori"><i class="fas fa-trash"></i></a>
                                </td>
                              </tr>
                          <?php endforeach; } else { ?>
                              <tr>
                                <td class="text-center" colspan="3" style="background-color: red;">
                                  <font color="white" style="font-weight: bold;">DATA BELUM TERSEDIA !</font>
                                </td>
                              </tr>
                          <?php } ?>
                        </tbody>
                        <tfoot class="text-center">
                          <tr>
                            <th>No. </th>
                            <th>Kategori</th>
                            <th>Aksi</th>
                          </tr>
                        </tfoot>
                    </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->

    <!-- Modal -->
     <!-- Modal Tambah Kategori -->
      <div class="modal fade" id="modal-tambah-kategori">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Kategori</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="POST" action="<?php echo site_url('Admin_c/tambahKategoriProses') ?>">
              <div class="modal-body">
                <!-- Form-part input Kategori nama -->
                  <div class="form-group row">
                    <label for="inputKtgrNama" class="col-sm-3 col-form-label">Nama Kategori <a class="float-right"> : </a></label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control float-right" name="postKtgrNama" id="inputKtgrNama" placeholder="Nama kategori baru" required>
                    </div>
                  </div>
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

     <!-- Modal Edit Kategori -->
      <div class="modal fade" id="modal-edit-kategori">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Ubah Kategori</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="POST" action="<?php echo site_url('Admin_c/editKategoriProses') ?>">
              <div class="modal-body">
                <!-- Form-part input Kategori nama -->
                  <div class="form-group row">
                    <label for="inputKtgrNama" class="col-sm-3 col-form-label">Nama Kategori <a class="float-right"> : </a></label>
                    <div class="col-sm-8">
                      <input type="hidden" name="postEditKtgrID" id="editKtgrID" required="" disabled="disabled">
                      <input type="text" class="form-control float-right" name="postEditKtgrNama" id="editKtgrNama" placeholder="Nama kategori baru" required>
                    </div>
                  </div>
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>