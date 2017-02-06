<div class="row">
<?php if($this->session->userdata('error')) {?>
  
    <ul class="alert alert-warning">
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

<h3 class="breadcrumb "> SMS GATEWAY <small>Fitur SMS gateway saat ini hanya bisa digunakan untuk mengirimkan SMS ke perorangan maupun ke group.</small><div class="btn-group pull-right" role="group" aria-label="...">
  <a href="<?php echo site_url('sms_gateway')?>" class="btn btn-primary">SINGLE SMS</a>
  <a href="<?php echo site_url('sms_gateway/smsblast')?>" class="btn btn-success">GROUP SMS</a></h3>
  <p></p>
 
</div>
<div class="panel panel-success">

<div class="panel-heading">
  <h4>Single SMS</h4>
  
 </div>


<div class="panel-body">
   

	<div class="col-md-6">
	 <?php echo form_open('sms_gateway/proses_kirim') ?>
	  <div class="form-group">
	   <label for="kode">NO HP</label>
       <input type="text" name="phone"  class="form-control" value="" placeholder="081XX" />
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


  </div>
</div>

</div>

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