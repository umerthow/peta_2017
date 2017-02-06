<style type="text/css">


#loadingmessage{

  display:    none;
    position:   fixed;
    z-index:    1000;
    top:        0;
    left:       0;
    height:     100%;
    width:      100%;
    background: rgba( 255, 255, 255, .8 ) 
                url('<?php echo base_url() ?>/assets/ajax-loader-2.gif') 
                50% 50% 
                no-repeat;
}


  .timeline {
    list-style: none;
    padding: 10px 0;
    position: relative;
    font-weight: 300;
}
.timeline:before {
    top: 0;
    bottom: 0;
    position: absolute;
    content:" ";
    width: 2px;
    background: #ffffff;
    left: 50%;
    margin-left: -1.5px;
}
.timeline > li {
    margin-bottom: 20px;
    position: relative;
    width: 50%;
    float: left;
    clear: left;
}
.timeline > li:before, .timeline > li:after {
    content:" ";
    display: table;
}
.timeline > li:after {
    clear: both;
}
.timeline > li:before, .timeline > li:after {
    content:" ";
    display: table;
}
.timeline > li:after {
    clear: both;
}
.timeline > li > .timeline-panel {
    width: calc(100% - 25px);
    width: -moz-calc(100% - 25px);
    width: -webkit-calc(100% - 25px);
    float: left;
    border: 1px solid #dcdcdc;
    background: #ffffff;
    position: relative;
}
.timeline > li > .timeline-panel:before {
    position: absolute;
    top: 26px;
    right: -15px;
    display: inline-block;
    border-top: 15px solid transparent;
    border-left: 15px solid #dcdcdc;
    border-right: 0 solid #dcdcdc;
    border-bottom: 15px solid transparent;
    content:" ";
}
.timeline > li > .timeline-panel:after {
    position: absolute;
    top: 27px;
    right: -14px;
    display: inline-block;
    border-top: 14px solid transparent;
    border-left: 14px solid #ffffff;
    border-right: 0 solid #ffffff;
    border-bottom: 14px solid transparent;
    content:" ";
}
.timeline > li > .timeline-badge {
    color: #ffffff;
    width: 24px;
    height: 24px;
    line-height: 50px;
    text-align: center;
    position: absolute;
    top: 16px;
    right: -12px;
    z-index: 100;
}
.timeline > li.timeline-inverted > .timeline-panel {
    float: right;
}
.timeline > li.timeline-inverted > .timeline-panel:before {
    border-left-width: 0;
    border-right-width: 15px;
    left: -15px;
    right: auto;
}
.timeline > li.timeline-inverted > .timeline-panel:after {
    border-left-width: 0;
    border-right-width: 14px;
    left: -14px;
    right: auto;
}
.timeline-badge > a {
    color: #ffffff !important;
}
.timeline-badge a:hover {
    color: #dcdcdc !important;
}
.timeline-title {
    margin-top: 0;
    color: inherit;
}
.timeline-heading h4 {
    font-weight: 400;
    padding: 0 10px;
    color: #4679bd;
}
.timeline-body > p, .timeline-body > ul {
    padding: 10px 10px;
    margin-bottom: 0;
}
.timeline-footer {
    padding: 5px 15px;
    background-color:#f4f4f4;
}
.timeline-footer p { margin-bottom: 0; }
.timeline-footer > a {
    cursor: pointer;
    text-decoration: none;
}
.timeline > li.timeline-inverted {
    float: right;
    clear: right;
}
.timeline > li:nth-child(2) {
    margin-top: 60px;
}
.timeline > li.timeline-inverted > .timeline-badge {
    left: -12px;
}
.no-float {
    float: none !important;
}
@media (max-width: 767px) {
    ul.timeline:before {
        left: 40px;
    }
    ul.timeline > li {
        margin-bottom: 0px;
        position: relative;
        width:100%;
        float: left;
        clear: left;
    }
    ul.timeline > li > .timeline-panel {
        width: calc(100% - 65px);
        width: -moz-calc(100% - 65px);
        width: -webkit-calc(100% - 65px);
    }
 
    ul.timeline > li > .timeline-panel {
        float: right;
    }
    ul.timeline > li > .timeline-panel:before {
        border-left-width: 0;
        border-right-width: 15px;
        left: -15px;
        right: auto;
    }
    ul.timeline > li > .timeline-panel:after {
        border-left-width: 0;
        border-right-width: 14px;
        left: -14px;
        right: auto;
    }

  
</style>
<div class="col-md-9">
<h3><i class="glyphicon glyphicon-tasks"></i> Detail Training</h3>  
     <br/>
      



   
<?php
        
       // $rupiah=number_format($biaya_course,2,',','.');
        ?>
<?php if(!empty ($nama_provider)) { ?>
 <div class="panel panel-default">
  <div class="panel-heading"><strong>Informasi Training </strong>
    <p class="text-center text-success" id ="demo"></p>
  </div>

 <div id='loadingmessage' style='display:none'></div>
  <div class="panel-body" id="test">
     <div class="btn-group pull-right" role="group" aria-label="...">
       <!--  <a href="<?php echo site_url('panel_user/evaluation') ?>" class="btn btn-success"><span class="glyphicon glyphicon-file"></span> Form Evaluasi </a> -->
      </div>
                <table class="table table-hover" caption"Hello">
                <thead class="success">
                <tr ><td class="col-md-3">Nama Provider</td><td ><?php echo $nama_provider ?> <input  id="input-21d" value="<?php echo $rating ?>" type="number" class="rating" min=0 max=5 step=0.5 data-size="xs" disabled></td> </tr>
                <tr><td>Judul Pelatihan</td><td> <strong><?php echo $judul_course  ?></strong></td></tr>
                <tr><td>Tujuan Pelatihan</td><td> <?php echo $tujuan_pelatihan  ?></td></tr>
                <tr><td>Bidang</td><td><?php echo $nama_kategori ?></td></tr>
                <tr><td>Rencana Tanggal</td><td><?php echo tgl_indo($waktu_in) ?></td></tr>
                <tr><td>Rencana Selesai</td><td><?php echo tgl_indo($waktu_out) ?></td></tr>
                <tr><td>Kota</td><td><?php echo $kota_course ?></td></tr>

                <tr><td>Rencana Lokasi Training</td><td><?php echo $tempat_pelatihan ?></td></tr>
                <tr><td>Contact Person</td><td><?php echo $cp ?></td></tr>
                <tr><td>Telp</td><td><?php echo $content ?></td></tr>

                <tr><td>Materi Pelatihan</td></tr>
                <ul>
             <tr><td class="text-right">1</td><td><?php echo $skill ?></td></tr>
        <tr><td class="text-right">2</td><td><?php echo $knowledge ?></td></tr>
        <tr><td class="text-right">3</td><td><?php echo $attitude ?></td></tr>
        <tr><td class="text-right">4</td><td><?php echo $attitude1 ?></td></tr>
        <tr><td class="text-right">5</td><td><?php echo $attitude2 ?></td></tr>
        <tr><td class="text-right">6</td><td><?php echo $attitude3 ?></td></tr>
        <tr><td class="text-right">7</td><td><?php echo $attitude4 ?></td></tr>
        <tr><td class="text-right">8</td><td><?php echo $attitude5 ?></td></tr>
        <tr><td class="text-right">9</td><td><?php echo $attitude6 ?></td></tr>
        <tr><td class="text-right">10</td><td><?php echo $attitude7 ?></td></tr>
                </ul>
                 
                 <tr><td>Brosur</td><td><a href = "<?php echo base_url()."brosur/".$gatel; ?>" target="_blank" data-popup="true"> <button class="btn btn-default btn-sm dropdown-toggle" type="button"  aria-haspopup="true" aria-expanded="false">Lihat</button></a></td>
                    </tr> 
                <tr><td><td><a href = "<?php echo site_url('panel_user/daftar/'.$id_course) ?>" > <button class="btn btn-primary btn-sm dropdown-toggle form-control" type="button"  aria-haspopup="true" aria-expanded="false"><strong> DAFTAR</strong.</button></td></td></td>
                 
                 
             </thead>     
            </table>

     </div>
  </div>
</div>

<div class="col-md-3">
<h3><i class="glyphicon glyphicon-tag"></i> Recomendation </h3>  
     <br/>

     <div class="list-group" id="orders">
   <?php if (!empty($rekomendation)) { ?>


             <?php foreach ($rekomendation as $key)   {  $judulx = strtolower($key->judul_course);?>

             <?php if($key->judul_course == $judul_course  ) { ?>
              
             <?php } else { ?>
              <a href="javascript:void(0)" data-id="<?php echo $key->id_course?>" class="list-group-item list-group-item-warning makeAjaxCall">
             
            
                <div class="timeline-panel" style="font-size: 12px; border: 0">
                          <div class="timeline-heading">
                             <h4><?php echo ucwords($judulx)?></h4>
                          </div>

                          <div class="timeline-body">
                          <p class="minimize"><?php echo $key->tujuan_pelatihan ?></p>
                          </div>
                    </div>
                              
                       

         

             

                   <table class="table table-stripped" border="0" style="font-size: 12px; border: 0">
          
                    <tr>
                      <td>Provider</td><td>:</td><td><?php echo $key->nama_provider ?></td>
                    </tr>
                    <tr> 
                      <td>Mulai </td><td>:</td><td><?php echo tgl_indo($key->waktu_in) ?></td>
                    </tr>
                    <tr>
                      <td>Tempat</td><td>:</td><td><?php echo $key->kota_course ?></td>
                 </tr>
            
                 </table>
            </a>
            <?php } ?>
                    <?php } ?>

    <?php } ?>
                         <p class="list-group-item list-group-item-info"><i>Tidak ada rekomendasi yang lain</i></p>
               
     </div>



</div>


    <?php }else { ?>
    <p>   </p>


   <?php } if($this->session->userdata('cook')) {?>
  
    <ul class="alert alert-danger">
       
        <span class="glyphicon glyphicon-minus-sign"> </span><?php echo $this->session->userdata('cook') <> '' ? $this->session->userdata('cook') : ''; ?>
        </ul>
    <?php
    }
    ?>

    
</div>



<!-- 

<script>
 $(document).ready(function() {
  var $orders = $('#orders');
    $.ajax({
      type: 'GET',
      url:'<?php echo base_url() ?>panel_user/get_rekomendation_course/',
      dataType : 'json',
      success: function(orders){
       $.each(orders, function(i,order) {
         $orders.append('<p>Judul :'+ order.judul_course +'</p>');
       });
      }
    });

  });
</script> -->
<script type="text/javascript">
  jQuery(function(){

    var minimized_elements = $('p.minimize');
    
    minimized_elements.each(function(){    
        var t = $(this).text();        
        if(t.length < 100) return;
        
        $(this).html(
            t.slice(0,100)+'<span>... </span><a href="#" class="more">More</a>'+
            '<span style="display:none;">'+ t.slice(100,t.length)+' <a href="#" class="less">Less</a></span>'
        );
        
    }); 
    
    $('a.more', minimized_elements).click(function(event){
        event.preventDefault();
        $(this).hide().prev().hide();
        $(this).next().show();        
    });
    
    $('a.less', minimized_elements).click(function(event){
        event.preventDefault();
        $(this).parent().hide().prev().show().prev().show();    
    });

});
</script>

<script>
 $(document).on("click", ".makeAjaxCall", function () {
var myId = $(this).data('id');
 $('#loadingmessage').show();

  $.ajax({
      url: "<?php echo  base_url()?>/panel_user/detail_ajax",
       type: "POST",
        data:'id='+myId,
         cache: false,
                beforeSend: function(){
                   $("#demo").fadeIn("slow");
                  $('#demo').html("Sedang diproses..");
                   // $("#test").slideUp('slow');
                },
          success: function (ajaxData){

         $('#loadingmessage').fadeOut('fast');
         $('#demo').slideUp('slow');
           // $("#test").slideDown('slow');
            $("#test").html(ajaxData);
         
        }
 });
});
</script>