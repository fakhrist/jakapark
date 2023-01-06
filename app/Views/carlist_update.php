<?= $this->extend('themes/index'); ?>
<?= $this->section('content'); ?>

<form method="post" action="<?= site_url('car/'.$car['id']) ?>">
  <?= csrf_field() ?>
  <table>
    <tr>
      <td>Plat Nomor</td>
      <td>
        <input type="text" name="plat" value="<?= $car['plate'] ?>"/>                            
      </td>
    </tr>
    <tr>
      <td>Tipe</td>
      <td>
        <input type="text" name="tipe" value="<?= $car['type'] ?>"/>                            
      </td>
    </tr>
    <tr>
      <td>Nama</td>
      <td>
        <input type="text" name="nama" value="<?= $car['name'] ?>"/>                            
      </td>
    </tr>
    <tr>
      <td>Brand</td>
      <td>
        <input type="text" name="brand" value="<?= $car['brand'] ?>"/>                            
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