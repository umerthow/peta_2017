<h3 class="breadcumb> "<a href="#"><i class="fa fa-fw fa-th-list"></i> List Evaluasi Level 4  </a></h3>

<?php if($this->session->userdata('belum')) {?>
  
    <ul class="alert alert-info" role="alert" >
   <span > <strong>Ooh! </strong></span> <?php echo $this->session->userdata('belum') <> '' ? $this->session->userdata('belum') : ''; ?><a href="#" class="alert-link"> </a>
    </ul>

<?php

}
?>

<?php if($this->session->userdata('message')) {?>
  
    <ul class="alert alert-info">
       <span class="glyphicon glyphicon-ok"></span> <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
        
        </ul>
    <?php
    }
    ?>

<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">Evaluasi Level 4</div>
  <div class="panel-body">
   <table class="table table-condensed">
    		<thead class="danger text-center">

            <th class="text-center">No</th>
            <th class="text-center">NIP</th>
            <th class="text-center">Nama Peserta</th>
            <th class="text-center">Point</th>
            <th class="text-center" >Status</th> 
             <th class="text-center" >Date</th>            
          
    
    		 </thead>   

    		 <tbody>
    		 	  <?php $no=1;?>
    				<?php if( !empty($list)){ ?>
	   					<? foreach($list as $result) {?>

   					 <tr>

                <td class="text-center"><?php  echo $no++;?></td>
   					 	  <td class="text-center"><?php  echo $result->nip?></td>
                <td class="text-center"><a href="<?php echo site_url('Verifikasi/detail_ev3/'.$result->id_tp) ?>"><?php  echo $result->nama_pegawai?></a></td>
              
            	<td class="text-center">  <?php  echo $result->nilai?></td>
               <td class="text-center">   <a href ="" class="btn btn-success btn-xs"> 
               	<?php  
               	$status =$result->status;
               	if ($status == 0 ){ ?>

               	Belum mengisi
               	<?php  } else if ($status == 1 ) { ?>

               	DONE <span class="glyphicon glyphicon-ok-sign"></span>  </a></td>
               	<?php  }?>
   				<td class="text-center">  <?php  echo tgl_indo($result->date) ?></td>	
    		 </tbody> 
    		 <?php } ?>
    <?php } ?>   
     </table>
  </div>

  <!-- Table -->
  <table class="table">
    ...
  </table>
</div>