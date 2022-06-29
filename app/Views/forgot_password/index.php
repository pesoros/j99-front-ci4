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
                    <form class="form-forgot" id="formforgot" name="formforgot" method="POST">
                        <div class="form-header">
                            <h2>Forgot Password</h2>
                            <p>Masukan Email terdaftar Anda, Anda akan dikirimkan pesan untuk me-reset password Anda.</p>
                        </div>
                        <div id="alert-forgot" role="alert"></div>
                        <div class="mb-0 form-group" >
                            <div class="input-text">
                                <div class="text-content">
                                    <input type="text" class="form-control" placeholder="Enter your Member ID or Email or Phone number" name="forgot" required/>
                                    <input type="hidden" class="form-control" id="apiendpoint" value="<?= getenv('API_ENDPOINT') ?>"/>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 form-group" >
                            <button type="submit" class="btn btn-submit" id="btnforgot">Submit</button>
                        </div>
                        <div class="mb-0 form-group" >
                            <div class="d-flex justify-content-center w-100">
                                <p class="text-daftar">Belum punya akun?&nbsp;&nbsp; <a href="<?= base_url('daftar')?>">Daftar</a></p>
                            </div>
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
    <script src="<?= base_url(); ?>/assets/js/forgot/custom.js"></script>
<?= $this->endSection() ?> 