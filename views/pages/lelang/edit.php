 <?php if($this->session->userdata('error')) {?>
  
    <ul class="alert alert-danger">
       
       <strong>Error!!  </strong><?php echo $this->session->userdata('error') <> '' ? $this->session->userdata('error') : ''; ?>
        </ul>
    <?php
    }
    ?>

<?php echo form_open_multipart('Pelelangan/proses_edit_lelang') ?> 
 <div class="panel panel-default">
  <div class="panel-body">
  
  
 	<div class="col-md-6">
  		 <div class="form-group">
        <label for="kode">Judul Pelatihan</label>
          <input type="hidden" name="id_lelang" id="nama" class="form-control" value="<?php echo  $edit_pelelangan->id_lelang ?>" required/>
        <input type="text" name="judul_course" id="nama" class="form-control" value="<?php echo  $edit_pelelangan->judul ?>" required/>
        </div>

         <div class="form-group">
        <label for="kategori">BIDANG </label>
        <select name="kategori" class="form-control">
            <?php foreach($kategori as $result) {?> 
            <?php if ($result->id_kategori == $edit_pelelangan->id_kategori) {

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
        <label for="kode">Deskripsi Pelatihan</label>
        <textarea name="deskripsi" id="InputMessage" class="form-control" rows="5"  data-toggle="tooltip" data-placement="right" title="Keterangan"><?php echo $edit_pelelangan->deskripsi ?> </textarea>      
        </div>

        

         


          <div class="form-group">
         <label for="dtp_input2">Batas Akhir Downlaod TOR </label>
          <div class="form-group">
                <div class='input-group date' id='datetimepicker2'>
                    <input type='text' name="tanggal_tor" class="form-control" value="<?php echo  $edit_pelelangan->waktu_tor ?>" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
          </div>
           <div class="form-group">
         <label for="dtp_input2">Tanggal Anwidjing</label>

         <div class="form-group">
                <div class='input-group date' id='datetimepicker1'>
                    <input type='text' name="tanggal_aanj" class="form-control" value="<?php echo  $edit_pelelangan->waktu_aanwijzing ?>" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
                s/d
                <div class='input-group date' id='datetimepicker3'>
                    <input type='text' name="selesai_aanj" class="form-control" value="<?php echo  $edit_pelelangan->selesai_aanwijzing ?>" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
          </div>
          <div class="form-group">
        <label for="kode">Harga</label>
        <input type="number" name="harga" id="nama" class="form-control"  value="<?php echo  $edit_pelelangan->harga ?>" required/>s/d  <input type="number" name="harga_selesai" id="nama" class="form-control" value="<?php echo  $edit_pelelangan->harga_selesai ?>" required/>
        </div>
          <div class="form-group">
        <label for="kode">BIAYA DOKUMEN LELANG</label>
        <input type="number" name="biaya_lelang" id="biaya" class="form-control" value="<?php echo $edit_pelelangan->biaya_lelang ?>" required/> 
         </div>
        <div class="form-group">
        <label for="cover">DOKUMEN DESKRIPSI</label> <a href="<?php echo base_url()?>temp_file/<?php echo $edit_pelelangan->doc_deskripsi?>" class="btn btn-info btn-xs" target="_blank">lihat</a>
        <input type="file" name="doc_deskripsi" id="cover" />
        <p class="help-block"><small>*Document yang diizinkan max.300kb format (*jpg,*png,*pdf)</small> </p>
        </div>
 		 <div class="form-group">
        <label for="cover">DOKUMEN TOR / KAK</label> <a href="<?php echo base_url()?>temp_file/<?php echo $edit_pelelangan->doc_tor?>" class="btn btn-info btn-xs" target="_blank">lihat</a>
        <input type="file" name="torr" id="cover" />
        <p class="help-block"><small>*Document yang diizinkan max.300kb format (*jpg,*png,*pdf)</small> </p>
        </div>

         <div class="form-group">
         <label for="cover">STATUS</label>
        <select name="status" class="form-control">
          
         
        <?php 
                $selected='selected=""';
           ?>

             <option <?php echo $selected?> value="<?php echo $edit_pelelangan->status  ?>" > <?php if($edit_pelelangan->status == 1) {  ?>

             published </option>
              <option  value="0" > don't publish </option>
              <option  value="2" > Up Coming </option>

             <?php } else if($edit_pelelangan->status == 2){ ?>
             Up Coming</option> 
            
             <?php } else if($edit_pelelangan->status == 0){?>
             Don't Publish </option> 
               <?php }?>
              <option  value="1" > publish </option>
              <option  value="0" >  Dont Publish </option>
                <option  value="2" > Up Coming </option>

       
        </select>
        </div>
       
        <div class="form-group"> 
        <a href="<?php echo site_url('Pelelangan/list_lelang') ?>" class="btn btn-primary" value="Cancel">Cancel</a>
         <input type="submit" name="tambah" id="tambah" value="Update" class="btn btn-success" />

        </div>


        <?php echo form_close() ?> 
    	
    </div>
	</div>
</div>
</div>

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