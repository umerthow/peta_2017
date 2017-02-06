<div class="row">
<h4 class="breadcumb"> List Keikutsertaan Penawaran </h4>

	<table class="table table-bordered" >
	<thead>
		<tr>
			<th>No</th>
			<th>Judul </th>
			<th>Tanggal Pendaftaran </th>
			
			<th>Status</th>
			
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
						<td><?php echo $value->judul ?></td>
						<td><?php 
						$pecah5 = explode (" ",$value->date);
					    echo $this->waktu->formatDate($pecah5[0],"id");
					    echo " ".$pecah5[1]; ?></td>
						<td><?php if ($value->status == 1) { ?>
<span class='label label-success'>Disetujui	</span>							<?php }else if ($value->status == 0) { ?>
								<span class='label label-default'>Pending	</span>	
								<?php }else { ?>
								Tidak Aktif
								<?php } ?></td>
						
					</tr>
				</tbody>
	<?php 	
			}
		} ?>
	</table>
</div>