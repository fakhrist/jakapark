<?= $this->extend('themes/index'); ?>
<?= $this->section('content'); ?>

<form method="post" action="<?= site_url('building/insert_building') ?>">
  <?= csrf_field() ?>
  <table>
    <tr>
      <td>Nama Lokasi Parkir</td>
      <td>
        <input type="text" name="nama" />                            
      </td>
    </tr>
    <tr>
      <td>Provinsi</td>
      <td>
        <input type="text" name="prov" />                            
      </td>
    </tr>
    <tr>
      <td>Kabupaten / Kota</td>
      <td>
        <input type="text" name="kab" />                            
      </td>
    </tr>
    <tr>
      <td>Kecamatan</td>
      <td>
        <input type="text" name="kec" />                            
      </td>
    </tr>
    <tr>
      <td>Alamat Lengkap</td>
      <td>
        <input type="text" name="alamat" />                            
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