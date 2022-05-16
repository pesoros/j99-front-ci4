<?= $this->extend('layouts/master') ?>

<?= $this->section('library') ?>
	
<?= $this->endSection() ?>

<?= $this->section('styles') ?>
	<link rel="stylesheet" href="<?= base_url() ?>/assets/css/kategori/custom.css">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    
<section id="executive">
	<div class="container">
        <div class="content-header">
            <img src="<?= base_url() ?>/assets/img/logo.png" alt="Juragan 99" class="img-fluid mx-auto d-block">
            <h2>EXECUTIVE CLASS</h2>
        </div>
        <div class="content-body">
            <div class="row">
                <div class="col-12 col-sm-6 col-lg-4 content-item">
                    <img src="<?= base_url() ?>/assets/img/img-1.jpg" alt="Smart TV" class="img-fluid img-portrait">
                    <div class="content-desc">
                        <div class="d-flex justify-content-between">
                            <span>Fasilitas</span>
                            <span>Juragan99 Trans</span>
                        </div>
                        <h3>Smart TV</h3>
                    </div>
                    <p></p>
                </div>
                <div class="col-12 col-sm-6 col-lg-4 content-item">
                    <img src="<?= base_url() ?>/assets/img/img-2.jpg" alt="USB Charge" class="img-fluid img-portrait">
                    <div class="content-desc">
                        <div class="d-flex justify-content-between">
                            <span>Fasilitas</span>
                            <span>Juragan99 Trans</span>
                        </div>
                        <h3>USB Charge</h3>
                    </div>
                    <p></p>
                </div>
                <div class="col-12 col-sm-6 col-lg-4 content-item">
                    <img src="<?= base_url() ?>/assets/img/img-3.jpg" alt="Arm Rest" class="img-fluid img-portrait">
                    <div class="content-desc">
                        <div class="d-flex justify-content-between">
                            <span>Fasilitas</span>
                            <span>Juragan99 Trans</span>
                        </div>
                        <h3>Arm Rest</h3>
                    </div>
                    <p></p>
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

<?= $this->endSection() ?> 