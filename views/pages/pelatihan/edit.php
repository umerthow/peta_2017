<div class="row">
<h3 class="breadcrumb"> Edit Pelatihan  </h3>

    <div class="col-md-6">
     <?php echo form_open_multipart('provider/proses_edit_pelatihan') ?>
       


        
        <input type="hidden" name="kode_user"  class="form-control" value="<?php echo $edit_pelatihan->id_course  ?>" readonly/>
        


    
       <!--  <label for="kode">ID PROVIDER </label> -->
        <input type="hidden" name="id_provider"  class="form-control" value="<?php echo $edit_pelatihan->id_provider  ?>" readonly/>
        <div class="form-group">
        <label for="kode">JUDUL PELATIHAN  </label>
        <input type="text" name="judul"  class="form-control" value="<?php echo $edit_pelatihan->judul_course  ?>" />
        </div>

         <div class="form-group">
        <label for="kategori">BIDANG </label>
        <select name="idkategori" class="form-control">
            <?php foreach($kategori as $result) {?> 
            <?php if ($result->id_kategori == $edit_pelatihan->id_kategori) {

                $selected='selected=""';
            } else {


                $selected='';
            }
        ?>

             <option <?php echo $selected?> value="<?php echo $result->id_kategori  ?>" > <?php echo $result->nama_kategori  ?></option> 
        <?php } ?>
        </select>
        </div>

           
          <div class="form-group">
        <label for="InputMessage">TUJUAN  PELATIHAN </label>
        <textarea name="tujuan" id="InputMessage" class="form-control" rows="5"  data-toggle="tooltip" data-placement="right" title="Isikan Tujuan Pelatihan Anda"><?php echo $edit_pelatihan->tujuan_pelatihan?></textarea>
        
       </div>

        <div class="form-group">
        <label for="cover">BROSUR</label>
        <input type="file" name="brosur" id="brosur" />
        <br/>
            <div class="col-md-3">
             
            <a href="#" class="thumbnail"> <img src="<?php echo  base_url()?>brosur/<?php echo $edit_pelatihan->gatel?>"  /> </a>
            </div>
        </div>

</div>
         <div class="col-md-6">

        <div class="form-group">
         <label for="dtp_input2">Tanggal Mulai </label>
         <div class="input-group date form_date form_date col-md-6 " data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                    <input class="form-control" size="16"  name="waktu_in" type="text" value="<?php echo $edit_pelatihan->waktu_in  ?>" >
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
         </div>
         <input type="hidden" id="dtp_input2" value="" /><br/>
         </div> 

         <div class="form-group">
         <label for="dtp_input2">Tanggal Selesai </label>
         <div class="input-group date form_date form_date col-md-6 " data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                    <input class="form-control" size="16"  name="waktu_out" type="text" value="<?php echo $edit_pelatihan->waktu_out  ?>" >
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
         </div>
         <input type="hidden" id="dtp_input2" value="" /><br/>
         </div> 

         <div class="form-group">
        <label for="kode">Kota</label>
        <select name="kota" class="form-control">
          
                
               <option value="<?php echo $edit_pelatihan->kota_course ?>" > <?php echo $edit_pelatihan->kota_course ?></option> 
               <?php foreach( $kota as $result ) {?>
                <option value="<?php echo $result->nama_kabkota ?>" > <?php echo $result->nama_kabkota ?></option> 
                <?php } ?>
        </select>
        
        </div>


      <div class="form-group">
        <label for="InputMessage">TEMPAT PELATIHAN </label>
        <input type="text" name="lokasi"  class="form-control" value="<?php  echo $edit_pelatihan->tempat_pelatihan  ?>" />
                
       </div>

       <div class="form-group">
        <label for="kode">Contact Person </label>
        <input type="text" name="cp"  class="form-control" value="<?php echo $edit_pelatihan->CP ?>" />
        </div>

        <div class="form-group">
        <label for="kode">TELP / HP </label>
        <input type="text" name="telp_cp"  class="form-control" value="<?php echo $edit_pelatihan->content  ?>" />
        </div>

       
         <div class="form-group">
        <label for="InputMessage">Rincian Training  </label>
        <ul>
        <div class="form-group">
         <label for="InputMessage"><h4><small>1</small></h4></label>
   
           <input type="text" name="rincian-skill"  class="form-control" value="<?php echo $edit_pelatihan->skill   ?>" />
        </div>

        <div class="form-group">
         <label for="InputMessage"><h4><small>2</small></h4></label>
      
         <input type="text" name="rincian-knowledge"  class="form-control" value="<?php echo $edit_pelatihan->knowledge   ?>" />
        </div>

         <div class="form-group">
          <label for="InputMessage"><h4><small>3</small></h4></label>
       
        <input type="text" name="rincian-attitude"  class="form-control" value="<?php echo $edit_pelatihan->attitude  ?>" />
        </div>
        <div class="form-group">
        <label for="kode">4 </label>
        <input type="text" name="attitude1"  class="form-control" value="<?php echo $edit_pelatihan->attitude1   ?>" />
        </div>
         <div class="form-group">
        <label for="kode">5 </label>
        <input type="text" name="attitude2"  class="form-control" value="<?php echo $edit_pelatihan->attitude2   ?>" />
        </div>
         <div class="form-group">
        <label for="kode">6 </label>
        <input type="text" name="attitude3"  class="form-control" value="<?php echo $edit_pelatihan->attitude3  ?>" />
        </div>
         <div class="form-group">
        <label for="kode">7 </label>
        <input type="text" name="attitude4"  class="form-control" value="<?php echo $edit_pelatihan->attitude4   ?>" />
        </div>
         <div class="form-group">
        <label for="kode">8 </label>
        <input type="text" name="attitude5"  class="form-control" value="<?php echo $edit_pelatihan->attitude5   ?>" />
        </div>
         <div class="form-group">
        <label for="kode">9 </label>
        <input type="text" name="attitude6"  class="form-control" value="<?php echo $edit_pelatihan->attitude6   ?>" />
        </div>
         <div class="form-group">
        <label for="kode">10 </label>
        <input type="text" name="attitude7"  class="form-control" value="<?php echo $edit_pelatihan->attitude7   ?>" />
        </div>
         </ul>
        </div>

         <div class="form-group">
        <label for="kode">Biaya Pelatihan </label>
        <input type="text" name="biaya"  class="form-control" value="<?php echo $edit_pelatihan->biaya_course ?>" />
        </div>























       
        <div class="form-group">
         <input type="submit" name="update" id="tambah" value="update" class="btn btn-warning" />
         <!-- <input type="submit" name="cancel" id="tambah" value="cancel" class="btn btn-default" /> -->
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