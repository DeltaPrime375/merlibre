<!-- 
Programa:	Seleccionar lugar para el pago en efectivo
Elaboro	:	Lorenzo Chavez Felix
Fecha	:	03/12/2023
Empresa	:	Facultad de Informatica Culiacan
Sistema	:   Ventas por internet (Mercado Libre)
***************************************************************************************************
*** Seleccionar el lugar para el pago en efectivo                                               ***
***************************************************************************************************
-->
<?= $this->extend('layouts/base_layout');
$this->section('title') ?> Seleccionar lugar de pago en efectivo <?= $this->endSection()?>
<?= $this->section('content'); ?>

    <div class="card-body">
    <form action = "<?=base_url('ventas/revisayconfirma/'.$carrito['id_usuario'])?>" method = "GET"> 
        <table class="table table-striped">
            <tr>
                <td>
                    
                    <h2>¿Cómo quieres pagar?</h2> 
                    <div>
                        <?php echo "&nbsp";?>
                    </div>
                    <h5> <i class = "bi bi-cash-stack" ></i> &nbsp &nbsp  Efectivo en puntos de pago</h5>
                    <div>
                        <?php echo "&nbsp";?>
                    </div>
                    <h2>¿Donde quieres pagar?</h2>
                    <div>
                        <?php echo "&nbsp";?>
                    </div>
                    <div>
                        <input type="radio" required name="Efectivo" id="Efectivo" value="1" checked> 
                        <label> <h6> &nbsp &nbsp Santander </h6>   </label> 
                    </div>
                    <div>
                        <?php echo "&nbsp";?>
                    </div>
                    <div>
                        <input type="radio" required name="Efectivo" id="Efectivo" value="2"> 
                        <label> <h6> &nbsp &nbsp HSBC </h6>   </label>  <br>
                    </div>
                    <div>
                        <?php echo "&nbsp";?>
                    </div>
                    <div>
                        <input type="radio" required name="Efectivo" id="Efectivo" value="3" > 
                        <label> <h6> &nbsp &nbsp 7 Eleven </h6>   </label> 
                    </div>
                    <div>
                        <?php echo "&nbsp";?>
                    </div>
                    <div>
                        <input type="radio" required name="Efectivo" id="Efectivo" value="4" > 
                        <label> <h6> &nbsp &nbsp Soriana </h6>   </label> 
                    </div>
                    <div>
                        <?php echo "&nbsp";?>
                    </div>
                    <div>
                        <input type="radio" required name="Efectivo" id="Efectivo" value="5" > 
                        <label> <h6> &nbsp &nbsp OXXO </h6>   </label> 
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
            <button type = "submit" class = "btn btn-info"  >Confirmar Compra</button>
        </center>
    </form>
<!--         <div class="container" align="center">
                        <div class="row py-4">
                            <div class="col-xl-12 text-end">
                                <a href="<?= base_url("ventas/revisayconfirma/".$carrito['id_usuario'])?>" class="btn btn-info">Continuar</a>
                                
                            </div>
                        </div>
                    </div> -->
<?= $this->endSection() ?>
