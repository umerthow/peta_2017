										

								    	

								    	<div class="form-group">
								        <label for="kode">JUDUL PELATIHAN*  </label>
								        <input type="text" name="judul"  class="form-control" placeholder="Judul pelatihan yang Anda inginkan" required />
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
								        <div class="form-group col-md-4">
								        <label for="jumlah">LOKASI TRAINING</label>
								        <input type="text" name="lokasi" id="telp"  class="form-control" placeholder="ex.Wisma Perumnas Lantai 7" />
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
								       			