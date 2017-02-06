 <div class="row">
        <div class="col-md-6">

            <div class="well well-sm">
              <?php 
              $kode = $this->session->userdata('kd_user');
               if(validation_errors()) {?>
    
                                <ul class="alert alert-danger">
                                 <?php echo validation_errors('<ul>','</ul>')?>
                                </ul>
                            <?php
                            }
                            ?>

                         <form class="form-horizontal" method="post" action="<?php echo site_url('provider/contacts')?>" >
                        <legend class="text-center header">Contact us</legend>


                                <?php if($this->session->userdata('message')) {?>
                          
                            <ul class="alert alert-success">
                               <span class="glyphicon glyphicon-send"></span> <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                                
                                </ul>
                            <?php
                            }
                            ?>

                          <div class="form-group">
                          <label for="kode"></label>
                            <input type="hidden" name="kode_user"  class="form-control" value="<?php echo $kode;  ?>" readonly/>
                           </div>

                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                 <label for="name" class="h4">Name</label>
                                <input id="fname" name="name" type="text" placeholder="Full Name" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <label for="email" class="h4">Email</label>
                                <input id="email" name="email" type="email" placeholder="Email Address" class="form-control" required>
                            </div>
                        </div>

                         <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                   <label for="message" class="h4 ">Message</label>
                                <textarea class="form-control" id="message" name="message" placeholder="Enter your massage for us here. We will get back to you within 2 business days." rows="7"></textarea>
                            </div>
                        </div>
                        


                        <div class="form-group">
                           <div class="col-md-10 col-md-offset-1">
                                    <button type="submit" id="form-submit" class="btn btn-success btn-sm pull-right ">Send Message</button>
                            </div>
                        </div>
                       
                    </fieldset>
                </form>
                <?php echo form_close() ?> 
            </div>
        </div>
        <div class="col-md-6">
            <div>
                <div class="panel panel-default">
                    <div class="text-center header">Our Office</div>
                    <div class="panel-body text-center">
                        <h4>Address</h4>
                        <div>
                        Wisma Perum Perumnas | Diklat Dept.<br />
                        DI Pandjaitan Kav.11 | 6th Floor<br />
                        Cawang , Jakarta Timur<br />
                        <i class="fa fa-fw fa-phone"></i> 021-819 4807<br/>
                      <i class="fa fa-fw fa-send"></i> <a href="mailto:dept.diklat@perumnas.co.id">dept.diklat@perumnas.co.id</a><br />
                        </div>
                        <hr />
                        <div id="map1" class="map">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="http://maps.google.com/maps/api/js?sensor=false"></script>

<script type="text/javascript">
    jQuery(function ($) {
        function init_map1() {
            var myLocation = new google.maps.LatLng(-6.241586, 106.876977);
            var mapOptions = {
                center: myLocation,
                zoom: 16
            };
            var marker = new google.maps.Marker({
                position: myLocation,
                title: "Property Location"
            });
            var map = new google.maps.Map(document.getElementById("map1"),
                mapOptions);
            marker.setMap(map);
        }
        init_map1();
    });
</script>

<style>
    .map {
        min-width: 300px;
        min-height: 300px;
        width: 100%;
        height: 100%;
    }

    .header {
        background-color: #F5F5F5;
        color: #36A0FF;
        height: 70px;
        font-size: 27px;
        padding: 10px;
    }
</style>
