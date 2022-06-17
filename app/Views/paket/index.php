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
                            <p><?= $paket['pool_sender_id'] ?></p>
                        </div>
                        <div class="item">
                            <p><?= $paket['pool_receiver_id'] ?></p>
                        </div>
                    </div>
                    <div class="body-tiket">
                        <div class="d-flex flex-row justify-content-between">
                            <div class="dtl">
                                <div class="form-group">
                                    <label>Nomor Resi</label>
                                    <span><?= $paket['packet_code'] ?></span>
                                </div>
                                <!-- <div class="form-group">
                                    <label>Tanggal</label>
                                    <span><?= $paket['created_at'] ?></span>
                                </div> -->
                                <div class="form-group">
                                    <label>Pengirim</label>
                                    <span><?= $paket['sender_name'] ?></span>
                                </div>
                                <div class="form-group">
                                    <label>Penerima</label>
                                    <span><?= $paket['receiver_name'] ?></span>
                                </div>
                            </div>
                            <div class="dtl">
                                <div class="form-group">
                                    <label>Berat</label>
                                    <span><?= $paket['weight'] ?></span>
                                </div>
                                <div class="form-group">
                                    <label>Tinggi</label>
                                    <span><?= $paket['height'] ?></span>
                                </div>
                                <div class="form-group">
                                    <label>Lebar</label>
                                    <span><?= $paket['width'] ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="footer-tiket">
                        <span class="dots dot-left"></span>
                        <span class="dots dot-right"></span>
                        <?php foreach ($paket['trace'] as $key => $value) { ?>
                            <p><?php echo $value; ?></p>
                        <?php } ?>
                        <!-- <svg id="bcd-1234567890" class="bcd-item"></svg> -->
                    </div>
                    <!-- <div class="content-form mt-2">
                        <a href="<?= base_url('kategori') ?>" class="btn btn-submit">Kirim Paket</a>			
                    </div> -->
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
<script src="<?= base_url() ?>/assets/js/paket/custom.js"></script>
<?= $this->endSection() ?> 