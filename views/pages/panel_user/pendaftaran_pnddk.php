<style type="text/css">
	

.stepwizard-step p {
    margin-top: 10px;
}
.stepwizard-row {
    display: table-row;
}
.stepwizard {
    display: table;
    width: 50%;
    position: relative;
}
.stepwizard-step button[disabled] {
    opacity: 1 !important;
    filter: alpha(opacity=100) !important;
}
.stepwizard-row:before {
    top: 14px;
    bottom: 0;
    position: absolute;
    content: " ";
    width: 100%;
    height: 1px;
    background-color: #ccc;
    z-order: 0;
}
.stepwizard-step {
    display: table-cell;
    text-align: center;
    position: relative;
}
.btn-circle {
    width: 30px;
    height: 30px;
    text-align: center;
    padding: 6px 0;
    font-size: 12px;
    line-height: 1.428571429;
    border-radius: 15px;
}

hr {
  -moz-border-bottom-colors: #1aa037;
  -moz-border-image: #1aa037;
  -moz-border-left-colors: none;
  -moz-border-right-colors: none;
  -moz-border-top-colors: none;

   border-top: 1px dotted #000000 !important;
       margin-bottom:5px !important; 
       margin-top:5px !important;
}
</style>
<h3></h3>
<div class="row">
	

 <?php if($this->session->userdata('message')) {?>
  
    <ul class="alert alert-info">
       <span class="glyphicon glyphicon-exclamation-sign"></span> <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
        
        </ul>
    <?php
    }
    ?>

<?php 
echo form_open('Panel_user/daftarkan_pnddk')
//echo $this->session->userdata('NIP');?>

 
        <div class="form-group">

   

	  			<div class="col-md-8">

	  				<div class="panel panel-info">
	  					 <div class="panel-heading"><strong><span class="glyphicon glyphicon-file"></span>Formulir Training </strong></div>
	  					 	<div class="panel-body">
	  						
							
						
						        <input type="hidden" name="id_user"  class="form-control" value="<?php echo $this->session->userdata('ID_User')  ?>" readonly/>

						        <input type="hidden" name="id_prov"  class="form-control" value="<?php echo $id_provider  ?>" readonly/>
						  
						  
						        <input type="hidden" name="id_course"  class="form-control" value="<?php echo $id_course  ?>" readonly/>
						    	       

						  
						    		    
						        <input type="hidden" name="nip"  class="form-control" value="<?php echo $edit_user->nip  ?>" readonly/>
						        <input type="hidden" name="id_pegawai"  class="form-control" value="<?php echo $edit_user->ID_Pegawai  ?>" readonly/>
						    	         

						        <div class="form-group">	
								<label for="kode">Nama Pendaftar</label>
						    	<input type="text" name="nama_peserta"  class="form-control" value="<?php echo $edit_user->nama_lengkap  ?>" readonly/>
						    	</div>

						    	<div class="form-group">	
								<label for="kode">Jabatan</label>
						    	<input type="text" name="jabatan"  class="form-control" value="<?php echo $edit_user->nama_jab  ?>" readonly/>
						    	</div>

						    	<div class="form-group">	
								<label for="kode">Unit Kerja</label>
						    	 <input type="text" name="unor"  class="form-control" value="<?php echo $edit_user->nama_unor  ?>" readonly/>

						    	</div>
						    	<div class="form-group">	
								<label for="kode">No Handphone Anda*</label>
						    	 <input type="text" name="no_hp"  class="form-control" value=""  placeholder="081xx" required/>
						    	</div>
						    
						    	<hr class="clearfix" style="size"></hr>
						    	<!-- <div class="form-group">	
								<label for="kode">Nama Atasan Anda*</label>
						    	 <input type="text" name="atasan_nama"  class="form-control" value="" required/> 

						    	  

								


						    	</div>-->
						    
						    	
						    	
						    	
<div class="stepwizard col-md-offset-3">
    <div class="stepwizard-row setup-panel">
      <div class="stepwizard-step">
        <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
        <p>Step 1</p>
      </div>
      <div class="stepwizard-step">
        <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
        <p>Step 2</p>
      </div>
      <div class="stepwizard-step">
        <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
        <p>Step 3</p>
      </div>
       <div class="stepwizard-step">
        <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
        <p>Step 4</p>
      </div>
    </div>
  </div>
  
  <form role="form" action="" method="post">
    <div class="row setup-content" id="step-1">
      <div class="col-md-12">
       
         
          <div class="form-group">
				   <label for="kode">Nama Atasan</label>
				   <select name="atasan_nama" class="combobox form-control" required="">
					 <?php foreach( $atasan as $result ) {?>
						 <option value="">Cari Nama </option>
						 <option value="<?php echo $result['nama_lengkap'] ?>" > <?php echo $result['NIP']  ?> - <?php echo $result['nama_lengkap']  ?> </option> 
							            <?php } ?>
				  </select>
							        
		 </div>
			<div class="form-group">	
				<label for="kode">No Handphone Atasan Anda*</label>
				<input type="text" name="atasan_hp"  class="form-control" value=""  placeholder="081xx" required/>
			</div>

            <div class="form-group">	
			   <label for="kode">Email Atasan*<small>email yang aktif</small></label>
			   <input type="email" name="atasan_email"  class="form-control" value=""  placeholder="example@perumnas.co.id" required/>
		 	</div>
          <button class="btn btn-primary nextBtn  pull-right" type="button" >Next</button>
       
      </div>
    </div>
    <div class="row setup-content" id="step-2">
     <div class="col-md-12">
          
          <div class="form-group">
				   <label for="kode">Nama Rekan Kerja</label>
				   <select name="rekan_nama" class="combobox form-control" required>
					 <?php foreach( $atasan as $result ) {?>
						 <option value="">Cari Nama </option>
						 <option value="<?php echo $result['nama_lengkap'] ?>" > <?php echo $result['NIP']  ?> - <?php echo $result['nama_lengkap']  ?> </option> 
							            <?php } ?>
				  </select>
							        
		 </div>
			<div class="form-group">	
				<label for="kode">No Handphone Rekan Kerja*</label>
				<input type="text" name="rekan_hp"  class="form-control" value=""  placeholder="081xx"  required />
			</div>

            <div class="form-group">	
			   <label for="kode">Email Rekan Kerja*<small>email yang aktif</small></label>
			   <input type="email" name="rekan_email"  class="form-control" value=""  placeholder="example@perumnas.co.id" required/>
		 	</div>
          <button class="btn btn-primary nextBtn  pull-right" type="button" >Next</button>
       
      </div>
    </div>
     <div class="row setup-content" id="step-3">
        <div class="col-md-12">
         
          <div class="form-group">
				   <label for="kode">Nama Bawahan *</label><small>Jika tidak memiliki bawahan silahkan Isi Data Anda</small>
				   <select name="bawahan_nama" class="combobox form-control" required>
					 <?php foreach( $atasan as $result ) {?>
						 <option value="">Cari Nama </option>
						 <option value="<?php echo $result['nama_lengkap'] ?>" > <?php echo $result['NIP']  ?> - <?php echo $result['nama_lengkap']  ?> </option> 
							            <?php } ?>
				  </select>
							        
		 </div>
			<div class="form-group">	
				<label for="kode">No Handphone Bawahan *</label>
				<input type="text" name="bawahan_hp"  class="form-control" value=""  placeholder="081xx" required />
			</div>

            <div class="form-group">	
			   <label for="kode">Email Bawahan* <small>email yang aktif</small></label>
			   <input type="email" name="bawahan_email"  class="form-control" value=""  placeholder="example@perumnas.co.id" required />
		 	</div>
          <button class="btn btn-primary nextBtn  pull-right" type="button" >Next</button>
       
      </div>
    </div>
    <div class="row setup-content" id="step-4">
   
        <div class="col-md-12">
         <div class="form-group">	
          <label><input type="checkbox" value="1" class="big-chekbox " name="pernyataan"  required   >&nbsp;Saya menyatakan data yang saya berikan adalah benar.</label>
         </div>
          <div class="form-group">	
			<label for="kode">Keterangan</label>
			<textarea name="keterangan" rows="5" class="form-control"  placeholder="Keterangan"> </textarea>
			 <p class="help-block"><small>* Wajib diisi</small> </p>
			</div>
           <div class="form-group text-right">

						         <input type="submit" name="submit" id="tambah" value="Selesaikan" class="btn btn-primary" />
						         <a href="<?php echo site_url('panel_user') ?>" class="btn btn-default" role="button">Cancel</a>
						        </div>
       
      </div>
    </div>
   
  </form>
  



						    	
						    	 

						    	






							
	  					
	  				</div>
	
	  			</div>	
	  		</div>




























	  			<div class="col-md-4">
	  				<div class="panel panel-primary">
	  					 <div class="panel-heading"><span class="glyphicon glyphicon-calendar"></span><strong> Deskripsi Pelatihan </strong></div>
	  						<div class="panel-body">								
	       									
								<small><label for="kode">Judul Pendidikan Berjenjang</label></small>
								<p> <?php echo $judul_course  ?> </p>
								
							 
							 				
								<small><label for="kode">Lokasi</label></small>
								<p><?php echo $kota_course ?> </p>
								


								<p><small><label for="kode">Start : </label></small>&nbsp;<?php echo tgl_indo($waktu_in) ?> </p>
								
								

								<p><small><label for="kode">End&nbsp; :</label></small>&nbsp;<?php echo tgl_indo($waktu_out) ?> </p>
								
								



						   </div>  

						
	  					
	  				</div>
	
	  			
	  				
	  			</div> 

	  </div>			 
	</div>
<?php echo form_close() ?>
</div>
</div>


<script type="text/javascript">
      //<![CDATA[
        $(document).ready(function(){
          $('.combobox').combobox()
        });
      //]]>
    </script>

<script>
$(document).ready(function () {
  var navListItems = $('div.setup-panel div a'),
          allWells = $('.setup-content'),
          allNextBtn = $('.nextBtn');

  allWells.hide();

  navListItems.click(function (e) {
      e.preventDefault();
      var $target = $($(this).attr('href')),
              $item = $(this);

      if (!$item.hasClass('disabled')) {
          navListItems.removeClass('btn-primary').addClass('btn-default');
          $item.addClass('btn-primary');
          allWells.hide();
          $target.show();
          $target.find('input:eq(0)').focus();
      }
  });

  allNextBtn.click(function(){
      var curStep = $(this).closest(".setup-content"),
          curStepBtn = curStep.attr("id"),
          nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
          curInputs = curStep.find("input[type='text'],input[type='url']"),
          isValid = true;

      $(".form-group").removeClass("has-error");
      for(var i=0; i<curInputs.length; i++){
          if (!curInputs[i].validity.valid){
              isValid = false;
              $(curInputs[i]).closest(".form-group").addClass("has-error");
          }
      }

      if (isValid)
          nextStepWizard.removeAttr('disabled').trigger('click');
  });

  $('div.setup-panel div a.btn-primary').trigger('click');
});
</script>