<h3 class="breadcrumb"> Detail Trasaksi Pelelangan </h3>
<div class="panel panel-default">
<div class="panel-heading">
                <h3 class="panel-title"><strong> Informasi  Upload Bukti Trasaksi  </strong> 
                </div>

  <div class="panel-body">
   <?php if(!empty ($edit_pelelangan->judul)) { ?>
   	<table class="table table-hover" caption"Hello">
        <thead class="success">
        <tr><td class="col-md-2">Judul Penawaran</td><td> <strong><?php echo $edit_pelelangan->judul  ?></strong></td></tr>
        <tr><td>Deskripsi</td><td> <textarea name="deskripsi" id="InputMessage" class="form-control" rows="8"  data-toggle="tooltip" data-placement="right" title="Keterangan"><?php echo $edit_pelelangan->deskripsi  ?></textarea></td></tr>
         
        <tr>
        	<td colspan="2"><hr/></td>
        </tr>
        <tr><td>Nama Provider</td><td><strong><?php echo $edit_pelelangan->nama_provider ?></strong></td> 
</tr>
        <tr><td>Pemilik</td><td> <?php echo $edit_pelelangan->pemilik  ?></td></tr>


         <tr><td>Tanggal Upload</td><td><?php $pecah4 = explode(" ", $edit_pelelangan->date);
						
					    echo $this->waktu->formatDate($pecah4[0],"id");?>
					  &nbsp;&nbsp; Pukul : <?php echo " ".$pecah4[1]; ?></td></tr>

        <tr><td>DOC BUKTI TRANSFER</td><td><a href = "<?php echo base_url()."temp_file/".$edit_pelelangan->doc_bukti; ?>" target="_blank"> <button class="btn btn-default btn-sm dropdown-toggle" type="button"  aria-haspopup="true" aria-expanded="false">Lihat</button></a></td></tr>
       
    	</thead>

    	 
    	 <div class="form-group">

        
		
		</div>
		   <?php } else { ?>
    <ul class="alert alert-danger">
       
        <span class="glyphicon glyphicon-minus-sign"> </span><?php echo $this->session->userdata('cook') <> '' ? $this->session->userdata('cook') : ''; ?>
        </ul>
     <?php } ?>
    </table>
  </div>               
</div>

