<?= $this->extend('layouts/master') ?>

<?= $this->section('library') ?>	

<?= $this->endSection() ?>

<?= $this->section('styles') ?>
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/daftar/custom.css">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section>
	<div class="container">
        <div class="content-header">

        </div>
        <div class="content-body">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-center">
                <div class="col-12 col-sm-7 mb-4">
                    <div class="d-flex w-100 justify-content-center">
                        <img src="<?= base_url('assets/img/logo.png')?>" alt="juragan 99" class="img-fluid d-block">
                    </div>
                </div>
                <div class="col-12 col-sm-5">
                    <form class="form-daftar" id="formdaftar" name="formdaftar" method="POST">
                        <div class="form-header">
                            <h2>Daftar</h2>
                        </div>
                        <div id="alert-daftar" role="alert"></div>
                        <div class="mb-0 form-group" >
                            <div class="input-text">
                                <div class="text-label">
                                    <span>Nama Depan</span>
                                </div>
                                <div class="text-content">
                                    <input type="text" class="form-control" placeholder="" name="firstName" required/>
                                </div>
                            </div>

                            <div class="input-text">
                                <div class="text-label">
                                    <span>Nama Belakang</span>
                                </div>
                                <div class="text-content">
                                    <input type="text" class="form-control" placeholder="" name="lastName" required/>
                                </div>
                            </div>

                            <div class="input-text">
                                <div class="text-label">
                                    <span>Email</span>
                                </div>
                                <div class="text-content">
                                    <input type="email" class="form-control" placeholder="" name="email" required/>
                                </div>
                            </div>

                            <div class="input-text">
                                <div class="text-label">
                                    <span>Telephone</span>
                                </div>
                                <div class="text-content">
                                    <input type="text" class="form-control" placeholder="" name="nohp" required/>
                                </div>
                            </div>

                            <div class="input-text">
                                <div class="text-label">
                                    <span>Identitas</span>
                                </div>
                                <div class="text-content">
                                    <select class="form-control" name="identity" id="slcdari">
                                        <option value="KTP">KTP</option>
                                        <option value="PASSPORT">PASSPORT</option>
                                    </select>
                                </div>
                            </div>

                            <div class="input-text">
                                <div class="text-label">
                                    <span>Nomor Identitas</span>
                                </div>
                                <div class="text-content">
                                    <input type="text" placeholder="" name="identityNumber" class="form-control" autocomplete="off" required/>
                                </div>
                            </div>

                            <div class="input-text">
                                <div class="text-label">
                                    <span>Password</span>
                                </div>
                                <div class="text-content with-icon">
                                    <input type="password" class="form-control" placeholder="" name="password" id="daftarpassword" required/>
                                    <div class="text-icon right cursor">
                                        <span class="daftar-password" id="daftar-password">
                                            <i class="fal fa-eye"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-0 form-group" >
                            <button type="submit" class="btn btn-submit" id="btndaftar">Submit</button>
                        </div>
                    </form>
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
    <script src="<?= base_url(); ?>/assets/js/daftar/custom.js"></script>
<?= $this->endSection() ?> 