<?= $this->extend('themes/index'); ?>
<?= $this->section('content'); ?>

<form method="post" action="<?= site_url('user/access/') ?>">
  <?= csrf_field() ?>
  <table>
    <tr>
      <td>Nama</td>
      <td>
        <input type="text" name="nama" id="nama" value="<?= $profil['nama'] ?>" readonly/>  
        <input type="text" name="id" id="id" value="<?= $profil['identitas'] ?>" hidden readonly />                            
      </td>
    </tr>
    <tr>
      <td>Username</td>
      <td>
        <input type="text" name="username" id="username" value="<?= $profil['username'] ?>" readonly/>                            
      </td>
    </tr>
    <tr>
      <td>Access yang diberikan</td>
      <td>
        <select name="level" id="level">
            <option value="user">User</option>
            <option value="admin">Admin</option>
        </select>                           
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