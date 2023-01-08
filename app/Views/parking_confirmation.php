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
<form method="post" action="<?= site_url('parking/confirmation') ?>">
    <?= csrf_field() ?>
    <input type="text" name="booking" id="booking" value="<?= $booking['bookid'] ?>">
    <input type="text" name="bayar" id="bayar" value="1" hidden>
    <button type="submit">Bayar</button>
</form>

<?= $this->endSection('content'); ?>

