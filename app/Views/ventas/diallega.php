<!-- 
Programa:	Elegir el dia de entrega de lo productos
Elaboro	:	Lorenzo Chavez Felix
Fecha	:	03/11/2023
Empresa	:	Facultad de Informatica Culiacan
Sistema	:   Ventas por internet (Mercado Libre)
***************************************************************************************************
*** Seleccionar el dia para entregar los productos                                               ***
***************************************************************************************************
-->
<?= $this->extend('layouts/base_layout');
$this->section('title') ?> Dia para entregar los productos <?= $this->endSection()?>
<?= $this->section('content'); ?>

    <table class="table table-striped">
            <tr>
                <td>
                    
                    <h2>Elige cuando llega tu compra</h2>
                    <textarea style="border: inset 0pt" rows="1" cols="120" maxlength="780"><?php echo trim($data['calle']." ".$data['numero'])?></textarea>
                    <div>
                        <?php echo "&nbsp";?>
                    </div>
                    <?php 
                             /*<td><?= $diass['id_carrito'] ?></td> */
                                if(count($diassur) > 0):
                                    
                                    $Cantidad_envios = 0;
                                    foreach($diassur as $row): ?>
                                        <?php       
                                        $Cantidad_envios = $Cantidad_envios + 1;                                  
                                        date_default_timezone_set('America/Mexico_City');
                                        $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
                                        $fecha_actual = date("y-m-d");   
                                        $diassur=$row->tiempo_surtido+1;
                                        $fecha = date("d-m-Y",strtotime($fecha_actual."+ ".$diassur." days")); 
                                        $dia = $dias[(date('N', strtotime($fecha))) - 1]; ?>
                                        <h4> Envío: <?php echo $Cantidad_envios ?> </h4> 
                                        <input type="radio" required name="Cuandollega.<?php echo $Cantidad_envios?>." id="Cuandollega.<?php echo $Cantidad_envios?>." value="<?php $Cantidad_envios ?>" required checked> 
                                        <label><?php echo $dia ?> : Unica opción    </label> &nbsp &nbsp &nbsp Gratis  <br>
                                        <div>
                                            <?php echo "&nbsp"; ?>
                                        </div>
                                    <?php endforeach;
                                    else: ?>
                                    <tr rowspan="1">
                                        <td colspan="4">
                                            <h6 class="text-danger text-center">No se encontraron dias</h6>
                                        </td>
                                    </tr>
                                    <?php endif ?>
                </td>
                
                <td style="border: inset 0pt" align="center" >
                
                    <h2>Resumen de compra</h2>
                    <div>
                        <?php echo "&nbsp";?>
                    </div>
                    <div>
                        <?php echo "&nbsp";?>
                    </div>
                    <textarea style="border: inset 0pt" rows="7" cols="40" maxlength="780"><?php echo trim("Cantidad de Productos: ".$carrito['cantidad_productos']."
                    \n"."Producto: &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp ".$carrito['importe_carrito'].
                    "\nEnvío: &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Gratis
                    ---------------------------"."\nTotal: &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp".$carrito['importe_carrito'])?></textarea>
                    <h2> </h2>

                    
                    
                </td>
                
                <div class="card-body">
                    <table class="table table-striped">
                        <td>
                        <tbody>
                            
                        </tbody>
                                    </td>
                    </table>
                </div>
                <?php
                
                
                ?>
            </tr>
        </table>
<!--
***************************************************************************************************
*** Icono continuar                                                                             ***
***************************************************************************************************
-->     

        <div class="container" align="center">
            <div class="row py-4">
                <div class="col-xl-12 text-end">
                    <a href="<?= base_url("ventas/contadocredito/".$carrito['id_usuario'])?>" class="btn btn-info">Continuar</a>
                    
                </div>
            </div>
        </div>  
<!--
***************************************************************************************************
*** Terminar la seccion                                                                             ***
***************************************************************************************************
-->                       
<?= $this->endSection() ?>
