<div class="col-md-12">

      <h3><i class="glyphicon glyphicon-tasks"></i> Detail Training</h3>  
      <hr>



   
<?php
        
       // $rupiah=number_format($biaya_course,2,',','.');
        ?>
<?php if(!empty ($nama_provider)) { ?>
 <div class="panel panel-default">
  <div class="panel-heading"><strong>Informasi Training </strong>
  
  </div>


  <div class="panel-body">
     <div class="btn-group pull-right" role="group" aria-label="...">
       <!--  <a href="<?php echo site_url('panel_user/evaluation') ?>" class="btn btn-success"><span class="glyphicon glyphicon-file"></span> Form Evaluasi </a> -->
      </div>
                <table class="table table-hover" caption"Hello">
                <thead class="success">
                <tr ><td class="col-md-3">Nama Provider</td><td ><?php echo $nama_provider ?> <input  id="input-21d" value="<?php echo $rating ?>" type="number" class="rating" min=0 max=5 step=0.5 data-size="xs" disabled></td> </tr>
                <tr><td>Judul Pelatihan</td><td> <strong><?php echo $judul_course  ?></strong></td></tr>
                 <tr><td>Bidang</td><td><?php echo $nama_kategori ?></td></tr>
                <tr><td>Rencana Tanggal</td><td><?php echo tgl_indo($waktu_in) ?></td></tr>
                <tr><td>Rencana Selesai</td><td><?php echo tgl_indo($waktu_out) ?></td></tr>
                <tr><td>Kota</td><td><?php echo $kota_course ?></td></tr>

                <tr><td>Rencana Lokasi Training</td><td><?php echo $tempat_pelatihan ?></td></tr>
                <tr><td>Contact Person</td><td><?php echo $cp ?></td></tr>
               

                <tr><td>Materi Pelatihan</td>

                    <td> <ol> <?php if (!empty($tujuan_pelatihan)) {?>

                    <?php foreach ($tujuan_pelatihan as $key => $value) {?>
               
                        <li><?php echo $value->tujuan_pelatihan ?>
                        </li>
                        <?php }?>

                    <?php }?>
                    </ol></td>

                </tr>

               
              
                    
             
                
                 
                 <tr><td>Brosur</td><td><a href = "<?php echo base_url()."brosur/".$gatel; ?>" target="_blank" data-popup="true"> <button class="btn btn-default btn-sm dropdown-toggle" type="button"  aria-haspopup="true" aria-expanded="false">Lihat</button></a></td>
                    </tr> 
                <tr><td><td><a href = "<?php echo site_url('panel_user/daftar_pddk/'.$this->encrypt->encode($value->id_course)) ?>" > <button class="btn btn-primary btn-sm dropdown-toggle form-control" type="button"  aria-haspopup="true" aria-expanded="false"><strong> DAFTAR</strong.</button></td></td></td>
                 
                 
             </thead>     
            </table>

     </div>
</div>


    <?php }else { ?>
    <p>   </p>


   <?php } if($this->session->userdata('cook')) {?>
  
    <ul class="alert alert-danger">
       
        <span class="glyphicon glyphicon-minus-sign"> </span><?php echo $this->session->userdata('cook') <> '' ? $this->session->userdata('cook') : ''; ?>
        </ul>
    <?php
    }
    ?>

    
</div>

<script>
$(function() {
    $("a[data-popup]").live('click', function(e) {
        window.open($(this)[0].href);
        // Prevent the link from actually being followed
        e.preventDefault();
    });
});
</script>


<script>
    jQuery(document).ready(function () {
        $("#input-21d").rating({
             starCaptions: function(val) {
                if (val < 3) {
                    return val;
                } else {
                    return 'high';
                }
            },
            starCaptionClasses: function(val) {
                if (val < 3) {
                    return 'label label-danger';
                } else {
                    return 'label label-success';
                }
            },
            hoverOnClear: false
        });



}

</script>