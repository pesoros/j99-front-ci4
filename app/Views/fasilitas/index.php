<?= $this->extend('layouts/master') ?>

<?= $this->section('library') ?>
	
<?= $this->endSection() ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url('/assets/css/fasilitas/custom.css')?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section id="fasilitas">
    <div class="content d-flex flex-column flex-lg-row" id="content">
        <div class="content-item col-12 px-0">
            <div class="row mx-0 justify-content-center align-items-center">
                <div class="item-left col-12 col-lg-6 px-4 d-flex flex-row justify-content-center align-items-center">
                    <h3 class="my-5 my-lg-0"><span class="bg-white text-black">Fasilit</span><span>as</span></h3>
                </div>
                <div class="item-rigth col-12 col-lg-6 px-0">
                    <div class="row  mx-0">
                        <img src="<?= base_url('assets/img/fasilitas-1.jpg')?>" alt="" class="col-6 col-lg-12 px-0">
                        <img src="<?= base_url('assets/img/fasilitas-3.jpg')?>" alt="" class="img-fluid col-6 col-lg-12 px-0">
                    </div>
                </div>
            </div>
        </div>
        
        <div class="content-item col-12 bg-white px-0  pt-4 pt-lg-0">
            <div class="row mx-0 justify-content-center align-items-center">
                <div class="item-left col-12 col-lg-6 px-0 position-2">
                    <div class="row  mx-0">
                        <img src="<?= base_url('assets/img/fasilitas-2.jpg')?>" alt="" class="img-fluid col-6 col-lg-12 px-0">
                        <img src="<?= base_url('assets/img/fasilitas-4.jpg')?>" alt="" class="img-fluid col-6 col-lg-12 px-0">
                    </div>
                </div>
                <div class="item-rigth col-12 col-lg-6 px-4 position-1">
                    <h3><span class="bg-black text-white">Pemilihan Se</span><span>at</span></h3>
                    <p class="text-wrap text-break">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                    <p class="text-wrap text-break">Why do we use it?<br> It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
                </div>
            </div>
        </div>
        
        <div class="content-item col-12 bg-white px-0 pt-4 pt-lg-0">
            <div class="row mx-0 justify-content-center align-items-center">
                <div class="item-left col-12 col-lg-6 px-4">
                    <h3><span class="bg-black text-white">Online Book</span><span>ing</span></h3>
                    <p class="text-wrap text-break">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                    <p class="text-wrap text-break">Why do we use it?<br> It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
                </div>
                <div class="item-rigth col-12 col-lg-6 px-0">
                    <div class="row mx-0">
                        <img src="<?= base_url('assets/img/fasilitas-5.jpg')?>" alt="" class="col-6 col-lg-12 px-0">
                        <img src="<?= base_url('assets/img/fasilitas-6.jpg')?>" alt="" class="col-6 col-lg-12 px-0">
                    </div>
                </div>
            </div>
        </div>

        <div class="content-item col-12 px-0 pt-4 pt-lg-0">
            <div class="footer-content">
                <div class="row justify-content-center align-items-center">
                    <div class="item-footer col-12 col-sm-7 col-xl-8">
                        <img src="<?= base_url('assets/img/logo.png'); ?>" alt="Juragan 99" class="img-fluid">
                    </div>
                    <div class="item-footer col-12 col-sm-5 col-xl-4">
                        <div class="item-contact d-flex flex-column">
                            <a href="tel:628122220799" target="_blank">
                            <i class="fas fa-phone"></i>&nbsp; 081 222 207 99</a>
                            <a href="mailto:info@juragan99trans.id?Subject=Info%20%Juragan%20%99" target="_blank"><i class="fas fa-envelope"></i>&nbsp; info@juragan99trans.id </a>
                            <a href="" target="_blank"><i class="fas fa-location-arrow"></i>&nbsp; Jl. Komud ABD. Saleh No.</a>
                        </div>
                        
                        <div class="item-share">
                            <div class="d-flex flex-row align-items-center mt-3 mt-sm-0">
                                <a href="" target="_blank" class="share"><i class="fab fa-instagram"></i></a>
                                <a href="" target="_blank" class="share"><i class="fab fa-facebook"></i></a>
                                <a href="" target="_blank" class="share"><i class="fab fa-twitter"></i></a>
                                <a href="" target="_blank" class="share"><i class="fab fa-youtube"></i></a>
                            </div>
                            <div class="item-download">
                                <h4>Download Our App!</h4>
                                <span>Book tickets & track your coach anytime, anywhere.</span>
                                <div class="d-flex flex-lg-row flex-sm-column">
                                    <a href="" class="btn btn-gp d-flex align-items-center justify-content-center">
                                        <i class="fab fa-google-play fa-2x"></i>&nbsp;
                                        <div class="d-flex flex-column">
                                            <span>GET IT ON</span>
                                            <p>Google Play</p>
                                        </div>
                                    </a>
                                    <a href="" class="btn btn-apple d-flex align-items-center justify-content-center">
                                        <i class="fab fa-apple fa-2x"></i>&nbsp;
                                        <div class="d-flex flex-column">
                                            <span>Download on the</span>
                                            <p>App Store</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>

<?= $this->section('footer') ?>
<div class="footer-bottom">
	<?= $footer; ?>
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js'></script>
<script type='text/javascript' src='<?= base_url('assets/js/fasilitas/custom.js')?>'></script>
<?= $this->endSection() ?> 