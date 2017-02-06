 <style type="text/css">

.table-responsive 
{   
  
     max-width: 2900px;
     overflow: scroll;

}
 </style>


<?php if($this->session->userdata('message')) {?>
  
    <ul class="alert alert-success">
       <span class="glyphicon glyphicon-ok"></span> <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
        
        </ul>
    <?php
    }
    ?>

 <div class="well well-sm pull-right">
                   <a href="#" class="btn btn-success" disabled > Verification Training Request </a>
                 
 </div>
 <div class="row">
 </div>
 

<div class="panel with-nav-tabs panel-default">
 <div class="panel-heading">
 <ul class="nav nav-tabs">
    <li class="active"><a href="#home">SEMUA </a></li>
    <li><a href="#menu1">SUDAH PROSES</a></li>
    <li><a href="#menu2">DITOLAK</a></li>
    <li><a href="#menu3">COMING SOON</a></li>
  </ul>
  </div>

   
    <div class="panel-body" style="font-size:12px">

  <div class="tab-content ">
   <p class="text-center text-success" id="demo2"></p>
      <div id="home" class="tab-pane fade in active" id="tab1danger">
       
      
<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%" style="font-family:arial;font-size:11px" >
       <thead>
            <tr>
               <th>#</th>
                <th>NIP</th>
                <th>Nama Karyawan</th>
                <th>Nama Pelatihan</th>
                <th>Jadwal Mulai</th>
                <th>Jadwal Selesai</th>
                <th>Tanggal Diusulkan</th>
                <th>Status</th>
                <th>Resend</th>
                <th class="col-md-2">Action</th>
            </tr>
        </thead>
    <tfoot>
            <tr>
              <th>#</th>
                <th>NIP</th>
                <th>Nama Karyawan</th>
                <th>Nama Pelatihan</th>
                <th>Jadwal Mulai</th>
                <th>Jadwal Selesai</th>
                <th>Tanggal Diusulkan</th>
                <th>Status</th>
                <th>Resend</th>
                <th class="col-md-2">Action</th>
            </tr>
        </tfoot>
                    <tbody>
                      <?php $no=1; ?>
                      <?php 
                      if (!empty($prov)) { 
                      foreach ($prov as $result)
                       { $judul = strtoupper($result->judul_course); ?>
                        
                  <tr>
                             <td> <?php echo $no++; ?></td>
                             <td><?php echo $result->NIP ?></td>
                           <td><a href="<?php echo site_url('training/detail_usul_course/'.$result->id_tp)?>"><?php echo $result->Nama_pegawai ?></a></td>
                            <td><?php echo $judul ?> </td>
                            <td><?php echo tgl_indo($result->waktu_in) ?> </td>
                    <td><?php echo tgl_indo($result->waktu_out) ?> </td>
                            <td><?php  
                              $pecah5 = explode (" ",$result->date);
                           echo $this->waktu->formatDate($pecah5[0],"id");
                          ?> 
                          </td>
                             <td><?php 

                                $vars =$result->status;
                                if ( $vars == 0){

                                   echo "<span class='label label-default'>Pending</span>";
                                  }else if ($vars  == 5) {

                                    echo "<span class='label label-success'>Ok </span>"; 
                                    }else if ($vars  == 1) {


                                                                         echo "<span class='label label-info'>Proccesed </span>"; 
                                                    }

                                    ?>  
                                </td>
                             <td> 

                              
                             <a href="<?php echo site_url('training/sent_checkpoint_daf/'.$result->id_tp) ?>" title="Kirim Pre Evaluasi Level 3"> <span class="glyphicon glyphicon-envelope" ><span> </a>
                         
                            
                         
                           
                          </td>
                          <td >

                              <div class="btn-group btn-group-sm">
                              <button type="button" class="btn btn-primary">Process</button>
                              <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                <span class="caret"></span>
                              </button>
                              <ul class="dropdown-menu" role="menu">
                               <!--  <li><a href="<?php echo site_url('verifikasi/approval_usul/'.$result->id_tp)?>">Approve</a></li> -->
                               <li><a href="javascript:void(0)" class="open-Approve" onClick="Approvel()" data-title=" <?php echo $result->judul_course ?>" data-name=" <?php echo $result->Nama_pegawai ?>" data-id="<?php echo $result->id_tp ?>">Approveel</a></li>
                                <li>
                                
                                <a href="javascript:void(0)" id="rejected" class="open-AddBookDialog" data-toggle="modal" data-target="#confirm-reject" data-href="<?php echo site_url('verifikasi/rejected_usul/'.$result->id_tp)?>" data-title=" <?php echo $result->judul_course ?>" data-name=" <?php echo $result->Nama_pegawai ?>" data-id="<?php echo $result->id_tp ?>">Disapprove</a>


                                
                                </li>
                                <li> <a href="<?php echo site_url('training/delete_detail_usul_course/'.$result->id_tp)?>">Reset</a></li>
                              </ul>
                            </div> 


                           </td>
                        </tr>
                        <?php 
                      }
                    } else {

                      echo "data not found";

                    }?>
                </tbody> 
    </table>


      </div>
      <div id="menu1" class="tab-pane fade">
        <table id="example2" class="table table-striped table-bordered" cellspacing="0" width="100%" style="font-family:arial;font-size:11px" >
        <thead>
            <tr>
               <th>#</th>
                <th>NIP</th>
                <th>Nama Karyawan</th>
                <th>Nama Pelatihan</th>
                <th>Jadwal Mulai</th>
                <th>Jadwal Selesai</th>
                <th>Tanggal Diusulkan</th>
                <th>Status</th>
                
            </tr>
        </thead>
    <tfoot>
            <tr>
              <th>#</th>
                <th>NIP</th>
                <th>Nama Karyawan</th>
                <th>Nama Pelatihan</th>
                <th>Jadwal Mulai</th>
                <th>Jadwal Selesai</th>
                <th>Tanggal Diusulkan</th>
                <th>Status</th>
                
            </tr>
        </tfoot>
        <tbody>
        <?php $no=1; ?>
                      <?php 
                      if (!empty($prov_approved)) { 
                      foreach ($prov_approved as $result)
                       { $judul = strtoupper($result->judul_course); ?>
                        
                  <tr>
                  <td> <?php echo $no++; ?></td>
                             <td><?php echo $result->NIP ?></td>
                           <td><a href="<?php echo site_url('training/detail_usul_course/'.$result->id_tp)?>"><?php echo $result->Nama_pegawai ?></a></td>
                            <td><?php echo $judul ?> </td>
                            <td><?php echo tgl_indo($result->waktu_in) ?> </td>
                    <td><?php echo tgl_indo($result->waktu_out) ?> </td>
                            <td><?php  
                              $pecah5 = explode (" ",$result->date);
                           echo $this->waktu->formatDate($pecah5[0],"id");
                          ?> 
                          </td>
                             <td><?php 

                                $vars =$result->status;
                                if ( $vars == 0){

                                   echo "<span class='label label-default'>Pending</span>";
                                  }else if ($vars  == 5) {

                                    echo "<span class='label label-success'>Ok </span>"; 
                                    }else if ($vars  == 1) {


                                                                         echo "<span class='label label-info'>Proccesed </span>"; 
                                                    }

                                    ?>  
                                </td>
                  </tr>
                  <?php }

                  }?>
        </tbody>
        </table>
      </div>
      <div id="menu2" class="tab-pane fade">
      <table id="example3" class="table table-striped table-bordered" cellspacing="0" width="100%" style="font-family:arial;font-size:11px" >
      <thead>
            <tr>
               <th>#</th>
                <th>NIP</th>
                <th>Nama Karyawan</th>
                <th class="col-md-3">Nama Pelatihan</th>
                <th>Jadwal Mulai</th>
                <th>Jadwal Selesai</th>
                <th>Tanggal Diusulkan</th>
                <th>Status</th>
                
            </tr>
        </thead>
    <tfoot>
            <tr>
              <th>#</th>
                <th>NIP</th>
                <th>Nama Karyawan</th>
                <th class="col-md-3">Nama Pelatihan</th>
                <th>Jadwal Mulai</th>
                <th>Jadwal Selesai</th>
                <th>Tanggal Diusulkan</th>
                <th>Status</th>
                
            </tr>
        </tfoot>
        <tbody>
        <?php $no=1; ?>
                      <?php 
                      if (!empty($prov_rejected)) { 
                      foreach ($prov_rejected as $result)
                       { $judul = strtoupper($result->judul_course); ?>
                        
                  <tr>
                  <td> <?php echo $no++; ?></td>
                             <td><?php echo $result->NIP ?></td>
                           <td><a href="<?php echo site_url('training/detail_usul_course/'.$result->id_tp)?>"><?php echo $result->Nama_pegawai ?></a></td>
                            <td><?php echo $judul ?> </td>
                            <td><?php echo tgl_indo($result->waktu_in) ?> </td>
                    <td><?php echo tgl_indo($result->waktu_out) ?> </td>
                            <td><?php  
                              $pecah5 = explode (" ",$result->date);
                           echo $this->waktu->formatDate($pecah5[0],"id");
                          ?> 
                          </td>
                             <td><?php 

              
                if ( $result->status == 0){

                   echo "<span class='label label-default'>Menunggu Persetujuan Atasan</span>";
                  }else if ($result->status == 5) {

                    echo "<span class='label label-success'>Sudah disetujui Atasan </span>"; 
                    }else if ($result->status == 1) {


                                                         echo "<span class='label label-info'>Sudah diproses Oleh Diklat </span>"; 
                                    } else if ($result->status == 2) {


                                                         echo "<span class='label label-danger'>Ditolak  </span>"; 
                                    }

                       ?>  </td>

                  </tr>
                  <?php }

                  }?>
        </tbody>
      </table>

      </div>
      <div id="menu3" class="tab-pane fade">
         
<table id="example4" class="table table-striped table-bordered" cellspacing="0" width="100%" style="font-family:arial;font-size:11px" >
       <thead>
            <tr>
               <th>#</th>
                <th>NIP</th>
                <th>Nama Karyawan</th>
                <th>Nama Pelatihan</th>
                <th>Jadwal Mulai</th>
                <th>Jadwal Selesai</th>
                <th>Tanggal Diusulkan</th>
                <th>Status</th>
                <th>Resend</th>
                <th class="col-md-2">Action</th>
            </tr>
        </thead>
    <tfoot>
            <tr>
              <th>#</th>
                <th>NIP</th>
                <th>Nama Karyawan</th>
                <th>Nama Pelatihan</th>
                <th>Jadwal Mulai</th>
                <th>Jadwal Selesai</th>
                <th>Tanggal Diusulkan</th>
                <th>Status</th>
                <th>Resend</th>
                <th class="col-md-2">Action</th>
            </tr>
        </tfoot>
                    <tbody>
                      <?php $no=1; ?>
                      <?php 
                      if (!empty($prov_month)) { 
                      foreach ($prov_month as $result)
                       { $judul = strtoupper($result->judul_course); ?>
                        
                  <tr>
                             <td> <?php echo $no++; ?></td>
                             <td><?php echo $result->NIP ?></td>
                           <td><a href="<?php echo site_url('training/detail_usul_course/'.$result->id_tp)?>"><?php echo $result->Nama_pegawai ?></a></td>
                            <td><?php echo $judul ?> </td>
                            <td><?php echo tgl_indo($result->waktu_in) ?> </td>
                    <td><?php echo tgl_indo($result->waktu_out) ?> </td>
                            <td><?php  
                              $pecah5 = explode (" ",$result->date);
                           echo $this->waktu->formatDate($pecah5[0],"id");
                          ?> 
                          </td>
                             <td><?php 

                                $vars =$result->status;
                                if ( $vars == 0){

                                   echo "<span class='label label-default'>Pending</span>";
                                  }else if ($vars  == 5) {

                                    echo "<span class='label label-success'>Ok </span>"; 
                                    }else if ($vars  == 1) {


                                                                         echo "<span class='label label-info'>Proccesed </span>"; 
                                                    }

                                    ?>  
                                </td>
                             <td> 

                              
                             <a href="<?php echo site_url('training/sent_checkpoint_daf/'.$result->id_tp) ?>" class="btn btn-default btn-xs " title="Kirim Pre Evaluasi Level 3"> RESEND <span class="glyphicon glyphicon-envelope" ><span> </a>
                         
                            
                         
                           
                          </td>
                          <td >

                              <div class="btn-group btn-group-sm">
                              <button type="button" class="btn btn-primary">Process</button>
                              <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                <span class="caret"></span>
                              </button>
                              <ul class="dropdown-menu" role="menu">
                                <!-- <li><a href="<?php echo site_url('verifikasi/approval_usul/'.$result->id_tp)?>">Approve</a></li> -->
                                <li><a href="javascript:void(0)" class="open-Approve" onClick="Approvel()" data-title=" <?php echo $result->judul_course ?>" data-name=" <?php echo $result->Nama_pegawai ?>" data-id="<?php echo $result->id_tp ?>">Approval</a></li>
                                <li>
                                
                                <a href="javascript:void(0)" id="rejected" class="open-AddBookDialog" data-toggle="modal" data-target="#confirm-reject" data-href="<?php echo site_url('verifikasi/rejected_usul/'.$result->id_tp)?>" data-title=" <?php echo $result->judul_course ?>" data-name=" <?php echo $result->Nama_pegawai ?>" data-id="<?php echo $result->id_tp ?>">Disapprove</a>


                                
                                </li>
                                <li> <a href="<?php echo site_url('training/delete_detail_usul_course/'.$result->id_tp)?>">Reset</a></li>
                              </ul>
                            </div> 


                           </td>
                        </tr>
                        <?php 
                      }
                    } else {

                      echo "data not found";

                    }?>
                </tbody> 
    </table>
      </div>
    </div>

</div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="confirm-reject">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Reject Confirmation</h4>
      </div>
      <?php echo form_open('verifikasi/rejected_usul/') ?>
      <div class="modal-body">

       <input type="hidden" name="bookId" id="bookId" value="" readonly/>
        <div class="form-group">
          <input type="text" class="form-control" id="nip" value="" readonly>
       </div>
        <div class="form-group">
           <input type="text" class="form-control" id="nama_pelatihan" value="" readonly>
        </div>
      <div class="form-group">
          <textarea class="form-control" rows="5" name="reason_rejected" id="reason" placeholder="Tulis alasan penolakan disini"></textarea>
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button  type="submit" class="btn btn-danger btn-ok">Reject</button>
      </div>
       <?php echo form_close() ?>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" tabindex="-1" role="dialog" id="myaprv">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Aprroval Confirmation</h4>
      </div>
  
      <div class="modal-body">

       <input type="hidden" name="bookId" id="bookId" value="" readonly/>
        <div class="form-group">
          <input type="text" class="form-control" id="nip" value="" readonly>
       </div>
        <div class="form-group">
           <input type="text" class="form-control" id="nama_pelatihan" value="" readonly>
        </div>
      <div class="form-group">
          <textarea class="form-control" rows="5" name="reason_aprroval" id="reason_aprroval" placeholder="Tulis alasan persetujuan disini"></textarea>
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button  type="submit" class="btn btn-info btn-process">Process</button>
      </div>
       
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->




 <script>
$(document).on("click", ".open-AddBookDialog", function () {
     var myBookId = $(this).data('id');
       var myBookname = $(this).data('title');
      var myBooknip = $(this).data('name');
     $(".modal-body #bookId").val( myBookId );
      $(".modal-body #nama_pelatihan").val( myBookname );
        $(".modal-body #nip").val( myBooknip );
     alert('Error while request..'+ myBookId );
});
  

</script>


 
<script type="text/javascript">
      $(document).ready(function() {
    $('#example').DataTable();
    // $('#example2').DataTable();
      $('#example3').DataTable();
       $('#example4').DataTable();
} );
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $(".nav-tabs a").click(function(){
        $(this).tab('show');
    });
});
  
  
</script>


<script type="text/javascript">

   $(document).on("click", ".open-Approve", function () {
     var myId = $(this).data('id');
     var judul = $(this).data('title');
     var nama = $(this).data('name');
     alert('Selected'+ myId );
     $('#myaprv').modal('show');
     $(".modal-body #bookId").val( myId );
     $(".modal-body #nama_pelatihan").val( judul );
     $(".modal-body #nip").val( nama );

      $('#myaprv').on('click', '.btn-process', function(e) {
       var reason =  $(".modal-body #reason_aprroval").val();

        $.ajax({
                url: "<?php echo  base_url()?>/verifikasi/approval_usul",
                data :{'id': myId,'reason' : reason},
      
            
                type: "POST",
                cache: false,
                beforeSend: function(){
                  $('#myaprv').modal('hide');
                  $('#demo2').html("Loading...");
                  $('#demo2').html("<img height='20px' width='20px' src='<?php echo base_url()?>/assets/4.gif' /> Loading..");
                 

                },
                   success: function(json){      
                  try{  

                    var obj = jQuery.parseJSON(json);
                     alert( obj['STATUS']);

                     if (obj['STATUS']=='true') {
                               $('#demo2').html("<ul class='alert alert-success'><span>Sukses memproses data!</span></ul>");
                                setTimeout(function(){
                               $('.alert-success').slideUp('slow').fadeOut(function() {
                               window.location.reload();
                               /* or window.location = window.location.href; */
                           });
                      }, 5000);
                          }
                          else if(obj['STATUS']=='gagal') {
                             $('#demo2').html("<ul class='alert alert-danger'><span><b>Gagal</b> - Ybs, belum menyelesaikan administrasi laporan diklat sebelumnya!</span></ul>");
                          } else {
                              $('#demo2').html("Gagal -  Tanggal Post Assesment belum disi!");
                          }
                               
                                           //alert( obj['STATUS']);
                     // $('#demo2').html("<ul class='alert alert-success'><span>Sukses memproses data!</span></ul>");
                     // setTimeout(function(){
                     //       $('.alert-success').slideUp('slow').fadeOut(function() {
                     //           window.location.reload();
                     //           /* or window.location = window.location.href; */
                     //       });
                     //  }, 5000);
                   
                  }catch(e) {  
                   alert('Exception while request..');
                  }  
                  },
                  error: function(){      
                   alert('Error while request..');
                  },


              });


      });


        
   });
 
</script>


<script type="text/javascript">
  $(document).ready(function() {

    //$('#example2').DataTable();
    // Setup - add a text input to each footer cell
    $('#example2 tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" class="form-control" placeholder="Search '+title+'" />' );

    } );
 
    // DataTable
    var table = $('#example2').DataTable({

    dom: 'Bfrtip',
   
    buttons: ['copy', 'excel', 'pdf'],
        "sScrollX": "100%",
        "sScrollXInner": "120%",
        "bScrollCollapse": true

    });
 
    // Apply the search
    table.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );
} );
</script>