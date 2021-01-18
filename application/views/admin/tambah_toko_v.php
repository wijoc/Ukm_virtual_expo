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
              <li class="breadcrumb-item"><a href="<?php echo site_url('Toko_c') ?>"><i class="fas fa-store"></i> Toko</a></li>
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
          <div class="col-lg-10">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="m-0">Tambah Toko Baru</h5>
              </div>
              <form class="form-horizontal" method="POST" action="<?php echo site_url('Toko_c/tambahTokoProses') ?>" enctype="multipart/form-data">
                <div class="card-body">
                  <!-- Div alert -->
                    <div id="alert-toko"></div>

                  <!-- Form-part Nama Toko -->
                    <div class="form-group row">
                      <label for="inputTokoNama" class="col-sm-3 col-form-label">Nama Toko<a class="float-right"> : </a></label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control float-right" name="postTokoNama" id="inputTokoNama" placeholder="Masukan nama toko" required>
                      </div>
                    </div>

                  <!-- Form-part Owner Toko -->
                    <div class="form-group row">
                        <label for="inputTokoOwner" class="col-sm-3 col-form-label">Owner Toko<a class="float-right"> : </a></label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control float-right" name="postTokoOwner" id="inputTokoOwner" placeholder="Masukan nama owner toko" required>
                        </div>
                    </div>

                  <!-- Form-part Owner Toko -->
                    <div class="form-group row">
                        <label for="inputTokoLogo" class="col-sm-3 col-form-label">Logo Toko<a class="float-right"> : </a></label>
                        <div class="col-sm-8">
                            <input type="file" class="form-control float-right" name="postTokoLogo" id="inputTokoLogo" placeholder="Masukan nama owner toko">
                        </div>
                    </div>

                  <!-- Form-part Kategori Toko -->
                    <div class="form-group row">
                      <label for="inputTokoKategori" class="col-sm-3 col-form-label">Kategori <a class="float-right"> : </a></label>
                      <div class="col-sm-8">
                        <select class="form-control float-right" name="postTokoKategori" id="inputTokoKategori" required>
                          <option value=""> -- Pilih Kategori -- </option>
                          <?php foreach($dataKategori as $optKtgr): ?>
                          <option value="<?php echo urlencode(base64_encode($optKtgr['ktgr_id'])) ?>"> <?php echo $optKtgr['ktgr_nama'] ?> </option>
                          <?php endforeach; ?> 
                        </select>
                      </div>
                    </div>

                  <!-- Form-part Kontak WA Toko -->
                    <div class="form-group row">
                        <label for="inputTokoKontak" class="col-sm-3 col-form-label">Kontak (WhatsApp)<a class="float-right"> : </a></label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control float-right" name="postTokoKontak" id="inputTokoKontak" placeholder="Masukan nomor kontak">
                        </div>
                    </div>

                  <!-- Form-part Alamat -->
                    <div class="form-group row">
                        <label for="inputTokoAlamat" class="col-sm-3 col-form-label">Alamat<a class="float-right"> : </a></label>
                        <div class="col-sm-8">
                            <textarea class="form-control" name="postTokoAlamat" id="inputTokoAlamat" cols="30" rows="5"></textarea>
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