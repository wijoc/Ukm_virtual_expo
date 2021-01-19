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
              <li class="breadcrumb-item active">Edit Toko</li>
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
                <h5 class="m-0">Edit Toko</h5>
              </div>
              <form class="form-horizontal" method="POST" action="<?php echo site_url('Toko_c/editTokoProses') ?>" enctype="multipart/form-data">
                <div class="card-body">
                  <!-- Div alert -->
                    <div id="alert-toko"></div>

                  <!-- Form-part ID Toko -->
                    <input type="hidden" name="postTokoID" value="<?php echo urlencode(base64_encode($dataTokoID[0]['toko_id'])) ?>">

                  <!-- Form-part Nama Toko -->
                    <div class="form-group row">
                      <label for="editTokoNama" class="col-sm-3 col-form-label">Nama Toko<a class="float-right"> : </a></label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control float-right" name="postTokoNama" id="editTokoNama" value="<?php echo $dataTokoID[0]['toko_nama'] ?>">
                      </div>
                    </div>

                  <!-- Form-part Owner Toko -->
                    <div class="form-group row">
                        <label for="editTokoOwner" class="col-sm-3 col-form-label">Owner Toko<a class="float-right"> : </a></label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control float-right" name="postTokoOwner" id="editTokoOwner" value="<?php echo $dataTokoID[0]['toko_owner'] ?>">
                        </div>
                    </div>

                  <!-- Form-part Owner Toko -->
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Logo Saat ini<a class="float-right"> : </a></label>
                        <div class="col-sm-8">
                            <input type="hidden" class="form-control float-right" name="postOldTokoLogo" id="oldTokoLogo" value="<?php echo $dataTokoID[0]['toko_logo'] ?>">
                            <img  src="<?php echo base_url().$dataTokoID[0]['toko_logo'] ?>" alt="" width="200">
                        </div>
                    </div>

                  <!-- Form-part Owner Toko -->
                    <div class="form-group row">
                        <label for="editTokoLogo" class="col-sm-3 col-form-label">Logo Baru<a class="float-right"> : </a></label>
                        <div class="col-sm-8">
                            <input type="file" class="form-control float-right" name="postTokoLogo" id="editTokoLogo" placeholder="Masukan nama owner toko">
                            <font color="red"><em><small>* kosongkan jika tidak ingin mengganti logo</small></em></font>
                        </div>
                    </div>

                  <!-- Form-part Kategori Toko -->
                    <div class="form-group row">
                      <label for="editTokoKategori" class="col-sm-3 col-form-label">Kategori <a class="float-right"> : </a></label>
                      <div class="col-sm-8">
                        <select class="form-control float-right" name="postTokoKategori" id="editTokoKategori">
                          <option> -- Pilih Isi -- </option>
                          <?php foreach($dataKategori as $optKtgr): ?>
                          <option value="<?php echo urlencode(base64_encode($optKtgr['ktgr_id'])) ?>" <?php echo ($dataTokoID[0]['kategori_id_fk'] == $optKtgr['ktgr_id'])? 'selected' : '' ?> > <?php echo $optKtgr['ktgr_nama'] ?> </option>
                          <?php endforeach; ?> 
                        </select>
                      </div>
                    </div>

                  <!-- Form-part Kontak WA Toko -->
                    <div class="form-group row">
                        <label for="editTokoKontak" class="col-sm-3 col-form-label">Kontak (WhatsApp)<a class="float-right"> : </a></label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control float-right" name="postTokoKontak" id="editTokoKontak" value="<?php echo $dataTokoID[0]['toko_kontak'] ?>">
                        </div>
                    </div>

                  <!-- Form-part Alamat -->
                    <div class="form-group row">
                        <label for="inputTokoAlamat" class="col-sm-3 col-form-label">Alamat<a class="float-right"> : </a></label>
                        <div class="col-sm-8">
                            <textarea class="form-control" name="postTokoAlamat" id="inputTokoAlamat" cols="30" rows="5"><?php echo $dataTokoID[0]['toko_alamat'] ?></textarea>
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