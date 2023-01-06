<?= $this->extend('themes/index'); ?>
<?= $this->section('content'); ?>

<form method="post" action="<?= site_url('building/rate_update') ?>">
  <?= csrf_field() ?>
  <table>
    <tr>
      <td>Id Parkir</td>
      <td>
        <input type="text" name="id" value="<?= $rate['id'] ?>" readonly />                            
      </td>
    </tr>
    <tr>
      <td>Parking Rate</td>
      <td>
        <input type="number" name="rate" value="<?= $rate['ratepark'] ?>" />                            
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