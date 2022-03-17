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
        <form class="passenger-form" id="passengerform" name="passengerform" method="POST">
			<div class="content-form-header">
				<div id="alert-pesanan" role="alert"></div>
				<div class="d-flex justify-content-between align-items-center">
					<h5>Data Pemesan (Untuk Tiket / Voucher)</h5>
					<div class="form-group">
						<div class="form-inline check-passenger">
							<label>Sebagai Penumpang</label>
							<input type="checkbox" id="thispassenger">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12 col-sm-4">
						<div class="form-group" >
							<label>Nama Lengkap</label>
							<input type="text" name="nama" id="txtnama" class="form-control" autocomplete="off"  >
						</div>
					</div>
					<div class="col-12 col-sm-4">
						<div class="form-group">
							<label>Nomor Handphone</label>
							<input type="text" name="nohp" id="txtnohp" class="form-control input-number" autocomplete="off">
						</div>
					</div>
					<div class="col-12 col-sm-4">
						<div class="form-group">
							<label>Email</label>
							<input type="email" name="email" id="txtemail" class="form-control" autocomplete="off">
						</div>
					</div>
				</div>
			</div>
			<?php for($i = 0; $i < 3; $i++) { ?>
			<div class="content-form-body">
				<div class="d-flex justify-content-between align-items-center">
					<h5>Data Penumpang</h5>
				</div>
				<div class="row">
					<div class="col-12 col-sm-4">
						<div class="form-group" >
							<label>Nama Lengkap</label>
							<input type="text" name="pnama" class="form-control txtpnama" autocomplete="off"  >
						</div>
					</div>
					<div class="col-12 col-sm-4">
						<div class="form-group">
							<label>Nomor Handphone</label>
							<input type="text" name="pnohp" class="form-control input-number txtnohp" autocomplete="off">
						</div>
					</div>
					<div class="col-12 col-sm-4">
						<div class="form-group">
							<label>NIK</label>
							<input type="text" name="pemail" class="form-control input-number" autocomplete="off">
						</div>
					</div>
					<div class="col-12 col-sm-4">
						<div class="form-group">
							<label>Menu Makanan</label>
							<select class="form-control" name="pmenumakakanan" id="slcmenumakanan">
								<option value=""></option>
								<option value="1">Rawon</option>
								<option value="2">Soto</option>
								<option value="3">Nasi Uduk</option>
								<option value="4">Nasi Goreng</option>
							</select>
						</div>
					</div>
					<div class="col-12 col-sm-4">
						<div class="form-group">
							<label>Bilih Bagasi</label>
							<select class="form-control" name="pbagasi" id="slcbagasi">
								<option value=""></option>
								<option value="1">Bawah</option>
								<option value="2">Atas</option>
							</select>
						</div>
					</div>
					<div class="col-12 col-sm-4">
						<div class="form-group d-flex flex-row align-items-center">
							<div class="item-choose-seat col-4">
								<label>Pergi <span>No. Kursi</span></label>
								<input type="text" name="seatgo" class="form-control seatgo" id="seatgo<?= $i ?>" autocomplete="off" placeholder="-" readonly>
							</div>
							<div class="item-choose-seat pl-2 col-8">
								<button type="button" class="btn btn-submit btn-choose-seat" data-target="seatgo<?= $i ?>" data-id="bus<?= $i ?>">Pilih Kursi</button>
							</div>
						</div>
						<div class="form-group d-flex flex-row align-items-center">
							<div class="item-choose-seat col-4">
								<label>Pulang <span>No. Kursi</span></label>
								<input type="text" name="seatback" class="form-control seatback" id="seatback<?= $i ?>" autocomplete="off" placeholder="-" readonly>
							</div>
							<div class="item-choose-seat pl-2 col-8">
								<button type="button" class="btn btn-submit btn-choose-seat" data-target="seatback<?= $i ?>" data-id="bus<?= $i ?>">Pilih Kursi</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php } ?>
			<div class="content-form-footer">
				<div class="d-flex flex-column justify-content-center">
					<h5>Disclaimer</h5>
					<ul class="d-flex flex-column justify-content-center">
						<li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>
						<li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>
						<li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>
						<li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>
					</ul>
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
    <script src="<?= base_url(); ?>/assets/js/reservasi/isidata.js"></script>
    <div class="modal fade bd-example-modal-sm select-seat" id="kursibusModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="item-top-left">
                        <table>
                            <tr>
                                <td class="item-list-seat" data="A1">A1</td>
                                <td class="item-list-seat" data="A2">A2</td>
                            </tr>
                            <tr>
                                <td class="item-list-seat" data="A3">A3</td>
                                <td class="item-list-seat" data="A4">A4</td>
                            </tr>
                            <tr>
                                <td class="item-list-seat" data="A5">A5</td>
                                <td class="item-list-seat" data="A6">A6</td>
                            </tr>
                            <tr>
                                <td class="item-list-seat" data="A7">A7</td>
                                <td class="item-list-seat" data="A8">A8</td>
                            </tr>
                        </table>
                    </div>
                    
                    <div class="item-top-right">
                        <table>
                            <tr>
                                <td class="item-list-seat" data="B1">B1</td>
                                <td class="item-list-seat" data="B2">B2</td>
                            </tr>
                            <tr>
                                <td class="item-list-seat" data="B3">B3</td>
                                <td class="item-list-seat" data="B4">B4</td>
                            </tr>
                            <tr>
                                <td class="item-list-seat" data="B5">B5</td>
                                <td class="item-list-seat" data="B6">B6</td>
                            </tr>
                            <tr>
                                <td class="item-list-seat" data="B7">B7</td>
                                <td class="item-list-seat" data="B8">B8</td>
                            </tr>
                        </table>
                    </div>
                </div>
                
                <div class="d-flex justify-content-between align-items-center mt-3">
                    <div class="item-bottom-left">
                        <table>
                            <tr>
                                <td class="item-list-seat" data="C1">C1</td>
                                <td class="item-list-seat" data="C2">C2</td>
                            </tr>
                            <tr>
                                <td class="item-list-seat" data="C3">C3</td>
                                <td class="item-list-seat" data="C4">C4</td>
                            </tr>
                            <tr>
                                <td class="item-list-seat" data="C5">C5</td>
                                <td class="item-list-seat" data="C6">C6</td>
                            </tr>
                            <tr>
                                <td class="item-list-seat" data="C7">C7</td>
                                <td class="item-list-seat" data="C8">C8</td>
                            </tr>
                        </table>
                    </div>
                    
                    <div class="item-bottom-right">
                        <table>
                            <tr>
                                <td class="item-list-seat" data="D1">D1</td>
                                <td class="item-list-seat" data="D2">D2</td>
                            </tr>
                            <tr>
                                <td class="item-list-seat" data="D3">D3</td>
                                <td class="item-list-seat" data="D4">D4</td>
                            </tr>
                            <tr>
                                <td class="item-list-seat" data="D5">D5</td>
                                <td class="item-list-seat" data="D6">D6</td>
                            </tr>
                            <tr>
                                <td class="item-list-seat" data="D7">D7</td>
                                <td class="item-list-seat" data="D8">D8</td>
                            </tr>
                        </table>
                    </div>
                </div>
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