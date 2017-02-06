<h3 class="breadcrumb"> YOUR ACCOUNT </h3>

<?php if(validation_errors()) {?>
    
    <ul class="alert alert-danger">
     <?php echo validation_errors('<ul>','</ul>')?>
    </ul>
<?php
}
?>

<?php if($this->session->userdata('message')) {?>
  
    <ul class="alert alert-success">
       <span class="glyphicon glyphicon-ok"></span> <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
        
        </ul>
    <?php
    }
    ?>

<div class="row">
    <div class="col-md-6">
        <?php  ?> 
       
        <table class="table table-hover" caption"Hello">

        <thead class="success">
        <tr><td>Nama Depan</td><td><?php echo $provider->nama_depan ?></td></tr>
        <tr><td>Belakang</td><td><?php echo $provider->nama_belakang ?></td></tr>
        <tr><td>Username</td><td><strong><?php echo $provider->username ?></strong></td></tr>
        <tr><td> <a href="<?php echo site_url('user/edit_account')?>"> <button class="btn btn-warning btn-sm dropdown-toggle" type="button"  aria-haspopup="true" aria-expanded="false">EDIT</button> </a>  &nbsp; <a href="<?php echo site_url('dashboard') ?>"><button class="btn btn-default btn-sm dropdown-toggle" type="button"  aria-haspopup="true" aria-expanded="false">CANCEL</button></a></td></tr>
         
     </thead>     
    </table>


        
        <?php echo form_close() ?> 
    </div>
</div>
