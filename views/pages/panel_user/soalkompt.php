 <div class="panel panel-danger">
						        <div class="panel-heading">Evaluasi Kompetensi Ybs </div>
						        <div class="panel-body">
						        <?php foreach ($soal as $soal)  { ?>
						        <label><?php  echo $soal['soal'] ?></label>
						        <?php $no=0; foreach($loop as $row){ ?>
								    <div class="form-group" required>
								    	 <label class="radio-inline"> <input type="radio" name="season[]" id="seasonSummer" value="<?php echo $row['idsi'] ?>"  ><span class=" class="fa fa-smile-o""></span> <?php  echo $row['item'] ?> </label>

								    </div>
								    <?php }?>
							      
							    <?php } ?>

							      
								</div>
								</div>
</div>

<script type="text/javascript">
	if($("input:radio").prop("checked", true); ) {
 			alert('OK');
 			return true;
 		} else {

 			$('#mymodal').modal('show');
    		$('#notice').html('Mohon isi sasaran kompetensi!');
    		return false;
 		}
</script>