<style type="text/css">
	


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
echo form_open('Panel_user/daftarkan')
//echo $this->session->userdata('NIP');?>

 
        <div class="form-group">

   

	  			<div class="col-md-5">

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
						    
						    	 <div class="form-group">
							        <label for="kode">Nama Atasan</label>
							        <select name="atasan_nama" class="combobox form-control">
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
	
	  			</div>	
	  		</div>




























	  			<div class="col-md-4">
	  				<div class="panel panel-primary">
	  					 <div class="panel-heading"><span class="glyphicon glyphicon-calendar"></span><strong> Deskripsi Pelatihan </strong></div>
	  						<div class="panel-body">								
	       									
								<small><label for="kode">Judul Pelatihan</label></small>
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
