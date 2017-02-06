<div class="row">
<h3>test ajax</h3>

<?php
echo phpinfo();

function ulang($x){

  $x++;
  echo "2";
  if($x<10){
    return ulang($x);
  }
}
ulang(0);
?>


</div>
<p id="change"></p>
<div class="col-md-6">
		<div class="form-group">
        <label for="kode">NAMA MURID</label>
        <input type="text" name="murid" id="nama_murid" class="form-control" required />
        </div>
        <div class="form-group">
        <label for="InputMessage">ALAMAT</label>
        <textarea name="lokasi" id="alamat_murid" class="form-control" rows="5"  data-toggle="tooltip" data-placement="right" title="Isikan Alamat Lengkap Anda"></textarea>
        
       </div>
       <div class="form-group">
        <label for="kode">PAKET</label>
        <input type="text" name="paketnya" id="paket_murid" class="form-control" required />
        </div>
        <div class="form-group">
        <label for="kode">TANGGAL DAFTAR</label>
        <input type="date" name="tanggal" id="tanggal_daftar" class="form-control" required />
        </div>
        <div class="form-group">
        <label for="kode">STATUS</label>
        <select name="status" id="status_murid" class="combobox form-control">
           
                <option value="0" disabled>Select Status</option>
                 <option value="1">Aktif</option>
                  <option value="2">Tdak Aktif</option>
              
           
        </select>
        </div>
         <div class="form-group">
         <input type="submit" name="tambah" id="save_murid" value="submit" class="btn btn-success pull-right" />
        </div>
</div>
<div id="list_nama">
<?php foreach ($murid as $key => $value) { ?>
	<p><?php echo $value->nama_lengkap ?></p>
<?php }?>
</div>
<script>
$(document).on("click","#save_murid",function(){
 			  var nama_murid=$("#nama_murid").val();
              var alamat_murid=$("#alamat_murid").val();
              var paket_murid=$("#paket_murid").val();
              var tanggal_daftar=$("#tanggal_daftar").val();
              var status_murid=$("#status_murid").val();
              
              $.ajax({
              type:"POST",
              url:"<?php echo base_url() ?>provider/save_murid",
              data:{"nama_murid":nama_murid,"alamat_murid":alamat_murid,"paket_murid":paket_murid,"tanggal_daftar":tanggal_daftar,"status_murid":status_murid},
              cache:false,
              success:function(a){
               	 $('#change').text('Please wait....');
                 $('#list_nama').load(location.href + " #list_nama");
               	 $('#change').fadeOut().delay(700);
                

              },
              error:function(a,b,c){
                error_alert("Error","Terjadi kesalahan, cek koneksi anda<br> Error:"+c);
                ajax_request=false;
                hide_proses();
              }

            });
   });
</script>