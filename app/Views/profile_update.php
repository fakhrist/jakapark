<?= $this->extend('themes/index'); ?>
<?= $this->section('content'); ?>

<form method="post" action="<?= site_url('profile/'.$profil['id']) ?>">
  <?= csrf_field() ?>
  <table>
    <tr>
      <td>Nama</td>
      <td>
        <input type="text" name="nama" value="<?= $profil['nama'] ?>" />                            
      </td>
    </tr>
    <tr>
      <td>Alamat</td>
      <td>
        <input type="text" name="alamat" value="<?= $profil['alamat'] ?>" />                            
      </td>
    </tr>
    <tr>
      <td>Telepon</td>
      <td>
        <input type="text" name="telp" value="<?= $profil['telp'] ?>" />                            
      </td>
    </tr>
    <tr>
      <td>Email</td>
      <td>
        <input type="text" name="email" value="<?= $profil['email'] ?>" />                            
      </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>
        <button type="submit">Save</button>
      </td>
    </tr>
  </table>
</form>

<?= $this->endSection('content'); ?>