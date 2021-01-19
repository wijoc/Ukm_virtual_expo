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
          <div class="col-12">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="card-title">Data Stream</h5>
                <a class="float-right btn btn-sm btn-success" href="<?php echo site_url('Stream_c/tambahStream') ?>"><i class="fas fa-plus"></i> Tambah jadwal stream</a>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="table-stream">
                        <thead class="text-center">
                          <tr>
                            <th>No. </th>
                            <th>Judul Stream</th>
                            <th>Jadwal</th>
                            <th>Link</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                            $no = 1; 
                            if(count($dataStream) > 0 ){
                              foreach($dataStream as $showStream): ?>
                              <tr>
                                <td class="text-center"><?php echo $no++ ?></td>
                                <td><?php echo $showStream['str_judul']; ?></td>
                                <td><?php echo $showStream['str_jadwal'].' '.date('H:i:s', strtotime($showStream['str_jadwal_jam'])); ?></td>
                                <td><?php echo $showStream['str_link']; ?></td>
                                <td class="text-center">
                                  <!-- <a href="" class="btn btn-xs btn-info"><i class="fas fa-search"></i></a> -->
                                  <a class="btn btn-xs btn-warning edit-stream" data-toggle="modal" data-target="#modal-edit-stream" 
                                    data-id="<?php echo urlencode(base64_encode($showStream['str_id'])) ?>"
                                    data-title="<?php echo $showStream['str_judul'] ?>"
                                    data-url="<?php echo $showStream['str_link'] ?>"
                                    data-schedule="<?php echo $showStream['str_jadwal'] ?>"
                                    data-hour="<?php echo $showStream['str_jadwal_jam'] ?>"
                                    data-banner="<?php echo $showStream['str_banner'] ?>"
                                    data-base-url="<?php echo base_url() ?>"
                                  >
                                    <i class="fas fa-edit"></i>
                                  </a>
                                  <a class="btn btn-xs btn-danger" onclick="confirmDelete('stream', '<?php echo urlencode(base64_encode($showStream['str_id'])) ?>', '<?php echo site_url('Stream_c/hapusStreamProses') ?>')" data-toggle="tooltip" data-placement="top" title="Hapus data Livestream"><i class="fas fa-trash"></i></a>
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
                            <th>Judul Stream</th>
                            <th>Jadwal</th>
                            <th>Link</th>
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
     <!-- Modal Edit data stream -->
      <div class="modal fade" id="modal-edit-stream">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Ubah Data Stream</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="POST" action="<?php echo site_url('Stream_c/editStreamProses') ?>" enctype="multipart/form-data">
              <div class="modal-body">

                  <!-- Forem-part id stream -->
                    <input type="hidden" name="postStrID" id="editStrID">

                  <!-- Form-part Judul Stream -->
                    <div class="form-group row">
                      <label for="editStrJudul" class="col-sm-3 col-form-label">Judul Stream<a class="float-right"> : </a></label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control float-right" name="postStrJudul" id="editStrJudul" placeholder="Masukan Judul stream">
                      </div>
                    </div>

                  <!-- Form-part Jadwal Stream -->
                    <div class="form-group row">
                        <label for="editStrJadwal" class="col-sm-3 col-form-label">Jadwal Stream<a class="float-right"> : </a></label>
                        <div class="col-sm-4">
                            <input type="date" class="form-control float-right" name="postStrJadwal" id="editStrJadwal" placeholder="Masukan Jadwal Stream">
                        </div>
                        <div class="col-sm-4">
                            <input type="time" class="form-control float-right" name="postStrJadwalJam" id="editStrJadwalJam" placeholder="Masukan Jadwal Stream">
                        </div>
                    </div>

                  <!-- Form-part Link Stream -->
                    <div class="form-group row">
                        <label for="editStrLink" class="col-sm-3 col-form-label">Link Stream<a class="float-right"> : </a></label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control float-right" name="postStrLink" id="editStrLink" placeholder="Masukan Link Stream">
                        </div>
                    </div>

                  <!-- Form-part Old Banner -->
                    <div class="form-group row">
                        <label for="editStrLink" class="col-sm-3 col-form-label">Banner Saat Ini<a class="float-right"> : </a></label>
                        <div class="col-sm-8">
                          <label id="notfound" class="col-form-label">Banner belum tersedia !</label>
                          <img src="" alt="Banner stream" id="oldBannerImg">
                        </div>
                    </div>

                  <!-- Form-part Banner Stream -->
                    <div class="form-group row">
                        <label for="editStrBanner" class="col-sm-3 col-form-label">Banner Stream<a class="float-right"> : </a></label>
                        <div class="col-sm-8">
                            <input type="hidden" name="postOldBanner" id="editStrBanner" readonly>
                            <input type="file" class="form-control float-right" name="postStrBanner">
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