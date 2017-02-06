<h3 class="breadcrumb"> Tambah Tujuan Training  <small>Isi dengan lengkap</small></h3>
<div class="col-md-6">

        <?php echo form_open('provider/tambah_kan_tujuan') ?>
        <?php foreach($course as $result){ ?> 
        <div class="form-group">
               <input type="hidden" name="id_provider"  class="form-control"  value=" <?php echo  $result->id_provider ?> "readonly/>
        </div>
        <div class="form-group">
               <input type="hidden" name="id_course"  class="form-control"  value=" <?php echo  $result->id_course ?> "readonly/>
        </div>

        <?php }?>


        <div class="form-group">
        <label for="tujuan"  >Tujuan  Training </label>
        <ul>
        <div class="form-group">
         <label for="InputMessage"><h4><small>Tujuan 1</small></h4></label>
        <input type="text" name="tujuan_pelatihan[]" id="InputMessage" class="form-control" rows="5"  data-toggle="tooltip" data-placement="right" title="Isikan Rincian Pelatihan Anda">
        </div>
         <div class="form-group">
         <label for="InputMessage"><h4><small>Tujuan 2</small></h4></label>
        <input type="text" name="tujuan_pelatihan[]" id="InputMessage" class="form-control" rows="5"  data-toggle="tooltip" data-placement="right" title="Isikan Rincian Pelatihan Anda">
        </div>
         <div class="form-group">
         <label for="InputMessage"><h4><small>Tujuan 3</small></h4></label>
        <input type="text" name="tujuan_pelatihan[]" id="InputMessage" class="form-control" rows="5"  data-toggle="tooltip" data-placement="right" title="Isikan Rincian Pelatihan Anda">
        </div>

      
        <div class="form-group" id="dynamicInput">

        </div>
        <a hreff="#" class="btn btn-default" value="ADD MORE"  id="addScnt" onClick="addInput('dynamicInput');" >ADD MORE</a>
         </ul>
        </div>

         <div class="form-group">
         <input type="submit" name="tambah" id="tambah" value="SUBMIT" class="btn btn-success pull-right" />
        </div>


        <?php echo form_close() ?> 
</div>



<script>
var counter = 3;
var limit = 1000;
function addInput(divName){
     if (counter == limit)  {
          alert("You have reached the limit of adding " + counter + " inputs");
     }
     else {
          var newdiv = document.createElement('div');
          newdiv.innerHTML = "<label  for='p_scnts' ><h4><small> Tujuan " + (counter + 1) + "</small></h4></label> <br><input type='text' name='tujuan_pelatihan[] ' class='form-control' rows='5'  >";
          document.getElementById(divName).appendChild(newdiv);
          counter++;
     }


}
</script>