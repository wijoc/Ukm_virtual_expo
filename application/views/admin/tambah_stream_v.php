    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Halaman Stream</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo site_url('Admin_c') ?>"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item"><a href="<?php echo site_url('Stream_c') ?>"><i class="fas fa-store"></i> Live Stream</a></li>
              <li class="breadcrumb-item active">Data Stream</li>
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
                <h5 class="m-0">Tambah Live Stream Baru</h5>
              </div>
              <form class="form-horizontal" method="POST" action="<?php echo site_url('Stream_c/tambahStreamProses') ?>" enctype="multipart/form-data">
                <div class="card-body">
                  <!-- Div alert -->
                    <div id="alert-prd"></div>

                  <!-- Form-part Judul Stream -->
                    <div class="form-group row">
                      <label for="inputStrJudul" class="col-sm-3 col-form-label">Judul Stream<a class="float-right"> : </a></label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control float-right" name="postStrJudul" id="inputStrJudul" placeholder="Masukan Judul stream">
                      </div>
                    </div>

                  <!-- Form-part Jadwal Stream -->
                    <div class="form-group row">
                        <label for="inputStrJadwal" class="col-sm-3 col-form-label">Jadwal Stream<a class="float-right"> : </a></label>
                        <div class="col-sm-4">
                            <input type="date" class="form-control float-right" name="postStrJadwal" id="inputStrJadwal" placeholder="Masukan Jadwal Stream">
                        </div>
                        <div class="col-sm-4">
                            <input type="time" class="form-control float-right" name="postStrJadwalJam" id="inputStrJadwalJam" placeholder="Masukan Jadwal Stream">
                        </div>
                    </div>

                  <!-- Form-part Link Stream -->
                    <div class="form-group row">
                        <label for="inputStrLink" class="col-sm-3 col-form-label">Link Stream<a class="float-right"> : </a></label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control float-right" name="postStrLink" id="inputStrLink" placeholder="Masukan Link Stream">
                        </div>
                    </div>

                  <!-- Form-part Banner Stream -->
                    <div class="form-group row">
                        <label for="inputStrBanner" class="col-sm-3 col-form-label">Banner Stream<a class="float-right"> : </a></label>
                        <div class="col-sm-8">
                            <input type="file" class="form-control float-right" name="postStrBanner" id="inputStrBanner">
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