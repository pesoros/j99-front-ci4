<?= $this->extend('layouts/master') ?>

<?= $this->section('library') ?>	

<?= $this->endSection() ?>

<?= $this->section('styles') ?>
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/forgot/custom.css">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section>
	<div class="container">
        <div class="content-body">
            <div class="d-flex justify-content-center align-items-center">
                <div class="col-12 col-sm-4">
                    <form class="form-forgot" id="formreset" name="formreset" method="POST">
                        <div class="form-header">
                            <h2>Reset Password</h2>
                            <p>Masukan Password baru anda.</p>
                            <input type="hidden" class="form-control" id="apiendpoint" value="<?= getenv('API_ENDPOINT') ?>"/>
                            <input type="hidden" class="form-control" id="token" name="token" value="<?= $profile['token'] ?>"/>
                        </div>
                        <div id="alert-forgot" role="alert"></div>
                        <div class="mb-0 form-group" >
                            <div class="input-text">
                                <div class="text-content">
                                    <input type="text" class="form-control" placeholder="email" name="email" value="<?= $profile['email'] ?>" disabled/>
                                </div>
                            </div>
                            <div class="input-text">
                                <div class="text-content with-icon">
                                    <input type="password" class="form-control" placeholder="Password" name="password" id="password" required/>
                                    <div class="text-icon right cursor">
                                        <span class="daftar-password1" id="daftar-password1">
                                            <i class="fal fa-eye"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-text">
                                <div class="text-content with-icon">
                                    <input type="password" class="form-control" placeholder="Konfirmasi Password" name="password_second" id="password_second" required/>
                                    <div class="text-icon right cursor">
                                        <span class="daftar-password2" id="daftar-password2">
                                            <i class="fal fa-eye"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 form-group" >
                            <button type="submit" class="btn btn-submit" id="btnforgot">Submit</button>
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
    <script src="<?= base_url(); ?>/assets/js/forgot/reset.js"></script>
<?= $this->endSection() ?> 