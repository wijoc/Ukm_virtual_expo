    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Page CRUD</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo site_url('Page_c') ?>"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item"><a href="<?php echo site_url('Crud_c') ?>"><i class="fas fa-cubes"></i> CRUD</a></li>
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
          <div class="col-lg-10">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="m-0">Insert</h5>
              </div>
              <form class="form-horizontal" method="POST" action="<?php echo site_url('Crud_c/createProses') ?>">
                <div class="card-body">

                  <!-- Form-part Input Text / Number -->
                    <div class="form-group row">
                      <label for="inputField1" class="col-sm-3 col-form-label">Field 1 - Text / Number<a class="float-right"> : </a></label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control float-right" name="postField1" id="inputField1" placeholder="Input text atau number">
                      </div>
                    </div>

                  <!-- Form-part Input Select -->
                    <div class="form-group row">
                      <label for="inputField2" class="col-sm-3 col-form-label">Field 2 - Select <a class="float-right"> : </a></label>
                      <div class="col-sm-8">
                        <select class="form-control float-right" name="postField2" id="inputField2">
                          <option> -- Pilih Isi -- </option>
                          <option value="opt1"> Option 1 </option>
                          <option value="opt2"> Option 2 </option>
                          <option value="opt3"> Option 3 </option>
                          <option value="opt4"> Option 4 </option>
                        </select>
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