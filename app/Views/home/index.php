<?= $this->extend('layouts/master') ?>

<?= $this->section('library') ?>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"/>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"/>
	<link rel="stylesheet" href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css">
<?= $this->endSection() ?>

<?= $this->section('styles') ?>
	<link rel="stylesheet" href="assets/css/home/custom.css">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    
<section class="home">
	<div class="list-main">
		<div class="item-main" style="background-image: url(assets/img/bg-main-one.jpg);">
			<div class="container">
				<div class="d-flex flex-column flex-lg-row justify-content-lg-between">
					<div class="d-flex flex-column">
						<h2>Find Trip And <br>Explore In The World</h2>
						<p>Explore your favorit place in the world!</p>
					</div>
					<div class="content">
						<div class="d-flex">
							<a href="" class="nav-tiket active">Beli Tiket</a>
							<a href="" class="nav-tiket">Cek Tiket</a>
							<a href="" class="nav-tiket">Pariwisata</a>
							<a href="" class="nav-tiket">Beli Paket</a>
						</div>
						<form class="form-tiket mt-3 p-4">
							<div class="d-flex align-items-center form-item">
								<span class="icon"><i class="fal fa-map-marker-alt"></i></span>
								<div class="form-group ml-3 mb-0 w-100">
									<label>Dari</label>
									<input type="text" name="dari" class="form-control" placeholder="Masukan Nama Daerah" placeholder="Disabled input">
								</div>
							</div>
							<div class="d-flex align-items-center form-item">
								<span class="icon"><i class="fal fa-map-marker-alt"></i></span>
								<div class="form-group ml-3 mb-0 w-100" >
									<label>Ke</label>
									<input type="text" name="tujuan" class="form-control" placeholder="Masukan Nama Daerah">
								</div>
							</div>
							<div class="d-flex align-items-center form-item">
								<span class="icon"><i class="fal fa-map-marker-alt"></i></span>
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
								<span class="icon"><i class="fal fa-map-marker-alt"></i></span>
								<div class="form-group ml-3 mb-0 w-100" >
									<label>Penumpang</label>
									<input type="text" name="penumpang" class="form-control" placeholder="Pilih Penumpang">
								</div>
							</div>
							<div class="d-flex align-items-center form-item">
								<span class="icon"><i class="fal fa-map-marker-alt"></i></span>
								<div class="form-group ml-3 mb-0 w-100" >
									<label>Kelas</label>
									<input type="text" name="kelas" class="form-control" placeholder="Pilih Kelas">
								</div>
							</div>
							<button type="submit" class="btn btn-submit">Submit</button>
						</form>
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
	<script>
		var mdots = false, udots = true;
	</script> 
    <script src="assets/js/home/custom.js"></script>
<?= $this->endSection() ?> 