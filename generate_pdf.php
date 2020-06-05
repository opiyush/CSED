<?php
//============================================================+
// File name   : example_001.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 001 for TCPDF class
//               Default Header and Footer
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Default Header and Footer
 * @author Nicola Asuni
 * @since 2008-03-04
 */

//connection and fetching the data

$email = $_POST["Email"];
include 'connection.php';
$params = array($email);
$header_data="Name: ";
$contents_pdf = "<h3>List of achivements</h3> <h5>(If you have any query pelase contact the faculty himself)</h5><br>";
//$stmt = sqlsrv_query( $conn,"Select * from emp_details where Email=?;",$params);
$stmt = sqlsrv_query( $conn,"EXEC GetEmp_by_email @email=?;",$params);
if ($stmt !=NULL) {
  while ($rows = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
    // code...
    $header_data.=$rows["Name"];
    $header_data= $header_data."\nPhone: ".$rows["Phn1"];
    $header_data= $header_data." Qualification: ".$rows["Degree"];
    $header_data= $header_data."\nEmail: ".$rows["Email"];
  }
}

//now make query and store the information as required in the variable $contents_pdf in html form

//fetching contents
$stmt = sqlsrv_query( $conn, "select * from Publication_Upload where Uploaded_By=?",array($email)); //making query and storing it in stmt variable
if ($stmt != NULL) {
  $contents_pdf.= "<div><h4>Publication</h4></div>";
  while($rows = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)){
    $contents_pdf.="
    <div>
      <div>".$rows['Type']."</div>
      <div>
        <h5>".$rows['Heading']."</h5>
        <span>".$rows['Date']->format('d/m/Y')."</span>
      </div>
      <div>
        ".$rows['Data'].
      "</div>
    </div>

    ";

  }
}
//done fetchin form first section

//fetching data from second section
$stmt = sqlsrv_query( $conn, "select * from Project_Upload where Uploaded_By=?",array($email)); //making query and storing it in stmt variable
if ($stmt != NULL) {
  $contents_pdf.= "<div><h4>Projects</h4></div>";
  while($rows = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)){
    $contents_pdf.="
    <div>
      <div>".$rows['Type']."</div>
      <div>
        <h5>".$rows['Heading']."</h5>
        <span>".$rows['Date']->format('d/m/Y')."</span>
      </div>
      <div>
        ".$rows['Data'].
      "</div>
    </div>

    ";

  }
}
//done from project section

//fecthing from research thesis
$stmt = sqlsrv_query( $conn, "select * from Thesis_Upload where Uploaded_By=?",array($email)); //making query and storing it in stmt variable
if ($stmt != NULL) {
  $contents_pdf.= "<div><h4>Research Thesis</h4></div>";
  while($rows = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)){
    $contents_pdf.="
    <div>
      <div>".$rows['Type']."</div>
      <div>
        <h5>".$rows['Heading']."</h5>
        <span>".$rows['Date']->format('d/m/Y')."</span>
      </div>
      <div>
        ".$rows['Data'].
      "</div>
    </div>

    ";

  }
}
//done fetching from research Thesis

//fetching from events section
$stmt = sqlsrv_query( $conn, "select * from Event_Upload where Uploaded_By=?",array($email)); //making query and storing it in stmt variable
if ($stmt != NULL) {
  $contents_pdf.= "<div><h4>Events</h4></div>";
  while($rows = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)){
    $contents_pdf.="
    <div>
      <div>".$rows['Event']."</div>
      <div>".$rows['Type']."</div>
      <div>
        <h5>".$rows['Heading']."</h5>
        <span>".$rows['Date']->format('d/m/Y')."</span>
      </div>
      <div>
        ".$rows['Data'].
      "</div>
    </div>

    ";

  }
}
//done for events

//fetching for professional bodies
$stmt = sqlsrv_query( $conn, "select * from Other_Uploads where Uploaded_By=? and Category='prof_bodies'",array($email)); //making query and storing it in stmt variable
if ($stmt != NULL) {
  $contents_pdf.= "<div><h4>Professional Bodies</h4></div>";
  while($rows = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)){
    $contents_pdf.="
    <div>
      <div>
        <h5>".$rows['Heading']."</h5>
        <span>".$rows['Date']->format('d/m/Y')."</span>
      </div>
      <div>
        ".$rows['Data'].
      "</div>
    </div>
    ";
  }
}
//done fetching professional Bodies
//fetching for admin responsibilities
$stmt = sqlsrv_query( $conn, "select * from Other_Uploads where Uploaded_By=? and Category='admin_res'",array($email)); //making query and storing it in stmt variable
if ($stmt != NULL) {
  $contents_pdf.= "<div><h4>Administrative responsibilities</h4></div>";
  while($rows = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)){
    $contents_pdf.="
    <div>
      <div>
        <h5>".$rows['Heading']."</h5>
        <span>".$rows['Date']->format('d/m/Y')."</span>
      </div>
      <div>
        ".$rows['Data'].
      "</div>
    </div>
    ";
  }
}
//done admin resp
//fetching academic resp
$stmt = sqlsrv_query( $conn, "select * from Other_Uploads where Uploaded_By=? and Category='academic_res'",array($email)); //making query and storing it in stmt variable
if ($stmt != NULL) {
  $contents_pdf.= "<div><h4>Professional Bodies</h4></div>";
  while($rows = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)){
    $contents_pdf.="
    <div>
      <div>
        <h5>".$rows['Heading']."</h5>
        <span>".$rows['Date']->format('d/m/Y')."</span>
      </div>
      <div>
        ".$rows['Data'].
      "</div>
    </div>
    ";
  }
}
//done academic
//fetching awards
$stmt = sqlsrv_query( $conn, "select * from Other_Uploads where Uploaded_By=? and Category='awards'",array($email)); //making query and storing it in stmt variable
if ($stmt != NULL) {
  $contents_pdf.= "<div><h4>Professional Bodies</h4></div>";
  while($rows = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)){
    $contents_pdf.="
    <div>
      <div>
        <h5>".$rows['Heading']."</h5>
        <span>".$rows['Date']->format('d/m/Y')."</span>
      </div>
      <div>
        ".$rows['Data'].
      "</div>
    </div>
    ";
  }
}
//done awards
//fetching country visited
$stmt = sqlsrv_query( $conn, "select * from Other_Uploads where Uploaded_By=? and Category='country'",array($email)); //making query and storing it in stmt variable
if ($stmt != NULL) {
  $contents_pdf.= "<div><h4>Professional Bodies</h4></div>";
  while($rows = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)){
    $contents_pdf.="
    <div>
      <div>
        <h5>".$rows['Heading']."</h5>
        <span>".$rows['Date']->format('d/m/Y')."</span>
      </div>
      <div>
        ".$rows['Data'].
      "</div>
    </div>
    ";
  }
}
//fetched all contents







//start making pdf
// Include the main TCPDF library (search for installation path).
require_once('config/tcpdf_config.php');
require_once('tcpdf.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 001');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
// change the header
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE,$header_data, array(0,64,255), array(0,64,128));
$pdf->setFooterData(array(0,64,0), array(0,64,128));

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->SetFont('dejavusans', '', 14, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();

// set text shadow effect
$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

// Set some content to print
$html = <<<EOD
<h1>Welcome to</h1>
<i>This is the first example of TCPDF library.</i>
<p>This text is printed using the <i>writeHTMLCell()</i> method but you can also use: <i>Multicell(), writeHTML(), Write(), Cell() and Text()</i>.</p>
<p>Please check the source code documentation and other examples for further information.</p>
<p style="color:#CC0000;">TO IMPROVE AND EXPAND TCPDF I NEED YOUR SUPPORT, PLEASE <a href="http://sourceforge.net/donate/index.php?group_id=128076">MAKE A DONATION!</a></p>
EOD;

// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $contents_pdf, 0, 1, 0, true, '', true);

// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('example_001.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
?>
