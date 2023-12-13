<!-- 
Programa:	Seleccionar medio de pago
Elaboro	:	Lorenzo Chavez Felix
Fecha	:	25/11/2023
Empresa	:	Facultad de Informatica Culiacan
Sistema	:   Ventas por internet (Mercado Libre)
***************************************************************************************************
*** Seleccionar el medio de pago                                                                ***
***************************************************************************************************
-->
<?= $this->extend('layouts/base_layout2');
$this->section('title') ?> Seleccionar medio de pago <?= $this->endSection()?>
<?= $this->section('content'); ?>

    <div class="card-body">
        <table class="table table-striped">
            <tr>
                <td>
                    
                    <h2>¿Cómo quieres pagar?</h2> 
                    <div>
                        <?php echo "&nbsp";?>
                    </div>
                    <h5>Con Mercado Pago:</h5>
                    <div>
                        <?php echo "&nbsp";?>
                    </div>
                    <!-- <form class="form-inline my-2 my-lg-0" method="POST"> -->
                <form action = "<?=base_url('ventas/efectivopuntopago/'.$carrito['id_cliente'])?>" method = "GET"> 

                    <div>
                        <input type="radio" required name="MercadoPago" id="MercadoPago" value="1"> 
                        <label> <h6> &nbsp &nbsp Mercado Credito </h6>   </label>  <br>
                        <label> &nbsp &nbsp &nbsp &nbsp  Hasta 12 mensualidades sin usar tarjeta</label>
                    </div>
                    <div>
                        <?php echo "&nbsp";?>
                    </div>
                    <div>
                        <input type="radio" required name="MercadoPago" id="MercadoPago" value="8"> 
                        <label> <h6> &nbsp &nbsp Nueva tarjeta de credito </h6>   </label>  <br>                        
                    </div>
                    <div>
                        <?php echo "&nbsp";?>
                    </div>
                    <div>
                        <input type="radio" required name="MercadoPago" id="MercadoPago" value="9"> 
                        <label> <h6> &nbsp &nbsp Nueva tarjeta de debito </h6>   </label>  <br>                        
                    </div>
                    <div>
                        <?php echo "&nbsp";?>
                    </div>
                    <h5>Con otro tipo de Mercado Pago:</h5>
                    <div>
                        <?php echo "&nbsp";?>
                    </div>
                    <div>
                        <input type="radio" required name="MercadoPago" id="MercadoPago" value="10"> 
                        <label> <h6> &nbsp &nbsp Transferencia SPEI </h6>   </label>  <br>
                        <label> &nbsp &nbsp &nbsp &nbsp  Desde cualquier banca en linea</label>
                    </div>
                    <div>
                        <?php echo "&nbsp";?>
                    </div>
                    <div>
                        <input type="radio" required name="MercadoPago" id="MercadoPago" value="11"> 
                        <label> <h6> &nbsp &nbsp Efectivo en puntos de pago </h6>   </label>  <br>
                        <label> &nbsp &nbsp &nbsp &nbsp  Santander, HSBC, 7 Eleven, Soriana, Oxxo y otros</label>
                    </div>
                
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
        <center>
            <button type = "submit" class = "btn btn-info">Continuar</button>
        </center>
        </form>
<!--         <div class="container" align="center">
                        <div class="row py-4">
                            <div class="col-xl-12 text-end">
                                <a href="<?= base_url("ventas/puntopago/".$carrito['id_cliente'])?>" class="btn btn-info">Continuar</a>
                                
                            </div>
                        </div>
                    </div>  -->
<?= $this->endSection() ?>
