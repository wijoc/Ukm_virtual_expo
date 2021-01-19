<div class="banner" >
    <div class="container">
      <div class="row">
        <?php
          if(count($dataToko) > 0){ 
            foreach($dataToko as $showToko): ?>
            <div class="col-lg-4 col-md-6 mt-2" data-aos="zoom-in">
                <div class="card border border-dark border-rounded">
                    <div class="card-header">
                        <h5 class=""><?php echo $showToko['toko_nama'] ?></h5>
                    </div>
                    <div>
                        <?php if($showToko['toko_logo'] == ''){ ?>
                            <img src="<?php echo base_url() ?>assets/expo_img/19197204.jpg" alt="" class="img-fluid rounded" width="150">
                        <?php } else { ?>
                            <img src="<?php echo base_url().'/'.$showToko['toko_logo'] ?>" alt="" class="img-fluid rounded" width="150">
                        <?php } ?>
                        <table class="table">
                            <tr>
                                <td>Owner</td>
                                <td>:</td>
                                <td style="font-size:15px;"><?php echo $showToko['toko_owner'] ?></td>
                            </tr>
                            <tr>
                                <td colspan="3" style="font-size:12px;"><?php echo $showToko['toko_alamat'] ?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="card-footer">
                        <a href="<?php echo site_url('Visitor_c/productListPage/').urlencode(base64_encode($showToko['toko_id'])) ?>" class="col-12 btn btn-success"><b>Lihat Toko</b></a>
                    </div>
                </div>
            </div>
        <?php 
            endforeach;
          } else {
        ?>
            <div class="col-12 mt-3">
                <div class="alert alert-danger border border-dark border-rounded"> Belum ada toko pada kategori ini ! </div>
            </div>
        <?php } ?>
      </div>
    </div>
</div>