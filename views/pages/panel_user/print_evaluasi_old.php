<?php

class PDF extends FPDF
{
 
        function Header()
          {  
            
                       
                       global $title;
                      $training = $this->title;
                        $this->setFont('Arial','B',10);
                        $this->setFillColor(255,255,255);
                        $this->Image(base_url().'assets/konfigurasi3.png', 175, 6,'18','12','png');
                
                        $this->Cell(0,1, 'FORMULIR USULAN PELATIHAN', '0', 1, 'C');
                        $this->cell(50);
                        $this->Cell(90,10, 'NOMOR :PSDM/04/'.date('m').'/PB/'.$title.'.....', '0', 1, 'C');
                        $this->cell(6); 
                        $this->Ln(-12);
                        $this->Cell(47,8, 'FRM-PSDM-04-01-02,Rev.1', '1', 0, 'L');
                        $this->Ln(10);
                        $this->setFont('Arial','',10);
                                         
                                        
                        //$this->Image(base_url().'assets/konfigurasi4.png', 10, 25,'20','20','png');
                        
                        $this->Ln(6);
                        $this->setFont('Arial','',14);
                        $this->setFillColor(255,255,255);
                        $this->cell(25,6,'',0,0,'C',0);
                      
                        
                        $this->Ln(5);
                        $this->setFont('Arial','',10);
                        $this->setFillColor(230,230,200);
                      
                        
          }

         

          function Content($training,$detail,$detail_average)
          {
                   
                 
                                $this->setFont('Arial','B',10);
                                $this->setFillColor(255,255,255); 
                                $this->cell(10,6,"A. Detail Usulan Pelatihan   ",0,0,'L',1); 


                                $this->Ln(6);
                                 $this->cell(5);
                                 $this->setFont('Arial','',10);
                                $this->cell(14,7,"1. Nama / Jabatan",0,0,'L',1); 
                                $this->cell(18); 
                                 $this->cell(2,7,":",0,0,'L',1); 
                                 $this->Ln(0);
                                   $this->cell(41); 
                                //$this->cell(25,7,$training->nip,0,0,'L',1);
                                $this->cell(22,7,$training->nama_pegawai,0,0,'L',1);
                                

                                 $this->Ln(6);
                                 $this->cell(5);
                                $this->cell(14,7,"2. Unit Kerja",0,0,'L',1); 
                                $this->cell(18); 
                                 $this->cell(2,7,":",0,0,'L',1); 

                                  $this->Ln(0);
                                  $this->cell(41); 
                                 $this->cell(23,7,$training->unit_kerja,0,0,'L',1);
                                $this->Ln(6);
                                 $this->cell(5);
                                $this->cell(14,8,"3. Judul Pelatihan   ",0,0,'L',1);
                                $this->cell(18);
                                $this->cell(4,7,":",0,0,'L',1);
                                $this->MultiCell(120,8,$training->judul_course,0,1,'L',1);
                                $this->Ln(-1);
                                 $this->cell(5);
                                $this->cell(14,9,"4. Provider ",0,0,'L',1);
                                $this->cell(18);
                                 $this->cell(8,7,":",0,0,'L',1);
                                  $this->Ln(0);
                                 $this->cell(41);
                                $this->cell(20,8,$training->nama_provider,0,1,'L',1);
                                $this->Ln(-1);
                                 $this->cell(5);
                                $this->cell(14,10,"5. Tempat ",0,0,'L',1);
                                 $this->cell(18);
                                  $this->cell(6,10,":",0,0,'L',1);
                                   $this->Ln(0);
                                 $this->cell(41);
                                $this->cell(19,10,$training->kota_course,0,1,'L',1);
                                $this->Ln(-3);
                                 $this->cell(5);
                                $this->cell(14,11,"6. Tanggal ",0,0,'L',1);
                                $this->cell(18);
                                  $this->cell(7,11,":",0,0,'L',1);

                                $this->cell(30,12,tgl_indo($training->waktu_in),0,1,'L',1);
                                 $this->Ln(-12);
                                  $this->cell(75);
                                 $this->cell(8,12,'s/d',0,1,'R',1);
                                 $this->Ln(-12);
                                  $this->cell(88);
                                 $this->cell(29,12,tgl_indo($training->waktu_out),0,1,'L',1);

                                $this->Ln(-3);
                                 $this->cell(5);
                                $this->cell(14,7,"7. Biaya ",0,0,'L',1); 
                                $this->cell(18);
                                $this->cell(8,7,":",0,0,'L',1);
                                $this->Ln(0);
                                $this->cell(41);
                                 $this->cell(6,7,'Rp',0,0,'R',1);
                                $this->cell(30,7,number_format($training->biaya_course,2,',','.'),0,0,'L',1);
                                $this->Ln(10);
                                $this->setFont('Arial','B',10);
                                $this->cell(10,6,"B. Uraian Target yang ingin dicapai setelah pelatihan",0,0,'L',1);     
                                $this->Ln(6);
                                $this->cell(5);
                                 $this->setFont('Arial','B',10);
                                  $this->setFillColor(255,255,255);
                                 
                                                                 
                                    $this->cell(130,12,'Item Sasaran',1,0,'C',1);
                                  $this->cell(25,12,'Point Pre',1,0,'C',1);
                                  $this->cell(25,12,'Point Post',1,0,'C',1);
                                   $this->cell(5);
                                     $this->Ln(6);
                                $this->setFont('Arial','',10);
                                $this->setFillColor(255,255,255); 
                 $this->Ln(6);
                  $jmla = 0;
                  $jmlb = 0;
                   $this->cell(5);
                           $this->cell(130,50,'',1,0,'C',1);    
                           $this->cell(25,50,'',1,0,'C',1);
                            $this->cell(25,50,'',1,0,'C',1);
                          foreach ($detail as $result) {
                                
                                $this->Ln(0);
                                $this->cell(5);
                              
                               // $this->MultiCell(170,20,'',0,'L',0,1);
                               
                                 $this->MultiCell(130,8,$result['item'],0,'L',0,1);
                                 $this->Ln(-8);
                                $this->cell(135);


                               

                                $this->MultiCell(25,8,$result['nilai_pre3'],0,'C',0,1);
                                 $this->Ln(-8);
                                $this->cell(160);
                                $this->MultiCell(25,8,$result['tps'],0,'C',0,1);
                               // $this->cell(25,12,'Point Post',0,0,'C',1);

                               
                               //                        $this->Ln(0);
                               //  $this->cell(5);
                              
                               // // $this->MultiCell(170,20,'',0,'L',0,1);
                               // $this->MultiCell(170,20,'',1,'L',0,1);
                               // $this->cell(5);
                               // $this->Ln(-20);
                               //  $this->cell(5);
                               //   $this->MultiCell(120,8,$result['item'],0,'L',0,1);
                               //  // $this->Ln(-8);
                               //  $this->cell(125);


                               
                                
                               //  $this->MultiCell(25,8,$result['nilai_pre3'],0,'C',0,1);
                               // //  $this->Ln(-8);
                               //  $this->cell(150);
                               //  $this->MultiCell(25,8,$result['tps'],0,'C',0,1);
                               // // $this->cell(25,12,'Point Post',0,0,'C',1);
                          }
                           $this->cell(5);
                             $this->cell(130,8,'Rata-rata',1,0,'C',1);  
                               $this->cell(25,8,$detail_average->abc,1,0,'C',1);
                                  $this->cell(25,8,$detail_average->def,1,0,'C',1);
                             $this->Ln(8);
                              $this->cell(5);
                               $this->cell(130,8,'Delta',1,0,'C',1); 
                                $this->cell(50,8,($detail_average->def) -($detail_average->abc),1,0,'C',1);

                           $this->Ln(10);












                    $this->Ln(2);
                                                    $this->setFont('Arial','B',10); 

                                $this->cell(10,6,"C. Verifikasi Oleh Dept Pendidikan dan Pelatihan",0,0,'L',1);     
                                $this->Ln(6);
                                $this->cell(5);
                                 $this->setFont('Arial','',10); 
                                $this->cell(180,20, " ",1,0,'L',1); 
                                $this->Ln(3);
                                $this->cell(10);
                                    $this->cell(3,3, " ",1,0,'L',1);
                                    $this->cell(15,4, " Proses ",0,0,'L',1);
                                     $this->cell(16,4, " ",0,0,'L',1);
                                     $this->cell(15,4,"Rekomendasi Dept Diklat :",0,0,'L',1); 
                               
                                     $this->Ln(6);
                                $this->cell(10);
                                    $this->cell(3,3, " ",1,0,'L',1);
                                    $this->cell(15,4, " Tolak ",0,0,'L',1);
                                     $this->Ln(6);
                                $this->cell(10);
                                    $this->cell(3,3, " ",1,0,'L',1);
                                    $this->cell(15,4, " Tunda ",0,0,'L',1);
                                   $this->Ln(13);
                                   $this->cell(5);
                                    $this->cell(180,40, " ",1,0,'L',1);



                                         $this->Ln(0);
                                      $this->cell(5);
                                      $this->cell(120,40, "",1,0,'L',1);
                                      $this->Ln(0);
                                      $this->cell(5);
                                      $this->cell(60,40, "",1,0,'L',1);
                                       $this->Ln(1);
                                       $this->cell(145);
                                        $this->cell(18,10, "Diusulkan ",0,0,'L',1);
                                        $this->Ln(0);
                                       $this->cell(85);
                                        $this->cell(18,10, "Mengetahui ",0,0,'L',1);
                                        $this->Ln(0);
                                       $this->cell(17);
                                        $this->cell(18,10, "Setuju / Tidak Setuju ",0,0,'L',1);

                                        $this->Ln(7); 
                                         $this->cell(22);
                                         $this->cell(18,10, "GMD PSDM ",0,0,'L',1);


                                         $this->Ln(0);

                                       $this->cell(77);

                                        $this->cell(18,10, "Rekomendasi Bidang Terkait ",0,0,'L',1);
                                        $this->Ln(0);
                                       $this->cell(130);
                                        $this->cell(30,10, "             ,                           / ".date('Y'),0,0,'L',1);
                                         $this->Ln(19);
                                       $this->cell(14);
                                        $this->cell(32,10, '(                                  )',0,0,'L',1);

                                         
                                        $this->Ln(0);
                                       $this->cell(138);
                                        $this->cell(32,10, $training->atasan,0,0,'L',1);
                                        $this->Ln(0);
                                       $this->cell(77);
                                        $this->cell(32,10, "(                                  )",0,0,'L',1);
      

         function ImprovedTable(){
                                                                       // Column widths
                                          $w = array(40, 35, 40, 45);
                                          // Header
                                          for($i=0;$i<count($header);$i++)
                                              $this->Cell($w[$i],7,$header[$i],1,0,'C');
                                          $this->Ln();
                                          // Data
                                          foreach($data as $row)
                                          {
                                              $this->Cell($w[0],6,$row[0],'LR');
                                              $this->Cell($w[1],6,$row[1],'LR');
                                              $this->Cell($w[2],6,number_format($row[2]),'LR',0,'R');
                                              $this->Cell($w[3],6,number_format($row[3]),'LR',0,'R');
                                              $this->Ln();

                                          }
                                          // Closing line
                                          $this->Cell(array_sum($w),0,'','T');

                                         }



                            }

            
                       
          



          function Footer()
          {
            //atur posisi 1.5 cm dari bawah
            $this->SetY(-15);
            //buat garis horizontal
            $this->Line(10,$this->GetY(),210,$this->GetY());
            //Arial italic 9
            $this->SetFont('Arial','B',9);

             $this->SetTextColor(0,51,102);
                        $this->Cell(0,10,'Perumnas Training Agenda (PeTA) - ' . date('Y'),0,0,'L');

                        
            //nomor halaman
            $this->SetFont('Arial','',9);
             $this->SetTextColor(0,0,0);
            $this->Cell(0,10,'Halaman '.$this->PageNo().' dari {nb}',0,0,'R');
             $this->Ln(5);
              $this->cell(18);
             $this->cell(20,10,"Printed date : " . date('d/m/Y'),0,0,'R'); 
             $this->Ln(0);
             
              $this->cell(60);
                $this->cell(20,10,"| infotraining.perumnas.co.id ",0,0,'R'); 
          }

          
}

      $path = ('arsip/'.$training->nip.'/');

           

  
      if (!file_exists($path)) {
         
      mkdir($path, 0700);
       $title= $training->id_tp;
      $content = "32w434";
      $pdf = new PDF();
       $pdf->title = 'My title';    
          global $title;
      $pdf->AliasNbPages();
      $pdf->AddPage();
     
      $pdf->Content($training,$detail,$detail_average);
     
      $pdf->Output('arsip/'.$training->nip.'/'.$training->id_tp.'.pdf', 'F');
      $pdf->Output();


} else {
     
     

      $title=$training->id_tp;
      $content = "32w434";
      $pdf = new PDF();
      $pdf->AliasNbPages();
      $pdf->AddPage();
      $pdf->Content($training,$detail,$detail_average);
     
      $pdf->Output('arsip/'.$training->nip.'/'.$training->id_tp.'.pdf', 'F');
      $pdf->Output();
      exit;
    }
?>
