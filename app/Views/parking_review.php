<?= $this->extend('themes/index'); ?>
<?= $this->section('content'); ?>

<h1>Data Booking</h1>

Nama Gedung : <?= $parkir['gedung'] ?>
<br />
Alamat : <?= $parkir['alamat'] ?>
<br />
Level : <?= $parkir['levelname'] ?>
<br />
Parkir : <?= $parkir['name'].' / Baris : '.$booking['baris'].' / Kolom : '.$booking['kolom'] ?>
<br />
Waktu : <?= $booking['startrent'].' sampai dengan '.$booking['endrent'] ?>
<br />
Cancel
<a href="<?= site_url('parking/payment/'.$booking['bookid']) ?>">Confirm</a>

<?= $this->endSection('content'); ?>

