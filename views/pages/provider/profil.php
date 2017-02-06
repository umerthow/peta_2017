<?php
$kode = $this->session->userdata('kd_user');
?>
<h3 class="breadcrumb"> Profil Provider  </h3>

<div class="row">

	<div class="col-md-6">
		<?php if($this->session->userdata('message')) {?>
  
    <ul class="alert alert-success">
       <span class="glyphicon glyphicon-ok"></span> <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
        
        </ul>
    <?php
    }
    ?>


    <?php if($this->session->userdata('berhasil')) {?>
  
    <ul class="alert alert-success">
       
        <span class="glyphicon glyphicon-ok"></span><?php echo $this->session->userdata('berhasil') <> '' ? $this->session->userdata('berhasil') : ''; ?>
        </ul>
    <?php
    }
    ?>

    <?php if($this->session->userdata('error')) {?>
  
    <ul class="alert alert-danger">
       
       <strong>Error!!  </strong><?php echo $this->session->userdata('error') <> '' ? $this->session->userdata('error') : ''; ?>
        </ul>
    <?php
    }
    ?>



   


    <!-- <div class="form-group">
        <label for="kode">ID PERUSAHAAN</label>
        <input type="text" name="kode_user"  class="form-control" value="<?php echo $kode;  ?>" readonly/>
    </div> -->
<?php 
if(!empty($provider)) { ?>

		    <br/>
		    <table class="table table-hover" caption"Hello">
		        <thead class="success">
		        <tr><td>Nama Provider</td><td><strong><?php echo $provider->nama_provider  ?></strong><input id="input-21d" value="<?php echo $provider->rating ?>" type="number" class="rating" min=0 max=5 step=0.5 data-size="xs" disabled ></td></tr>
		        <tr><td>Pemilik</td><td> <?php echo $provider->pemilik    ?></td></tr>
		        <tr><td>No NPWP</td><td><?php echo $provider->no_npwp ?></td></tr>
		        <tr><td>Alamat</td><td><textarea class="form-control" rows="5" readonly><?php echo $provider->alamat  ?></textarea></td></tr>
		        <tr><td>Kota</td><td><?php echo $provider->kota  ?></td></tr>
		        <tr><td>Website</td><td><?php echo $provider->website   ?></td></tr>
		        <tr><td>Email</td><td><?php echo $provider->email ?></td></tr>
		        <tr><td>Telp</td><td><?php echo $provider->telepon ?></td></tr>
		        <tr><td>DOC SIUP</td><td><a href = "<?php echo base_url()."upload/".$provider->doc_siup;   ?>" target="_blank"> <button class="btn btn-default btn-sm dropdown-toggle" type="button"  aria-haspopup="true" aria-expanded="false">Lihat</button></a></td></tr>
		        <tr><td>DOC NPWP</td><td><a href = "<?php echo base_url()."upload/".$provider->doc_npwp; ?>" target="_blank"> <button class="btn btn-default btn-sm dropdown-toggle" type="button"  aria-haspopup="true" aria-expanded="false">Lihat</button></a></td></tr>
		         <tr><td>KETERANGAN</td><td><?php $provider->keterangan  ?></td></tr>
		         
		     </thead>     
		    </table>
		
	

<?php } else { ?>

 <div class="col-xs-6 ">
          <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><strong></strong></h3>
                <strong>NOTE</strong>
                </div>
                <div class="panel-body">
                
                    <?php if($this->session->userdata('petunjuk')) {?>
  
                        
                           
                           <p> <?php echo $this->session->userdata('petunjuk') <> '' ? $this->session->userdata('petunjuk') : ''; ?></p>
                            
                        <?php
                        }
                        ?>


                
                <p > <?php echo $this->session->userdata('hello') <> '' ? $this->session->userdata('hello') : ''; ?> </p>
                 
            </div>
        </div>
   </div>
<?php 

} ?>













	</div>
    

<?php 
        if(!empty($provider)) {
                                          ?>
        
             <div class="panel panel-default">
              <div class="panel-body">
              
             
           <div class="col-xs-6 col-md-4"> 
            <div class="panel panel-default">
              <div class="panel-body">
                Menu Pelatihan
               
                <ul class="media-list">
               
                </ul>
                
                <div class="col-xs-6 col-md-4 ">

                     <a href="<?php echo site_url ('provider/tambah/'.$this->encrypt->encode($provider->id_provider))?>" class="thumbnail" title="Tambah  Daftar Pelatihan">
                    <img src="../assets/add_list2.png" alt="...">
                    </a>
                </div>
                <div class="col-xs-6 col-md-4 ">
                     <a href="<?php echo site_url ('provider/list_pelatihan/'.$this->encrypt->encode($provider->id_provider))?>" class="thumbnail" title="Buka Daftar Pelatihan">
                    <img src="../assets/List.png" alt="...">
                    </a>
                </div>
                <?php if ($this->session->userdata('level') == 'admin') { ?>
                <div class="col-xs-6 col-md-4 ">
                     <a href="<?php echo site_url ('provider/tambah_pb/'.$this->encrypt->encode($provider->id_provider))?>" class="thumbnail" title="Tambah Data Pendidikan Berjenjang">
                    <img src="../assets/add-address.png" alt="...">
                    </a>
                </div>
                <?php } else { ?>

                <?php } ?>
            </ul>
         </div>
    </div>

      </div>
            </div> 
        <?php }?>


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