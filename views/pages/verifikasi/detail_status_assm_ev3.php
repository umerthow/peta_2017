<div class="panel panel-default">


<div class="row">


 <div class="col-md-12">
 <h3 class="breadcrumb">Detail Verifikasi Evaluasi Assement Level 3</h3>  
  <p class="text-center text-success" id="demo2"></p>
	<?php if($this->session->userdata('message')) {?>
  
    <ul class="alert alert-success">
       <span class="glyphicon glyphicon-ok"></span> <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
        
        </ul>
    <?php
    }
    ?>

  </div>
  <div class="col-md-12">
  <h5 class="text-right" style="padding-right: 10px;"><a href="<?php echo site_url('Verifikasi/convert_excel/'.$training->id_tpddk) ?>" class="btn btn-default" role="button" target="_blank"><span class="glyphicon glyphicon-print"> </span> Cetak Excel </a></h5> 
  </div> 

<div class="col-md-3"> 
								            </div>


  </div>
<table  caption"Hello" cellpadding="0" cellspacing="0" class="table table-stripped" style="border:0;">
                <thead class="success">
                <tr><td class="col-md-2">Nama Pegawai</td><td class="col-md-4"> <strong><?php echo $training->nama_pegawai  ?></strong></td></tr>
                <tr><td>Unit Kerja</td><td> <strong><?php echo $training->unit_kerja  ?></strong></td></tr>
                <tr><td>Judul Pelatihan</td><td> <a href="#"><strong><?php echo $training->judul_course  ?></strong></a></td></tr>
                <tr><td>Bidang</td><td><?php echo $training->nama_kategori ?></td></tr>
             	 <tr><td>Tanggal Pelatihan</td><td><?php echo tgl_indo($training->waktu_in)?> -- <?php echo tgl_indo($training->waktu_out)?></td></tr>
                 <tr><td>Penilai </td><td><a href="javascript:void(0)" class="btn btn-default btn-xs edit-AddBookDialog"  id="edit_penilai" value="Ubah Penilai" data-toggle="modal" data-target="#confirm-edit" data-id="<?php echo $training->id_tpddk ?>"> Edit Penilai <span class="glyphicon glyphicon-edit" ></span> </a></td>

                  <td><a href="javascript:void()" class="btn btn-default btn-xs open-approve-mail " onClick="Approvel_mail()" data-id="<?php echo $training->id_tpddk ?>" value="RESEND" > RESEND <span class="glyphicon glyphicon-envelope"  ></span> </a></td>

                  </tr>
	                 	<tr><td></td><td class="text-left">Atasan</td><td>:</td><td><?php echo $training->atasan ?></td><td><?php echo $training->email_atasan ?></td></tr>
	                 	<tr><td></td><td class="text-left">Rekan</td><td>:</td><td><?php echo $training->rekan ?></td><td><?php echo $training->email_rekan ?></td></tr>
	                 	<tr><td></td><td class="text-left">Bawahan</td><td>:</td><td><?php echo $training->bawahan ?></td><td><?php echo $training->email_bawahan ?></td></tr>
            
 </thead>
 </table>


<hr>

<p class="text-left">Rincian point evaluasi Level 3  :</p>
  <table class="table table-hover" caption"Hello" >
  								<thead>
								<tr>
								<th class="warning" rowspan="2" style="border:thin solid #cacaca; vertical-align:middle; text-align: center;">No </th>
									<th class="warning" rowspan="2" style="border:thin solid #cacaca; vertical-align:middle; text-align: center;">Item Evaluasi</th>
									<th class="warning" rowspan="2" style="border:thin solid #cacaca; vertical-align:middle; text-align: center;">Point Atasan</th>
									<th class="warning" rowspan="2" style="border:thin solid #cacaca; vertical-align:middle; text-align: center;">Point Rekan</th>	
									<th class="warning" rowspan="2" style="border:thin solid #cacaca; vertical-align:middle; text-align: center;">Point Bawahan</th>	
									<th class="warning" rowspan="2" style="border:thin solid #cacaca; vertical-align:middle; text-align: center;">Total</th>		
								

								</tr>
								</thead>
								<tbody>
									<?php
									$no =1;
									$jmla = 0;
									$jmlb = 0;
									?>
								<?php	foreach ($detail as $result) {  ?>
									<tr>
									<td style="border:thin solid #cacaca; text-align:center;"><?php echo $no++ ?></td>
										<td class="col-md-6" style="border:thin solid #cacaca; text-align:left;"><?php echo $result['item'] ?></td>
										<td style="border:thin solid #cacaca; text-align:center;"><?php echo $result['nilai_atasan'] ?></td>
										<td style="border:thin solid #cacaca; text-align:center;"><?php echo $result['nilai_rekan'] ?></td>
										<td style="border:thin solid #cacaca; text-align:center;"><?php echo $result['nilai_bawahan'] ?></td>
										<td style="border:thin solid #cacaca; text-align:center;"><?php echo $result['total'] ?></td>
									

										

										


								<?php }?>

									</tr>
								</tbody>
								<tfoot>
								<tr>
										<th  class="success" colspan="2" style="border:thin solid #cacaca; padding-left:20px;  ">
											TOTAL RATA-RATA : 
										</th>
										<th class="success"  style="text-align:right; border:thin solid #cacaca; text-align:center;">
											<?php
											echo $detail_average->avg_atasan;
											?>
										</th>
										<th class="success"  style="text-align:right; border:thin solid #cacaca; text-align:center;">
											<?php
											echo $detail_average->avg_rekan;
											?>
										</th>
										<th class="success"  style="text-align:right; border:thin solid #cacaca; text-align:center;">
											<?php
											echo $detail_average->avg_bawahan;
											?>
										</th>
										<th class="success"  style="text-align:right; border:thin solid #cacaca; text-align:center;">
											<?php
											echo $detail_average->avg_total;
											?>
										</th>
								</tr>
								
								
								</tfoot>

  </table>



  </div>
<a href="<?php echo site_url('Verifikasi/evaluasi_3_start/')  ?>">  Back </a>

<div class="modal fade" tabindex="-1" role="dialog" id="confirm-edit">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit Penilai Evaluasi Assesment LV 3</h4>
      </div>
      <?php echo form_open('verifikasi/update_penilai/'.$training->id_tpddk.'') ?>
      <div class="modal-body">

       <input type="hidden" name="bookId" id="bookId" value="" readonly/>
        <div class="form-group">
        <label for="kode">Email Atasan</label>
        	<div class='row'>
            <div class='col-md-6'>  
       	<input type="text" class="form-control" id="email_atasanx" name="nama_a" value="<?php echo $training->atasan ?>" >
       		</div>
       		<div class='col-md-6'> 
       		<input type="email" class="form-control" id="email_atasanx" name="email_a" value="<?php echo $training->email_atasan ?>" required >
       		</div>
       		</div>
      	</div>
        <div class="form-group">
        <label for="kode">Email Rekan</label>
       		 <div class='row'>
            <div class='col-md-6'> 
      		<input type="text" class="form-control" id="email_rekanx" name="nama_r" value="<?php echo $training->rekan ?>" >
      		</div>
      		<div class='col-md-6'> 
      		<input type="email" class="form-control" id="email_rekanx" name="email_r" value="<?php echo $training->email_rekan ?>" required>
      		</div>
      		</div>
      	</div>
         <div class="form-group">
         <label for="kode">Email Bawahan</label>
         	<div class='row'>
            <div class='col-md-6'>
       		<input type="text" class="form-control" id="email_bawahanx" name="nama_b" value="<?php echo $training->bawahan ?>" >
       		</div>
       		<div class='col-md-6'>
       		<input type="email" class="form-control" id="email_bawahanx" name="email_b" value="<?php echo $training->email_bawahan ?>" required >
       		</div>
       		</div>
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button  type="submit" class="btn btn-danger btn-ok">Ubah</button>
      </div>
       <?php echo form_close() ?>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
$(document).on("click", ".edit-AddBookDialog", function () {
     var myBookId = $(this).data('id');
     var myBookname = $(this).data('title');
      var myBooknip = $(this).data('name');
     $(".modal-body #bookId").val( myBookId );
      $(".modal-body #nama_pelatihan").val( myBookname );
        $(".modal-body #nip").val( myBooknip );
});
	

</script>
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
 $(document).on("click", ".open-approve-mail", function () {
 
   var myId = $(this).data('id');
   $.ajax({
                url: "<?php echo  base_url()?>/verifikasi/resend_checkpoint_daf_pddk/",
                data:'id='+myId,
                type: "POST",
                cache: false,
                beforeSend: function(){

                  $('#demo2').html("Loading...");
                  $('#demo2').html("<img height='20px' width='20px' src='<?php echo base_url()?>/assets/4.gif' /> Loading..");
                },
                   success: function(json){      
                  try{  

                    var obj = jQuery.parseJSON(json);
                     alert( obj['STATUS']);

                     if (obj['STATUS']=='true') {
                               $('#demo2').html("<ul class='alert alert-success'><span>Sukses resending email notifikasi! Redirecting...</span></ul>");
                                setTimeout(function(){
                               $('.alert-success').slideUp('slow').fadeOut(function() {
                               window.location.reload();
                               /* or window.location = window.location.href; */
                           });
                      }, 5000);
                          }
                          else {
                              $('#demo2').html("Gagal!");
                          }
                               
                                          
                  }catch(e) {  
                   alert('Exception while request..');
                  }  
                  },
                  error: function(){      
                   alert('Error while request..');
                   return false;
                  },


              });
 });
</script>
