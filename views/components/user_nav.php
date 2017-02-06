<!-- Header -->
<style>
.col-height {
  display: box;

  height: 330px;
  width:300px;
 float: left;
}

</style>

<?php if($this->session->userdata('dah_login') ==  TRUE ) {?>


<nav class="navbar navbar-fixed-top navbar-inverse" role="navigation" data-target="#myNavbar" >

  
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
     <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
       

      </button>
    
      <a class="navbar-brand" href="#" style="font-color:green">Direktori Training</a>

    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2" >
      <ul class="nav navbar-nav">
        <li class="active"><a href="<?php echo site_url('panel_user')?>">Home</a></li>
        <li><a href="<?php echo site_url('panel_user/calender_panel')?>">Calendar</a></li>
         <li><a class="page-scroll" href="#contact" id="myNavbar" >About Us</a></li>

           <li class="active"  ><a id="popoverOption" class="btn btn-success text-success" href="<?php echo site_url('panel_user/request_new') ?>" data-content="Anda bisa request pelatihan baru disini " rel="popover" data-placement="bottom" data-original-title="Hello"><span class="glyphicon glyphicon-bullhorn"></span> Request</a></li>

          <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Service <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="<?Php echo site_url('user') ?>">Provider Login</a></li>
            <!-- <li><a href="<?php echo site_url('panel_user')?>">tanggal</a></li> -->
           <!--  <li><a href="<?php echo site_url('panel_user/test')?>">date json</a></li> -->
            <li class="divider"></li>
            <li><a href="<?php echo site_url('panel_user/pelatihanku') ?>">Pelatihanku</a></li>
            <li class="divider"></li>
            <li><a href="">Survey Provider</a></li>
          </ul>
        </li>
      </ul>
  <ul class="navbar-form navbar-left">
<?php echo form_open ('panel_user/pencarian')?>
      <form action="" role="search" style="position: 300px">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search" name="kata_kunci">
        </div>
        <button type="submit" class="btn btn-success" name="cari"><span class="glyphicon glyphicon-search"></span></button>
      </form>
<?php  echo form_close(); ?>

</ul>


      <ul class="nav navbar-nav navbar-right">

        <li><p class="navbar-text"> Hi, <strong><?php echo $this->session->userdata('fullname');  ?></strong></p></li>
        <li></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Logout </b> <span class="caret"></span></a>
      <ul id="login-dp" class="dropdown-menu">
        <li>
           <div class="row">
              <div class="col-md-12">

                
                    <div class="form-group">
                       <a href ="<?php echo site_url('panel_user/logout')?>" class="btn btn-primary btn-block" >Log out </a>
                    </div>
                   
                 </form>
                 <?php echo form_close();?>
              </div>
              <div class="bottom text-center">
                New here ? <a href="#"><b>Join Us</b></a>
              </div>
           </div>
        </li>
      </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->

</nav>


<!-- /Header -->

 <br>
 <br>
 <br>

<div class="container ">
  
  <!-- upper section -->
  <div class="row">
	 
      <!-- left -->
      
      <hr>
      
      


      
  	</div><!-- /span-3 -->

  <?php } else  { ?>


  <nav class="navbar navbar-fixed-top navbar-inverse" role="navigation" id="myNavbar">

  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
     
      <a class="navbar-brand" href="#">   Direktori Training</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
      <ul class="nav navbar-nav">
        <li class="active"><a href="<?php echo site_url('panel_user')?>">Home</a></li>
        <li><a href="<?php echo site_url('panel_user/calender_panel')?>">Calendar</a></li>
           <li><a class="page-scroll" href="#contact" >About Us</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Service <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="<?Php echo site_url('user') ?>">Provider Login </a></li>
           <!--  <li><a href="<?php echo site_url('panel_user')?>">tanggal</a></li>
            <li><a href="<?php echo site_url('panel_user/test')?>">date json</a></li> -->
            <li class="divider"></li>
            <li><a href="<?php echo site_url('panel_user/pelatihanku') ?>">Pelatihanku</a></li>
            <li class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
      </ul>
     <ul class="navbar-form navbar-left">
<?php echo form_open ('panel_user/pencarian')?>
      <form action="" role="search" style="position: 300px">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search" name="kata_kunci">
        </div>
        <button type="submit" class="btn btn-success" name="cari"><span class="glyphicon glyphicon-search"></span></button>
      </form>
<?php  echo form_close(); ?>
</ul>
      <ul class="nav navbar-nav navbar-right">
        
        <li><p class="navbar-text"  > Already have account ?</p></li>
                <?php if($this->session->flashdata('error')) {?>
                      <li >
                         <p class="navbar-text"><a href=""><?php echo $this->session->flashdata('error'); ?></a></p>
                        </li>
                     <?php }?>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Login</b> <span class="caret"></span></a>
      <ul id="login-dp" class="dropdown-menu">
        <li>
           <div class="row">
              <div class="col-md-12">

                 <?php if(validation_errors()) {?>
                      <ul class="alert alert-danger">
                          <? echo validation_errors("<li>","</li>"); ?></ul>
                     <?php }?>
                     
                <div class="form-group">      
              <h4 class="text-center"> <small> Silahkan Login menggunakan  HCIS Account </small></h4>
               <div>
                               
                  <?php echo form_open('panel_user/login') ?>
                 <form class="form" role="form" method="post" action="login" accept-charset="UTF-8" id="login-nav">
                    <div class="form-group">
                       <label class="sr-only" for="exampleInputEmail2">Email address</label>
                       <input type="email" name="username" class="form-control" id="exampleInputEmail2" placeholder="Email address" required>
                    </div>
                    <div class="form-group">
                       <label class="sr-only" for="exampleInputPassword2">Password</label>
                       <input type="password"  name="password" class="form-control" id="exampleInputPassword2" placeholder="Password" required>
                                             <div class="help-block text-right"><a href="">Forget the password ?</a></div>
                    </div>
                    <div class="form-group">
                       <button type="submit" class="btn btn-info btn-block" > HCIS Sign in</button>
                    </div>
                    <!-- <div class="checkbox">
                       <label>
                       <input type="checkbox"> keep me logged-in
                       </label>
                    </div> -->
                 </form>
                 <?php echo form_close();?>
              </div>
              <div class="bottom text-center">
                New here ? <a href="hcis.perumnas.co.id"><b>Join Us</b></a>
              </div>
           </div>
        </li>
      </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


<!-- /Header -->

 <br>
 <br>
 <br>

<div class="container ">
  
  <!-- upper section -->
  <div class="row">
   

    <?php } ?>






<script>
$(document).ready(function(){
    $('[data-toggle="popover"]').popover(); 
    $('#myCarousel').carousel();
    


});

</script>

<script>
$('#popoverData').popover();
$('#popoverOption').popover({ trigger: "hover" });
</script>


