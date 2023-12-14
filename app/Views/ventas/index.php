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
                    <h5 class = "card-title">Mis Compras</h5>
                </div>
                <div class="card-body">
                    <table class ="table table-striped">
                        <theah>
                            <tr>
                                <th>Folio</th>
                                <th>Envío</th>
                                <th>Fecha</th>
                                <th>Hora</th>
                                <th>Monto</th>
                                <th>Estatus</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if(count($ventas) > 0):
                                    foreach($ventas as $vta): ?>
                                    <?php 
                                    $estatus_compra = " Sin Estatus ";
                                    $Permite_borrar = 0;
                                    if ($vta->estatus == "p1"){
                                        $estatus_compra = "Pendiente de pagar en Santander";
                                        $Permite_borrar = 1;
                                    }else if ($vta->estatus == "p2"){
                                        $estatus_compra = "Pendiente de pagar en HSBC";
                                        $Permite_borrar = 1;
                                    }else if ($vta->estatus == "p3"){
                                        $estatus_compra = "Pendiente de pagar en 7 Eleven";
                                        $Permite_borrar = 1;
                                    }else if ($vta->estatus == "p4"){
                                        $estatus_compra = "Pendiente de pagar en Soriana";
                                        $Permite_borrar = 1;
                                    }else if ($vta->estatus == "p5"){
                                        $estatus_compra = "Pendiente de pagar en OXXO";
                                        $Permite_borrar = 1;
                                    }else if ($vta->estatus == "s"){
                                        $estatus_compra = "El proveedor esta preparando el envío";                                        
                                    }else if ($vta->estatus == "t"){
                                        $estatus_compra = "Tu pedido esta en viaje";                                        
                                    }else if ($vta->estatus == "q"){
                                        $estatus_compra = "Tu pedido esta en el ultimo tramo";
                                    }else if ($vta->estatus == "e"){
                                        $estatus_compra = "Entregado";
                                    };                                 
                                    ?>
                                    <tr>
                                        <td><?= $vta->id_venta?></td>
                                        <td><?= $vta->num_envio?></td>
                                        <td><?= $vta->fecha_venta?></td>
                                        <td><?= $vta->hora?></td>
                                        <td><?= $vta->monto_total?></td>
                                        <td><?php echo ' '.$estatus_compra.' '?></td>


                                        <td class = "d-flex">
                                            <a href = "<?= base_url('compras/show/'.$vta->id_venta)?>" class = "btn btn-sm btn-info mx-1" title = "Mostrar"><i class = "bi bi-info-square"></i></a>
                                        <?php   
                                        if ($Permite_borrar == 1) {
                                            ?>
                                            <form class = "display-none" method = "post" action = "<?=base_url('ventas/'.$vta->id_venta) ?>" 
                                                id = "deleteVenta<?=$vta->id_venta?>">
                                                <input type = "hidden" name = "_method" value = "DELETE"/>
                                                <a href = "javascript:void(0)" onclick = "deleteVenta('deleteVenta<?=$vta->id_venta?>')" 
                                                class="btn btn-sm btn-danger" title="Eliminar"><i class="bi bi-trash"></i></a>
                                            </form>
                                            <?php
                                        }
                                        ?>
                                            
                                        </td>
                                    </tr>
                                    
                                <?php endforeach;
                                    else: ?>
                                    <tr rowspan="1">
                                        <tr colspan = "4">
                                            <h6 class = "text-danger text-center">No se encontraron compras</h6>
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
        function deleteVenta(formId){
            let confirm = window.confirm('¿Está seguro que desea eliminar esta venta');
            if(confirm){
                document.getElementById(formId).submit();
            }
        }
    </script>


<?= $this->endSection() ?>