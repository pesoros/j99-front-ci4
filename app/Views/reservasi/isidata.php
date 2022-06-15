<?= $this->extend('layouts/master') ?>

<?= $this->section('library') ?>	
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css">
<?= $this->endSection() ?>

<?= $this->section('styles') ?>
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/reservasi/custom.css">
	<style>
		#disc-wrp {
			margin-left: 40px;
		}
	</style>
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
                <li role="three" class="d-flex align-items-center">
                    <span></span>
                    <span></span>
                </li>
            </ul>
        </div>
	</div>
</div>
<section>
	
	<div class="container">
		<?php if (isset($validation)) { echo '<div class="content-form-header">Formulir data tidak boleh ada yg kosong</div>';} ?>
        <form class="passenger-form" id="passengerform" name="passengerform" action="/reservasi/isidata" onsubmit="return validateDisclaimer()" method="POST">
			<div class="content-form-header">
				<div id="alert-pesanan" role="alert"></div>
				<div class="d-flex justify-content-between align-items-center">
					<h5>Data Pemesan (Untuk Tiket / Voucher)</h5>
				</div>
				<div class="row">
					<div class="col-12 col-sm-4">
						<div class="form-group" >
							<label>Nama Lengkap</label>
							<input type="text" id="txtnama" name="txtnama" class="form-control" autocomplete="off" value="<?php isset($data['booker_name']) ? $data['booker_name'] : '' ?> ">
						</div>
					</div>
					<div class="col-12 col-sm-4">
						<div class="form-group">
							<label>Nomor Handphone</label>
							<input type="text" id="txtnohp" name="txtnohp"  class="form-control input-number" autocomplete="off" value="<?php isset($data['booker_phone']) ? $data['booker_phone'] : '' ?> ">
						</div>
					</div>
					<div class="col-12 col-sm-4">
						<div class="form-group">
							<label>Email</label>
							<input type="email" id="txtemail" name="txtemail"  class="form-control" autocomplete="off" value="<?php isset($data['booker_email']) ? $data['booker_email'] : '' ?> ">
						</div>
					</div>
				</div>
			</div>
			<?php for($i = 0; $i < $penumpang; $i++) { ?>
			<div class="content-form-body">
				<div class="d-flex justify-content-between align-items-center">
					<h5>Data Penumpang</h5>
					<?php if ($i == 0 ) { ?>
					<div class="form-group">
						<div class="form-inline check-passenger">
							<label>Gunakan data pemesan</label>
							<input type="checkbox" id="thispassenger">
						</div>
					</div>
					<?php } ?>
				</div>
				<div class="row">
					<div class="col-12 col-sm-4">
						<div class="form-group" >
							<label>Nama Lengkap</label>
							<input type="text" name="pnama[]" class="form-control txtpnama" autocomplete="off" value="<?php isset($data['pergi']['seatPicked'][$i]['name']) ? $data['pergi']['seatPicked'][$i]['name'] : '' ?>"  >
						</div>
					</div>
					<div class="col-12 col-sm-4">
						<div class="form-group">
							<label>Nomor Handphone</label>
							<input type="text" name="pnohp[]" class="form-control input-number txtnohp" autocomplete="off" value="<?php isset($data['pergi']['seatPicked'][$i]['phone']) ? $data['pergi']['seatPicked'][$i]['phone'] : '' ?>"  >
						</div>
					</div>
					<!-- <div class="col-12 col-sm-4">
						<div class="form-group">
							<label>NIK</label>
							<input type="text" name="pnik" class="form-control input-number" autocomplete="off">
						</div>
					</div> -->
					<div class="col-12 col-sm-4">
						<div class="form-group">
							<label>Bilih Bagasi</label>
							<select class="form-control" name="pbagasi[]" id="slcbagasi">
								<option value=""></option>
								<?php if (!isset($data['pergi']['seatPicked'][$i]['baggage'])) { ?>
									<option value="1" >Bawa</option>
									<option value="2" >Tidak</option>
								<?php } else { ?>
									<option value="1" <?php if ($data['pergi']['seatPicked'][$i]['baggage'] == '1') {echo 'selected';}  ?> >Bawa</option>
									<option value="2" <?php if ($data['pergi']['seatPicked'][$i]['baggage'] == '2') {echo 'selected';}  ?>>Tidak</option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="col-12 col-sm-4">
						<div class="form-group">
							<label>Menu Makanan Pergi</label>
							<select class="form-control" name="pmenumakakanango[]" id="slcmenumakanan">
								<option value=""></option>
								<?php foreach ($foodMenuGo as $key => $value) { ?>
									<?php if (!isset($data['pergi']['foodMenu'][0]['food_name'])) { ?>
										<option value="<?= $value['id'] ?>"><?= $value['food_name'] ?></option>
									<?php } else { ?>
										<option value="<?= $value['id'] ?>"  <?php if ($data['pergi']['foodMenu'][0]['food_name'] == $value['food_name'] ) {echo 'selected';} ?> ><?= $value['food_name'] ?></option>
									<?php } ?>
								<?php } ?>
							</select>
						</div>
					</div>

					<?php if ($roundTrip == true) { ?>
						<div class="col-12 col-sm-4">
							<div class="form-group">
								<label>Menu Makanan Pulang</label>
								<select class="form-control" name="pmenumakakananback[]" id="slcmenumakanan">
									<option value=""></option>
									<?php foreach ($foodMenuBack as $key => $value) { ?>
										<?php if (!isset($data['pulang']['foodMenu'][0]['food_name'])) { ?>
											<option value="<?= $value['id'] ?>"><?= $value['food_name'] ?></option>
										<?php } else { ?>
											<option value="<?= $value['id'] ?>"  <?php if ($data['pulang']['foodMenu'][0]['food_name'] == $value['food_name'] ) {echo 'selected';} ?> ><?= $value['food_name'] ?></option>
										<?php } ?>
									<?php } ?>
								</select>
							</div>
						</div>
					<?php } ?>

					<div class="col-12 col-sm-4">
						<div class="form-group d-flex flex-row align-items-center">
							<div class="item-choose-seat col-4">
								<label>Pergi <span>No. Kursi</span></label>
								<input type="text" name="seatgo[]" class="form-control seatgo" id="seatgo<?= $i ?>" autocomplete="off" placeholder="-" value="<?php isset($data['pergi']['seatPicked'][$i]['seat']) ? $data['pergi']['seatPicked'][$i]['seat'] : '' ?>" readonly>
							</div>
							<div class="item-choose-seat pl-2 col-8">
								<button type="button" class="btn btn-submit btn-choose-seat" data-target="seatgo<?= $i ?>" data-type="0" data-id="pergi">Pilih Kursi</button>
							</div>
						</div>
						<?php if ($roundTrip == true) { ?>
							<div class="form-group d-flex flex-row align-items-center">
								<div class="item-choose-seat col-4">
									<label>Pulang <span>No. Kursi</span></label>
									<input type="text" name="seatback[]" class="form-control seatback" id="seatback<?= $i ?>" autocomplete="off" placeholder="-" value="<?php isset($data['pulang']['seatPicked'][$i]['seat']) ? $data['pulang']['seatPicked'][$i]['seat'] : '' ?>"" readonly>
								</div>
								<div class="item-choose-seat pl-2 col-8">
									<button type="button" class="btn btn-submit btn-choose-seat" data-target="seatback<?= $i ?>" data-type="1" data-id="pulang">Pilih Kursi</button>
								</div>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
			<?php } ?>
			<div class="content-form-footer">
				<div class="d-flex flex-column justify-content-center">
					<?= $disclaimer['content'] ?>
				</div>
				<div id="disc-wrp">
					<input class="form-check-input" type="checkbox" value="" id="disc" name="disc" id="flexCheckDefault">
						Ya, Saya mengerti
				</div>
			</div>
			<div class="form-group d-flex justify-content-end">
				<button type="submit" class="btn btn-submit" id="btn-pesanan">Konfirmasi Pesanan</button>
			</div>
		</form>
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
    <script src="<?= base_url(); ?>/assets/js/reservasi/isidatas.js"></script>
	<script>
		function validateDisclaimer() {
			if (!document.getElementById('disc').checked) {
				alert("Checklist disclaimer harus di centang / setujui");
				return false;
			}
		}
	</script>
    <div class="modal fade bd-example-modal-sm select-seat" id="kursibusModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body seatlay">
				
            </div>
            
            <div class="modal-footer">
                <div class="w-100 d-flex flex-row justify-content-center align-items-center info-status">
                    <div class="d-block">
                        <span><span></span> Available</span>
                        <span><span></span> Reserved</span>
                        <span><span></span> Selected</span>
                    </div>
                </div>
				<div class="row align-items-center w-100">
					<div class="col-6 pl-0 pr-2">
						<button type="button" class="btn btn-close" data-dismiss="modal">Tutup</button>
					</div>
					<div class="col-6 pl-2 pr-0">
						<button type="button" class="btn btn-submit" id="btnpilih">Pilih</button>
					</div>
					<input type="hidden" id="inputtseat" >
				</div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?> 