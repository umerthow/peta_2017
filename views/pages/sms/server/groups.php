<div class="row">

<div class="panel-heading">
  <h4>Group SMS <?php echo $nama->nama_group ?></h4>
   <table  class="table table-striped table-bordered table-hover" style="margin-bottom: 10px" data-show-toggle="true">
   <tbody data-link="row" class="rowlink">
                    <th class="success">#</th>
                    <th class="success col-md-4">Nama</th>
                    <th class="success col-md-4">Nomor</th>
                    <th class="success">Action</th>
                    <tr>
                    <?php $no=1;
            foreach($detail as $row ) { ?>
           <td><?php echo $no++ ?> </td>
            <td><?php  echo  $row->nama ?></td>
             <td><?php  echo  $row->kontak ?></td>
            <td>delete</td>
          </tr>
          <?php } ?>
                   </tr>
   </table>
 </div>
</div>