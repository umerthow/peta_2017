

<?php 
$kode = $this->session->userdata('kd_user');

?>
    </ul>
<?php

?>

<h3 class="breadcrumb"> List  Seluruh Pelatihan  </h3>

	<div class="col-md-12">

<table  id="datatable"  class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
  
        <th class="success">No</th>
        <th class="success">Nama Pelatihan</th>
        <th class="success">Provider</th>
        <th class="success">Kategori</th>
        <th class="success">Jadwal Mulai</th>
        <th class="success">Jadwal Selesai </th>
        <th class="success">Kota </th>
          <th class="success">Status </th>
        <th class="success">Action</th>
          </tr>
      </thead>
      <tfoot>
          <tr>
             <th class="success">No</th>
        <th class="success">Nama Pelatihan</th>
        <th class="success">Provider</th>
        <th class="success">Kategori</th>
        <th class="success">Jadwal Mulai</th>
        <th class="success">Jadwal Selesai </th>
        <th class="success">Kota </th>
          <th class="success">Status </th>
        <th class="success">Action</th>
          </tr>
      </tfoot>
       <tbody>
        <?php $no=1; ?>
        <?php foreach($prov as $result) {?>
 <tr>
          <td><?php echo $no++; ?></td>
          <td><a href="<?php echo site_url('provider/detail/'.$result->id_course) ?>"><?php echo $result->judul_course ?></a></td>
          <td><?php echo $result->nama_provider ?> </td>
          <td><?php echo $result->nama_kategori ?> </td>
           <td><?php echo $result->waktu_in ?> </td>
           <td><?php echo $result->waktu_out ?> </td>
            <td class="col-md-2"><?php echo $result->kota_course ?> </td>
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
          <td>

              <a data-toggle="modal" data-target="#confirm-delete" class="delete" title="Delete" id="deletepelatihan" href="<?php echo site_url('provider/delete_pelatihan/'.$result->id_course) ?>" > <i class="fa fa-times" ></i></a>
              &nbsp;
             <a href="<?php echo site_url('provider/update_pelatihan/'.$result->id_course) ?>"> <i class="fa fa-pencil"></i> </a>
            &nbsp;
            
         
           
           </td>
        </tr>
        <?php }?>
       
        
       </tbody>
  </table>
  </div>








      
                          
 </div>

  </div>


       
             <div class = "col-md-6" ></div>
    
                          

 </div>



     <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
         <a href="<?php echo site_url('provider/delete_pelatihan/'.$result->id_course)?>"class="btn btn-danger btn-ok">Delete</a>
    </div>
    </div>



  <script type="text/javascript">
      $('#confirm-delete').on('show.bs.modal', function(e) {
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        });
      
  </script>


<script type="text/javascript">
 $(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#datatable thead th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" class="form-control" placeholder="Search '+title+'" />' );
    } );
 
    // DataTable
    var table = $('#datatable').DataTable();
 
    // Apply the search
    table.columns().every( function () {
        var that = this;
 
        $( 'input', this.header() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );
} );
</script>
