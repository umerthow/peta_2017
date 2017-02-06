
<div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                       <img src="<?php echo base_url() ?>assets/konfigurasi4.png" alt=""> <strong>Direktori Training  </strong>
                    </div>
                    
                    <div class="panel-body">
                   


    <div class="panel with-nav-tabs panel-default ">
  <div class="panel-heading">
  <ul class="nav nav-tabs">
    <li class="active"><a href="#home" style="font-size: 12px"><span class="glyphicon glyphicon-home"></span> PROVIDER LOGIN</a></li>
    <li><a href="#employee" style="font-size: 12px"><span class="glyphicon glyphicon-calendar"></span> DASHBOARD</a></li>
   
  </ul>
<div class="panel-body" style="font-size:12px">
  <div class="tab-content ">
    <div id="home" class="tab-pane fade in active" id="tab1danger">
            <?php if(validation_errors()) {?>
                        <ul class="alert alert-danger">
                            <? echo validation_errors("<li>","</li>"); ?></ul>
                     <?php }?>
                     
                      <?php if($this->session->flashdata('error')) {?>
                        <p class="alert alert-danger">
                            <?php echo $this->session->flashdata('error'); ?>
                        </p>
                     <?php }?>
                     
                     
                        <?php echo form_open() ?>
                       
                            <fieldset>
                                <div class="form-group">
                                    <p><b>Welcome</b>, PLease Sign in!</p>

                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="username" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                              <button type="submit"  class="btn btn-lg btn-primary btn-block">Login </button>
                            </fieldset>
                        <?php echo form_close();?>
             
                        
                                    
                                
</div>






 <div id="employee" class="tab-pane fade">
          
                                
                                <center>
                                      
                                          <div class="panel-body panel-success">
                                          <p class="text-center" style="font-size: 16px">PENGUMUMAN</p>
                                        <p class="alert alert-success">Yth. Karyawan Perumnas<br/>

                                       Bagi karyawan yang ingin  mendaftar pelatihan silahkan masuk melalui E-Selfie HCIS masing-masing.<br/>
                                        Terima Kasih.<br/>
                                        <center>* * * </center> <br/></p>

                                         
                                         </div> 
                                        
    
                             
    </div>





    <div id="menu2" class="tab-pane fade">
     
        
                bbb         
                             
    </div>


    <div id="menu3" class="tab-pane fade">
      <h3>OOPS!!</h3>
      <p>Under Construction.</p>
    </div>
    <br/>
  </div>
</div>
</div>

 </div>







                    </div>
                 </div>
                </div>
            </div>

            
        </div>

<script>
$(document).ready(function(){
    $(".nav-tabs a").click(function(){
        $(this).tab('show');
    });
});
</script>
