<?= $this->extend('themes/index'); ?>
<?= $this->section('content'); ?>

<form method="post" action="<?= site_url('building/insert_level') ?>">
  <?= csrf_field() ?>
  <table>
    <tr>
      <td>Building Code</td>
      <td>
        <input type="text" name="buildcode" value="<?= $building[0] ?>" readonly/>                            
      </td>
    </tr>
    <tr>
      <td>Kode Level</td>
      <td>
        <input type="text" name="levelcode" />                            
      </td>
    </tr>
    <tr>
      <td>Nama Level / Area</td>
      <td>
        <input type="text" name="levelname" />                            
      </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>
        <button type="submit">Simpan & Lanjutkan</button>
      </td>
    </tr>
  </table>
</form>

<?= $this->endSection('content'); ?>