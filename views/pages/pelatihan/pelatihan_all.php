

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
        <th class="success col-md-2">Nama Pelatihan</th>
        <th class="success">Provider</th>
        <th class="success">Kategori</th>
        <th class="success">Jadwal Mulai</th>
        <th class="success">Jadwal Selesai </th>
        <th class="success">Kota </th>
          <th class="success">Status </th>
     <!--    <th class="success">Action</th> -->
          </tr>
      </thead>

      <tbody></tbody>

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
     <!--    <th class="success">Action</th> -->
          </tr>
      </tfoot>
       
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
var table;
 
$(document).ready(function() {
 
    //datatables
    table = $('#datatable').DataTable({ 
 
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
 
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('provider/pelatihan_all_ajax')?>",
            "type": "POST"
        },
 
        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ -1 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],
 
    });
 
});
</script>
