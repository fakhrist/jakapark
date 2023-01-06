<?= $this->extend('themes/index'); ?>
<?= $this->section('content'); ?>

<h1>Daftar Metode Pembayaran : </h1>

Metode Pembayaran 
<table border="1">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>keterangan</th>
        <th>Acccount Channel</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php $num=1 ?>
      <?php foreach ($metode as $row) : ?>
        <tr>
          <td><?= $num++; ?></td>
          <td><?= $row['nama']; ?></td>
          <td><?= $row['keterangan']; ?></td> 
          <td>Channel</td>
          <td>
            <a href="<?= site_url('payment/channel/'.$row['id']) ?>">[ Detail ]</a> /  
            <a href="<?= site_url('payment/'.$row['id']) ?>">[ Update ]</a> /  
            <a href="<?= site_url('payment/delete_method/'.$row['id']) ?>" onclick="return confirm('Anda Yakin menghapus datanya?')">[ Delete ]</a>
          </td>
        </tr>
      <?php endforeach ?>
    </tbody>
</table>
<a href="<?= site_url('payment/add_method/') ?>">Tambah Metode Pembayaran</a>

<?= $this->endSection('content'); ?>