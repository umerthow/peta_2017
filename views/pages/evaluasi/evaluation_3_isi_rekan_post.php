<style>
.btn span.glyphicon {    			
	opacity: 0;				
}
.btn.active span.glyphicon {				
	opacity: 1;				
}
</style>

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
    <div class="panel-heading"><span class="glyphicon glyphicon-chevron-right"></span> Evaluasi Level 3  <b>POST</b> [FRM-PSDM-04-01-06, Rev.0] </div>
	<?php echo form_open('Panel_user/insert_post_pddk')?>
    <div class="panel-body">	
    	
    							 <div class="form-group has-success">
						       
						       
						      
								      <?php  
								    
								       foreach($point as $result ) {?>
						   						

						       <input type="hidden"  class="form-control" name="id_pengisi" value="1" />
						        <table class="table">
						        	<tr>
						        		<th class="col-md-4">Judul Pendidikan Berjenjang </th><td>:</td><td><input type="hidden"  class="form-control" name="tx_course" value="<?php echo $result->id_tpddk ?>" /><?php echo $result->judul_course ?> - <?php echo $result->nama_provider ?> </td>

						        		<th class="hidden"><input type="hidden" name="status_atasan" value="1">
						        		</th>
						        	</tr>


						        	<tr>
						        	<th>Jadwal  </th><td>:</td><td> <?php echo tgl_indo($result->waktu_in)?> s/d <?php echo tgl_indo($result->waktu_out)?></td>
						        	</tr>

						        	<tr>
						        	 <p class="text-justify"> Mohon untuk ketersediananya mengisi assesment dibawah ini terhadap  karyawan sbb :</p>
						        	</tr>
						        </table>


						       
						    </div>
						     <?php } ?>
				
<div class="step well">
						        <div class="panel panel-danger">
						        <div class="panel-heading">Evaluasi Pelatihan an . <?php echo $result->Nama_pegawai  ?> , Silahkan nilai pada form dibawah :  </div>
						        <div class="panel-body">

						         <table class="table table-condensed" >
						     <?php $no=0; foreach ($tujuan as $key => $value) { ?>
						         	<thead class="danger text-left">
            							<th class="text-left col-md-5" style="vertical-align:middle;"><?php echo $value->tujuan_pelatihan ?></th>
            							<th class="hidden"><input type="text" name="item[]" value="<?php echo $value->id_tujuan  ?>" /></th>
            							<th class="hidden"><input type="hidden" name="tujuan[]" value="<?php echo $value->tujuan_pelatihan  ?>"
            							 /></th>
            							<th class="text-center" style="vertical-align:middle;">
            								<div class="input-group">
						    				<div id="radioBtn" class="btn-group text-right middle; " style=""  >
						    					
						    						<div class="btn-group " data-toggle="buttons">
			
														<label class="btn btn-default btn-xs active">
															<input type="radio" name= "nilai_pre4[<?php echo $no; ?>]" autocomplete="off" value="10" checked>10
															<span class="glyphicon glyphicon-ok"></span>
														</label>

														<label class="btn btn-default btn-xs">
															<input type="radio" name= "nilai_pre4[<?php echo $no; ?>]" autocomplete="off" value="20">20
															<span class="glyphicon glyphicon-ok"></span>
														</label>			
													
														<label class="btn btn-default btn-xs">
															<input type="radio"  name= "nilai_pre4[<?php echo $no; ?>]" autocomplete="off" value="30">30
															<span class="glyphicon glyphicon-ok"></span>
														</label>			
													
														<label class="btn btn-default btn-xs">
															<input type="radio" name= "nilai_pre4[<?php echo $no; ?>]" autocomplete="off" value="40">40
															<span class="glyphicon glyphicon-ok"></span>
														</label>			

														<label class="btn btn-default btn-xs">
															<input type="radio" name= "nilai_pre4[<?php echo $no; ?>]" autocomplete="off" value="50">50
															<span class="glyphicon glyphicon-ok"></span>
														</label>			
													
														<label class="btn btn-default btn-xs">
															<input type="radio"  name= "nilai_pre4[<?php echo $no; ?>]" autocomplete="off" value="60">60
															<span class="glyphicon glyphicon-ok"></span>
														</label>
														<label class="btn btn-default btn-xs">
															<input type="radio"  name= "nilai_pre4[<?php echo $no; ?>]" autocomplete="off" value="70">70
															<span class="glyphicon glyphicon-ok"></span>
														</label>
														<label class="btn btn-default btn-xs">
															<input type="radio"  name= "nilai_pre4[<?php echo $no; ?>]" autocomplete="off" value="80">80
															<span class="glyphicon glyphicon-ok"></span>
														</label>
														<label class="btn btn-default btn-xs">
															<input type="radio"  name= "nilai_pre4[<?php echo $no; ?>]" autocomplete="off" value="90">90
															<span class="glyphicon glyphicon-ok"></span>
														</label>
														<label class="btn btn-default btn-xs">
															<input type="radio"  name= "nilai_pre4[<?php echo $no; ?>]" autocomplete="off" value="100">100
															<span class="glyphicon glyphicon-ok"></span>
														</label>			
													
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
						    				
						    				<?php $no++; } ?>

						    				

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
													   					 <input type="radio" name="" id="option1" autocomplete="off"  value="10">10 </label>
													   					  <label class="btn btn-warning active" >
													    <input type="radio" name="" id="option2" autocomplete="off" value="20" checked="">  20
													  </label>
													   <label class="btn btn-warning">
													    <input type="radio" name="" id="option2" autocomplete="off" value="20">  30
													  </label>

													   					 </div>
														 </th><td>:</td><td>Kurang</td>
													
													
						    							<td><div class="btn-group" data-toggle="buttons">
													 				 <label class="btn btn-primary">
													   					 <input type="radio" name="" id="option1" autocomplete="off"  value="10">40 </label>
													   					 <label class="btn btn-primary active">
													   					 <input type="radio" name="" id="option1" autocomplete="off"  value="10">50 </label>
													   					 <label class="btn btn-primary">
													   					 <input type="radio" name="" id="option1" autocomplete="off"  value="10">60 </label>
													   					 <label class="btn btn-primary">
													   					 <input type="radio" name="" id="option1" autocomplete="off"  value="10">70 </label>
													   					 </div>
														 </td><td>:</td><td>Sedang</td>
												
													
						    							<td><div class="btn-group" data-toggle="buttons">
													 				 <label class="btn btn-success">
													   					 <input type="radio" name="" id="option1" autocomplete="off"  value="10">80</label>
													   					  <label class="btn btn-success active">
													   					 <input type="radio" name="" id="option1" autocomplete="off"  value="10">90</label>
													   					  <label class="btn btn-success">
													   					 <input type="radio" name="" id="option1" autocomplete="off"  value="10">100</label>

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
								            
							
								       
								            
								            
</div>

					 <?php if($result->status_rekan_post == 0 ) { ?>
				
								 <div class="form-group">
							   
						       
									<button class="action submit btn btn-success pull-right">Approve</button>
						 			
						            
						            <!--  <a href="<?php echo site_url('panel_user/rejected_atasan/'.$result->id_tpddk) ?>" class="btn btn-danger " onclick="return confirm('Are you sure you want to Reject this Request ?');"> Rejected </a> -->
						            
						             <a href="<?php echo site_url('panel_user') ?>" class="btn btn-default"> Cancel </a>
						      
						</div>
								<?php } ?>

						 <?php }?>
				</div>
		<?php echo form_close();

	}?>
