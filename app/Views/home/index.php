<?= $this->extend('layouts/master') ?>

<?= $this->section('library') ?>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"/>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"/>
	<link rel="stylesheet" href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<?= $this->endSection() ?>

<?= $this->section('styles') ?>
	<link rel="stylesheet" href="assets/css/home/custom.css">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    
<section class="home">
	<div class="list-main">
		<div class="item-main" style="background-image: url(assets/img/bg-main-one.jpg);">
			<div class="container">
				<div class="d-flex flex-column flex-md-row justify-content-lg-between">
					<div class="d-flex flex-column">
						<h2>Find Trip And <br>Explore In The World</h2>
						<p>Explore your favorit place in the world!</p>
					</div>
					<div class="content">
						<ul class="nav navbar-tiket" id="navbar-tiket">
							<li class="nav-item active" data-target='belitiket'>Beli Tiket</li>
							<li class="nav-item" data-target="cekiket">Cek Tiket</li>
							<li class="nav-item" data-target="pariwisata">Pariwisata</li>
							<li class="nav-item" data-target="cekpaket">Cek Paket</li>
						</ul>
						<div id="content-form" >
							<div class="item-form active" id="belitiket">
								<form class="form-tiket mt-3 p-4">
									<div class="d-flex align-items-center form-item">
										<span class="icon"><i class="fal fa-map-marker-alt"></i></span>
										<div class="form-group ml-3 mb-0 w-100">
											<label>Dari</label>
											<input type="text" name="dari" id="dck" class="form-control" placeholder="Masukan Nama Daerah">
										</div>
									</div>
									<div class="d-flex align-items-center form-item">
										<span class="icon"><i class="fal fa-map-marker-alt"></i></span>
										<div class="form-group ml-3 mb-0 w-100" >
											<label>Ke</label>
											<input type="text" name="tujuan" id="tck" class="form-control" placeholder="Masukan Nama Daerah" readonly>
										</div>
									</div>
									<div class="d-flex align-items-center form-item">
										<span class="icon"><i class="fal fa-calendar"></i></span>
										<div id="date-pergi" class="form-group ml-3 mb-0 w-100">
											<div class="d-flex flex-row justify-content-between">
												<label>Pergi</label>
												<div class="form-group mb-0">
													<div class="form-inline">
														<label>pulang - pergi</label>
														<input type="checkbox" id="pulangpergi">
													</div>
												</div>
											</div>
											<input type="text" name="pergi" class="form-control datepicker" placeholder="mm/dd/yyyy" readonly>
										</div>
									</div>
									<div class="d-none form-item" id="pulang">
										
									</div>
									<div class="d-flex align-items-center form-item">
										<span class="icon"><i class="fab fa-user-alt"></i></span>
										<div class="form-group ml-3 mb-0 w-100" >
											<label>Penumpang</label>
											<select class="form-control d-none" name="penumpang" id="slcpenumpang">
												<option value="1">1 Dewasa</option>
												<option value="2">2 Dewasa</option>
												<option value="3">3 Dewasa</option>
												<option value="4">4 Dewasa</option>
											</select>
										</div>
									</div>
									<div class="d-flex align-items-center form-item">
										<span class="icon"><i class="fal fa-usd-circle"></i></span>
										<div class="form-group ml-3 mb-0 w-100" >
											<label>Kelas</label>
											<select class="form-control d-none" name="kelas" id="slckelas">
												<option value="0">Pilih Kelas</option>
												<option value="1">Executive</option>
												<option value="2">Superior</option>
											</select>
										</div>
									</div>
									<button type="submit" class="btn btn-submit">Cari Tiket</button>
								</form>
							</div>
							
							<div class="item-form" id="cekiket">
								<form class="form-tiket mt-3 p-4" action="<?= base_url('tiket') ?>">
									<div class="py-2 my-3 form-item">
										<div class="form-group mb-0 w-100">
											<input type="text" name="noboked" class="form-control" autocomplete="off" placeholder="Nomor Booking / Tiket" >
										</div>
									</div>
									<button type="submit" class="btn btn-submit">Cari Tiket</button>
								</form>
							</div>
							
							<div class="item-form" id="pariwisata">
								<form class="form-tiket mt-3 p-4">
									<a href="<?= base_url('reservasi') ?>" class="btn btn-submit">Cari Kelas Armada</a>
									<div class="py-2 mt-2 form-item">
										<div class="form-group mb-0 w-100">
											<input type="text" name="nama" class="form-control" autocomplete="off" placeholder="Nama" >
										</div>
									</div>
									<div class="py-2 form-item">
										<div class="form-group mb-0 w-100">
											<input type="text" name="nohp" class="form-control input-number" autocomplete="off" placeholder="No. handphone" >
										</div>
									</div>
									<div class="py-2 form-item">
										<div class="form-group mb-0 w-100">
											<input type="email" name="email" class="form-control" autocomplete="off" placeholder="email" >
										</div>
									</div>
									<div class="py-2 form-item">
										<div class="form-group mb-0 w-100">
											<input type="text" name="tipebis" class="form-control" placeholder="Tipe Bis" >
										</div>
									</div>
									<div class="py-2 form-item textarea">
										<div class="form-group mb-0 w-100">
											<label>Keterangan</label>
											<textarea class="form-control" name="keterangan" rows="3"></textarea>
										</div>
									</div>
									<button type="submit" class="btn btn-submit">Pesan</button>
								</form>
							</div>
							
							<div class="item-form" id="cekpaket">
								<form class="form-tiket mt-3 p-4" action="<?= base_url('paket') ?>">
									<div class="py-2 my-3 form-item">
										<div class="form-group mb-0 w-100">
											<input type="text" name="noresi" class="form-control" autocomplete="off" placeholder="Nomor Resi" >
										</div>
									</div>
									<button type="submit" class="btn btn-submit">Cari Paket</button>
								</form>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="info">
	<div class="container">
		<div class="list-info row">
			<div class="item-list col-12 col-sm-3">
				<div class="list-item d-flex flex-row">
					<span><i class="fas fa-hand-holding-heart"></i></span>
					<div class="d-flex flex-column">
						<h5>Layanan</h5>
						<p>Kepuasan penumpang adalah prioritas kami. Nikmati kemudahan dan kenyamanan layanan Juragan99.</p>
					</div>
				</div>
			</div>
			<div class="item-list col-12 col-sm-3">
				<div class="list-item d-flex flex-row">
					<span><i class="fas fa-bus-alt"></i></span>
					<div class="d-flex flex-column">
						<h5>Armada Handal</h5>
						<p>Kami Menggunakan armada dengan keluaran terbaru. Dilengkapi dengan fitur-fitur yang akan menambah kenyamanan penumpang.</p>
					</div>
				</div>
			</div>
			<div class="item-list col-12 col-sm-3">
				<div class="list-item d-flex flex-row">
					<span><i class="fas fa-tag"></i></span>
					<div class="d-flex flex-column">
						<h5>Harga Terbaik</h5>
						<p>Dapatkan penawaran harga terbaik dari kami. Juragan99 memberikan harga terbaik dengan layanan layaknya sultan.</p>
					</div>
				</div>
			</div>
			<div class="item-list col-12 col-sm-3">
				<div class="list-item d-flex flex-row">
					<span><i class="fas fa-ticket-alt"></i></span>
					<div class="d-flex flex-column">
						<h5>Reservasi Online</h5>
						<p>Semakin mudah untuk mendapatkan layanan Juragan99, pembelian tiket dapat dilakukan secara online.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="ulga">
	<div class="container">
		<div class="d-flex flex-column flex-lg-row">
			<div class="content-ulasan col-12 col-lg-4 mb-5 mb-lg-0">
				<span>Juragan99 Trans</span>
				<h3>ULASAN</h3>
				<div class="list-ulasan">
					<div class="item-list">
						<div class="d-flex flex-row profile">
							<img src="assets/img/default-avatar.png" alt="avatar">
							<div class="d-flex flex-column">
								<p>Philip Martin</p>
								<div class="Stars" style="--rating: 4.6;" aria-label="Rating of this product is 2.3 out of 5."></div>
							</div>
						</div>
						<p>Lorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been the industry's standard</p>
					</div>
					
					<div class="item-list">
						<div class="d-flex flex-row profile">
							<img src="assets/img/default-avatar.png" alt="avatar">
							<div class="d-flex flex-column">
								<p>Juragan ku</p>
								<div class="Stars" style="--rating: 4.3;" aria-label="Rating of this product is 2.3 out of 5."></div>
							</div>
						</div>
						<p>Lorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been the industry's standard</p>
					</div>
				</div>
			</div>
			<div class="content-gallery col-12 col-lg-8 ml-lg-4">
				<div class="title">
					<p>Terbaru</p>
					<h3>GALLERY</h3> 
				</div>
				<div class="list-gallery">
					<div class="item-list">
						<div class="embed-responsive embed-responsive-21by9">
							<img src="assets/img/gallery-1.jpg" alt="gallery" class="embed-responsive-item">
						</div>
					</div>
					<div class="item-list">
						<div class="embed-responsive embed-responsive-21by9">
							<img src="assets/img/gallery-1.jpg" alt="gallery" class="embed-responsive-item">
						</div>
					</div>
				</div>
				
				<div class="arrowNavigation">
                <a class="prevArrowNav slick-arrow" id="prevGallery" style=""><i class="fal fa-chevron-left" aria-hidden="true"></i></a>
                <a class="nextArrowNav slick-arrow" id="nextGallery" style=""><i class="fal fa-chevron-right" aria-hidden="true"></i></a>
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
	<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
	<script>
		var mdots = false, udots = true;
	</script> 
    <script src="assets/js/home/custom.js"></script>
<?= $this->endSection() ?> 