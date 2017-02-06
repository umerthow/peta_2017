 
 <div class="panel panel-default">


<div class="row">


 <div class="col-md-12">
 <h4 class="breadcrumb"> <span class="glyphicon glyphicon-list"></span> Request Verification</h4> 


	<?php if($this->session->userdata('message')) {?>
  
    <ul class="alert alert-success">
       <span class="glyphicon glyphicon-ok"></span> <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
        
        </ul>
    <?php
    }
    ?>










    




	<div class="panel with-nav-tabs panel-default">
	  	<div class="panel-heading">
			  <ul class="nav nav-tabs">
			    <li class="active"><a href="#home">SEMUA</a></li>
			    <li><a href="#menu1">SUDAH PROSES</a></li>
			    <li><a href="#menu2">DITOLAK</a></li>
			    <li><a href="#menu3">COMING SOON</a></li>
			  </ul>
		</div>
		<div class="panel-body" style="font-size:12px">
		  <div class="tab-content ">
		  	<p class="text-center text-success" id="demo2"></p>


		    <div id="home" class="tab-pane fade in active" >
		    		
		    		<?php if($this->session->userdata('message')) {?>
						  
						    <ul class="alert alert-success">
						       <span class="glyphicon glyphicon-ok"> </span> <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
						        
						        </ul>
						    <?php
						    }
						    ?>


						    <?php if($this->session->userdata('berhasil')) {?>
						  
						    <ul class="alert alert-success">
						       
						        <span class="glyphicon glyphicon-ok"></span><?php echo $this->session->userdata('berhasil') <> '' ? $this->session->userdata('berhasil') : ''; ?>
						        </ul>
						    <?php
						    }
						    ?>

						    <table  id="example" class="table table-striped table-bordered " style="margin-bottom: 10px" data-show-toggle="true" >

						    <thead>
						      <tr>
						        <th class="info">No</th>
						        <th class=" info">NIP</th>
						    	<th class=" info">Nama Karyawan</th>
						        <th class="info ">Nama Provider </th>
						        <th class="info col-md-6">Judul Pelatihan </th>
								<th class="info col-md-2">Jadwal Mulai</th>
						        <th class="info">Kota </th>
						   	   
						   	     <th class="info col-md-2" >Action </th>
						     </tr>
						     </thead> 
						     <tfoot>
						       <tr>
						        <th class="info">No</th>
						        <th class=" info">NIP</th>
						    	<th class=" info">Nama Karyawan</th>
						        <th class="info">Nama Provider </th>
						        <th class="info col-md-6">Judul Pelatihan </th>
								<th class="info col-md-2">Jadwal Mulai</th>
						        <th class="info">Kota </th>
						   	   
						   	     <th class="info col-md-2" >Action </th>
						     </tr>
						     </tfoot>
						     <tbody>
						       	<?php $no=1; ?>
						       		<?php 
						       		if (!empty($prov)) { 
						       		foreach ($prov as $result) {?>
								    <tr  >
								    	     <td> <?php echo $no++; ?></td>
								    	      <td><a href="<?php echo site_url('training/detail_request_course/'.$result->id_request)?>"><?php echo $result->NIP ?></a></td>
								        	 <td><a href="<?php echo site_url('training/detail_request_course/'.$result->id_request)?>"><?php echo $result->Nama_pegawai ?></a></td>
								             <td><?php echo $result->nama_provider ?> </td>
								           <td><?php echo $result->judul_course ?> </td>
											     <td><?php echo tgl_indo($result->waktu_in) ?> </td>
								            <td><?php echo $result->kota_course ?> </td>
								            
								           <!-- <td> 

								              <a data-toggle="modal" data-target="#confirm-delete" class="delete" title="Delete" id="deletepelatihan" href="" > <i class="fa fa-times" ></i></a>
								        	    &nbsp;
								             <a href=""> <i class="fa fa-pencil"></i> </a>
								         
								            
								         
								           
								           </td> -->
								           <td>

								              <div class="btn-group btn-group-sm">
								              <button type="button" class="btn btn-primary">Process</button>
								              <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
								                <span class="caret"></span>
								              </button>
								              <ul class="dropdown-menu" role="menu">
								                <li><a href="<?php echo site_url('verifikasi/approval_request/'.$result->id_request)?>">Approve</a></li>
								                <li><a href="<?php echo site_url('verifikasi/rejected_request/'.$result->id_request)?>">Disapprove</a></li>
								                <li><a href="javascript:void(0)" class="open-blast"  onClick="Approvel()" data-id="<?php echo $result->id_request ?>">Carikan</a></li>
								              </ul>
								            </div> 


								           </td>
								        </tr >
								        <?php 
								    	}
								    }?>

								    </tbody>
								       
						       </table>
						      

		    </div>

		    <div id="menu1" class="tab-pane fade" >
		    	<table  id="example2" class="table table-striped table-bordered " style="margin-bottom: 10px" data-show-toggle="true" >
						     <thead>
							      <tr>
							        <th class="info">No</th>
							        <th class=" info">NIP</th>
							    	<th class=" info">Nama Karyawan</th>
							        <th class="info col-md-4 ">Nama Provider </th>
							        <th class="info col-md-6">Judul Pelatihan </th>
									<th class="info col-md-2">Jadwal Mulai</th>
							        <th class="info">Kota </th>
							     </tr>
						     </thead> 
						     <tfoot>
						      <tr>
							        <th class="info">No</th>
							        <th class=" info">NIP</th>
							    	<th class=" info">Nama Karyawan</th>
							        <th class="info col-md-4 ">Nama Provider </th>
							        <th class="info col-md-6">Judul Pelatihan </th>
									<th class="info col-md-2">Jadwal Mulai</th>
							        <th class="info">Kota </th>
							     </tr>
						     </tfoot>
						      
						     <tbody>

						       	<?php $no=1; ?>
						       		<?php 
						       		if (!empty($prov_approved)) { 
						       		foreach ($prov_approved as $result) {?>
								    <tr  >
								    	     <td> <?php echo $no++; ?></td>
								    	      <td><a href="<?php echo site_url('training/detail_request_course/'.$result->id_request)?>"><?php echo $result->NIP ?></a></td>
								        	
								        	 <td><a href="<?php echo site_url('training/detail_request_course/'.$result->id_request)?>"><?php echo $result->Nama_pegawai ?></a></td>
								             <td><?php echo $result->nama_provider ?> </td>
								           <td><?php echo $result->judul_course ?> </td>
											     <td><?php echo tgl_indo($result->waktu_in) ?> </td>
								            <td><?php echo $result->kota_course ?> </td>
								          
								         
								        </tr >
								        <?php 
								    	}
								    } else {

								    	echo "data not found";

								    }?>
								    </tr>
								    </tbody>
						       </table>
		    </div>
		     <div id="menu2" class="tab-pane fade" >
		    <table id="example3" class="table table-striped table-bordered " style="margin-bottom: 10px" data-show-toggle="true" >

		    	 <thead>
							      <tr>
							        <th class="info">No</th>
							        <th class=" info">NIP</th>
							    	<th class=" info">Nama Karyawan</th>
							        <th class="info col-md-4 ">Nama Provider </th>
							        <th class="info col-md-6">Judul Pelatihan </th>
									<th class="info col-md-2">Jadwal Mulai</th>
							        <th class="info">Kota </th>
							     </tr>
						     </thead> 
						     <tfoot>
						      <tr>
							        <th class="info">No</th>
							        <th class=" info">NIP</th>
							    	<th class=" info">Nama Karyawan</th>
							        <th class="info col-md-4 ">Nama Provider </th>
							        <th class="info col-md-6">Judul Pelatihan </th>
									<th class="info col-md-2">Jadwal Mulai</th>
							        <th class="info">Kota </th>
							     </tr>
						     </tfoot>

						      <tbody>

						       	<?php $no=1; ?>
						       		<?php 
						       		if (!empty($prov_approved)) { 
						       		foreach ($prov_rejected as $result) {?>
								    <tr  >
								    	     <td> <?php echo $no++; ?></td>
								    	      <td><a href="<?php echo site_url('training/detail_request_course/'.$result->id_request)?>"><?php echo $result->NIP ?></a></td>
								        	
								        	 <td><a href="<?php echo site_url('training/detail_request_course/'.$result->id_request)?>"><?php echo $result->Nama_pegawai ?></a></td>
								             <td><?php echo $result->nama_provider ?> </td>
								           <td><?php echo $result->judul_course ?> </td>
											     <td><?php echo tgl_indo($result->waktu_in) ?> </td>
								            <td><?php echo $result->kota_course ?> </td>
								          
								         
								        </tr >
								        <?php 
								    	}
								    } else {

								    	echo "data not found";

								    }?>
								    </tr>
								    </tbody>






						          
						       </table>
		    </div>
		     <div id="menu3" class="tab-pane fade" >
		    Cooming soon
		    </div>


		   </div>
		 </div>

	 </div>
     
</div>
</div>
</div>

<script>
$(document).ready(function(){
    $(".nav-tabs a").click(function(){
        $(this).tab('show');
    });
});
</script>

 
<script type="text/javascript">
    $(document).ready(function() {
    	$('#example').DataTable();
    	$('#example2').DataTable();
      	$('#example3').DataTable();
} );
</script>


<script type="text/javascript">

   $(document).on("click", ".open-blast", function () {
     var myId = $(this).data('id');
       
        $.ajax({
                url: "<?php echo  base_url()?>/verifikasi/carikan_blast",
                data:'id='+myId,
                type: "POST",
                cache: false,
                beforeSend: function(){

                  $('#demo2').html("Loading...");
                  $('#demo2').html("<img height='20px' width='20px' src='<?php echo base_url()?>/assets/4.gif' /> Loading..");
                },
                   success: function(json){      
                  try{  

                    var obj = jQuery.parseJSON(json);
                     alert( obj['STATUS']);

                     if (obj['STATUS']=='true') {
                               $('#demo2').html("<ul class='alert alert-success'><span><span class='glyphicon glyphicon-ok'></span> Berhasil mengirim email blast ke providers! </span></ul>");
                           //       $('.alert-success').slideUp('slow').fadeOut(function() {
                               
                           //     /* or window.location = window.location.href; */
                           // },5000);
                          }
                          else {
                              $('#demo2').html("Gagal!-tidak ada providers!");
                          }
                               
                                           //alert( obj['STATUS']);
                     // $('#demo2').html("<ul class='alert alert-success'><span>Sukses memproses data!</span></ul>");
                     // setTimeout(function(){
                     //       $('.alert-success').slideUp('slow').fadeOut(function() {
                     //           window.location.reload();
                     //           /* or window.location = window.location.href; */
                     //       });
                     //  }, 5000);
                   
                  }catch(e) {  
                   alert('Exception while request..');
                  }  
                  },
                  error: function(){      
                   alert('Error while request..');
                  },


              });
   });
 
</script>


