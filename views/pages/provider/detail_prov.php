<h3 class="breadcrumb"> Detail Provider  </h3>
<div class="panel panel-default">
    <div class="col-md-6">
    <table class="table table-hover" caption"Hello">
        <thead class="success">
        <tr><td>Nama Provider</td><td><strong><?php echo $nama_provider ?></strong><input id="input-21d" value="<?php echo $rating ?>" type="number" class="rating" min=0 max=5 step=0.5 data-size="xs" ></td> 
</tr>
        <tr><td>Pemilik</td><td> <?php echo $pemilik  ?></td></tr>
        <tr><td>No SIUP</td><td> <?php echo $no_siup  ?></td></tr>
        <tr><td>No NPWP</td><td><?php echo $no_npwp ?></td></tr>
        <tr><td>Alamat</td><td><textarea class="form-control" rows="5" readonly><?php echo $alamat ?></textarea></td></tr>
        <tr><td>Kota</td><td><?php echo $kota ?></td></tr>
        <tr><td>Website</td><td><?php echo $website ?></td></tr>
        <tr><td>Email</td><td><?php echo $email ?></td></tr>
        <tr><td>Telp</td><td><?php echo $telepon ?></td></tr>
        <tr><td>DOC SIUP</td><td><a href = "<?php echo base_url()."upload/".$doc_siup; ?>" target="_blank"> <button class="btn btn-default btn-sm dropdown-toggle" type="button"  aria-haspopup="true" aria-expanded="false">Lihat</button></a></td></tr>
        <tr><td>DOC NPWP</td><td><a href = "<?php echo base_url()."upload/".$doc_npwp; ?>" target="_blank"> <button class="btn btn-default btn-sm dropdown-toggle" type="button"  aria-haspopup="true" aria-expanded="false">Lihat</button></a></td></tr>
         <tr><td>KETERANGAN</td><td><?php echo $keterangan ?></td></tr>
         
     </thead>     
    </table>
</div>
</div>


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