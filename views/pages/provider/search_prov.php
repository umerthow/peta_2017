<h4>Hasil Pencarian</h4>



 <?php echo form_open ('provider/search_list')?>

                <form action="" role="search" style="position: 300px">
                  <div class="input-group custom-search-form">
                    <input name="keyword" class="form-control" value="<?php echo $keyword ?>" required/>

                     <span class="input-group-btn">
                     <?php  if ($keyword <> '')
                    {
                        ?>
                        <a href="<?php echo site_url('User/index'); ?>" class="btn btn-default">Reset</a>
                       
                        <?php
                    }
                    ?>
                                <button class="btn btn-primary" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                </form>
                <?php echo form_close(); ?>

<br/>
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
    	     <td class="active"> <?php echo $no++; ?></td>
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