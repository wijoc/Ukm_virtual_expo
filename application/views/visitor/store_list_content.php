<div class="banner" >
    <div class="container">
      <div class="row">
        <?php foreach($dataToko as $showToko): ?>
            <div class="col-lg-4 col-md-6 mt-2" data-aos="zoom-in">
                <div class="card border border-dark border-rounded">
                    <div class="card-header">
                        <h5 class=""><?php echo $showToko['toko_nama'] ?></h5>
                    </div>
                    <div>
                        <img src="<?php echo base_url() ?>assets/expo_img/store_img/19197204.jpg" alt="" class="img-fluid rounded" width="150">
                        <table class="table">
                            <tr>
                                <td>Owner</td>
                                <td>:</td>
                                <td><?php echo $showToko['toko_owner'] ?></td>
                            </tr>
                            <tr>
                                <td>WA</td>
                                <td>:</td>
                                <td><p><?php echo $showToko['toko_kontak'] ?></p></td>
                            </tr>
                            <tr>
                                <td colspan="3"><?php echo $showToko['toko_alamat'] ?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="card-footer">
                        <a href="<?php echo site_url('Visitor_c/productListPage/').urlencode(base64_encode($showToko['toko_id'])) ?>" class="col-12 btn btn-success"><b>Lihat Toko</b></a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
      </div>
    </div>
</div>