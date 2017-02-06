<div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                       <img src="<?php echo base_url() ?>assets/konfigurasi4.png" alt=""> <strong>Direktori Training  </strong>
                    </div>
                    
                    <div class="panel-body">
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
						<div class="col-xs-8 col-sm-6">
                            <fieldset>
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
						<div class="col-xs-4 col-sm-6">
                            <div class="form-group">
								 <center><a href="<?php echo site_url('Panel_user') ?>" class="btn btn-default  btn-block" style="font-size: 14px"><b> DASHBOARD <p>TRAINING</p></b></a></center> 
								</div>
										<a href="<?php echo site_url('Panel_user') ?>" class="thumbnail">
										  <img src="../upload/logo.png" alt="...">
										</a>
									  
					</div>
                 </div>
                </div>
            </div>

            
        </div>
    </div>