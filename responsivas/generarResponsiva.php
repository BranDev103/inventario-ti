
<?php

require("../libraries/fpdf/fpdf.php");
require "../config/conexion.php";

session_start();

$id = $_GET['id'];

$query = "SELECT * FROM equipos WHERE id = $id";
$resultado = mysqli_query($conexion, $query);
$equipo = mysqli_fetch_assoc($resultado);


$pdf = new FPDF();
$pdf->AddPage();


$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(40, 8, 'F-FIN-04', 1);
$pdf->Cell(110, 8, 'CONSTRUCTORA DAZNA SA DE CV', 1, 0, 'C');
$pdf->Cell(40, 8, '','TR',1,'C');


$pdf->Cell(40, 8, 'Version 02', 1);
$pdf->Cell(110, 8, 'FORMATO', 1, 0, 'C');
$pdf->Cell(40, 8, $pdf->Image('../assets/img/logo_header.png', $pdf->GetX()+5, $pdf->GetY()-3,30), 'R', 1,'C');

$pdf->Cell(40, 8, 'Fecha:  27/08/2015', 1);
$pdf->Cell(110, 8, 'RESGUARDO DE EQUIPO TIC', 1, 0, 'C');
$pdf->Cell(40, 8, '', 'R', 1,'C');

$pdf->Cell(190, 3, '', 1, 'R', 'C');


// TEXTO LEGAL
$pdf->SetFont('Arial', 'BI', 8);
$pdf->SetFillColor(217, 217, 217);
$pdf->MultiCell(0, 5, utf8_decode("CON ESTA FECHA RECIBO DE CONSTRUCTORA DAZNA S.A. DE C.V. PARA SU RESGUARDO Y RESPONSABILIDAD, EQUIPO DE TRABAJO, SIENDO EL SIGUIENTE EQUIPO, QUE ES PROPIEDAD DE  CONSTRUCTORA DAZNA S.A. DE C.V., PARA SER USADO EN MIS LABORES Y PARA DESEMPEÑO DE MIS FUNCIONES POR TAL MOTIVO SOY RESPONSABLE DEL USO, MANEJO Y CUIDADO DEL MISMO. **QUEDA PROHIBIDO EL USO DISTINTO POR EL QUE LE FUE ASIGNADO EL EQUIPO, ASI COMO EL USO INDEBIDO DEL MISMO**						
"),1,1, true);


// DATOS USUARIO
$pdf->SetFont('Arial', '', 10);

$pdf->Cell(60, 7, 'Fecha de recepcion:', 1);
//$fecha = $equipo['fecha_registro'];
//$fechaFormateada = date("d/m/Y", strtotime($fecha));
//$pdf->Cell(130,7, $fechaFormateada,1,1);
$pdf->Cell(130,7,date("d/m/Y"),1,1);

$pdf->Cell(60, 7, 'Nombre del usuario:', 1);
$pdf->Cell(130, 7, utf8_decode($equipo['responsable']), 1, 1);

$pdf->Cell(60,7,'Puesto:',1);
$pdf->Cell(130,7,utf8_decode($equipo['puesto']),1,1);

$pdf->Cell(60, 7, 'Area:', 1);
$pdf->Cell(130, 7, utf8_decode($equipo['area']), 1, 1);

$pdf->Cell(60, 7, 'Ubicacion:', 1);
$pdf->Cell(130, 7, utf8_decode($equipo['ubicacion']), 1, 1);

$pdf->Cell(60,7,'Correo:',1);
$pdf->Cell(130,7, $equipo['correo'], 1, 1); 


$pdf->Ln(3);

// EQUIPO COMPUTO
$pdf->SetFont('Arial', 'B', 10);
$pdf->SetFillColor(217, 217, 217);
$pdf->Cell(70, 7, 'EQUIPO DE COMPUTO',1,0,'C',true);
$pdf->Cell(40,7,'EQUIPO ADICIONAL',1,0,'C',true);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(40,7,'MARCA',1,0,'C',true);
$pdf->Cell(40,7,'SERIE',1,1,'C',true);

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(30, 7, 'Clave:',1);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(40, 7, $equipo['clave'], 1);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(40, 7, 'Monitor:',1,0,'C');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(40, 7, '',1,0,'C');
$pdf->Cell(40, 7, '',1,1,'C');


$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(30, 7, 'Tipo:', 1);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(40, 7, $equipo['tipo'], 1);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(40, 7, 'Teclado:',1,0,'C');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(40, 7, '',1,0,'C');
$pdf->Cell(40, 7, '',1,1,'C');

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(30, 7, 'Marca:', 1);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(40, 7, $equipo['marca'],1);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(40, 7, 'Mouse:',1,0,'C');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(40, 7, '',1,0,'C');
$pdf->Cell(40, 7, '',1,1,'C');

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(30, 7, 'Modelo:', 1);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(40, 7, $equipo['modelo'], 1);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(40, 7, 'Accesorios:',1,0,'C');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(40, 7, '',1,0,'C');
$pdf->Cell(40, 7, '',1,1,'C');

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(30, 7, 'No. Serie:', 1);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(40, 7, $equipo['no_serie'],1);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(40, 7,  utf8_decode('Maletín:'),1,0,'C');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(40, 7, '',1,0,'C');
$pdf->Cell(40, 7, '',1,1,'C');


$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(30, 8, 'Caracteristicas:', 1);
$pdf->SetFont('Arial', '', 10);
$pdf->MultiCell(160, 8, $equipo['caracteristicas'],1);


$pdf->Ln(3);

$pdf->SetFont('Arial', 'B', 10);
$pdf->SetFillColor(217, 217, 217);
$pdf->Cell(190, 7, 'IMPRESORA',1, 1, 'C', true);

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(40, 7, 'Marca:', 1);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(55, 7,'', 1);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(40, 7, 'Modelo:',1,0,'C');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(55, 7, '',1,1,'C');

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(40, 7, 'No. Serie:', 1);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(150, 7,'', 1);

$pdf->Ln(9);

$pdf->SetFont('Arial', 'B', 10);
$pdf->SetFillColor(217, 217, 217);
$pdf->Cell(190, 7,  utf8_decode('TELÉFONO'),1, 1, 'C', true);

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(40, 7, 'Marca:', 1);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(55, 7,'', 1);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(40, 7, 'Modelo:',1,0,'C');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(55, 7, '',1,1,'C');

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(40, 7, 'No. Serie:', 1);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(150, 7,'', 1);

$pdf->Ln(9);

$pdf->SetFont('Arial', 'B', 10);
$pdf->SetFillColor(217, 217, 217);
$pdf->Cell(190, 7,  'OTROS',1, 1, 'C', true);

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(40, 7, 'Marca:', 1);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(55, 7,'', 1);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(40, 7, 'Modelo:',1,0,'C');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(55, 7, '',1,1,'C');

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(40, 7, 'No. Serie:', 1);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(150, 7,'', 1);

$pdf->Ln(9);

// OBSERVACIONES
$pdf->Cell(190,20, 'Observaciones:', 1,1);


$pdf->Ln(13);

// FIRMAS
$pdf->Cell(90, 5, '______________________________________', 0, 0, 'C');
$pdf->Cell(90, 5, '______________________________________', 0, 1, 'C');

$pdf->Cell(90, 7,utf8_decode('Ing. '.$_SESSION['nombre_usuario']), 0, 0, 'C');
$pdf->Cell(90,7,utf8_decode($equipo['responsable']),0,1,'C');
$pdf->SetFont('Arial','B',11);
$pdf->Cell(92,5,'Entrega',0,0,'C');
$pdf->Cell(90, 5, 'Recibe', 0, 0, 'C');

$pdf->Output('', 'responsiva.pdf',true);

?>