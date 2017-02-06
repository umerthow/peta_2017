<h3 class="breadcrumb"> Selesai Daftar </h3>
<div class="row">
<div class="breadcrumb">
  <?php if($this->session->userdata('message')) {?>
  
    <ul class="alert alert-success">
       <span class="glyphicon glyphicon-ok"></span> <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
        
        </ul>
    <?php
    }
    ?>


    <div class="panel panel-default">
	  <div class="panel-heading"><strong>Selesai</strong> <a href="<?php echo site_url('dashboard') ?>" class="btn btn-danger-sm " onclick="showDiv();">   <span class="glyphicon glyphicon-dashboard"></span> Kembali ke Dashboard.</a>
	  	


	  	<div id="welcomeDiv"  style="display:none;" class="answer_list" ><a href="" class="btn btn-danger-sm ">   <span class="glyphicon glyphicon-envelope"></span> </a> </div>

	  </div>
		  <div class="panel-body">
		   <p class="text-justify"> Terima kasih  <strong><?php echo $this->session->userdata('nama_depan') ?></strong> . Pendaftaraan Keikutsertaan Lelang telah sukses. 

		    <p class="text-justify"> </p>
		    <p class="text-justify">Dept Diklat akan segera memproses dan memverifikasi berkas Anda  dalam waktu <b> 2 x 24 jam </b> kerja setelah bukti diterima. </p> <p class="text-danger"> Pastikan email yang anda daftarkan di profil provider <b/>aktif! </b></p>

		    <br/>
		    <br/>
		    <h4>Having trouble with registration your training ?</h4>
			<p>Please contact&nbsp;<a href="infotraining.perumnas.co.id">Online Customer Support &nbsp; <span class="glyphicon glyphicon-earphone"></span> 021-8194807 ext.615</a> or email : <a href="mailto:dept.diklat@perumnas.co.id">dept.diklat@perumnas.co.id</a>.</p>
		  	<p> <?php echo $this->session->userdata('judul_course') ?> </p>
		  	<p class="help-block text-right"><small>
		  		Thank's<br/>Divisi PSDM Kantor Pusat Perum Perumnas</small></p>

		  		
		  </div>
		
	</div>
   </div>
  </div>