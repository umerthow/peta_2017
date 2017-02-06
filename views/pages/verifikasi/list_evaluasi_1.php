
<style type="text/css">
 .modal {
    display:    none;
    position:   fixed;
    z-index:    1000;
    top:        0;
    left:       0;
    height:     100%;
    width:      100%;
    background: rgba( 255, 255, 255, .8 ) 
                url('http://i.stack.imgur.com/FhHRx.gif') 
                50% 50% 
                no-repeat;
}

body.loading {
    overflow: hidden;   
}

body.loading .modal {
    display: block;
} 

</style>



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
  <div class="panel-heading"><i class="fa fa-fw fa-th-list"></i> Monitoring  Evaluasi Level 1 Karyawan</div>
  <div class="panel-body">

<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%" style="font-family:arial;font-size:12px" >
<thead>
            <tr>
               <th>#</th>
                <th>NIP</th>
                <th>Nama Karyawan</th>
                <th>Email Peserta</th>
                <th class="col-md-2">Nama Provider</th>
                <th class="col-md-3">Nama Pelatihan</th>
                <th class="col-md-2">Jadwal Selesai</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
    <tbody>
        <?php $no=1;?>
            <?php if (!empty($list)) {?>
              <?php foreach ($list as $key => $value) {?>

             <tr>

                <td class="text-center"><?php  echo $no++;?></td>
                <td class="text-center"><?php  echo $value->NIP?></td>

                <td class="text-left"><a href="<?php echo site_url('Verifikasi/detail_ev3/'.$value->id_tp) ?>"><?php  echo strtolower($value->Nama_pegawai) ?></a></td>

                <td class="text-center"><?php  echo $value->email_pegawai ?></td>
                <td class="text-center"><?php  echo $value->nama_provider?></td>
                <td class="text-left"><?php  echo strtolower($value->judul_course) ?></td>
                <td class="text-center"><?php  echo tgl_indo($value->waktu_out) ?></td>
                <td class="text-center">

                <?php 
                  $ect = ($value->status_evaluasi_1);
                  $date = date("Y-m-d");
                  $mydate = strtotime($value->tgl_post3);
                  $curdate = strtotime($date);
                if($ect == 0){
                ?>
                   Belum Mengisi
                <?php
                } else if ($ect == 1) {?>

                   <a href ="" class="btn btn-success btn-xs" id="myshow"> DONE <span class="glyphicon glyphicon-ok-sign"></span>  </a>

                <?php } ?>
              </td>
              <td> <a href ="" class="btn btn-info btn-xs" id="myshow"> ACTION   </a></td>
              <?php } ?>
    <?php } ?>   
    </tbody>


    <tfoot>
            <tr>
              <th>#</th>
                <th>NIP</th>
                <th>Nama Karyawan</th>
                <th>Email Peserta</th>
                <th class="col-md-2">Nama Provider</th>
                <th class="col-md-3">Nama Pelatihan</th>
                <th class="col-md-2">Jadwal Selesai</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </tfoot>

</table>











</div>


</div>



<script type="text/javascript">


$('#myshow').click(function(){

  $.ajax({
  url: '<?php echo site_url('panel_user'); ?>',
  type:'POST',
  success: function(response){
             $('body').html(msg);
                //alert(data);
            }     


  });

  return false;

});
</script>

<script type="text/javascript">
var table = $('#example').DataTable({

    dom: 'Bfrtip',
   
    buttons: ['copy', 'excel', 'pdf'],
       "sScrollX": "100%",
        "sScrollXInner": "auto",
        "bScrollCollapse": true
    


    });
</script>