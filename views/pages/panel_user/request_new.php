<style type="text/css">
.panel-transparent {
        background: none;
    }

    .panel-transparent .panel-heading{
        background: rgba(122, 130, 136, 0.2)!important;
    }

    .panel-transparent .panel-body{
        background: rgba(46, 51, 56, 0.2)!important;
    }
.center-block {
    float: none;
    margin-left: auto;
    margin-right: auto;
}

.input-group .icon-addon .form-control {
    border-radius: 0;
}

.icon-addon {
    position: relative;
    color: #555;
    display: block;
}

.icon-addon:after,
.icon-addon:before {
    display: table;
    content: " ";
}

.icon-addon:after {
    clear: both;
}

.icon-addon.addon-md .glyphicon,
.icon-addon .glyphicon, 
.icon-addon.addon-md .fa,
.icon-addon .fa {
    position: absolute;
    z-index: 2;
    left: 10px;
    font-size: 14px;
    width: 20px;
    margin-left: -2.5px;
    text-align: center;
    padding: 5px 0;
    top: 1px
}

#loadingmessage{

  display:    none;
    position:   fixed;
    z-index:    1000;
    top:        0;
    left:       0;
    height:     100%;
    width:      100%;
    background: rgba( 255, 255, 255, .8 ) 
                url('<?php echo base_url() ?>/assets/ajax-loader-2.gif') 
                50% 50% 
                no-repeat;
}

.icon-addon.addon-lg .form-control {
    line-height: 1.33;
    height: 36px;
    font-size: 18px;
    padding: 10px 16px 10px 40px;
}

.icon-addon.addon-sm .form-control {
    height: 30px;
    padding: 5px 10px 5px 28px;
    font-size: 12px;
    line-height: 1.5;
}

.icon-addon.addon-lg .fa,
.icon-addon.addon-lg .glyphicon {
    font-size: 18px;
    margin-left: 0;
    left: 11px;
    top: 4px;
}

.icon-addon.addon-md .form-control,
.icon-addon .form-control {
    padding-left: 30px;
    float: left;
    font-weight: normal;
}

.icon-addon.addon-sm .fa,
.icon-addon.addon-sm .glyphicon {
    margin-left: 0;
    font-size: 12px;
    left: 5px;
    top: -1px
}

.icon-addon .form-control:focus + .glyphicon,
.icon-addon:hover .glyphicon,
.icon-addon .form-control:focus + .fa,
.icon-addon:hover .fa {
    color: #2580db;
}
</style>
<?php if(validation_errors()) {?>
    
    <ul class="alert alert-danger">
     <?php echo validation_errors('<ul>','</ul>')?>
    </ul>
<?php
}
?>

<?php 


?>
<div class="row">

 <h3><i class="glyphicon glyphicon-dashboard"></i> Dashboard Training</h3> 
 <br/>
 
 <div class="col-md-12">
 	<?php if($this->session->userdata('berhasil')) {?>
  
    <ul class="alert alert-success">
       <span class="glyphicon glyphicon-ok"></span> <?php echo $this->session->userdata('berhasil') <> '' ? $this->session->userdata('berhasil') : ''; ?>
        
        </ul>
    <?php
    }
    ?>
    <?php if($this->session->userdata('message')) {?>
  
    <ul class="alert alert-info">
       <span class="glyphicon glyphicon-exclamation-sign"></span> <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
        
        </ul>
    <?php
    }
    ?>
  <div class="panel panel-info " >
  <div class="panel-heading"><span class="glyphicon glyphicon-chevron-right"></span> Formulir Usulan Training Baru Karyawan Perumnas </div>

  <div class="panel-body">	
<div id='loadingmessage' style='display:none'></div>


 <?php echo  form_open_multipart('Panel_user/tambahkan') ?>

 			<form novalidate>
 			
 		 <input type="hidden" name="id_user"  class="form-control" value="<?php echo $this->session->userdata('ID_User')  ?>" readonly/>
 		   <input type="hidden" name="nip"  class="form-control" value="<?php echo $edit_user->nip  ?>" readonly/>
					    	         

 		   						<div class="form-group text-right">	
								<label for="kode"> Kepada  : Yth. MD Diklat Div. PSDM</label>
								<p>di  Kantor Pusat Perum Perumnas</p>

						    	</div>
						    	<br/>

						    	<div class="row">
						    	<div class="form-group col-md-6">
						        <label for="kode">NAMA PESERTA*  </label>
						        <input type="text" name="nama_peserta"  class="form-control" value="<?php echo $edit_user->nama_lengkap  ?>" readonly/>	
						        </div>

						        <div class="form-group col-md-6">
						        <label for="kode">JABATAN  </label>
						        <input type="text" name="jabatan"  class="form-control" value="<?php echo $edit_user->nama_jab  ?>" readonly/>
						    	</div>
						        </div>
						    	<div class="form-group">	
							
						    	 <input type="hidden" name="unor"  class="form-control" value="<?php echo $edit_user->nama_unor  ?>" readonly/>
						    	</div>


						    	
								    	<div class="row">
								    	<div class="form-group col-md-6">
								        <label for="kode">NO HANDPHONE *   </label>
								        <input type="text" name="no_hp"  class="form-control" value=""  required />
								    	</div>

								    	<div class="form-group col-md-6">
								        <label for="kode">EMAIL ANDA*   </label>
								        <input type="email" name="emailku"  class="form-control" value=""  required />
								    	</div>
								    	</div>
								       	
										
								        </label><label>APAKAH ANDA SUDAH MEMILIKI PROVIDER TRAINING ? :</label>
								       <br/>
								       
										<div class="radio-inline" style="padding-right:20px;">
										  <label>
										   <input type="radio" name="adaprovider" id="inactivelist1" value="option1" checked style="transform: scale(1.25);">
										   Sudah memiliki Provider
										  </label>
										
										</div>


										 <div class="radio-inline">
										
										  <label>
										   <input type="radio" name="adaprovider" id="inactivelist2" value="option2" style="transform: scale(1.25);">
										    Belum memiliki Provider
										  </label>
										</div>
										
								    	<hr>

								    	<div id="autoUpdate">

								    	<div class="form-group">
								        <label for="kode">JUDUL PELATIHAN*  </label>
								        <input type="text" name="judul"  class="form-control" placeholder="Judul pelatihan yang Anda inginkan" required />
								        </div>

								        

								    	 <div class="form-group" id="nama_persh" >
									     <label for="kode">NAMA PERUSAHAAN/PROVIDER</label>
									     <input type="text" name="nama_persh"  class="form-control" placeholder="Provider pelatihan yang Anda inginkan" />
									     </div>

										<div class="row">
								        <div class="form-group col-md-4" id="kota">
								        <label for="kode">Kota*</label>
								        <select name="kota" class="combobox form-control">
								            <?php foreach( $kota as $result ) {?>
								                <option value="">Cari Nama Kota</option>
								               <option value="<?php echo $result->nama_kabkota ?>" > <?php echo $result->nama_kabkota ?></option> 
								            <?php } ?>
								        </select>
								        
								        </div>
								           <div class="form-group col-md-4">
									        <label for="kode">BIDANG*</label>
									        <select name="kategori" class="combobox form-control">
									            <?php foreach( $kategori as $result ) {?>
									             <option value="">Pilih Kategori Bidang Pelatihan</option>
									               <option value="<?php echo $result->id_kategori ?>" > <?php echo $result->nama_kategori ?></option> 
									            <?php } ?>
									        </select>
									        
									        </div>

									          <div class="form-group col-md-4" id="renc_tgl">
									         <label for="dtp_input2">Rencana Tanggal* </label>
									         <div class="input-group date form_date form_date " data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
									                    <input class="form-control" size="16"  name="tanggal" type="text" readonly >
									                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
									                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
									         </div>
									        
									         </div> 
									       </div>


										<div class="row">
								        <div class="form-group col-md-4" id="telp_prov">
								        <label for="jumlah">TELP PROVIDER*</label>
								        <input type="text" name="no_telp" id="telp"  class="form-control" placeholder="ex.021-" required/>
								        </div>

								      
								        <div class="form-group col-md-4" id="website">
								        <label for="jumlah">WEBSITE PROVIDER</label>
								        <input type="text" name="website" id="telp"  class="form-control"   placeholder="ex.http://" />
								        </div>					 
										
										 <div class="form-group col-md-4" id="email_prov">
								        <label for="penerbit">EMAIL PROVIDER*</label>
								        <input type="text" name="email" id="email" class="form-control" placeholder="youcompany@example.com" required/>
								        </div>
								        </div>

								        <div class="row">
								        <div class="form-group col-md-4">
								        <label for="jumlah">LOKASI TRAINING</label>
								        <input type="text" name="lokasi" id="telp"  class="form-control" placeholder="ex.Wisma Perumnas Lantai 7" />
								        </div>

								        <div class="form-group col-md-4" id="biaya">
								        <label for="jumlah">BIAYA TRAINING</label>
								        <input type="number" name="biaya" id="telp"  class="form-control" placeholder="ex.3000000" />
								        </div>
								        </div>

								       
								        <div class="form-group" id="tujuan">
								        <h5> <label for="InputMessage">TUJUAN PELATIHAN*<small> Mohon diisi minimal 3 </small></label></h5>
								        <ol>
								        <div class="form-group">
								      	<div class="input-group">
									       <div class="input-group-addon">
									     <i class="glyphicon glyphicon-record"></i>
									        
									       </div>
									       <input id="knowledge" name="knowledge" type="text" placeholder="" class="form-control input-md" required>
		     							 </div>
		     							 </div>
		     							 <div class="form-group">
		     							 <div class="input-group">
									       <div class="input-group-addon">
									     <i class="glyphicon glyphicon-record"></i>
									        
									       </div>
									       <input id="skill" name="skill" type="text" placeholder="" class="form-control input-md" required>
		     							 </div>
		     							 </div>
		     							 <div class="form-group">
		     							 <div class="input-group">
									       <div class="input-group-addon">
									     <i class="glyphicon glyphicon-record"></i>
									        
									       </div>
									       <input id="attitude" name="attitudeq" type="text" placeholder="" class="form-control input-md" required>
		     							 </div>
		     							 </div>
		     							 <div id="dynamicInput">

		        						</div>
		     							  <a hreff="#" class="btn btn-xs btn-warning pull-right" value="(+) MORE"  id="addScnt" onClick="addInput('dynamicInput');" >(+) MORE</a>
		     							 </ol>




								        
								       
								        
								        </div>
								        
								         
								       
								        <div class="form-group" id="brosur">
								        <label for="cover">BROSUR*</label>
								        <input type="file" name="brosur" id="cover_brosur" required/>
								        <p class="help-block"><small>*Document yang diizinkan max.300kb format (*jpg,*png,*pdf)</small> </p>
								        </div>
								       				        
						     
						       </div>

						        <div class="form-group">
						       <h5> <label for="InputMessage">Keterangan<small> Tambahan </small></label></h5>
						        <textarea name="keterangan" id="InputMessage" class="form-control" rows="5"  data-toggle="tooltip" data-placement="right" title="Keterangan" required></textarea>
						        
						       </div>

						        <div class="form-group">
						         <input type="submit" name="tambah" id="tambah" value="submit" data-style="slide-right" class="btn btn-success pull-right ladda-button" />
						        </div>
						        <br/>
						        <h5><small>Keterangan  
						        <p> *) &nbsp; : kolom wajib disi</p></small></h5>

 </div>
</form>
 <?php form_close()?>
<p>&nbsp;<a href="<?php echo site_url('Panel_user')  ?>">  Back </a></p>
	       									
  </div>

</div>

</div>

</div>


<div class="modal fade" id ="mymodal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><strong>Confirmation</strong></h4>
      </div>
	      <div class="modal-body">
	      <h4 id="notice"></h4>
	      </div>

	      <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary btn-ok">Lanjut Isi Form</button>
                </div>
    </div>
  </div>
</div>

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

<script type="text/javascript">
      //<![CDATA[
        $(document).ready(function(){
          $('.combobox').combobox()
        });
      //]]>
    </script>
<script>
var counter = 3;
var limit = 10;
function addInput(divName){
     if (counter == limit)  {
          alert("You have reached the limit of adding " + counter + " inputs");
     }
     else {
          var newdiv = document.createElement('div');
          newdiv.innerHTML = "<div class='form-group me'><div class='input-group'><div class='input-group-addon'><i class='glyphicon glyphicon-record'></i></div><input type='text' name='attitude[]"+(counter + 1)+ " ' class='form-control tujuan' rows='5'  ><div class='input-group-addon'><button class='btn-danger btn-remove'>x</button></div></div></div>";
          document.getElementById(divName).appendChild(newdiv);
          counter++;
     }

	$(document).on('click', '.btn-remove', function(e)
	    {
			if( counter > 0 ) {
                        $(this).parents('.me').remove();
                        counter--;
                }
              
			e.preventDefault();
			return false;
		});



}
</script>


<script>
$(document).ready(function() {

    $('input:radio[name=adaprovider]').change(function() {
        if (this.value == 'option1') {
        	 $('#mymodal').modal('show');
   			 $('#notice').html('Anda memilih formulir request <b>dengan provider pelatihan baru</b>');
           
              $('#mymodal').on('click', '.btn-ok', function(e) {
		          
		          	$.ajax({
							 url: "<?php echo base_url(); ?>/Panel_user/get_form_tanpa_provider/",
					    	 type: "POST",
					    	 data: 'id=1',
					    	  cache: false,
					    	  beforeSend: function(){

			                 
			                 $('#loadingmessage').show();
			                },
					    	  success: function (ajaxData){
					    	  	$('#mymodal').modal('hide');
					    	 	//$('#autoUpdate').fadeIn('slow');
					    	 	$('#loadingmessage').fadeOut();
					      	 	$("#autoUpdate").html(ajaxData);
					      	  
					      	 // /$("#ModalEdit").modal('show',{backdrop: 'true'});
					      	 return false;
					      	},
			                  error: function(){      
			                   alert('Error while request..');
			                  },
					 });
		           
		        });
          
            
        }
        else if (this.value == 'option2') {
             $('#mymodal').modal('show');
   			 $('#notice').html('Anda memilih formulir request <b>tanpa provider  pelatihan </b>');
  				$('#mymodal').on('click', '.btn-ok', function(e) {
		          
		          	$.ajax({
							 url: "<?php echo base_url(); ?>/Panel_user/get_form_tanpa_provider/",
					    	 type: "POST",
					    	 cache: false,
					    	 data:'id=2',
					    	 beforeSend: function(){

			                 
			                 $('#loadingmessage').show();
			                },
					    	  success: function (ajaxData){
					    	  	$('#mymodal').modal('hide');
					    	 	//$('#autoUpdate').fadeIn('slow');
					    	 	$('#loadingmessage').fadeOut();
					      	 	$("#autoUpdate").html(ajaxData);
					      	  	
					      	 // /$("#ModalEdit").modal('show',{backdrop: 'true'});

					      	 return false;
					      	},
			                  error: function(){      
			                   alert('Error while request..');
			                  },
					 });


		           
		        });
          


        }
    });
});
</script>
