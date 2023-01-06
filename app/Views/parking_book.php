<?= $this->extend('themes/index'); ?>
<?= $this->section('content'); ?>

<script src="https://code.jquery.com/jquery-3.6.3.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
  $(document).ready(function() {
      $('.linkedform').select2();
  });  
</script>

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
        <select name="provinsi" id="provinsi" class="linkedform">
          <?php if ($provinsi) :?>
          <option value="">--Pilih--</option>
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
        <select name="kota" id="kota" class="linkedform">
          <option value="">--Pilih Provinsi--</option>
        </select>                            
      </td>
    </tr>
    <tr>
      <td>Pilih Lokasi Parkir</td>
      <td>
        <select name="lokasi" id="lokasi" class="linkedform">
          <option value="">--Pilih--</option>
        </select>                            
      </td>
    </tr>
    <tr>
      <td>Pilih Waktu Mulai Parkir</td>
      <td>
      <input type="datetime-local" id="startpark" name="startpark" value="" min="<?= date('Y-m-d').'T'.date('h:i'); ?>">                          
      </td>
    </tr>
    <tr>
      <td>Pilih Waktu Selesai Parkir</td>
      <td>
      <input type="datetime-local" id="endpark" name="endpark" value="" min="<?= date('Y-m-d').'T'.date('h:i'); ?>">                          
      </td>
    </tr>
    <tr>
      <td>Pilih Level Bangunan</td>
      <td>
        <select name="level" id="level" class="linkedform">
          <option value="">--Pilih--</option>
        </select>                            
      </td>
    </tr>
    <tr>
      <td>Pilih Area Parkir</td>
      <td>
        <select name="area" id="area" class="linkedform">
          <option value="">--Pilih--</option>
        </select>                              
      </td>
    </tr>
    <tr>
      <td>Pilih Baris Tersedia</td>
      <td>
        <select name="baris" id="baris" class="linkedform">
          <option value="">--Pilih--</option>
        </select>                            
      </td>
    </tr>
    <tr>
      <td>Pilih Kolom Parkir</td>
      <td>
        <select name="kolom" id="kolom" class="linkedform">
          <option value="">--Pilih--</option>
        </select>                            
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
<script>
  //Change Value on Click Provinsi
  $('#provinsi').on('change',function(){
      var idSearch = $('#provinsi').val(); 
      $.ajax({    
          method: "GET",      
          url: 'http://localhost:8080/parking/search-city/'+idSearch,  
          dataType: 'json',  
          success: function(data){
            var display = '';
            for (var i=0; i<data.rajaongkir.results.length; i++) {
              console.log(data.rajaongkir.results[i].city_name)
              var dataname = data.rajaongkir.results[i].city_name;
              display += "<option value="+dataname+">"+dataname+"</option>"
            } 
            $('#kota').html(display)           
          }
      });
  });  
  
  //Change Value on Click City
  $('#kota').on('change',function(){
      var idSearch = $('#kota').find("option:selected").text(); 
      $.ajax({    
          method: "POST",      
          url: 'http://localhost:8080/parking/search-building',  
          data : {"searching" : idSearch },
          dataType: 'html',  
          success: function(data){
            console.log(data)
            $('#lokasi').html(data)          
          }
      });
  }); 

  //Change Value on Click Bangunan
  $('#lokasi').on('change',function(){
      var idSearch = $('#lokasi').find("option:selected").text(); 
      $.ajax({    
          method: "POST",      
          url: 'http://localhost:8080/parking/search-level',  
          data : {"searching" : idSearch },
          dataType: 'html',  
          success: function(data){
            console.log(data)
            $('#level').html(data)          
          }
      });
  }); 

  //Change Value on Click Level
  $('#level').on('change',function(){
      var idSearch = $('#level').find("option:selected").text(); 
      $.ajax({    
          method: "POST",      
          url: 'http://localhost:8080/parking/search-area',  
          data : {"searching" : idSearch },
          dataType: 'html',  
          success: function(data){
            console.log(data)
            $('#area').html(data)          
          }
      });
  }); 

  //Change Value on Click Area
  $('#area').on('change',function(){
      var idSearch = $('#area').find("option:selected").text(); 
      $.ajax({    
          method: "POST",      
          url: 'http://localhost:8080/parking/search-space',  
          data : {"searching" : idSearch },
          dataType: 'html',  
          success: function(data){
            var result = $.parseJSON(data);
            $('#baris').html(result[0])  
            $('#kolom').html(result[1])          
          }
      });
  }); 
</script>

<?= $this->endSection('content'); ?>