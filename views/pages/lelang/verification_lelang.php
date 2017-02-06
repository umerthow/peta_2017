

<div class="row">
  <?php if($this->session->userdata('message')) {?>
  
    <ul class="alert alert-success">
       <span class="glyphicon glyphicon-ok"></span> <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
        
        </ul>
    <?php
    }
    ?>
<h5>Halaman Lelang</h5>

 <div class="form-group">
	<a href="<?php  echo site_url('Pelelangan/tambah')?>" class="btn btn-info"><span class="glyphicon glyphicon-plus"></span> Daftar  </a>
</div>	

	<table class="table table-bordered" >
	<thead>
		<tr>
			<th>No</th>
			<th>Judul Pelatihan </th>
			
			<th>Tanggal Penutupan TOR</th>
			<th>Tanggal Aanwijzing</th>
			<th>Status</th>
			<th>Action</th>
	</thead>
	<tbody>
	<?php 
	$no=1;
	if(empty($lelang)) { ?>
	<tr>
			<td colspan="6">Tidak ada data</td>
	</tr>

		<?php } else { ?>


			<?php foreach($lelang as $key => $value) { ?>
					<tr>
						<td><?php echo $no++ ?></td>
						<td><a href="<?php echo site_url('Pelelangan/detail_item/'.$this->encrypt->encode($value->id_lelang)) ?>"><?php  echo $value->judul?></a></td>
						<td><?php

						$pecah4 = explode(" ", $value->waktu_aanwijzing);
						$pecah5 = explode (" ",$value->waktu_tor);
					    echo $this->waktu->formatDate($pecah5[0],"id");
					    echo " ".$pecah5[1];

						 //echo $value->waktu_aanwijzing?></td>
						<td><?php 
						echo $this->waktu->formatDate($pecah4[0],"id");
					    echo " ".$pecah4[1];?>
					    </td>
						<td class="col-md-2"><?php if ($value->status == 1) { ?>
						publish
								<?php }else if ($value->status == 2) { ?>
								Up Coming
								<?php }else { ?>
								Tidak Aktif
								<?php } ?>


						</td>
						<td> 
			        	<a href="<?php echo site_url('Pelelangan/edit_lelang/'.$value->id_lelang)?> "> <i class="fa fa-pencil"></i></a>
			            &nbsp;
			            <a href="javascript:void(0)"  data-href="<?php echo site_url('Pelelangan/delete_lelang/'.$value->id_lelang)?>" class="delete" data-toggle="modal" data-target="#confirm-delete" data-id="<?php echo $value->id_lelang ?>"><i class="fa fa-times "></i></a>          
			           </td>
					</tr>
				</tbody>
	<?php 	
			}
		} ?>
	</table>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="confirm-delete">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Delete  Confirm</h4>
      </div>
      <div class="modal-body">
        <p> Are you sure want to delete? &hellip;</p>
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