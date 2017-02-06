

 <div id='loadingmessage' style='display:none'></div>
  <div class="panel-body" id="test">
     <div class="btn-group pull-right" role="group" aria-label="...">
       <!--  <a href="<?php echo site_url('panel_user/evaluation') ?>" class="btn btn-success"><span class="glyphicon glyphicon-file"></span> Form Evaluasi </a> -->
      </div>
                <table class="table table-hover" caption"Hello">
                <thead class="success">
                <tr ><td class="col-md-3">Nama Provider</td><td ><?php echo $nama_provider ?> </td> </tr>
                <tr><td>Judul Pelatihan</td><td> <strong><?php echo $judul_course  ?></strong></td></tr>
                <tr><td>Tujuan Pelatihan</td><td> <?php echo $tujuan_pelatihan  ?></td></tr>
                <tr><td>Bidang</td><td><?php echo $nama_kategori ?></td></tr>
                <tr><td>Rencana Tanggal</td><td><?php echo tgl_indo($waktu_in) ?></td></tr>
                <tr><td>Rencana Selesai</td><td><?php echo tgl_indo($waktu_out) ?></td></tr>
                <tr><td>Kota</td><td><?php echo $kota_course ?></td></tr>

                <tr><td>Rencana Lokasi Training</td><td><?php echo $tempat_pelatihan ?></td></tr>
                <tr><td>Contact Person</td><td><?php echo $cp ?></td></tr>
                <tr><td>Telp</td><td><?php echo $content ?></td></tr>

                <tr><td>Materi Pelatihan</td></tr>
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
                 
                 <tr><td>Brosur</td><td><a href = "<?php echo base_url()."brosur/".$gatel; ?>" target="_blank" data-popup="true"> <button class="btn btn-default btn-sm dropdown-toggle" type="button"  aria-haspopup="true" aria-expanded="false">Lihat</button></a></td>
                    </tr> 
                <tr><td><td><a href = "<?php echo site_url('panel_user/daftar/'.$id_course) ?>" > <button class="btn btn-primary btn-sm dropdown-toggle form-control" type="button"  aria-haspopup="true" aria-expanded="false"><strong> DAFTAR</strong.</button></td></td></td>
                 
                 
             </thead>     
            </table>

     </div>
  </div>
