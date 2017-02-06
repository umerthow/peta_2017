 <h3><i class="glyphicon glyphicon-dashboard"></i> Dashboard Training</h3> 
<div class="row">
	
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

<?php 

?>
	
	<div class="panel panel-default" id="example-basic">
    <div class="panel-heading"><span class="glyphicon glyphicon-chevron-right"></span> Formulir Evaluasi Pelatihan [FRM-PSDM-04-01-06, Rev.0] </div>
	<?php echo form_open('Panel_user/tambah_survey')?>
    <div class="panel-body">	
    							
    							 <div class="form-group has-success">
						        <label for="kode">Pilih Judul Pelatihan(*)</label>
						         <?php foreach( $course as $result ) {?>
						          <input type="hidden" name="prov" value="<?php echo $result->id_provider?>">
						                 <input type="hidden" name="option_1" value="<?php echo $result->id_tp?>">
						           <div class="radio ">

						        		 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="course" id="optionsRadios2" value="<?php echo $result->id_course ?>" required> <?php echo $result->judul_course ?> - <?php echo $result->nama_provider ?>
						        	</div>
						        <?php } ?>
						    		</div>


						    <input type="hidden" name="NIP" value="<?php echo $edit_user->nip?>">
						      <input type="hidden" name="date_in" value="02-02-1991">
				
 	<?php if(!empty( $course))  { ?>
		<div class="progress">
		  <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
		</div>

		<div class="step well">
			 <div class="panel panel-danger">
						        <div class="panel-heading">Evaluasi Pembelajaran </div>
						        <div class="panel-body">
							    <div class="form-group">
							        <label class="col-md-12 control-label">Apakah pemahaman Anda mengenai topik hari ini meningkat?</label>
							      <div class="col-md-12 col-md-offset-1">
							      <div class="form-group">
							           <div class="row">
							           <label class="radio-inline"> <input type="radio" name="season[1]" id="seasonSummer" value="4" checked><span class=" class="fa fa-smile-o""></span> Sangat Puas </label>
							           </div>
							              <div class="row">
							            <label class="radio-inline"> <input type="radio" name="season[1]" id="seasonWinter" value="3"> Puas </label>
							           </div>
							             <div class="row">
							            <label class="radio-inline"> <input type="radio" name="season[1]" id="seasonSpringFall" value="2" > Tidak Puas </label>
							            </div>
							              <div class="row">
							              <label class="radio-inline"> <input type="radio" name="season[1]" id="seasonSpringFall" value="1" checked> Sangat Tidak Puas </label>
							        	 </div>
							       </div>
							       </div>
							    </div>
							    <br/>
							   
							     <div class="form-group">
							        <label class="col-md-5 control-label">Topik Hari ini bermanfaat dan aplikatif dalam pekerjaan ?</label>
							       <div class="col-md-12 col-md-offset-1">
							     	 <div class="form-group">
							           <div class="row">
							            <label class="radio-inline"> <input type="radio" name="season[2]" id="seasonSummer" value="4" checked><span class=" class="fa fa-smile-o""></span> Sangat Puas </label>
							            </div>
							             <div class="row">
							            <label class="radio-inline"> <input type="radio" name="season[2]" id="seasonWinter" value="3"> Puas </label>
							            </div>
							             <div class="row">
							            <label class="radio-inline"> <input type="radio" name="season[2]" id="seasonSpringFall" value="2" > Tidak Puas </label>
							            </div>
							             <div class="row">
							             <label class="radio-inline"> <input type="radio" name="season[2]" id="seasonSpringFall" value="1" > Sangat Tidak Puas </label>
							        	</div>
							        </div>
							       </div>
							    </div>
							     <br/>
							     <div class="form-group">
							        <label class="col-md-5 control-label">Bagaimana menurut Anda mengenai program keseluruhan pada hari ini ?</label>
							         <div class="col-md-12 col-md-offset-1">
							     	 <div class="form-group">
							           <div class="row">
							            <label class="radio-inline"> <input type="radio" name="season[3]" id="seasonSummer" value="4" checked><span class=" class="fa fa-smile-o""></span> Sangat Puas </label>
							             </div>
							              <div class="row">
							            <label class="radio-inline"> <input type="radio" name="season[3]" id="seasonWinter" value="3"> Puas </label>
							            </div>
							              <div class="row">
							             <label class="radio-inline"> <input type="radio" name="season[3]" id="seasonSpringFall" value="2" > Tidak Puas </label>
							             </div>
							               <div class="row">
							              <label class="radio-inline"> <input type="radio" name="season[3]" id="seasonSpringFall" value="1" > Sangat Tidak Puas </label>
							              </div>
							        </div>
							    </div>
							    </div>











							    </div>
							</div>
		</div>
		<div class="step well">
			 <div class="panel panel-danger">
						        <div class="panel-heading">Evaluasi Materi </div>
						        <div class="panel-body">
							    <div class="form-group">
							        <label class="col-md-5 control-label">Materi/Slide presentasi?</label>
							         <div class="col-md-12 col-md-offset-1">
							     	 <div class="form-group">
							           <div class="row">
							            <label class="radio-inline"> <input type="radio" name="season[4]" id="seasonSummer" value="4" checked><span class=" class="fa fa-smile-o""></span> Sangat Puas </label>
							            </div>
							            <div class="row">
							            <label class="radio-inline"> <input type="radio" name="season[4]" id="seasonWinter" value="3"> Puas </label>
							            </div>
							            <div class="row">
							            <label class="radio-inline"> <input type="radio" name="season[4]" id="seasonSpringFall" value="2" > Tidak Puas </label>
							            </div>
							            <div class="row">
							              <label class="radio-inline"> <input type="radio" name="season[4]" id="seasonSpringFall" value="1" > Sangat Tidak Puas </label>
							        	</div>
							        </div>
							    </div>
							   </div>
							    <br/>
							     <div class="form-group">
							        <label class="col-md-5 control-label">Tingkat Teori ?</label>
							        <div class="col-md-12 col-md-offset-1">
							     	 <div class="form-group">
							           <div class="row">
							            <label class="radio-inline"> <input type="radio" name="season[5]" id="seasonSummer" value="4" checked><span class=" class="fa fa-smile-o""></span> Sangat Puas </label>
							            </div>
							            <div class="row">
							            <label class="radio-inline"> <input type="radio" name="season[5]" id="seasonWinter" value="3"> Puas </label>
							            </div>
							            <div class="row">
							            <label class="radio-inline"> <input type="radio" name="season[5]" id="seasonSpringFall" value="2" > Tidak Puas </label>
							            </div>
							            <div class="row">
							             <label class="radio-inline"> <input type="radio" name="season[5]" id="seasonSpringFall" value="1" > Sangat Tidak Puas </label>
							        	</div>
							        </div>
							    </div>
							    </div>
							     <br/>
							     <div class="form-group">
							        <label class="col-md-5 control-label">Struktur dan Isi Materi ?</label>
							         <div class="col-md-12 col-md-offset-1">
							     	 <div class="form-group">
							           <div class="row">
							            <label class="radio-inline"> <input type="radio" name="season[17]" id="seasonSummer" value="4" checked><span class=" class="fa fa-smile-o""></span> Sangat Puas </label>
							            </div>
							            <div class="row">
							            <label class="radio-inline"> <input type="radio" name="season[17]" id="seasonWinter" value="3"> Puas </label>
							            </div>
							            <div class="row">
							            <label class="radio-inline"> <input type="radio" name="season[17]" id="seasonSpringFall" value="2" > Tidak Puas </label>
							            </div>
							            <div class="row">
							              <label class="radio-inline"> <input type="radio" name="season[17]" id="seasonSpringFall" value="1" > Sangat Tidak Puas </label>
							        	</div>
							        </div>
							    </div>
							    </div>
							    <br/>
							     <div class="form-group">
							        <label class="col-md-5 control-label">Efektifias Kegiatan Lapangan ?</label>
							         <div class="col-md-12 col-md-offset-1">
							     	 <div class="form-group">
							           <div class="row">
							            <label class="radio-inline"> <input type="radio" name="season[6]" id="seasonSummer" value="4" checked><span class=" class="fa fa-smile-o""></span> Sangat Puas </label>
							            </div>
							             <div class="row">
							            <label class="radio-inline"> <input type="radio" name="season[6]" id="seasonWinter" value="3"> Puas </label>
							            </div>
							             <div class="row">
							            <label class="radio-inline"> <input type="radio" name="season[6]" id="seasonSpringFall" value="2" > Tidak Puas </label>
							            </div>
							             <div class="row">
							              <label class="radio-inline"> <input type="radio" name="season[6]" id="seasonSpringFall" value="1" > Sangat Tidak Puas </label>
							              </div>
							        </div>
							    </div>
							    </div>
 								<br/>
							     <div class="form-group">
							        <label class="col-md-5 control-label">Studi Kasus (Bila Ada) ?</label>
							         <div class="col-md-12 col-md-offset-1">
							     	 <div class="form-group">
							           <div class="row">
							            <label class="radio-inline"> <input type="radio" name="season[7]" id="seasonSummer" value="4" checked><span class=" class="fa fa-smile-o""></span> Sangat Puas </label>
							            </div>
							            <div class="row">
							            <label class="radio-inline"> <input type="radio" name="season[7]" id="seasonWinter" value="3"> Puas </label>
							            </div>
							             <div class="row">
							            <label class="radio-inline"> <input type="radio" name="season[7]" id="seasonSpringFall" value="2" > Tidak Puas </label>
							            </div>
							             <div class="row">
							              <label class="radio-inline"> <input type="radio" name="season[7]" id="seasonSpringFall" value="1" > Sangat Tidak Puas </label>
							              </div>
							        </div>
							    </div>
							    </div>
							    <br/>
							     <div class="form-group">
							        <label class="col-md-5 control-label">Penjadwalan sesi/waktu ?</label>
							           <div class="col-md-12 col-md-offset-1">
							     	 <div class="form-group">
							           <div class="row">
							            <label class="radio-inline"> <input type="radio" name="season[8]" id="seasonSummer" value="4" checked><span class=" class="fa fa-smile-o""></span> Sangat Puas </label>
							            </div>
							            <div class="row">
							            <label class="radio-inline"> <input type="radio" name="season[8]" id="seasonWinter" value="3"> Puas </label>
							            </div>
							             <div class="row">
							            <label class="radio-inline"> <input type="radio" name="season[8]" id="seasonSpringFall" value="2" > Tidak Puas </label>
							            </div>
							             <div class="row">
							              <label class="radio-inline"> <input type="radio" name="season[8]" id="seasonSpringFall" value="1" > Sangat Tidak Puas </label>
							              </div>
							        </div>
							    </div>
							    </div>


							    </div>
							</div>
		</div>
		<div class="step well">
			<div class="panel panel-danger" >
						        <div class="panel-heading">Evaluasi Pengajar  </div>
						        <div class="panel-body" id="dynamicInput" >
						        	<div class="form-group">
						        	 <Label class="text"> Nama Instruktur </label>
							    <input type="text" class="form-control" name="123">
							</div>
							    <div class="form-group">
							        <label class="col-md-5 control-label">Mempresentasi materi secara jelas ?</label>
							          <div class="col-md-12 col-md-offset-1">
							     	 <div class="form-group">
							           <div class="row">
							            <label class="radio-inline"> <input type="radio" name="season[9]" id="seasonSummer" value="4" checked><span class=" class="fa fa-smile-o""></span> Sangat Puas </label>
							            </div>
							            <div class="row">
							            <label class="radio-inline"> <input type="radio" name="season[9]" id="seasonWinter" value="3"> Puas </label>
							            </div>
							             <div class="row">
							            <label class="radio-inline"> <input type="radio" name="season[9]" id="seasonSpringFall" value="2" > Tidak Puas </label>
							            </div>
							             <div class="row">
							              <label class="radio-inline"> <input type="radio" name="season[9]" id="seasonSpringFall" value="1" > Sangat Tidak Puas </label>
							              </div>
							        </div>
							    </div>
							    </div>
							    <br/>
							     <div class="form-group">
							        <label class="col-md-5 control-label">Pengetahuan terhadap topik ?</label>
							           <div class="col-md-12 col-md-offset-1">
							     	 <div class="form-group">
							           <div class="row">
							            <label class="radio-inline"> <input type="radio" name="season[10]" id="seasonSummer" value="4" checked><span class=" class="fa fa-smile-o""></span> Sangat Puas </label>
							            </div>
							            <div class="row">
							            <label class="radio-inline"> <input type="radio" name="season[10]" id="seasonWinter" value="3"> Puas </label>
							            </div>
							             <div class="row">
							            <label class="radio-inline"> <input type="radio" name="season[10]" id="seasonSpringFall" value="2" > Tidak Puas </label>
							            </div>
							             <div class="row">
							              <label class="radio-inline"> <input type="radio" name="season[10]" id="seasonSpringFall" value="1" > Sangat Tidak Puas </label>
							              </div>
							        </div>
							    </div>
							    </div>
							     <br/>
							     <div class="form-group">
							        <label class="col-md-5 control-label">Respon terhadap peserta ?</label>
							           <div class="col-md-12 col-md-offset-1">
							     	 <div class="form-group">
							           <div class="row">
							            <label class="radio-inline"> <input type="radio" name="season[11]" id="seasonSummer" value="4" checked><span class=" class="fa fa-smile-o""></span> Sangat Puas </label>
							            </div>
							            <div class="row">
							            <label class="radio-inline"> <input type="radio" name="season[11]" id="seasonWinter" value="3"> Puas </label>
							            </div>
							             <div class="row">
							            <label class="radio-inline"> <input type="radio" name="season[11]" id="seasonSpringFall" value="2" > Tidak Puas </label>
							            </div>
							             <div class="row">
							              <label class="radio-inline"> <input type="radio" name="season[11]" id="seasonSpringFall" value="1" > Sangat Tidak Puas </label>
							              </div>
							        </div>
							    </div>
							    </div>

							     <br/>
							     <div class="form-group">
							        <label class="col-md-5 control-label">Apakah membawa suasana belajar yang baik ?</label>
							           <div class="col-md-12 col-md-offset-1">
							     	 <div class="form-group">
							           <div class="row">
							            <label class="radio-inline"> <input type="radio" name="season[12]" id="seasonSummer" value="4" checked><span class=" class="fa fa-smile-o""></span> Sangat Puas </label>
							            </div>
							            <div class="row">
							            <label class="radio-inline"> <input type="radio" name="season[12]" id="seasonWinter" value="3"> Puas </label>
							            </div>
							             <div class="row">
							            <label class="radio-inline"> <input type="radio" name="season[12]" id="seasonSpringFall" value="2" > Tidak Puas </label>
							            </div>
							             <div class="row">
							              <label class="radio-inline"> <input type="radio" name="season[12]" id="seasonSpringFall" value="1" > Sangat Tidak Puas </label>
							              </div>
							        </div>
							    </div>
							    </div>
							   ---
							    </div>

							</div>
							</div>
		
		<div class="step well">
			<div class="panel panel-danger">
						        <div class="panel-heading">Akomodasi </div>
						        <div class="panel-body">
							    <div class="form-group">
							        <label class="col-md-5 control-label">Peralatan Presentasi ?</label>
							           <div class="col-md-12 col-md-offset-1">
							     	 <div class="form-group">
							           <div class="row">
							            <label class="radio-inline"> <input type="radio" name="season[13]" id="seasonSummer" value="4" checked><span class=" class="fa fa-smile-o""></span> Sangat Puas </label>
							            </div>
							            <div class="row">
							            <label class="radio-inline"> <input type="radio" name="season[13]" id="seasonWinter" value="3"> Puas </label>
							            </div>
							             <div class="row">
							            <label class="radio-inline"> <input type="radio" name="season[13]" id="seasonSpringFall" value="2" > Tidak Puas </label>
							            </div>
							             <div class="row">
							              <label class="radio-inline"> <input type="radio" name="season[13]" id="seasonSpringFall" value="1" > Sangat Tidak Puas </label>
							              </div>
							        </div>
							    </div>
							    </div>
							    <br/>
							     <div class="form-group">
							        <label class="col-md-5 control-label">Paket & peralatan pelatihan ?</label>
							           <div class="col-md-12 col-md-offset-1">
							     	 <div class="form-group">
							           <div class="row">
							            <label class="radio-inline"> <input type="radio" name="season[14]" id="seasonSummer" value="4" checked><span class=" class="fa fa-smile-o""></span> Sangat Puas </label>
							            </div>
							            <div class="row">
							            <label class="radio-inline"> <input type="radio" name="season[14]" id="seasonWinter" value="3"> Puas </label>
							            </div>
							             <div class="row">
							            <label class="radio-inline"> <input type="radio" name="season[14]" id="seasonSpringFall" value="2" > Tidak Puas </label>
							            </div>
							             <div class="row">
							              <label class="radio-inline"> <input type="radio" name="season[14]" id="seasonSpringFall" value="1" > Sangat Tidak Puas </label>
							              </div>
							        </div>
							    </div>
							    </div>
							     <br/>
							     <div class="form-group">
							        <label class="col-md-5 control-label">Penginapan (Bila Ada) ? </label>
							          <div class="col-md-12 col-md-offset-1">
							     	 <div class="form-group">
							           <div class="row">
							            <label class="radio-inline"> <input type="radio" name="season[15]" id="seasonSummer" value="4" checked><span class=" class="fa fa-smile-o""></span> Sangat Puas </label>
							            </div>
							            <div class="row">
							            <label class="radio-inline"> <input type="radio" name="season[15]" id="seasonWinter" value="3"> Puas </label>
							            </div>
							             <div class="row">
							            <label class="radio-inline"> <input type="radio" name="season[15]" id="seasonSpringFall" value="2" > Tidak Puas </label>
							            </div>
							             <div class="row">
							              <label class="radio-inline"> <input type="radio" name="season[15]" id="seasonSpringFall" value="1" > Sangat Tidak Puas </label>
							              </div>
							        </div>
							    </div>
							    </div>

							     <br/>
							     <div class="form-group">
							        <label class="col-md-5 control-label">Kualitas Makanan (Bila Ada) ?</label>
							           <div class="col-md-12 col-md-offset-1">
							     	 <div class="form-group">
							           <div class="row">
							            <label class="radio-inline"> <input type="radio" name="season[16]" id="seasonSummer" value="4" checked><span class=" class="fa fa-smile-o""></span> Sangat Puas </label>
							            </div>
							            <div class="row">
							            <label class="radio-inline"> <input type="radio" name="season[16]" id="seasonWinter" value="3"> Puas </label>
							            </div>
							             <div class="row">
							            <label class="radio-inline"> <input type="radio" name="season[16]" id="seasonSpringFall" value="2" > Tidak Puas </label>
							            </div>
							             <div class="row">
							              <label class="radio-inline"> <input type="radio" name="season[16]" id="seasonSpringFall" value="1" > Sangat Tidak Puas </label>
							              </div>
							        </div>
							    </div>
							    </div>

							    </div>
							</div>

							
		</div>
		<div class="step well">
						<div class="form-group">
							  <div "col-md-5">
							        <label class="control-label">Komentar perbaikan untuk pelatihan berikutnya : </label>
							         </div>
							            <textarea class="form-control" rows="5" name="season18" placeholder="Tulis Komentar Anda.."></textarea>
							       
						 </div>

		</div>
		<div class="step well">
			<p class="text-left"> Terima kasih telah mengisi survey evaluasi pelatihan. klik submit</p>
		</div>

		



		<button type="button" class="back btn">back</button>
		<button type="button" class="next btn">next</button>

		<button class="action submit btn btn-success">Submit</button>
	 </div> 

   </div>

 </div>

 <?php echo form_close()?>
<?php } else  { ?>

<div class="panel panel-default"> 
  <div class="panel-heading ">    

 
<br/>
</div>
  <div class="panel-body">
<h4 class="text-info text-center"><b> OOPS! </h4></b>

<h5 class="text-info text-center" >
Belum Ada Survey Baru untuk Anda, kapan-kapan lagi yah.

:)
</h5>
<br/><br/><br/><br/>

<p class="text-center"> <a href="<?php echo base_url() ?>" class="text-center">BACK TO HOME PAGE</a> </p>
  </div>
  </div>
<?php } ?>


</div>

   <script type="text/javascript">
	$(document).ready(function(){
		var current = 1;
		
		widget      = $(".step");
		btnnext     = $(".next");
		btnback     = $(".back"); 
		btnsubmit   = $(".submit");

		// Init buttons and UI
		widget.not(':eq(0)').hide();
		hideButtons(current);
		setProgress(current);

		// Next button click action
		btnnext.click(function(){
			if(current < widget.length){
				widget.show();
				widget.not(':eq('+(current++)+')').hide();
				setProgress(current);
			}
			hideButtons(current);
		})

		// Back button click action
		btnback.click(function(){
			if(current > 1){
				current = current - 2;
				btnnext.trigger('click');
			}
			hideButtons(current);
		})			
	});

	// Change progress bar action
	setProgress = function(currstep){
		var percent = parseFloat(100 / widget.length) * currstep;
		percent = percent.toFixed();
		$(".progress-bar").css("width",percent+"%").html(percent+"%");		
	}

	// Hide buttons according to the current step
	hideButtons = function(current){
		var limit = parseInt(widget.length); 

		$(".action").hide();

		if(current < limit) btnnext.show();
		if(current > 1) btnback.show();
		if (current == limit) { btnnext.hide(); btnsubmit.show(); }
	}
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-19096935-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>

<script type="text/javascript">
      //<![CDATA[
        $(document).ready(function(){
          $('.combobox').combobox()
        });
      //]]>
    </script>

<script>


<script>
var counter = 1;
var limit = 3;
function addInput(divName){
     if (counter == limit)  {
          alert("You have reached the limit of adding " + counter + " inputs");
     }
     else {
          var newdiv = document.createElement('panel-body');
          newdiv.innerHTML = " <div class='step well'> <label class='text-center'>Nama Instruktur  " + (counter + 1) + " </label>  <br> <input type='text ' name='inst' id='tambah'  class='form-control' /> " +
           "<br/>  <label class='col-md-5 control-label'>Mempresentasi materi secara jelas ?</label>" +"  <label class='radio-inline'> <input type='radio' name='season19' id='seasonSummer' value='4' checked><span class=' class='fa fa-smile-o''></span> Sangat Puas </label>  " +
           "  <label class='radio-inline'> <input type='radio' name='season19' id='seasonWinter' value='3'> Puas </label>"  + "<label class='radio-inline'> <input type='radio' name='season19' id='seasonSpringFall' value='2' > Tidak Puas </label>" +" <label class='radio-inline'> <input type='radio' name='season19' id='seasonSpringFall' value='1' > Sangat Tidak Puas </label> </div>"

           
           +

            " <div class='form-group'><br/>  <label class='col-md-5 control-label'>Pengetahuan terhadap topik ? </label>" +"  <label class='radio-inline'> <input type='radio' name='season20' id='seasonSummer' value='4' checked><span class=' class='fa fa-smile-o''></span> Sangat Puas </label>  " +
           "  <label class='radio-inline'> <input type='radio' name='season20' id='seasonWinter' value='3'> Puas </label>"  + "<label class='radio-inline'> <input type='radio' name='season20' id='seasonSpringFall' value='2' > Tidak Puas </label>" +" <label class='radio-inline'> <input type='radio' name='season20' id='seasonSpringFall' value='1' > Sangat Tidak Puas </label> </div>"
           +
           
            "  <div class='form-group'> <label class='col-md-5 control-label'>Respon terhadap peserta ?</label>" +"  <label class='radio-inline'> <input type='radio' name='season21' id='seasonSummer' value='4' checked><span class=' class='fa fa-smile-o''></span> Sangat Puas </label>  " +
           "  <label class='radio-inline'> <input type='radio' name='season21' id='seasonWinter' value='3'> Puas </label>"  + "<label class='radio-inline'> <input type='radio' name='season21' id='seasonSpringFall' value='2' > Tidak Puas </label>" +" <label class='radio-inline'> <input type='radio' name='season21' id='seasonSpringFall' value='1' > Sangat Tidak Puas </label> </div>"

           +
            "  <div class='form-group'> <label class='col-md-5 control-label'>Apakah membawa suasana belajar yang baik ?</label>" +"  <label class='radio-inline'> <input type='radio' name='season22' id='seasonSummer' value='4' checked><span class=' class='fa fa-smile-o''></span> Sangat Puas </label>  " +
           "  <label class='radio-inline'> <input type='radio' name='season22' id='seasonWinter' value='3'> Puas </label>"  + "<label class='radio-inline'> <input type='radio' name='season22' id='seasonSpringFall' value='2' > Tidak Puas </label>" +" <label class='radio-inline'> <input type='radio' name='season22' id='seasonSpringFall' value='1' > Sangat Tidak Puas </label> </div>"
           +
           "---"
							   " </div>"
            ;
          document.getElementById(divName).appendChild(newdiv);
          counter++;
     }
}
</script>