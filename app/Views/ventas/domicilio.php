<!-- 
Programa:	Elegir la forma de entrega
Elaboro	:	Lorenzo Chavez Felix
Fecha	:	03/11/2023
Empresa	:	Facultad de Informatica Culiacan
Sistema	:   Ventas por internet (Mercado Libre)

***************************************************************************************************
*** Seleccionar donde se entregaran los productos                                               ***
***************************************************************************************************
-->
<?= $this->extend('layouts/base_layout2');
$this->section('title')?> Donde entregar los productos <?= $this->endSection()?>
<?= $this->section('content'); ?>

        <table class="table table-striped">
            <tr>
                <td>
                    
                    <h2>Elige la forma de entrega</h2>
                    <div id="label_TipoEntrega" class="form-element3">
                        <input type="radio" name="TipoEntrega" id="TipoEntrega" value="1" required checked> <label>Entrega a domicilio:*</label> &nbsp &nbsp &nbsp Gratis 
                    </div>
                    <div>
                        <?php echo "&nbsp";?>
                    </div>

                    <textarea style="border: inset 0pt" rows="6" cols="120" maxlength="780"><?php echo trim($data['calle']." ".$data['numero']."\nCol. ".
                    $data['colonia']."\n".$data['ciudad'].", ".$data['estado'].", ".$data['pais']."\nC.P. "." ".$data['CP']."\n".
                    $data['detalles_domicilio'])?></textarea>
                </td>
                <?php        
/*
***************************************************************************************************
*** Resumen de compra                                                                            ***
***************************************************************************************************
*/   
?>                    
                <td style="border: inset 0pt" align="center">
                
                    <h2>Resumen de compra</h2>
                    <div>
                        <?php echo "&nbsp";?>
                    </div>
                    <div>
                        <?php echo "&nbsp";?>
                    </div>
                    <textarea style="border: inset 0pt" rows="5" cols="40" maxlength="780"><?php echo trim("Cantidad de Productos: ".$carrito['cantidad_productos']."\n\n"."Pagas ".$carrito['importe_carrito'])?></textarea>
                    <h2> </h2>

                    
                    
                </td>
                
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
                    <a href="<?= base_url("ventas/diallega/".$carrito['id_cliente'])?>" class="btn btn-info">Continuar</a>
                    
                </div>
            </div>
        </div> 
<!--
***************************************************************************************************
*** Terminar la seccion                                                                             ***
***************************************************************************************************
-->              
<?= $this->endSection() ?>
