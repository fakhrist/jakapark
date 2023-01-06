<?= $this->extend('themes/index'); ?>
<?= $this->section('content'); ?>

<h1>Gedung Parkir <?= $building['nama'] ?></h1>
<h1>Daftar Area di Lantai : <?= $level['name'] ?></h1>
<a href="<?= site_url('building/') ?>"><?= $building['nama'] ?></a> / <a href="<?= site_url('building/level/'.$building['spaceid']) ?>"><?= $level['name'] ?></a> / Daftar Area Parkir
<table border="1">
    <thead>
      <tr>
        <th>No</th>
        <th>Kode</th>
        <th>Nama Area</th>
        <th>Jumlah Baris</th>
        <th>Kapasitas per Baris</th>
        <th>Total Kapasitas</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php $num=1 ?>
      <?php foreach ($section as $row) : ?>
        <tr>
          <td><?= $num++; ?></td>
          <td><?= $row['code']; ?></td>
          <td><?= $row['name']; ?></td>
          <td><?= $row['totalrow']; ?></td>
          <td><?= $row['spacerow']; ?> Tempat Parkir</td>
          <td><?= $row['totalrow']*$row['spacerow']; ?> Tempat Parkir</td>
          <td>
            <a href="<?= site_url('building/'.$row['secid']) ?>">[ Update ]</a> /  
            <a href="<?= site_url('building/delete_section/'.$row['secid']) ?>" onclick="return confirm('Anda Yakin menghapus datanya?')">[ Delete ]</a>
          </td>
        </tr>
      <?php endforeach ?>
    </tbody>
</table>
<a href="<?= site_url('building/insert_section/'.$level['levelid']) ?>">Tambah Level</a>

<?= $this->endSection('content'); ?>