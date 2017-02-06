<?php 
if ($this->session->userdata('status') == '0') {?>
        
        
        
        
           <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">
                    <img src="<?php echo base_url() ?>assets/konfigurasi4.png" alt="">


                    </a>
            
            <a class="navbar-brand" href="index.html">PERUMNAS TRAINING AGENDA</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu message-dropdown">
                        <li class="message-preview">
                            <a href="#">
                                
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                
                            </a>
                        </li>
                        <li class="message-footer">
                            <a href="#">There's No Messages</a>
                        </li>
                    </ul>
                </li>
                <!-- <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu alert-dropdown">
                        <li>
                            <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-info">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">View All</a>
                        </li>
                    </ul>
                </li> -->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <strong><?php echo $this->session->userdata('nama_depan');  ?></strong> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="<?php echo site_url('user/account')?>"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <!-- <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li -->
                        <li class="divider"></li>
                        <li>
                            <a href="<?php echo base_url('user/logout')?>"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="<?php echo site_url('dashboard')?>"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                     <li   class="disabled">
                      
                    </li>
                   
                    
                   
                    <li class="disabled">
                    
                   

                    <li>
                        <a href="<?php echo site_url('provider/terms')?>"><i class="fa fa-fw fa-dashboard"></i> Terms & Condition</a>
                    </li>
                     <li class="disabled" >
                     
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
     
            <?php } else if ($this->session->userdata('level') == 'admin') { ?>
        

 <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo site_url('dashboard') ?>">
                    <img class="media-object"  src="<?php echo base_url() ?>assets/konfigurasi4.png" alt="">


                    </a>
            </div>
            <a class="navbar-brand" href="<?php echo site_url('dashboard') ?>">Administrator</a>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="<?php echo site_url('provider/cek_pesan_limit') ?>" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu message-dropdown">

                            <?PHP 

                            if( !empty($pesan)){
                             foreach($pesan as $result) { 
                                                            if ($result->status == 0) { ?>


                                                                     
                                                                    <li class="message-preview">
                                                                    <a href="<?php echo site_url('provider/cek_pesan_limit') ?>">
                                                                        <div class="media">
                                                                            <span class="pull-left">
                                                                                <img class="media-object" src="<?php echo base_url() ?>assets/konfigurasi4.png" alt="">
                                                                            </span>
                                                                            <div class="media-body">
                                                                                <h5 class="media-heading">
                                                                                    <strong><?php  echo $result->fullname; ?></strong>
                                                                                </h5>
                                                                                <p class="small text-muted"><i class="fa fa-clock-o"></i> <i>Pesan belum dibaca</i></p>
                                                                                <p>Cek pesannya </p>
                                                                             </div>
                                                                        </div>
                                                                     </a>
                                                                   </li>














                                                         <?php    }                   
                             ?>


                                   
                             <?php
                            }

        }?>














                     
                        <!-- <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading">
                                          sads <strong><?php echo $this->session->userdata('nama_depan');  ?></strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Under COnstruction .. </p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading">
                                            <strong><?php echo $this->session->userdata('nama_depan');  ?></strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Under COnstruction .. </p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-footer">
                            <a href="#">Read All New Messages</a>
                        </li> -->
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu alert-dropdown">
                       
                        <li>
                            <a href="<?php echo site_url('provider/cek_pesan') ?>">Kotak Masuk <span class="label label-primary">1</span></a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('Pelelangan/status_penawaran') ?>">Status Penawaran <span class="label label-success">New </span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-info">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">View All</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <strong><?php echo $this->session->userdata('nama_depan');  ?></strong> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="<?php echo site_url('provider/profil')?>"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('user/account')?>"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="<?php echo base_url('user/logout')?>"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="<?php echo site_url('dashboard')?>"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    
                     <!--  <li>
                        <a href="<?php echo site_url('provider')?>"><i class="fa fa-fw fa-list-alt"></i> Profil Provider</a>
                    </li> -->
                    
                    <!-- 
                    <li>
                        <a href="<?php echo site_url('buku'); ?>"><i class="fa fa-fw fa-tags-o"><span class="glyphicon glyphicon-tags" aria-hidden="true"></span></i> Stok Buku</a>
                    </li> -->
                    <!-- <li>
                        <a href="<?php echo site_url('user')?>"><i class="fa fa-fw fa-user-o"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></i> User</a>
                    </li> -->
                    
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-wrench"></i> Panel Manager <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="<?php echo site_url('user')?>"><i class="fa fa-fw fa-user-o"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></i> Account Manager </a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('provider/list_provider') ?>"><i class="fa fa-fw fa-list-alt"></i> Provider Manager </a>
                            </li>

                             
                            <li>
                                <a href="<?php echo site_url('provider/course_filter') ?>"><i class="fa fa-fw fa-filter"></i> Training  Manager </a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('provider/pelatihan_all') ?>"><i class="fa fa-fw fa-list-alt"></i> Direktori Training </a>
                            </li>

                        </ul>
                    </li>

                     <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#abc"><i class="fa fa-fw fa-wrench"></i> Panel Employee <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="abc" class="collapse">
                            <li>
                                <a href="<?php echo site_url('training/verification_training_request') ?>"><i class="fa fa-fw fa-filter"></i> Training Transaction </a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('training/verification_support_request') ?>"><i class="fa fa-fw fa-filter"></i> Training Request </a>
                            </li>                            
                        </ul>
                    </li>

                     <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#vvv"><i class="fa fa-fw fa-wrench"></i> Panel Evaluasi <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="vvv" class="collapse">
                         <li>
                                <a href="<?php echo site_url('Verifikasi/evaluasi_1_start') ?>"><i class="glyphicon glyphicon-copy"></i> Evaluasi Level 1 </a>
                            </li>
                            <li>
                                <a href="javascript:;" data-toggle="collapse" data-target="#bbb"><i class="glyphicon glyphicon-copy"></i> Evaluasi Level 3 <i class="fa fa-fw fa-caret-down"></i></a>
                                 <ul id="bbb" class="collapse nav nav-third-level" >
                                  <li>
                                    <a href="<?php echo site_url('Verifikasi/evaluasi_3_start') ?>"><i class="glyphicon glyphicon-copy"></i> Pddk Berjenjang </a>
                                  </li>
                                   <li>
                                    <a href="<?php echo site_url('Verifikasi/evaluasi_3_start') ?>"><i class="glyphicon glyphicon-copy"></i> Public Training </a>
                                  </li>
                                 </ul>
                            </li>
                            <li>
                                <a href="<?php echo site_url('Verifikasi/evaluasi_4_start') ?>"><i class="glyphicon glyphicon-copy"></i> Evaluasi Level 4 </a>
                            </li>
                             <li>
                                <a href="<?php echo site_url('') ?>"><i class="glyphicon glyphicon-copy"></i> Evaluasi Level 5 </a>
                            </li>


                             

                        </ul>

                    </li>



                     <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#lll"><i class="fa fa-fw fa-wrench"></i> Panel Lelang <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="lll" class="collapse">
                            
                            <li>
                                <a href="<?php echo site_url('Pelelangan/list_lelang') ?>"><i class="glyphicon glyphicon-copy"></i> Daftar Lelangan </a>
                            </li>
                             <li>
                                 <a href="<?php echo site_url('Pelelangan/verification_lelang') ?>"><i class="glyphicon glyphicon-copy"></i> Lelang  Transaction</a>
                            </li>
                            


                             

                        </ul>
                    </li>



                    <li class="active">
                        <a href="<?php echo site_url('Dashboard')?>"><i class="fa fa-fw fa-file"></i> Halaman Admin</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('Dashboard')?>"><i class="fa fa-fw fa-dashboard"></i> RTL Dashboard</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('provider/terms')?>"><i class="fa fa-fw fa-dashboard"></i> Terms & Condition</a>
                    </li>
                     <li>
                        <a href="<?php echo site_url('provider/contacts')?>"><i class="fa fa-fw fa-bullhorn"></i> Contact Us </a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-fw fa-bar-chart-o"></i> Direktori Panel</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('sms_gateway')?>"><i class="fa fa-fw  fa-envelope"></i>  SMS  GATEWAY</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
        
        <?php } else  { ?>
        
        
        
        
           <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"><a href="#"></a></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">
                    <img src="<?php echo base_url() ?>assets/konfigurasi4.png" alt="">


                    </a>
            
            <a class="navbar-brand" href="index.html">User Provider</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <span class="badge badge-success">new</span><b class="caret"></b>
</a>
                    <ul class="dropdown-menu message-dropdown">
                        <li class="message-preview">
                            <a href="<?php echo site_url('Pelelangan/status_penawaran') ?>">
                              <span class="glyphicon glyphicon-tag"></span> List Keikutsertaan lelang
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                              
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                               
                            </a>
                        </li>
                        <li class="message-footer">
                            <a href="#">Read All New Messages</a>
                        </li>
                    </ul>
                </li>
                <!-- <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu alert-dropdown">
                        <li>
                            <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-info">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">View All</a>
                        </li>
                    </ul>
                </li> -->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <strong><?php echo $this->session->userdata('nama_depan');  ?></strong> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="<?php echo site_url('user/account')?>"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <!-- <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li -->
                        <li class="divider"></li>
                        <li>
                            <a href="<?php echo base_url('user/logout')?>"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="<?php echo site_url('dashboard')?>"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                     <li >
                        <a href="<?php echo site_url('provider')?>"><i class="fa fa-fw fa-file"></i> Registrasi </a>
                    </li>
                   
                    
                   
                    <li>
                        <a href="<?php echo site_url('provider/profil')?>"><i class="fa fa-fw fa-list-alt"></i> Provider </a>
                    </li>
                   

                    <li>
                        <a href="<?php echo site_url('provider/terms')?>"><i class="fa fa-fw fa-dashboard"></i> Terms & Condition</a>
                    </li>
                     <li>
                        <a href="<?php echo site_url('provider/contacts')?>"><i class="fa fa-fw fa-bullhorn"></i> Contact Us </a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
        
        <?php } ?>
        
         

     