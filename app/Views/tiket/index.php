<?= $this->extend('layouts/master') ?>

<?= $this->section('library') ?>
	
<?= $this->endSection() ?>

<?= $this->section('styles') ?>
    <style>
        h2 {
            color: #FFFFFF;
        }
        .content-tiket-landscape .header-tiket .item p {
            text-align: -webkit-center;
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
    <h2><?= $book['from'].' - '.$book['to'].' - '.$book['ticket'][0]['booking_date'] ?></h2>
    <h2>Tanggal Pembelian : <?= $book['created_at'] ?></h2>
    <h2>Bayar Sebelum : <?= $book['expired'] ?></h2>
    <h2>Status Pembayaran : 
        <?php if ($book['payment_status'] == "0") { ?>
            Menunggu Pembayaran
        <?php } elseif($book['payment_status'] == '1') {?>
            Sudah Dibayar
        <?php } ?>
    </h2>
    <h2>Total Pembayaran : Rp. <?= $book['total_price'] ?></h2>
    <h2>Bank : <?= $book['payment_registration']['payment_channel_code'] ?></h2>

        <?php if($book['payment_status'] == '0') {?>
            <h2>
                <?php if ($book['payment_registration']['payment_method'] == 'VIRTUAL_ACCOUNT') { ?>
                    Virtual Account : <?= $book['payment_registration']['va_number'] ?> 
                    <button class="btn btn-submit btn-md btn-block w-auto mt-4" onclick="copyToClipboard(<?= $book['payment_registration']['va_number'] ?>)">Copy Virtual Account</button>
                <?php } elseif ($book['payment_registration']['payment_method'] == 'EWALLET') { ?>
                    E-Wallet <?= substr($book['payment_registration']['payment_channel_code'] , 3)?> <br> <a href="<?= $book['payment_registration']['dekstop_link'] ?>" class="btn btn-submit btn-md w-auto mt-4" target="_blank">Klik untuk bayar</a>
                <?php } ?>
            </h2>
        <?php } elseif ($book['payment_status'] == "1") { ?>
            <div class="row align-items-center mt-5">
                <?php foreach ($ticket as $key => $value) { ?>
                <div class="col-12 col-sm-6 col-xl-4 mb-4">
                    <a href="<?= base_url('tiket/detail/'.$value['ticket_number']) ?>" class="d-block">
                        <div class="content-tiket-landscape d-flex flex-row">
                            <div class="header-tiket">
                                <div class="item">
                                    <p style="margin-top: 15px;"><?= $value['pickup_trip_location'] ?></p>
                                    <!-- <span>Agen Sunter</span> -->
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
                                    <!-- <span>Agen Darmo</span> -->
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
                                        <span class="harga"><p><?= (intval($value['price']) / intval($value['adult'])) ?></p></span>
                                    </div>
                                </div>
                                
                                <div class="dtl d-flex flex-row">
                                    <div class="form-group">
                                        <label>Berangkat</label>
                                        <span><?= $value['dep_time'] ?></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Sampai</label>
                                        <span><?= $value['arr_time'] ?></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal</label>
                                        <span><?= date("d M Y", strtotime($value['booking_date'])); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <?php } ?>
            </div>
        <?php } ?>

	</div>
</section>

<?= $this->endSection() ?>

<?= $this->section('footer') ?>
	<?= $footer; ?>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>

<?= $this->endSection() ?> 