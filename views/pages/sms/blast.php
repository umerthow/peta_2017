<div class="row">
 <?php if($this->session->userdata('message')) {?>
  
    <ul class="alert alert-info">
       <span class="glyphicon glyphicon-exclamation-sign"></span> <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
        
        </ul>
    <?php
    }
    ?>
    <?php if($this->session->userdata('berhasil')) {?>
  
    <ul class="alert alert-success">
       <span class="glyphicon glyphicon-ok"></span> <?php echo $this->session->userdata('berhasil') <> '' ? $this->session->userdata('berhasil') : ''; ?>
        
        </ul>
    <?php
    }
    ?>
<h3 class="breadcrumb "> SMS GATEWAY <div class="btn-group pull-right" role="group" aria-label="...">
  <a href="<?php echo site_url('sms_gateway')?>" class="btn btn-primary">SINGLE SMS</a>
  <a href="<?php echo site_url('sms_gateway/smsblast')?>" class="btn btn-success">GROUP SMS</a>
</div> </h3>

<div class="panel panel-success">

<div class="panel-heading">
  <h4>Group SMS</h4>
  
 </div>


<div class="panel-body">
   

  <div class="col-md-6">
   <?php echo form_open('sms_gateway/proses_kirim_massal') ?>
    <div class="form-group">
     <label for="kode">PILIH GROUP</label>
      <select class="form-control" name="group">
       <?php 
            foreach($list as $row ) { ?>
        <option value="<?php  echo  $row->id_group ?>"><?php  echo  $row->nama_group ?></option>
                <?php } ?>
      </select>
      </div>
       <div class="form-group">
        <label for="message">TEXS SMS</label>
        <textarea name="pesan" id="message" class="form-control" rows="5"  data-toggle="tooltip" data-placement="right" title="Isi text disini.." placeholder="Isi pesan text disini.."></textarea>
        <p> <small class="help-block pull-right"><span id="remaining">160 characters remaining</span> <span id="messages">1 message(s)</span> </small></p>      
      </div>

      <div class="form-group">
      <input type="submit" name="update" id="tambah" value="KIRIM" class="btn btn-warning" />
      <a href="<?php echo site_url('sms_gateway') ?>" class="btn btn-default" role="button">Cancel</a>
      </div>

  <?php
  echo form_close();
  ?>
  </div>

     <div class="col-md-4">
     <p><strong>LIST GROUPS</strong></p>
      <table  class="table table-striped table-bordered table-hover" style="margin-bottom: 10px" data-show-toggle="true">
                    <tbody data-link="row" class="rowlink">
                    <th class="success">#</th>
                    <th class="success col-md-4">Nama</th>
                    <th class="success">Action</th>
                    

       
          <tr>
           <?php $no=1;
            foreach($list as $row ) { ?>
            <?php if(!empty($row)) { ?>
               <td><?php echo $no++ ?> </td>


                 <td><a href="<?php echo site_url('sms_gateway/groups/'.$row->id_group.'') ?>"><?php  echo  $row->nama_group ?></a></td>
                <td><a href="<?php echo site_url('sms_gateway/deletegroups/'.$row->id_group.'') ?>" >delete</a></td>
                <td> 
                                
                                <a href="javascript:void(0)" id="rejected2" class="open-AddBookDialog2" data-toggle="modal" data-target="#confirm-reject2" >Delete GROUP</a>


                                
                                </li>
                                
                               
                              </ul>
                            </div> 
                          </td>

           
              </tr>
                <?php } else { ?>
                  <td>No data</td>
                  <?php } ?>
          <?php } ?>
        </table>
        <a href="<?php echo site_url('sms_gateway/group_sms') ?>" class="btn btn-danger btn-block"><span class="glyphicon glyphicon-plus"></span> TAMBAH GROUP</a>
     </div>





<div class="modal fade" tabindex="-1" role="dialog" id="confirm-reject2">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Delete Confirmation</h4>
      </div>

    
    
      
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



<script>
$(document).ready(function(){
    var $remaining = $('#remaining'),
        $messages = $remaining.next();

    $('#message').keyup(function(){
        var chars = this.value.length,
            messages = Math.ceil(chars / 160),
            remaining = messages * 160 - (chars % (messages * 160) || messages * 160);

        $remaining.text(remaining + ' characters remaining');
        $messages.text(messages + ' message(s)');
    });
});
</script>

<script>
$(document).on("click", ".open-AddBookDialog2", function () {
     var myBookId = $(this).data('id');
     var myBookname = $(this).data('title');
      var myBooknip = $(this).data('name');
     $(".modal-body #bookId").val( myBookId );
      $(".modal-body #nama_pelatihan").val( myBookname );
        $(".modal-body #nip").val( myBooknip );
});
  

</script>