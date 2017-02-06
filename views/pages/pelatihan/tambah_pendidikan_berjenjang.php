<?php 
$kode = $this->session->userdata('kd_user');
?>


<?php if(validation_errors()) {?>
    
    <ul class="alert alert-danger">
     <?php echo validation_errors('<ul>','</ul>')?>
    </ul>
<?php
}
?>

<?php 


?>
<h3 class="breadcrumb"> Tambah Pendidikan Berjenjang <small>Isi dengan lengkap</small></h3>
<div class="col-md-6">

        <?php echo form_open_multipart('provider/proses_tambah_pb') ?> 
        
        
        <div class="form-group">
       
        <input type="hidden" name="kode_user"  class="form-control"  value=" <?php echo  $provider->id_provider ?> "readonly/>
        </div>
             

        <div class="form-group">
        <label for="kode">JUDUL PENDIDIKAN BERJENJANG  (*)</label>
        <input type="text" name="judul" id="nama" class="form-control" title="Isikan Judul Pelatihan Anda" required />
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
        <input type="text" name="tujuan" id="no_siup" class="form-control"/>
        </div>

       

        <div class="form-group">
         <label for="dtp_input2">Rencana Tanggal </label>
         <div class="input-group date form_date form_date col-md-6 " data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                    <input class="form-control" size="16"  name="tanggal" type="text" readonly >
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
         </div>
         <input type="hidden" id="dtp_input2" value="" /><br/>
         </div> 

         <div class="form-group">
         <label for="dtp_input2">Tanggal Selesai </label>
         <div class="input-group date form_date form_date col-md-6 " data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                    <input class="form-control" size="16"  name="tanggal_out" type="text" readonly >
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
         </div>
         <input type="hidden" id="dtp_input2" value="" /><br/>
         </div> 
          
         <div class="form-group">
        <label for="kode">Kota</label>
        <select name="kota" class="combobox form-control">
            <?php foreach( $kota as $result ) {?>
                <option value="">Select Nama Kota</option>
               <option value="<?php echo $result->nama_kabkota ?>" > <?php echo $result->nama_kabkota ?></option> 
            <?php } ?>
        </select>
        
        </div>

        <div class="form-group">
        <label for="InputMessage">Rencana Lokasi Training</label>
        <textarea name="lokasi" id="InputMessage" class="form-control" rows="5"  data-toggle="tooltip" data-placement="right" title="Isikan Alamat Lengkap Anda"></textarea>
        
       </div>
        
        <div class="form-group">
        <label for="penerbit">Contact Person Name</label>
        <input type="text" name="cp" id="penerbit" class="form-control"/>
        </div>


        <div class="form-group">
        <label for="penerbit">Telp / HP</label>
        <input type="text" name="telp_cp" id="penerbit" class="form-control"/>
        </div>

       

        

        <div class="form-group">
        <label for="biaya"> Biaya Pelatihan </label>
        <input type="text" name="biaya" id="biaya" class="form-control"/>
        </div>


        <div class="form-group">
        <label for="cover">BROSUR</label>
        <input type="file" name="brosur" id="cover_brosur" required="MOhon disi" title="Tambahkan brosur pelatihan"/>
        <p class="help-block"><small>*Document yang diizinkan max.300kb format (*jpg,*png,*pdf)</small> </p>
        </div>
       
        
        
        <div class="form-group">
        <button type="submit" class="btn btn-primary pull-right">
          <i class="glyphicon glyphicon-forward"></i> NEXT
        </button>
        
        </div>

        

        <?php echo form_close() ?> 
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

