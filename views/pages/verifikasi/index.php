


<div class="row">


 <div class="col-md-12">
 <h3 class="breadcrumb"> Verifikasi Data Training</h3> 
 	

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
<div class="panel-body">
  <div class="tab-content ">
    <div id="home" class="tab-pane fade in active" id="tab1danger">
      <br/>
      						 <?php if($this->session->userdata('message')) {?>
						  
						    <ul class="alert alert-success">
						       <span class="glyphicon glyphicon-ok"></span> <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
						        
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

								<table class="table table-striped table-bordered table-hover" id="example" style="font-family:arial;font-size:11px" data-show-toggle="true" >


								<thead>
									 <tr>
									 	<th class="info">No</th>
								    	<th class=" info col-md-4">Nama Pelatihan</th>
								        <th class="info">Kategori</th>
										<th class="info">Jadwal Mulai</th>
										<th class="info">Jadwal Selesai </th>
								        <th class="info">Kota </th>
								        <th class="info">Edit </th>
								       	<th  class="info col-md-2"  >Action</th>
									 </tr>
								</thead>



								<tbody>
									 <?php $no=1; ?>
								    <?php foreach($prov as $result) {?>
								    <tr  >
								    	     <td> <?php echo $no++; ?></td>
								        	 <td><a href="<?php echo site_url('provider/detail/'.$result->id_course) ?>"><?php echo $result->judul_course ?></a></td>
								           <td><?php echo $result->nama_kategori ?> </td>
											     <td><?php echo $result->waktu_in ?> </td>
											     <td><?php echo $result->waktu_out ?> </td>
								            <td><?php echo $result->kota_course ?> </td>
								           <td><a  href="<?php echo site_url('provider/delete_pelatihan/'.$result->id_course) ?>" onclick="return confirm('Are you sure you want to delete this item?');" > <i class="fa fa-times" ></i></a>
								        	    &nbsp;
								             <a href="<?php echo site_url('provider/update_pelatihan/'.$result->id_course) ?>"> <i class="fa fa-pencil"></i> </a>
								         &nbsp;
								            
								         
								           
								           </td>
								           <td>

								              <div class="btn-group">
								              <button type="button" class="btn btn-primary">Process</button>
								              <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
								                <span class="caret"></span>
								              </button>
								              <ul class="dropdown-menu" role="menu">
								                <li><a href="<?php echo site_url('verifikasi/approval/'.$result->id_course)?>">Approve</a></li>
								                <li><a href="<?php echo site_url('verifikasi/rejected/'.$result->id_course)?>">Disapprove</a></li>
								              </ul>
								            </div> 


								           </td>
								        </tr >
								        <?php }?>

								</tbody>
								          
								<foot>
									<tr>
									 	<th class="info">No</th>
								    	<th class=" info col-md-4">Nama Pelatihan</th>
								        <th class="info">Kategori</th>
										<th class="info">Jadwal Mulai</th>
										<th class="info">Jadwal Selesai </th>
								        <th class="info">Kota </th>
								        <th class="info">Edit </th>
								       	<th  class="info col-md-2" >Action</th>
									 </tr>
								</foot>
						       
						       
								 
						       </table>
						       <!-- <div class="col-md-12 text-center">
                              <?php echo $pagination; ?>
                          </div> -->
						        
						        
    </div>




































    <div id="menu1" class="tab-pane fade">
     				
<!-- <input type="text" id="search" placeholder="Type to search" class="form-control"> -->
								<table id="example2" class="table table-striped table-bordered table-hover" style="font-family:arial;font-size:11px" >



						        <thead>
						        <tr>
						        <th class="info">No</th>
						    	<th class="info col-md-3">Nama Pelatihan</th>
						        <th class="info">Kategori</th>
								<th class="info">Jadwal Mulai</th>
								<th class="info">Jadwal Selesai </th>
						        <th class="info">Kota </th>
						       	<th class="info">Action</th>
						       	</tr>
						       	</thead>
						       

								          

								          <tbody>
								           <?php $no=1; ?>
								    <?php foreach($prov_approved as $result) {?>
								    <tr  >
								    	     <td> <?php echo $no++; ?></td>
								        	 <td><a href="<?php echo site_url('provider/detail/'.$result->id_course) ?>"><?php echo $result->judul_course ?></a></td>
								           <td><?php echo $result->nama_kategori ?> </td>
											     <td><?php echo $result->waktu_in ?> </td>
											     <td><?php echo $result->waktu_out ?> </td>
								            <td><?php echo $result->kota_course ?> </td>
								           <td> 

								              <a href="<?php echo site_url('provider/delete_pelatihan/'.$result->id_course) ?>" class="delete" data-confirm="Are you sure to delete this item?" > <i class="fa fa-times" ></i></a>
								        	    &nbsp;
								             <a href="<?php echo site_url('provider/update_pelatihan/'.$result->id_course) ?>"> <i class="fa fa-pencil"></i> </a>
								             &nbsp;
								          <a href="<?php echo site_url('provider/cetak_pelatihan/'.$result->id_course) ?> "target="_blank" data-popup="true"> <i class="fa fa-print"></i> </a>
								            
								         
								           
								           </td>
								           <!-- <td>

								              <div class="btn-group">
								              <button type="button" class="btn btn-primary">Process</button>
								              <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
								                <span class="caret"></span>
								              </button>
								              <ul class="dropdown-menu" role="menu">
								                <li><a href="#">Approve</a></li>
								                <li><a href="#">Disapprove</a></li>
								              </ul>
								            </div> 


								           </td> -->
								        </tr >
								        <?php }?>
								     </tbody>

								     	<tfoot>
						       	<tr>
						       	<th class="info">No</th>
						    	<th class="info col-md-3">Nama Pelatihan</th>
						        <th class="info">Kategori</th>
								<th class="info">Jadwal Mulai</th>
								<th class="info">Jadwal Selesai </th>
						        <th class="info">Kota </th>
						       	<th class="info">Action</th>	
						       	</tr>	
						       	</tfoot>
					</table>
    </div>























    <div id="menu2" class="tab-pane fade">
      <table id="example3" class="table table-striped table-bordered table-hover"  style="font-family:arial;font-size:11px" data-show-toggle="true">
						       
						       <thead>
						       <tr>
						        <th class="info">No</th>
						    	<th class="info">Nama Pelatihan</th>
						        <th class="info">Kategori</th>
								<th class="info">Jadwal Mulai</th>
								<th class="info">Jadwal Selesai </th>
						        <th class="info">Kota </th>
						       	<th class="info">Action</th>
						       	</tr>
						       	</thead>

						       	<tfoot>
						       		<tr>
							        <th class="info">No</th>
							    	<th class="info">Nama Pelatihan</th>
							        <th class="info">Kategori</th>
									<th class="info">Jadwal Mulai</th>
									<th class="info">Jadwal Selesai </th>
							        <th class="info">Kota </th>
							       	<th class="info">Action</th>
							       	</tr>

						       	</tfoot>

								    


								     <tbody data-link="row" class="rowlink">
								           <?php $no=1; ?>
								    <?php foreach($prov_rejected as $result) {?>
								    <tr  >
								    	     <td> <?php echo $no++; ?></td>
								        	 <td><a href="<?php echo site_url('provider/detail/'.$result->id_course) ?>"><?php echo $result->judul_course ?></a></td>
								           <td><?php echo $result->nama_kategori ?> </td>
											     <td><?php echo $result->waktu_in ?> </td>
											     <td><?php echo $result->waktu_out ?> </td>
								            <td><?php echo $result->kota_course ?> </td>
								           <td> 

								             <a href="<?php echo site_url('provider/delete_pelatihan/'.$result->id_course) ?>" class="delete" data-confirm="Are you sure to delete this item?" > <i class="fa fa-times" ></i></a>
								        	    &nbsp;
								            
								            
								         
								           
								           </td>
								           <!-- <td>

								              <div class="btn-group">
								              <button type="button" class="btn btn-primary">Process</button>
								              <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
								                <span class="caret"></span>
								              </button>
								              <ul class="dropdown-menu" role="menu">
								                <li><a href="#">Approve</a></li>
								                <li><a href="#">Disapprove</a></li>
								              </ul>
								            </div> 


								           </td> -->
								        </tr >
								        <?php }?>
								        </tbody>
					</table>

					
    </div>











    <div id="menu3" class="tab-pane fade">
      <h3>OOPS!!</h3>
      <p>Under Construction.</p>
    </div>
    <br/>
  </div>
</div>
</div>

 </div>
</div>

</div>

   <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a href="<?php echo site_url('provider/delete/'.$result->id_provider)?>"class="btn btn-danger btn-ok">Delete</a>
            </div>
        </div>

<script>
$(document).ready(function(){
    $(".nav-tabs a").click(function(){
        $(this).tab('show');
    });
});
</script>

<script>
$('.delete').on("click", function (e) {
    e.preventDefault();

    var choice = confirm($(this).attr('data-confirm'));

    if (choice) {
        window.location.href = $(this).attr('href');
    }
});
</script>



  <script>
var $rows = $('#table tr');
$('#search').keyup(function() {
    var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();
    
    $rows.show().filter(function() {
        var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
        return !~text.indexOf(val);
    }).hide();
});
  </script>

 <script type="text/javascript">
      $(document).ready(function() {
      $('#example').DataTable();
     
      $('#example3').DataTable();   
} );
</script>

<script type="text/javascript">
	$(document).ready(function() {


    // Setup - add a text input to each footer cell
    $('#example2 tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" class="form-control" placeholder="Search '+title+'" />' );

    } );
 
    // DataTable
    var table = $('#example2').DataTable({

    dom: 'Bfrtip',
   
    buttons: ['copy', 'excel', 'pdf'],
       "sScrollX": "100%",
        "sScrollXInner": "100%",
        "bScrollCollapse": true
    


    });
 
    // Apply the search
    table.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );
} );
</script>