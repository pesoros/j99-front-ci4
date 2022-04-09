<?= $this->extend('layouts/master') ?>

<?= $this->section('library') ?>	
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css">
<?= $this->endSection() ?>

<?= $this->section('styles') ?>
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/reservasi/custom.css">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section id="invoice">
	<div class="container">
        <div class="content-body">
            <div class="countdown">
                <span id="countdow">00:00</span>
            </div>
            <div class="row">
                <div class="col-12 col-md-6 items pr-0 pr-md-5 pb-5 pr-md-0">
                    <h2>Invoice Pembayaran</h2>
                    <div class="item-body">
                        <div class="d-flex flex-row justify-content-between">
                            <span>Surabaya - Jakarta x 1</span>
                            <span>Rp. <?= $priceGo ?></</span>
                        </div>
                        <?php if ($priceBack !== 0) { ?>
                            <div class="d-flex flex-row justify-content-between">
                                <span>Jakarta - Surabaya x 1</span>
                                <span>Rp. <?= $priceBack ?></</span>
                            </div>
                        <?php } ?>
                        <!-- <div class="d-flex flex-row justify-content-between">
                            <span>Payment Gateway Fee</span>
                            <span>Rp. 4.000,00</span>
                        </div> -->
                    </div>
                    <div class="item-footer">
                        <div class="d-flex flex-row justify-content-between align-items-center">
                            <span>Total Harga</span>
                            <span>Rp. <?= $sumPrice ?></span>
                        </div>
                        <?php if ($bookingData['payment_method'] == 'VIRTUAL_ACCOUNT') { ?>
                            <div class="d-flex flex-row justify-content-between align-items-center">
                                <span>Virtual Account</span>
                                <span><?= $payment['bank_code'].' '.$payment['account_number'] ?></span>
                            </div>
                            <div class="d-flex flex-row justify-content-between align-items-center">
                                <span></span>
                                <button class="btn btn-submit btn-md btn-block w-auto mt-4" onclick="copyToClipboard(<?= $payment['account_number'] ?>)">Copy Virtual Account</button>
                            </div>
                        <?php } elseif($bookingData['payment_method'] == 'EWALLET') {?>
                            <div class="d-flex flex-row justify-content-between align-items-center">
                                <span>E Wallet </span>
                                <span><?= substr($payment['channel_code'],3) ?></span>
                            </div>
                        <?php } ?>
                        
                    </div>
                </div>
                <?php if ($bookingData['payment_method'] == 'VIRTUAL_ACCOUNT') { ?>
                <div class="col-12 col-md-6 pl-0 pl-md-5 pt-5 pt-md-0 items">
                    <h2>Tata Cara Pembayaran</h2>
                    <div class="w-accordion" style="margin: 0;">
                        <div class="w-accordion-menu">
                            ATM <?= $payment['bank_code'] ?>
                            <div class="float-right"><i class="far fa-chevron-up"></i></div>
                        </div>
                        <div class="w-accordion-content">
                            <ol>
                                <li class="mt-10 mb-10">Masukkan Kartu ATM <?= $payment['bank_code'] ?> &amp; PIN</li>
                                <li class="mt-10 mb-10">Pilih menu Transaksi Lainnya &gt; Transfer &gt; ke Rekening <?= $payment['bank_code'] ?> Virtual Account</li>
                                <li class="mt-10 mb-10">Masukkan 5 angka kode perusahaan untuk Tokopedia (80777) dan Nomor HP yang terdaftar di akun Tokopedia Anda (Contoh: <?= $payment['account_number'] ?></)</li>
                                <li class="mt-10 mb-10">Di halaman konfirmasi, pastikan detil pembayaran sudah sesuai seperti No VA, Nama, Perus/Produk dan Total Tagihan</li>
                                <li class="mt-10 mb-10">Masukkan Jumlah Transfer sesuai dengan Total Tagihan</li>
                                <li class="mt-10 mb-10">Ikuti instruksi untuk menyelesaikan transaksi</li>
                                <li class="mt-10 mb-10">Simpan struk transaksi sebagai bukti pembayaran</li>
                            </ol>
                        </div>
                        <div class="w-accordion-menu">
                            m-<?= $payment['bank_code'] ?> (<?= $payment['bank_code'] ?> mobile)
                            <div class="float-right"><i class="far fa-chevron-down"></i></div>
                        </div>
                        <div class="w-accordion-content">
                            <ol>
                                <li class="mt-10 mb-10">Lakukan log in pada aplikasi <?= $payment['bank_code'] ?> Mobile</li>
                                <li class="mt-10 mb-10">Pilih menu m-<?= $payment['bank_code'] ?>, kemudian masukkan kode akses m-<?= $payment['bank_code'] ?></li>
                                <li class="mt-10 mb-10">Pilih m-Transfer &gt; <?= $payment['bank_code'] ?> Virtual Account</li>
                                <li class="mt-10 mb-10">Pilih dari Daftar Transfer, atau masukkan 5 angka kode perusahaan untuk Tokopedia (80777) dan Nomor HP yang terdaftar di akun Tokopedia Anda (Contoh: <?= $payment['account_number'] ?></)</li>
                                <li class="mt-10 mb-10">Masukkan pin m-<?= $payment['bank_code'] ?></li>
                                <li class="mt-10 mb-10">Pembayaran selesai. Simpan notifikasi yang muncul sebagai bukti pembayaran</li>
                            </ol>
                        </div>
                        <div class="w-accordion-menu">
                            Internet Banking <?= $payment['bank_code'] ?>
                            <div class="float-right"><i class="far fa-chevron-down"></i></div>
                        </div>
                        <div class="w-accordion-content">
                            <ol>
                                <li class="mt-10 mb-10">Login pada alamat Internet Banking <?= $payment['bank_code'] ?> (<a href="https://klik<?= $payment['bank_code'] ?>.com" target="_blank">https://klik<?= $payment['bank_code'] ?>.com</a>)</li>
                                <li class="mt-10 mb-10">Pilih menu Pembayaran Tagihan &gt; Pembayaran &gt; <?= $payment['bank_code'] ?> Virtual Account</li>
                                <li class="mt-10 mb-10">Pada kolom kode bayar, masukkan 5 angka kode perusahaan untuk Tokopedia (80777) dan Nomor HP yang terdaftar di akun Tokopedia Anda (Contoh: <?= $payment['account_number'] ?></)</li>
                                <li class="mt-10 mb-10">Di halaman konfirmasi, pastikan detil pembayaran sudah sesuai seperti Nomor <?= $payment['bank_code'] ?> Virtual Account, Nama Pelanggan dan Jumlah Pembayaran</li>
                                <li class="mt-10 mb-10">Masukkan <span class="italic">password</span> dan mToken</li>
                                <li class="mt-10 mb-10">Cetak/simpan struk pembayaran <?= $payment['bank_code'] ?> Virtual Account sebagai bukti pembayaran</li>
                            </ol>
                        </div>
                        <div class="w-accordion-menu">
                            Kantor Bank <?= $payment['bank_code'] ?>
                            <div class="float-right"><i class="far fa-chevron-down"></i></div>
                        </div>
                        <div class="w-accordion-content">
                            <ol>
                                <li class="mt-10 mb-10">Ambil nomor antrian transaksi Teller dan isi slip setoran</li>
                                <li class="mt-10 mb-10">Serahkan slip dan jumlah setoran kepada Teller <?= $payment['bank_code'] ?></li>
                                <li class="mt-10 mb-10">Teller <?= $payment['bank_code'] ?> akan melakukan validasi transaksi</li>
                                <li class="mt-10 mb-10">Simpan slip setoran hasil validasi sebagai bukti pembayaran</li>
                            </ol>
                        </div>
                    </div>
                </div>  
                <?php } ?>
                <?php if ($bookingData['payment_method'] == 'EWALLET') { ?>
                <div class="col-12 col-md-6 pl-0 pl-md-5 pt-5 pt-md-0 items" style="align-self: center;">
                    <a href="<?= $payment['actions']['desktop_web_checkout_url'] ?>" target="_blank" class="btn btn-submit">Klik untuk proses pembayaran</a>
                </div>  
                <?php } ?>
            </div>
        </div>
        <div class="content-footer">
            <div class="d-flex flex-row justify-content-center">
                <?php if ($bookingData['payment_method'] == 'VIRTUAL_ACCOUNT') { ?>
                    <a href="<?= base_url('/tiket?noboked='.$payment['external_id']) ?>" class="btn btn-submit">Cek Tiket</a>
                <?php } ?>
                <?php if ($bookingData['payment_method'] == 'EWALLET') { ?>
                    <a href="<?= base_url('/tiket?noboked='.$payment['reference_id']) ?>" class="btn btn-submit">Cek Tiket</a>
                <?php } ?>
                <a href="<?= base_url('/tiket') ?>" class="btn btn-submit">Print / Download Invoice</a>
            </div>
        </div>
	</div>
</section>

<?= $this->endSection() ?>

<?= $this->section('footer') ?>
	<?= $footer; ?>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
    <script src="<?= base_url(); ?>/assets/js/reservasi/invoice.js"></script>
<?= $this->endSection() ?> 