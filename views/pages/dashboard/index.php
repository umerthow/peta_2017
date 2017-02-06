<?php 
if ($this->session->userdata('status') == '0') {?>

<h2>Selamat Datang</h2>

<div class="row">
  <div class="well">
        <div class="col-xs-6 col-md-4">
            <img src="./assets/training.jpg" class="img-responsive" alt="">
        </div>
            <p class="text-justify">
                
        <p class="text-justify">
Selamat datang dalam program Perumnas Training Agenda (PeTA). Saudara/Perusahaan Saudara termasuk dalam Daftar Rekanan Pendidikan & Pelatihan Perumnas yang mendapatkan akses untuk menggunakan sarana komunikasi Pendidikan & Pelatihan Perumnas. PeTA didirikan untuk menjadi penghubung komunikasi terkait peluang kerjasama Pendidikan & Pelatihan antara Rekanan Pendidikan & Pelatihan (Provider) terdaftar dengan Karyawan Perumnas secara langsung. 

PeTA akan terus dikembangkan mengikuti kebutuhan yang ada. Untuk itu, kami harap Saudara berkenan untuk menyampaikan saran dan tanggapan terhadap fasilitas yang telah disuguhkan melalui program ini.</p>
<br/>
<br/>
<div class ="form-group">


<p class="text-right"><h5 class="text-right"><b>Administrator<br/> <small class="text-right">Divisi Pengembangan SDM cq. Departemen Pendidikan & Pelatihan</small></b></h5></p>

</div>
</div>
</div>

<div  id="myModal2" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModal2"><b>PEMBERITAHUAN</b></h4>
      </div>
    <div class="modal-body">
<p align="justify">Yth. Para Rekanan Pendidikan dan Pelatihan (Provider):</p>
<br/>
<p align="justify">Sehubungan dengan penggunaan fasilitas PeTA dalam rangka menjembatani komunikasi kebutuhan dan penawaran Public Training antara Karyawan dan Provider Pendidikan & Pelatihan, maka bersama ini kami sampaikan sebagai berikut :</p>
<br/>
<ol>
<li align="justify">Batas akhir pendaftaran usulan Pelatihan bagi Karyawan dibatasi hingga tanggal <b>30 Maret 2017 </b>untuk Pelatihan yang akan berlangsung dalam Tahun Anggaran 2017 atau 31 Desember 2017, untuk itu agar Provider dalam melakukan penawaran Public Training dapat mengantisipasi batas waktu tersebut.</li>
<br/>
<li align="justify">Penawaran kerjasama pelaksanaan in house training akan berlangsung sepanjang waktu sesuai kebutuhan yang ada, untuk itu diharapakan Provider secara rutin melakukan log in untuk memastikan status aktif terhadap username yang telah didaftarkan.</li>

</ol>
<br/><br/>
<p align="justify">Demikian disampaikan, atas perhatiannya diucapkan terima kasih.</p>
<br/><br/>
<p class="text-right"><h5 class="text-right"><b>General Manager <br/> <small class="text-right">Divisi Pengembangan SDM Perumnas</small></b></h5></p>
    </div>
  </div>
</div>
</div>

 <div class="form-group">
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target=".bs-example-modal-lg">WELCOME</button>
<div>
<div  id="myModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModal">SELAMAT DATANG</h4>
      </div>
      <div class="modal-body">

<p class="text-justify">Perumnas Training Agenda (PeTA) adalah program yang diciptakan untuk menjembatani komunikasi antara Rekanan Pendidikan & Pelatihan (Provider) terdaftar dengan Karyawan Perumnas. Komunikasi yang dimaksud dalam hal ini adalah komunikasi dua arah dimana manfaatnya dapat dirasakan oleh kedua belah pihak dengan Divisi Pengembangan SDM cq. Departemen Pendidikan & Pelatihan yang bertindak selaku mediator</p>
<p class="text-justify">Daftar agenda training yang telah dirancang oleh Provider akan dapat diakses oleh seluruh Karyawan Perumnas dimana pun, sehingga memungkinkan Karyawan Perumnas yang membutuhkan Pelatihan tersebut untuk mendaftarkan diri sewaktu-waktu.</p>
<p class="text-justify">Bagi para Provider yang telah melakukan registrasi, selanjutnya secara rutin dapat mengakses PeTA untuk melakukan pembaharuan daftar program Pelatihan dan juga mendapatkan informasi penawaran kerjasama Pelatihan oleh Divisi Pengembangan SDM cq. Departemen Pendidikan & Pelatihan</p>
<p class="text-justify">Kehadiran PeTA diharapkan dapat memperlancar dan membuka kesempatan pengembangan kompetensi dan ilmu pengetahuan Karyawan Perumnas dengan menghadiri event training yang telah direncanakan oleh Provider.</p>

</li>
<br/>
<br/><br/>
<br/><br/>
<p align="left"><h5><b>Administrator</b></h5></p>
    </div>
  </div>
</div>
<?php } else if ($this->session->userdata('level') == 'admin') { ?>

<h2>Selamat Datang Admin </h2>

<div class="row">


<div  id="myModal2" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModal2"><b>PEMBERITAHUAN</b></h4>
      </div>
    <div class="modal-body">
<p align="justify">Yth. Para Rekanan Pendidikan dan Pelatihan (Provider):</p>
<br/>
<p align="justify">Sehubungan dengan penggunaan fasilitas PeTA dalam rangka menjembatani komunikasi kebutuhan dan penawaran Public Training antara Karyawan dan Provider Pendidikan & Pelatihan, maka bersama ini kami sampaikan sebagai berikut :</p>
<br/>
<ol>
<li align="justify">Batas akhir pendaftaran usulan Pelatihan bagi Karyawan dibatasi hingga tanggal <b>30 Juni 2016 </b>untuk Pelatihan yang akan berlangsung dalam Tahun Anggaran 2016 atau 31 Desember 2016, untuk itu agar Provider dalam melakukan penawaran Public Training dapat mengantisipasi batas waktu tersebut.</li>
<br/>
<li align="justify">Penawaran kerjasama pelaksanaan in house training akan berlangsung sepanjang waktu sesuai kebutuhan yang ada, untuk itu diharapakan Provider secara rutin melakukan log in untuk memastikan status aktif terhadap username yang telah didaftarkan.</li>

</ol>
<br/><br/>
<p align="justify">Demikian disampaikan, atas perhatiannya diucapkan terima kasih.</p>
<br/><br/>
<p class="text-right"><h5 class="text-right"><b>General Manager <br/> <small class="text-right">Divisi Pengembangan SDM Perumnas</small></b></h5></p>
    </div>
  </div>
</div>
</div>

<div class="col-lg-3 col-md-6">
  <br/>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                   <div class="huge"><?php echo $angka->pesan ?></div>
                                    <div>New Message!</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo site_url('provider/cek_pesan') ?>">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                  <br/>
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge" id="mycourse"><?php

                                       $courseny = $angka->course;
                                     echo $angka->course  ?></div>
                                    <div>New Training Info !</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo site_url('provider/course_filter') ?>">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                  <br/>
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-file fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge" id="myTransaksi"><?php
                                       $transaksi = $angka->transaksi;

                                     echo $angka->transaksi  ?></div>
                                    <div>New Transaction !</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo site_url('training/verification_training_request') ?>">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                  <br/>
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-support fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $angka->info  ?></div>
                                    <div>Support Request!</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo site_url('training/verification_support_request') ?>">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                  <br/>
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tag fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $angka->new_lelang  ?></div>
                                    <div>New Lelang Transc</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo site_url('Pelelangan/verification_lelang') ?>">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
              <div class="col-lg-3 col-md-6">
                  <br/>
                    <div class="panel panel-blue">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-random fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge" id="mydelta" style="font-size:26px"><?php 
                                    $new_delta =$angka->new_delta;
                                    echo round($new_delta);  

                                    ?></div>%
                                    <div>Effectivitas</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo site_url('verifikasi/efektivitas') ?>">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                </div>
<!--panel lelang -->
 
            <div class="panel panel-danger" >
              <div class="panel-heading">
              <div class="btn-group pull-right">
                  <a href="<?php echo base_url()."brosur/prosedure-lelang_2016-03-01_03-22-58.pdf" ?>" class="btn btn-default btn-xs" target="_blank"><span class="glyphicon glyphicon-info-sign "></span> Prosedure lelang</a>
                  <a href="#" class="btn btn-default btn-xs" data-toggle="collapse" data-target="#demo2" >collapse</a>
              </div>

                <h3 class="panel-title"><strong> Informasi Lelang Terbaru  </strong><span class="label label-danger"> New</span>    

                       </h3>
              </div>
              <div  id="demo2"  class="panel-body collapse in">
               <div class="list-group">
          
                
                  <?php if (!empty($lelang)) { ?>
                                                <?php foreach ($lelang as $value)  
                                                {
                                                     $judul = strtolower($value->judul);
                                                  ?>
                                                <a href="<?php echo site_url('Pelelangan/detail_item/'.$this->encrypt->encode($value->id_lelang)) ?>" class="list-group-item list-group-item"><span class="glyphicon glyphicon-tag"></span> <?php $no=1; ?><?php echo ucwords($judul) ?> <?php if($value->status == 0) { echo "<span class='label label-danger label-as-badge pull-right'>Closed"; } else if ($value->status == 1){ echo "<span class='label label-success label-as-badge pull-right'>Open!"; } else echo "<span class='label label-primary label-as-badge pull-right'>Up Coming!";?>


                                                </span></a>
                                                    
                                        <?php }  ?>
                                <br/>
                                  <h5><small><p class="text-right"> Daftar lelang dari div. PSDM Perum Perumnas <br/><b class="text-right"> Terima Kasih. </b></small></h5></p>
                                        
                                   
                  <?php }else {?>
                         <li>Tidak ada data</li>
               <?php }?>
              </div>
               
                   
                
              </div>
            </div>
          



 <div class="" style="font-family:arial;font-size:12px">

               <h5><b>Permintaan Pelatihan Karyawan : </b></h5>
                
                  <table id="example" class="table table-striped table-bordered table-hover" ">
                  <thead>
                    <tr>
                      <th style="border:thin solid #cacaca; font-weight:bold;">#</th>
                      <th style="border:thin solid #cacaca;  font-weight:bold;">Pelatihan</th>
                      
                    </tr>
                </thead>
                <tbody>
                <?php $no=1; ?>
                  <?php if (!empty($datanya)) { ?>
                                                <?php foreach ($datanya as $result) { $judul = strtoupper($result->judul_course); ?>
                                                    <tr>
                                                        <td ><?php echo $no++ ?></td>
                                                        <td > <?php echo $judul ?></td>
                                                    </tr>
                                                
                                                    
                                        <?php }  ?>
                         <?php }else {?>
                         <li>Tidak ada data</li>
                         <?php } ?>
                </tbody>
                </table>
                <h5><small><p class="text-right"> Provider yang memiliki Pelatihan diatas mohon untuk mendaftarkan Pelatihannya.<br/><b class="text-right"> Terima Kasih. </b></small></h5></p>



            
           

  <div class="well">
    <div class="col-xs-6 col-md-4">
      <img src="./assets/training.jpg" class="img-responsive" alt="">
    </div>
      <p class="text-justify">
        
        <p class="text-justify">
Selamat datang dalam program Perumnas Training Agenda (PeTA). Saudara/Perusahaan Saudara termasuk dalam Daftar Rekanan Pendidikan & Pelatihan Perumnas yang mendapatkan akses untuk menggunakan sarana komunikasi Pendidikan & Pelatihan Perumnas. PeTA didirikan untuk menjadi penghubung komunikasi terkait peluang kerjasama Pendidikan & Pelatihan antara Rekanan Pendidikan & Pelatihan (Provider) terdaftar dengan Karyawan Perumnas secara langsung. 

PeTA akan terus dikembangkan mengikuti kebutuhan yang ada. Untuk itu, kami harap Saudara berkenan untuk menyampaikan saran dan tanggapan terhadap fasilitas yang telah disuguhkan melalui program ini.</p>
<br/>
<br/>
<div class ="form-group">


<p class="text-right"><h5 class="text-right"><b>Administrator<br/> <small class="text-right">Divisi Pengembangan SDM cq. Departemen Pendidikan & Pelatihan</small></b></h5></p>

</div>
</div>
</div>



<?php } else  { ?>

<div  id="myModal2" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModal2"><b>PEMBERITAHUAN</b></h4>
      </div>
    <div class="modal-body">
<p align="justify">Yth. Para Rekanan Pendidikan dan Pelatihan (Provider):</p>
<br/>
<p align="justify">Sehubungan dengan penggunaan fasilitas PeTA dalam rangka menjembatani komunikasi kebutuhan dan penawaran Public Training antara Karyawan dan Provider Pendidikan & Pelatihan, maka bersama ini kami sampaikan sebagai berikut :</p>
<br/>
<ol>
<li align="justify">Batas akhir pendaftaran usulan Pelatihan bagi Karyawan dibatasi hingga tanggal <b>30 Juni 2016 </b>untuk Pelatihan yang akan berlangsung dalam Tahun Anggaran 2016 atau 31 Desember 2016, untuk itu agar Provider dalam melakukan penawaran Public Training dapat mengantisipasi batas waktu tersebut.</li>
<br/>
<li align="justify">Penawaran kerjasama pelaksanaan in house training akan berlangsung sepanjang waktu sesuai kebutuhan yang ada, untuk itu diharapakan Provider secara rutin melakukan log in untuk memastikan status aktif terhadap username yang telah didaftarkan.</li>

</ol>
<br/><br/>
<p align="justify">Demikian disampaikan, atas perhatiannya diucapkan terima kasih.</p>
<br/><br/>
<p class="text-right"><h5 class="text-right"><b>General Manager <br/> <small class="text-right">Divisi Pengembangan SDM Perumnas</small></b></h5></p>
    </div>
  </div>
</div>
</div>
          
        <?php if($this->session->userdata('message')) {?>
  
    <ul class="alert alert-info">
       <span class="glyphicon glyphicon-exclamation-sign"></span> <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
        
        </ul>
    <?php
    }
    ?>


            <div class="col-md-12">
            <div class="panel panel-danger" >
              <div class="panel-heading">
              <div class="btn-group pull-right">
                  <a href="<?php echo base_url()."brosur/prosedure-lelang_2016-03-01_03-22-58.pdf" ?>" class="btn btn-default btn-xs" target="_blank"><span class="glyphicon glyphicon-info-sign "></span> Prosedure lelang</a>
                  <a href="#" class="btn btn-default btn-xs" data-toggle="collapse" data-target="#collaps" >collapse</a>
              </div>

                <h3 class="panel-title"><strong> Informasi Lelang Terbaru  </strong><span class="label label-danger"> New</span>    





                       </h3>
              </div>
              <div  id="collaps"  class="panel-body collapse in">
               <div class="list-group">
           
 
                
                  <?php if (!empty($lelang)) { ?>
                                                <?php foreach ($lelang as $value) { 
                                                    $judul = strtolower($value->judul);?>
                                                <a href="<?php echo site_url('Pelelangan/detail_item/'.$this->encrypt->encode($value->id_lelang)) ?>" class="list-group-item list-group-item"><span class="glyphicon glyphicon-tag"></span> <?php $no=1; ?><?php echo ucwords($judul) ?> <?php if($value->status == 0) { echo "<span class='label label-danger label-as-badge pull-right'>Closed"; } else if ($value->status == 1){ echo "<span class='label label-success label-as-badge pull-right'>Open!"; } else echo "<span class='label label-primary label-as-badge pull-right'>Up Coming!";?>


                                                </span></a>
                                        <?php }  ?>
                                <br/>
                                  <h5><small><p class="text-right"> Daftar lelang dari div. PSDM Perum Perumnas <br/><b class="text-right"> Terima Kasih. </b></small></h5></p>
                                        
                                   
                  <?php }else {?>
                         <li>Tidak ada data</li>
               <?php }?>
              </div>
               
                   
                
              </div>
            </div>
            <div class="panel panel-primary" >
              <div class="panel-heading">
                <h3 class="panel-title">Pengumuman permintaan pelatihan </h3>
              </div>
              <div class="panel-body">
                 <h5><b>Permintaan Pelatihan Karyawan  : </b></h5>
                
                  <table id="example" class="table table-striped table-bordered table-hover" ">
                  <thead>
                    <tr>
                      <th style="border:thin solid #cacaca; font-weight:bold;">#</th>
                      <th style="border:thin solid #cacaca;  font-weight:bold;">Pelatihan</th>
                      
                    </tr>
                </thead>
                <tbody>
                <?php $no=1; ?>
                  <?php if (!empty($datanya)) { ?>
                                                <?php foreach ($datanya as $result) { $judul = strtoupper($result->judul_course); ?>
                                                    <tr>
                                                        <td ><?php echo $no++ ?></td>
                                                        <td > <?php echo $judul ?></td>
                                                    </tr>
                                                
                                                    
                                        <?php }  ?>
                         <?php }else {?>
                         <li>Tidak ada data</li>
                         <?php } ?>
                </tbody>
                </table>
                <h5><small><p class="text-right"> Provider yang memiliki Pelatihan diatas mohon untuk mendaftarkan Pelatihannya.<br/><b class="text-right"> Terima Kasih. </b></small></h5></p>

              </div>
            </div>
<h2>Selamat Datang</h2>

<div class="row">
  <div class="well">
    <div class="col-xs-6 col-md-4">
      <img src="./assets/training.jpg" class="img-responsive" alt="">
    </div>
      <p class="text-justify">
        
        <p class="text-justify">
Selamat datang dalam program Perumnas Training Agenda (PeTA). Saudara/Perusahaan Saudara termasuk dalam Daftar Rekanan Pendidikan & Pelatihan Perumnas yang mendapatkan akses untuk menggunakan sarana komunikasi Pendidikan & Pelatihan Perumnas. PeTA didirikan untuk menjadi penghubung komunikasi terkait peluang kerjasama Pendidikan & Pelatihan antara Rekanan Pendidikan & Pelatihan (Provider) terdaftar dengan Karyawan Perumnas secara langsung. 

PeTA akan terus dikembangkan mengikuti kebutuhan yang ada. Untuk itu, kami harap Saudara berkenan untuk menyampaikan saran dan tanggapan terhadap fasilitas yang telah disuguhkan melalui program ini.</p>
<br/>
<br/>
<div class ="form-group">


<p class="text-right"><h5 class="text-right"><b>Administrator<br/> <small class="text-right">Divisi Pengembangan SDM cq. Departemen Pendidikan & Pelatihan</small></b></h5></p>

</div>
</div>
</div>


 <div class="form-group">
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target=".bs-example-modal-lg">WELCOME</button>
<div>
<div  id="myModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModal">SELAMAT DATANG</h4>
      </div>
    <div class="modal-body">

<p class="text-justify">Perumnas Training Agenda (PeTA) adalah program yang diciptakan untuk menjembatani komunikasi antara Rekanan Pendidikan & Pelatihan (Provider) terdaftar dengan Karyawan Perumnas. Komunikasi yang dimaksud dalam hal ini adalah komunikasi dua arah dimana manfaatnya dapat dirasakan oleh kedua belah pihak dengan Divisi Pengembangan SDM cq. Departemen Pendidikan & Pelatihan yang bertindak selaku mediator</p>
<p class="text-justify">Daftar agenda training yang telah dirancang oleh Provider akan dapat diakses oleh seluruh Karyawan Perumnas dimana pun, sehingga memungkinkan Karyawan Perumnas yang membutuhkan Pelatihan tersebut untuk mendaftarkan diri sewaktu-waktu.</p>
<p class="text-justify">Bagi para Provider yang telah melakukan registrasi, selanjutnya secara rutin dapat mengakses PeTA untuk melakukan pembaharuan daftar program Pelatihan dan juga mendapatkan informasi penawaran kerjasama Pelatihan oleh Divisi Pengembangan SDM cq. Departemen Pendidikan & Pelatihan</p>
<p class="text-justify">Kehadiran PeTA diharapkan dapat memperlancar dan membuka kesempatan pengembangan kompetensi dan ilmu pengetahuan Karyawan Perumnas dengan menghadiri event training yang telah direncanakan oleh Provider.</p>

</li>
<br/>
<br/><br/>
<br/><br/>
<p align="left"><h5><b>Administrator</b></h5></p>
    </div>
  </div>
</div>

 
        <?php } ?>



<script type="text/javascript">
  var options = {
  useEasing : true, 
  useGrouping : true, 
  separator : ',', 
  decimal : '.', 
  prefix : '', 
  suffix : '' 
};
var demo = new CountUp("myTransaksi", 0, <?php echo  $transaksi ?>, 0, 2.5, options);
var demo2 = new CountUp("mycourse", 0, <?php echo  $courseny ?>, 0, 2.5, options);
var demo3 = new CountUp("mydelta", 0, <?php echo  $new_delta ?>, 1, 3, options);
demo.start();
demo2.start();
demo3.start();

</script>


<script type="text/javascript">
    $(document).ready(function(){
        $("#myModal2").modal('show');
    });
</script>

<script type="text/javascript">
        $(document).ready(function() {
    $('#example').DataTable( {
        "scrollY":        "200px",
        "scrollCollapse": true,
        "paging":         true,
        "filter": false
    } );
} );
</script>