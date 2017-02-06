<div class="breadcrumb">
 <div class="well well-sm pull-right">
                   <span class="btn btn-danger active"  > List Post Evaluasi Level 3  </span>
                 
 </div>
 </div>
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


<div class="panel with-nav-tabs panel-default">
  <div class="panel-heading panel-success">
  <ul class="nav nav-tabs">
    <li class="active"><a href="#home">Pendidikan Berjenjang</a></li>
    <li><a href="#menu1">Public Training</a></li>
  
  </ul>
  </div>
    <p> <div class="btn-group pull-right">
                   <a href="<?php echo site_url('Verifikasi/evaluasi_3_start') ?>" class="btn btn-info btn-xs" ><span class="glyphicon glyphicon-copy"></span> Pre Evaluasi </a>
                  <a href="<?php echo site_url('Verifikasi/evaluasi_3_post') ?>" class="btn btn-success btn-xs active"  data-target="#demo2" ><span class="glyphicon glyphicon-copy"></span> Post Evaluasi</a>
              </div></p>
<br/>
  
<div class="tab-content ">
    <div id="home" class="tab-pane fade in active" id="tab1danger">
      <div class="panel-body">
   <table class="table table-condensed" id="table1" style="font-size:12px">
    <thead>
        <tr>
          <th class="text-center" >no</th>
          <th class="text-center" >nip</th>
          <th class="text-center" >nama</th>
          <th class="text-center" >pelatihan</th>
        
         
       
        <th class="tg-yw4l">atasan</th>
        <th class="tg-yw4l">rekan</th>
        <th class="tg-yw4l">bawahan</th>
        <th class="text-center">post 3</th>
      </tr>
    </thead>
    <tfoot>
        <tr>
          <th class="text-center" rowspan="2">no</th>
          <th class="text-center" rowspan="2">nip</th>
          <th class="text-center" rowspan="2">nama</th>
          <th class="text-center" rowspan="2">pelatihan</th>
          <th class="text-center" colspan="3">assement</th>
          <th class="text-center" rowspan="2">post 3</th>
        </tr>
      <tr>
        <th class="tg-yw4l">atasan</th>
        <th class="tg-yw4l">rekan</th>
        <th class="tg-yw4l">bawahan</th>
      </tr>
      
    </tfoot>
         <tbody>
            <?php $no=1;?>
            <?php if (!empty($list_pddk)) {?>
              <?php foreach ($list_pddk as $key => $value) {?>

             <tr>

                <td class="text-center"><?php  echo $no++;?></td>
                <td class="text-center"><?php  echo $value->NIP?></td>
                <td class="text-center"><a href="<?php echo site_url('Verifikasi/detail_ev3_pddk_post/'.$value->id_tpddk) ?>"><?php  echo strtolower($value->Nama_pegawai) ?></a></td>
                <td class="text-center"><?php  echo strtoupper($value->judul_course) ?></td>
                
                 <td class="text-center">
                 <?php if(  $value->status_atasan_post == 1 ) { ?>
                 <span class="glyphicon glyphicon-ok-sign"></span> 
                 <?php } else { ?>
                 --
                 <?php } ?>

                 </td>


                 <td class="text-center"><?php if(  $value->status_rekan_post == 1 ) { ?>
                 <span class="glyphicon glyphicon-ok-sign"></span> 
                 <?php } else { ?>
                 -- 
                 <?php } ?></td>
                 <td class="text-center"><?php if(  $value->status_bawahan_post == 1 ) { ?>
                 <span class="glyphicon glyphicon-ok-sign"></span> 
                 <?php } else { ?>
                  -- 
                 <?php } ?></td>
                

            
               <td class="text-center">   <a href="<?php echo site_url('Verifikasi/check_point_post_pddk/'.$value->id_tpddk) ?>" class="btn btn-default btn-xs "  id="" value="RESEND" > RESEND <span class="glyphicon glyphicon-envelope" ></span> </a></td>
             </tr>
         
         <?php } ?>
    <?php } ?>   
    </tbody> 
     </table>
  </div>
    </div>

  <!-- Table -->
 

    <div id="menu1" class="tab-pane fade" >
    <div class="panel-body">
   <table class="table table-condensed" id="example3" style="font-size:12px">
        <thead class="danger text-center">
        <tr>
            <th class="text-center">No</th>
            <th class="text-center">NIP</th>
            <th class="text-center">Nama Peserta</th>
            <th class="text-center">Judul Pelatihan</th>
            <th class="text-center">Email Atasan</th>
           
            <th class="text-center" > Post Lv 3</th>
            <th class="text-center" > Notify</th>
        </tr>
        </thead> 
        <tfoot>
          <tr>
            <th class="text-center">No</th>
            <th class="text-center">NIP</th>
            <th class="text-center">Nama Peserta</th>
            <th class="text-center">Judul Pelatihan</th>
            <th class="text-center">Email Atasan</th>
          
            <th class="text-center" > Post Lv 3</th>
            <th class="text-center" > Notify</th>
        </tr>
        </tfoot>  

         <tbody>
            <?php $no=1;?>
            <?php if (!empty($list)) {?>
              <?php foreach ($list as $key => $value) {?>

             <tr>

                <td class="text-center"><?php  echo $no++;?></td>
                <td class="text-center"><?php  echo $value->NIP?></td>
                <td class="text-left"><a href="<?php echo site_url('Verifikasi/detail_ev3/'.$value->id_tp) ?>"><?php  echo strtolower($value->Nama_pegawai) ?></a></td>
                <td class="text-left col-md-4"><?php  echo strtolower($value->judul_course) ?></td>
                
                 <td class="text-left"><?php  echo $value->email_atasan?></td>
              
                 <?php 
                  $ect = ($value->status_post3);
                  $date = date("Y-m-d");
                  $mydate = strtotime($value->tgl_post3);
                  $curdate = strtotime($date); ?>
            
              
              <!-- <td class="text-center <?php if($mydate < strtotime('- 30 days')) { echo "bg-warning"; } else if (empty ($value->tgl_post3)) {echo "";} else { echo ""; } ?> " > -->

             <!--  <td class="text-center <?php if(empty ($value->tgl_post3)) { echo ""; } else if ($mydate < strtotime('-5 days')) {echo "bg-warning";} else { echo ""; } ?> " >
 -->
              <td class="text-center <?php if($ect == 1) { echo ""; } else if(empty ($value->tgl_post3)) { echo ""; } else if ($mydate < strtotime('-10 days')) {echo "bg-warning";} else { echo ""; } ?> " >


                <?php 
                if($mydate<$curdate && $ect == 0){
                ?>
                    <?php  echo $value->tgl_post3?> <?php if(empty ($value->tgl_post3)) { ?> ( belum diset) <?php } ?> 
                <?php
                } else if ($mydate<$curdate && $ect == 1) {?>

                   <a href ="" class="btn btn-success btn-xs"> DONE <span class="glyphicon glyphicon-ok-sign"></span>  </a>

               
                <?php 
                } else if ($mydate>=$curdate && $ect == 1) { ?>
                 <a href ="" class="btn btn-success btn-xs"> DONE <span class="glyphicon glyphicon-ok-sign"></span>  </a>

                 <?php } else if ($mydate>$curdate) {
                ?>
                <?php  echo $value->tgl_post3?>
                <?php 
                 } ?>
              </td>
              <td>
                <a href="<?php echo site_url('Verifikasi/check_point_post/'.$value->id_tp) ?>" class="btn btn-default btn-xs "  id="" value="RESEND" > RESEND <span class="glyphicon glyphicon-envelope" ><span> </a>
              </td>
        </tr>
         <?php } ?>
    <?php } ?>   
      </tbody> 
     </table>
  </div>
    </div>

</div>














           

 





<script type="text/javascript">
      $(document).ready(function() {

     $('#table1').DataTable();
      $('#example3').DataTable();
} );
</script>

<script>
$(document).ready(function(){
    $(".nav-tabs a").click(function(){
        $(this).tab('show');
    });
});
</script>