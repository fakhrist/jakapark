<?= $this->extend('themes/index'); ?>
<?= $this->section('content'); ?>
<script src="https://code.jquery.com/jquery-3.6.3.js"></script>
<h1>Daftar Booking Parkir</h1>

<table border="1">
    <thead>
      <tr>
        <th>No</th>
        <th>Kendaraan</th>
        <th>Booking Code</th>
        <th>Start Parkir</th>
        <th>Selesai Parkir</th>
        <th>Lokasi</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php $num=1 ?>
      <?php foreach ($booking as $row) : ?>
        <tr>
          <td><?= $num++; ?></td>
          <td><?= $row['mobil'].' ['.$row['plate']; ?>]</td>
          <td><?= $row['bookid']; ?></td>
          <td><?= $row['startrent']; ?></td>
          <td><?= $row['endrent']; ?></td>
          <td><?= $row['gedung']; ?></td>
          <td>
            <a href="#" class='modalViewBooking' data-booking='<?= $row['bookid'] ?>' data-toggle="modal" data-target="#BookingModal">[ Lihat Booking ]</a> /
            <a href="<?= site_url('parking/delete/'.$row['bookid']) ?>" onclick="return confirm('Anda Yakin menghapus datanya?')">[ Delete ]</a>
          </td>
        </tr>
      <?php endforeach ?>
    </tbody>
</table>
<a href="<?= site_url('parking/book') ?>">Booking Parkir</a>



<?= $this->endSection('content'); ?>