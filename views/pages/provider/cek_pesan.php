 <div class="row">
        <div class="col-md-12">
        	<p>Cek Pesan dari User</p>

        	<br/>
        	 <table class="table table-bordered table-hover">


        	 	 <thead>
                  <th>No</th>                  
                  <th>Full Name</th>
                  <th>Email</th>
                  <th>Pesan</th>
                  <th>Tanggal</th>
                                                     
                  </thead>
                  <tbody>
                 <tr>
            <?php 
			$no=1;						
			if( !empty($pesan)){
    				foreach($pesan as $result) {					
			?>

                  <td> <?php echo $no++ ?> </td>
                  <td><?php echo $result->fullname ?></td>
                  <td><a href="mailto:<?php echo $result->email ?>"><?php echo $result->email ?></a></td>
                  <td><i><?php echo $result->message ?></i></td>
                  <td><?php echo $result->date ?></td>

              </tr>
             </tbody>
            <?php
        		}
            ?>
     <?php } ?>
        	 </table>
</div>
</div>