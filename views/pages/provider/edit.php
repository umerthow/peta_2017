<?php 
$kode = $this->session->userdata('kd_user');

?>
    </ul>
<?php

?>

<div class="row">

    <div class="col-md-6">
        <?php if($this->session->userdata('message')) {?>
  
    <ul class="alert alert-success">
       <span class="glyphicon glyphicon-ok"></span> <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
        </ul>
    <?php
    }
    ?>


    <h4 class="alert alert-info "> Identitas Perusahaan <small>Form</small></h4>
        <?php echo form_open_multipart('provider/proses_edit') ?>

        <div class="form-group">
       
        <input type="hidden" name="id_provider"  class="form-control" value="<?php echo $edit_user->id_provider?>" readonly/>
        </div>


        <div class="form-group">
        <label for="kode">ID PERUSAHAAN</label>
        <input type="text" name="kode_user"  class="form-control" value="<?php echo $kode  ?>" readonly/>
        </div>
             

        <div class="form-group">
        <label for="kode">NAMA PERUSAHAAN</label>
        <input type="text" name="nama_persh" id="nama" class="form-control" value="<?php echo $edit_user->nama_provider?>"/>
        </div>

        <div class="form-group">
        <label for="kode">PEMILIK</label>
        <input type="text" name="pemilik" id="pemilik" class="form-control" value="<?php echo $edit_user->pemilik?>"/>
        </div>

        <div class="form-group">
        <label for="kode">NO SIUP</label>
        <input type="text" name="no_siup" id="no_siup" class="form-control" value="<?php echo $edit_user->no_siup ?>"/>
        </div>

        <div class="form-group">
        <label for="kode">NO NPWP</label>
        <input type="text" name="no_npwp" id="no_npwp" class="form-control" value="<?php echo $edit_user->no_npwp?>"/>
        </div>


        
       <div class="form-group">
        <label for="InputMessage">Alamat</label>
        <textarea name="alamat" id="InputMessage" class="form-control" rows="5"  data-toggle="tooltip" data-placement="right" title="Isikan Alamat Lengkap Anda"><?php echo $edit_user->alamat?></textarea>
        
       </div>
        
        <div class="form-group">
        <label for="penerbit">KOTA</label>
        <input type="text" name="kota" id="penerbit" class="form-control" value="<?php echo $edit_user->kota?>"/>
        </div>

        <div class="form-group">
        <label for="jumlah">WEBSITE</label>
        <input type="text" name="website" id="telp"  class="form-control"   placeholder="http://" value="<?php echo $edit_user->website?>" />
        </div>
        
         
        
         <div class="form-group">
        <label for="penerbit">EMAIL</label>
        <input type="text" name="email" id="email" class="form-control" placeholder="jane.doe@example.com" value="<?php echo $edit_user->email?>"/>
        </div>
        
        <div class="form-group">
        <label for="jumlah">TELP</label>
        <input type="text" name="no_telp" id="telp"  class="form-control" placeholder="021-"  value="<?php echo $edit_user->telepon?>"/>
        </div>

        <div class="form-group">
        <label for="cover">DOKUMEN SIUP</label>
        <input type="file" name="cover" id="cover_siup" value="<?php echo $edit_user->doc_siup?>" />
        <p class="help-block"><small>*Document Perlu diupload ulang ketika update</small> </p>
        </div>
        
        
        <div class="form-group">
        <label for="cover">DOKUMEN NPWP</label>
        <input type="file" name="poster" id="cover" value="<?php echo $edit_user->doc_npwp?>" />
        </div>
        
        <?php if ($this->session->userdata('level') == 'admin') { ?>
         <div class="form-group">
              <label for="cover">RATE</label>
            <input id="input-21d" value="<?php echo $edit_user->rating ?>" type="number" class="rating" min=0 max=5 step=0.5 data-size="xs" >

            <select multiple class="form-control" name="rating">
                  <option value="<?php echo $edit_user->rating ?>"><?php echo $edit_user->rating ?></option>
                  <option value="0.5">0.5</option>
                  <option value="1">1</option>
                <option value="1">1</option>
                <option value="1.5">1.5</option>
                <option value="2">2</option>
                <option value="2.5">2.5</option>
                <option value="3">3</option>
                <option value="3.5">3.5</option>
                <option value="4">4</option>
                <option value="4.5">4.5</option>
                <option value="5">5</option>
                
                </select>
        </div>
          <?php } else { ?>



              <input  type="hidden" name="rating" value="<?php echo $edit_user->rating ?>">




        <?php  } ?>
        <div class="form-group">

         <input type="submit" name="update" id="tambah" value="update" class="btn btn-warning" />
         <a href="<?php echo site_url('provider') ?>" class="btn btn-default" role="button">Cancel</a>
        </div>


        
        <?php echo form_close() ?> 
    </div>
    
     <div class="col-md-6">.col-md-6</div>

</div>
<br/>

       
            

        </div>
<script type="text/javascript">
$('input:file').change(
    function(e){
        console.log(e.target.files[0].fileName);
    });
  </script>
  
  <script>
    jQuery(document).ready(function () {
        $("#input-21d").rating({
             starCaptions: function(val) {
                if (val < 3) {
                    return val;
                } else {
                    return 'high';
                }
            },
            starCaptionClasses: function(val) {
                if (val < 3) {
                    return 'label label-danger';
                } else {
                    return 'label label-success';
                }
            },
            hoverOnClear: false
        });



}

</script>