<?= $this->extend('themes/index'); ?>
<?= $this->section('content'); ?>

<form method="post" action="<?= site_url('payment/channel_add') ?>">
  <?= csrf_field() ?>
  Tambah Channel Account
  <table>
    <tr>
      <td>Nama :</td>
      <td>
        <input type="text" name="method" id="method" value="<?= $id; ?>"/>   
        <input type="text" name="nama" id="nama" />                            
      </td>
    </tr>
    <tr>
      <td>Account Number :</td>
      <td>
        <input type="text" name="nomoracc" id="nomoracc" />                            
      </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>
        <button type="submit">Simpan</button>
      </td>
    </tr>
  </table>
</form>

<?= $this->endSection('content'); ?>