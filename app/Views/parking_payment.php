<?= $this->extend('themes/index'); ?>
<?= $this->section('content'); ?>
<script src="https://code.jquery.com/jquery-3.6.3.js"></script>

<h1>Payment Service</h1>

Nama Gedung : <?= $parkir['gedung'] ?>
<br />
Alamat : <?= $parkir['alamat'] ?>
<br />
Level : <?= $parkir['levelname'] ?>
<br />
Parkir : <?= $parkir['name'].' / Baris : '.$booking['baris'].' / Kolom : '.$booking['kolom'] ?>
<br />
Waktu : <?= $booking['startrent'].' sampai dengan '.$booking['endrent'] ?>
<br />
<h4>Total payment</h4>
<?php
    $date1 = new DateTime($booking['endrent']);
    $date2 = new DateTime($booking['startrent']);
    $diff = $date2->diff($date1);
    //Jam Parkir
    $hours = $diff->h;
    $hours = $hours + ($diff->days*24);
    //Biaya Sewa
    $cost = $parkir['ratepark'] * $hours;
?>
<h4>Durasi <?= $hours; ?> Jam</h4>
<h4>Rp <?= number_format(($cost),0,",","."); ?></h4>
</br>
<h4>Pilihan Pembayaran</h4>
<form method="post" action="<?= site_url('parking/payment') ?>">
    <?= csrf_field() ?>
    Metode Pembayaran
    <select name="metode" id="metode">
        <option value="">--Pilih--</option>
        <?php foreach ($payment as $row) : ?>
            <option value="<?= $row['methodid'] ?>"><?= $row['methodname'] ?></option>   
        <?php endforeach ?> 
    </select>   
    </br>
    Pilih Account / Channel Service
    <select name="channel" id="channel">
        <option value="">--Pilih Account--</option>
    </select> 
    <input type="text" name="biaya" id="biaya" value="<?= $cost; ?>" hidden readonly>
    <input type="text" name="bookingcode" id="bookingcode" value="<?= $booking['bookid']; ?>" hidden readonly>
    </br>
    <button type="submit">Confirm</button>
</form>

</br></br>



<script>
  $('#metode').on('change',function(){
      var idSearch = $('#metode').find("option:selected").val(); 
      $.ajax({    
          method: "POST",      
          url: 'http://localhost:8080/parking/search-service',  
          data : {"searching" : idSearch },
          dataType: 'html',  
          success: function(data){
            $('#channel').html(data)          
          }
      });
  });  
</script>
<?= $this->endSection('content'); ?>

