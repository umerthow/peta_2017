<?php if($this->session->userdata('level') == 'admin') {?>

  <style>
body{
font-family:arial;  
  
}

.pagging
 {
 font-family:arial;
 margin:14px;
 font-size:12px;
 }

.pagging a
 
 {
 padding:7px;
 background:#309fa9;
 -moz-border-radius:2px;
 -webkit-border-radius:2px;
 border:1px solid #dbd4d6;
 font-size:12px;
 font-weight:bold;
 color:#FFF;
 text-decoration:none;

}

</style> 




                      

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

<?php echo form_open ('User/user_list')?>

                <form action="" role="search" style="position: 300px">
                  <div class="input-group custom-search-form">
                    <input name="keyword" class="form-control" placeholder="Search Here.." required/>
                    <?php  if ($keyword <> '')
                    {
                        ?>
                        <a href="<?php echo site_url('User/index'); ?>" class="btn btn-default">Reset</a>
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

<br/>
<!-- <input type="text" id="search" placeholder="Type to search" class="form-control">
 -->                            <table class="table table-bordered table-hover" id="table">
                                <thead>
                                    
                                        <th>Nama Depan</th>
                                        <th>Nama Belakang</th>
                                        <th>Username</th>
                                        <th colspan="3" >Action</th>
                                    
                                </thead>
                                <tbody>
                                    <tr><?php 
                  
                  if(count($user)>0) { ?>
                  <?php foreach ($user->result() as $user) { 
                  
                  ?>
                                
                                    
                                    
                                        <td><?php echo $user->nama_depan ?></td>
                                        <td><?php echo $user->nama_belakang ?></td>
                                        <td><?php echo $user->username ?></td>
                                        <td> <a href="<?php echo site_url('user/edit/'.$user->id); ?>" class="glyphicon glyphicon-pencil"> </a></td>
                                         <td><a href="<?php echo site_url('user/delete/'.$user->id); ?>" class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure you want to delete this item?');"> </a></td>
                                        
                                   
                                </tbody>
                           
                           
                            <?php }?>
                            
                            <?php
              
            }
              ?>
                             </table>
                            
                        
                          &nbsp;
                        
                        <div class="row">
                          <div class="col-md-12 text-center">
                              <?php echo $pagination; ?>
                          </div>
                      </div>
                          
        
    

 </div>

    <?php } else { ?>

                
    <h1> wah gak bisa diinjecsi boss</h1> 
        
        
        <?php }?>

  </div>
</div>

  <script>
var $rows = $('#table tr');
$('#search').keyup(function() {
    var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();
    
    $rows.show().filter(function() {
        var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
        return !~text.indexOf(val);
    }).hide();
});
  </script>