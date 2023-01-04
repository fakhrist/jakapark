<h1>Daftar Booking Parkir</h1>

<table border="1">
    <thead>
      <tr>
        <th>No</th>
        <th>Booking Code</th>
        <th>Tanggal</th>
        <th>Durasi Parkir</th>
        <th>Lokasi</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php $num=1 ?>
      <?php foreach ($booking as $row) : ?>
        <tr>
          <td><?= $num++; ?></td>
          <td><?= $row['bookid']; ?></td>
          <td><?= $row['startrent']; ?></td>
          <td><?= $row['endrent']; ?></td>
          <td><?= $row['gedung']; ?></td>
          <td>
            <a href="<?= site_url('building/detail/'.$row['spaceid']) ?>">[ Lihat Booking ]</a> /
            <a href="<?= site_url('building/delete/'.$row['spaceid']) ?>" onclick="return confirm('Anda Yakin menghapus datanya?')">[ Delete ]</a>
          </td>
        </tr>
      <?php endforeach ?>
    </tbody>
</table>
<a href="<?= site_url('parking/book') ?>">Booking Parkir</a>