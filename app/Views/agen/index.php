<?= $this->extend('layouts/master') ?>

<?= $this->section('library') ?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.css"/>
<?= $this->endSection() ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/agen/custom.css')?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section id="secagen">
	<div class="container">
        <h2>Daftar Agen</h2>
        <div class="content-header">
            <div class="d-flex flex-column flex-xl-row align-items-center justify-content-xl-between">
                <div class="item-home-left position-2">
                    <ul class="d-flex align-items-center navtabs">
                        <li class="nav-tabs" data-target="jawa timur">Jawa Timur</li>
                        <li class="nav-tabs" data-target="jawa barat">Jawa Bara</li>
                        <li class="nav-tabs" data-target="jawa tengah">Jawa Tengah</li>
                        <li class="nav-tabs" data-target="di yogyakarta">DI Yogyakarta</li>
                        <li class="nav-tabs" data-target="dki jakarta">DKI Jakarta</li>
                    </ul>
                </div>
                <div class="item-home-right position-1">
                    <div class="d-flex">
                        <input type="search" class="custom-search form-control"  id="customsearch" placeholder="Search" aria-controls="search">
                        <button type="button" id="btnsrch" class="btn btn-rsch">cari</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
        <table id="tablelist" class="table" style="width:100%">
            <thead>
                <tr>
                    <th>Kota</th>
                    <th>Nama Agen</th>
                    <th>Alamat</th>
                    <th>No. Telepon</th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>
        </div>
	</div>
</section>

<?= $this->endSection() ?>

<?= $this->section('footer') ?>
	<?= $footer; ?>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.js"></script>
<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js'></script>
</script>
<script src="<?= base_url() ?>/assets/js/agen/custom.js"></script>
<?= $this->endSection() ?> 