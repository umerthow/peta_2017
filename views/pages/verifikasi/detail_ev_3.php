<div class="panel panel-default">


<div class="row">


 <div class="col-md-10">
 <h3 class="breadcrumb">Detail Verifikasi Evaluasi Level 3</h3>  
	<?php if($this->session->userdata('message')) {?>
  
    <ul class="alert alert-success">
       <span class="glyphicon glyphicon-ok"></span> <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
        
        </ul>
    <?php
    }
    ?>
     <p class="text-right text-success" id="demo2"></p>
  </div>
  <div class="col-md-2">
  <br/>
 <div class="btn-group btn-group">
                              <button type="button" class="btn btn-primary">Process</button>
                              <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                <span class="caret"></span>
                              </button>
                              <ul class="dropdown-menu" role="menu">
                                <!-- <li><a href="<?php echo site_url('verifikasi/approval_usul/'.$training->id_tp)?>">Approve</a></li> -->
                                <li><a href="javascript:void(0)" class="open-Approve" onClick="Approvel()" data-title=" <?php echo $training->judul_course ?>" data-name=" <?php echo $training->nama_pegawai ?>" data-id="<?php echo $training->id_tp ?>">Approval</a></li>
                                <li>
                                
                                <a href="javascript:void(0)" id="rejected" class="open-AddBookDialog" data-toggle="modal" data-target="#confirm-reject" data-href="<?php echo site_url('verifikasi/rejected_usul/'.$training->id_tp)?>" data-title=" <?php echo $training->judul_course ?>" data-name=" <?php echo $training->nama_pegawai ?>" data-id="<?php echo $training->id_tp ?>">Disapprove</a>


                                
                                </li>
                                <li> <a href="<?php echo site_url('training/delete_detail_usul_course/'.$training->id_tp)?>">Reset</a></li>
                                <li><a href="<?php echo site_url('Verifikasi/conver_pdf/'.$training->id_tp) ?>"  role="button" target="_blank"><span class="glyphicon glyphicon-print pull-right"> </span> Cetak </a> </li>
                              </ul>
                            </div> 




  
  </div>

<div class="col-md-3"> 
								            </div>
  </div>
<table  caption"Hello" cellpadding="0" cellspacing="0" class="table table-stripped" style="border:0;">
                <thead class="success">
                <tr><td class="col-md-2">Nama Pegawai</td><td> <strong><?php echo $training->nama_pegawai  ?></strong></td></tr>
                <tr><td>Unit Kerja</td><td> <strong><?php echo $training->unit_kerja  ?></strong></td></tr>
                <tr><td>Judul Pelatihan</td><td> <a href="<?php echo site_url('provider/detail/'.$training->id_course) ?>"><strong><?php echo $training->judul_course  ?></strong></a></td></tr>
                <tr><td>Bidang</td><td><?php echo $training->nama_kategori ?></td></tr>
             	 <tr><td>Tanggal Pelatihan</td><td><?php echo tgl_indo($training->waktu_in)?> -- <?php echo tgl_indo($training->waktu_out)?></td></tr>
                 <tr><td>Penilai </td><td><?php echo $training->atasan ?></td></tr>
               <!--   <tr><td></td><td> <div class="btn-group  text-right " >
								              <button type="button" class="btn btn-primary">Process</button>
								              <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
								                <span class="caret"></span>
								              </button>
								              <ul class="dropdown-menu" role="menu">
								                <li><a href="<?php echo site_url('verifikasi/approval_usul/'.$training->id_tp)?>">Approve</a></li>
								                <li><a href="<?php echo site_url('verifikasi/rejected_usul/'.$training->id_tp)?>">Disapprove</a></li>
								              </ul>
								            </div> </td></tr> -->
				<tr><td>Rencana Post Level 3</td><td>
			
					<?php  if(empty($training->tgl_post3)){ ?>
					<?php echo form_open('Verifikasi/update_post_3/'.$training->id_tp) ?>
					
				     <div class="input-group date form_date form_date col-md-6 " data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                    <input class="form-control" size="16"  name="post_3_plan" type="text" readonly >
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>

                	</div>
                	</td>
                	<td>
         			<input type="submit" name="tambah" id="tambah" value="submit" class="btn btn-success" />
        			
					</form>
					<?php echo form_close() ?>
					<?php } else {?>
					<?php echo tgl_indo($training->tgl_post3) ?>
					<?php }?>
				</td></tr>
 </thead>
 </table>
<hr>
<h3 class="breadcrumb">Detail Sasaran Kompetensi & Evaluasi</h3>
 <p class="text-left">Sasaran Kompetensi   :</p>
 <table class="table table-hover" caption"Hello" >
	 <thead>
	 	<tr>
								<th class="warning" rowspan="2" style="border:thin solid #cacaca; vertical-align:middle; text-align: center;">No </th>
									<th class="warning" rowspan="2" style="border:thin solid #cacaca; vertical-align:middle; text-align: center;">Nama Kompetensi</th>
									<th class="warning" rowspan="2" style="border:thin solid #cacaca; vertical-align:middle; text-align: center;">Item</th>
									<th class="warning" rowspan="2" style="border:thin solid #cacaca; vertical-align:middle; text-align: center;">Level</th>
		
								

								</tr>
	 </thead>
	 <tbody>
	 							<?php $no=1;
	 							foreach ($kompetensi as $key => $value) { ?>
	 							<tr>
									<td  class="col-md-1"style="border:thin solid #cacaca; text-align:center;"><?php echo $no++ ?></td>
										<td style="border:thin solid #cacaca; text-align:left;"><?php echo $value->nama_kompetensi ?></td>
										<td style="border:thin solid #cacaca; text-align:left;"><?php echo $value->item ?></td>
										<td style="border:thin solid #cacaca; text-align:left;"><?php echo $value->level ?></td>
										
									</tr>
	 							<?php }

	 							 ?>
	 </tbody>
 </table>
 <br/>
 <p class="text-left">Rincian point evaluasi Level 3  :</p>
  <table class="table table-hover" caption"Hello" >
								<thead>
								<tr>
								<th class="warning" rowspan="2" style="border:thin solid #cacaca; vertical-align:middle; text-align: center;">No </th>
									<th class="warning" rowspan="2" style="border:thin solid #cacaca; vertical-align:middle; text-align: center;">Item Evaluasi</th>
									<th class="warning" rowspan="2" style="border:thin solid #cacaca; vertical-align:middle; text-align: center;">Point Pre</th>
									<th class="warning" rowspan="2" style="border:thin solid #cacaca; vertical-align:middle; text-align: center;">Point Post</th>		
								

								</tr>
								</thead>
								
									
								<tbody>
									<?php
									$no =1;
									$jmla = 0;
									$jmlb = 0;
									?>
								<?php	foreach ($detail as $result) {
										# code...?>
									<tr>
									<td style="border:thin solid #cacaca; text-align:center;"><?php echo $no++ ?></td>
										<td class="col-md-6" style="border:thin solid #cacaca; text-align:left;"><?php echo $result['item'] ?></td>
										<td style="border:thin solid #cacaca; text-align:center;"><?php echo $result['nilai_pre3'] ?></td>
									

										

										<td  style="border:thin solid #cacaca; text-align:center;"> <?php echo $result['tps'] ?></td>
												
										<?php
												
											}

											?>

													
												

									</tr>
									

								</tbody>
								<tfoot>
								<tr>
										<th  class="success" colspan="2" style="border:thin solid #cacaca; padding-left:20px;  ">
											TOTAL RATA-RATA : 
										</th>
										<th class="success"  style="text-align:right; border:thin solid #cacaca; text-align:center;">
											<?php
											echo $detail_average->abc;
											?>
										</th>
										<th class="success"  style="text-align:right; border:thin solid #cacaca; text-align:center;">
											<?php
											echo $detail_average->def;
											?>
										</th>
								</tr>
								<tr>

										<th colspan="2" style="border:thin solid #cacaca; padding-left:20px; background-color:#962C0C; color:#fff;">
											DELTA : 
										</th>
										<th  class="success"  colspan="2" style="text-align:right; border:thin solid #cacaca; text-align:center;">
											<?php  echo (($detail_average->def) -($detail_average->abc)) ?>
										</th>
								</tr>
								<tr>
									<th colspan="2" style="border:thin solid #cacaca; padding-left:20px; background-color:#0b0348; color:#fff;">
										POINT EVALUASI LEVEL 4 
									</th>
									<th  class="success" colspan="2" style="text-align:right; border:thin solid #cacaca; text-align:center;">
										<?php 

										if (empty($nilai_post4->nilai)){ ?>

										 0
										<?php } else 
											echo $nilai_post4->nilai ?>
									</th>
								</tr>
								</tfoot>

  </table>
<p class="text-left">Rincian point evaluasi Level 4  : <?php if (empty($nilai_post4->nilai)){ ?>

										 0
										<?php } else 
											echo $nilai_post4->nilai ?></p>




  </div>
<a href="<?php echo site_url('Training/verification_training_request')  ?>">  Back </a>



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


<script type="text/javascript">
    $('.form_datetime').datetimepicker({
        //language:  'fr',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        forceParse: 0,
        showMeridian: 1
    });
    $('.form_date').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        forceParse: 0
    });
    $('.form_time').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 1,
        minView: 0,
        maxView: 1,
        forceParse: 0
    });

</script>
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
