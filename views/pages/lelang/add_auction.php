 <legend class="text-center header"></legend>
  <h3 class="breadcrumb"> Tambah Item lelangan <small>Isi dengan lengkap</small></h3>

        <?php if($this->session->userdata('message')) {?>
  
    <ul class="alert alert-success">
       <span class="glyphicon glyphicon-ok"></span> <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
        
        </ul>
    <?php
    }
    ?>
<?php if(validation_errors()) {?>
    
    <ul class="alert alert-danger">
     <?php echo validation_errors('<ul>','</ul>')?>
    </ul>
<?php
}
?>

  
 <?php echo form_open_multipart('Pelelangan/tambah') ?> 
<div class="panel panel-default">
  <div class="panel-body">
  
  
 	<div class="col-md-6">
  		 <div class="form-group">
        <label for="kode">Judul Pelatihan</label>
        <input type="text" name="judul_course" id="nama" class="form-control" required/>
        </div>

         <div class="form-group">
        <label for="kode">BIDANG</label>
        <select name="kategori" class="form-control">
            <?php foreach( $kategori as $result ) {?>
               <option value="<?php echo $result->id_kategori ?>" > <?php echo $result->nama_kategori ?></option> 
            <?php } ?>
        </select>
        
        </div>
        <div class="form-group">
        <label for="kode">Deskripsi Pelatihan</label>
        <textarea name="deskripsi" id="InputMessage" class="form-control" rows="5"  data-toggle="tooltip" data-placement="right" title="Keterangan" required></textarea>      
        </div>

         

         


          <div class="form-group">
         <label for="dtp_input2">Batas Akhir Downlaod TOR </label>
          <div class="form-group">
                <div class='input-group date' id='datetimepicker2'>
                    <input type='text' name="tanggal_tor" class="form-control" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
          </div>
          <div class="form-group">
         <label for="dtp_input2">Tanggal Aanwijzing</label>

         <div class="form-group">
                <div class='input-group date' id='datetimepicker1'>
                    <input type='text' name="tanggal_aanj" class="form-control" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
                s/d
                <div class='input-group date' id='datetimepicker3'>
                    <input type='text' name="selesai_aanj" class="form-control" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div> 

          </div>
          <hr/>
        <div class="form-group">
        <label for="kode">Harga</label>
        <input type="number" name="harga" id="nama" class="form-control" required/> s/d  <input type="number" name="harga_selesai" id="nama" class="form-control" required/>
        </div>
         <div class="form-group">
           <label for="kode">Kategori</label>
             <select class="form-control" id="model">
              <option value="500000">Harga < 100 Juta </option>
              <option value="750000">100 Juta < Harga < 500 Juta</option>
              <option value="1000000">500 Juta < Harga < 1 Milyar</option> 
            </select>
            </div>
        <div class="form-group">
        <label for="kode">BIAYA DOKUMEN LELANG</label>
        <input type="number" name="biaya_lelang" id="biaya" class="form-control" required/> 
         </div>
        <div class="form-group">
        <label for="cover">DOKUMEN DESKRIPSI</label>
        <input type="file" name="doc_deskripsi" id="cover" />
        <p class="help-block"><small>*Document yang diizinkan max.300kb format (*jpg,*png,*pdf)</small> </p>
        </div>
 		 <div class="form-group">
        <label for="cover">DOKUMEN TORR</label>
        <input type="file" name="torr" id="cover" />
        <p class="help-block"><small>*Document yang diizinkan max.300kb format (*jpg,*png,*pdf)</small> </p>
        </div>
        <div class="form-group">
           <label for="kode">Status </label>
             <select class="form-control" name="status">
              <option value="1">Publish</option> 
              <option value="0">Close </option>
              <option value="2">Up Coming</option>
             
            </select>
            </div>
        <div class="form-group">
         <input type="submit" name="tambah" id="tambah" value="submit" class="btn btn-success" />
        </div>
         
    	<?php echo form_close() ?> 
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
            $(function () {
                $('#datetimepicker1').datetimepicker();
            });
</script>
<script type="text/javascript">
            $(function () {
                $('#datetimepicker2').datetimepicker();
            });
</script>
<script type="text/javascript">
            $(function () {
                $('#datetimepicker3').datetimepicker();
            });
</script>
<script type="text/javascript">
    
    var select = document.getElementById("model");
select.onchange = function(){
    var selectedString = select.options[select.selectedIndex].value;
   $('#biaya').val(selectedString);
}

</script>