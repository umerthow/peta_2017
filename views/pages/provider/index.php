

<?php 
$kode = $this->session->userdata('kd_user');

if(validation_errors()) {?>
	
    <ul class="alert alert-danger">
     <?php echo validation_errors('<ul>','</ul>')?>
    </ul>
<?php
}
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


    <?php if($this->session->userdata('berhasil')) {?>
  
    <ul class="alert alert-success">
       
        <span class="glyphicon glyphicon-ok"></span><?php echo $this->session->userdata('berhasil') <> '' ? $this->session->userdata('berhasil') : ''; ?>
        </ul>
    <?php
    }
    ?>

   








 <fieldset>

     <legend class="text-center header">Corporate Identity</legend>
     <center> <i class="glyphicon glyphicon-king"></i></center>
    	<?php echo form_open_multipart('provider/index') ?> 
        
        
        <div class="form-group">
        <label for="kode"></label>
        <input type="hidden" name="kode_user"  class="form-control" value="<?php echo $kode;  ?>" readonly/>
        </div>
             

        <div class="form-group">
        <label for="kode">NAMA PERUSAHAAN</label>
        <input type="text" name="nama_persh" id="nama" class="form-control" />
        </div>

        <div class="form-group">
        <label for="kode">PEMILIK</label>
        <input type="text" name="pemilik" id="pemilik" class="form-control"/>
        </div>

        <div class="form-group">
        <label for="kode">NO SIUP</label>
        <input type="text" name="no_siup" id="no_siup" class="form-control"/>
        </div>

        <div class="form-group">
        <label for="kode">NO NPWP</label>
        <input type="text" name="no_npwp" id="no_npwp" class="form-control"/>
        </div>


        
       <div class="form-group">
        <label for="InputMessage">Alamat</label>
        <textarea name="alamat" id="InputMessage" class="form-control" rows="5"  data-toggle="tooltip" data-placement="right" title="Isikan Alamat Lengkap Anda"></textarea>
        
       </div>
        
        <div class="form-group">
        <label for="kode">KOTA</label>
        <select name="kota" class="combobox form-control">
            <?php foreach( $kota as $result ) {?>
                <option value="">Select Nama Kota</option>
               <option value="<?php echo $result->nama_kabkota ?>" > <?php echo $result->nama_kabkota ?></option> 
            <?php } ?>
        </select>
        
        </div>

		<div class="form-group">
        <label for="jumlah">WEBSITE</label>
        <input type="text" name="website" id="telp"  class="form-control"   placeholder="http://" />
        </div>
		
		 
		
		 <div class="form-group">
        <label for="penerbit">EMAIL</label>
        <input type="text" name="email" id="email" class="form-control" placeholder="jane.doe@example.com"/>
        </div>
        
        <div class="form-group">
        <label for="jumlah">TELP</label>
        <input type="text" name="no_telp" id="telp"  class="form-control" placeholder="021-" />
        </div>

        <div class="form-group">
        <label for="cover">DOKUMEN SIUP</label>
        <input type="file" name="cover" id="cover" />
        <p class="help-block"><small>*Document yang diizinkan max.300kb format (*jpg,*png,*pdf)</small> </p>
        </div>
        
        <div class="form-group">
        <label for="cover">DOKUMEN NPWP</label>
        <input type="file" name="poster" id="poster" />
        </div>

        <div class="form-group">
        <label for="InputMessage">Keterangan</label>
        <textarea name="keterangan" id="InputMessage" class="form-control" rows="5"  data-toggle="tooltip" data-placement="right" title="Keterangan"></textarea>
        
       </div>
        
		 </fieldset>
		
        <div class="form-group">
         <input type="submit" name="tambah" id="tambah" value="submit" class="btn btn-success" />
        </div>
        
    	<?php echo form_close() ?> 
    </div>
	
	 
        
        <div class="col-xs-6 col-md-4">
          <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><strong></strong></h3>
            <strong>NOTE</strong>
                </div>
                <div class="panel-body">
                
                    


                
                <p > <?php echo $this->session->userdata('hello') <> '' ? $this->session->userdata('hello') : ''; ?> </p>
                 
            </div>
        </div>
   




        <ul class="list-group">
        
        </ul>
       
        <?php 
        if(!empty($provider)) {
        foreach($provider as $result) { ?>
        
                
               
        
        <?php }?>
    </div>

</div>
<br/>

        <div class="row" style="margin-bottom: 10px">
           
           <h3 style="margin-top:0px">List Provider <small><?php echo $this->session->userdata('kd_user');  ?></small> </h3>
                <table class="table table-bordered" style="margin-bottom: 10px" data-show-toggle="true">
                    <tr>
                <th>No</th>
        
            <th> Nama Provider</th>
            <th>Pemilik</th>
            <th>No SIUP</th>
            
            <th>Kota</th>
            <th>Website</th>
            <th>Email</th>
            <th>Telepon</th>
            <th colspan="3">Action</th>
        
            </tr>
                <?php $no=1;?>
                <?php foreach($provider as $result) {?>
            <tr>
                <td> <?php echo $no++?></td>
                <td><?php echo $result->nama_provider ?></td>
                <td><?php echo $result->pemilik ?></td>
                
               
                <td><?php echo $result->no_siup ?></td>
                 <td><?php echo $result->kota ?></td>
                 <td><?php echo $result->website ?></td>
                  <td><?php echo $result->email ?></td>
                 <td><?php echo $result->telepon ?></td>

    <td><a href="<?php echo site_url('provider/edit/'.$result->id_provider)?>"> <p  data-placement="top" title="Edit"><span class="glyphicon glyphicon-pencil"></a></span></p></td>
    <td><a href="<?php echo site_url('provider/delete/'.$result->id_provider)?>" data-toggle="modal" data-target="#confirm-delete"><p data-placement="top"  title="Delete"><span class="glyphicon glyphicon-trash"></a></span></p></td>
    <td><a href="<?php echo site_url('provider/tambah/'.$result->id_provider)?>"> <p  data-placement="top" title="Edit"><span class="glyphicon glyphicon-plus"></a></span></p></td>
           
            </tr>
             <?php }?>
    <?php } ?>
                </table>
            

        </div>















    

    
</div>


   <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a href="<?php echo site_url('provider/delete/'.$result->id_provider)?>"class="btn btn-danger btn-ok">Delete</a>
            </div>
        </div>

        
<script type="text/javascript">
      $('#confirm-delete').on('show.bs.modal', function(e) {
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        });
      
  </script>
<script type="text/javascript">
      //<![CDATA[
        $(document).ready(function(){
          $('.combobox').combobox()
        });
      //]]>
    </script>