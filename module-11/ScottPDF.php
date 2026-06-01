<?php
/*
 * Programmer:  Scott
 * Date:        May 28th, 2026
 * File:        ScottPDF.php
 */
 
require('fpdf.php');
 
// Database connection
$conn = mysqli_connect("localhost", "student1", "pass", "baseball_01");
 
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
 
// Get all records from favorite_games
$result = mysqli_query($conn, "SELECT title, genre, release_year, rating, multiplayer FROM favorite_games ORDER BY rating DESC");
 
if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}
 
// Custom PDF class with header and footer
class GamesPDF extends FPDF
{
    function Header()
    {
        $this->SetFont('Arial', 'B', 13);
        $this->SetFillColor(20, 80, 150);
        $this->SetTextColor(255, 255, 255);
        $this->Cell(0, 12, 'Favorite Games - baseball_01', 0, 1, 'C', true);
        $this->SetTextColor(0, 0, 0);
        $this->Ln(4);
    }
 
    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 9);
        $this->SetTextColor(100, 100, 100);
        $this->Cell(0, 10, 'Scott Johnson  |  CSD440 Module 9  |  Page ' . $this->PageNo() . ' of {nb}', 0, 0, 'C');
    }
}
 
// Build the PDF
$pdf = new GamesPDF('P', 'mm', 'Letter');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetMargins(15, 15, 15);
$pdf->SetAutoPageBreak(true, 20);
 
// Overview paragraph
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 8, 'About This Report', 0, 1, 'L');
$pdf->SetFont('Arial', '', 11);
$pdf->MultiCell(0, 7, "This report pulls data from the favorite_games table in the baseball_01 database built during Module 8. Each record includes the game title, genre, release year, rating, and whether the game supports multiplayer.", 0, 'L');
$pdf->Ln(6);
 
// Column widths
$colW = array(70, 40, 20, 20, 30);
 
// Table header row
$pdf->SetFont('Arial', 'B', 10);
$pdf->SetFillColor(20, 80, 150);
$pdf->SetTextColor(255, 255, 255);
$pdf->Cell($colW[0], 9, 'Title',       1, 0, 'C', true);
$pdf->Cell($colW[1], 9, 'Genre',       1, 0, 'C', true);
$pdf->Cell($colW[2], 9, 'Year',        1, 0, 'C', true);
$pdf->Cell($colW[3], 9, 'Rating',      1, 0, 'C', true);
$pdf->Cell($colW[4], 9, 'Multiplayer', 1, 1, 'C', true);
 
// Data rows
$pdf->SetFont('Arial', '', 10);
$pdf->SetTextColor(0, 0, 0);
$rowNum = 0;
 
while ($row = mysqli_fetch_assoc($result)) {
    $fill = ($rowNum % 2 === 0) ? true : false;
    $pdf->SetFillColor(220, 232, 250);
    $multi = ($row['multiplayer'] == 1) ? 'Yes' : 'No';
 
    $pdf->Cell($colW[0], 8, $row['title'],        1, 0, 'L', $fill);
    $pdf->Cell($colW[1], 8, $row['genre'],        1, 0, 'L', $fill);
    $pdf->Cell($colW[2], 8, $row['release_year'], 1, 0, 'C', $fill);
    $pdf->Cell($colW[3], 8, $row['rating'],       1, 0, 'C', $fill);
    $pdf->Cell($colW[4], 8, $multi,               1, 1, 'C', $fill);
    $rowNum++;
}
 
// Table footer row
$pdf->SetFont('Arial', 'B', 10);
$pdf->SetFillColor(20, 80, 150);
$pdf->SetTextColor(255, 255, 255);
$pdf->Cell(array_sum($colW), 9, 'Total Records: ' . $rowNum, 1, 1, 'R', true);
 
// Send PDF to browser
$pdf->Output('I', 'ScottPDF.pdf');
 
mysqli_close($conn);
?>