<Style>
#form-container {
	padding: 20px 0;
}

#form-container h1{
	font-size: 200%;
	text-align: center;	
	margin-bottom: 50px;
}

</Style>

<div class="container">

	<div class="col-md-12" style="font-size:13px">

	<?php if($this->session->userdata('message')) {?>
  
    <ul class="alert alert-success">
       <span class="glyphicon glyphicon-ok"></span> <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
        
        </ul>
    <?php
    }
    ?>
  <p class="text-center text-success" id="demo2"></p>
		<div class="jumbotron">


		 <div class="list-group">

		<p class="list-group-item list-group-item-warning judul" style="font-size:13px"><?php echo $judul_course ?>
			<br/>
			<?php echo $nama_pegawai ?>
			</p>
		<!-- 	<select class="form-control" id="mySelect" onchange="myFunction()">
  				<option>--pilih doc--</option>
  				<option>Word</option>
  				<option>Presentation</option>
 
			</select> -->
		

		<div class="form-group">

			<label class="control-label">Select File (Laporan / Slide Presentasi)</label>
			
			<div class="form-group">
			    <form id="form-upload"  enctype="multipart/form-data">
			    <div class="form-group">
				 <select class="form-control" name="pilihan">
				  <option value="1">Laporan</option>
				  <option value="2">Slide Presentation</option>
				</select>
				</div>
			    <input type="hidden" name="id_tp" value="<?php echo $id ?>">
			      <input type="hidden" name="nip" value="<?php echo $nip ?>">
	               <div class="fileinput fileinput-new input-group" data-provides="fileinput">
	                <div class="form-control" data-trigger="fileinput"><i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
	                <span class="input-group-addon btn btn-default btn-file"><span class="fileinput-new"><i class="glyphicon glyphicon-paperclip"></i> Select file</span><span class="fileinput-exists"><i class="glyphicon glyphicon-repeat"></i> Change</span><input type="file" name="file" required></span>
	                <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput"><i class="glyphicon glyphicon-remove"></i> Remove</a>

	               
	                <!--  
	                <a href="" id="upload-btn" class="submit input-group-addon btn btn-success fileinput-exists"><i class="glyphicon glyphicon-open"></i> Upload</a> -->
	              </div>
	      				  <button type="submit" id="submitButton"   class="btn btn-success pull-right" name="submitButton" value="Upload">Upload</butoon>
            	</form>
            	</div>

            	<br/>
			
			 <!-- <form action="<?php echo site_url('panel_user/training_upload_doc')?>" id="form-upload">
			 <input type="hidden" name="id_tp" value="<?php echo $id ?>">
			      <input type="hidden" name="nip" value="<?php echo $nip ?>">
	               <div class="fileinput fileinput-new input-group" data-provides="fileinput">
	                <div class="form-control" data-trigger="fileinput"><i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
	                <span class="input-group-addon btn btn-default btn-file"><span class="fileinput-new"><i class="glyphicon glyphicon-paperclip"></i> Select file</span><span class="fileinput-exists"><i class="glyphicon glyphicon-repeat"></i> Change</span><input type="file" name="file"></span>
	                <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput"><i class="glyphicon glyphicon-remove"></i> Remove</a>
	                <!-- <a href="#" id="upload-btn" class="input-group-addon btn btn-success fileinput-exists"><i class="glyphicon glyphicon-open"></i> Upload</a> 
	              </div> 

	               <button data-provides="fileinput" id="upload-btn" class="fileinput-exists btn btn-success pull-right" data-dismiss="fileinput"><i class="glyphicon glyphicon-open"></i> Upload</button> 
            	</form>
 -->
			

			<br/>
			
			
			</div>
			

		<p id="demo"></p>
		 
		<br/>
		  <table  class="table table-striped table-bordered" style="margin-bottom: 10px" data-show-toggle="true">

                    <tbody data-link="row" class="rowlink">
                  
                    <th class="success" >Laporan Anda</th>
                   
                  

                    <tr  >
                          <td>  

                          <ul class="list-group list-doc"></ul> 
                                      			
            			 </td>
                          
                           
                     </tr>


                    </tbody>

          </table>
          <div class="progress" style="display:none">
				              <div id="progress-bar" class="progress-bar progress-bar-success progress-bar-striped active " role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 20%;">
				                20%
				              </div>
            			 </div>

          </div>

           

		</div>

		<div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Notes</h3>
        </div>
        <div class="panel-body">
            <ul>
                <li>The maximum file size for uploads in this  is <strong>50000 KB / 50MB</strong> .</li>
                <li>Only files (<strong>JPG, PDF, DOC, DOCX, PPT & PPTX</strong>) are allowed.</li>
               <!--  <li>Uploaded files will be deleted automatically after <strong>5 minutes or less</strong>.</li> -->
              
            </ul>
        </div>
    </div>
	</div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="confirm-delete2">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Delete  Confirm</h4>
      </div>
      <div class="modal-body">
        <p> Are you sure want to delete this ?</p>
      </div>
      <div class="modal-footer">
        <button type="button"  class="btn btn-default" data-dismiss="modal">Close</button>
         <button type="button" id="submitdel"  class="btn btn-danger">Delete</button>
        
     
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
 
<script>

$(function() {
	 var inputFile = $('input[name=file]');
	 var uploadURI = "<?php echo base_url()?>/panel_user/training_upload_doc";
	 var URLlist =  "<?php echo base_url()?>/panel_user/listFiles/<?php echo $id ?>";
	 var URLdel = "<?php echo base_url()?>/panel_user/delfiles/<?php echo $id ?>";
	 var progressBar =  $('#progress-bar');                 

	 listFileOnServer();

	 
	
	 $("#form-upload").on('submit',function(e){	
	 //$("#form-upload").submit(function(e){
	 	//alert('ready to upload');

		
		//event.preventDefault();
	 	var fileToUpload = inputFile[0].files[0];
	 	console.log(fileToUpload);
	 	//make sure file there to upload
	 	if(fileToUpload != 'undefined') {
	 		//provide that form data
	 		// taht would be sent to server through ajax
	 		var formData = new FormData($(this)[0]);;
	 		formData.append("file",fileToUpload);

	 		//now upload the file using $.ajax

	 		$.ajax({
	 			url : uploadURI,
	 			type : "POST",
	 			data : formData,
	 			processData : false,
  				
	 			cache: false,
	 			contentType:false,
	 			success : function(json) {
	 					
	 					listFileOnServer();

	 					try {
	 						  var obj = jQuery.parseJSON(json);
	 						  if (obj['STATUS']=='true') {
	 						  	alert('file success uploaded! Segera Kami akan verifikasi laporan Anda, Thanks.');
                               $('#demo2').html("<ul class='alert alert-success'><span>Sukses Upload Dokumen!</span></ul>");
                                setTimeout(function(){
                               $('.alert-success').slideUp('slow').fadeOut(function() {
                               
                               /* or window.location = window.location.href; */
                           });
                      }, 5000);
                          } else if (obj['STATUS']=='belum_upload') {

                          	alert('Gagal - Survey Provider level 1 belum disi!');
                          	 $('#demo2').html("<ul class='alert alert-danger'><span>Anda belum mengisi form Evaluasi level 1 cek di <b> Service / Pelatihanku</b> atau klik <a href='<?php echo site_url('panel_user/evaluation_form') ?>'>disini</a></span></ul>");
                          	return false;
                          	
                          	xhr: false;
                          }

                          else {
                              $('#demo2').html("<ul class='alert alert-danger'><span><strong>Upload Gagal</upload> - Dokumen tidak diziinkan!</span></ul>");
                          }
	 					}catch(e) {  
                   		alert('Error : Exception while request..');
                   		return false;
                   		$('.progress').hide();
                  	 }  
	 			},

	 			xhr : function(){

	 				var xhr = new XMLHttpRequest();
	 				xhr.upload.addEventListener("progress",function(event){
	 					
	 					if(event.lengthComputable) {
	 							var percentComplete =  Math.round( (event.loaded / event.total) * 100);
	 							//console.log(percentComplete);
	 							$('.progress').show();
	 							progressBar.css({width:percentComplete + "%"});
	 							progressBar.text(percentComplete + "%");

	 							 setTimeout(function(){
                               $('.progress').fadeOut('slow').fadeOut(function() {
                              
                               /* or window.location = window.location.href; */
	                           });
	                      }, 5000);

	 					};
	 						

	 				},false);

	 				return xhr;
	 				
	 				},



	 		});
	 	}
	 	return false;
	 });

	 $('body').on('click','.remove-file', function(){

	 	 $('#confirm-delete2').on('show.bs.modal', function(e) {
		    $('#submitdel').click(function(){
				 
				   var me = $('.remove-file');
			 		$.ajax({
			 			url : URLdel,
			 			type: 'POST',
			 			data: {file_to_remove: me.attr('data-file'),file_id : me.attr('data-id')},
			 			
			 			beforeSend: function(){
			 			 	  $('#demo2').html("Loading..");
		                
		           },
			 			success: function(){
			 				//me.closest('li').remove(); 
			 				 $('#confirm-delete2').modal('hide');
			 				 me.closest('li').fadeOut('slow'); 
			 				 $('#demo2').html('Redirectinig..');
			 				 window.location.reload();

			 			}
			 		});
				});
		});
	 		
	 });

	 function listFileOnServer(){
	 	var items = [];
	 		$.getJSON(URLlist,function(data){
	 			$.each(data,function(index,element){
	 			dataType : 'JSON',	
	 			items.push('<li class="list-group-item">' + element.laporan + '<div class="pull-right"><a href="javascript:void()" data-file="' + element.laporan + '" data-id="'+ element.noid +'" class="remove-file" data-target="#confirm-delete2" data-toggle="modal"><i class="glyphicon glyphicon-remove"></i></a></div></li> ');	

	 			//items.push.fadeIn('slow');	
	 			});
	 			
	 			$('.list-doc').html("").html(items.join(""));
	 			
	 			
	 		});
	 }
});
</script>

