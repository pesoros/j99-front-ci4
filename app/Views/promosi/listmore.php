<?php for($i=0; $i<6; $i++) { 
    $disablecard = '';
    if($i == 2 || $i == 3) {
        $disablecard = 'card-disable';
    }
    ?>
<div class="col-12 col-sm-6 col-lg-4 mb-4">
    <div class="card border-radius-12 <?= $disablecard; ?> p-2">
        <div class="embed-responsive embed-responsive-13by9">
            <img class="embed-responsive-item border-radius-12" src="<?= base_url(); ?>/assets/img/promosi.jpg" alt="Card image cap">
        </div>
        <div class="card-body px-0 py-2">
            <div class="d-flex flex-row justify-content-between align-items-center">
                <div class="card-item-left">
                    <p>Promo Idul Fitri</p>
                    <span>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been ...</span>
                </div>
                <div class="card-item-right">
                    <span>Kode Promo</span>
                    <a href="<?= base_url('reservasi')?>" class="btn btn-submit"><span>PUASA2022</span></a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>