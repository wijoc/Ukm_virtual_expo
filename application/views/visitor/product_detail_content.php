<div class="banner">
    <div class="container">
        <div class="card pb-5">
			<div class="row">
                    <div class="col-lg-4 col-md-6">
                        <?php if($detailProduk[0]['prd_thumbnail'] == ''){ ?>
                            <img class="img-fluid" src="<?php echo base_url().'/assets/expo_img/nopoto.png' ?>" alt="Gambar Produk" height="400">
                        <?php } else { ?>
                            <img class="img-fluid" src="<?php echo base_url().'/'.$detailProduk[0]['prd_thumbnail'] ?>" alt="Gambar Produk" height="400">
                        <?php } ?>
                    </div>
				<div class="col-lg-8 col-md-6">
                    <div class="col-11 pt-3 border-bottom">
					    <h3 class="product-title"><?php echo $detailProduk[0]['prd_nama'] ?></h3>
                    </div>
                    <div class="col-11 detail-body mt-4">
                        <p class="product-description">
                            <?php echo (!isset($detailProduk[0]['prd_deskripsi']) || $detailProduk[0]['prd_deskripsi'] == '')? 'Belum ada deskrpisi' : $detailProduk[0]['prd_deskripsi']; ?>
                        </p>
                        <h4>Harga : <span class="product-price"><?php echo $detailProduk[0]['prd_harga'] ?></span></h4>
                    </div>
					<div class="col-11 detail-footer border-top pt-2" style="position: absolute; bottom: 0;">
						<a class="col-12 btn btn-sm btn-success" target="_blank" href="https://api.whatsapp.com/send?phone=<?php echo $dataToko[0]['toko_kontak'] ?>&text=Halo%2C+<?php echo $dataToko[0]['toko_nama'] ?>.+Apakah+produk+%22<?php echo $detailProduk[0]['prd_nama'] ?>%22+masih+tersedia?&app_absent=0"><b>Lanjut ke chat whatsapp</b></a>
					</div>
				</div>
			</div>
		</div>
    </div>
</div>
<div class="content-wrapper">
    <div class="container">
        <section class="case-studies">
            <div class="row grid-margin align-items-center justify-content-center">
                <div class="col-12 mb-3 card">
                    <div class="row border-bottom">
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
                            <a target="-blank" href="https://api.whatsapp.com/send?phone=<?php echo $dataToko[0]['toko_kontak'] ?>&text=Halo%2C+<?php echo $dataToko[0]['toko_nama'] ?>&app_absent=0" class="btn btn-lg btn-block btn-success"><?php echo $dataToko[0]['toko_kontak'] ?></a>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <h4 class="float-left" style="text-decoration: underline;">PRODUK LAIN DARI TOKO INI</h4>
                    <a href="<?php echo site_url('Visitor_c/productListPage/').$idToko ?>" class="float-right" style="text-decoration: underline; color: #af1515;">lihat Semua Produk ></a>
                </div>
                <div class="row">
                    <?php foreach($tigaProduk as $showPrd): ?>
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
                                <div class="col-md-7 pl-3">
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
        </section>
    </div>
</div>