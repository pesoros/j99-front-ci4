<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Juragan 99</title>

    <?= $this->renderSection('styles') ?>
</head>

<body>

<li><a href="<?= base_url('') ?>"> Home</a></li>
<li><a href="<?= base_url('reservasi') ?>"> Reservasi</a></li>
<li><a href="<?= base_url('reservasi/isidata') ?>"> Isidata</a></li>

    === header ===
    
    <div>
        <?= $this->renderSection('content') ?>
    </div>

    === footer ===

    <?= $this->renderSection('scripts') ?>

</body>

</html>
