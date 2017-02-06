 <h3><i class="glyphicon glyphicon-dashboard"></i> Dashboard Training</h3> 
<div class="row">
	
<div class="col-md-9">
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
	
	<div class="panel panel-default">
    <div class="panel-heading"><span class="glyphicon glyphicon-chevron-right"></span> Formulir Evaluasi Pelatihan [FRM-PSDM-04-01-06, Rev.0] </div>
	<?php echo form_open('Panel_user/tambah_survey')?>
    <div class="panel-body">	
    	
    							 <div class="form-group has-success">
						        <label for="kode">Judul Pelatihan Anda*</label>
						        <select name="course" class="combobox form-control " required >
						            <?php foreach( $course as $result ) {?>
						                <option value="">Cari Judul pelatihan </option>
						               <option value="<?php echo $result->id_course ?>" > <?php echo $result->judul_course ?> - <?php echo $result->nama_provider ?></option> 
						            <?php } ?>
						        </select>
						    </div>
						    <input type="hidden" name="NIP" value="<?php echo $edit_user->nip?>">
						      <input type="hidden" name="date_in" value="02-02-1991">
						        <div class="panel panel-danger">
						        <div class="panel-heading">Evaluasi Pembelajaran </div>
						        <div class="panel-body">
							    <div class="form-group">
							        <label class="col-md-5 control-label">Apakah pemahaman Anda mengenai topik hari ini meningkat?</label>
							        <div >
							            <label class="radio-inline"> <input type="radio" name="season1" id="seasonSummer" value="4" checked><span class=" class="fa fa-smile-o""></span> Sangat Puas </label>
							            <label class="radio-inline"> <input type="radio" name="season1" id="seasonWinter" value="3"> Puas </label>
							            <label class="radio-inline"> <input type="radio" name="season1" id="seasonSpringFall" value="2" > Tidak Puas </label>
							              <label class="radio-inline"> <input type="radio" name="season1" id="seasonSpringFall" value="1" > Sangat Tidak Puas </label>
							        </div>
							    </div>
							    <br/>
							     <div class="form-group">
							        <label class="col-md-5 control-label">Topik Hari ini bermanfaat dan aplikatif dalam pekerjaan ?</label>
							        <div >
							            <label class="radio-inline"> <input type="radio" name="season2" id="seasonSummer" value="4" checked><span class=" class="fa fa-smile-o""></span> Sangat Puas </label>
							            <label class="radio-inline"> <input type="radio" name="season2" id="seasonWinter" value="3"> Puas </label>
							            <label class="radio-inline"> <input type="radio" name="season2" id="seasonSpringFall" value="2" > Tidak Puas </label>
							             <label class="radio-inline"> <input type="radio" name="season2" id="seasonSpringFall" value="1" > Sangat Tidak Puas </label>
							        </div>
							    </div>
							     <br/>
							     <div class="form-group">
							        <label class="col-md-5 control-label">Bagaimana menurut Anda mengenai program keseluruhan pada hari ini ?</label>
							        <div >
							            <label class="radio-inline"> <input type="radio" name="season3" id="seasonSummer" value="4" checked><span class=" class="fa fa-smile-o""></span> Sangat Puas </label>
							            <label class="radio-inline"> <input type="radio" name="season3" id="seasonWinter" value="3"> Puas </label>
							            <label class="radio-inline"> <input type="radio" name="season3" id="seasonSpringFall" value="2" > Tidak Puas </label>
							              <label class="radio-inline"> <input type="radio" name="season3" id="seasonSpringFall" value="1" > Sangat Tidak Puas </label>
							        </div>
							    </div>












							    </div>
							</div>





							<!---done-->



								 <div class="panel panel-danger">
						        <div class="panel-heading">Evaluasi Materi </div>
						        <div class="panel-body">
							    <div class="form-group">
							        <label class="col-md-5 control-label">Materi/Slide presentasi?</label>
							        <div >
							            <label class="radio-inline"> <input type="radio" name="season4" id="seasonSummer" value="4" checked><span class=" class="fa fa-smile-o""></span> Sangat Puas </label>
							            <label class="radio-inline"> <input type="radio" name="season4" id="seasonWinter" value="3"> Puas </label>
							            <label class="radio-inline"> <input type="radio" name="season4" id="seasonSpringFall" value="2" > Tidak Puas </label>
							              <label class="radio-inline"> <input type="radio" name="season4" id="seasonSpringFall" value="1" > Sangat Tidak Puas </label>
							        </div>
							    </div>
							    <br/>
							     <div class="form-group">
							        <label class="col-md-5 control-label">Tingkat Teori ?</label>
							        <div >
							            <label class="radio-inline"> <input type="radio" name="season5" id="seasonSummer" value="4" checked><span class=" class="fa fa-smile-o""></span> Sangat Puas </label>
							            <label class="radio-inline"> <input type="radio" name="season5" id="seasonWinter" value="3"> Puas </label>
							            <label class="radio-inline"> <input type="radio" name="season5" id="seasonSpringFall" value="2" > Tidak Puas </label>
							             <label class="radio-inline"> <input type="radio" name="season5" id="seasonSpringFall" value="1" > Sangat Tidak Puas </label>
							        </div>
							    </div>
							     <br/>
							     <div class="form-group">
							        <label class="col-md-5 control-label">Struktur dan Isi Materi ?</label>
							        <div >
							            <label class="radio-inline"> <input type="radio" name="season6" id="seasonSummer" value="4" checked><span class=" class="fa fa-smile-o""></span> Sangat Puas </label>
							            <label class="radio-inline"> <input type="radio" name="season6" id="seasonWinter" value="3"> Puas </label>
							            <label class="radio-inline"> <input type="radio" name="season6" id="seasonSpringFall" value="2" > Tidak Puas </label>
							              <label class="radio-inline"> <input type="radio" name="season6" id="seasonSpringFall" value="1" > Sangat Tidak Puas </label>
							        </div>
							    </div>
							    <br/>
							     <div class="form-group">
							        <label class="col-md-5 control-label">Efektifias Kegiatan Lapangan ?</label>
							        <div >
							            <label class="radio-inline"> <input type="radio" name="season7" id="seasonSummer" value="4" checked><span class=" class="fa fa-smile-o""></span> Sangat Puas </label>
							            <label class="radio-inline"> <input type="radio" name="season7" id="seasonWinter" value="3"> Puas </label>
							            <label class="radio-inline"> <input type="radio" name="season7" id="seasonSpringFall" value="2" > Tidak Puas </label>
							              <label class="radio-inline"> <input type="radio" name="season7" id="seasonSpringFall" value="1" > Sangat Tidak Puas </label>
							        </div>
							    </div>

 								<br/>
							     <div class="form-group">
							        <label class="col-md-5 control-label">Studi Kasus (Bila Ada) ?</label>
							        <div >
							            <label class="radio-inline"> <input type="radio" name="season8" id="seasonSummer" value="4" checked><span class=" class="fa fa-smile-o""></span> Sangat Puas </label>
							            <label class="radio-inline"> <input type="radio" name="season8" id="seasonWinter" value="3"> Puas </label>
							            <label class="radio-inline"> <input type="radio" name="season8" id="seasonSpringFall" value="2" > Tidak Puas </label>
							              <label class="radio-inline"> <input type="radio" name="season8" id="seasonSpringFall" value="1" > Sangat Tidak Puas </label>
							        </div>
							    </div>

							    <br/>
							     <div class="form-group">
							        <label class="col-md-5 control-label">Penjadwalan sesi/waktu ?</label>
							        <div >
							            <label class="radio-inline"> <input type="radio" name="season9" id="seasonSummer" value="4" checked><span class=" class="fa fa-smile-o""></span> Sangat Puas </label>
							            <label class="radio-inline"> <input type="radio" name="season9" id="seasonWinter" value="3"> Puas </label>
							            <label class="radio-inline"> <input type="radio" name="season9" id="seasonSpringFall" value="2" > Tidak Puas </label>
							              <label class="radio-inline"> <input type="radio" name="season9" id="seasonSpringFall" value="1" > Sangat Tidak Puas </label>
							        </div>
							    </div>


							    </div>
							</div>



							<!---done-->


							<div class="panel panel-danger" >
						        <div class="panel-heading">Evaluasi Pengajar <input class="btn btn-success" type="button" value="Tambah"  onClick="addInput('dynamicInput');"> </div>
						        <div class="panel-body" id="dynamicInput" >
						        	<div class="form-group">
						        	 <Label class="text"> Nama Instruktur 1</label>
							    <input type="text" class="form-control" name="123">
							</div>
							    <div class="form-group">
							        <label class="col-md-5 control-label">Mempresentasi materi secara jelas ?</label>
							        <div >
							        	 
							            <label class="radio-inline"> <input type="radio" name="season10" id="seasonSummer" value="4" checked><span class=" class="fa fa-smile-o""></span> Sangat Puas </label>
							            <label class="radio-inline"> <input type="radio" name="season10" id="seasonWinter" value="3"> Puas </label>
							            <label class="radio-inline"> <input type="radio" name="season10" id="seasonSpringFall" value="2" > Tidak Puas </label>
							              <label class="radio-inline"> <input type="radio" name="season10" id="seasonSpringFall" value="1" > Sangat Tidak Puas </label>
							        </div>
							    </div>
							    <br/>
							     <div class="form-group">
							        <label class="col-md-5 control-label">Pengetahuan terhadap topik ?</label>
							        <div >
							            <label class="radio-inline"> <input type="radio" name="season11" id="seasonSummer" value="4" checked><span class=" class="fa fa-smile-o""></span> Sangat Puas </label>
							            <label class="radio-inline"> <input type="radio" name="season11" id="seasonWinter" value="3"> Puas </label>
							            <label class="radio-inline"> <input type="radio" name="season11" id="seasonSpringFall" value="2" > Tidak Puas </label>
							             <label class="radio-inline"> <input type="radio" name="season11" id="seasonSpringFall" value="1" > Sangat Tidak Puas </label>
							        </div>
							    </div>
							     <br/>
							     <div class="form-group">
							        <label class="col-md-5 control-label">Respon terhadap peserta ?</label>
							        <div >
							            <label class="radio-inline"> <input type="radio" name="season12" id="seasonSummer" value="4" checked><span class=" class="fa fa-smile-o""></span> Sangat Puas </label>
							            <label class="radio-inline"> <input type="radio" name="season12" id="seasonWinter" value="3"> Puas </label>
							            <label class="radio-inline"> <input type="radio" name="season12" id="seasonSpringFall" value="2" > Tidak Puas </label>
							              <label class="radio-inline"> <input type="radio" name="season12" id="seasonSpringFall" value="1" > Sangat Tidak Puas </label>
							        </div>
							    </div>

							     <br/>
							     <div class="form-group">
							        <label class="col-md-5 control-label">Apakah membawa suasana belajar yang baik ?</label>
							        <div >
							            <label class="radio-inline"> <input type="radio" name="season13" id="seasonSummer" value="4" checked><span class=" class="fa fa-smile-o""></span> Sangat Puas </label>
							            <label class="radio-inline"> <input type="radio" name="season13" id="seasonWinter" value="3"> Puas </label>
							            <label class="radio-inline"> <input type="radio" name="season13" id="seasonSpringFall" value="2" > Tidak Puas </label>
							              <label class="radio-inline"> <input type="radio" name="season13" id="seasonSpringFall" value="1" > Sangat Tidak Puas </label>
							        </div>
							    </div>
							   ---
							    </div>

							</div>
							
							 <hr/>


<!---done-->


								<div class="panel panel-danger">
						        <div class="panel-heading">Akomodasi </div>
						        <div class="panel-body">
							    <div class="form-group">
							        <label class="col-md-5 control-label">Peralatan Presentasi ?</label>
							        <div >
							            <label class="radio-inline"> <input type="radio" name="season14" id="seasonSummer" value="4" checked><span class=" class="fa fa-smile-o""></span> Sangat Puas </label>
							            <label class="radio-inline"> <input type="radio" name="season14" id="seasonWinter" value="3"> Puas </label>
							            <label class="radio-inline"> <input type="radio" name="season14" id="seasonSpringFall" value="2" > Tidak Puas </label>
							              <label class="radio-inline"> <input type="radio" name="season14" id="seasonSpringFall" value="1" > Sangat Tidak Puas </label>
							        </div>
							    </div>
							    <br/>
							     <div class="form-group">
							        <label class="col-md-5 control-label">Paket & peralatan pelatihan ?</label>
							        <div >
							            <label class="radio-inline"> <input type="radio" name="season15" id="seasonSummer" value="4" checked><span class=" class="fa fa-smile-o""></span> Sangat Puas </label>
							            <label class="radio-inline"> <input type="radio" name="season15" id="seasonWinter" value="3"> Puas </label>
							            <label class="radio-inline"> <input type="radio" name="season15" id="seasonSpringFall" value="2" > Tidak Puas </label>
							             <label class="radio-inline"> <input type="radio" name="season15" id="seasonSpringFall" value="1" > Sangat Tidak Puas </label>
							        </div>
							    </div>
							     <br/>
							     <div class="form-group">
							        <label class="col-md-5 control-label">Penginapan (Bila Ada) ? </label>
							        <div >
							            <label class="radio-inline"> <input type="radio" name="season16" id="seasonSummer" value="4" checked><span class=" class="fa fa-smile-o""></span> Sangat Puas </label>
							            <label class="radio-inline"> <input type="radio" name="season16" id="seasonWinter" value="3"> Puas </label>
							            <label class="radio-inline"> <input type="radio" name="season16" id="seasonSpringFall" value="2" > Tidak Puas </label>
							              <label class="radio-inline"> <input type="radio" name="season16" id="seasonSpringFall" value="1" > Sangat Tidak Puas </label>
							        </div>
							    </div>

							     <br/>
							     <div class="form-group">
							        <label class="col-md-5 control-label">Kualitas Makanan (Bila Ada) ?</label>
							        <div >
							            <label class="radio-inline"> <input type="radio" name="season17" id="seasonSummer" value="4" checked><span class=" class="fa fa-smile-o""></span> Sangat Puas </label>
							            <label class="radio-inline"> <input type="radio" name="season17" id="seasonWinter" value="3"> Puas </label>
							            <label class="radio-inline"> <input type="radio" name="season17" id="seasonSpringFall" value="2" > Tidak Puas </label>
							              <label class="radio-inline"> <input type="radio" name="season17" id="seasonSpringFall" value="1" > Sangat Tidak Puas </label>
							        </div>
							    </div>

							    </div>
							</div>




								<div class="form-group">
							  <div "col-md-5">
							        <label class="control-label">Komentar perbaikan untuk pelatihan berikutnya : </label>
							         </div>
							            <textarea class="form-control" rows="5" name="season18" placeholder="Tulis Komentar Anda.."></textarea>
							       
							    </div>

							    <div class="form-group">
							     <div class="form-group pull-right">
						         <input type="submit" name="update" id="tambah" value="Submit" class="btn btn-success" />
						 
						          <a href="<?php echo site_url('panel_user') ?>" class="btn btn-default"> Cancel </a>
						        </div>
						     





    
 </div>





</div>

 <?php echo form_close()?>


<script type="text/javascript">
      //<![CDATA[
        $(document).ready(function(){
          $('.combobox').combobox()
        });
      //]]>
    </script>

<script>
var counter = 1;
var limit = 3;
function addInput(divName){
     if (counter == limit)  {
          alert("You have reached the limit of adding " + counter + " inputs");
     }
     else {
          var newdiv = document.createElement('panel-body');
          newdiv.innerHTML = " <div> <label class='text-center'>Nama Instruktur  " + (counter + 1) + " </label>  <br> <input type='text ' name='inst' id='tambah'  class='form-control' /> " +
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