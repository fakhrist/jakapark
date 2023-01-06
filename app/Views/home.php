<?= $this->extend('themes/index'); ?>
<?= $this->section('content'); ?>
<script src="https://code.jquery.com/jquery-3.6.3.js"></script>

<h1>Hallo <?=session()->get('username')?> !</h1>
<div class="row">
    <div class="col-md-4">
        <img src="<?=base_url('assets/images/background/park-view.jfif')?>" height="430px"  />
    </div>
    <div class="col-md-8">
        <h3>Your Next Parking >></h3>
        <h2 style="color:#2596be;"><?= $booking['gedung'] ?></h2>
        <?= $booking['alamat'] ?></br>
        Arrival Time : <?= $booking['startrent'] ?></br>
        <a href="#" class='modalViewBooking' data-booking='<?= $booking['bookid'] ?>' data-toggle="modal" data-target="#BookingModal">[ Lihat Detail ]</a>
    </div>
</div>


<?= $this->endSection('content'); ?>