<?= $this->extend('layouts/master') ?>

<?= $this->section('library') ?>
	
<?= $this->endSection() ?>

<?= $this->section('styles') ?>
    <style>
        h2 {
            color: #FFFFFF;
        }
    </style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="header2">
    <div class="content-ads">

    </div>
    <div class="content-header"></div>
</div>
<section>
	<div class="container">
    <h2>Kode Booking : <?= $book['booking_code'] ?></h2>
    <h2>Status Pembayaran : 
        <?php if ($book['payment_status'] == "0") { ?>
            Menunggu Pembayaran
        <?php } elseif($book['payment_status'] == '1') {?>
            Sudah Dibayar
        <?php } ?>
    </h2>

        <div class="row align-items-center mt-5">
        <?php if($book['payment_status'] == '1') {?>

            <?php foreach ($ticket as $key => $value) { ?>
            <div class="col-12 col-sm-6 col-xl-4 mb-4">
                <a href="<?= base_url('tiket/detail/'.$value['ticket_number']) ?>" class="d-block">
                    <div class="content-tiket-landscape d-flex flex-row">
                        <div class="header-tiket">
                            <div class="item">
                                <p><?= $value['pickup_trip_location'] ?></p>
                                <span>Agen Sunter</span>
                            </div>
                            <div class="item">
                                <span class="dots-vertical">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </span>
                            </div>
                            <div class="item">
                                <p><?= $value['drop_trip_location'] ?></p>
                                <span>Agen Darmo</span>
                            </div>
                        </div>
                        
                        <div class="body-tiket d-flex flex-column justify-content-center align-items-center">
                            <span class="dots dot-left-top"></span>
                            <span class="dots dot-left-bottom"></span>
                            <div class="dtl d-flex flex-row">
                                <div class="form-group">
                                    <label>No. Booking</label>
                                    <span><p><?= $value['ticket_number'] ?></p></span>
                                </div>
                                <div class="form-group">
                                    <label>No. Kursi</label>
                                    <span><p><?= $value['seat_number'] ?></p></span>
                                </div>
                                <div class="form-group">
                                    <label>Harga</label>
                                    <span class="harga"><p><?= $value['price'] ?></p></span>
                                </div>
                            </div>
                            
                            <div class="dtl d-flex flex-row">
                                <div class="form-group">
                                    <label>Berangkat</label>
                                    <span>08:30 PM</span>
                                </div>
                                <div class="form-group">
                                    <label>Sampai</label>
                                    <span>10:40 PM</span>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal</label>
                                    <span>20 Feb 2022</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <?php } ?>
        <?php } ?>
        </div>
	</div>
</section>

<?= $this->endSection() ?>

<?= $this->section('footer') ?>
	<?= $footer; ?>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>

<?= $this->endSection() ?> 