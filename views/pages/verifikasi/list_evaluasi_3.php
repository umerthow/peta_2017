<div class="breadcrumb">
 <div class="well well-sm pull-right">
                   <span class="btn btn-danger active"  > List Pre Evaluasi Level 3  </span>
                 
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
          <li class="active" ><a href="#internal" data-toggle="tab">Training Internal</a></li>
          <li> <a href="#public" data-toggle="tab">Public Training</a></li>
        
        </ul>
  </div>

  <div class="panel-body" style="font-size:12px">
 <p> <div class="btn-group pull-right">
                   <a href="<?php echo site_url('Verifikasi/evaluasi_3_start') ?>" class="btn btn-info btn-xs active" ><span class="glyphicon glyphicon-copy"></span> Pre Evaluasi </a>
                  <a href="<?php echo site_url('Verifikasi/evaluasi_3_post') ?>" class="btn btn-success btn-xs"  data-target="#demo2" ><span class="glyphicon glyphicon-copy"></span> Post Evaluasi</a>
              </div></p>
  <br/>
 
  <div class="tab-content ">
    <div id="internal" class="tab-pane fade in active" >

      
  <br/>
  
   <table class="table table-condensed" id="table1" style="font-size:12px">
      <thead>
        <tr>
          <th class="text-center col-md-1" rowspan="2">no</th>
          <th class="text-center" rowspan="2">nip</th>
          <th class="text-center col-md-2" rowspan="2">nama</th>
          <th class="text-center col-md-6" rowspan="2">pelatihan</th>
          <th class="text-center" colspan="3">assement</th>
          <th class="text-center col-md-2" rowspan="2">Notify</th>
       </tr>
      <tr>
        <th class="tg-yw4l">atasan</th>
        <th class="tg-yw4l">rekan</th>
        <th class="tg-yw4l">bawahan</th>
      </tr>
    </thead>
    <tfoot>
        <tr>
          <th class="text-center" rowspan="2">no</th>
          <th class="text-center" rowspan="2">nip</th>
          <th class="text-center" rowspan="2">nama</th>
          <th class="text-center" rowspan="2">pelatihan</th>
          <th class="text-center" colspan="3">assement</th>
         <th class="text-center col-md-2" rowspan="2">Notify</th>
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
                <td class="text-center col-md-2"><a href="<?php echo site_url('Verifikasi/detail_ev3_pddk/'.$value->id_tpddk) ?>"><?php  echo strtolower($value->Nama_pegawai) ?></a></td>
                <td class="text-left col-md-6"><?php  echo strtoupper($value->judul_course) ?></td>
                
                 <td class="text-center">
                 <?php if(  $value->status_atasan == 1 ) { ?>
                 <span class="glyphicon glyphicon-ok-sign"></span> 
                 <?php } else { ?>
                 --
                 <?php } ?>

                 </td>


                 <td class="text-center"><?php if(  $value->status_rekan == 1 ) { ?>
                 <span class="glyphicon glyphicon-ok-sign"></span> 
                 <?php } else { ?>
                 -- 
                 <?php } ?></td>
                 <td class="text-center"><?php if(  $value->status_bawahan == 1 ) { ?>
                 <span class="glyphicon glyphicon-ok-sign"></span> 
                 <?php } else { ?>
                  -- 
                 <?php } ?></td>
                 <td><a href="<?php echo site_url('Verifikasi/resend_checkpoint_daf_pddk/'.$value->id_tpddk) ?>" class="btn btn-default btn-xs "  id="" value="RESEND" > RESEND <span class="glyphicon glyphicon-envelope" ></span> </a></td>
                 </tr>
                
                 <?php } ?>
    <?php } ?>

             
         </tbody> 
          
     </table>

    </div>

    <div id="public" class="tab-pane fade" >
    <br/>
       
    
   <table class="table table-condensed" id="table2" style="font-size:12px">
        <thead class="danger text-center">
           <tr>
            <th class="text-center">No</th>
            <th class="text-center">NIP</th>
            
            <th class="text-center">Nama Peserta</th>
            <th class="text-center">Judul Pelatihan</th>
             <th class="text-center">Email Atasan</th>
            <th class="text-center" >Status</th>          
            <th class="text-center"> Pre Lv 3</th>
           
           </tr>
    
         </thead>   
         <tfoot>
           <tr>
            <th class="text-center">No</th>
            <th class="text-center">NIP</th>
            
            <th class="text-center">Nama Peserta</th>
            <th class="text-center">Judul Pelatihan</th>
             <th class="text-center">Email Atasan</th>
            <th class="text-center" >Status</th>          
            <th class="text-center"> Pre Lv 3</th>
           
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
                <td class="text-left"><?php  echo strtolower($value->judul_course) ?></td>
                
                 <td class="text-left"><?php  echo $value->email_atasan?></td>
                <td class="text-center"><span class="label label-info">Progress..</span></td>

            
               <td class="text-center">   <a href ="" class="btn btn-success btn-xs"> DONE <span class="glyphicon glyphicon-ok-sign"></span>  </a></td>
             
        </tr>
         <?php } ?>
    <?php } ?>   
     </tbody> 
     </table>
  </div>

    </div>
    </div>
  
    </div>
    
</div>

<script>
$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
   var $modalDiv = $('.panel-body');
  // $('.panel-body').slideUp('slow');
  //  $('.panel-body').slideDown('slow');
});
</script>

<script type="text/javascript">
      $(document).ready(function() {

     $('#table2').DataTable();
      $('#example3').DataTable();
} );
</script>

<script type="text/javascript">
 $(document).ready(function() {


    // Setup - add a text input to each footer cell
    $('#table1 tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" class="form-control" placeholder="Search '+title+'" />' );

    } );
 
    // DataTable
    var table = $('#table1').DataTable({

    dom: 'Bfrtip',
   
    buttons: ['copy', 'excel', 'pdf'],
       "sScrollX": "100%",
        "sScrollXInner": "110%",
        "bScrollCollapse": true
    


    });
 
    // Apply the search
    table.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );
} );
</script>

