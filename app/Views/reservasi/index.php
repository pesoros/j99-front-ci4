<?= $this->extend('layouts/master') ?>

<?= $this->section('styles') ?>
    <style>
        .test{
            color: red;
        }
    </style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

	<div class="test">
        Reservasi Index
    </div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
    <script>
        alert('test-script');
    </script>
<?= $this->endSection() ?>