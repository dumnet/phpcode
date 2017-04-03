<?php
session_start();
ob_start();
?>

<div class="container" style="color:red;">Hello World</div>

<?php
$filename="laporan.pdf"; //ubah untuk menentukan nama file pdf yang dihasilkan nantinya
//==========================================================================================================
$content = ob_get_clean();
	$content = '<page style="font-family: freeserif">'.($content).'</page>';
	require_once('pdf/html2pdf.class.php');
	try
	{
		$html2pdf = new HTML2PDF('P','A4','en', false, 'ISO-8859-15',array(20, 10, 10, 10));
		$html2pdf->setDefaultFont('Arial');
		$html2pdf->writeHTML($content, isset($_GET['vuehtml']));
		$html2pdf->Output($filename);
	}
	catch(HTML2PDF_exception $e) { echo $e; }
?>