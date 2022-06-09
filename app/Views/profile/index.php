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
                        <form class="form-your-profile" id="formyourprofile" name="formyourprofile" method="POST" action="<?= base_url('profile/update') ?>">
                            <div id="alert-profile" role="alert"></div>
                            <div class="mb-0 form-group">
                                <div class="input-text">
                                    <div class="input-text-label">
                                        <span>Nama Depan</span>
                                    </div>
                                    <div class="input-text-content">
                                        <input type="text" name="firstName" id="profilefirstname" value="<?= session('firstName') ?>"
                                            placeholder="Enter your first name">
                                    </div>
                                </div>
                                <div class="input-text">
                                    <div class="input-text-label">
                                        <span>Nama Belakang</span>
                                    </div>
                                    <div class="input-text-content">
                                        <input type="text" name="lastName" id="profilelastname" value="<?= session('lastName') ?>"
                                            placeholder="Enter your last name">
                                    </div>
                                </div>
                                <div class="input-text">
                                    <div class="input-text-label">
                                        <span>Alamat</span>
                                    </div>
                                    <div class="input-text-content">
                                        <input type="text" name="address" id="profileaddress" value="<?= session('address') ?>"
                                            placeholder="Enter your address">
                                    </div>
                                </div>
                                <div class="input-text">
                                    <div class="input-text-label">
                                        <span>Identitas</span>
                                    </div>
                                    <div class="input-text-content">
                                        <select class="form-control" name="identity" id="slcdari" style="background-color: transparent; color: #ffffff">
                                            <option value="KTP">KTP</option>
                                            <option value="PASSPORT">PASSPORT</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="input-text">
                                    <div class="input-text-label">
                                        <span>Nomor Identitas</span>
                                    </div>
                                    <div class="input-text-content">
                                        <input type="text" name="identityNumber" id="profileaddress" value="<?= session('identityNumber') ?>"
                                            placeholder="Enter your Identity">
                                    </div>
                                </div>
                                <div class="input-text">
                                    <div class="input-text-label">
                                        <span>Email</span>
                                    </div>
                                    <div class="input-text-content">
                                        <input type="text" name="email" id='profileemail' value="<?= session('email') ?>"
                                            placeholder="Enter your email" readonly>
                                    </div>
                                </div>
                                <div class="input-text">
                                    <div class="input-text-label">
                                        <span>Phone</span>
                                    </div>
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
                                                    <input type="tel" autocomplete="off" value="<?= session('phone') ?>"
                                                        placeholder="Enter your phoen number" class="input-number"
                                                        id="phonenumber" name="phone" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-submit btn-md btn-block w-auto mt-4" type="submit"
                                    id="btnprofile">Save</button>
                            </div>
                        </form>
                    </div>

                    <div class="divider-settings my-4"></div>

                    <? //Change password ?>
                    <div class="card-header has-anchor" id="changepass">
                        <p class="profile-title">Change password</p>
                    </div>
                    <div class="card-body">
                        <form class="form--change-password" id="formchangepassword" name="formchangepassword"
                            method="POST" action="<?= base_url('profile/updatepass') ?>">
                            <div id="alert-change-password" role="alert"></div>
                            <div class="mb-0 form-group">
                                <div class="input-text">
                                    <div class="input-text-label">
                                        <span>New password</span>
                                    </div>
                                    <div class="input-text-content with-icon">
                                        <input type="hidden" name="emailpass" id="" value="<?= session('email') ?>">
                                        <input type="password" placeholder="Enter your new password" name="newPassword"
                                            id="newpassword" value="" />
                                        <div class="input-text-icon right cursor">
                                            <span class="toggle-password" id="toggle-password">
                                                <i class="fal fa-eye"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="input-text">
                                    <div class="input-text-label">
                                        <span>Konfirmasi password</span>
                                    </div>
                                    <div class="input-text-content with-icon">
                                        <!-- <input type="password" placeholder="Enter your new password" name="confNewPassword"
                                            id="confNewPassword" value="" /> -->
                                        <input type="password" placeholder="Enter your current password"
                                            name="confNewPassword" id="confnewpassword" value="" />
                                        <div class="input-text-icon right cursor">
                                            <span class="toggle-passwordconf" id="toggle-passwordconf">
                                                <i class="fal fa-eye"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-submit btn-md btn-block w-auto mt-4" type="submit"
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