<?= $this->extend('themes/index'); ?>
<?= $this->section('content'); ?>

<form method="post" action="<?= site_url('payment/add_method') ?>">
  <?= csrf_field() ?>
  <table>
    <tr>
      <td>Nama :</td>
      <td>
        <input type="text" name="nama" id="nama" />                            
      </td>
    </tr>
    <tr>
      <td>Keterangan :</td>
      <td>
        <input type="text" name="keterangan" id="keterangan" />                            
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