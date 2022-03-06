<?= $this->extend('layouts/master') ?>

<?= $this->section('library') ?>
	
<?= $this->endSection() ?>

<?= $this->section('styles') ?>

<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="header2">
    <div class="content-ads">

    </div>
    <div class="content-header"></div>
</div>
<section>
	<div class="container">
        <div class="row justify-content-center align-items-center mt-5">
            <div class="col-12 col-sm-4">
                <div class="content-tiket">
                    <div class="header-tiket d-flex flex-row justify-content-between align-items-center">
                        <div class="item">
                            <h3>JKT</h3>
                            <p>Jakarta</p>
                            <span>Agen Sunter</span>
                        </div>
                        <div class="item">
                            <h3>SUB</h3>
                            <p>Surabaya</p>
                            <span>Agen Darmo</span>
                        </div>
                    </div>
                    <div class="body-tiket">
                        <div class="d-flex flex-row justify-content-between">
                            <div class="dtl">
                                <div class="form-group">
                                    <label>Nama Lengkap</label>
                                    <span>Benjamin Robert</span>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal</label>
                                    <span>24 Nov 2021</span>
                                </div>
                                <div class="form-group">
                                    <label>Kelas</label>
                                    <span>Bussines</span>
                                </div>
                            </div>
                            <div class="dtl">
                                <div class="form-group">
                                    <label>No. Tiket</label>
                                    <span>BA749211</span>
                                </div>
                                <div class="form-group">
                                    <label>Waktu</label>
                                    <span>08:30 PM</span>
                                </div>
                                <div class="form-group">
                                    <label>No. Kursi</label>
                                    <span>2B</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="footer-tiket">
                        <span class="dots dot-left"></span>
                        <span class="dots dot-right"></span>
                        <svg id="bcd-BA749211" class="bcd-item"></svg>
                    </div>
                    <div class="content-form mt-2">
                        <a href="<?= base_url() ?>" class="btn btn-submit">Kirim Tiket</a>			
                    </div>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jsbarcode/3.11.5/JsBarcode.all.min.js"></script>
<script src="<?= base_url() ?>/assets/js/tiket/detail-custom.js"></script>
<?= $this->endSection() ?> 