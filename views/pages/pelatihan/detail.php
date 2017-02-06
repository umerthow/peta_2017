<h3 class="breadcrumb"> Detail Pelatihan Anda </h3>
<div class="panel panel-default">
    <div class="col-md-8">
<?php
        
        $rupiah=number_format($biaya_course,2,',','.');
        ?>
<?php if(!empty ($nama_provider)) { ?>
 
    <table class="table table-hover" caption"Hello">
        <thead class="success">
        <tr><td class="col-md-3">Nama Provider</td><td><?php echo $nama_provider ?></td><td class="col-md-3 text-right"><input  id="input-21d" value="<?php echo $rating ?>" type="number" class="rating" min=0 max=5 step=0.5 data-size="xs" disabled></td></tr>
        <tr><td class="col-md-2">Judul Pelatihan</td><td> <strong><?php echo $judul_course  ?></strong></td></tr>
        <tr><td>Tujuan Pelatihan</td><td> <?php echo $tujuan_pelatihan  ?></td></tr>
        <tr><td>Bidang</td><td><?php echo $nama_kategori ?></td></tr>
        <tr><td>Rencana Tanggal</td><td><?php echo $waktu_in ?></td></tr>
        <tr><td>Rencana Selesai</td><td><?php echo $waktu_out ?></td></tr>
        <tr><td>Kota</td><td><?php echo $kota_course ?></td></tr>
        <tr><td>Rencana Lokasi Training</td><td><?php echo $tempat_pelatihan ?></td></tr>
        <tr><td>Contact Person</td><td><?php echo $cp ?></td></tr>
        <tr><td>Telp</td><td><?php echo $content ?></td></tr>

        <tr><td class="col-md-2"><b>Rincian Pelatihan</b></td></tr>
        <ul>
        <tr><td class="text-right">1</td><td><?php echo $skill ?></td></tr>
        <tr><td class="text-right">2</td><td><?php echo $knowledge ?></td></tr>
        <tr><td class="text-right">3</td><td><?php echo $attitude ?></td></tr>
        <tr><td class="text-right">4</td><td><?php echo $attitude1 ?></td></tr>
        <tr><td class="text-right">5</td><td><?php echo $attitude2 ?></td></tr>
        <tr><td class="text-right">6</td><td><?php echo $attitude3 ?></td></tr>
        <tr><td class="text-right">7</td><td><?php echo $attitude4 ?></td></tr>
        <tr><td class="text-right">8</td><td><?php echo $attitude5 ?></td></tr>
        <tr><td class="text-right">9</td><td><?php echo $attitude6 ?></td></tr>
        <tr><td class="text-right">10</td><td><?php echo $attitude7 ?></td></tr>
        </ul>
         <tr><td>Biaya Pelatihan </td><td><?php echo $rupiah ?></td></tr>
         <tr><td>Brosur</td><td><a href = "<?php echo base_url()."brosur/".$gatel; ?>" target="_blank" data-popup="true"> <button class="btn btn-default btn-sm dropdown-toggle" type="button"  aria-haspopup="true" aria-expanded="false">Lihat</button></a></td></tr> 
         
         
     </thead>     
    </table>

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