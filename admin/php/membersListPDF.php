<?php
/*
    file:   admin/php/membersListPDF.php
    desc:   Creates a PDF-file from members data. Using fpdf-library (http://www.fpdf.org/)
*/
include('fpdf/fpdf.php'); //include the fpdf-library
class PDF extends FPDF{
    function Header(){
        $this->SetFont('Arial','B',15);
        $this->SetFillColor(210,220,220); //rgb values from 0 to 255
        $this->SetTextColor(26,106,156);
        $this->Image('../../images/IGC_logga_jpg.jpg',40,2); //80 px from top, 2 px left
        $this->Ln(40); //empty lines
        $title="Members in Nordic Guide Club";
        $this->Cell(0,10,$title,1,1,'C',true);
    }
    function Footer(){
        $this->SetFont('Arial','B',8);
        $this->SetY(-15); //15 px from the bottom of page
        $this->Cell(0,2,'','B',1); //line drawn
        $this->Cell(0,5,'Page '.$this->Pageno().'/{nb}',0,0,'C'); // Page nr centered
    }
}
//create the PDF
$pdf=new PDF(); //PDF defined in class
$pdf->AliasNbPages(); //add pagenumbers
$pdf->AddPage(); //Adds the first page
$pdf->SetFont('Arial','B',10); //font for the document content
//Put data into document
$pdf->Cell(60,10,'Name',0,0,'L');
$pdf->Cell(80,10,'Email',0,1,'L');//linebreak after this
$pdf->Cell(0,2,'','B',1); //line drawn
include('../../php/dbConnect.php');
$sql="SELECT firstname, lastname, email FROM members ORDER BY lastname";
$result=$conn->query($sql);
$counter=0; //used to add pagebreak
while($row=$result->fetch_assoc()){
    $counter++;
    $fname=iconv('UTF-8','windows-1252',$row['firstname']); //convert firstname to UTF-8 characters
    $pdf->Cell(60,10,$fname.' '.$row['lastname'],0,0,'L');
    $pdf->Cell(80,10,$row['email'],0,1,'L');
    if($counter==5){
        $pdf->AddPage();
        $counter=0;
    }
}
//display/save pdf
$timestamp=date("Y-m-d_H-i-s");
$filename=$timestamp.'_members.pdf';
$pdf->Output("../files/".$filename,"F"); //Saved as file (F)
$pdf->Output(); //shows the pdf in browser
?>



