 <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
 <script language="javascript" type="text/javascript">
tinymce.init({
  selector: "textarea",
  height: 200,
  plugins: [
    "advlist autolink autosave link image lists charmap print preview hr anchor pagebreak spellchecker",
    "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
    "table contextmenu directionality emoticons template textcolor paste fullpage textcolor colorpicker textpattern"
  ],

  toolbar1: "newdocument fullpage | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | styleselect formatselect fontselect fontsizeselect",
  toolbar2: "cut copy paste | searchreplace | bullist numlist | outdent indent blockquote | undo redo | link unlink anchor image media code | insertdatetime preview | forecolor backcolor",
  toolbar3: "table | hr removeformat | subscript superscript | charmap emoticons | print fullscreen | ltr rtl | spellchecker | visualchars visualblocks nonbreaking template pagebreak restoredraft",

  menubar: false,
  toolbar_items_size: 'small',

  style_formats: [{
    title: 'Bold text',
    inline: 'b'
  }, {
    title: 'Red text',
    inline: 'span',
    styles: {
      color: '#ff0000'
    }
  }, {
    title: 'Red header',
    block: 'h1',
    styles: {
      color: '#ff0000'
    }
  }, {
    title: 'Example 1',
    inline: 'span',
    classes: 'example1'
  }, {
    title: 'Example 2',
    inline: 'span',
    classes: 'example2'
  }, {
    title: 'Table styles'
  }, {
    title: 'Table row 1',
    selector: 'tr',
    classes: 'tablerow1'
  }],

  templates: [{
    title: 'Test template 1',
    content: 'Test 1'
  }, {
    title: 'Test template 2',
    content: 'Test 2'
  }],
  content_css: [
    '//fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css',
    '//www.tinymce.com/css/codepen.min.css'
  ]
});
</script>


<style>
.status-upload {

}
.status-upload form {

}
.status-upload form textarea {

}

.status-upload ul {
float: right;
list-style: none outside none;
margin: 0;
padding: 0 0 0 15px;
width: auto;
}
.status-upload ul > li {
float: right;
}
.status-upload ul > li > a {
-webkit-border-radius: 4px;
-moz-border-radius: 4px;
-ms-border-radius: 4px;
-o-border-radius: 4px;
border-radius: 4px;
color: #777777;
float: right;
font-size: 14px;
height: 30px;
line-height: 30px;
margin: 10px 0 10px 10px;
text-align: center;
-webkit-transition: all 0.4s ease 0s;
-moz-transition: all 0.4s ease 0s;
-ms-transition: all 0.4s ease 0s;
-o-transition: all 0.4s ease 0s;
transition: all 0.4s ease 0s;
width: 30px;
cursor: pointer;
}
.status-upload ul > li > a:hover {
background: none repeat scroll 0 0 #606060;
color: #fff;
}
.status-upload form button {

}
.dropdown > a > span.green:before {
border-left-color: #2dcb73;
}
.status-upload form button > i {
margin-right: 7px;
}

.custom-file-input::-webkit-file-upload-button {
  visibility: hidden;
}
.custom-file-input::before {
  content: 'Select some files';
  display: inline-block;
  background: -webkit-linear-gradient(top, #f9f9f9, #e3e3e3);
  border: 1px solid #999;
  border-radius: 3px;
  padding: 5px 8px;
  outline: none;
  white-space: nowrap;
  -webkit-user-select: none;
  cursor: pointer;
  text-shadow: 1px 1px #fff;
  font-weight: 700;
  font-size: 10pt;
}
.custom-file-input:hover::before {
  border-color: black;
}
.custom-file-input:active::before {
  background: -webkit-linear-gradient(top, #e3e3e3, #f9f9f9);
}

  .btn-file {
        position: relative;
        overflow: hidden;
    }
    .btn-file input[type=file] {
        position: absolute;
        top: 0;
        right: 0;
        min-width: 100%;
        min-height: 100%;
        font-size: 100px;
        text-align: right;
        filter: alpha(opacity=0);
        opacity: 0;
        outline: none;
        background: white;
        cursor: inherit;
        display: block;
    }
</style>

<h3 class="breadcrumb"> Detail Pelelangan </h3>
<div class="panel panel-default">
 <div class="panel-heading">
                <h3 class="panel-title"><strong> Informasi Lelang Terbaru  </strong> <?php  if($edit_pelelangan->status == 1 ) {  ?> <span class="label label-success pull-right ">Open!</span> <?php } else if($edit_pelelangan->status == 0 ) { ?>     <span class="label label-danger pull-right ">Closed!</span> <?php } else if ($edit_pelelangan->status == 2 ) {  ?>  
                  <span class="label label-primary pull-right ">Up Coming!</span> <?php } ?></h3>
               </div>
   <div class="panel-body">
   <div class="progress">
		  <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
		</div>
   <div class="step well">
  
   

	
<?php if(!empty ($edit_pelelangan->judul)) { 
$rupiah = number_format($edit_pelelangan->harga,2,',','.');
$rupiah2 = number_format($edit_pelelangan->harga_selesai,2,',','.');
$rupiah3 = number_format($edit_pelelangan->biaya_lelang,2,',','.');
   	?>

<?php  if($edit_pelelangan->status == 1 ) {  ?>


		   	<table class="table table-hover" caption"Hello">
		        <thead class="success">
		        <tr><td class="col-md-3">Penyelenggara</td><td>Kantor Pusat Perum Perumnas</td><td class="col-md-3 text-right"></td></tr>
		        <tr><td class="col-md-2">Judul Penawaran</td><td> <strong><?php echo $edit_pelelangan->judul  ?></strong></td></tr>
		        <tr><td>Deskripsi</td><td> <?php echo $edit_pelelangan->deskripsi  ?></td> <button href="" onclick="window.open('<?php echo base_url()."temp_file/".$edit_pelelangan->doc_deskripsi; ?>', 'asdas', 'toolbars=0,width=700,height=420,left=200,top=200,scrollbars=1,resizable=1');" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-file" ></span> Lihat Deskripsi</button></tr>
		         <tr><td>Waktu Penutupan TOR/KAK</td><td><?php $pecah4 = explode(" ", $edit_pelelangan->waktu_aanwijzing);$pecah8 = explode(" ", $edit_pelelangan->selesai_aanwijzing);
								$pecah5 = explode (" ",$edit_pelelangan->waktu_tor);
							    echo $this->waktu->formatDate($pecah5[0],"id");?>
							  &nbsp;&nbsp; Pukul : <?php echo " ".$pecah5[1]; ?></td></tr>
		        <tr><td>Waktu Aanwijzing</td><td><?php echo $this->waktu->formatDate($pecah4[0],"id");?>
							  &nbsp;&nbsp; Pukul : <?php echo " ".$pecah4[1]; ?> </td></tr>
				<tr><td>Selesai Aanwijzing</td><td> <?php echo $this->waktu->formatDate($pecah8[0],"id");?> &nbsp;&nbsp; Pukul : <?php echo " ".$pecah8[1]; ?></td></tr>			  
				 <tr><td class="col-md-2">Hara Perkiraan Sendiri (HPS)</td><td> <strong><?php echo $rupiah ?> s/d <?php echo $rupiah2 ?></strong></td></tr>
				 <tr><td>Biaya Dokumen Lelang</td><td><?php echo $rupiah3 ?></td></tr>	
				 <tr><td>NB</td><td>Biaya dokumen lelang dapat Di transfer ke  : <br>

				 Nama Bank : <strong>Bank Bukopin</strong> <br>
				 Atas nama : Perum Perumnas / RTKP Perumnas<br>
				 No. rek : 1017654019  </td></tr>		  
		        <tr><td colspan="2"><button type="button" class="next btn btn-info form-control"><strong>TAHAP 2 . IKUTI PENAWARAN</strong></button></a></td></tr>

		        <tr><td colspan="2">
		        	

		        	<?php if(empty($download->status)) { ?>
		   -
		   <?php }else { ?>
				   <?php if($download->status == 1) { ?>
				   <a href="<?php echo base_url()."temp_file/".$edit_pelelangan->doc_tor; ?>" target="_blank" class="btn btn-success form-control"> <span class="glyphicon glyphicon-download"></span> DOWNLOAD TOR/KAK</a>
				   <?php } else if ($download->status == 0) {?>
				  Status Anda : <i>Menunggu Verifikasi</i> 
				   	<?php }else if ($download->status == 2){ ?>	
				   	Status Anda : Ditolak!
				   		<?php } ?>	
		         <?php } ?>	
		        </td></tr>
		    	</thead>

		    	 <?php echo form_open_multipart('Pelelangan/transaction') ?>
		    	 <form enctype="multipart/form-data" accept-charset="utf-8" name="formname" id="formname"  method="post" action="">
		    	 <div class="form-group">

		        
				
				</div>
    </table>

 <?php } else if($edit_pelelangan->status == 2 ) { ?>


 				<table class="table table-hover" caption"Hello">
		        <thead class="success">
		        <tr><td class="col-md-3">Penyelenggara</td><td>Kantor Pusat Perum Perumnas</td><td class="col-md-3 text-right"></td></tr>
		        <tr><td class="col-md-2">Judul Penawaran</td><td> <strong><?php echo $edit_pelelangan->judul  ?></strong></td></tr>
		        <tr><td>Deskripsi</td><td> <?php echo $edit_pelelangan->deskripsi  ?></td> <button href="" onclick="window.open('<?php echo base_url()."temp_file/".$edit_pelelangan->doc_deskripsi; ?>', 'asdas', 'toolbars=0,width=700,height=420,left=200,top=200,scrollbars=1,resizable=1');" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-file" ></span> Lihat Deskripsi</button></tr>
		         <tr><td>NB</td><td> <p class="text-warning">Detail akan diumumkan dikemudian hari </p> </td></tr>
    </table>



<?php  }else if($edit_pelelangan->status == 0){ ?>

	<table class="table table-hover" caption"Hello">
		        <thead class="success">
		        <tr><td class="col-md-3">Penyelenggara</td><td>Kantor Pusat Perum Perumnas</td><td class="col-md-3 text-right"></td></tr>
		        <tr><td class="col-md-2">Judul Penawaran</td><td> <strong><?php echo $edit_pelelangan->judul  ?></strong></td></tr>
		        <tr><td>Deskripsi</td><td> <?php echo $edit_pelelangan->deskripsi  ?></td> <button href="" onclick="window.open('<?php echo base_url()."temp_file/".$edit_pelelangan->doc_deskripsi; ?>', 'asdas', 'toolbars=0,width=700,height=420,left=200,top=200,scrollbars=1,resizable=1');" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-file" ></span> Lihat Deskripsi</button></tr>
		         <tr><td>Waktu Penutupan TOR/KAK</td><td><?php $pecah4 = explode(" ", $edit_pelelangan->waktu_aanwijzing);
								$pecah5 = explode (" ",$edit_pelelangan->waktu_tor);
							    echo $this->waktu->formatDate($pecah5[0],"id");?>
							  &nbsp;&nbsp; Pukul : <?php echo " ".$pecah5[1]; ?></td></tr>
		        <tr><td>Waktu Aanwijzing</td><td><?php echo $this->waktu->formatDate($pecah4[0],"id");?>
							  &nbsp;&nbsp; Pukul : <?php echo " ".$pecah4[1]; ?></td></tr>
				 <tr><td class="col-md-2">Hara Perkiraan Sendiri (HPS)</td><td> <strong><?php echo $rupiah ?> s/d <?php echo $rupiah2 ?></strong></td></tr>
				 <tr><td>Biaya Dokumen Lelang</td><td><?php echo $rupiah3 ?></td></tr>	
				<tr><td>NB</td><td> <p class="text-warning">Penawaran sudah ditutup </p> </td></tr>
    </table>

<?php } ?>



















  </div>  
  <div class="step well">
  <ul class="alert alert-info"><span class="glyphicon glyphicon-exclamation-sign"></span> VERIFIKASI KEIKUTSERTAAN
  </ul> 
	    <table>
	    <?php if(!empty($edit_user->id_provider)) { ?>
	    <tr><td><div class="form-group">
        <label for="kode">ID PERUSAHAAN</label>
        <input type="hidden" name="id_lelang"  class="form-control" value="<?php echo $edit_pelelangan->id_lelang  ?>" readonly/>
        <input type="text" name="kode_user"  class="form-control" value="<?php echo $this->session->userdata('kd_user')  ?>" readonly/>
        <input type="hidden" name="id_prov"  class="form-control" value="<?php echo $edit_user->id_provider  ?>" readonly/>
        <input type="hidden" name="email_prov"  class="form-control" value="<?php echo $edit_user->email  ?>" readonly/>
        </div>
             

        <div class="form-group">
        <label for="kode">NAMA PERUSAHAAN</label>
        <input type="text" name="nama_persh" id="nama" class="form-control" value="<?php echo $edit_user->nama_provider?>" readonly/>
        </div>

        <div class="form-group">
        <label for="kode">PEMILIK</label>
        <input type="text" name="pemilik" id="pemilik" class="form-control" value="<?php echo $edit_user->pemilik?>" readonly/>
        </div> </td></tr>
	    <tr>
	    <td>
	     <div class="form-group">
	     <p>Mohon Mengupload bukti pembayaran biaya dokumen lelang Anda, pastikan file sesuai dalam format *.jpg ,*.png, atau *.pdf </p>
	    	<label for="cover">UPLOAD BUKTI TRANSFER</label>
	        <input type="file" name="bkt_transfer" id="cover" class="form-control" required />
	       
	        <p class="help-block"><small>*Document yang diizinkan max.400kb </small> </p>
	        </div>
	        <div class="form-group">
	        
	        </div>
	        
	       <button type="button" class="back btn btn-info">back</button>
   </div>
  		
   		<?php if( $edit_pelelangan->status == 1) {
   				echo "<button class='action submit btn btn-success'>Submit</button>"; } else if( $edit_pelelangan->status == 2 ) {

   				echo " Up Coming ";	} else if ($edit_pelelangan->status == 0) {
   					echo "Closed ";
   					}
   				
   		 ?>
		
    	<?php echo form_close() ?> 
    	</td>
    </tr>
    <?php } else { ?>
    Anda belum mengisi Form Perusahaan
    <?php } ?>	
    </table>

    <?php } else { ?>
    <ul class="alert alert-danger">
       
        <span class="glyphicon glyphicon-minus-sign"> </span><?php echo $this->session->userdata('cook') <> '' ? $this->session->userdata('cook') : ''; ?>
        </ul>
     <?php } ?>
   </div>

   <a href="<?php echo site_url('Dashboard') ?>"> Back </a>
</div>
<!-- 
<div class="col-md-12">
<body>
<div id="disqus_thread"></div>
<script>
/**
* RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
* LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables
*/

var disqus_config = function () {
this.page.url = PAGE_URL; // Replace PAGE_URL with your page's canonical URL variable
this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};

(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');

s.src = '//infotrainingperumnas.disqus.com/embed.js';

s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>

<script id="dsq-count-scr" src="//infotrainingperumnas.disqus.com/count.js" async></script>
</body>
</div> 
<br/>


                <!-- Blog Comments -->
<?php if(empty($download->status)) { ?>
		   <hr/>
<?php }else if($download->status == 1 ) { ?>
				  <?php if(!empty($edit_user->id_provider)) { ?>
				                <div class="well">

				        <?php if($this->session->userdata('message')) {?>
				  
				    <ul class="alert alert-info">
				       <span class="glyphicon glyphicon-ok"></span> <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
				        
				        </ul>
				    <?php
				    }
				    ?>
				     <?php if($this->session->userdata('error')) {?>
				  
				    <ul class="alert alert-danger">
				       <span class="glyphicon glyphicon-exclamation-sign"></span> <?php echo $this->session->userdata('error') <> '' ? $this->session->userdata('error') : ''; ?>
				        
				        </ul>
				    <?php
				    }
				    ?>
				                    <h4 >Diskusi: <?php echo $edit_pelelangan->judul  ?></h4>
				                    <h5><?php echo(count($comment_anj)) ?> Comment</h5>
				               <div class="status-upload">
				                     <?php echo form_open_multipart('Pelelangan/aanj_comment') ?>
				                    <form role="form">
				                        <div class="form-group">
				                        <input type="hidden" class="form-control" name="id_lelang" value="<?php echo $edit_pelelangan->id_lelang ?> ">
				                        <input type="hidden" class="form-control" name="id_prov" value="<?php echo $edit_user->id_provider ?> ">
				                        <input type="hidden" class="form-control" name="kd_user" value="<?php echo $this->session->userdata('kd_user')?> ">

				                       
				                            <textarea class="form-control" rows="3" placeholder="Discuss here.." name="comment" required>Let's discuss here..</textarea>
				                            	<ul> <small class="help-block">Attach file diizinkan format : gif,jpg,png,pdf </small><span class="btn btn-xs btn-info btn-file pull-right">
												        <i class="fa fa-paperclip"></i> <small>Attach</small> <input type="file" name="attach" id="uploadFile">
												</span></ul> 									
											    
				                        </div>

				                        <button type="submit" class="btn btn-primary">Submit</button>
				                        
											

												<p id="fileUploadError" class="text-danger hide"></p>

<div class="list-group" id="files"></div>

										
				                    </form>


				                     <?php echo form_close() ?>
				                </div>
				               </div>
				                          <!-- Posted Comments -->

				                <!-- Comment -->
				                 <div class="well" id="mydiv">
				                  <?php foreach($comment_anj as $hasil) { ?>

				                  <?php if ($hasil->kd_user == 'P00001' || $hasil->kd_user =='P00128') { ?>
				                <div class="media">
				                
				                    <a class="pull-left" href="#">
				                        <img class="media-object" src="<?php echo base_url()?>assets/avatar_female.png?>"  width="60" alt="">
				                    </a>
				                    <div class="media-body">
				                        <h4 class="media-heading">infotraining.perumnas.co.id

				                        <?php $pecah7 = explode(" ", $hasil->date); ?>
												    

				                            <small><?php echo $this->waktu->formatDate($pecah7[0],"en");?>&nbsp;&nbsp; at <?php echo " ".$pecah7[1]; ?></small>
				                        </h4>
				                         <?php echo $hasil->comment ?>
				                         <?php if($hasil->attach =="doc_attach_0"){ ?>
				                         
				                         <?php } else { ?>

				                         <button href="" onclick="window.open('<?php echo base_url()."temp_file/".$hasil->attach; ?>', 'asdas', 'toolbars=0,width=700,height=420,left=200,top=200,scrollbars=1,resizable=1');" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-file" ></span> preview lampiran</button>

				                         <?php }?>
				                        <!-- Nested Comment -->
				                        
				                        <!-- End Nested Comment -->
                                                      <hr>

				                    </div>
				                </div>




				           
				                	<?php }else { ?>
				                	
				                	<div class="media">
				                    <a class="pull-right" href="#">
				                        <img class="media-object" src="<?php echo base_url()?>assets/123t-avatar.png?>" width="60"  alt="">
				                    </a>
				                    <div class="media-body text-right">
				                        <h4 class="media-heading">Peserta
				                           <?php $pecah7 = explode(" ", $hasil->date); ?>
												    

				                            <small><?php echo $this->waktu->formatDate($pecah7[0],"en");?>&nbsp;&nbsp; at <?php echo " ".$pecah7[1]; ?></small>
				                        </h4>
				                       
				                        <?php echo $hasil->comment ?>
				                        <?php if($hasil->attach =="doc_attach_0"){ ?>
				                         
				                         <?php } else { ?>

				                         <button href="" onclick="window.open('<?php echo base_url()."temp_file/".$hasil->attach; ?>', 'asdas', 'toolbars=0,width=700,height=420,left=200,top=200,scrollbars=1,resizable=1');" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-file" ></span> preview lampiran</button>

				                         <?php }?>
				                        <hr>
				                    </div>
				                </div>


				                	<?php }?>

				                <?php } ?>

				                <!-- Comment -->
				  <?php } else { ?> 
				<ul class="alert alert-danger">
				       
				        <span class="glyphicon glyphicon-minus-sign"> </span><?php echo $this->session->userdata('cook') <> '' ? $this->session->userdata('cook') : ''; ?>
				        </ul>
				     <?php } ?>

<input type="button" value="Print Div" onclick="PrintElem('#mydiv')" />
				   </div>

	<?php }else { ?>

***
<?php } ?>

   <script type="text/javascript">
	$(document).ready(function(){
		var current = 1;
		
		widget      = $(".step");
		btnnext     = $(".next");
		btnback     = $(".back"); 
		btnsubmit   = $(".submit");

		// Init buttons and UI
		widget.not(':eq(0)').hide();
		hideButtons(current);
		setProgress(current);

		// Next button click action
		btnnext.click(function(){
			if(current < widget.length){
				widget.show();
				widget.not(':eq('+(current++)+')').hide();
				setProgress(current);
			}
			hideButtons(current);
		})

		// Back button click action
		btnback.click(function(){
			if(current > 1){
				current = current - 2;
				btnnext.trigger('click');
			}
			hideButtons(current);
		})			
	});

	// Change progress bar action
	setProgress = function(currstep){
		var percent = parseFloat(100 / widget.length) * currstep;
		percent = percent.toFixed();
		$(".progress-bar").css("width",percent+"%").html(percent+"%");		
	}

	// Hide buttons according to the current step
	hideButtons = function(current){
		var limit = parseInt(widget.length); 

		$(".action").hide();

		if(current < limit) btnnext.show();
		if(current > 1) btnback.show();
		if (current == limit) { btnnext.hide(); btnsubmit.show(); }
	}
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-19096935-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
<script type="text/javascript">
tinyMCE.init({
        ...
        mode : "specific_textareas",
        editor_selector : "mceEditor"
});
</script>

<script type="text/javascript">
  
    function PrintElem(elem)
    {
        Popup($(elem).html());
    }

    function Popup(data) 
    {
        var mywindow = window.open('', 'mydiv', 'height=400,width=600');
        mywindow.document.write('<html><head><title>my div</title>');
        /*optional stylesheet*/ //mywindow.document.write('<link rel="stylesheet" href="main.css" type="text/css" />');
        mywindow.document.write('</head><body >');
        mywindow.document.write(data);
        mywindow.document.write('</body></html>');

        mywindow.document.close(); // necessary for IE >= 10
        mywindow.focus(); // necessary for IE >= 10

        mywindow.print();
        mywindow.close();

        return true;
    }

</script>
