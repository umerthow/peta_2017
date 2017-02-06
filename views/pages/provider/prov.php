<style>
.rating {

  font-size: 8px;
}
</style>

<?php 
$kode = $this->session->userdata('kd_user');

?>
    </ul>
<?php

?>

<div class="row">


<div class="col-md-12">
<div class="panel panel-default"> 
  <div class="panel-heading ">    
<div class="btn-group pull-right">
        
        <a href="<?php echo site_url('provider') ?>" class="btn btn-danger btn-sm" role="button"><span class="glyphicon glyphicon-plus"></span> Provider</a>
 <a href="<?php echo site_url('provider/profil') ?>" class="btn btn-danger btn-sm" role="button"><span class="glyphicon glyphicon-list "></span> List Pelatihan</a>
      </div>
 <h4 class="text-warning panel-title"><span class=' glyphicon glyphicon-list'></span> PROVIDER MANAGEMENT
</h4> 
<br/>
</div>
  <div class="panel-body">


 <?php echo form_open ('provider/search_list')?>

                <form action="" role="search" style="position: 300px">
                  <div class="input-group custom-search-form">
                    <input name="keyword" class="form-control" placeholder="Search Here.." required/>
                    <?php  if ($keyword <> '')
                    {
                        ?>
                        <a href="<?php echo site_url('Provider/list_provider'); ?>" class="btn btn-default">Reset</a>
                        <?php
                    }
                    ?>
                     <span class="input-group-btn">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                </form>
                <?php echo form_close(); ?>

                          
                            <!-- /input-group -->
                      
               
           
<br/>
	<div class="col-md-13">
<div class="table-responsive ">
			<table class="table table-bordered" style="margin-bottom: 10px" data-show-toggle="true">
        	<th class="success">No</th>
    		<th class="success col-md-2">Nama Provider</th>
          <th class="success">Rating</th>
         	<th class="success">Telepon</th>
			<th class="success">Kota</th>
      <th class="success col-md-4">Alamat</th>
			<th class="success">website</th>
        	<th class="success">Action</th>
         
<?php $no=1; ?>
    <?php foreach($prov as $result) {?>
    <tr>
    	     <td class="active"> <?php echo ++$offset; ?></td>
        	 <td > <a href="<?php echo site_url('provider/detail_provider/'.$result->id_provider) ?>"> <?php echo $result->nama_provider ?> </a> </td>
            <td><input id="input-21d" value="<?php echo $result->rating ?>" type="number" class="rating" min=0 max=5 step=0.5 data-size="xs" ></td>
              <td><?php echo $result->telepon ?> </td>
			  <td><?php echo $result->kota ?> </td>
         <td><?php echo $result->alamat ?> </td>
			  <td><?php echo $result->website ?> </td>
        
             <td> 
        	<a href="<?php echo site_url('provider/edit/'.$result->id_provider)?> "> <i class="fa fa-pencil"></i></a>
            &nbsp;
            <a href="<?php echo site_url('provider/delete/'.$result->id_provider)?>" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-times"></i></a>          
           </td>
           
        </tr >
        <?php }?>
     </thead> 

        </table>
  </div>
      
                          
 </div>
 
  </div>


       
             <div class = "col-md-6" ></div>
    
                          <div class="col-md-12 text-center">
                              <?php echo $pagination; ?>
                          </div>
                   

 </div>

</div>
</div>


   <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a href="<?php echo site_url('provider/delete/'.$result->id_provider)?>"class="btn btn-danger btn-ok">Delete</a>
            </div>
        </div>

        
<script type="text/javascript">
      $('#confirm-delete').on('show.bs.modal', function(e) {
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
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
            
          $.fn.rating.defaults = {
          hoverEnabled: false;
          }

        });



}

</script>