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
                <li role="two" class="d-flex align-items-center">
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
        <div class="content-reservasi">
            <h2>Tiket Pergi</h2>
            <div class="reservasi-header">
                <form class="search-form" id="searchform" name="formsearch" method="POST">
                    <div class="row align-items-center">
                        <div class="col-6 col-sm-3 col-lg-2">
                            <div class="form-group" >
                                <label>Bus / shuttel</label>
                                <select class="form-control" name="bus" id="slcbus">
                                    <option value=""></option>
                                    <option value="1">Bus 1</option>
                                    <option value="2">Bus 2</option>
                                    <option value="3">Bus 3</option>
                                    <option value="4">Bus 4</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6 col-sm-3 col-lg-2">
                            <div class="form-group" >
                                <label>Tanggal Keberangkatan</label>
                                <input type="text" name="dateto" id="dateto" class="form-control datepicker" placeholder="mm-dd-yyyy" readonly>
                            </div>
                        </div>
                        <div class="col-6 col-sm-3 col-lg-1">
                            <div class="form-group" >
                                <label>Penumpang</label>
                                <select class="form-control" name="penumpang" id="slcpenumpang">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6 col-sm-3 col-lg-2">
                            <div class="form-group" >
                                <label>Kota Keberangkatan</label>
                                <select class="form-control" name="incity" id="slcincity">
                                    <option value=""></option>
                                    <option value="jakarta">Jakarta</option>
                                    <option value="surabaya">Surabaya</option>
                                    <option value="madura">Madura</option>
                                    <option value="jayapura">Jayapura</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6 col-sm-3 col-lg-2">
                            <div class="form-group" >
                                <label>Kota Tujuan</label>
                                <select class="form-control" name="offcity" id="slcoffcity">
                                    <option value=""></option>
                                    <option value="jakarta">Jakarta</option>
                                    <option value="surabaya">Surabaya</option>
                                    <option value="madura">Madura</option>
                                    <option value="jayapura">Jayapura</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6 col-sm-3 col-lg-2">
                            <div class="form-group" >
                                <label>Kelas Armada</label>
                                <select class="form-control" name="kelas" id="slckelas">
                                    <option value=""></option>
                                    <option value="executive">Executive</option>
                                    <option value="superior">Superior</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6 col-sm-3 col-lg-1">
                            <div class="form-group" >
                                <label>&nbsp;</label>
                                <button type="submit" class="btn btn-submit"  id="btn-cari">Cari</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            
            <div class="reservasi-body">
                <div class="row align-items-center mt-5" id="listresevasi">
                    <?php foreach($listbus as $key => $value) { ?>
                    <div class="col-12 col-sm-6 col-lg-4 mb-4">
                        <div class="card p-2 border-radius-12">
                            <div class="embed-responsive embed-responsive-13by9">
                                <img class="embed-responsive-item border-radius-12" src="<?= base_url(); ?>/assets/img/img-bus-1.jpg" alt="Card image cap">
                            </div>
                            <div class="card-body px-0 py-2">
                                <div class="d-flex flex-row justify-content-between">
                                    <div class="card-item-one-top-left">
                                        <p><?= $value['class'] ?></p>
                                        <span>
                                            <span class="mr-1"><i class="fas fa-plug"></i></span>
                                            <span  class="mr-1"><i class="fas fa-smoking"></i></span>
                                            <span  class="mr-1"><i class="fas fa-restroom"></i></span>
                                            <span  class="mr-1"><i class="fas fa-coffee"></i></span>
                                        </span>
                                    </div>
                                    <div class="card-item-one-top-right">
                                        <span>Harga</span>
                                        <p class="harga">Rp <?= $value['price'] ?> <span> / orang</span></p>
                                    </div>
                                </div>
                                <div class="d-flex flex-row justify-content-between align-items-center">
                                    <div class="card-item-one-bottom-left d-flex align-items-center">
                                        <div class="item-bottom-left">
                                            <span><?= $value['start']  ?></span>
                                            <p><?= $berangkat?> </p>
                                            <span><?= $value['pickup_trip_location'] ?></span>
                                        </div>
                                        <div class="item-bottom-left d-flex justify-content-center align-items-center">
                                            <span class="dots"></span>
                                            <span class="dot-dashed"><span>12 j 10 m</span></span>
                                            <span class="dots"></span>
                                        </div>
                                        <div class="item-bottom-left">
                                            <span><?= $value['end']  ?></span>
                                            <p><?= $tujuan ?> </p>
                                            <span><?= $value['drop_trip_location'] ?></span>
                                        </div>
                                    </div>
                                    <div class="card-item-one-bottom-right d-flex">
                                        <p><span>Sisa Kursi</span> <?= $value['seatAvail']  ?> Kursi</p>
                                        <button type="button" class="btn btn-black btn-reserved" data="<?= $tanggal.'_'.$value['trip_id_no'].'_'.$value['trip_route_id'].'_'.$value['fleet_registration_id'].'_'.$value['type'] ?>"><i class="fas fa-loveseat"></i></button>
                                        <a href="<?= base_url('reservasi/pick/'.$value['trip_id_no'].'/'.$value['trip_route_id'].'/'.$value['price'].'/'.$value['type'].'/'.$value['resto_id'])?>" class="btn btn-submit">Pesan</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
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
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="<?= base_url(); ?>/assets/js/reservasi/pergi.js"></script>
    <div class="modal fade bd-example-modal-sm" id="kursibusModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body seatlay">
                
            </div>
            
            <div class="modal-footer">
                <div class="w-100 d-flex flex-row justify-content-center align-items-center info-status">
                    <div class="d-block">
                        <span><span></span> Available</span>
                        <span><span></span> Reserved</span>
                    </div>
                </div>
                <button type="button" class="btn btn-submit" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?> 