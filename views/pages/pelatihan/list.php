<h3 class="breadcumb> "<a href="#"><i class="fa fa-fw fa-th-list"></i> List Pelatihan </a></h3>




<div class="panel panel-default">

<div class="panel-body" style="font-size:12px">

 <div class="tab-content ">
 <label>Internal Training</label>
    <table class="table" id="example" cellspacing="0" width="100%">
    <thead class="success">
            <th class="success">No</th>
            <th class="success col-md-4">Judul Pelatihan</th>
            <th class="success">Bidang</th>
           
            <th class="success">Rencana Lokasi Training</th>
            <th class="success">Contact Person</th>
            
            <th class="success">Action</th>
            <th class="success">Status</th>
     </thead>    



    <tbody>
    <?php $no=1;?>
    <?php 
    if( !empty($list_pddk)){
    foreach($list_pddk as $result) 
      $judul = strtolower($result->judul_course);

      {?>
   
    <tr>
             <td class="active"> <?php echo $no++ ?></td>
             <td>  <?php echo ucwords($judul) ?> </td>
             <td><?php echo $result->nama_kategori ?> </td>
            
             <td><?php echo $result->tempat_pelatihan ?> </td>
             <td><?php echo $result->CP ?> </td>
             
           <!--   <td> 
            <a href="<?php echo site_url('provider/update_pelatihan/'.$result->id_course) ?>"> <i class="fa fa-pencil"></i></a>
            &nbsp;
            <a href="javascript:void()" data-href="<?php echo site_url('provider/delete_pelatihan/'.$result->id_course)?>"  data-toggle="modal" data-target="#confirm-delete" class="delete" title="Delete" id="deletepelatihan" data-id="<?php echo $result->id_course ?>"> <i class="fa fa-times"></i></a>
        
            &nbsp;
            <a href="<?php echo site_url('provider/detail/'.$result->id_course) ?>"> <i class="fa fa-arrow-right"></i></a>
            &nbsp;

            
           </td> -->
           <td>
            <a href="javascript:void()" data-href="<?php echo site_url('provider/delete_pelatihan_pddk/'.$result->id_course)?>"  data-toggle="modal" data-target="#confirm-delete2" class="delete" title="Delete" id="deletepelatihan2" data-id="<?php echo $result->id_course ?>"> <i class="fa fa-times"></i></a>
           </td>
           <td>
            <?php
            $var = $result->status; 
                if ($var  == 0 ) {

                    echo "<span class='label label-default'>Pending</span>";
                } else if ($var  == 3)   {

                                echo "<span class='label label-success'>Approved</span>";

                             }else if ($var  == 4) {


                                 echo "<span class='label label-danger'>Rejected</span>";
                             }


             


              ?>
           </td>
        </tr >
        
       
        <?php } ?>
    <?php } else { ?>
<td class="active"> <?php echo $no++ ?></td>
             <td> no </td>
             <td> </td>
            
             <td>d</td>
             <td>a </td>
              <td>t </td>
               <td>a </td>

    <?php } ?>
 </tbody>
      <foot class="success">
            <th class="success">No</th>
            <th class="success col-md-4">Judul Pelatihan</th>
            <th class="success">Bidang</th>
           
            <th class="success">Rencana Lokasi Training</th>
            <th class="success">Contact Person</th>
            
            <th class="success">Action</th>
            <th class="success">Status</th>
     </foot> 













    </table>
    </div>
    </div>
 </div>
 



<div class="panel panel-default">
<div class="panel-body" style="font-size:12px">
 <div class="tab-content ">
 <label>Public Training</label>
    <table class="table" id="example2">
    <thead class="success">
            <th class="success">No</th>
            <th class="success col-md-4">Judul Pelatihan</th>
            <th class="success">Bidang</th>
           
            <th class="success">Rencana Lokasi Training</th>
            <th class="success">Contact Person</th>
            
            <th class="success">Action</th>
            <th class="success">Status</th>
     </thead>    
      <tfoot class="success">
            <th class="success">No</th>
            <th class="success col-md-4">Judul Pelatihan</th>
            <th class="success">Bidang</th>
           
            <th class="success">Rencana Lokasi Training</th>
            <th class="success">Contact Person</th>
            
            <th class="success">Action</th>
            <th class="success">Status</th>
     </tfoot>      
    <tbody>
    <?php $no=1;?>
    <?php 
    if( !empty($provider)){
    foreach($provider as $result)

     { $judul = strtolower($result->judul_course);?>
    <tr>
             <td class="active"> <?php echo $no++ ?></td>
             <td>  <a href="<?php echo site_url('provider/detail/'.$result->id_course) ?>"> <?php echo ucwords($judul) ?> </a></td>
             <td><?php echo $result->nama_kategori ?> </td>
            
             <td><?php echo $result->tempat_pelatihan ?> </td>
             <td><?php echo $result->CP ?> </td>
             
             <td class="col-md-2"> 
            <a href="<?php echo site_url('provider/update_pelatihan/'.$result->id_course) ?>"> <i class="fa fa-pencil"></i></a>
            &nbsp;
            <a href="javascript:void()" data-href="<?php echo site_url('provider/delete_pelatihan/'.$result->id_course)?>"  data-toggle="modal" data-target="#confirm-delete" class="delete" title="Delete" id="deletepelatihan" data-id="<?php echo $result->id_course ?>"> <i class="fa fa-times"></i></a>
        
            &nbsp;
            <a href="<?php echo site_url('provider/detail/'.$result->id_course) ?>"> <i class="fa fa-arrow-right"></i></a>
            &nbsp;

            
           </td>
           <td>
            <?php
            $var = $result->status; 
                if ($var  == 0 ) {

                    echo "<span class='label label-default'>Pending</span>";
                } else if ($var  == 3)   {

                                echo "<span class='label label-success'>Approved</span>";

                             }else if ($var  == 4) {


                                 echo "<span class='label label-danger'>Rejected</span>";
                             }


             


              ?>
           </td>
        </tr >
        
       
        <?php } ?>
    <?php }else {  ?>
          <?php if($this->session->userdata('belum')) {?>
            
              <ul class="alert alert-info" role="alert" >
             <span > <strong>Ooh! </strong></span> <?php echo $this->session->userdata('belum') <> '' ? $this->session->userdata('belum') : ''; ?><a href="#" class="alert-link"> </a>
              </ul>

          <?php } ?>

          <?php } ?>
<?php ?>
     </tbody>
    </table>
    </div>
    </div>
 </div>
 
 
 


   
<div class="modal fade" tabindex="-1" role="dialog" id="confirm-delete">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Delete  Confirm</h4>
      </div>
      <div class="modal-body">
        <p> Are you sure want to delete this item? &hellip;</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <a class="btn btn-danger btn-ok">Delete</a>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" tabindex="-1" role="dialog" id="confirm-delete2">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Delete  Confirm</h4>
      </div>
      <div class="modal-body">
        <p> Are you sure want to delete this item ?? &hellip;</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <a class="btn btn-danger btn-ok">Delete</a>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
 
 <script>
$('#confirm-delete').on('show.bs.modal', function(e) {
    $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
});
    </script>
    <script>
$('#confirm-delete2').on('show.bs.modal', function(e) {
    $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
});
    </script>

<script type="text/javascript">
      $(document).ready(function() {
    $('#example').DataTable();
     $('#example2').DataTable();
    
} );
</script>