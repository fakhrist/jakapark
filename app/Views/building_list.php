<?= $this->extend('themes/index'); ?>
<?= $this->section('content'); ?>

<h1>Daftar Gedung Parkir</h1>

<table border="1">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama Lokasi Parkir</th>
        <th>Provinsi</th>
        <th>Kabupaten/Kota</th>
        <th>Kecamatan</th>
        <th>Alamat Lengkap</th>
        <th>Jumlah Lantai</th>
        <th>Total Kapasitas</th>
        <th>Parking Rate</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php $num=1 ?>
      <?php foreach ($building as $row) : ?>
        <tr>
          <td><?= $num++; ?></td>
          <td><?= $row['nama']; ?></td>
          <td><?= $row['prov']; ?></td>
          <td><?= $row['kab']; ?></td>
          <td><?= $row['kec']; ?></td>
          <td><?= $row['fulladdress']; ?></td>
          <td><a href="<?= site_url('building/level/'.$row['spaceid']) ?>"><?= $row['totalLevel']; ?> Level</a></td>
          <td><?= $row['totalParking']; ?> Tempat Parkir</td>
          <td>
            <?php if($row['rate']>1){?> 
              <a href="<?= site_url('building/rate_update/'.$row['spaceid']) ?>">Rp <?= number_format(($row['rate']),0,",","."); ?>  </a>
            <?php }else{?> 
              <a href="<?= site_url('building/rate/'.$row['spaceid']) ?>">[Set Price]</a>
            <?php }?> 
          </td>
          <td>
            <a href="<?= site_url('building/detail/'.$row['spaceid']) ?>">[ Detail ]</a> /
            <a href="<?= site_url('building/'.$row['spaceid']) ?>">[ Update ]</a> /  
            <a href="<?= site_url('building/delete/'.$row['spaceid']) ?>" onclick="return confirm('Anda Yakin menghapus datanya?')">[ Delete ]</a>
          </td>
        </tr>
      <?php endforeach ?>
    </tbody>
</table>
<a href="<?= site_url('building/insert') ?>">Tambah Lokasi Parkir</a>


<?= $this->endSection('content'); ?>