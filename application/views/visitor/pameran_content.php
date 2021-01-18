<div class="banner">
    <div class="container">
      <div class="row" data-aos="zoom-out">
        <?php foreach($dataKategori as $showKtgr): ?>
          <a href="<?php echo site_url('Visitor_c/expoCategoryStore/').urlencode(base64_encode($showKtgr['ktgr_id'])) ?>">
            <div class="col-md-6 mb-3">
              <div class="card border border-dark border-rounded">
                <img class="card-img-top card-img" src="<?php echo base_url().$showKtgr['ktgr_banner'] ?>" alt="">
                <div class="text-img col-12">
                  <h2><?php echo $showKtgr['ktgr_nama'] ?></h2>
                </div>
                <div class="card-footer">
                  <a class="col-12 btn btn-opacity-info" href="<?php echo site_url('Visitor_c/expoCategoryStore/').urlencode(base64_encode($showKtgr['ktgr_id'])) ?>" style="color: black; font-weight: bold"> Lihat Galeri Pameran </a>
                </div>
              </div>
            </div>
          </a>
        <?php endforeach ?>
      </div>
    </div>
</div>