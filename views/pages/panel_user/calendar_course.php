<div class="col-md-12">
<script src="http://fullcalendar.io/fullcalendar/api/js?key=HdfajhsdAH_23_AafasfwW3-214QWf8-3fggsY"></script>
      <h3><i class="glyphicon glyphicon-calendar"></i> Training Calendar</h3>  
      <hr>

<style>




</style>
<div class="row">
  <div id="calendar" license_key=""></div>
  <br />
   <br />


<div id="fullCalModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> <span class="sr-only">close</span></button>
                <h4 id="modalTitle" class="modal-title"></h4>
               <a id="Modalstart">sdsd</a>| <span id="eventdate_end"></span>
            </div>
            <div  class="modal-body">
              
          <form class="form-horizontal" name="commentform" method="post" action="tambah_course/ <?php echo "<p id='aku'></p>" ?>" id="myForm">
             <p> <label class="sr-only" for="exampleInputEmail2">Subject</label>Tujuan: <p id="modalBody"> </p></p>
              
             
           
           
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left " data-dismiss="modal">Close</button>
               <a href="" type="submit" class="btn btn-danger pull-right btn-ok" data-id="idx" id="eventUrl"><span class="glyphicon glyphicon-check"></span> Cek Detail</a>
                </form>
               <!-- <button class="btn btn-success"><a id="eventUrl" target="_blank">Event Page</a></button> -->
            </div>
        </div>
    </div>
</div>






</div>
<script>

  $(document).ready(function() 

  {   $('#calendar').fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay'
      },
      
      editable: false,
      eventLimit: true,

      select: function(start, end, allDay,id) {
          endtime = $.fullCalendar.formatDate(end,'h:mm tt');
          starttime = $.fullCalendar.formatDate(start,'ddd, MMM d, ');
       
        },

       // allow "more" link when too many events
      events: {
      url: 'http://localhost/project_ci/phplec/php/get-events.php',
        error: function() {
          $('#script-warning').show();

        }

      },

     eventClick:  function( event, jsEvent, view) {

        
             var idx = event.id;
            $('#Modalstart').html(event.start);
            $('#modalTitle').html(event.title);
            $('#modalBody').html(event.tujuan);
             $('#eventUrl').attr('href',event.url, event.id);
            $('#start').text(event.start);
            $('#end').text(event.end);
            $('#fullCalModal').modal();
            $('#createEventModal #when').text(mywhen);
            $(document.getElementById("aku").innerHTML) = idx;
        


        },



      loading: function(bool) {
        $('#loading').toggle(bool);
      },
      

    




    });
    



  });

</script>

<script>
  
      function myFunction() {
      var myOrderString = event.id;
                document.getElementById('myOrderString').value = myOrderString;
                document.getElementById('myForm');
            
      
  }
</script>
<script>
               $(document).on('click','.btn-ok',function(e){
                e.preventDefault();
              
                 jQuery.ajax({
                  type:"POST",
                  url:base_url() + "verifikasi/rejected_usul"
                  data: {id:$(this).attr('data-id')},
                  function(html){
                        $(".modal-body").html(data);
                    }  
                 });
        });

    
</script>