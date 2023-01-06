<?= $this->extend('themes/index'); ?>
<?= $this->section('content'); ?>

<h1>Daftar Lantai Gedung Parkir : <?= $building['nama'] ?></h1>

<a href="<?= site_url('building') ?>"><?= $building['nama'] ?></a> / Daftar Level
<table border="1">
    <thead>
      <tr>
        <th>No</th>
        <th>Kode</th>
        <th>Nama Level</th>
        <th>Total Section / Area</th>
        <th>Kapasitas</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php $num=1 ?>
      <?php foreach ($level as $row) : ?>
        <tr>
          <td><?= $num++; ?></td>
          <td><?= $row['code']; ?></td>
          <td><?= $row['name']; ?></td>
          <td><a href="<?= site_url('building/section/'.$row['levelid']) ?>"><?= $row['totalSection']; ?> Area</a></td>
          <td><?= $row['totalParking']; ?> Tempat Parkir</td>
          <td>
            <a href="<?= site_url('building/detail/'.$row['levelid']) ?>">[ Detail ]</a> /
            <a href="<?= site_url('building/'.$row['levelid']) ?>">[ Update ]</a> /  
            <a href="<?= site_url('building/delete_level/'.$row['levelid']) ?>" onclick="return confirm('Anda Yakin menghapus datanya?')">[ Delete ]</a>
          </td>
        </tr>
      <?php endforeach ?>
    </tbody>
</table>
<a href="<?= site_url('building/insert_level/'.$building['spaceid']) ?>">Tambah Level</a>

<?= $this->endSection('content'); ?>