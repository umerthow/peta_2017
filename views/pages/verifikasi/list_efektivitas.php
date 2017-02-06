<h3></h3>

<div class="breadcrumb">
 <div class="well well-sm pull-right">
                   <a href="#" class="btn btn-success" disabled > List Efektivitas </a>
                 
 </div>


<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%" style="font-family:arial;font-size:11px" >
       <thead>
            <tr>
            	<th>#</th>
                <th>NIP</th>
                <th>Nama Karyawan</th>
                <th>Nama Pelatihan</th>
                <th>Pre Evaluasi</th>
                <th>Post Evaluasi</th>
               	<th>Delta</th>
            </tr>
        </thead>
		<tfoot>
            <tr>
            	<th>#</th>
               	<th>NIP</th>
                <th>Nama Karyawan</th>
                <th>Nama Pelatihan</th>
                <th>Nilai Pre Evaluasi</th>
                <th>Nilai Post Evaluasi</th>
                <th>Delta</th>
               
            </tr>
        </tfoot>
        <tbody>
        	<?php $no=1; ?>
						       		<?php 
						       		if (!empty($list)) { 
						       		foreach ($list as $result)
						       		 { $judul = strtoupper($result->judul_course); $delta = ($result->post_evaluasi)-($result->pre_evaluasi) ?>
						       		 	<tr>
						                 <td> <?php echo $no++; ?></td>
						                 <td><?php echo $result->NIP ?></td>
						               		<td><?php echo $result->Nama_pegawai ?></td>
						                	<td><?php echo $judul ?> </td>
						                	<td><?php echo $result->pre_evaluasi ?> </td>
						                	<td><?php echo $result->post_evaluasi ?> </td>

						                	<td><?php if ($delta<0 ) {  echo 0;

						                	} else { 
						                		echo  $delta;
						                	}
						                	?> </td>
						                </tr>
						                <?php 
								    	}
								    } else {

								    	echo "data not found";

								    }?>
        </tbody>
   </table>
 </div>

 <script type="text/javascript">
    	$(document).ready(function() {
    $('#example').DataTable();
    
} );
</script>