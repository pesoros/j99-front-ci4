<?= $this->extend('layouts/master') ?>

<?= $this->section('library') ?>	
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css">
<?= $this->endSection() ?>

<?= $this->section('styles') ?>
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/promo/custom.css">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="header2">
    <div class="content-ads">
        <img src="<?= base_url('assets/img/ads.jpg')?>" alt="ads banner" class="img-fluid">
    </div>
    <div class="content-header">
        <div class="wizard d-flex justify-content-center align-items-center">
            <ul class="nav nav-tabs" role="tablist">
                <li role="one" class="active d-flex align-items-center">
                    <span></span>
                </li>
                <li role="two" class="active d-flex align-items-center">
                    <span></span>
                    <span></span>
                </li>
                <li role="three" class="active d-flex align-items-center">
                    <span></span>
                    <span></span>
                </li>
            </ul>
        </div>
    </div>
</div>
<section>
	<div class="container">
        <div class="content-promosi">
            <h2>Promosi</h2>
            <div class="promosi-body">
                <div class="row align-items-center mt-5" id="listpromo">
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
                </div>
            </div>
        </div>
	</div>
</section>

<?= $this->endSection() ?>

<?= $this->section('footer') ?>
	<?= $footer; ?>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
	<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script><script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="<?= base_url(); ?>/assets/js/promo/custom.js"></script>
<?= $this->endSection() ?> 