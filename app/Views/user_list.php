<?= $this->extend('themes/index'); ?>
<?= $this->section('content'); ?>

<h1>Daftar User System</h1>

<table border="1">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>e-Mail</th>
        <th>Username</th>
        <th>Level</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php $num=1 ?>
      <?php foreach ($profil as $row) : ?>
        <tr>
          <td><?= $num++; ?></td>
          <td><?= $row['nama']; ?></td>
          <td><?= $row['email']; ?></td>
          <td><?= $row['username']; ?></td>
          <td>
            <?php if(isset($row['tipe'])){?> 
                <?= $row['tipe']; ?><a href="<?= site_url('user/access/'.$row['identitas']) ?>">[e]</a>
            <?php }else{?> 
              <a href="<?= site_url('user/access/'.$row['identitas']) ?>">[Beri Akses]</a>
            <?php }?>           
          </td>
          <td>
            <a href="<?= site_url('user/delete/'.$row['identitas']) ?>" onclick="return confirm('Anda Yakin menghapus datanya?')">[ Delete ]</a>
          </td>
        </tr>
      <?php endforeach ?>
    </tbody>
</table>

<?= $this->endSection('content'); ?>