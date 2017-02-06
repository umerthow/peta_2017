 <div class="col-sm-9">
 	
<br/>


   <?php if($this->session->userdata('message')) {?>
  
    <ul class="alert alert-info">
       <span class="glyphicon glyphicon-ok"></span> <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
        
        </ul>

    


    <?php
    }
    ?>


    <div class="panel panel-default">
	  <div class="panel-heading"><strong>Selesai</strong> <!-- <a href="<?php echo site_url('panel_user/conver_pdf');?> "target="_blank" data-popup="true" class="btn btn-danger-sm ">   <span class="glyphicon glyphicon-download"></span> Cetak Formulir.</a>
	  	<a href="<?php echo site_url('panel_user/setemail')?>" class="btn btn-danger-sm ">   <span class="glyphicon glyphicon-envelope"></span> Kirim Email.</a> -->

	  </div>
		  <div class="panel-body">
		   <p class="text-justify"> Terima kasih, <br/> <br/> Sdr. <strong><?php echo $this->session->userdata('Nama_pegawai') ?></strong> untuk mendaftar dengan <a>PeTA - infotraining.perumnas.co.id</a>. Form konfirmasi pelatihan Anda telah dikirim ke <b>email  Atasan </b> Anda <u>"<?php echo $this->session->userdata('email_atasan') ?>"</u>. 
		   Segera  mem <i>follow up </i> Atasan  untuk mengecek di  inbox / spam folder untuk melakukan konfirmasi usulan pelatihan. Anda juga dapat memonitor status pelatihan Anda di Menu  <b>Service</b> -  <b>Pelatihanku</b> diatas. </p>
		 
		   


		    <p class="text-justify"> </p>
		    
		  
		        <br/>
		  
		    <p class="text-justify">Dept Diklat akan segera memproses dan memverifikasi usulan Anda  dalam waktu 2 x 24 Jam setelah Form Evaluasi dikonfirmasi oleh Atasan Anda. </p>
		    <br/>
		    <br/>
		    <h4>Having trouble with registration your training ?</h4>
			<p>Please contact&nbsp;<a href="infotraining.perumnas.co.id">Online Customer Support &nbsp; <span class="glyphicon glyphicon-earphone"></span> 021-8194807 ext.615</a>.</p>
		  	<!-- <p> <?php echo $this->session->userdata('judul_course') ?> </p> -->
		  	<p class="help-block text-right"><small>
		  		Thank's<br/>Divisi PSDM Kantor Pusat Perum Perumnas</small></p>
		  	<!-- 	<?php echo $this->session->userdata('NIP'); ?> -->
		  </div>
		
	</div>



 </div>

