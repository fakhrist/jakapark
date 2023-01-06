<footer class="footer text-center">
       JakaPark - accompanies your parking experience</a>.
<div class="modal fade" id="BookingModal" tabindex="-1" role="dialog" aria-labelledby="BookingModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">My Booking</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body" id="bookingview">

        </div>
        </div>
    </div>
</div>

<script>
  //Change Value on Click City
  $('.modalViewBooking').on('click',function(){
      var el = this; 
      var idSearch = $(this).data('booking');
      $.ajax({    
          method: "POST",      
          url: 'http://localhost:8080/parking/search-booking',  
          data : {"searching" : idSearch },
          dataType: 'html',  
          success: function(data){
            console.log(data)
            $('#bookingview').html(data)          
          }
      });
  });   
</script>       
</footer>