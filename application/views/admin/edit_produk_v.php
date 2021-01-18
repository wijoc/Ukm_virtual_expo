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
                <h5 class="m-0">Edit Produk</h5>
              </div>
              <form class="form-horizontal" method="POST" action="<?php echo site_url('Produk_c/editProdukProses') ?>" enctype="multipart/form-data">
                <div class="card-body">
                  <!-- Div alert -->
                    <div id="alert-prd"></div>

                  <!-- Form-part ID Toko dan Produk-->
                    <input type="hidden" name="postPrdID" value="<?php echo urlencode(base64_encode($dataPrd[0]['prd_id'])) ?>">
                    <input type="hidden" name="postPrdTokoID" value="<?php echo urlencode(base64_encode($dataPrd[0]['toko_id_fk'])) ?>">

                  <!-- Form-part Nama Produk -->
                    <div class="form-group row">
                      <label for="inputPrdNama" class="col-sm-3 col-form-label">Nama Produk<a class="float-right"> : </a></label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control float-right" name="postPrdNama" id="inputPrdNama" value="<?php echo $dataPrd[0]['prd_nama'] ?>">
                      </div>
                    </div>

                  <!-- Form-part Harga Produk -->
                    <div class="form-group row">
                        <label for="inputPrdHarga" class="col-sm-3 col-form-label">Harga Produk<a class="float-right"> : </a></label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control float-right" name="postPrdHarga" id="inputPrdHarga" value="<?php echo $dataPrd[0]['prd_harga'] ?>">
                        </div>
                    </div>

                  <!-- Form-part Deskripsi -->
                    <div class="form-group row">
                        <label for="inputPrdDeskripsi" class="col-sm-3 col-form-label">Deskripsi<a class="float-right"> : </a></label>
                        <div class="col-sm-8">
                            <textarea class="form-control" name="postPrdDeskripsi" id="inputPrdDeskripsi" cols="30" rows="5"><?php echo $dataPrd[0]['prd_deskripsi'] ?></textarea>
                        </div>
                    </div>

                  <!-- Form-part Gambar Produk -->
                    <div class="form-group row">
                        <label for="inputPrdFoto" class="col-sm-3 col-form-label">Foto Produk <a class="float-right"> : </a></label>
                        <div class="col-sm-8">
                            <input type="hidden" class="form-control float-right" name="postOldPrdFoto" id="inputPrdFoto" value="<?php echo $dataPrd[0]['prd_thumbnail'] ?>">
                            <img src="<?php echo base_url().$dataPrd[0]['prd_thumbnail'] ?>" width="200" alt="">
                        </div>
                    </div>

                    <!-- Form-part Gambar Produk Baru-->
                    <div class="form-group row">
                        <label for="inputPrdFoto" class="col-sm-3 col-form-label">Foto Produk Baru<a class="float-right"> : </a></label>
                        <div class="col-sm-8">
                            <input type="file" class="form-control float-right" name="postPrdFoto" id="inputPrdFoto" >
                            <font color="red"><em><small>* kosongkan jika tidak ingin mengganti foto</small></em></font>
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