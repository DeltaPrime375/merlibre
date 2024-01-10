<?= $this->extend('layouts/base_layout');

$this->section('title')?>Carrito de compras<?= $this->endSection()?>

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
                    <h5 class = "card-title">Carrito</h5>
                </div>
                <div class="card-body">
                
                <?php 
            
                if (count($carrito) > 0){
                ?>
                <table class ="table table-striped">

                <theah>
                            <tr>
                                <th>Nombre del Producto</th>
                                <th>Cantidad</th>
                                <th>Precio</th>
                                <th>Descuento</th>

                                <th>Acción</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php

                                $db = db_connect();
                                $id = $_SESSION['Usuario'];
                                $query = $db->query("SELECT * FROM carrito_detalle where id_carrito =".$id."");
                                $carritoDetalle= $query->getResult();
                                if(count($carritoDetalle) > 0):
                                    foreach($carritoDetalle as $carD): ?>
                                    <tr>
                                        
                                        <td><?php 
                                        $db = new mysqli("localhost","root","","merlibre");
                                        $query = ("SELECT productos.nombre_producto FROM productos where id_producto =".$carD->id_producto);
                                        
                                        $result = mysqli_query($db, $query);
                                        while($row = mysqli_fetch_array($result)) {
                                                echo $row['nombre_producto']; 
                                        }
                                        
                                        
                                        ?></td>

                                        <td><?= $carD->cantidad?></td>
                                        <td><?= $carD->precio?></td>
                                        <td><?= $carD->descuento?> %</td>

                                        <td class = "d-flex">
                                            <form class = "display-none" method = "post" action = "<?=base_url('carrito/'.$carD->id_carrito) ?>" 
                                                id = "deleteProductoCarrito<?=$carD->id_carrito?>">
                                                <input type = "hidden" name = "_method" value = "DELETE">
                                                <a href = "javascript:void(0)" onclick = "deleteProductoCarrito('deleteProductoCarrito<?=$carD->id_carrito?>')" 
                                                class="btn btn-sm btn-danger" title="Eliminar">Eliminar <i class="bi bi-trash"></i></a>
                                            </form>
                                        </td>
                                    </tr>
                                    
                                <?php endforeach;?>
                
                                <?php endif ?>
                        </tbody>

                        <theah>
                            <tr>
                                <th>Cantidad de Productos</th>
                                <th>Total</th>

                                <th>Acción</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php
                                if(count($carrito) > 0):
                                    foreach($carrito as $car): ?>
                                    <tr>
                                        <td><?= $car->cantidad_productos?></td>
                                        <td><?= $car->importe_carrito?></td>


                                        <td class = "d-flex">
                                            <a href = "<?= base_url('ventas/domicilio/'.$_SESSION['Usuario'])?>" class = "btn btn-primary">Continuar compra</a>
                                        </td>
                                    </tr>
                                    
                                <?php endforeach;?>
                
                                <?php endif ?>
                        </tbody>

                </table>
                <?php
            }else{
              ?>
                <h2>Tu carrito esta vació</h2>
                <br><a href = "<?= base_url('productos')?>" class = "btn btn-primary">Descubrir Productos</a>
              <?php
            }
            ?>


                </div>
            </div>
        </div>
    </div>

    <script>
        function deleteProductoCarrito(formId){
            let confirm = window.confirm('¿Está seguro que desea eliminar esta producto del carrito?');
            if(confirm){
                document.getElementById(formId).submit();
            }
        }
    </script>


<?= $this->endSection() ?>