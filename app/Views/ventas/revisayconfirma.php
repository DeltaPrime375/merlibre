<!-- 
Programa:	Genera el reporte para pagar en efectivo en bancos y tiendas de conveniencia
Elaboro	:	Lorenzo Chavez Felix
Fecha	:	08/12/2023
Empresa	:	Facultad de Informatica Culiacan
Sistema	:   Ventas por internet (Mercado Libre)
***************************************************************************************************
*** Emite el reporte                                                                            ***
***************************************************************************************************
-->
<?php
require_once "../vendor/autoload.php";
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <script src= "https://code.jquery.com/jquery-3.7.1.min.js"></script> 
<?php    
$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
$fec=$meses[date('n')-1];
$dia=date("d");
$Ado=date("Y");
?>
    </head>
<?php    
	$length = 8;
	$id_venta = substr(str_repeat(0, $length).$_SESSION['id_venta'], - $length);
	$Detalle_compra = $_SESSION['Detalle_compra'];

	$Efectivo = $_SESSION['Efectivo'];
	// Por defaul se dejo OXXO
	$Donde_pago = "En la tienda OXXO más cercana";
	$Prefijo = "9700";
	if ($Efectivo == "1" ) // santander
		{
			$Donde_pago = "En el banco Santander más cercano";
			$Prefijo = "2100";
		}else if ($Efectivo == "2" )  // HSBC
			{
				$Donde_pago = "En el banco HSBC más cercano";
				$Prefijo = "3400";
			}else if ($Efectivo == "3" )  // 7 Eleven
				{
					$Donde_pago = "En la tienda 7 Eleven más cercana";
					$Prefijo = "8000";
				}else if ($Efectivo == "4" )  // Soriana
					{
						$Donde_pago = "En la tienda Soriana más cercana";
						$Prefijo = "0500";
					};
	$length = 4;
	$cliente = substr(str_repeat(0, $length).$carrito['id_cliente'], - $length);
	echo 	'<div style="position: absolute;top:  50px;left: 150px;"><big> '.$dia.' de '.$fec.' de '.$Ado.'</big></div>
													<div style="position: absolute;top:  90px;left: 50px;"><big> Paga $'.$carrito['importe_carrito'].' '.$Donde_pago.'</big></div>
													<div style="position: absolute;top:  140px;left: 50px;"><big> Código de transacción </big></div>
													<h1>
													<div style="position: absolute;top:  170px;left: 50px;"><big> '.$Prefijo.' '.$cliente.' '.$id_venta.' </big></div>
													</h1>
													<h3>
													<div style="position: absolute;top:  240px;left: 50px;"><big> ¿Como Pagar? </big></div>
													</h3>
													<div style="position: absolute;top:  280px;left: 50px;"><big> 1 .- Dirigite a cualquier sucursal </big></div>
													<div style="position: absolute;top:  320px;left: 50px;"><big> 2 .- Avisa en la caja que quieres hacer un pago </big></div>
													<div style="position: absolute;top:  360px;left: 50px;"><big> 3 .- Muestra el codigo de este ticket </big></div>
													<div style="position: absolute;top:  400px;left: 50px;"><big> 4 .- !Listo! El pago se acreditara en 1 o 2 dias habiles </big></div>
													<h3>
													<div style="position: absolute;top:  440px;left: 50px;"><big> Detalle de tu compra </big></div>
													</h3>
													<div style="position: absolute;top:  480px;left: 50px;"><big> '.$Detalle_compra.'</big></div>
													';

											echo	'<script type="text/javascript">
													$(document).ready(function(){

														window.print();

														window.close();
				
													});
													</script>';

											echo	'<h1 class="noPrint">			
													<div style="position: absolute;top: 30px;left: 800px;">';?>
											<form action = "<?=base_url('ventas/'.$carrito['id_cliente'])?>" method = "GET"> 
											<?php
												echo '<button type = "submit" class="noPrint" >Terminar</button>';
												echo '</form>
													</h1>';
?>
</html>