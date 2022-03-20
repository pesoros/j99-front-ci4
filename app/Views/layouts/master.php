<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Juragan 99</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/fonts/pro/css/pro.min.css"> 
    <?= $this->renderSection('library') ?>
    
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/style.css">
    <?= $this->renderSection('styles') ?>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg fixed-top">
            <div class="container">
                <img src="<?= base_url() ?>/assets/img/logo.png" alt="Juragan 99" class="navbar-brand">
                <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar top-bar"></span>
                    <span class="icon-bar middle-bar"></span>
                    <span class="icon-bar bottom-bar"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('') ?>">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('fasilitas') ?>">Fasilitas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('kelas-armada') ?>">Kelas Armada</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('agen') ?>">Agen</a>
                        </li>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('promosi') ?>">Promosi</a>
                        </li>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('tentang-kami') ?>">Tentang Kami</a>
                        </li>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0);" data-toggle="modal" data-target="#loginmodal">Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    
    <div>
        <?= $this->renderSection('content') ?>
    </div>
    <!-- Footer -->
    <footer class="text-lg-start text-muted">
        <?= $this->renderSection('footer') ?>
    </footer>
    <!-- Footer -->
    
    <? //login ?>
    <div class="modal fade bd-example-modal-sm" id="loginmodal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="d-flex w-100 justify-content-center">
                        <img src="<?= base_url('assets/img/logo.png')?>" alt="juragan 99" class="img-fluid d-block">
                    </div>
                </div>
                <div class="modal-body">
                    <form class="form-login" id="formlogin" name="formlogin" method="POST">
                        <div id="alert-login" role="alert"></div>
                        <div class="mb-0 form-group" >
                            <div class="input-text">
                                <div class="text-label">
                                    <span>Email / Phone number </span>
                                </div>
                                <div class="text-content">
                                    <input type="text" class="form-control" placeholder="Enter your email or phone number" name="lusername" id="lusername" required/>
                                </div>
                            </div>
                            <div class="input-text">
                                <div class="text-label">
                                    <span>Password</span>
                                </div>
                                <div class="text-content with-icon">
                                    <input type="password" class="form-control" placeholder="Enter your password" name="lpassword" id="lpassword" required/>
                                    <div class="text-icon right cursor">
                                        <span class="login-password" id="login-password">
                                            <i class="fal fa-eye"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mb-0 form-group" >
                            <a href="<?= base_url('forg0t-password')?>" class="forgot-pass">Lupa Password</a>
                        </div>
                        <div class="mb-0 form-group" >
                            <button type="submit" class="btn btn-submit" id="btnlogin">login</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <div class="d-flex justify-content-center w-100">
                        <p class="text-daftar">Belum punya akun?&nbsp;&nbsp; <a href="<?= base_url('daftar')?>">Daftar</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    <script src="<?= base_url() ?>/assets/js/default.js"></script>
    <?= $this->renderSection('scripts') ?>

</body>

</html>
