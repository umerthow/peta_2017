  <?php if($this->session->userdata('berhasil')) {?>
  
    <ul class="alert alert-success">
       <span class="glyphicon glyphicon-ok"></span> <?php echo $this->session->userdata('berhasil') <> '' ? $this->session->userdata('berhasil') : ''; ?>
        
        </ul>
    <?php
    }
    ?>

     <div class="panel panel-default">
       <div class="panel-body">
		   <p class="text-justify"> Selesai, <br/> <br/> 
		  </p>

		 		 <table class="table table-hover" caption"Hello">

                <thead class="success">
                <tr><td class="col-md-2">Nama Pegawai</td><td><strong> <?php echo $this->session->userdata('Nama_pegawai') ?></strong><td></tr>
                <tr><td>Unit Kerja</td><td> <?php echo $this->session->userdata('unit_kerja') ?></td></tr>
                 <tr><td>Provider Baru </td><td> <strong><?php echo $this->session->userdata('nama_provider') ?></strong></td></tr>
                <tr><td>Judul Pelatihan Baru</td><td> <strong><?php echo $this->session->userdata('judul_course') ?></strong></td></tr>
                 <tr><td>Email karyawan</td><td><?php echo $this->session->userdata('emailku') ?></td></tr>
              
                <tr><td>Kota</td><td><?php echo $this->session->userdata('kota_course') ?></td></tr>
                <tr><td>Lokasi</td><td><?php echo $this->session->userdata('lokasi_pelatihan') ?></td></tr>
                <tr><td>Start</td><td><?php echo $this->session->userdata('waktu_in') ?></td></tr>
                <tr><td>Catatan </td><td><?php echo $this->session->userdata('keterangan') ?></td></tr>
                 
              
               </table>
            <div class="well">
		  <p class="text-left">Dept Diklat akan segera memproses dan memverifikasi usulan Anda  dalam waktu 2 x 24 Jam setelah Form Evaluasi dikonfirmasi oleh Atasan Anda. Anda akan mendapat sms notifikasi Jika Dept Diklat telah memproses usulan Anda. </p>
		  <p class="text-left">Terima Kasih.  </p>
          </div>
		    <br/>
		    <br/>
		    <h4>Having trouble with registration your training ?</h4>
			<p>Please contact&nbsp;<a href="infotraining.perumnas.co.id">Online Customer Support </a>&nbsp; <span class="glyphicon glyphicon-earphone"></span> 021-8194807 ext.615</a> <a>PeTA - infotraining.perumnas.co.id</a>.</p>
		  	<!-- <p> <?php echo $this->session->userdata('judul_course') ?> </p> -->
		  	<p class="help-block text-right"><small>
		  		Thank's<br/>Divisi PSDM Kantor Pusat Perum Perumnas</small></p>
		  	<!-- 	<?php echo $this->session->userdata('NIP'); ?> -->
		   </div>
     </div>