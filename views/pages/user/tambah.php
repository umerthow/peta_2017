<h3> MANAGE USER DATA </h3>

<?php if(validation_errors()) {?>
	
    <ul class="alert alert-danger">
     <?php echo validation_errors('<ul>','</ul>')?>
    </ul>
<?php
}
?>

<div class="row">
	<div class="col-md-6">
    	<?php echo form_open('user/tambah') ?> 
        <?php
        $pass = random_string('alnum', 5);
        ?>        
                
        <div class="form-group">
        <label for="Nama">NAMA DEPAN</label>
        <input type="text" name="nama_depan" id="nama_depan" class="form-control"/>
        </div>
        
        <div class="form-group">
        <label for="jnama2">NAMA BELAKANG</label>
        <input type="text" name="nama_belakang" id="nama_belakang" class="form-control"/>
        </div>
        
        <div class="form-group">
        <label for="username">USERNAME</label>
        <input type="text" name="username" id="username" class="form-control"/>
        </div>

        <div class="form-group">
        <label for="password">PASSWORD</label>
        <input type="text" name="password" id="password" class="form-control" value="<?php echo $pass ?>" readonly>
        </div>

         <div class="form-group">
        <label for="kode">LEVEL</label>
        <select name="level" class="form-control">
            
               <option value="admin" >admin </option> 
               <option value="user" >user </option> 
           
        </select>
        
        </div>
        
        <div class="form-group">
        <label for="photo">PHOTO</label>
        <input type="file" name="photo" id="photo" />
        </div>

        <div class="form-group">
        <label for="Nama">KODE USER</label>
        <input type="text" name="kd_user" id="kd_user" class="form-control"  value="<?php echo $sku?>" readonly/>
        </div>
        
        
        <div class="form-group">
         <input type="submit" name="tambah" id="tambah" value="submit" class="btn btn-success" />
         <a href="<?php echo site_url('dashboard') ?>" class="btn btn-default" role="button">cancel</a>
         
        </div>
        
    	<?php echo form_close() ?> 
    </div>
</div>