<?= $this->extend('layouts/master') ?>

<?= $this->section('library') ?>

<?= $this->endSection() ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url(); ?>/assets/css/profile/custom.css">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section>
    <div class="container">
        <div class="d-flex flex-column flex-md-row">
            <div class="card-header" id="cardheader">
                <ul class="d-flex flex-row flex-md-column">
                    <li class="nav-item-scroolto active" data-target="yourprofile">Profile</li>
                    <li class="nav-item-scroolto" data-target="mobilephone">Mobile Phone</li>
                    <li class="nav-item-scroolto" data-target="changepass">Change Password</li>
                    <li class="nav-item-scroolto" data-target="history">Booking History</li>
                    <li><a href="logout">Log Out</a></li>
                </ul>
            </div>
            <div class="card-body" id="cardbody">
                <div class="item-card">
                    <? //Profile ?>
                    <div class="card-header has-anchor" id="yourprofile">
                        <p class="profile-header">Your Profile</p>
                        <p class="profile-title">Personal information</p>
                        <p>This information helps with identification so that others on your team are able to recognize
                            you easily.</p>
                    </div>
                    <div class="card-body">
                        <form class="form-your-profile" id="formyourprofile" name="formyourprofile" method="POST">
                            <div id="alert-profile" role="alert"></div>
                            <div class="mb-0 form-group">
                                <div class="input-text">
                                    <div class="input-text-label">
                                        <span>Full name</span>
                                    </div>
                                    <div class="input-text-content">
                                        <input type="text" name="fullName" id="profilefullname" value=""
                                            placeholder="Enter your full name">
                                    </div>
                                </div>
                                <div class="input-text">
                                    <div class="input-text-label">
                                        <span>Email</span>
                                    </div>
                                    <div class="input-text-content">
                                        <input type="text" name="email" id='profileemail' value=""
                                            placeholder="Enter your email">
                                    </div>
                                </div>
                                <button class="btn btn-submit btn-md btn-block w-auto mt-4" disabled="" type="submit"
                                    id="btnprofile">Save</button>
                            </div>
                        </form>
                    </div>

                    <div class="divider-settings my-4"></div>

                    <? //Mobile ?>
                    <div class="card-header has-anchor" id="mobilephone">
                        <p class="profile-title">Mobile settings</p>
                        <p>Register your phone number to add greater security to your account.</p>
                    </div>
                    <div class="card-body">
                        <form class="form-mobile-phone" id="formmobilephone" name="formmobilephone" method="POST">
                            <div id="alert-phone" role="alert"></div>
                            <div class="input-phone-number-container">
                                <div class="d-flex">
                                    <div class="selector selector-country-code">
                                        <div class="selector-selected">
                                            <div class="d-flex">
                                                <img class="country-flag-img m-auto"
                                                    src="https://country-flags-images.s3.amazonaws.com/flags/id.svg"
                                                    alt="country-flag" />
                                                <span class="country-label-selected">+62</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="input-text input-phone-number-value block">
                                        <div class="input-text-content">
                                            <input type="tel" autocomplete="off" value=""
                                                placeholder="Enter your phoen number" class="input-number"
                                                id="phonenumber" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-submit btn-md btn-block w-auto mt-4" type="submit" disabled=""
                                id="btnphone">Save</button>
                        </form>
                    </div>

                    <div class="divider-settings my-4"></div>

                    <? //Change password ?>
                    <div class="card-header has-anchor" id="changepass">
                        <p class="profile-title">Change password</p>
                    </div>
                    <div class="card-body">
                        <form class="form--change-password" id="formchangepassword" name="formchangepassword"
                            method="POST">
                            <div id="alert-change-password" role="alert"></div>
                            <div class="mb-0 form-group">
                                <div class="input-text">
                                    <div class="input-text-label">
                                        <span> Current password</span>
                                    </div>
                                    <div class="input-text-content">
                                        <input type="password" placeholder="Enter your current password"
                                            name="currentPassword" id="currentpassword" value="" />
                                    </div>
                                </div>
                                <div class="input-text">
                                    <div class="input-text-label">
                                        <span>New password</span>
                                    </div>
                                    <div class="input-text-content with-icon">
                                        <input type="password" placeholder="Enter your new password" name="newPassword"
                                            id="newpassword" value="" />
                                        <div class="input-text-icon right cursor">
                                            <span class="toggle-password" id="toggle-password">
                                                <i class="fal fa-eye"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-submit btn-md btn-block w-auto mt-4" disabled="" type="submit"
                                    id="btnchangepass">Save</button>
                            </div>
                        </form>
                    </div>

                    <div class="divider-settings my-4"></div>

                    <div class="card-header has-anchor" id="history">
                        <p class="profile-title">Booking History</p>
                    </div>
                    <div class="card-body pt-0">
                        <div class="row align-items-center mt-5">
                            <?php foreach ($book as $key => $value) { ?>
                            <div class="col-12 col-sm-6 col-xl-4 mb-4">
                                <a href="<?= base_url('tiket?noboked='.$value['booking_code']) ?>" target="_blank" class="d-block">
                                    <div class="content-tiket-landscape d-flex flex-row">
                                        <div class="header-tiket">
                                            
                                        </div>

                                        <div
                                            class="body-tiket d-flex flex-column justify-content-center align-items-center">
                                            <span class="dots dot-left-top"></span>
                                            <span class="dots dot-left-bottom"></span>
                                            <div class="dtl d-flex flex-row">
                                                <div class="form-group">
                                                    <label>No. Booking</label>
                                                    <span>
                                                        <p><?= $value['booking_code'] ?></p>
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="dtl d-flex flex-row">
                                                <div class="form-group">
                                                    <label>Harga</label>
                                                    <span>Rp. <?= $value['total_price'] ?></span>
                                                </div>
                                                <div class="form-group">
                                                    <label>Status Pembayaran</label>
                                                    <span>
                                                        <?php if ($value['payment_status'] == "1") { ?>
                                                            Sudah Dibayar
                                                        <?php } else { ?>
                                                            Belum Dibayar
                                                        <?php } ?>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
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
<script src="<?= base_url(); ?>/assets/js/profile/custom.js"></script>
<?= $this->endSection() ?>