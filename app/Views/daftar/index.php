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
                                    <span>Full Name</span>
                                </div>
                                <div class="text-content">
                                    <input type="text" class="form-control" placeholder="Enter your full name" name="fullname" required/>
                                </div>
                            </div>

                            <div class="input-text">
                                <div class="text-label">
                                    <span>Email</span>
                                </div>
                                <div class="text-content">
                                    <input type="email" class="form-control" placeholder="Enter your email" name="email" required/>
                                </div>
                            </div>

                            <div class="input-text">
                                <div class="text-label">
                                    <span>NIK</span>
                                </div>
                                <div class="text-content">
                                    <input type="text" placeholder="Enter your NIK" name="nik" class="form-control input-number" autocomplete="off" required/>
                                </div>
                            </div>

                            <div class="input-text">
                                <div class="text-label">
                                    <span>Phone number </span>
                                </div>
                                <div class="text-content">
                                    <input type="text" placeholder="Enter your phone number"  name="nohp" class="form-control input-number" autocomplete="off" required/>
                                </div>
                            </div>

                            <div class="input-text">
                                <div class="text-label">
                                    <span>Password</span>
                                </div>
                                <div class="text-content with-icon">
                                    <input type="password" class="form-control" placeholder="Enter your password" name="password" id="daftarpassword" required/>
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