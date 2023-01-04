<form method="post" action="<?= site_url('parking/book') ?>">
  <?= csrf_field() ?>
  <table>
    <tr>
      <td>Pilih Kendaraan</td>
      <td>
        <select name="vehicle">
        
        <?php foreach ($cars as $row) : ?>
            <option value="<?= $row['idCar'] ?>"><?= $row['name'] ?> (<?= $row['plate'] ?>)</option>   
        <?php endforeach ?>   
    
        </select>                    
      </td>
    </tr>
    <tr>
      <td>Pilih Provinsi</td>
      <td>
      <select name="provinsi">
      <?php if ($provinsi) :?>
        <?php foreach ($provinsi['province']->rajaongkir->results as $prov) : ?>
            <option value="<?= $prov->province_id ?>"><?= $prov->province ?></option>   
        <?php endforeach ?>   
        <?php endif ?>
        </select>                          
      </td>
    </tr>    
    <tr>
      <td>Pilih Kota</td>
      <td>
        <input type="text" name="tipe" />                            
      </td>
    </tr>
    <tr>
      <td>Pilih Lokasi Parkir</td>
      <td>
        <input type="text" name="nama" />                            
      </td>
    </tr>
    <tr>
      <td>Pilih Waktu Mulai Parkir</td>
      <td>
        <input type="text" name="brand" />                            
      </td>
    </tr>
    <tr>
      <td>Pilih Waktu Selesai Parkir</td>
      <td>
        <input type="text" name="brand" />                            
      </td>
    </tr>
    <tr>
      <td>Pilih Level Bangunan</td>
      <td>
        <input type="text" name="brand" />                            
      </td>
    </tr>
    <tr>
      <td>Pilih Area Parkir</td>
      <td>
        <input type="text" name="brand" />                            
      </td>
    </tr>
    <tr>
      <td>Pilih Lokasi Parkir</td>
      <td>
        <input type="text" name="brand" />                            
      </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>
        <button type="submit">Confirm</button>
      </td>
    </tr>
  </table>
</form>