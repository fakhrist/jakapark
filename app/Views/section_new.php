<form method="post" action="<?= site_url('building/insert_section') ?>">
  <?= csrf_field() ?>
  <table>
    <tr>
      <td>Level Code</td>
      <td>
        <input type="text" name="levelcode" value="<?= $section['levelid'] ?>" readonly/>                            
      </td>
    </tr>
    <tr>
      <td>Section Code</td>
      <td>
        <input type="text" name="seccode" />                            
      </td>
    </tr>
    <tr>    
    <tr>
      <td>Nama Area</td>
      <td>
        <input type="text" name="areaname" />                            
      </td>
    </tr>
    <tr>
      <td>Jumlah Baris</td>
      <td>
        <input type="text" name="totalrow" />                            
      </td>
    </tr>
    <tr>
    <tr>
      <td>Kapasitas per Baris</td>
      <td>
        <input type="text" name="capacity" />                            
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