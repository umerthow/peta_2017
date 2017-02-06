<h3 class="alert alert-info "> Tambah Buku </h3>

<?php if(validation_errors()) {?>
	
    <ul class="alert alert-danger">
     <?php echo validation_errors('<ul>','</ul>')?>
    </ul>
<?php
}
?>

<div class="row">
	<div class="col-md-6">
    	<?php echo form_open() ?> 
        
        <div class="form-group">
        <label for="kategori">KATEGORI</label>
       	<select name="kategori" class="form-control">
        	<?php foreach($kategori as $result) {?> 
        	<option value="<?php echo $result->kategori_id ?>" > <?php echo $result->nama_kategori ?></option> 
        <?php } ?>
		</select>
       
        </div>
        
        <div class="form-group">
        <label for="kode">KODE</label>
        <input type="text" name="kode" id="kode" class="form-control"/>
        </div>
        
        <div class="form-group">
        <label for="judul">JUDUL BUKU</label>
        <input type="text" name="judul" id="judul" class="form-control"/>
        </div>
        
        <div class="form-group">
        <label for="penerbit">PENERBIT</label>
        <input type="text" name="penerbit" id="penerbit" class="form-control"/>
        </div>
        
        <div class="form-group">
        <label for="cover">COVER</label>
        <input type="file" name="cover" id="cover" />
        </div>
        
        <div class="form-group">
        <label for="jumlah">JUMLAH</label>
        <input type="text" name="jumlah" id="jumlah"  class="form-control" />
        </div>
        
        <div class="form-group">
         <input type="submit" name="tambah" id="tambah" value="submit" class="btn btn-success" />
        </div>
        
    	<?php echo form_close() ?> 
    </div>
</div>