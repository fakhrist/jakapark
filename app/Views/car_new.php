<form method="post" action="<?= site_url('car/insert_car') ?>">
  <?= csrf_field() ?>
  <table>
    <tr>
      <td>Plat Nomor</td>
      <td>
        <input type="text" name="plat" />                            
      </td>
    </tr>
    <tr>
      <td>Tipe</td>
      <td>
        <input type="text" name="tipe" />                            
      </td>
    </tr>
    <tr>
      <td>Nama</td>
      <td>
        <input type="text" name="nama" />                            
      </td>
    </tr>
    <tr>
      <td>Brand</td>
      <td>
        <input type="text" name="brand" />                            
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