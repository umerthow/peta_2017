<div class="row">


 <div class="col-md-12">
  <div class="panel panel-default">
  <div class="panel-heading"><span class="glyphicon glyphicon-chevron-right"></span> Detail Training Request</div>

  <div class="panel-body">      
 <?php if(!empty ($training->nama_pegawai)) { ?>
        <table class="table table-hover" caption"Hello">
                <thead class="success">
                <tr><td class="col-md-2">Nama Pegawai</td><td> <strong><?php echo $training->nama_pegawai  ?></strong></td></tr>
                  <tr><td>Email Pegawai 1 </td><td class="text-info"><?php echo $training->email_pegawai ?></td></tr>
                <tr><td>Unit Kerja</td><td> <strong><?php echo $training->unit_kerja  ?></strong></td></tr>
                <tr><td>Judul Pelatihan</td><td> <a href="<?php echo site_url('provider/detail/'.$training->id_course) ?>"><strong><?php echo $training->judul_course  ?></strong></a></td></tr>
                <tr><td>Bidang</td><td><?php echo $training->nama_kategori ?></td></tr>
                <tr><td>Lokasi</td><td><?php echo $training->kota_course ?></td></tr>
                <tr><td>Start</td><td><?php echo tgl_indo($training->waktu_in) ?></td></tr>
                <tr><td>End</td><td><?php echo tgl_indo($training->waktu_out) ?></td></tr>
                <tr><td>Biaya </td><td>Rp.<?php echo $training->biaya_course ?></td></tr>
                 <tr><td>Atasan </td><td><?php echo $training->atasan ?></td></tr>
                  <tr><td>Email Atasan </td><td class="text-info"><?php echo $training->email_atasan ?></td></tr>
                  <tr><td>Catatan </td><td><?php echo $training->catatan ?></td></tr>
                <tr><td>Status  </td><td><?php 

                $vars =$training->statusku;
                if ( $vars == 0){

                   echo "<span class='label label-default'>Menunggu Persetujuan Atasan</span>";
                  }else if ($vars  == 5) {

                    echo "<span class='label label-success'>Sudah disetujui Atasan </span>"; 
                    }else if ($vars  == 1) {


                                                         echo "<span class='label label-info'>Sudah diproses Oleh Diklat </span>"; 
                                    }else if ($vars == 2) {


                                                         echo "<span class='label label-danger'>Ditolak  </span>"; 
                                    }

                       ?> &nbsp;| &nbsp;<a href="<?php echo site_url('Verifikasi/detail_ev3/'.$training->id_tp) ?>" class="btn btn-default btn-sm">lihat</a></td> </tr>


                  <tr><td>Laporan  </td><td id='stasme'><?php
                     
                  foreach ($files_server as $file => $value ) 
                    if($value['status_doc'] > 0) {
                      echo "<small>laporan sudah diverifikasi</small> <br/>";
                    }
                    { ?>
                  <a href="<?php echo base_url()."assets/uploaded/".$value['laporan']; ?>" id="lab_status" target="_balnk" class="label <?php if($value['status_doc']==0) { echo "label-default"; }else { echo "label-info"; } ?> " > <?php echo $value['laporan'] ?></a>
                    | 

                  <?php } ?>  
                   <span class="text-center text-success" id="demo2"></span>
                  <div class="btn-group pull-right">
                    <button type="button" class="btn btn-danger btn-sm">Verifikasi Dokumen</button>
                    <button type="button" class="btn btn-danger btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <span class="caret"></span>
                      <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu">
                      <li><a href="javascript:void(0)" class="open-Approve" data-id="<?php echo $training->id_tp ?>">OK</a></li>
                      <li><a href="javascript:void(0)" class="open-Disapp" data-id="<?php echo $training->id_tp ?>">Disapprove</a></li>
                     
                    </ul>
                  </div>


                  </td></tr>
                  <tr  id ="confirm-area" style="display: none;">
                  <td></td><td > 
                 
                   <div class="form-group">
                  
                     <textarea class="form-control myform" name="comment_box" type="textarea" id="message" placeholder="Tulis alasan penolakan"  rows="5"></textarea>
                     </div>
                     <div class="form-group">
                     <button class="btn btn-primary btn-xs pull-right btn-process">Submit</button>
                      </div>
                      
                  </td></tr>

                  </tr>
               </table>
<p>&nbsp;<a href="<?php echo site_url('Training/verification_training_request')  ?>">  Back </a></p>
               <?php }else if(!empty ($training_new->Nama_pegawai)) {?>
                   <?php
                    $rupiah=number_format($training_new->biaya,2,',','.');
                   ?>
        <table class="table table-hover" caption"Hello">

                <thead class="success">
                <tr><td class="col-md-2">Nama Pegawai</td><td> <?php echo $training_new->Nama_pegawai  ?><td></tr>
                <tr><td>Unit Kerja</td><td> <?php echo $training_new->unit_kerja  ?></td></tr>
                 <tr><td>Provider Baru </td><td> <strong><?php echo $training_new->nama_provider  ?></strong></td></tr>
                <tr><td>Judul Pelatihan Baru</td><td> <strong><?php echo $training_new->judul_course  ?></strong></td></tr>
                 <tr><td>Email Provider</td><td><?php echo $training_new->email ?></td></tr>
                <tr><td>Bidang</td><td><?php echo $training_new->nama_kategori ?></td></tr>
                <tr><td>Kota</td><td><?php echo $training_new->kota_course ?></td></tr>
                <tr><td>Lokasi</td><td><?php echo $training_new->lokasi_pelatihan ?></td></tr>
                <tr><td>Start</td><td><?php echo tgl_indo($training_new->waktu_in) ?></td></tr>
                <tr><td>Catatan </td><td><?php echo $training_new->keterangan ?></td></tr>
                 <tr><td>Brosur</td><td><a href = "<?php echo base_url()."brosur/".$training_new->gatel; ?>" target="_blank" data-popup="true"> <button class="btn btn-default btn-sm dropdown-toggle" type="button"  aria-haspopup="true" aria-expanded="false">Lihat</button></a></td></tr> 
                  <tr><td>Biaya </td><td><?php echo $rupiah ?></td></tr>
              
               </table>
<p>&nbsp;<a href="<?php echo site_url('Training/verification_support_request')  ?>">  Back </a></p>
               <?php }else { ?>
                  <p>  Data not found </p>


                 <?php } ?>

                          
  </div>

</div>

</div>

</div>


<script type="text/javascript">

 $(document).on("click", ".open-Approve", function () {
  var myId = $(this).data('id');
  alert('ok'+myId);

     $.ajax({
         url: "<?php echo  base_url()?>/training/approval_document",
         data :{'id':myId},
         type: "POST",
         cache: false,

         beforeSend: function(e){
            $('#demo2').html("<img height='20px' width='20px' src='<?php echo base_url()?>/assets/4.gif' /> Loading..");
         },

          success: function(json){    
            try{ 
                   $('#demo2').html("<span class='label label-success'><span>OK!</span></span>");
                    $('#stasme').load(location.href + " #stasme");

            }catch(e) {  
                   alert('Exception while request..');
                  }  
          },
                  error: function(){      
                   alert('Error while request..');
                  },

     });

  });
</script>

<script type="text/javascript">
  $(document).on("click", ".open-Disapp", function () {
  var myId = $(this).data('id');
  
 
  $('#confirm-area').slideDown("slow");
 
  $('#confirm-area').on('click', '.btn-process', function(e) {

  var reason =  $('#message').val();


     $.ajax({
         url: "<?php echo  base_url()?>/training/rejected_document",
          data :{'id': myId,'reason' : reason},
         type: "POST",
         cache: false,

         beforeSend: function(e){
           
              $("#message").prop('required',true);

                           
                    $empty = $('#confirm-area').find("#message").filter(function() {
                        return this.value === "";
                    });
                    if($empty.length) {
                        alert('Mohon alasan penolakan laporan disi sebelum submit!');
                        return false;
                    }else{
                       $('#demo2').html("<img height='20px' width='20px' src='<?php echo base_url()?>/assets/4.gif' /> Loading..");
                        return true;
                    };
                 

         },

          success: function(json){    
            try{ 
                   $('#demo2').html("<span class='label label-success'><span>OK! Notif penolakan sudah dikirim ke ybs.</span></span>");
                   $('#lab_status').load(location.href + " #lab_status");

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