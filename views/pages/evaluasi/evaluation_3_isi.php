 <h3><i class="glyphicon glyphicon-dashboard"></i> Dashboard Training</h3> 
<div class="row">
	
<div class="col-md-9">
	
    <?php
    if (!$point) {
    ?>
    <p><div class="col-md-9">
     <?php if($this->session->userdata('message')) {?>
  
    <ul class="alert alert-info">
       <span class="glyphicon glyphicon-exclamation-sign"></span> <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
        
        </ul>
    <?php
    }
    ?>
    <?php if($this->session->userdata('berhasil')) {?>
  
    <ul class="alert alert-success">
       <span class="glyphicon glyphicon-ok"></span> <?php echo $this->session->userdata('berhasil') <> '' ? $this->session->userdata('berhasil') : ''; ?>
        
        </ul>
    <?php
    }
    ?>
	<br>
	<br>
	<div class="panel panel-default" id="example-basic">
    <div class="panel-heading"><span class="glyphicon glyphicon-chevron-right"></span>Perumnas Training Agenda (PeTA) Information : </div>
	<div class="panel-body">
	 <p class="text-justify">Ada keluhan? silahkan  kirim kan ke  <a href="mailto:dept.diklat@perumnas.co.id">dept.diklat@perumnas.co.id</a> </p>
		    <p class="text-justify"> </p>
		    <p class="text-justify">Dept Diklat akan segera memproses dan memverifikasi   dalam waktu 2 hari kerja  </p>
		<p> Terima Kasih </p>

		<p><a href="<?php echo base_url('Panel_user'); ?>"><b>HOME</b></a></p>
	</div>	
	</div>
	</div>
    <?php
	}else {
	?>
	<div class="panel panel-default" id="example-basic">
    <div class="panel-heading"><span class="glyphicon glyphicon-chevron-right"></span> Evaluasi Level 3  <b>PRE</b> [FRM-PSDM-04-01-06, Rev.0] </div>
	<?php echo form_open('Panel_user/update_pre')?>
    <div class="panel-body">	
    	
    							 <div class="form-group has-success">
						       
						       
						      
								      <?php  
								    
								       foreach($point as $result ) {?>
						   						

						       
						        <table class="table">
						        	<tr>
						        		<th class="col-md-4">Judul Pendidikan Berjenjang </th><td>:</td><td><input type="hidden"  class="form-control" name="course" value="<?php echo $result->id_course ?>" /><?php echo $result->judul_course ?> - <?php echo $result->nama_provider ?> </td>
						        	</tr>
						        	<tr>
						        	<th>Jadwal  </th><td>:</td><td> <?php echo tgl_indo($result->waktu_in)?> s/d <?php echo tgl_indo($result->waktu_out)?></td>
						        	</tr>
						        </table>
						       
						    </div>
						     <?php } ?>
				
<div class="step well">
						        <div class="panel panel-danger">
						        <div class="panel-heading">Evaluasi Pelatihan an . <?php echo $result->Nama_pegawai  ?> , Silahkan nilai pada form dibawah :  </div>
						        <div class="panel-body">

						         <table class="table table-condensed" >
						     <?php $no=1; foreach ($tujuan as $key => $value) { ?>
						         	<thead class="danger text-left">
            							<th class="text-left col-md-6" style="vertical-align:middle;"><?php echo $value->tujuan_pelatihan ?></th>
            							<th class="hidden"><input type="hidden" name="options[1][item]" value="<?php echo $value->tujuan_pelatihan  ?>" /></th>
            							<th class="text-center" style="vertical-align:middle;">
            								<div class="input-group">
						    				<div id="radioBtn" class="btn-group text-right middle; " style=""  >
						    					
						    						<div class="btn-group" data-toggle="buttons" >
													  <label class="btn btn-warning " >
													    <input type="radio" name="options[1][nilai_pre3]" id="option1" autocomplete="off"  value="10" > 1
													  </label>
													  <label class="btn btn-warning">
													    <input type="radio" name="options[1][nilai_pre3]" id="option2" autocomplete="off" value="20">  2
													  </label>
													  <label class="btn btn-warning">
													    <input type="radio" name="options[1][nilai_pre3]" id="option3" autocomplete="off" value="30">  3
													  </label>
													   <label class="btn btn-primary ">
													    <input type="radio" name="options[1][nilai_pre3]" id="option4" autocomplete="off" value="40"> 4
													  </label>
													  <label class="btn btn-primary">
													    <input type="radio" name="options[1][nilai_pre3]" id="option5" autocomplete="off" value="50">  5
													  </label>
													  <label class="btn btn-primary">
													    <input type="radio" name="options[1][nilai_pre3]" id="option6" autocomplete="off" value="60">  6
													     </label>
													      <label class="btn btn-primary">
													    <input type="radio" name="options[1][nilai_pre3]" id="option7" autocomplete="off" value="70">  7
													  </label>
													  <label class="btn btn-success">
													    <input type="radio" name="options[1][nilai_pre3]" id="option8" autocomplete="off" value="80">  8
													  </label>
													   <label class="btn btn-success ">
													    <input type="radio" name="options[1][nilai_pre3]" id="option9" autocomplete="off" value="90"> 9
													  </label>
													  <label class="btn btn-success">
													    <input type="radio" name="options[1][nilai_pre3]" id="option10" autocomplete="off" value="100">  10
													  </label>
													</div>
												    						    					
						    				</div>
						    					
						    				</div>
            							</th>
            						</thead>
            						 <tbody>
            						 	<tr>
            						 	<td class="text-left">
            						 		
						    			
						    				</div>
						    				

            						 	

						       
						        	
							    <div class="form-group">
							  		
							       
							        	
							        
						    				</td>
						    				<td></td>
						    				
						    				<?php } ?>

						    				

            						 	</tr>
            						 </tbody>

						         </table>


						    		<table class="table text-center">
						    					<tr>
						    					<th colspan="10">	<b>Keterangan</b></th>
						    					</tr>
						    						<tr> 
						    							<th><div class="btn-group" data-toggle="buttons">
													 				 <label class="btn btn-warning">
													   					 <input type="radio" name="" id="option1" autocomplete="off"  value="10">1 </label>
													   					  <label class="btn btn-warning active" >
													    <input type="radio" name="" id="option2" autocomplete="off" value="20" checked="">  2
													  </label>
													   <label class="btn btn-warning">
													    <input type="radio" name="" id="option2" autocomplete="off" value="20">  3
													  </label>

													   					 </div>
														 </th><td>:</td><td>Kurang</td>
													
													
						    							<td><div class="btn-group" data-toggle="buttons">
													 				 <label class="btn btn-primary">
													   					 <input type="radio" name="" id="option1" autocomplete="off"  value="10">4 </label>
													   					 <label class="btn btn-primary active">
													   					 <input type="radio" name="" id="option1" autocomplete="off"  value="10">5 </label>
													   					 <label class="btn btn-primary">
													   					 <input type="radio" name="" id="option1" autocomplete="off"  value="10">6 </label>
													   					 <label class="btn btn-primary">
													   					 <input type="radio" name="" id="option1" autocomplete="off"  value="10">7 </label>
													   					 </div>
														 </td><td>:</td><td>Sedang</td>
												
													
						    							<td><div class="btn-group" data-toggle="buttons">
													 				 <label class="btn btn-success">
													   					 <input type="radio" name="" id="option1" autocomplete="off"  value="10">8</label>
													   					  <label class="btn btn-success active">
													   					 <input type="radio" name="" id="option1" autocomplete="off"  value="10">9</label>
													   					  <label class="btn btn-success">
													   					 <input type="radio" name="" id="option1" autocomplete="off"  value="10">10</label>

													   					 </div>
														 </td><td>:</td><td>Bagus</td>
													
														 </tr>
													 
													</div>
												 </table>   


												 </div>


						    			

							


				 </div>
				 
<div class="panel panel-danger" id="example-basic">
    <div class="panel-heading"><span class="glyphicon glyphicon-chevron-right"></span> Sasaran Kompetensi &mdash; Cheklist item </div>
 	 <div class="panel-body">
 	 
 	 	<?php
 	 	$no=0;
 	 	 foreach ($kompetensi as $key ) {?>
 	 		<div class="form-group">
			<div class="checkbox-inline col-md-6">
			  <label>
			    <input type="checkbox" name="kompetensi[<?php echo $no++ ?>][nama_kompetensi]" value="<?php echo $key->NAMA_KOMPETENSI; ?>">

			  <!--    <input type="hidden" name="kompetensi[][id_kompetensi]" value="<?php echo $key->ID_KOMPETENSI; ?>"> -->
			   <!--  Option one is this and that&mdash;be sure to include why it's great -->
			   <?php echo $key->NAMA_KOMPETENSI; ?>
			  </label>
			</div>
		</div>


			<?php } ?>
			<br/>
			<p>-</p>
			<p>Lainnya  :</p>
			<div class="checkbox-inline col-md-6">
			<input type="checkbox"><input type="text" name="kompetensi[][nama_kompetensi]" value="" class="form-control" placeholder="Kompetensi Lainnya">
 			</div>
 	 </div>   
<?php

 foreach($point as $result ) {?>
						   					
								            <input type="hidden" name="kompetensi[0][id_tp]" value="<?php echo $result->id_tpddk?>" class="form-control" readonly>
								            
							
								       
								            
								             <?php }?>
</div>


				
								 <div class="form-group">
							   
						       
									<button class="action submit btn btn-success pull-right">Approve</button>
						 			
						            
						             <a href="<?php echo site_url('panel_user/rejected_atasan/'.$result->id_tpddk) ?>" class="btn btn-danger " onclick="return confirm('Are you sure you want to Reject this Request ?');"> Rejected </a>
						            
						             <a href="<?php echo site_url('panel_user') ?>" class="btn btn-default"> Cancel </a>
						      
						</div>
				</div>
		<?php echo form_close();

	}?>
				
<script>

  $('#radioBtn a').on('click', function(){
    var sel = $(this).data('title');
    var tog = $(this).data('toggle');
    $('#'+tog).prop('value', sel);
    
    $('a[data-toggle="'+tog+'"]').not('[data-title="'+sel+'"]').removeClass('active').addClass('notActive');
    $('a[data-toggle="'+tog+'"][data-title="'+sel+'"]').removeClass('notActive').addClass('active');
    });

   $('#11 a').on('click', function(){
    var sel = $(this).data('title');
    var tog = $(this).data('toggle');
    $('#'+tog).prop('value', sel);
    
    $('a[data-toggle="'+tog+'"]').not('[data-title="'+sel+'"]').removeClass('active').addClass('notActive');
    $('a[data-toggle="'+tog+'"][data-title="'+sel+'"]').removeClass('notActive').addClass('active');
    });

   $('#12 a').on('click', function(){
    var sel = $(this).data('title');
    var tog = $(this).data('toggle');
    $('#'+tog).prop('value', sel);
    
    $('a[data-toggle="'+tog+'"]').not('[data-title="'+sel+'"]').removeClass('active').addClass('notActive');
    $('a[data-toggle="'+tog+'"][data-title="'+sel+'"]').removeClass('notActive').addClass('active');
    });


</script>