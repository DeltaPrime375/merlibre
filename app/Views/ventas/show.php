<?= $this->extend('layouts/base_layout');

$this->section('title')?> Compras realizadas <?= $this->endSection()?>

<?= $this->section('content'); ?> 

    

    <div class = "row py-2">
        <div class = "col-x1-12">
            <?php 
            if(session()->getFlashdata('success')): ?>
                <div class = "alert alert-success alert-dismissible">
                    <button type = "button" class = "btn-close" data-bs-dismiss = "alert">&times;</button>
                    <?php echo session()->getFlashdata('success') ?>
                </div>
            <?php elseif(session()->getFlashdata('failed')): ?>
                <div class = "alert alert-danger alert-dismissible">
                    <button type = "button" class = "btn-close" data-bs-dismiss = "alert">&times;</button>
                    <?php echo session()->getFlashdata('failed') ?>
                </div>
            <?php endif; ?>

            <div class = "card">
                <div class = "card-header">
                    <h5 class = "card-title">Compras > Estado de la compra </h5>
                </div>
                <div class="card-body">
                    <table >
                        <tbody>
                            <?php
                                if(count($ventas) > 0):
                                    foreach($ventas as $vta): ?>
                                    <tr>
                                    <?= $vta->nombre_producto?> 
                                    <img src=<?php echo trim($vta->imagen)?> width="80"  height="41" />
                                    <br>
                                    <?php
                                    if ($vta->cantidad > 1){
                                        echo "".$vta->cantidad." unidades";
                                    }else{
                                        echo "".$vta->cantidad." unidad";
                                    }
                                    echo "<br><br>";
                                    date_default_timezone_set('America/Mexico_City');
                                    if ($vta->estatus == 'e'){
                                        echo "<h4> Entregado </h4><br>";
                                        echo "&nbsp &nbsp <a><i class = 'bi bi-circle-fill'></i> Pendiente de pago</a><br>";
                                        echo "&nbsp &nbsp <a><i class = 'bi bi-circle-fill'></i> En preparación</a><br>";
                                        echo "&nbsp &nbsp <a><i class = 'bi bi-circle-fill'></i> En camino</a><br>";
                                        echo "&nbsp &nbsp <a><i class = 'bi bi-circle-fill'></i> En ultimo tramo para entrega</a><br>";
                                        echo "&nbsp &nbsp <a><i class = 'bi bi-circle-fill'></i> Entregado</a><br>";
                                    }else{
                                        $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
                                        $fecha_actual = $vta->fecha_venta;   
                                        $diassur=$vta->tiempo_surtido+1;
                                        $fecha = date("d-m-Y",strtotime($fecha_actual."+ ".$diassur." days")); 
                                        $dianom = $dias[(date('N', strtotime($fecha))) - 1]; 
                                        $fechaComoEntero = strtotime($fecha);
                                        $mes = date("m", $fechaComoEntero);
                                        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                                        $fec=$meses[$mes-1];
                                        $dia = date("d", $fechaComoEntero);
                                        $anio = date("Y", $fechaComoEntero);
                                        echo "<h4> Llega el ".$dianom." ".$dia." de ".$fec." del ".$anio." </h4> ";
                                        echo "El día de la entrega te avisaremos en qué horario vamos a pasar por tu domicilio. <br>";

                                        if ($vta->estatus == 'p1' || $vta->estatus == 'p1' || $vta->estatus == 'p2' || $vta->estatus == 'p3' || $vta->estatus == 'p4' || $vta->estatus == 'p5' ){
                                            echo "&nbsp &nbsp <a><i class = 'bi bi-circle-fill' ></i> Pendiente de pago</a><br>";
                                            echo "&nbsp &nbsp <a><i class = 'bi bi-circle'></i> En preparación</a><br>";
                                            echo "&nbsp &nbsp <a><i class = 'bi bi-circle' ></i> En camino</a><br>";
                                            echo "&nbsp &nbsp <a><i class = 'bi bi-circle' ></i> En ultimo tramo para entrega</a><br>";
                                            echo "&nbsp &nbsp <a><i class = 'bi bi-circle'></i> Entregado</a><br>";
                                        }
                                        if ($vta->estatus == 's'){
                                            echo "&nbsp &nbsp <a><i class = 'bi bi-circle-fill'></i> Pendiente de pago</a><br>";
                                            echo "&nbsp &nbsp <a><i class = 'bi bi-circle-fill'></i> En preparación</a><br>";
                                            echo "&nbsp &nbsp <a><i class = 'bi bi-circle'></i> En camino</a><br>";
                                            echo "&nbsp &nbsp <a><i class = 'bi bi-circle'></i> En ultimo tramo para entrega</a><br>";
                                            echo "&nbsp &nbsp <a><i class = 'bi bi-circle'></i> Entregado</a><br>";
                                        }
                                        if ($vta->estatus == 't'){
                                            echo "&nbsp &nbsp <a><i class = 'bi bi-circle-fill'></i> Pendiente de pago</a><br>";
                                            echo "&nbsp &nbsp <a><i class = 'bi bi-circle-fill'></i> En preparación</a><br>";
                                            echo "&nbsp &nbsp <a><i class = 'bi bi-circle-fill'></i> En camino</a><br>";
                                            echo "&nbsp &nbsp <a><i class = 'bi bi-circle'></i> En ultimo tramo para entrega</a><br>";
                                            echo "&nbsp &nbsp <a><i class = 'bi bi-circle'></i> Entregado</a><br>";
                                        }
                                        if ($vta->estatus == 'q'){
                                            echo "&nbsp &nbsp <a><i class = 'bi bi-circle-fill'></i> Pendiente de pago</a><br>";
                                            echo "&nbsp &nbsp <a><i class = 'bi bi-circle-fill'></i> En preparación</a><br>";
                                            echo "&nbsp &nbsp <a><i class = 'bi bi-circle-fill'></i> En camino</a><br>";
                                            echo "&nbsp &nbsp <a><i class = 'bi bi-circle-fill'></i> En ultimo tramo para entrega</a><br>";
                                            echo "&nbsp &nbsp <a><i class = 'bi bi-circle'></i> Entregado</a><br>";
                                        }
                                    }
                                       
                                    ?>
                                    
                                    </tr>
                                          
                                        <td class = "d-flex">
                                            
                                            <a href = "<?= base_url('compras')?>" class = "btn btn-primary">Regresar</a>
                                                                                    
                                        </td>
                                    </tr>
                                    
                                <?php endforeach;
                                    else: ?>
                                    <tr rowspan="1">
                                        <tr colspan = "4">
                                            <h6 class = "text-danger text-center">No se encontro el detalle de la compra</h6>
                                        </tr>
                                    </tr>
                                <?php endif ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        function deleteProducto(formId){
            let confirm = window.confirm('¿Está seguro que desea eliminar este producto');
            if(confirm){
                document.getElementById(formId).submit();
            }
        }
    </script>


<?= $this->endSection() ?>