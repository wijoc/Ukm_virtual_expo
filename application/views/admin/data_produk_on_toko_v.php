    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Halaman Produk</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo site_url('Admin_c') ?>"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item"><a href="<?php echo site_url('Toko_c') ?>"><i class="fas fa-store"></i> Toko</a></li>
              <li class="breadcrumb-item active">Data Produk</li>
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
                <h5 class="card-title">Data Produk dari Toko : <?php echo $namaToko[0]['toko_nama'] ?></h5>
                <a class="float-right btn btn-sm btn-success" href="<?php echo site_url('Produk_c/tambahProduk').'/'.$tokoID ?>"><i class="fas fa-plus"></i> Produk baru</a>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="table-toko">
                        <thead class="text-center">
                          <tr>
                            <th>No. </th>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                            $no = 1; 
                            if(count($dataProduk) > 0 ){
                              foreach($dataProduk as $showPrd): ?>
                              <tr>
                                <td class="text-center"><?php echo $no++ ?></td>
                                <td><?php echo $showPrd['prd_nama']; ?></td>
                                <td><?php echo $showPrd['prd_harga']; ?></td>
                                <td class="text-center">
                                  <a class="btn btn-xs btn-info" href="<?php echo site_url('Produk_c/detailProduk'.'/'.$tokoID.'/'.urlencode(base64_encode($showPrd['prd_id']))) ?>"><i class="fas fa-search"></i></a>
                                  <a class="btn btn-xs btn-warning" href="<?php echo site_url('Produk_c/editProduk').'/'.urlencode(base64_encode($showPrd['prd_id'])) ?>"><i class="fas fa-edit"></i></a>
                                  <a class="btn btn-xs btn-danger" onclick="confirmDelete('hard-prd', '<?php echo urlencode(base64_encode($showPrd['prd_id'])) ?>', '<?php echo site_url('Produk_c/hapusProdukProses').'/'.$tokoID ?>')" data-toggle="tooltip" data-placement="top" title="Hapus Produk"><i class="fas fa-trash"></i></a>
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
                            <th>Nama Produk</th>
                            <th>Harga</th>
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