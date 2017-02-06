<div class="col-md-12">
<div class="panel panel-default"> 
  <div class="panel-heading ">    
<div class="btn-group pull-right">
         <a href="user/tambah" class="btn btn-primary btn-sm ">ADD USER </a>
       
        <a href="#" class="btn btn-default btn-sm">## Move</a>
      </div>
 <h4 class="text-warning panel-title"><span class=' glyphicon glyphicon-user'></span> ACCOUNT MANAGEMENT
</h4> 
<br/>
</div>
  <div class="panel-body">
    

  
              
<?php if($this->session->userdata('message')) {?>
  
    <ul class="alert alert-success">
   <span class="glyphicon glyphicon-ok"></span> <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
    </ul>
<?php
}
?>
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



 <table class="table table-bordered table-hover" id="table">
                                <thead>
                                    
                                        <th>Nama Depan</th>
                                        <th>Nama Belakang</th>
                                        <th>Username</th>
                                        <th colspan="3" >Action</th>
                                    
                                </thead>
                                <tbody>
                                    <tr><?php 
                  
                  if(count($user)>0) { ?>
                  <?php foreach ($user as $user) { 
                  
                  ?>
                                
                                    
                                    
                                        <td><?php echo $user->nama_depan ?></td>
                                        <td><?php echo $user->nama_belakang ?></td>
                                        <td><?php echo $user->username ?></td>
                                        <td> <a href="<?php echo site_url('user/edit/'.$user->id); ?>" class="glyphicon glyphicon-pencil"> </a></td>
                                         <td><a href="<?php echo site_url('user/delete/'.$user->id); ?>" onclick="return confirm('Are you sure you want to delete this item?');" class="glyphicon glyphicon-trash"> </a></td>
                                        
                                   
                                </tbody>
                           
                           
                            <?php }?>
                            
                            <?php
              
            }
              ?>
                             </table>
                             </div>
</div>