<div class="banner">
    <div class="team-grid">
        <div class="container">
            <div class="intro">
                <h2 class="text-center">Jadwal Live Stream </h2>
            </div>
            <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="all-stream-tab" data-toggle="tab" href="#stream-all" role="tab" aria-controls="stream-all" aria-selected="true">Semua LiveStream</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="today-stream-tab" data-toggle="tab" href="#stream-now" role="tab" aria-controls="stream-now" aria-selected="true">Stream Hari ini</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="past-stream-tab" data-toggle="tab" href="#past-stream" role="tab" aria-controls="past-stream" aria-selected="false">Stream sebelumnya</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="next-stream-tab" data-toggle="tab" href="#next-stream" role="tab" aria-controls="next-stream" aria-selected="false">Stream berikutnya</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="stream-all" role="tabpanel" aria-labelledby="all-stream-tab">
                    <div class="row people">
                      <?php
                        if(count($allStream) > 0){
                          foreach($allStream as $showStr): 
                      ?>
                            <div class="col-md-4 col-lg-3 item">
                                <a target="_blank" href="<?php echo $showStr['str_link'] ?>">
                                    <div class="box" style="background-image:url(<?php echo base_url().$showStr['str_banner'] ?>)">
                                        <div class="cover">
                                            <h3 class="name">Play</h3>
                                            <span class="material-icons">
                                                <img src="<?php echo base_url() ?>/assets/visitor/images/baseline_play_circle_white_18dp.png" alt="">
                                            </span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                      <?php 
                          endforeach;
                        } else {
                      ?>
                        <div class="col-12 mt-3">
                            <div class="alert alert-danger border border-dark border-rounded"> Belum ada data livestream </div>
                        </div>
                      <?php } ?>
                    </div>
                </div>
                <div class="tab-pane fade show" id="stream-now" role="tabpanel" aria-labelledby="today-stream-tab">
                    <div class="row people">
                      <?php
                        if(count($todayStream) > 0){
                          foreach($todayStream as $showStr): 
                      ?>
                            <div class="col-md-4 col-lg-3 item">
                                <a target="_blank" href="<?php echo $showStr['str_link'] ?>">
                                    <div class="box" style="background-image:url(<?php echo base_url().$showStr['str_banner'] ?>)">
                                        <div class="cover">
                                            <h3 class="name">Play</h3>
                                            <span class="material-icons">
                                                <img src="<?php echo base_url() ?>/assets/visitor/images/baseline_play_circle_white_18dp.png" alt="">
                                            </span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                      <?php 
                          endforeach;
                        } else {
                      ?>
                        <div class="col-12 mt-3">
                            <div class="alert alert-danger border border-dark border-rounded"> Belum ada livestream hari ini </div>
                        </div>
                      <?php } ?>
                    </div>
                </div>
                <div class="tab-pane fade" id="past-stream" role="tabpanel" aria-labelledby="past-stream-tab">
                    <div class="row people">
                      <?php
                        if(count($pastStream) > 0){
                          foreach($pastStream as $showStr): 
                      ?>
                            <div class="col-md-4 col-lg-3 item">
                                <a target="_blank" href="<?php echo $showStr['str_link'] ?>">
                                    <div class="box" style="background-image:url(<?php echo base_url().$showStr['str_banner'] ?>)">
                                        <div class="cover">
                                            <h3 class="name">Play</h3>
                                            <span class="material-icons">
                                                <img src="<?php echo base_url() ?>/assets/visitor/images/baseline_play_circle_white_18dp.png" alt="">
                                            </span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                      <?php 
                          endforeach;
                        } else {
                      ?>
                        <div class="col-12 mt-3">
                            <div class="alert alert-danger border border-dark border-rounded"> Belum ada livestream hari ini </div>
                        </div>
                      <?php } ?>
                    </div>
                </div>
                <div class="tab-pane fade" id="next-stream" role="tabpanel" aria-labelledby="next-stream-tab">
                    <div class="row people">
                      <?php
                        if(count($nextStream) > 0){
                          foreach($nextStream as $showStr): 
                      ?>
                            <div class="col-md-4 col-lg-3 item">
                                <a target="_blank" href="<?php echo $showStr['str_link'] ?>">
                                    <div class="box" style="background-image:url(<?php echo base_url().$showStr['str_banner'] ?>)">
                                        <div class="cover">
                                            <h3 class="name">Play</h3>
                                            <span class="material-icons">
                                                <img src="<?php echo base_url() ?>/assets/visitor/images/baseline_play_circle_white_18dp.png" alt="">
                                            </span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                      <?php 
                          endforeach;
                        } else {
                      ?>
                        <div class="col-12 mt-3">
                            <div class="alert alert-danger border border-dark border-rounded"> Belum ada data livestream </div>
                        </div>
                      <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>