<style>
body {
  margin: 0;
 background: #ffffff;

 
  
}



</style>

   <div class="col-sm-9" style="font-size:13px">

      <h3><i class="glyphicon glyphicon-dashboard"></i> Dashboard Training</h3>  
      <hr>
  <p>Hasil Pencarian : keyword   "<i><?php echo $kata_kunci ?></i>"</p>
  <?php if (! empty($hasil_pencarian)) { ?>
        <?php if($this->session->userdata('message')) {?>
  
    <ul class="alert alert-info">
       <span class="glyphicon glyphicon-exclamation-sign"></span> <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
        
        </ul>
    <?php
    }
    ?>

      <table  class="table table-striped table-bordered table-hover" style="margin-bottom: 10px" data-show-toggle="true">
                    <tbody data-link="row" class="rowlink">
                    <th class="danger">No</th>
                    <th class="danger">Nama Pelatihan</th>
                    <th class="danger">Kategori</th>
                    <th class="danger">Jadwal Mulai</th>
                    <th class="danger">Jadwal Selesai </th>
                    <th class="danger">Kota </th>
                   


                          
                           <?php $no=1; ?>
                    <?php foreach($hasil_pencarian as $result) {?>
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
<?php } else 
 				{?>
                <br/>
	<p class="bg-primary"><i>  data tidak ditemukan..</i></p>
    
    <?php } ?>










































     