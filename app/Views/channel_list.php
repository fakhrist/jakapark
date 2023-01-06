<?= $this->extend('themes/index'); ?>
<?= $this->section('content'); ?>

<h1>Daftar Channel Account Pembayaran <?= $methode['nama']; ?> </h1>

<a href="<?= site_url('payment') ?>">Metode Pembayaran</a> / <?= $methode['nama']; ?>
<table border="1">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama Account</th>
        <th>Acccount Number</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php $num=1 ?>
      <?php foreach ($channel as $row) : ?>
        <tr>
          <td><?= $num++; ?></td>
          <td><?= $row['nama']; ?></td>
          <td><?= $row['accountno']; ?></td>
          <td>
            <a href="<?= site_url('payment/'.$row['id']) ?>">[ Update ]</a> /  
            <a href="<?= site_url('payment/delete_channel/'.$row['id']) ?>" onclick="return confirm('Anda Yakin menghapus datanya?')">[ Delete ]</a>
          </td>
        </tr>
      <?php endforeach ?>
    </tbody>
</table>
<a href="<?= site_url('payment/channel_add/'.$methode['id']) ?>">Tambah Account Channel</a>

<?= $this->endSection('content'); ?>