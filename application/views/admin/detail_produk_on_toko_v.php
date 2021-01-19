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
              <li class="breadcrumb-item active">Detail Produk</li>
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
                <h5 class="card-title">Produk <b><?php echo $detailProduk[0]['prd_nama'] ?></b>, Toko : <?php echo $namaToko[0]['toko_nama'] ?></h5>
                <a class="float-right btn btn-sm btn-success" href="<?php echo site_url('Produk_c/tambahProduk').'/'.$tokoID ?>"><i class="fas fa-plus"></i> Produk baru</a>
              </div>
              <div class="card-body">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <img class="img-fluid" src="<?php echo base_url().'/'.$detailProduk[0]['prd_thumbnail'] ?>" alt="Gambar Produk" height="400">
                    </div>
                    <div class="col-lg-8 col-md-6">
                        <div class="col-11 pt-3 border-bottom">
                            <h3 class="product-title"><?php echo $detailProduk[0]['prd_nama'] ?></h3>
                        </div>
                        <div class="col-11 detail-body mt-4">
                            <p class="product-description">
                                <?php echo (!isset($detailProduk[0]['prd_deskripsi']) || $detailProduk[0]['prd_deskripsi'] == '')? 'Belum ada deskrpisi' : $detailProduk[0]['prd_deskripsi']; ?>
                            </p>
                            <h4>Harga : <span class="product-price"><?php echo $detailProduk[0]['prd_harga'] ?></span></h4>
                        </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->