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
          <div class="col-lg-10">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="m-0">Tambah Produk Baru</h5>
              </div>
              <form class="form-horizontal" method="POST" action="<?php echo site_url('Produk_c/tambahProdukProses') ?>" enctype="multipart/form-data">
                <div class="card-body">
                  <!-- Div alert -->
                    <div id="alert-prd"></div>

                  <!-- Form-part ID Toko -->
                    <input type="hidden" name="postPrdTokoID" value="<?php echo $tokoID ?>">

                  <!-- Form-part Nama Produk -->
                    <div class="form-group row">
                      <label for="inputPrdNama" class="col-sm-3 col-form-label">Nama Produk<a class="float-right"> : </a></label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control float-right" name="postPrdNama" id="inputPrdNama" placeholder="Masukan nama produk">
                      </div>
                    </div>

                  <!-- Form-part Harga Produk -->
                    <div class="form-group row">
                        <label for="inputPrdHarga" class="col-sm-3 col-form-label">Harga Produk<a class="float-right"> : </a></label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control float-right" name="postPrdHarga" id="inputPrdHarga" placeholder="Masukan harga produk">
                        </div>
                    </div>

                  <!-- Form-part Deskripsi -->
                    <div class="form-group row">
                        <label for="inputPrdDeskripsi" class="col-sm-3 col-form-label">Deskripsi<a class="float-right"> : </a></label>
                        <div class="col-sm-8">
                            <textarea class="form-control" name="postPrdDeskripsi" id="inputPrdDeskripsi" cols="30" rows="5"></textarea>
                        </div>
                    </div>

                  <!-- Form-part Gambar Produk -->
                    <div class="form-group row">
                        <label for="inputPrdFoto" class="col-sm-3 col-form-label">Foto Produk<a class="float-right"> : </a></label>
                        <div class="col-sm-8">
                            <input type="file" class="form-control float-right" name="postPrdFoto" id="inputPrdFoto">
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                  <div class="float-right">
                    <button type="reset" class="btn btn-secondary"><b> Reset </b></button>
                    <button type="submit" class="btn btn-primary"><b> Simpan </b></button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->