    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Halaman Toko</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo site_url('Admin_c') ?>"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item"><a href="<?php echo site_url('Admin_c/dataKategori') ?>"><i class="fas fa-store"></i> Toko</a></li>
              <li class="breadcrumb-item active">Data Toko</li>
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
                <h5 class="card-title">Data Toko</h5>
                <a class="float-right btn btn-sm btn-success" href="<?php echo site_url('Toko_c/tambahToko') ?>"><i class="fas fa-plus"></i> Toko baru</a>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="table-toko">
                        <thead class="text-center">
                          <tr>
                            <th>No. </th>
                            <th>Nama Toko</th>
                            <th>Owner</th>
                            <th>Kategori</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                            $no = 1; 
                            if(count($dataToko) > 0 ){
                              foreach($dataToko as $showToko): ?>
                              <tr>
                                <td class="text-center"><?php echo $no++ ?></td>
                                <td><?php echo $showToko['toko_nama']; ?></td>
                                <td><?php echo $showToko['toko_owner']; ?></td>
                                <td><?php echo $showToko['ktgr_nama']; ?></td>
                                <td class="text-center">
                                  <a class="btn btn-xs btn-warning" href="<?php echo site_url('Toko_c/editToko').'/'.urlencode(base64_encode($showToko['toko_id'])) ?>"><i class="fas fa-edit"></i></a>
                                  <a class="btn btn-xs btn-danger" onclick="confirmDelete('hard-toko', '<?php echo urlencode(base64_encode($showToko['toko_id'])) ?>', '<?php echo site_url('Toko_c/hapusTokoProses') ?>')" data-toggle="tooltip" data-placement="top" title="Hapus Toko"><i class="fas fa-trash"></i></a>
                                </td>
                              </tr>
                          <?php endforeach; } else { ?>
                              <tr>
                                <td class="text-center" colspan="5" style="background-color: red;">
                                  <font color="white" style="font-weight: bold;">DATA BELUM TERSEDIA !</font>
                                </td>
                              </tr>
                          <?php } ?>
                        </tbody>
                        <tfoot class="text-center">
                          <tr>
                            <th>No. </th>
                            <th>Nama Toko</th>
                            <th>Owner</th>
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