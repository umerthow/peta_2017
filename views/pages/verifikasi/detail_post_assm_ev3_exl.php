<?php 
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=rincian_post_evaluasi_lv3.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>

<div class="panel panel-default">


<div class="row">


 <div class="col-md-10">
 <h3 class="breadcrumb">Detail Verifikasi Post Assement  Level 3</h3>  
	<?php if($this->session->userdata('message')) {?>
  
    <ul class="alert alert-success">
       <span class="glyphicon glyphicon-ok"></span> <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
        
        </ul>
    <?php
    }
    ?>

  </div>
  <!-- <div class="col-md-2">
  <h5 class="text-right" style="padding-right: 10px;"><a href="<?php echo site_url('Verifikasi/convert_excel/'.$training->id_tpddk) ?>" class="btn btn-default" role="button" target="_blank">Cetak Excel <span class="glyphicon glyphicon-print"> </span></a></h5> 
  </div>  -->

<div class="col-md-3"> 
								            </div>
  </div>
<table cellpadding="0" cellspacing="0" class="table table-stripped" >
                <thead class="success">
                <tr><td class="col-md-2">NIP</td><td > <strong></td><td>:</td><td style=" vertical-align:middle; text-align: left;"> <?php echo $training->nip  ?></strong></td></tr>
                <tr><td class="col-md-2">Nama Pegawai</td><td class="col-md-4"> <strong></td><td>:</td><td> <?php echo $training->nama_pegawai  ?></strong></td></tr>
                <tr><td>Unit Kerja</td><td class="col-md-4"> <strong></td><td>:</td><td><strong> <?php echo $training->unit_kerja  ?></strong></td></tr>
                <tr><td>Judul Pelatihan</td><td class="col-md-4"> <strong></td><td>:</td><td> <a href="<?php echo site_url('provider/detail/'.$training->id_course) ?>"><strong><?php echo $training->judul_course  ?></strong></a></td></tr>
                <tr><td>Bidang</td><td class="col-md-4"> <strong></td><td>:</td><td><?php echo $training->nama_kategori ?></td></tr>
             	 <tr><td>Tanggal Pelatihan</td><td class="col-md-4"> <strong></td><td>:</td><td><?php echo tgl_indo($training->waktu_in)?> -- <?php echo tgl_indo($training->waktu_out)?></td></tr>
                 <tr><td>Penilai </td></tr>
	                 	<tr><td></td><td class="text-left">Atasan</td><td>:</td><td><?php echo $training->atasan ?></td><td>:</td><td><?php echo $training->email_atasan ?></td></tr>
	                 	<tr><td></td><td class="text-left">Rekan</td><td>:</td><td><?php echo $training->rekan ?></td><td>:</td><td><?php echo $training->email_rekan ?></td></tr>
	                 	<tr><td></td><td class="text-left">Bawahan</td><td>:</td><td><?php echo $training->bawahan ?></td><td>:</td><td><?php echo $training->email_bawahan ?></td></tr>
               <!--   <tr><td></td><td> <div class="btn-group  text-right " >
								              <button type="button" class="btn btn-primary">Process</button>
								              <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
								                <span class="caret"></span>
								              </button>
								              <ul class="dropdown-menu" role="menu">
								                <li><a href="<?php echo site_url('verifikasi/approval_usul/'.$training->id_tp)?>">Approve</a></li>
								                <li><a href="<?php echo site_url('verifikasi/rejected_usul/'.$training->id_tp)?>">Disapprove</a></li>
								              </ul>
								            </div> </td></tr> -->
				<!-- <tr><td>Rencana Post Level 3</td><td>
			
					<?php  if(empty($training->tgl_post3)){ ?>
					<?php echo form_open('Verifikasi/update_post_3/'.$training->id_tpddk) ?>
					
				     <div class="input-group date form_date form_date col-md-6 " data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                    <input class="form-control" size="16"  name="post_3_plan" type="text" readonly >
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>

                	</div>
                	</td>
                	<td>
         			<input type="submit" name="tambah" id="tambah" value="submit" class="btn btn-success" />
        			
					</form>
					<?php echo form_close() ?>
					<?php } else {?>
					<?php echo tgl_indo($training->tgl_post3) ?>
					<?php }?>
				</td></tr> -->
 </thead>
 </table>


<hr>

<p class="text-left">Rincian point  :</p>
 <table cellpadding="0" cellspacing="0" class="table table-stripped" border="1">
 <thead>
								<tr>
								<th class="warning" rowspan="2" style="border:thin solid #cacaca; vertical-align:middle; text-align: center;">No </th>
									<th class="warning" rowspan="2" style="border:thin solid #cacaca; vertical-align:middle; text-align: center;">Item Evaluasi</th>
									<th class="warning" rowspan="2" style="border:thin solid #cacaca; vertical-align:middle; text-align: center;">Point Atasan</th>
									<th class="warning" rowspan="2" style="border:thin solid #cacaca; vertical-align:middle; text-align: center;">Point Rekan</th>	
									<th class="warning" rowspan="2" style="border:thin solid #cacaca; vertical-align:middle; text-align: center;">Point Bawahan</th>	
									<th class="warning" rowspan="2" style="border:thin solid #cacaca; vertical-align:middle; text-align: center;">Total</th>		
								

								</tr>
								</thead>
 </table>
  <table cellpadding="0" cellspacing="0" class="table table-stripped" border="1">
  								
								
						











								<tbody>
									<?php
									$no =1;
									$jmla = 0;
									$jmlb = 0;
									?>
								<?php	foreach ($detail as $result) {  ?>
									<tr>

									<td style="border:thin solid #cacaca; text-align:center;"><?php echo $no++ ?></td>
										<td class="col-md-6" style="border:thin solid #cacaca; text-align:left;"><?php echo $result['item'] ?></td>
										<td style="border:thin solid #cacaca; text-align:center;"><?php echo $result['nilai_atasan'] ?></td>
										<td style="border:thin solid #cacaca; text-align:center;"><?php echo $result['nilai_rekan'] ?></td>
										<td style="border:thin solid #cacaca; text-align:center;"><?php echo $result['nilai_bawahan'] ?></td>
										<td style="border:thin solid #cacaca; text-align:center;"><?php echo $result['total'] ?></td>
									

										

										

											

								<?php }?>

									
								</tbody>
								<tfoot>
								<tr border="1">
										<th  class="success" colspan="2" style="border:thin solid #cacaca; padding-left:20px;  ">
											TOTAL RATA-RATA : 
										</th>
										<th class="success"  style="text-align:right; border:thin solid #cacaca; text-align:center;">
											<?php
											echo $detail_average->avg_atasan;
											?>
										</th>
										<th class="success"  style="text-align:right; border:thin solid #cacaca; text-align:center;">
											<?php
											echo $detail_average->avg_rekan;
											?>
										</th>
										<th class="success"  style="text-align:right; border:thin solid #cacaca; text-align:center;">
											<?php
											echo $detail_average->avg_bawahan;
											?>
										</th>
										<th class="success"  style="text-align:right; border:thin solid #cacaca; text-align:center;">
											<?php
											echo $detail_average->avg_total;
											?>
										</th>
								</tr>
								
								
								</tfoot>

  </table>



  </div>
<script type="text/javascript">
    $('.form_datetime').datetimepicker({
        //language:  'fr',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        forceParse: 0,
        showMeridian: 1
    });
    $('.form_date').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        forceParse: 0
    });
    $('.form_time').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 1,
        minView: 0,
        maxView: 1,
        forceParse: 0
    });

</script>
