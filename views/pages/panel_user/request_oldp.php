<?php if(validation_errors()) {?>
    
    <ul class="alert alert-danger">
     <?php echo validation_errors('<ul>','</ul>')?>
    </ul>
<?php
}
?>

<?php 


?>
<div class="row">

 <h3><i class="glyphicon glyphicon-dashboard"></i> Dashboard Training</h3> 
 <br/>
 
 <div class="col-md-9">

 	<?php if($this->session->userdata('berhasil')) {?>
  
    <ul class="alert alert-success">
       <span class="glyphicon glyphicon-ok"></span> <?php echo $this->session->userdata('berhasil') <> '' ? $this->session->userdata('berhasil') : ''; ?>
        
        </ul>
    <?php
    }
    ?>
    <?php if($this->session->userdata('message')) {?>
  
    <ul class="alert alert-info">
       <span class="glyphicon glyphicon-exclamation-sign"></span> <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
        
        </ul>
    <?php
    }
    ?>
  <div class="panel panel-default">
  <div class="panel-heading"><span class="glyphicon glyphicon-chevron-right"></span> Formulir Usulan Training Baru Karyawan Perumnas <span></span><span class="pull-right">Pendaftar : <?php echo (count($pendaftar)) ?></span> </div>

  <div class="panel-body">			
 <?php echo  form_open_multipart('Panel_user/tambahkan_pddk') ?>
 <div class="form-group">

 <?php $jumlah = count($pendaftar);
 			if($jumlah >1) { ?>
 			<div class="col-md-6">
 			 	
 			<p class="bg-danger" style="padding: 12px;">Maaf, Pendaftaran telah <b>ditutup</b> dikarenakan telah melebihi kuota.<br/>
 			<br/>
 			<br/>TTD<br/>
 			Dept.Diklat</p>
 			</div>
 			<?php } else { ?>

 		 <input type="hidden" name="id_user"  class="form-control" value="<?php echo $this->session->userdata('ID_User')  ?>" readonly/>
 		   <input type="hidden" name="nip"  class="form-control" value="<?php echo $edit_user->nip  ?>" readonly/>
			<input type="hidden" name="nama_peserta"  class="form-control" value="<?php echo $edit_user->nama_lengkap  ?>" readonly/>			    	         

 		   						<div class="form-group text-right">	
								<label for="kode"> Kepada  : Yth. MD Diklat Div. PSDM</label>
								<p>di  Kantor Pusat Perum Perumnas</p>

						    	</div>
						    	<br/>
						       	
								
						    	<input type="hidden" name="jabatan"  class="form-control" value="<?php echo $edit_user->nama_jab  ?>" readonly/>
						    	</div>

						    	<div class="form-group">	
							
						    	 <input type="hidden" name="unor"  class="form-control" value="<?php echo $edit_user->nama_unor  ?>" readonly/>
						    	</div>

						    	<div class="form-group">
						        <label for="kode">JUDUL PELATIHAN </label>
						          <input type="hidden" name="judul"  class="form-control" placeholder="Judul pelatihan yang Anda inginkan"  value="OLDP" readonly />
						        <input type="text" name=""  class="form-control" placeholder="Judul pelatihan yang Anda inginkan"  value="Program Percepatan OLDP (Operational Leadership Development Programe) tahun 2016" readonly />
						        </div>

						         <div class="form-group">
							        <label for="kode">BIDANG*</label>
							        <select name="kategori" class="combobox form-control">
							            <?php foreach( $kategori as $result ) {?>
							            
							               <option value="13" > Pendidikan Berjenjang</option> 
							            <?php } ?>
							        </select>
							        
							        </div>
							        <input class="form-control" size="16"  name="tanggal" type="hidden"  value="2016-06-18"readonly >

						    	 <div class="form-group">
							     <label for="kode">NAMA PERUSAHAAN</label>
							     <input type="text" name="nama_persh" id="nama" class="form-control" placeholder="Provider pelatihan yang Anda inginkan" value="Perum Perumnas" readonly/>
							     </div>

								
						        <div class="form-group">
						        <label for="kode">Kota</label>
						         <input type="text" name="kota" id="nama" class="form-control" placeholder="Provider pelatihan yang Anda inginkan" value="Jakarta Timur" readonly/>

						        
							        
							        </div>

								
						         <div class="form-group">
						        <label for="jumlah">TELP</label>
						        <input type="text" name="no_telp" id="telp"  class="form-control" placeholder="021-" value="(021) 819-4807" readonly/>
						        </div>
						        <div class="form-group">
						        <label for="jumlah">WEBSITE</label>
						        <input type="text" name="website" id="telp"  class="form-control"   placeholder="http://" value="www.perumnas.co.id" readonly />
						        </div>					 
								
								 <div class="form-group">
						        <label for="penerbit">EMAIL </label>
						        <input type="text" name="email" id="email" class="form-control" placeholder="jane.doe@example.com"  value="diklat@perumnas.co.id" readonly />
						        </div>

						         <div class="form-group">
							         <label for="dtp_input2">Rencana Tanggal Pendidikan</label>

							          <table  class="table table-striped table-bordered table-hover" style="margin-bottom: 10px" data-show-toggle="true">
						                    <tbody data-link="row" class="rowlink">
						                    <th class="success col-md-1 text-center" >No</th>
						                    <th class="success col-md-4 text-center">Pelaksanaan</th>
						                    <th class="success text-center">Tanggal</th>
						                  <tr  class="text-center">
						                  <td>1</td>
						                  <td>Pelaksanaan Psikotest</td>
						                  <td>18 Juni 2016</td>
						                  </tr>
						                   <tr  class="text-center">
						                  <td>2</td>
						                  <td>Pelaksanaan E-learning</td>
						                  <td>27 Juni 2016</td>
						                  </tr>
						                  <tr  class="text-center">
						                  <td>3</td>
						                  <td>Pelaksanaan In House</td>
						                  <td>18 Juli 2016</td>
						                  </tr>
						                  



						                  </tbody>
						                  </table>


							       
							        <!--  <div class="input-group date form_date form_date col-md-6 " data-date="2016-06-18" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
							                    <input class="form-control" size="16"  name="tanggal" type="text" readonly >
							                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
							                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
							         </div> -->
							        
							         </div> 


						         <hr style="border-top: 1px dashed #8c8b8b;"></hr>

						         <div class="form-group">
						        <label for="kode">NAMA PESERTA :</label>
						        <input type="text" name="nama_peserta"  class="form-control" value="<?php echo $edit_user->nama_lengkap  ?>" readonly/>	
						        </div>
						         <div class="form-group">
						        <label for="kode">NIP : </label>
						       <input type="text" name="nip"  class="form-control" value="<?php echo $edit_user->nip  ?>" readonly/>
						        </div>


						       
						        <div class="form-group">
						        <label for="cover">Document Surat Permohonan *</label>
						        <input type="file" name="brosur" id="cover_brosur"  required="" />
						        <p class="help-block"><small>*Document yang diizinkan max.300kb format (*jpg,*png,*pdf)</small> </p>
						        </div>
						       				        
						     


						       

						       <div class="form-group">
						        <label for="cover">Scan Surat Pernyataan *</label>
						        <input type="file" name="form" id="cover_brosur"  required="" />
						        <p class="help-block"><small>*Document yang diizinkan max.300kb format (*jpg,*png,*pdf)</small> </p>
						        </div>
						       				        
						     
						        <div class="form-group">

									<span id="pernyataan"><p class="text-justify">Dengan Ini Saya Nyatakan Bersedia Dan Setuju Akan Syarat Dan Ketentuan Perum Perumnas Dan  Akan Memberikan Data Dan Keterangan Yang Sebenar - Benarnya. Bilamana Ternyata Terdapat Ketidakbenaran, Saya Bertangggung Jawab Penuh Atas Segala Akibatnya
										</p>
								</span>
									<div class="checkbox">
											<h4> <label class="disabled"><input type="checkbox" class="checkbox big-chekbox" required="" />Setuju</h4></label>
									</div>

						        <div class="form-group">
						       <h5> <label for="InputMessage">Keterangan<small> Pesan khusus</small></label></h5>
						        <textarea name="keterangan" id="InputMessage" class="form-control" rows="5"  data-toggle="tooltip" data-placement="right" title="Keterangan"></textarea>
						        
						       </div>

						        <div class="form-group">
						         <input type="submit" name="tambah" id="tambah" value="submit" class="btn btn-success pull-right" />
						        </div>
						        <br/>
						        <h5><small>Keterangan  
						        <p> *) &nbsp; : Mohon Karyawan Wajib Mengupload File Document kolom wajib disi</p></small></h5>

 </div>

 <?php form_close()?>
<p>&nbsp;<a href="<?php echo site_url('Panel_user')  ?>">  Back </a></p>
	       									
  </div>

</div>

</div>

</div>
<?php } ?>

<script type="text/javascript">
    $('.form_datetime').datetimepicker({
        //language:  'fr',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        forceParse: 0,
        showMeridian: 1
    });
    $('.form_date').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        forceParse: 0
    });
    $('.form_time').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 1,
        minView: 0,
        maxView: 1,
        forceParse: 0
    });




</script>

<script type="text/javascript">
      //<![CDATA[
        $(document).ready(function(){
          $('.combobox').combobox()
        });
      //]]>
    </script>