<style>
.big-chekbox {width: 20px; height: 20px;}

</style>

<h3 class="breadcrumb"> Terms & Condition  </h3>
<?php  if(validation_errors()) {?>
    
                                <ul class="alert alert-danger">
                                 <?php echo validation_errors('<ul>','</ul>')?>
                                </ul>
                            <?php
                            }
                            ?>

  <?php if($this->session->userdata('message')) {?>
                          
                            <ul class="alert alert-success">
                               <span class="glyphicon glyphicon-send"></span> <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                                
                                </ul>
                            <?php
                            }
                            ?>

     <?php if($this->session->userdata('warning')) {?>
                          
                            <ul class="alert alert-warning">
                               <span class="glyphicon glyphicon-danger"></span> <?php echo $this->session->userdata('warning') <> '' ? $this->session->userdata('warning') : ''; ?>
                                
                                </ul>
                            <?php
                            }
                            ?>

<p class="text-justify"><b>Sebelum menggunakan Sistem Perumnas Training Agenda (PeTA) , Saudara harus  menyetujui  beberapa syarat dan ketentuan dibawah ini : </b></p>
<p class="text-justify">Kesepakatan ini telah di perbarui pada  November 16, 2015 </p>
<p class="text-justify">Perumnas Training Agenda (PeTA) adalah program yang diciptakan untuk menjembatani komunikasi antara Rekanan Pendidikan & Pelatihan (Provider) terdaftar dengan Karyawan Perumnas. Komunikasi yang dimaksud dalam hal ini adalah komunikasi dua arah dimana manfaatnya dapat dirasakan oleh kedua belah pihak dengan Divisi Pengembangan SDM cq. Departemen Pendidikan & Pelatihan yang bertindak selaku mediator</p>
<p class="text-justify">Daftar agenda training yang telah dirancang oleh Provider yang telah diverifikasi oleh  Divisi Pengembangan SDM cq. Departemen Pendidikan akan dapat diakses oleh seluruh Karyawan Perumnas dimana pun, sehingga memungkinkan Karyawan Perumnas yang membutuhkan Pelatihan tersebut untuk mendaftarkan diri sewaktu-waktu.</p>
<p class="text-justify">Bagi para Provider yang telah melakukan registrasi, selanjutnya secara rutin dapat mengakses PeTA untuk melakukan pembaharuan daftar program Pelatihan dan juga mendapatkan informasi penawaran kerjasama Pelatihan oleh Divisi Pengembangan SDM cq. Departemen Pendidikan & Pelatihan</p>
<p class="text-justify">Kehadiran PeTA diharapkan dapat memperlancar dan membuka kesempatan pengembangan kompetensi dan ilmu pengetahuan Karyawan Perumnas dengan menghadiri event training yang telah direncanakan oleh Provider.</p>

</li>

<p><strong> Pengenalan Fasilitas :</strong></p>
<ul>
<li>
<p class="c2"><span class="c3">Registrasi</span></p>
<p class="c2">Menu registrasi digunakan untuk mendaftarkan profil perusahaan Saudara secara lengkap dan mohon dipastikan terisi secara lengkap. Terutama untuk Dokumen NPWP dan SIUP. 
Saudara bisa melanjutkan ke menu penambahan daftar pelatihan jika registrasi Saudara sudah lengkap dan berhasil.
</p>
</li>
<li>
<p class="c2"><span class="c3">Provider</span></p>
<p class="c2">Saudara dapat menambahkan pelatihan di menu provider disana terdapat menu list pelatihan yang memuat daftar pelatihan Saudara yang sudah diiinput , status pelatihan Saudara  akan terinfo secara realtime, jika status telah h di <i>Approve</i> maka pelatihan Saudara yang akan tampil di dashboard Karyawan  Perumnas.</p>
</li>
<li>
<p class="c2"><span class="c3">Contact Us</span></p>
<p class="c2">Saudara dapat menghubungi dan mengirim Pesan/<i>Feedback</i> ke Pihak Divisi Pengembangan SDM cq. Departemen Pendidikan  pada menu ini dan mengetahui informasi mengenai alamat  lengkap dari Perum Perumnas.</p>
<center> <p class="c2"> * * *</p> </center>

</li>
</ul>
<p><strong>Ketentuan Umum :</strong> </p>
<ol class="text-justify">


<li class="c2">Semua informasi terkait Pelatihan yang diinput oleh Provider menjadi tanggung jawab Provider tersebut sepenuhnya.</li><br/>
<li class="c2">	Provider bertanggung jawab atas kebenaran informasi yang disajikan, koreksi terhadap kekeliruan yang timbul harus segera diselesaikan agar tidak terjadi kesalahpahaman.</li><br/>
<li class="c2">	Informasi tersebut akan digunakan oleh Administrator sebagai materi komunikasi Pelatihan yang dapat diakses oleh seluruh Karyawan Perumnas.</li><br/>
<li class="c2">	Keberadaan informasi yang tidak akurat akan menjadi pertimbangan dalam evaluasi Rekanan Pendidikan & Pelatihan yang diselenggarakan secara rutin.</li><br/>



</ol>

<?php echo form_open('provider/pernyataan'); ?>
<div class="form-group">

	<span id="pernyataan"><p class="text-justify">DENGAN INI SAYA NYATAKAN BERSEDIA DAN SETUJU AKAN SYARAT DAN KETENTUAN PERUM PERUMNAS DAN  AKAN MEMBERIKAN DATA DAN KETERANGAN YANG SEBENAR - BENARNYA. BILAMANA TERNYATA TERDAPAT KETIDAKBENARAN, SAYA BERTANGGGUNG JAWAB PENUH ATAS SEGALA AKIBATNYA.</p>
</span>
	<div class="checkbox">
		<?php if ($this->session->userdata('status') == '1') { ?>
 	 		<h3> <label class="disabled"><input type="checkbox" class="checkbox big-chekbox" checked="checked" disabled="disabled"/>Setuju</h3></label>
 	 		
 	 	<?php } else { ?>

 	 	 <h3> <label><input type="checkbox" value="1" class="big-chekbox " name="pernyataan"    >&nbsp;Setuju</h3></label>
 	 	 </div>
			<br/>
	 		<button type="submit"  class="btn btn-lg btn-primary btn-block">Submit </button>
 		 		<?php } ?>


	
</div>



<?php echo form_close(); ?>
