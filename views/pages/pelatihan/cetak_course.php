<?php

class PDF extends FPDF
{

     function Header()
          {             
            

                        $this->setFont('Arial','B',10);
                        $this->setFillColor(255,255,255);
                        $this->Image(base_url().'assets/konfigurasi3.png', 255, 6,'18','12','png');
                
                        $this->Cell(0,1, 'LAPORAN PESERTA PELATIHAN', '0', 1, 'C');
                        $this->cell(90);
                        $this->Cell(90,10, 'NOMOR :................................................', '0', 1, 'C');
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
                      
                        
                        
                     
                        
          }

          function Content($hasil,$cetak,$total)
          {
                        $this->Ln(5);
                        $this->setFont('Arial','',10);
                        $this->setFillColor(255,255,255);
                        $this->cell(10,6,"Nama Provider ",0,0,'L',1); 
                        $this->cell(18); 
                        $this->cell(2,7,":",0,0,'L',1); 
                        $this->Ln(0);
                        $this->cell(41); 
                        //$this->cell(25,7,$training->nip,0,0,'L',1);
                        $this->cell(22,7,$cetak->nama_provider,0,0,'L',1);

                        $this->Ln(5);
                        $this->cell(10,6,"Judul Pelatihan",0,0,'L',1); 
                        $this->cell(18); 
                        $this->cell(2,7,":",0,0,'L',1); 
                        $this->Ln(0);
                        $this->cell(41); 
                        //$this->cell(25,7,$training->nip,0,0,'L',1);
                        $this->cell(22,7,$cetak->judul_course,0,0,'L',1);
                         foreach ( $hasil as $key  ){

                           $nama = $key->Nama_pegawai;
                        }

                         $this->Ln(5);
                        $this->cell(10,6,"Jumlah Peserta",0,0,'L',1); 
                        $this->cell(18); 
                        $this->cell(2,7,":",0,0,'L',1); 
                        $this->Ln(0);
                        $this->cell(41); 
                        //$this->cell(25,7,$training->nip,0,0,'L',1);
                        $this->cell(22,7,$total,0,0,'L',1);
                        $this->Ln(0);
                        $this->cell(48);
                        $this->cell(10,7,"Peserta",0,0,'L',1); 

                       

                        $this->Ln(5);
                        $this->Ln(5);
                         $this->Ln(5);
                        $this->setFont('Arial','',10);
                        $this->setFillColor(255,255,255);
                        $this->cell(10,6,'No.',1,0,'C',1);
                        $this->cell(23,6,'NIP',1,0,'C',1);
                        $this->cell(50,6,'Nama Karyawan',1,0,'C',1);
                        $this->cell(75,6,'Jabatan',1,0,'C',1);
                        $this->cell(90,6,'Unit Kerja',1,0,'C',1);
                        $this->cell(30,6,'Biaya',1,1,'C',1);

                       
                                $this->setFont('Arial','B',9);
                                $this->setFillColor(255,255,255); 
                                 $no = 1;
                                 
                                    foreach ($hasil as $key) {
                                            $this->setFont('Arial','',10);
                                            $this->setFillColor(255,255,255);   
                                            $this->cell(10,6,$no,1,0,'C',1);
                                            $this->cell(23,6,$key->NIP,1,0,'L',1);
                                            $this->cell(50,6,$key->Nama_pegawai,1,0,'L',1);
                                             $this->cell(75,6,$key->jabatan,1,0,'L',1);
                                            $this->cell(90,6,$key->unit_kerja,1,0,'L',1);
                                             $this->cell(30,6,number_format($key->biaya_course,2,',','.'),1,1,'L',1);
                                            $no++;
                                          
                                    }
                        $sum = 0; 
                        foreach ( $hasil as $key  ){

                            $sum+=$key->biaya_course;
                        }

                        $this->setFont('Arial','B',10);
                         $this->cell(248,6,'Total Biaya',1,0,'C',1);
                         $this->cell(30,6,number_format($sum,2,',','.'),1,1,'L',1);


                            $this->setFont('Arial','',10);
                                         $this->Ln(10);
                                         $this->Ln(0);
                                      $this->cell(5);
                                      $this->cell(120,40, "",1,0,'L',1);
                                      $this->Ln(0);
                                      $this->cell(5);
                                      $this->cell(60,40, "",1,0,'L',1);
                                       $this->Ln(1);
                                       $this->cell(145);
                                        
                                        $this->Ln(0);
                                       $this->cell(85);
                                        $this->cell(18,10, "Mengetahui, ",0,0,'L',1);
                                         
                                        $this->Ln(0);
                                       $this->cell(17);
                                        $this->cell(18,10, "Setuju / Tidak Setuju, ",0,0,'L',1);
                                        $this->Ln(28); 
                                         $this->cell(22);
                                         $this->cell(18,10, "GMD PSDM ",0,0,'L',1);
                                          $this->Ln(0); 
                                         $this->cell(86);
                                         $this->cell(18,10, "MD Diklat ",0,0,'L',1);


                                        


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
            $this->Line(10,$this->GetY(),290,$this->GetY());
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

 $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage('L');
    $pdf->Content($hasil,$cetak,$total);
    $pdf->Output();



?>