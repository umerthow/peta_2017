<h3> MANAGE USER DATA </h3>



<div class="row">
	<div class="col-md-6">
    	<?php echo form_open('User/proses_edit_account') ?> 
        
          <input type="hidden" name="id" id="id" class="form-control" value="<?php echo $edit_user->id ?>"/>


        <div class="form-group">
        <label for="Nama">NAMA DEPAN</label>
        <input type="text" name="nama_depan" id="nama_depan" class="form-control" value="<?php echo $edit_user->nama_depan ?>"/>
        </div>
        
        <div class="form-group">
        <label for="jnama2">NAMA BELAKANG</label>
        <input type="text" name="nama_belakang" id="nama_belakang" class="form-control" value="<?php echo $edit_user->nama_belakang ?>"/>
        </div>
        
        <div class="form-group">
        <label for="username">USERNAME</label>
        <input type="text" name="username" id="username" class="form-control" value="<?php echo $edit_user->username ?>"/>
        </div>

        <div class="form-group">
        <label for="password">PASSWORD</label>
        <input type="text" name="password" id="password" class="form-control" value=""/>
        </div>
        
        <div class="form-group">
        <label for="photo">PHOTO</label>
        <input type="file" name="photo" id="photo" />
        </div>
        
        
        
        <div class="form-group">
         <input type="submit" name="tambah" id="tambah" value="update" class="btn btn-success" />
         <a href="<?php echo site_url('provider/profil')?>"> <button class="btn btn-default " type="button"  aria-haspopup="true" aria-expanded="false">cancel</button> </a>        </div>
        
    	<?php echo form_close() ?> 
    </div>
</div>