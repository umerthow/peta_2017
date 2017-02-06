
								    	

								    	

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
          newdiv.innerHTML = "<div class='form-group me'><div class='input-group'><div class='input-group-addon'><i class='glyphicon glyphicon-record'></i></div><input type='text' name='attitude[]"+(counter + 1)+ " ' class='form-control' rows='5'  ><div class='input-group-addon'><button class='btn-danger btn-remove'>x</button></div></div></div>";
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
