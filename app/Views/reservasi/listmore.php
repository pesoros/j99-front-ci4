<?php for($i=0; $i<3; $i++) { ?>
<div class="col-12 col-sm-6 col-lg-4 mb-4">
    <div class="card p-2">
        <div class="embed-responsive embed-responsive-13by9">
            <img class="embed-responsive-item" src="<?= base_url(); ?>/assets/img/img-bus-1.jpg" alt="Card image cap">
        </div>
        <div class="card-body px-0 py-2">
            <div class="d-flex flex-row justify-content-between">
                <div class="card-item-one-top-left">
                    <p>Executive</p>
                    <span>
                        <span class="mr-1"><i class="fas fa-plug"></i></span>
                        <span  class="mr-1"><i class="fas fa-smoking"></i></span>
                        <span  class="mr-1"><i class="fas fa-restroom"></i></span>
                        <span  class="mr-1"><i class="fas fa-coffee"></i></span>
                    </span>
                </div>
                <div class="card-item-one-top-right">
                    <span>Harga</span>
                    <p class="harga">Rp 600.000,00 <span> / orang</span></p>
                </div>
            </div>
            <div class="d-flex flex-row justify-content-between align-items-center">
                <div class="card-item-one-bottom-left d-flex align-items-center">
                    <div class="item-bottom-left">
                        <span>08:30 PM</span>
                        <p>Surabaya</p>
                        <span>Agen Darmo</span>
                    </div>
                    <div class="item-bottom-left d-flex justify-content-center align-items-center">
                        <span class="dots"></span>
                        <span class="dot-dashed"><span>12 j 10 m</span></span>
                        <span class="dots"></span>
                    </div>
                    <div class="item-bottom-left">
                        <span>08:30 PM</span>
                        <p>Surabaya</p>
                        <span>Agen Darmo</span>
                    </div>
                </div>
                <div class="card-item-one-bottom-right d-flex">
                    <p><span>Sisa Kursi</span> 20 Kursi</p>
                    <button type="button" class="btn btn-black btn-reserved" data="A<?= $i ?>"><i class="fas fa-loveseat"></i></button>
                    <a href="<?= base_url('reservasi/isidata')?>" class="btn btn-submit">Pessan</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php } ?>