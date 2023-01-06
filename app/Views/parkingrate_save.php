<?= $this->extend('themes/index'); ?>
<?= $this->section('content'); ?>

<form method="post" action="<?= site_url('building/rate') ?>">
  <?= csrf_field() ?>
  <table>
    <tr>
      <td>Id Bangunan</td>
      <td>
        <input type="text" name="building" value="<?= $id ?>" readonly />                            
      </td>
    </tr>
    <tr>
      <td>Parking Rate</td>
      <td>
        <input type="number" name="rate" value="" />                            
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