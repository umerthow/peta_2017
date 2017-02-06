<style>
body {
  margin: 0;
 background: #ffffff;

 
  
}



</style>

   <div class="col-md-12" style="font-size:13px">

      <h3><i class="glyphicon glyphicon-dashboard"></i> Pelatihan Saya </h3>  
      <hr>
  <?php if (!empty($course)) { ?>
      <p> Daftar pelatihan Anda  : </p>

     
 
      <table  class="table table-striped table-bordered table-hover" style="margin-bottom: 10px" data-show-toggle="true">
                    <tbody data-link="row" class="rowlink">
                  
                    <th class="success" >No</th>
                    <th class="success col-md-4" >Nama Pelatihan</th>
                    <th class="success" >Kategori</th>
                    <th class="success col-md-2" >Jadwal Mulai</th>
                    
                     <th class="success">Status </th>
                     
                      <th class="success col-md-3">Evaluasi </th>
                        <th class="success col-md-3">Laporan </th>
                   


                           <?php $no=1; ?>
                    <?php foreach($course as $result) {?>
                    <tr  >
                          <td> <?php echo $no++; ?></td>
                           <td ><a href="<?php echo site_url('panel_user/detail/'.$this->encrypt->encode($result->id_course)) ?>"><?php echo $result->judul_course ?></a></td>
                           <td><?php echo $result->nama_kategori ?> </td>
                           <td><?php echo tgl_indo($result->waktu_in )?> </td>
                       
                              <td class="text-center">
                              <?php
                                    $var = $result->status; 
                                        if ($var  == 0 ) {

                                            echo "<span class='label label-default'>Pending - Menunggu Evaluasi Atasan</span>";
                                        } else if ($var  == 1)   {

                                                        echo "<span class='btn btn-info btn-xs'>Approved by Diklat</span>";

                                                     }else if ($var == 5) {

                                                    echo "<span class='btn btn-success btn-xs' active>Menuggu Persetujuan Diklat </span>"; 
                                                    }else if ($var  == 2) {


                                                         echo "<span class='btn btn-danger btn-xs'>Rejected</span>";
                                                     }

                                ?>
                               </td>



                               <!-- <td> 
                                <?php $evaluasi = $result->status_evaluasi_1;
                                $date = date("Y-m-d");
                               $mydate = strtotime($result->waktu_out);
                                  if( $date > $mydate  ) {
                                ?>
                                 Dibuka Tgl <?php echo tgl_indo($result->waktu_out) ?>
                               
                               <?php } else if ($date < $mydate ) { ?>
                                 <a href ="<?php echo site_url('panel_user/evaluation_form') ?>" class="btn btn-warning btn-xs"> BELUM ISI SURVEY <span class="glyphicon glyphicon-check"></span>  </a>
                               <?php  }else if ($evaluasi==0){?>
                                 <a href ="<?php echo site_url('panel_user/evaluation_form') ?>" class="btn btn-warning btn-xs"> BELUM ISI SURVEY <span class="glyphicon glyphicon-check"></span>  </a>

                               <?php } else if ($evaluasi == 1) { ?>

                                <p class="btn btn-success btn-xs">Sudah Mengisi</p>
                               <?php } ?>


                               </td> -->

                                <td> 
                                <?php if($result->status == 2) { ?>

                                <?php } else {?>
                                <?php $evaluasi = $result->status_evaluasi_1;
                                $date = date("Y-m-d");
                               $mydate = strtotime($result->waktu_out);
                                  if( $date > $mydate  ) {
                                ?>
                                 Dibuka Tgl <?php echo tgl_indo($result->waktu_out) ?>
                               
                               <?php } else  if ($evaluasi==1){?>
                                 <p class="text-success">Sudah Mengisi</p>

                               <?php } else if ($evaluasi == 0) { ?>

                               
                               <a href ="<?php echo site_url('panel_user/evaluation_form') ?>" class="btn btn-warning btn-xs"> BELUM ISI SURVEY <span class="glyphicon glyphicon-check"></span>  </a>
                               <?php } ?>

                                <?php } ?>



                               </td>

                                <td>

                                <?php if($result->status == 2) { ?>

                                <?php } else {?>

                                  <?php if($result->status_laporan == 1 ) { ?>

                              <a href ="<?php echo site_url('panel_user/upload_doc/'.$this->encrypt->encode($result->id_tp)) ?>" class="btn btn-info btn-xs"> DONE - VERIFIED <span class="glyphicon glyphicon-check"></span>   </a>
                                <?php } else { ?>
                                  <a href ="<?php echo site_url('panel_user/upload_doc/'.$this->encrypt->encode($result->id_tp)) ?>" class="btn btn-info btn-xs"> UPLOAD LAPORAN <span class="glyphicon glyphicon-open"></span>  </a>
                                  <?php } ?>


                                <?php }?>

                               </td>
                              <!-- <td><a href="<?php echo site_url('panel_user/usul_pdf/'.$this->encrypt->encode($result->id_tp))?>"><span class="glyphicon glyphicon-download"></span> Cetak</a></td> -->
                           </tr >
                        <?php }?>
        </table>
        <?php } else { ?>

        <p class="alert alert-info"> <span class="glyphicon glyphicon-exclamation-sign"></span> Anda belum pernah mendaftar pelatihan, Silahkan ikuti pelatihan yang ditawarkan di Homepage </p>

        <?php } ?>



         <?php if (!empty($list_pddk)) { ?>
      <p> Daftar Pendidikan Berjenjang Anda  yang sedang di proses : </p>
      <table  class="table table-striped table-bordered table-hover" style="margin-bottom: 10px" data-show-toggle="true">
                    <tbody data-link="row" class="rowlink">
                    <th class="success">No</th>
                    <th class="success col-md-4">Nama Pelatihan</th>
                    <th class="success">Kategori</th>
                    <th class="success col-md-2">Jadwal Mulai</th>
                    <th class="success col-md-2">Jadwal Selesai </th>
                    <th class="success">Kota </th>
                     <th class="success">Status </th>
                      <th class="success col-md-3">Assemnt Atasan </th>
                      <th class="success col-md-3">Assemnt rekan </th>
                      <th class="success col-md-3">Assemnt bawahan </th>

                      


                           <?php $no=1; ?>
                    <?php foreach($list_pddk as $result) {?>
                    <tr  >
                          <td> <?php echo $no++; ?></td>
                           <td ><a href="#"><?php echo $result->judul_course ?></a></td>
                           <td><?php echo $result->nama_kategori ?> </td>
                           <td><?php echo tgl_indo($result->waktu_in )?> </td>
                           <td><?php echo tgl_indo($result->waktu_out )?> </td>
                            <td><?php echo $result->kota_course ?> </td>
                            <td><?php echo $result->status ?> </td>
                               <td class="text-center">
                                 <?php if(  $result->status_atasan == 1 ) { ?>
                                 <span class="glyphicon glyphicon-ok-sign"></span> 
                                 <?php } else { ?>
                                 --
                                 <?php } ?>

                                 </td>


                                 <td class="text-center"><?php if(  $result->status_rekan == 1 ) { ?>
                                 <span class="glyphicon glyphicon-ok-sign"></span> 
                                 <?php } else { ?>
                                 -- 
                                 <?php } ?></td>
                                 <td class="text-center"><?php if(  $result->status_bawahan == 1 ) { ?>
                                 <span class="glyphicon glyphicon-ok-sign"></span> 
                                 <?php } else { ?>
                                  -- 
                                 <?php } ?></td>
                              <!-- <td><a href="<?php echo site_url('panel_user/usul_pdf/'.$this->encrypt->encode($result->id_tp))?>"><span class="glyphicon glyphicon-download"></span> Cetak</a></td> -->
                           </tr >
                        <?php }?>
        </table>
        <?php } else { ?>

        <p class="alert alert-info"> -- </p>

        <?php } ?>

    </div>
                   









































     