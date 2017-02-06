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
	<?php echo form_open('Panel_user/update_post3')?>
    <div class="panel-body">	
    	
    							 <div class="form-group has-success">
						     
						       
						      
								      <?php  
								    
								       foreach($point as $result ) {?>
						   						<?php   for($i=0; $i<=10; $i++) { ?>
								            <input type="hidden" name="options[][id_tp]" value="<?php echo $result->id_tp?>" class="form-control" readonly>

								       
								            <?php }?>
						       

						       				
						           		
						        <table class="table">
						        	<tr>
						        		<th class="col-md-2">Judul Pelatihan </th><td>:</td><td><input type="hidden"  class="form-control" name="course" value="<?php echo $result->id_course ?>" /><?php echo $result->judul_course ?> - <?php echo $result->nama_provider ?> </td>
						        	</tr>
						        	<tr>
						        	<th>Waktu Peelatihan </th><td>:</td><td> <?php echo tgl_indo($result->waktu_in)?> s/d <?php echo tgl_indo($result->waktu_out)?></td>
						        	</tr>
						        </table>
						            <?php } ?>

						            <?php 
						            $no=0;
						            foreach($post3 as $hasil){ ?>
						      					 <input type="hidden" name="options[<?php echo $no++?>][id_tl3pre]" value="<?php echo $hasil->id_tl3pre?>" class="form-control" readonly>
						       		
						       		<?php } ?>
						       		
						    </div>
						   
				
<div class="step well">
						        <div class="panel panel-danger">
						        <div class="panel-heading">E-Form Evaluasi Pelatihan an . <?php echo $result->Nama_pegawai  ?> , Silahkan nilai pada form dibawah : </div>
						        <div class="panel-body">
							    <div class="form-group">
							        <label class="col-md-5 control-label"><?php echo $result->skill  ?></label>
							        <input type="hidden" name="options[1][item]" value="<?php echo $result->skill  ?>" />
							        <div class="col-sm-9 col-md-6">
						    			<div class="input-group">
						    				<div id="radioBtn" class="btn-group text-right"  >
						    					
						    						<div class="btn-group" data-toggle="buttons">
													  <label class="btn btn-success ">
													    <input type="radio" name="options[1][nilai_post3]" id="option1" autocomplete="off"  value="10"> 1
													  </label>
													  <label class="btn btn-success">
													    <input type="radio" name="options[1][nilai_post3]" id="option2" autocomplete="off" value="20">  2
													  </label>
													  <label class="btn btn-success">
													    <input type="radio" name="options[1][nilai_post3]" id="option3" autocomplete="off" value="30">  3
													  </label>
													   <label class="btn btn-success ">
													    <input type="radio" name="options[1][nilai_post3]" id="option4" autocomplete="off" value="40"> 4
													  </label>
													  <label class="btn btn-success">
													    <input type="radio" name="options[1][nilai_post3]" id="option5" autocomplete="off" value="50">  5
													  </label>
													  <label class="btn btn-success">
													    <input type="radio" name="options[1][nilai_post3]" id="option6" autocomplete="off" value="60">  6
													     </label>
													      <label class="btn btn-success">
													    <input type="radio" name="options[1][nilai_post3]" id="option7" autocomplete="off" value="70">  7
													  </label>
													  <label class="btn btn-success">
													    <input type="radio" name="options[1][nilai_post3]" id="option8" autocomplete="off" value="80">  8
													  </label>
													   <label class="btn btn-success ">
													    <input type="radio" name="options[1][nilai_post3]" id="option9" autocomplete="off" value="90"> 9
													  </label>
													  <label class="btn btn-success">
													    <input type="radio" name="options[1][nilai_post3]" id="option10" autocomplete="off" value="100">  10
													  </label>
													</div>
												    						    					
						    				</div>
						    					<input type="hidden" name="pre1"  id="radioBtn" >
						    				</div>
						    				</div>
						    				</div>
						    				<br/>
						    				<br/>
						    				<br/>
						    				<br/>
						    				<br/>

						    	<div class="form-group">
								    <label class="col-md-5 control-label"><?php echo $result->knowledge  ?></label>
								     <input type="hidden" name="options[2][item]" value="<?php echo $result->knowledge  ?>" />
									 <div class="col-sm-9 col-md-6">
						    				<div class="input-group">
						    				<div id="radioBtn" class="btn-group text-right"  >
						    					
						    						<div class="btn-group" data-toggle="buttons">
													  <label class="btn btn-success ">
													    <input type="radio" name="options[2][nilai_post3]" id="option1" autocomplete="off"  value="10"> 1
													  </label>
													  <label class="btn btn-success">
													    <input type="radio" name="options[2][nilai_post3]" id="option2" autocomplete="off" value="20">  2
													  </label>
													  <label class="btn btn-success">
													    <input type="radio" name="options[2][nilai_post3]" id="option3" autocomplete="off" value="30">  3
													  </label>
													   <label class="btn btn-success ">
													    <input type="radio" name="options[2][nilai_post3]" id="option4" autocomplete="off" value="40"> 4
													  </label>
													  <label class="btn btn-success">
													    <input type="radio" name="options[2][nilai_post3]" id="option5" autocomplete="off" value="50">  5
													  </label>
													  <label class="btn btn-success">
													    <input type="radio" name="options[2][nilai_post3]" id="option6" autocomplete="off" value="60">  6
													     </label>
													      <label class="btn btn-success">
													    <input type="radio" name="options[2][nilai_post3]" id="option7" autocomplete="off" value="70">  7
													  </label>
													  <label class="btn btn-success">
													    <input type="radio" name="options[2][nilai_post3]" id="option8" autocomplete="off" value="80">  8
													  </label>
													   <label class="btn btn-success ">
													    <input type="radio" name="options[2][nilai_post3]" id="option9" autocomplete="off" value="90"> 9
													  </label>
													  <label class="btn btn-success">
													    <input type="radio" name="options[2][nilai_post3]" id="option10" autocomplete="off" value="100">  10
													  </label>
													</div>
												    						    					
						    				</div>
						    				<input type="hidden" name="pre2" >
						    			</div>
						    		</div>
							    </div>
							 <br/>
						    				<br/>
						    				<br/>
						    				<br/>
						    				<br/>
							   <div class="form-group">
								    <label class="col-md-5 control-label"><?php echo $result->attitude  ?></label>
								         <input type="hidden" name="options[3][item]" value="<?php echo $result->attitude  ?>" />
									 <div class="col-sm-9 col-md-6">
						    				<div class="input-group">
						    				<div id="radioBtn" class="btn-group text-right"  >
						    					
						    						<div class="btn-group" data-toggle="buttons">
													  <label class="btn btn-success ">
													    <input type="radio" name="options[3][nilai_post3]" id="option1" autocomplete="off"  value="10"> 1
													  </label>
													  <label class="btn btn-success">
													    <input type="radio" name="options[3][nilai_post3]" id="option2" autocomplete="off" value="20">  2
													  </label>
													  <label class="btn btn-success">
													    <input type="radio" name="options[3][nilai_post3]" id="option3" autocomplete="off" value="30">  3
													  </label>
													   <label class="btn btn-success ">
													    <input type="radio" name="options[3][nilai_post3]" id="option4" autocomplete="off" value="40"> 4
													  </label>
													  <label class="btn btn-success">
													    <input type="radio" name="options[3][nilai_post3]" id="option5" autocomplete="off" value="50">  5
													  </label>
													  <label class="btn btn-success">
													    <input type="radio" name="options[3][nilai_post3]" id="option6" autocomplete="off" value="60">  6
													     </label>
													      <label class="btn btn-success">
													    <input type="radio" name="options[3][nilai_post3]" id="option7" autocomplete="off" value="70">  7
													  </label>
													  <label class="btn btn-success">
													    <input type="radio" name="options[3][nilai_post3]" id="option8" autocomplete="off" value="80">  8
													  </label>
													   <label class="btn btn-success ">
													    <input type="radio" name="options[3][nilai_post3]" id="option9" autocomplete="off" value="90"> 9
													  </label>
													  <label class="btn btn-success">
													    <input type="radio" name="options[3][nilai_post3]" id="option10" autocomplete="off" value="100">  10
													  </label>
													</div>
												    						    					
						    				</div>
						    				<input type="hidden" name="pre3" >

						    			</div>
						    		</div>
								</div>
							   <br/>
						    				<br/>
						    				<br/>
						    				<br/>
						    				<br/>
							   <div class="form-group">
								    <label class="col-md-5 control-label"><?php echo $result->attitude1 ?></label>
								     <input type="hidden" name="options[4][item]" value="<?php echo $result->attitude1  ?>" />
									 <div class="col-sm-9 col-md-6">
						    				<div class="input-group">
						    				<div id="radioBtn" class="btn-group text-right"  >
						    					
						    						<div class="btn-group" data-toggle="buttons">
													  <label class="btn btn-success ">
													    <input type="radio" name="options[4][nilai_post3]" id="option1" autocomplete="off"  value="10"> 1
													  </label>
													  <label class="btn btn-success">
													    <input type="radio" name="options[4][nilai_post3]" id="option2" autocomplete="off" value="20">  2
													  </label>
													  <label class="btn btn-success">
													    <input type="radio" name="options[4][nilai_post3]" id="option3" autocomplete="off" value="30">  3
													  </label>
													   <label class="btn btn-success ">
													    <input type="radio" name="options[4][nilai_post3]" id="option4" autocomplete="off" value="40"> 4
													  </label>
													  <label class="btn btn-success">
													    <input type="radio" name="options[4][nilai_post3]" id="option5" autocomplete="off" value="50">  5
													  </label>
													  <label class="btn btn-success">
													    <input type="radio" name="options[4][nilai_post3]" id="option6" autocomplete="off" value="60">  6
													     </label>
													      <label class="btn btn-success">
													    <input type="radio" name="options[4][nilai_post3]" id="option7" autocomplete="off" value="70">  7
													  </label>
													  <label class="btn btn-success">
													    <input type="radio" name="options[4][nilai_post3]" id="option8" autocomplete="off" value="80">  8
													  </label>
													   <label class="btn btn-success ">
													    <input type="radio" name="options[4][nilai_post3]" id="option9" autocomplete="off" value="90"> 9
													  </label>
													  <label class="btn btn-success">
													    <input type="radio" name="options[4][nilai_post3]" id="option10" autocomplete="off" value="100">  10
													  </label>
													</div>
												    						    					
						    				</div>
						    				<input type="hidden" name="pre4" >
						    				</div>
						    		</div>
							</div>
						    	 <br/>
						    				<br/>
						    				<br/>
						    				<br/>
						    				<br/>
							   <div class="form-group">
								    <label class="col-md-5 control-label"><?php echo $result->attitude2 ?></label>
									  <input type="hidden" name="options[5][item]" value="<?php echo $result->attitude2  ?>" />
									 <div class="col-sm-9 col-md-6">
						    				<div class="input-group">
						    				<div id="radioBtn" class="btn-group text-right"  >
						    					
						    						<div class="btn-group" data-toggle="buttons">
													  <label class="btn btn-success ">
													    <input type="radio" name="options[5][nilai_post3]" id="option1" autocomplete="off"  value="10"> 1
													  </label>
													  <label class="btn btn-success">
													    <input type="radio" name="options[5][nilai_post3]" id="option2" autocomplete="off" value="20">  2
													  </label>
													  <label class="btn btn-success">
													    <input type="radio" name="options[5][nilai_post3]" id="option3" autocomplete="off" value="30">  3
													  </label>
													   <label class="btn btn-success ">
													    <input type="radio" name="options[5][nilai_post3]" id="option4" autocomplete="off" value="40"> 4
													  </label>
													  <label class="btn btn-success">
													    <input type="radio" name="options[5][nilai_post3]" id="option5" autocomplete="off" value="50">  5
													  </label>
													  <label class="btn btn-success">
													    <input type="radio" name="options[5][nilai_post3]" id="option6" autocomplete="off" value="60">  6
													     </label>
													      <label class="btn btn-success">
													    <input type="radio" name="options[5][nilai_post3]" id="option7" autocomplete="off" value="70">  7
													  </label>
													  <label class="btn btn-success">
													    <input type="radio" name="options[5][nilai_post3]" id="option8" autocomplete="off" value="80">  8
													  </label>
													   <label class="btn btn-success ">
													    <input type="radio" name="options[5][nilai_post3]" id="option9" autocomplete="off" value="90"> 9
													  </label>
													  <label class="btn btn-success">
													    <input type="radio" name="options[5][nilai_post3]" id="option10" autocomplete="off" value="100">  10
													  </label>
													</div>
												    						    					
						    				</div>
						    				<input type="hidden" name="pre5" >

						    			</div>
						    		</div>
							</div>

							     <br/>
						    				<br/>
						    				<br/>
						    				<br/>
						    				<br/>
							   <div class="form-group">
								    <label class="col-md-5 control-label"><?php echo $result->attitude3 ?></label>
									  <input type="hidden" name="options[6][item]" value="<?php echo $result->attitude3  ?>" />
									 <div class="col-sm-9 col-md-6">
						    				<div class="input-group">
						    				<div id="radioBtn" class="btn-group text-right"  >
						    					
						    						<div class="btn-group" data-toggle="buttons">
													  <label class="btn btn-success ">
													    <input type="radio" name="options[6][nilai_post3]" id="option1" autocomplete="off"  value="10"> 1
													  </label>
													  <label class="btn btn-success">
													    <input type="radio" name="options[6][nilai_post3]" id="option2" autocomplete="off" value="20">  2
													  </label>
													  <label class="btn btn-success">
													    <input type="radio" name="options[6][nilai_post3]" id="option3" autocomplete="off" value="30">  3
													  </label>
													   <label class="btn btn-success ">
													    <input type="radio" name="options[6][nilai_post3]" id="option4" autocomplete="off" value="40"> 4
													  </label>
													  <label class="btn btn-success">
													    <input type="radio" name="options[6][nilai_post3]" id="option5" autocomplete="off" value="50">  5
													  </label>
													  <label class="btn btn-success">
													    <input type="radio" name="options[6][nilai_post3]" id="option6" autocomplete="off" value="60">  6
													     </label>
													      <label class="btn btn-success">
													    <input type="radio" name="options[6][nilai_post3]" id="option7" autocomplete="off" value="70">  7
													  </label>
													  <label class="btn btn-success">
													    <input type="radio" name="options[6][nilai_post3]" id="option8" autocomplete="off" value="80">  8
													  </label>
													   <label class="btn btn-success ">
													    <input type="radio" name="options[6][nilai_post3]" id="option9" autocomplete="off" value="90"> 9
													  </label>
													  <label class="btn btn-success">
													    <input type="radio" name="options[6][nilai_post3]" id="option10" autocomplete="off" value="100">  10
													  </label>
													</div>
												    						    					
						    				</div>
						    				<input type="hidden" name="pre6" >

						    			</div>
						    		</div>
					
									</div>

							  <br/>
						    				<br/>
						    				<br/>
						    				<br/>
						    				<br/>
							   <div class="form-group">
								    <label class="col-md-5 control-label"><?php echo $result->attitude4 ?></label>
									  <input type="hidden" name="options[7][item]" value="<?php echo $result->attitude4  ?>" />
									 <div class="col-sm-9 col-md-6">
						    				<div class="input-group">
						    				<div id="radioBtn" class="btn-group text-right"  >
						    					
						    						<div class="btn-group" data-toggle="buttons">
													  <label class="btn btn-success ">
													    <input type="radio" name="options[7][nilai_post3]" id="option1" autocomplete="off"  value="10"> 1
													  </label>
													  <label class="btn btn-success">
													    <input type="radio" name="options[7][nilai_post3]" id="option2" autocomplete="off" value="20">  2
													  </label>
													  <label class="btn btn-success">
													    <input type="radio" name="options[7][nilai_post3]" id="option3" autocomplete="off" value="30">  3
													  </label>
													   <label class="btn btn-success ">
													    <input type="radio" name="options[7][nilai_post3]" id="option4" autocomplete="off" value="40"> 4
													  </label>
													  <label class="btn btn-success">
													    <input type="radio" name="options[7][nilai_post3]" id="option5" autocomplete="off" value="50">  5
													  </label>
													  <label class="btn btn-success">
													    <input type="radio" name="options[7][nilai_post3]" id="option6" autocomplete="off" value="60">  6
													     </label>
													      <label class="btn btn-success">
													    <input type="radio" name="options[7][nilai_post3]" id="option7" autocomplete="off" value="70">  7
													  </label>
													  <label class="btn btn-success">
													    <input type="radio" name="options[7][nilai_post3]" id="option8" autocomplete="off" value="80">  8
													  </label>
													   <label class="btn btn-success ">
													    <input type="radio" name="options[7][nilai_post3]" id="option9" autocomplete="off" value="90"> 9
													  </label>
													  <label class="btn btn-success">
													    <input type="radio" name="options[7][nilai_post3]" id="option10" autocomplete="off" value="100">  10
													  </label>
													</div>
												    						    					
						    				</div>
						    				<input type="hidden" name="pre7" >

						    			</div>
						    		</div>
						    		</div>
							


							   <br/>
						    				<br/>
						    				<br/>
						    				<br/>
						    				<br/>
							   <div class="form-group">
								    <label class="col-md-5 control-label"><?php echo $result->attitude5 ?></label>
									  <input type="hidden" name="options[8][item]" value="<?php echo $result->attitude5  ?>" />
									 <div class="col-sm-9 col-md-6">
						    				<div class="input-group">
						    				<div id="radioBtn" class="btn-group text-right"  >
						    					
						    						<div class="btn-group" data-toggle="buttons">
													  <label class="btn btn-success ">
													    <input type="radio" name="options[8][nilai_post3]" id="option1" autocomplete="off"  value="10"> 1
													  </label>
													  <label class="btn btn-success">
													    <input type="radio" name="options[8][nilai_post3]" id="option2" autocomplete="off" value="20">  2
													  </label>
													  <label class="btn btn-success">
													    <input type="radio" name="options[8][nilai_post3]" id="option3" autocomplete="off" value="30">  3
													  </label>
													   <label class="btn btn-success ">
													    <input type="radio" name="options[8][nilai_post3]" id="option4" autocomplete="off" value="40"> 4
													  </label>
													  <label class="btn btn-success">
													    <input type="radio" name="options[8][nilai_post3]" id="option5" autocomplete="off" value="50">  5
													  </label>
													  <label class="btn btn-success">
													    <input type="radio" name="options[8][nilai_post3]" id="option6" autocomplete="off" value="60">  6
													     </label>
													      <label class="btn btn-success">
													    <input type="radio" name="options[8][nilai_post3]" id="option7" autocomplete="off" value="70">  7
													  </label>
													  <label class="btn btn-success">
													    <input type="radio" name="options[8][nilai_post3]" id="option8" autocomplete="off" value="80">  8
													  </label>
													   <label class="btn btn-success ">
													    <input type="radio" name="options[8][nilai_post3]" id="option9" autocomplete="off" value="90"> 9
													  </label>
													  <label class="btn btn-success">
													    <input type="radio" name="options[8][nilai_post3]" id="option10" autocomplete="off" value="100">  10
													  </label>
													</div>
												    						    					
						    				</div>
						    				<input type="hidden" name="pre7" >

						    			</div>
						    		</div>
						    		</div>
							 
<br/>
						    				<br/>
						    				<br/>
						    				<br/>
						    				<br/>
							   <div class="form-group">
								    <label class="col-md-5 control-label"><?php echo $result->attitude6 ?></label>
									  <input type="hidden" name="options[9][item]" value="<?php echo $result->attitude6  ?>" />
									 <div class="col-sm-9 col-md-6">
						    				<div class="input-group">
						    				<div id="radioBtn" class="btn-group text-right"  >
						    					
						    						<div class="btn-group" data-toggle="buttons">
													  <label class="btn btn-success ">
													    <input type="radio" name="options[9][nilai_post3]" id="option1" autocomplete="off"  value="10"> 1
													  </label>
													  <label class="btn btn-success">
													    <input type="radio" name="options[9][nilai_post3]" id="option2" autocomplete="off" value="20">  2
													  </label>
													  <label class="btn btn-success">
													    <input type="radio" name="options[9][nilai_post3]" id="option3" autocomplete="off" value="30">  3
													  </label>
													   <label class="btn btn-success ">
													    <input type="radio" name="options[9][nilai_post3]" id="option4" autocomplete="off" value="40"> 4
													  </label>
													  <label class="btn btn-success">
													    <input type="radio" name="options[9][nilai_post3]" id="option5" autocomplete="off" value="50">  5
													  </label>
													  <label class="btn btn-success">
													    <input type="radio" name="options[9][nilai_post3]" id="option6" autocomplete="off" value="60">  6
													     </label>
													      <label class="btn btn-success">
													    <input type="radio" name="options[9][nilai_post3]" id="option7" autocomplete="off" value="70">  7
													  </label>
													  <label class="btn btn-success">
													    <input type="radio" name="options[9][nilai_post3]" id="option8" autocomplete="off" value="80">  8
													  </label>
													   <label class="btn btn-success ">
													    <input type="radio" name="options[9][nilai_post3]" id="option9" autocomplete="off" value="90"> 9
													  </label>
													  <label class="btn btn-success">
													    <input type="radio" name="options[9][nilai_post3]" id="option10" autocomplete="off" value="100">  10
													  </label>
													</div>
												    						    					
						    				</div>
						    				<input type="hidden" name="pre6" >

						    			</div>
						    		</div>
						    		</div>
							 




							   <br/>
						    				<br/>
						    				<br/>
						    				<br/>
						    				<br/>
							   <div class="form-group">
								    <label class="col-md-5 control-label"><?php echo $result->attitude7 ?></label>
									  <input type="hidden" name="options[10][item]" value="<?php echo $result->attitude7  ?>" />
									 <div class="col-sm-9 col-md-6">
						    				<div class="input-group">
						    				<div id="radioBtn" class="btn-group text-right"  >
						    					
						    						<div class="btn-group" data-toggle="buttons">
													  <label class="btn btn-success ">
													    <input type="radio" name="options[10][nilai_post3]" id="option1" autocomplete="off"  value="10"> 1
													  </label>
													  <label class="btn btn-success">
													    <input type="radio" name="options[10][nilai_post3]" id="option2" autocomplete="off" value="20">  2
													  </label>
													  <label class="btn btn-success">
													    <input type="radio" name="options[10][nilai_post3]" id="option3" autocomplete="off" value="30">  3
													  </label>
													   <label class="btn btn-success ">
													    <input type="radio" name="options[10][nilai_post3]" id="option4" autocomplete="off" value="40"> 4
													  </label>
													  <label class="btn btn-success">
													    <input type="radio" name="options[10][nilai_post3]" id="option5" autocomplete="off" value="50">  5
													  </label>
													  <label class="btn btn-success">
													    <input type="radio" name="options[10][nilai_post3]" id="option6" autocomplete="off" value="60">  6
													     </label>
													      <label class="btn btn-success">
													    <input type="radio" name="options[10][nilai_post3]" id="option7" autocomplete="off" value="70">  7
													  </label>
													  <label class="btn btn-success">
													    <input type="radio" name="options[10][nilai_post3]" id="option8" autocomplete="off" value="80">  8
													  </label>
													   <label class="btn btn-success ">
													    <input type="radio" name="options[10][nilai_post3]" id="option9" autocomplete="off" value="90"> 9
													  </label>
													  <label class="btn btn-success">
													    <input type="radio" name="options[10][nilai_post3]" id="option10" autocomplete="off" value="100">  10
													  </label>
													</div>
												    						    					
						    				</div>

						    				
						    				<input type="hidden" name="pre6" >

						    			</div>
						    		</div>
						    		</div>
							  
<br/><br/><br/>

						    		<br/>


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



				 <div class="panel panel-danger">
				 	   <div class="panel-heading">Hasil Persentase Setelah Pelatihan </div>
				  <div class="panel-body">
				   <div class="form-group">
								    <label class="col-md-5 control-label">Tingkat relevansi materi pelatihan terhadap pekerjaan yang bersangkutan : </label>
									 
									 <div class=" col-md-6">
						    				
						    					
						    					 <select multiple class="form-control" id="sel2"name="point4">
						    					 <?php  for($i=0;$i<=100;$i+=10){?>
        <option value="<?php  echo $i ?>"><?php  echo $i ?>&nbsp;%</option>
        <?php } ?>
       
      </select>
						    						    					
						    				</div>
						    				<input type="hidden" name="pre6" >

						    			
						    		</div>
				  </div>
				  <div class="panel-footer text-center"> * * *</div>
				</div>



							




































								 <div class="form-group">
							   
						       
									<button class="action submit btn btn-success">Submit</button>
						 			
						            
						           <!--   <a href="<?php echo site_url('panel_user/rejected_atasan/'.$result->id_tp) ?>" class="btn btn-danger"> Rejected </a> -->
						            
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

<script type="text/javascript">
      //<![CDATA[
        $(document).ready(function(){
          $('.combobox').combobox()
        });
      //]]>
    </script>