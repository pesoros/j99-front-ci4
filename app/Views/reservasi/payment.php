<?= $this->extend('layouts/master') ?>

<?= $this->section('library') ?>	
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css">
<?= $this->endSection() ?>

<?= $this->section('styles') ?>
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/reservasi/custom.css">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="header2">
    <div class="content-ads">

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
        <form class="payment-form" id="paymenform" name="paymenform" method="POST">
			<div class="content-form-header">
				<div id="alert-payment" role="alert"></div>
				<div class="d-flex justify-content-between align-items-center">
					<h5>Data Pemesan (Untuk Tiket / Voucher)</h5>
				</div>
				<div class="row">
					<div class="col-12 col-sm-4">
						<div class="form-group" >
							<label>Nama Lengkap</label>
							<p><?= $data['booker_name'] ?></p>
						</div>
					</div>
					<div class="col-12 col-sm-4">
						<div class="form-group">
							<label>Nomor Handphone</label>
							<input type="text" name="nohp" id="txtnohp" class="form-control input-number" autocomplete="off" value="<?= $data['booker_phone'] ?>">
						</div>
					</div>
					<div class="col-12 col-sm-4">
						<div class="form-group">
							<label>Email</label>
							<p id="email"><?= $data['booker_email'] ?></p>
						</div>
					</div>
				</div>
			</div>
			<?php foreach($data['pergi']['seatPicked'] as $key => $value){ ?>
			<div class="content-form-body">
				<div class="d-flex justify-content-between align-items-center">
					<h5>Data Penumpang</h5>
				</div>
				<div class="row">
					<div class="col-12 col-sm-4  col-lg-2 ">
						<div class="form-group" >
							<label>Nama Lengkap</label>
							<p><?= $value['name'] ?></p>
						</div>
					</div>
					<div class="col-12 col-sm-4 col-lg-3">
						<div class="form-group">
							<label>Nomor Handphone</label>
							<p><?= $value['phone'] ?></p>
						</div>
					</div>
                    <div class="col-12 col-sm-4 col-lg-1">
						<div class="form-group">
							<label></label>
							<p>Pergi</p>
					        <?php if ($roundTrip == true) { ?>
                                <p>Pulang</p>
                            <?php } ?>
						</div>
					</div>
					<div class="col-12 col-sm-4 col-lg-3">
						<div class="form-group">
							<label>Menu Makanan</label>
							<p><?= $data['pergi']['foodMenu'][$key]['food_name']; ?></p>
					        <?php if ($roundTrip == true) { ?>
                                <p><?= $data['pulang']['foodMenu'][$key]['food_name'];  ?></p>
                            <?php } ?>
						</div>
					</div>
					<div class="col-12 col-sm-4 col-lg-2">
						<div class="form-group">
							<label>Bagasi</label>
							<p>
                                <?php if ($value['baggage'] == "1") { ?>
                                    Bawa
                                <?php } else { ?>
                                    Tidak
                                <?php } ?>
                            </p>
                            <?php if ($roundTrip == true) { ?>
                                <p>
                                    <?php if ($data['pergi']['seatPicked'][$key] == "1") { ?>
                                        Bawa
                                    <?php } else { ?>
                                        Tidak
                                    <?php } ?>
                                </p>
                            <?php } ?>
						</div>
					</div>
					<div class="col-12 col-sm-4 col-lg-1">
						<div class="form-group">
                            <label>Kursi</label>
                            <p><?= $value['seat'] ?></p>
                            <?php if ($roundTrip == true) { ?>
                                <p><?= $data['pulang']['seatPicked'][$key]['seat'];  ?></p>
                            <?php } ?>
						</div>
					</div>
				</div>
			</div>
			<?php } ?>
            <div class="row justify-content-between">
                <div class="col-12 col-sm-6  col-md-4 mb-4">
                    <!-- <div class="form-group">
                        <label>Kode Promo</label>
                        <input type="text" name="promo" id="promo" class="form-control" autocomplete="off" placeholder="Masukan Kode Promo" >
                    </div> -->
                    
                    <div class="form-group">
                        <label>Metode Pembayaran</label>
                        <select class="form-control" name="paymenmethod" id="slcpaymenmethod">
                            <option value=""></option>
                            <?php foreach ($dataPayment as $key => $value) { ?>
                                <?php if ($value['is_enabled']) { ?>
                                <?php if ($value['channel_code'] !== 'QRIS') { ?>
                                    <option value="<?= $value['channel_category'].'-'.$value['channel_code'] ?>"><?= $value['name'] ?></option>
                                <?php } ?>
                                <?php } ?>
                            <?php } ?>
                            <!-- <option value="VIRTUAL_ACCOUNT-BCA" data-image="<?= base_url('/assets/img/icon/ic-bca.png'); ?>">BCA Virtial Account</option> -->
                            <!-- <option value="VIRTUAL_ACCOUNT-MANDIRI" data-image="<?= base_url('/assets/img/icon/ic-mandiri.png'); ?>">Mandiri</option>
                            <option value="VIRTUAL_ACCOUNT-BNI" data-image="<?= base_url('/assets/img/icon/ic-bni.png'); ?>">BNI</option>
                            <option value="VIRTUAL_ACCOUNT-BRI" data-image="<?= base_url('/assets/img/icon/ic-bri.png'); ?>">BRI</option> -->
                        </select>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-5 ">
                    <div class="content-bill">
                        <div class="item-bill d-flex flex-row justify-content-between">
                            <span><?= $data['pergi']['pickup_location'] ?> - <?= $data['pergi']['drop_location'] ?> </span>
                            <span>Rp. <?= $priceGo ?></span>
                        </div>
                        <?php if ($priceBack !== 0) { ?>
                            <div class="item-bill d-flex flex-row justify-content-between">
                                <span><?= $data['pulang']['pickup_location'] ?> - <?= $data['pulang']['drop_location'] ?> </span>
                                <span>Rp. <?= $priceBack ?></span>
                            </div>
                        <?php } ?>
                        <!-- <div class="item-bill d-flex flex-row justify-content-between">
                            <span>Payment Gateway Fee</span>
                            <span>Rp. 4.000,00</span>
                        </div> -->
                        <div class="item-bill d-flex flex-row justify-content-between">
                            <span>Total Harga</span>
                            <span class="total">Rp. <?= $sumPrice ?></span>
                        </div>
                    </div>
                    <div class="form-group d-flex justify-content-end mt-4">
                        <button type="submit" class="btn btn-submit" id="btn-payment">Proses Pembayaran</button>
                    </div>
                </div>
            </div>
		</form>
	</div>
</section>

<?= $this->endSection() ?>

<?= $this->section('footer') ?>
	<?= $footer; ?>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
	<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="<?= base_url(); ?>/assets/js/reservasi/payment.js"></script>
    <div class="modal fade bd-example-modal-sm" id="otpModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
            <form class="otpcode-form" id="otpcodeform" name="otpcodeform" method="POST">
                <div class="modal-body">
				    <div id="alert-otp" role="alert"></div>
                    <div class="form-group mb-0" >
                        <label>Masukkan 4 Digit Kode OTP</label>
                        <input type="text" name="otpcode" id="otpcode" class="form-control" autocomplete="off"  placeholder="Kode OTP ">
                        <span>Kirim ulang kode <span id="countdown">00:00</span></span>
                        <a href="javascript:void(0);" id="sendemail">Kirim lewat E-mail</a>
                    </div>
                </div>
                
                <div class="modal-footer">
                    <button type="submit" class="btn btn-submit" id="btnpilih">Lanjutkan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?> 