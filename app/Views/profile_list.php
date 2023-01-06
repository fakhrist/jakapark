<?= $this->extend('themes/index'); ?>
<?= $this->section('content'); ?>

<h1>Data Profil</h1>

Nama : <?= $profil['nama'] ?>
<br />
Alamat : <?= $profil['alamat'] ?>
<br />
Telp : <?= $profil['telp'] ?>
<br />
Email : <?= $profil['email'] ?>
<br />
<a href="<?= site_url('profile/'.$profil['id']) ?>">Perbarui Data</a>
<br />
<br />
<br />

<h1>Daftar Kepemilikan Kendaraan</h1>

<table border="1">
    <thead>
      <tr>
        <th>No</th>
        <th>Plat Nomor</th>
        <th>Type</th>
        <th>Brand</th>
        <th>Nama Kendaraan</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php $num=1 ?>
      <?php foreach ($cars as $row) : ?>
        <tr>
          <td><?= $num++; ?></td>
          <td><?= $row['plate']; ?></td>
          <td><?= $row['type']; ?></td>
          <td><?= $row['name']; ?></td>
          <td><?= $row['brand']; ?></td>
          <td>
          <a href="<?= site_url('car/'.$row['idCar']) ?>">[ Update ]</a> /  
            <a href="<?= site_url('car/delete/'.$row['idCar']) ?>" onclick="return confirm('Anda Yakin menghapus datanya?')">[ Delete ]</a>
          </td>
        </tr>
      <?php endforeach ?>
    </tbody>
</table>
<a href="<?= site_url('car/') ?>">Tambah Kendaraan</a>

<?= $this->endSection('content'); ?>
