 <h3 class="breadcrumb"> KATALOG BUKU </h3>

<div class="panel panel-default">
	<table class="table">
    <thead class="success">
        	<th class="success">Kode</th>
    		<th class="success">Judul</th>
         	<th class="success">Penerbit</th>
         	<th class="success">Kategori</th>
            <th class="success">Jumlah</th>
        	<th class="success">Action</th>
     </thead>       
    <tbody>
    <?php foreach($buku as $result) {?>
    <tr>
    	     <td class="active"> <?php echo $result->kode_buku ?></td>
        	 <td> <?php echo $result->judul ?></td>
             <td><?php echo $result->penerbit ?> </td>
             <td> <?php echo $result->kategori?></td>
             <td><?php echo $result->Jumlah ?> </td>
             <td> 
        	<a href=""> <i class="fa fa-pencil"></i></a>
            &nbsp;
            <a href=""> <i class="fa fa-times"></i></a>
            &nbsp;
            <a href=""> <i class="fa fa-arrow-right"></i></a>
           </td>
        </tr >
        <?php }?>
        </tbody>
    </table>
    
 </div>
 
 
 <div class= "row" >
 	<div class = "col-md-6" >   
    <a href="buku/tambah" class="btn btn-primary">TAMBAH BUKU</a>
    &nbsp;
     <a href="" class="btn btn-success">CARI BUKU</a>
    </div>
    
    <div class = "col-md-6" ></div>
 </div>