<div class="row">
<h3 class="breadcrumb "> TAMBAH GROUP SMS <div class="btn-group pull-right" role="group" aria-label="...">
  <a href="<?php echo site_url('sms_gateway')?>" class="btn btn-primary">SINGLE SMS</a>
  <a href="<?php echo site_url('sms_gateway/smsblast')?>" class="btn btn-success">GROUP SMS</a>
</div> </h3>

<div class="col-md-12">
<?php echo form_open_multipart('Sms_gateway/uploadkontak')?>
<div class="form-group">
<label for="namagroup">NAMA GROUP</label>
<input type="text" name="groupname" class="form-control" id="namagroup" placeholder="masukkan nama group Anda" required="">
</div>
<div class="form-group">
<label for="kontak"> UPLOAD KONTAK </label>
<i class="fa fa-paperclip"></i> <small>excel</small> <input type="file" name="attachkontak" id="uploadFile" class="form-control" required="">
												</span>
</div>
<div class="form-group">
<button type="submit"  class="btn btn-danger btn-block"> <span class="glyphicon glyphicon-plus-sign"></span> BUAT GROUP</button>
</div>

<?php echo form_close() ?>
</div>

<div class="col-md-12">
	<br>
<u><h2 class="text-center">Format Excel untuk import kontak:</h2><br></u>
</div>
<div class="col-md-6"><h4>
<ol>
<br>
<li>Header sesuaikan dengan contoh di samping (tulisan "nama" dan "nomor" harus huruf kecil semua)</li><br>
<li>Penulisan nomor tidak masalah apakah diawali dengan 0, 8, 62, atau +62 karena akan kami filter menjadi nomor normal yang hasilnya bisa dilihat pada gambar di bawah</li>
</ol>
</h2></div>

<div class="col-md-6">
 <img src="<?php echo base_url() ?>assets/import1.png" alt="" class="text-center" />
</div>

<div class="col-md-12 text-center">
<br/>
 <span class="glyphicon glyphicon-chevron-down fa-3x" ></span>
</div>

<div class="col-md-12 text-center">
 <img src="<?php echo base_url() ?>assets/import2.png" alt="" class="text-center" />
</div>
</div>