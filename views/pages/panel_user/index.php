<style>
body {
  margin: 0;
 background: #ffffff;

 
  
}



</style>
    <div class="col-md-12" style="font-size:13px">

      <h3><i class="glyphicon glyphicon-dashboard"></i> Dashboard Training</h3>  
      <div class="btn-group pull-right" role="group" aria-label="...">
        <!-- <a href="<?php echo site_url('panel_user/evaluation') ?>" class="btn btn-success"><span class="glyphicon glyphicon-file"></span> Form Evaluasi </a> -->
      <!--  <a href="<?php echo site_url('panel_user/evaluation_form') ?>" class="btn btn-success"><span class="glyphicon glyphicon-file"></span> Form Evaluasi </a> -->
       
        
      </div>
      <hr>

        <?php if($this->session->userdata('message')) {?>
  
    <ul class="alert alert-info">
       <span class="glyphicon glyphicon-exclamation-sign"></span> <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
        
        </ul>
    <?php
    }
    ?>
    <?php if($this->session->userdata('warning')) {?>
  
    <ul class="alert alert-danger">
       <span class="glyphicon glyphicon-exclamation-sign"></span> <?php echo $this->session->userdata('warning') <> '' ? $this->session->userdata('warning') : ''; ?>
        
        </ul>
    <?php
    }
    ?>



     <?php if($this->session->userdata('berhasil')) {?>
  <br/>
    <ul class="alert alert-success">
       
        <span class="glyphicon glyphicon-ok"></span><?php echo $this->session->userdata('berhasil') <> '' ? $this->session->userdata('berhasil') : ''; ?>
        </ul>
    <?php
    }
    ?>
      <table id="table2"  class="table table-striped table-bordered table-hover" style="margin-bottom: 10px" data-show-toggle="true">
      <div class="well well-sm well-primary"><span class="glyphicon glyphicon-list"> </span> Jadwal Pendidikan Berjenjang Perum Perumnas <?php echo date('Y') ?></span></div>
       
          <thead >
                    <tr>
                    <th class="danger">No</th>
                    <th class="danger">Nama Pelatihan</th>
                    <th class="danger">Kategori</th>
                    <th class="danger">Jadwal Mulai</th>
                    <th class="danger">Jadwal Selesai </th>
                    <th class="danger">Kota </th>
                    </tr>
                   </thead>
                   <tfoot >
                    <tr>
                    <th class="danger">No</th>
                    <th class="danger">Nama Pelatihan</th>
                    <th class="danger">Kategori</th>
                    <th class="danger">Jadwal Mulai</th>
                    <th class="danger">Jadwal Selesai </th>
                    <th class="danger">Kota </th>
                    </tr>
                  </tfoot> 


                          
                         
                    <?php 
                    $no=1;
                    if( !empty($pddk_bj)){
                    foreach($pddk_bj as $result) { ?>
                    <tr  >
                          
                           <?php 
                           $date = date("Y-m-d");
                           $mydate = strtotime($result->waktu_in);
                           $curdate = strtotime($date);

                           if ($curdate > $mydate){?>
                            <td class="hidden"> </td>
                           <td class="hidden"><a href="<?php echo site_url('panel_user/detail_pddk_bj/'.$this->encrypt->encode($result->id_course)) ?>"><?php echo $result->judul_course ?></a></td>
                           <td class="hidden"><?php echo $result->nama_kategori ?> </td>
                           <td class="hidden"><?php echo tgl_indo($result->waktu_in )?> </td>
                           <td class="hidden"><?php echo tgl_indo($result->waktu_out )?> </td>
                            <td class="hidden"><?php echo $result->kota_course ?> </td>
                           <?php
                             } else {
                              $judul = strtolower($result->judul_course);
                            ?>
                           <td><?php echo $no++; ?></td>
                           <td class="col-md-4"><a href="<?php echo site_url('panel_user/detail_pddk_bj/'.$this->encrypt->encode($result->id_course)) ?>"><?php echo ucwords($judul) ?></a></td>
                           <td><?php echo $result->nama_kategori ?> </td>
                             <td ><?php echo tgl_indo($result->waktu_in )?> </td>
                           <td><?php echo tgl_indo($result->waktu_out )?> </td>
                            <td><?php echo $result->kota_course ?> </td>
                          <?php
                           }
                          ?>

                           

                        <?php }  ?>
                        </tr >
                       <?php } ?>
        </table>
        <hr style="border-top: 2px dashed #8c8b8b; background-color:#d62027;" />
        <div class="well well-sm well-primary"><span class="glyphicon glyphicon-list"> </span> Jadwal Public Training Perum Perumnas <?php echo date('Y') ?> </span></div>
      <table  id ="table1" class="table table-striped table-bordered table-hover" style="margin-bottom: 10px;font-size:12px" data-show-toggle="true">

       
                    <thead >
                    <tr>
                    <th class="danger">No</th>
                    <th class="danger ">Nama Pelatihan</th>
                    <th class="danger">Kategori</th>
                    <th class="danger">Jadwal Mulai</th>
                    <th class="danger">Jadwal Selesai </th>
                    <th class="danger">Kota </th>
                    </tr>
                   </thead>
                   <tfoot >
                    <tr>
                    <th class="danger">No</th>
                    <th class="danger">Nama Pelatihan</th>
                    <th class="danger">Kategori</th>
                    <th class="danger">Jadwal Mulai</th>
                    <th class="danger">Jadwal Selesai </th>
                    <th class="danger">Kota </th>
                    </tr>
                  </tfoot> 


                     <tbody>      
                         
                    <?php  $no=1; foreach($prov_approved as $result) {?>
                    <tr  >
                          
                           <?php 
                           $date = date("Y-m-d");
                           $mydate = strtotime($result->waktu_in);
                           $curdate = strtotime($date);
                          
                           if ($curdate > $mydate){?>
                            <td class="hidden"> </td>
                           <td class="hidden"><a href="<?php echo site_url('panel_user/detail/'.$this->encrypt->encode($result->id_course)) ?>"><?php echo $result->judul_course ?></a></td>
                           <td class="hidden"><?php echo $result->nama_kategori ?> </td>
                           <td class="hidden"><?php echo tgl_indo($result->waktu_in )?> </td>
                           <td class="hidden"><?php echo tgl_indo($result->waktu_out )?> </td>
                            <td class="hidden"><?php echo $result->kota_course ?> </td>
                           <?php
                             } else {
                              $judul = strtolower($result->judul_course);
                            ?>
                           <td><?php echo $no++; ?></td>
                           <td class="col-md-4"><a href="<?php echo site_url('panel_user/detail/'.$this->encrypt->encode($result->id_course)) ?>"><?php echo ucwords($judul) ?></a></td>
                           <td><?php echo $result->nama_kategori ?> </td>
                             <td ><?php echo tgl_indo($result->waktu_in )?> </td>
                           <td><?php echo tgl_indo($result->waktu_out )?> </td>
                            <td><?php echo $result->kota_course ?> </td>
                          <?php
                           }
                          ?>
                          
                           <!-- <td>

                              <div class="btn-group">
                              <button type="button" class="btn btn-primary">Process</button>
                              <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                <span class="caret"></span>
                              </button>
                              <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Approve</a></li>
                                <li><a href="#">Disapprove</a></li>
                              </ul>
                            </div> 


                           </td> -->
                        </tr >

                        <?php }?>
                        </tbody>
          </table>
         
        <!-- 
      <!-- column 2 
       <h3><i class="glyphicon glyphicon-dashboard"></i> Dashboard</h3>  
            
       <hr>
      
       <div class="row">
            <!-- center left
            <div class="col-md-7">
              <div class="well">Inbox Messages <span class="badge pull-right">3</span></div>
              
              <hr>
              
              <div class="panel panel-default">
                  <div class="panel-heading"><h4>Processing Status</h4></div>
                  <div class="panel-body">
                    
                    <small>Complete</small>
                    <div class="progress">
                      <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100" style="width: 72%">
                        <span class="sr-only">72% Complete</span>
                      </div>
                    </div>
                    <small>In Progress</small>
                    <div class="progress">
                      <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                        <span class="sr-only">20% Complete</span>
                      </div>
                    </div>
                    <small>At Risk</small>
                    <div class="progress">
                      <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                        <span class="sr-only">80% Complete</span>
                      </div>
                    </div>

                  </div><!--/panel-body
              </div> </panel  -                  
              
            </div><!--/col-->
        
            <!--center-right-->
            <!-- <div class="col-md-5">
              
                <ul class="nav nav-justified">
                    <li><a href="#"><i class="glyphicon glyphicon-cog"></i></a></li>
                    <li><a href="#"><i class="glyphicon glyphicon-heart"></i></a></li>
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-comment"></i><span class="count">3</span></a><ul class="dropdown-menu" role="menu"><li><a href="#">1. Is there a way..</a></li><li><a href="#">2. Hello, admin. I would..</a></li><li><a href="#"><strong>All messages</strong></a></li></ul></li>
                    <li><a href="#"><i class="glyphicon glyphicon-user"></i></a></li>
                    <li><a title="Add Widget" data-toggle="modal" href="#addWidgetModal"><span class="glyphicon glyphicon-plus-sign"></span></a></li>
                </ul>  
              
                <hr>
              
                <p>
                  This is a responsive dashboard-style layout that uses <a href="http://www.getbootstrap.com">Bootstrap 3</a>. You can use this template as a starting point to create something more unique.
                </p>
                <p>
                  Visit the Bootstrap Playground at <a href="http://www.bootply.com">Bootply</a> to tweak this layout, or discover 1000's of Bootstrap code examples and snippets.
                </p>
              
                <hr>
              
                <div class="btn-group btn-group-justified">
                  <a href="#" class="btn btn-info col-sm-3">
                    <i class="glyphicon glyphicon-plus"></i><br>
                    Service
                  </a>
                  <a href="#" class="btn btn-info col-sm-3">
                    <i class="glyphicon glyphicon-cloud"></i><br>
                    Cloud
                  </a>
                  <a href="#" class="btn btn-info col-sm-3">
                    <i class="glyphicon glyphicon-cog"></i><br>
                    Tools
                  </a>
                  <a href="#" class="btn btn-info col-sm-3">
                    <i class="glyphicon glyphicon-question-sign"></i><br>
                    Help
                  </a>
                </div>
              
            </div><!--/col-span-6--> 















































     
       </div><!--/row-->
    </div><!--/col-span-9-->
    
  </div><!--/row-->
  <!-- /upper section -->
  
  <!-- lower section -->
  <div class="row">
    
    <div class="col-md-12">
      <hr>
      <a href="#"><strong><h3>Comment</h3> </strong></a>  
     
    </div>
    <div class="col-md-8">

       <?php if($this->session->userdata('comment')) {?>
  
    <ul class="alert alert-info">
       <span class="glyphicon glyphicon-refresh"></span> <?php echo $this->session->userdata('comment') <> '' ? $this->session->userdata('comment') : ''; ?>
        
        </ul>
    <?php
    }
    ?>


      <?php echo form_open('panel_user/comment') ?>
      <div class="form-area">  
        <form role="form">
                    
         <div class="form-group">
                  
                    </div>
                    <div class="form-group">
                      
                       <input type="hidden" name="id_user"  class="form-control" value="<?php echo $this->session->userdata('ID_User')  ?>" readonly/>
                       <input type="hidden" name="nip"  class="form-control" value="<?php echo $this->session->userdata('NIP')  ?>" readonly/>
                       <input type="hidden" name="nama_peserta"  class="form-control" value="<?php echo $this->session->userdata('fullname')  ?>" readonly/>
                    <textarea class="form-control" name="comment_box" type="textarea" id="message" placeholder="Post Comment Here"  rows="7"></textarea>
                        <span class="help-block"><p id="characterLeft" class="help-block ">You have reached the limit</p></span>                    
                    </div>
           <div class="form-group">  
        <button type="submit" id="submit" name="submit" class="btn btn-primary pull-right">Post Comment</button>
        </div>
        </form>
       <?php echo form_close() ?>
    </div>
     <br/>
      <h2 class="page-header"></h2>
       <?php foreach($edit_user as $result) { ?>
          <ul class="comment-section">
 <?php if($result->NIP ==  '1389029' ) {?>
  
                <li class="comment author-comment">
                
                          <div class="info">
                              <a href="#">Author </a>
                              <span><?php echo  tgl_indo($result->date) ?></span>
                          </div>

                          <a class="avatar" href="#">
                              <img src="<?php echo base_url()?>assets/avatar_female.png?>" width="35" alt="Profile Avatar" title="Administrator" />
                          </a>
                           <p><?php echo  $result->comment ?></p>

                         
                </li>
             <?php } else {  ?>    
                <li class="comment user-comment ">
                      <div class="info">
                       <a href="#"><?php echo  $result->Nama_pegawai ?></a>
                        <span><?php echo  tgl_indo($result->date) ?></span>
                       </div>

                      <a class="avatar" href="#">
                      <img src="<?php echo base_url()?>assets/123t-avatar.png?>" width="35" alt="Profile Avatar" title="<?php echo  $result->Nama_pegawai ?>" />
                      </a>

                      <p><?php echo  $result->comment ?></p>

                </li>
      
                              
              </ul>

       <?php } ?>      


 <?php } ?>  


<!-- 


  
        <section class="comment-list">
          <!-- First Comment -->
          <!-- <article class="row">
            <div class="col-md-2 col-sm-2 hidden-xs">
              <figure class="avatar">
                <img class="img-responsive" src="<?php echo base_url()?>assets/steam.png" />
                <figcaption class="text-center"><small><?php echo  $result->Nama_pegawai ?></small></figcaption>
              </figure>
            </div>
            <div class="col-md-10 col-sm-6">
              <div class="panel panel-default arrow left">
                <div class="panel-body">
                  <header class="text-left">
                   
                  <time class="comment-date" ><i class="glyphicon glyphicon-time"></i> <?php echo  tgl_indo($result->date) ?></time>
                  </header>
                  <div class="comment-post">
                    <p>
                      <?php echo  $result->comment ?>
                    </p>
                     <p class="text-right"><a href="#" class="btn btn-default btn-sm"><i class="fa fa-reply"></i> reply</a></p>
                    </div>
                </div>
              </div>
              </article>
            
                <article class="row">
                  <div class="col-md-2 col-sm-2 col-md-offset-1 col-sm-offset-0 hidden-xs">
                   <figure class="thumbnail">
                <img class="img-responsive" src="http://www.keita-gaming.com/assets/profile/default-avatar-c5d8ec086224cb6fc4e395f4ba3018c2.jpg" />
                <figcaption class="text-center">username</figcaption>
              </figure>
            </div>
            <div class="col-md-9 col-sm-9">
              <div class="panel panel-default arrow left">
                <div class="panel-heading right">Reply</div>
                <div class="panel-body">
                  <header class="text-left">
                    <div class="comment-user"><i class="fa fa-user"></i> That Guy</div>
                    <time class="comment-date" datetime="16-12-2014 01:05"><i class="fa fa-clock-o"></i> Dec 16, 2014</time>
                  </header>
                  <div class="comment-post">
                    <p>
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    </p>
                  </div>
                  <p class="text-right"><a href="#" class="btn btn-default btn-sm"><i class="fa fa-reply"></i> reply</a></p>
                </div>
              </div>
            </div>
          </article> 

        </section> -->
      



       
      <!--tabs-->
     <!--  <div class="container">
        <ul class="nav nav-tabs" id="myTab">
          <li class="active"><a href="#profile" data-toggle="tab">Profile</a></li>
          <li><a href="#messages" data-toggle="tab">Messages</a></li>
          <li><a href="#settings" data-toggle="tab">Settings</a></li>
        </ul>
        
        <div class="tab-content">
          <div class="tab-pane active" id="profile">
            <h4><i class="glyphicon glyphicon-user"></i></h4>
            Lorem profile dolor sit amet, consectetur adipiscing elit. Duis pharetra varius quam sit amet vulputate. 
            <p>Quisque mauris augue, molestie tincidunt condimentum vitae, gravida a libero. Aenean sit amet felis 
              dolor, in sagittis nisi. Sed ac orci quis tortor imperdiet venenatis. Duis elementum auctor accumsan. 
              Aliquam in felis sit amet augue.</p>
          </div>
          <div class="tab-pane" id="messages">
            <h4><i class="glyphicon glyphicon-comment"></i></h4>
            Message ipsum dolor sit amet, consectetur adipiscing elit. Duis pharetra varius quam sit amet vulputate. 
            <p>Quisque mauris augue, molestie tincidunt condimentum vitae, gravida a libero. Aenean sit amet felis 
              dolor, in sagittis nisi. Sed ac orci quis tortor imperdiet venenatis. Duis elementum auctor accumsan. 
              Aliquam in felis sit amet augue.</p>
          </div>
          <div class="tab-pane" id="settings">
            <h4><i class="glyphicon glyphicon-cog"></i></h4>
            Lorem settings dolor sit amet, consectetur adipiscing elit. Duis pharetra varius quam sit amet vulputate. 
            <p>Quisque mauris augue, molestie tincidunt condimentum vitae, gravida a libero. Aenean sit amet felis 
              dolor, in sagittis nisi. Sed ac orci quis tortor imperdiet venenatis. Duis elementum auctor accumsan. 
              Aliquam in felis sit amet augue.</p>
          </div>
        </div>
      </div> -->
      <!--/tabs-->
      
      
     
      
      <hr>
      
      <div class="alert alert-info">
        <button type="button" class="close" data-dismiss="alert">×</button>
        Please remember to <a href="#">Logout</a> for classified security.
      </div>

    
    </div>


    <div class="col-md-4">
                  <div class="panel-heading"><h4>Bidang Training Favorit</h4></div>
                  <div class="panel-body">
                    
                    <?php foreach ($kategori as $result) { ?>
                    
                    <small><?php echo $result->nama_kategori ?></small>
                    <div class="progress">
                      <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="<?php echo $result->vote?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $result->vote?>%">
                        <?php echo $result->vote ?>%
                      </div>
                    </div>
                    

                    <?php } ?>
                     <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal1">Vote</button>
                   
                    <a href="<?php echo site_url('panel_user/resetsession')?>">View Result</a></div>
                    
                  </div>
   </div>
   <section id="contact" class="contact-section" style="background-color:#e7f5e4;">

  
<p class="alert alert-success"><b>Perumnas Training Agenda (PeTA)</b> adalah program yang diciptakan untuk menjembatani komunikasi antara Rekanan Pendidikan & Pelatihan (Provider) terdaftar dengan Karyawan Perumnas. Komunikasi yang dimaksud dalam hal ini adalah komunikasi dua arah dimana manfaatnya dapat dirasakan oleh kedua belah pihak dengan Divisi Pengembangan SDM cq. Departemen Pendidikan & Pelatihan yang bertindak selaku mediator</p>
<p class="alert alert-success">Daftar agenda training yang telah dirancang oleh Provider akan dapat diakses oleh seluruh Karyawan Perumnas dimana pun, sehingga memungkinkan Karyawan Perumnas yang membutuhkan Pelatihan tersebut untuk mendaftarkan diri sewaktu-waktu.</p>
<p class="alert alert-success">Bagi para Provider yang telah melakukan registrasi, selanjutnya secara rutin dapat mengakses PeTA untuk melakukan pembaharuan daftar program Pelatihan dan juga mendapatkan informasi penawaran kerjasama Pelatihan oleh Divisi Pengembangan SDM cq. Departemen Pendidikan & Pelatihan</p>
<p class="alert alert-success">Kehadiran PeTA diharapkan dapat memperlancar dan membuka kesempatan pengembangan kompetensi dan ilmu pengetahuan Karyawan Perumnas dengan menghadiri event training yang telah direncanakan oleh Provider.</p>
<p class="text-center">* * * <br/></p>

 
 
 </section>                 


                    <!-- <?php echo form_open('panel_user/polling');?>
                    <form action=" <?php echo site_url('panel_user/polling');?>" name ="myForm" method="post"> -->

                   <form name="myForm" >
                    <div class="modal fade " id="modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                          <div class="modal-dialog ">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="modal-title" id="myModalLabel"></h4>
                              </div>
                              
                              <div class="modal-body">
                                       <div class="panel panel-primary">
                                          <div class="panel-heading">
                                              <h3 class="panel-title">
                                                  <span class="glyphicon glyphicon-arrow-right"></span> Training bidang apa yang Anda sukai ?
                                              </h3>
                                          </div>
                                        
                                          <div class="panel-body">
                                            <?php foreach ($kategori as $result) { ?>
                                            
                                                       
                                                      <div class="radio" onchange="myFunction()">
                                                          <label>
                                                              <input type="radio" name="myRadios"  value="<?php echo $result->id_kategori ?>" >
                                                              <?php echo $result->nama_kategori ?>
                                                          </label>
                                                      </div>
                                                      <?php ?>
                                              
                                              <?php } ?>

                                              <p class="text-center text-success" id="demo2"></p>
                                          </div>
                                        
                                          

                                          <div class="panel-footer">
                                              <input type="btn" value="vote" onClick="addVote()" id="linkclick" class="btn btn-primary btn-sm" />
                                                  
                                           
                                         
                                      </div>
                                  </div>
                              <div class="modal-footer">

                               </form>
                              

                               
                              </div>


                            </div>

                          </div>
                        </div>




<script>
function myFunction() {
   // var x = document.getElementById("mySelect[]").value;
    //document.getElementById("demo").value = "You selected: " + x;

     var rad = document.myForm.myRadios;
    var prev = null;
    for(var i = 0; i < rad.length; i++) {
        rad[i].onclick = function() {
            (prev)? console.log(prev.value):null;
            if(this !== prev) {
                prev = this;
            }
            console.log(this.value)
        };
    }
}


</script>

<script type="text/javascript">
    var rad = document.myForm.myRadios;
    var prev = null;
    for(var i = 0; i < rad.length; i++) {
        rad[i].onclick = function() {
            (prev)? console.log(prev.value):null;
            if(this !== prev) {
                prev = this;
            }
            
            console.log(this.value)
             alert('changed ' + this.value );
             var x = rad.value;
             // document.getElementById("demo").value = "You selected: " + x ;

        };

    }

     function addVote() {
      var x = rad.value;
               //alert('changed' + x);


    
      $.ajax({
                url: "panel_user/polling",
                data:'id='+x,
                type: "POST",
                cache: false,
                beforeSend: function(){

                  $('#demo2').html("Loading...");
                  $('#demo2').html("<img height='20px' width='20px' src='<?php echo base_url()?>/assets/4.gif' />");
                },
                   success: function(json){      
                  try{  
                   var obj = jQuery.parseJSON(json);
                   //alert( obj['STATUS']);
                     $('#demo2').html("Berhasil menambah Vote Anda. Thanks!");
                   
                  }catch(e) {  
                   alert('Exception while request..');
                  }  
                  },
                  error: function(){      
                   alert('Error while request..');
                  }

              });








     }

</script>

<script type="text/javascript">
  
 
</script>



<!-- /Main -->
<script type="text/javascript">
 $(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#table1 tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" class="form-control" placeholder="Search '+title+'" />' );
    } );
 
    // DataTable
    $('#table2').DataTable({});
    var table = $('#table1').DataTable({

      
    });
 
    // Apply the search
    table.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );
} );
</script>