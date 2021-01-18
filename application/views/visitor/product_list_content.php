<div class="banner" >
    <div class="container">
        <div class="col-12 card">
            <div class="row">
                <div class="col-md-2 col-sm-6">
                    <?php if($dataToko[0]['toko_logo'] == ''){ ?>
                        <img src="<?php echo base_url() ?>assets/expo_img/store_img/19197204.jpg" alt="" class="img-fluid rounded float-left border-right" width="150">
                    <?php } else { ?>
                        <img src="<?php echo base_url().'/'.$dataToko['0']['toko_logo'] ?>" alt="" class="img-fluid rounded float-left border-right" width="150">
                    <?php } ?>
                </div>
                <div class="col-md-6 text-left mt-3">
                    <h1 class=""><?php echo $dataToko[0]['toko_nama'] ?></h1>
                    <h5><?php echo $dataToko[0]['ktgr_nama'] ?></h5>
                    <h6><?php echo $dataToko[0]['toko_alamat'] ?></h6>
                </div>
                <div class="col-md-4 text-left mt-3">
                    <a target="-blank" href="https://api.whatsapp.com/send?phone=<?php echo $dataToko[0]['toko_kontak'] ?>&text=Halo%2C+<?php echo $dataToko[0]['toko_nama'] ?>&app_absent=0"" class="btn btn-lg btn-block btn-success"><?php echo $dataToko[0]['toko_kontak'] ?></a>
                </div>
            </div>
        </div>
        <div class="row">
            <?php foreach($dataProduk as $showPrd): ?>
                <div class="col-lg-4 col-md-6 mt-3">
                    <div class="card border border-dark border-rounded">
                        <div class="row no-gutters">
                            <div class="col-md-5">
                                <?php if($showPrd['prd_thumbnail'] == ''){ ?>
                                    <img src="<?php echo base_url().'/assets/expo_img/nopoto.png' ?>" height="210" width="163" alt="">
                                <?php } else { ?>
                                    <img src="<?php echo base_url().'/'.$showPrd['prd_thumbnail'] ?>" height="210" width="163" alt="">
                                <?php } ?>
                            </div>
                            <div class="col-md-7">
                                <div class="card-block px-2">
                                    <h4 class="card-title mt-3 pl-2"><?php echo $showPrd['prd_nama'] ?></h4>
                                    <hr>
                                    <p>Rp. <?php echo number_format($showPrd['prd_harga']) ?>.-</p>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-md-6">
                                    <a target="_blank" href="https://api.whatsapp.com/send?phone=<?php echo $dataToko[0]['toko_kontak'] ?>&text=Halo%2C+saya+mau+detail+<?php echo $showPrd['prd_nama'] ?>&app_absent=0" class="col-12 btn btn-success"><b> Chat</b></a>
                                </div>
                                <div class="col-md-6">
                                    <a href="<?php echo site_url('Visitor_c/productDetailPage').'/'.$idToko.'/'.urlencode(base64_encode($showPrd['prd_id'])) ?>" class="col-12 btn btn-info"><b> Detail</b></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>