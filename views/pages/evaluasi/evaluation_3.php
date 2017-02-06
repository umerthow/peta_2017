 <h3><i class="glyphicon glyphicon-dashboard"></i> Dashboard Training</h3> 
<div class="row">
	
<div class="col-md-12">
	
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
						       
						    </div>
						     <?php } ?>
				
<div class="step well">
						        <div class="panel panel-danger">
						        <div class="panel-heading">Evaluasi Pelatihan an . <?php echo $result->Nama_pegawai  ?> , Silahkan nilai pada form dibawah :  </div>
						        <div class="panel-body">
							    <div class="form-group">
							  
							        <label class="col-md-5 control-label"><?php echo $result->skill  ?></label>
							        <input type="hidden" name="options[1][item]" value="<?php echo $result->skill  ?>" />
							        <div class="col-sm-9 col-md-6">
						    			<div class="input-group">
						    				<div id="radioBtn" class="btn-group text-right"  >
						    					
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
													  <label class="btn btn-warning ">
													    <input type="radio" name="options[2][nilai_pre3]" id="option1" autocomplete="off"  value="10" > 1
													  </label>
													  <label class="btn btn-warning">
													    <input type="radio" name="options[2][nilai_pre3]" id="option2" autocomplete="off" value="20">  2
													  </label>
													  <label class="btn btn-warning">
													    <input type="radio" name="options[2][nilai_pre3]" id="option3" autocomplete="off" value="30">  3
													  </label>
													   <label class="btn btn-primary ">
													    <input type="radio" name="options[2][nilai_pre3]" id="option4" autocomplete="off" value="40"> 4
													  </label>
													  <label class="btn btn-primary">
													    <input type="radio" name="options[2][nilai_pre3]" id="option5" autocomplete="off" value="50">  5
													  </label>
													  <label class="btn btn-primary">
													    <input type="radio" name="options[2][nilai_pre3]" id="option6" autocomplete="off" value="60">  6
													     </label>
													      <label class="btn btn-primary">
													    <input type="radio" name="options[2][nilai_pre3]" id="option7" autocomplete="off" value="70">  7
													  </label>
													  <label class="btn btn-success">
													    <input type="radio" name="options[2][nilai_pre3]" id="option8" autocomplete="off" value="80">  8
													  </label>
													   <label class="btn btn-success ">
													    <input type="radio" name="options[2][nilai_pre3]" id="option9" autocomplete="off" value="90"> 9
													  </label>
													  <label class="btn btn-success">
													    <input type="radio" name="options[2][nilai_pre3]" id="option10" autocomplete="off" value="100">  10
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
													  <label class="btn btn-warning ">
													    <input type="radio" name="options[3][nilai_pre3]" id="option1" autocomplete="off"  value="10" > 1
													  </label>
													  <label class="btn btn-warning">
													    <input type="radio" name="options[3][nilai_pre3]" id="option2" autocomplete="off" value="20">  2
													  </label>
													  <label class="btn btn-warning">
													    <input type="radio" name="options[3][nilai_pre3]" id="option3" autocomplete="off" value="30">  3
													  </label>
													   <label class="btn btn-primary ">
													    <input type="radio" name="options[3][nilai_pre3]" id="option4" autocomplete="off" value="40"> 4
													  </label>
													  <label class="btn btn-primary">
													    <input type="radio" name="options[3][nilai_pre3]" id="option5" autocomplete="off" value="50">  5
													  </label>
													  <label class="btn btn-primary">
													    <input type="radio" name="options[3][nilai_pre3]" id="option6" autocomplete="off" value="60">  6
													     </label>
													      <label class="btn btn-primary">
													    <input type="radio" name="options[3][nilai_pre3]" id="option7" autocomplete="off" value="70">  7
													  </label>
													  <label class="btn btn-success">
													    <input type="radio" name="options[3][nilai_pre3]" id="option8" autocomplete="off" value="80">  8
													  </label>
													   <label class="btn btn-success ">
													    <input type="radio" name="options[3][nilai_pre3]" id="option9" autocomplete="off" value="90"> 9
													  </label>
													  <label class="btn btn-success">
													    <input type="radio" name="options[3][nilai_pre3]" id="option10" autocomplete="off" value="100">  10
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
							   <div class="form-group">
								    <label class="col-md-5 control-label"><?php echo $result->attitude1 ?></label>
								     <input type="hidden" name="options[4][item]" value="<?php echo $result->attitude1  ?>" />
									 <div class="col-sm-9 col-md-6">
						    				<div class="input-group">
						    				<div id="radioBtn" class="btn-group text-right"  >
						    					
						    						<div class="btn-group" data-toggle="buttons">
													  <label class="btn btn-warning ">
													    <input type="radio" name="options[4][nilai_pre3]" id="option1" autocomplete="off"  value="10" > 1
													  </label>
													  <label class="btn btn-warning">
													    <input type="radio" name="options[4][nilai_pre3]" id="option2" autocomplete="off" value="20">  2
													  </label>
													  <label class="btn btn-warning">
													    <input type="radio" name="options[4][nilai_pre3]" id="option3" autocomplete="off" value="30">  3
													  </label>
													   <label class="btn btn-primary ">
													    <input type="radio" name="options[4][nilai_pre3]" id="option4" autocomplete="off" value="40"> 4
													  </label>
													  <label class="btn btn-primary">
													    <input type="radio" name="options[4][nilai_pre3]" id="option5" autocomplete="off" value="50">  5
													  </label>
													  <label class="btn btn-primary">
													    <input type="radio" name="options[4][nilai_pre3]" id="option6" autocomplete="off" value="60">  6
													     </label>
													      <label class="btn btn-primary">
													    <input type="radio" name="options[4][nilai_pre3]" id="option7" autocomplete="off" value="70">  7
													  </label>
													  <label class="btn btn-success">
													    <input type="radio" name="options[4][nilai_pre3]" id="option8" autocomplete="off" value="80">  8
													  </label>
													   <label class="btn btn-success ">
													    <input type="radio" name="options[4][nilai_pre3]" id="option9" autocomplete="off" value="90"> 9
													  </label>
													  <label class="btn btn-success">
													    <input type="radio" name="options[4][nilai_pre3]" id="option10" autocomplete="off" value="100">  10
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
							   <div class="form-group">
								    <label class="col-md-5 control-label"><?php echo $result->attitude2 ?></label>
									  <input type="hidden" name="options[5][item]" value="<?php echo $result->attitude2  ?>" />
									 <div class="col-sm-9 col-md-6">
						    				<div class="input-group">
						    				<div id="radioBtn" class="btn-group text-right"  >
						    					
						    						<div class="btn-group" data-toggle="buttons">
													  <label class="btn btn-warning ">
													    <input type="radio" name="options[5][nilai_pre3]" id="option1" autocomplete="off"  value="10" > 1
													  </label>
													  <label class="btn btn-warning">
													    <input type="radio" name="options[5][nilai_pre3]" id="option2" autocomplete="off" value="20">  2
													  </label>
													  <label class="btn btn-warning">
													    <input type="radio" name="options[5][nilai_pre3]" id="option3" autocomplete="off" value="30">  3
													  </label>
													   <label class="btn btn-primary ">
													    <input type="radio" name="options[5][nilai_pre3]" id="option4" autocomplete="off" value="40"> 4
													  </label>
													  <label class="btn btn-primary">
													    <input type="radio" name="options[5][nilai_pre3]" id="option5" autocomplete="off" value="50">  5
													  </label>
													  <label class="btn btn-primary">
													    <input type="radio" name="options[5][nilai_pre3]" id="option6" autocomplete="off" value="60">  6
													     </label>
													      <label class="btn btn-primary">
													    <input type="radio" name="options[5][nilai_pre3]" id="option7" autocomplete="off" value="70">  7
													  </label>
													  <label class="btn btn-success">
													    <input type="radio" name="options[5][nilai_pre3]" id="option8" autocomplete="off" value="80">  8
													  </label>
													   <label class="btn btn-success ">
													    <input type="radio" name="options[5][nilai_pre3]" id="option9" autocomplete="off" value="90"> 9
													  </label>
													  <label class="btn btn-success">
													    <input type="radio" name="options[5][nilai_pre3]" id="option10" autocomplete="off" value="100">  10
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
							   <div class="form-group">
								    <label class="col-md-5 control-label"><?php echo $result->attitude3 ?></label>
									  <input type="hidden" name="options[6][item]" value="<?php echo $result->attitude3  ?>" />
									 <div class="col-sm-9 col-md-6">
						    				<div class="input-group">
						    				<div id="radioBtn" class="btn-group text-right"  >
						    					
						    						<div class="btn-group" data-toggle="buttons">
													  <label class="btn btn-warning ">
													    <input type="radio" name="options[6][nilai_pre3]" id="option1" autocomplete="off"  value="10" > 1
													  </label>
													  <label class="btn btn-warning">
													    <input type="radio" name="options[6][nilai_pre3]" id="option2" autocomplete="off" value="20">  2
													  </label>
													  <label class="btn btn-warning">
													    <input type="radio" name="options[6][nilai_pre3]" id="option3" autocomplete="off" value="30">  3
													  </label>
													   <label class="btn btn-primary ">
													    <input type="radio" name="options[6][nilai_pre3]" id="option4" autocomplete="off" value="40"> 4
													  </label>
													  <label class="btn btn-primary">
													    <input type="radio" name="options[6][nilai_pre3]" id="option5" autocomplete="off" value="50">  5
													  </label>
													  <label class="btn btn-primary">
													    <input type="radio" name="options[6][nilai_pre3]" id="option6" autocomplete="off" value="60">  6
													     </label>
													      <label class="btn btn-primary">
													    <input type="radio" name="options[6][nilai_pre3]" id="option7" autocomplete="off" value="70">  7
													  </label>
													  <label class="btn btn-success">
													    <input type="radio" name="options[6][nilai_pre3]" id="option8" autocomplete="off" value="80">  8
													  </label>
													   <label class="btn btn-success ">
													    <input type="radio" name="options[6][nilai_pre3]" id="option9" autocomplete="off" value="90"> 9
													  </label>
													  <label class="btn btn-success">
													    <input type="radio" name="options[6][nilai_pre3]" id="option10" autocomplete="off" value="100">  10
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
							   <div class="form-group">
								    <label class="col-md-5 control-label"><?php echo $result->attitude4 ?></label>
									  <input type="hidden" name="options[7][item]" value="<?php echo $result->attitude4  ?>" />
									 <div class="col-sm-9 col-md-6">
						    				<div class="input-group">
						    				<div id="radioBtn" class="btn-group text-right"  >
						    					
						    						<div class="btn-group" data-toggle="buttons">
													  <label class="btn btn-warning  ">
													    <input type="radio" name="options[7][nilai_pre3]" id="option1" autocomplete="off"  value="10" > 1
													  </label>
													  <label class="btn btn-warning">
													    <input type="radio" name="options[7][nilai_pre3]" id="option2" autocomplete="off" value="20">  2
													  </label>
													  <label class="btn btn-warning">
													    <input type="radio" name="options[7][nilai_pre3]" id="option3" autocomplete="off" value="30">  3
													  </label>
													   <label class="btn btn-primary ">
													    <input type="radio" name="options[7][nilai_pre3]" id="option4" autocomplete="off" value="40"> 4
													  </label>
													  <label class="btn btn-primary">
													    <input type="radio" name="options[7][nilai_pre3]" id="option5" autocomplete="off" value="50">  5
													  </label>
													  <label class="btn btn-primary">
													    <input type="radio" name="options[7][nilai_pre3]" id="option6" autocomplete="off" value="60">  6
													     </label>
													      <label class="btn btn-primary">
													    <input type="radio" name="options[7][nilai_pre3]" id="option7" autocomplete="off" value="70">  7
													  </label>
													  <label class="btn btn-success">
													    <input type="radio" name="options[7][nilai_pre3]" id="option8" autocomplete="off" value="80">  8
													  </label>
													   <label class="btn btn-success ">
													    <input type="radio" name="options[7][nilai_pre3]" id="option9" autocomplete="off" value="90"> 9
													  </label>
													  <label class="btn btn-success">
													    <input type="radio" name="options[7][nilai_pre3]" id="option10" autocomplete="off" value="100">  10
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
							   <div class="form-group">
								    <label class="col-md-5 control-label"><?php echo $result->attitude5 ?></label>
									  <input type="hidden" name="options[8][item]" value="<?php echo $result->attitude5  ?>" />
									 <div class="col-sm-9 col-md-6">
						    				<div class="input-group">
						    				<div id="radioBtn" class="btn-group text-right"  >
						    					
						    						<div class="btn-group" data-toggle="buttons">
													  <label class="btn btn-warning ">
													    <input type="radio" name="options[8][nilai_pre3]" id="option1" autocomplete="off"  value="10" > 1
													  </label>
													  <label class="btn btn-warning">
													    <input type="radio" name="options[8][nilai_pre3]" id="option2" autocomplete="off" value="20">  2
													  </label>
													  <label class="btn btn-warning">
													    <input type="radio" name="options[8][nilai_pre3]" id="option3" autocomplete="off" value="30">  3
													  </label>
													   <label class="btn btn-primary ">
													    <input type="radio" name="options[8][nilai_pre3]" id="option4" autocomplete="off" value="40"> 4
													  </label>
													  <label class="btn btn-primary">
													    <input type="radio" name="options[8][nilai_pre3]" id="option5" autocomplete="off" value="50">  5
													  </label>
													  <label class="btn btn-primary">
													    <input type="radio" name="options[8][nilai_pre3]" id="option6" autocomplete="off" value="60">  6
													     </label>
													      <label class="btn btn-primary">
													    <input type="radio" name="options[8][nilai_pre3]" id="option7" autocomplete="off" value="70">  7
													  </label>
													  <label class="btn btn-success">
													    <input type="radio" name="options[8][nilai_pre3]" id="option8" autocomplete="off" value="80">  8
													  </label>
													   <label class="btn btn-success ">
													    <input type="radio" name="options[8][nilai_pre3]" id="option9" autocomplete="off" value="90"> 9
													  </label>
													  <label class="btn btn-success">
													    <input type="radio" name="options[8][nilai_pre3]" id="option10" autocomplete="off" value="100">  10
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
							   <div class="form-group">
								    <label class="col-md-5 control-label"><?php echo $result->attitude6 ?></label>
									  <input type="hidden" name="options[9][item]" value="<?php echo $result->attitude6  ?>" />
									 <div class="col-sm-9 col-md-6">
						    				<div class="input-group">
						    				<div id="radioBtn" class="btn-group text-right"  >
						    					
						    						<div class="btn-group" data-toggle="buttons">
													  <label class="btn btn-warning ">
													    <input type="radio" name="options[9][nilai_pre3]" id="option1" autocomplete="off"  value="10" > 1
													  </label>
													  <label class="btn btn-warning">
													    <input type="radio" name="options[9][nilai_pre3]" id="option2" autocomplete="off" value="20">  2
													  </label>
													  <label class="btn btn-warning">
													    <input type="radio" name="options[9][nilai_pre3]" id="option3" autocomplete="off" value="30">  3
													  </label>
													   <label class="btn btn-primary ">
													    <input type="radio" name="options[9][nilai_pre3]" id="option4" autocomplete="off" value="40"> 4
													  </label>
													  <label class="btn btn-primary">
													    <input type="radio" name="options[9][nilai_pre3]" id="option5" autocomplete="off" value="50">  5
													  </label>
													  <label class="btn btn-primary">
													    <input type="radio" name="options[9][nilai_pre3]" id="option6" autocomplete="off" value="60">  6
													     </label>
													      <label class="btn btn-primary">
													    <input type="radio" name="options[9][nilai_pre3]" id="option7" autocomplete="off" value="70">  7
													  </label>
													  <label class="btn btn-success">
													    <input type="radio" name="options[9][nilai_pre3]" id="option8" autocomplete="off" value="80">  8
													  </label>
													   <label class="btn btn-success ">
													    <input type="radio" name="options[9][nilai_pre3]" id="option9" autocomplete="off" value="90"> 9
													  </label>
													  <label class="btn btn-success">
													    <input type="radio" name="options[9][nilai_pre3]" id="option10" autocomplete="off" value="100">  10
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
							   <div class="form-group">
								    <label class="col-md-5 control-label"><?php echo $result->attitude7 ?></label>
									  <input type="hidden" name="options[10][item]" value="<?php echo $result->attitude7  ?>" />
									 <div class="col-sm-9 col-md-6">
						    				<div class="input-group">
						    				<div id="radioBtn" class="btn-group text-right"  >
						    					
						    						<div class="btn-group" data-toggle="buttons">
													  <label class="btn btn-warning ">
													    <input type="radio" name="options[10][nilai_pre3]" id="option1" autocomplete="off"  value="10" > 1
													  </label>
													  <label class="btn btn-warning">
													    <input type="radio" name="options[10][nilai_pre3]" id="option2" autocomplete="off" value="20">  2
													  </label>
													  <label class="btn btn-warning">
													    <input type="radio" name="options[10][nilai_pre3]" id="option3" autocomplete="off" value="30">  3
													  </label>
													   <label class="btn btn-primary ">
													    <input type="radio" name="options[10][nilai_pre3]" id="option4" autocomplete="off" value="40"> 4
													  </label>
													  <label class="btn btn-primary">
													    <input type="radio" name="options[10][nilai_pre3]" id="option5" autocomplete="off" value="50">  5
													  </label>
													  <label class="btn btn-primary">
													    <input type="radio" name="options[10][nilai_pre3]" id="option6" autocomplete="off" value="60">  6
													     </label>
													      <label class="btn btn-primary">
													    <input type="radio" name="options[10][nilai_pre3]" id="option7" autocomplete="off" value="70">  7
													  </label>
													  <label class="btn btn-success">
													    <input type="radio" name="options[10][nilai_pre3]" id="option8" autocomplete="off" value="80">  8
													  </label>
													   <label class="btn btn-success ">
													    <input type="radio" name="options[10][nilai_pre3]" id="option9" autocomplete="off" value="90"> 9
													  </label>
													  <label class="btn btn-success">
													    <input type="radio" name="options[10][nilai_pre3]" id="option10" autocomplete="off" value="100">  10
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
				 
<div class="panel panel-danger" id="example-basic">
    <div class="panel-heading" style="padding:15px;">Sasaran Kompetensi &mdash; Cheklist item <div class=" pull-right"v style="margin-top:-8px;">
    <input type="text" id="search1" placeholder="Type to filter" class="form-control">
                  
              </div>&nbsp;<i class="pull-right">Filter : &nbsp;</i> &nbsp;</div>
 	 <div class="panel-body">
 	  <table id="table_format" class="table table-bordered table-striped table-hover table-list-search">
 	 	 <thead>
                        <tr>
                            <th>#</th>
                            <th> Core Competencies
                        <!--     <select class="form-control" id='filterText' style='display:inline-block' onchange="SubmitForm('filterText');">
                                <option disabled selected>Select</option>
                                <option value="All">All</option>
								  <option value="Program Strategis">Program Strategis</option>
								  <option value="Information System">Information System</option>
								  <option value="Pertanahan">Pertanahan</option>
								  <option value="Keahlian">Keahlian</option>
								  <option value="Transformasi">Transformasi</option>
								  <option value="Perencanaan Teknis">Perencanaan Teknis</option>
								  <option value="Pembangunan & P2l">Pembangunan & P2l</option>
								  <option value="Pemasaran">Pemasaran</option>
								  <option value="Keuangan">Keuangan</option>
								  <option value="Manajemen SDM">Manajemen SDM</option>
								  <option value="SPI - Pengelolaan Database">SPI - Pengelolaan Database</option>
								  <option value="Sekretaris Perusahaan">Sekretaris Perusahaan</option>
								  <option value="Humas">Humas</option>
								  <option value="Umum & Administrasi">Umum & Administrasi</option>
								  <option value="Hukum">Hukum</option>
								  <option value="Bisnis">Bisnis</option>
								  <option value="Pemasaran">Pemasaran</option>&nbsp;
                            </select> -->
                            </th>
                        </tr>
                    </thead>
			<tbody id="myTable">
 	 	<?php
 	 	$no=0;
 	 	 foreach ($kompetensi as $key ) {?>
 	 		
				<tr class="content">
				<td>
				 <input type="checkbox" name="nama_kompetensi[0]" class="checkbox"  id="checkbox<?php echo $no++; ?>" value="<?php echo $key->NAMA_KOMPETENSI; ?>" data-id="<?php echo $key->ID_KOMPETENSI; ?>" >
				</td>
				<td> <?php echo $key->NAMA_KOMPETENSI; ?></td>
			</tr>
			

			<?php } ?>
			</tbody>
			</table>
			
			<p>-</p>
			<p>Lainnya  :</p>
			<div class="checkbox-inline col-md-6">
			<input type="checkbox"><input type="text" name="kompetensi[][nama_kompetensi]" value="" class="form-control" placeholder="Kompetensi Lainnya">
 			</div>

 	 </div>   
<?php

 foreach($point as $result ) {?>
						   					
								            <input type="hidden" name="kompetensi[0][id_tp]" value="<?php echo $result->id_tp?>" class="form-control" readonly>
								             <input type="hidden" name="kompetensi[1][id_tp]" value="<?php echo $result->id_tp?>" class="form-control" readonly>
								              <input type="hidden" name="kompetensi[2][id_tp]" value="<?php echo $result->id_tp?>" class="form-control" readonly>
								               <input type="hidden" name="kompetensi[3][id_tp]" value="<?php echo $result->id_tp?>" class="form-control" readonly>
								                <input type="hidden" name="kompetensi[4][id_tp]" value="<?php echo $result->id_tp?>" class="form-control" readonly>
								                 <input type="hidden" name="kompetensi[5][id_tp]" value="<?php echo $result->id_tp?>" class="form-control" readonly>
								                  <input type="hidden" name="kompetensi[6][id_tp]" value="<?php echo $result->id_tp?>" class="form-control" readonly>
								                   <input type="hidden" name="kompetensi[7][id_tp]" value="<?php echo $result->id_tp?>" class="form-control" readonly>
								                    <input type="hidden" name="kompetensi[8][id_tp]" value="<?php echo $result->id_tp?>" class="form-control" readonly>
							
								       
								            
								             <?php }?>
</div>

<div id="autoUpdate" class="autoUpdate" required>
 				
			
			</div>

				
								 <div class="form-group">
							   
						       
									<button class="action submit btn btn-success pull-right">Approve</button>
						 			
						            
						             <a href="<?php echo site_url('panel_user/rejected_atasan/'.$result->id_tp) ?>" class="btn btn-danger " onclick="return confirm('Are you sure you want to Reject this Request ?');"> Rejected </a>
						            
						             <a href="<?php echo site_url('panel_user') ?>" class="btn btn-default"> Cancel </a>
						      
						</div>
				</div>
		<?php echo form_close();

	}?>

<div class="modal fade" id ="mymodal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><strong>Information</strong></h4>
      </div>
	      <div class="modal-body">
	      <h4 id="notice"></h4>
	      </div>
    </div>
  </div>
</div>
				
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

  <script>
$("#search1").keyup(function(){
        _this = this;
        // Show only matching TR, hide rest of them
        $.each($("#table_format tbody tr"), function() {
            if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
               $(this).hide();
            else
               $(this).show();                
        });
    }); 
  </script>

  <script>
 function SubmitForm(myForm)

    {  
    	 _this = this;
    	  $.each($("#table_format tbody tr"), function() {
        var rex = new RegExp($('#filterText').val());
        if(rex =="/all/"){clearFilter()}else{
            $('.content').hide();
            $('.content').filter(function() {
            return rex.test($(this).text());
            }).show();
    }
});
    }

function clearFilter()
    {
        $('.filterText').val('');
        $('.content').show();
    }
</script>

<script type="text/javascript">
 $('form').submit(function(){
 
 	if ($('input:checkbox').is(':checked')) {

 		alert('OK');
 		return true;
 		
 	} else {

    $('#mymodal').modal('show');
    $('#notice').html('Mohon menilai form evaluasi dan cheklist sasaran kompetensi ybs!');
    return false;
  }
 	
});
</script>

<script type="text/javascript">
$(document).ready(function(){
	$(document).on("click", ".checkbox", function () {
	var myId = $(this).data('id');
	if(this.checked)
			$.ajax({
				 url: "<?php echo base_url(); ?>/Panel_user/search_rekap_teraphis/"+myId,
		    	 type: "GET",
		    	 data : myId,
		    	 success: function (ajaxData){
		    	 	$('#autoUpdate').fadeIn('slow');
		      	 $("#autoUpdate").html(ajaxData);
		      	 // /$("#ModalEdit").modal('show',{backdrop: 'true'});
		      	 
		      	}
		 });
	else
	$('#autoUpdate').fadeOut('slow');

	});
});
</script>

<script>
	$("input:checkbox").on('click', function() {
  // in the handler, 'this' refers to the box clicked on
  var $box = $(this);
  if ($box.is(":checked")) {
    // the name of the box is retrieved using the .attr() method
    // as it is assumed and expected to be immutable
    var group = "input:checkbox[name='" + $box.attr("name") + "']";
    // the checked state of the group/box on the other hand will change
    // and the current value is retrieved using .prop() method
    $(group).prop("checked", false);
    $box.prop("checked", true);
  } else {
    $box.prop("checked", false);
  }
});
</script>