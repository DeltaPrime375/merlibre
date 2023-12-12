<?= $this->extend('layouts/base_layout');

$this->section('title')?> Listado de Productos <?= $this->endSection()?>

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
                    <h5 class = "card-title">Productos</h5>
                </div>
                <div class="card-body">
                    <table class ="table table-striped">
                        <theah>
                            <tr>
                                <th>Nombre Producto</th>
                                <th>Precio Producto</th>
                                <th>Descuento</th>

                                <th>Accion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if(count($productos) > 0):
                                    foreach($productos as $producto): ?>
                                    <tr>
                                        <td><?= $producto['nombre_producto']?></td>
                                        <td><?= $producto['precio_producto']?></td>
                                        <td><?= $producto['descuento']?></td>


                                        <td class = "d-flex">
                                            <a href = "<?= base_url('productos/'.$producto['id_producto'])?>" class = "btn btn-sm btn-info mx-1" title = "Mostrar"><i class = "bi bi-info-square"></i></a>
                                            
                                            <a href = "<?= base_url('productos/edit/'.$producto['id_producto'])?>" class = "btn btn-sm btn-success mx-1" title = "Editar"><i class = "bi bi-pencil-square"></i></a>
                                            
                                            <form class = "display-none" method = "post" action = "<?=base_url('productos/'.$producto['id_producto']) ?>" 
                                        id = "deleteProducto<?=$producto['id_producto']?>">
                                        <input type = "hidden" name = "_method" value = "DELETE"/>
                                            <a href = "javascript:void(0)" onclick = "deleteProducto('deleteProducto<?=$producto['id_producto']?>')" 
                                            class="btn btn-sm btn-danger" title="Eliminar"><i class="bi bi-trash"></i></a>
                                            </form>
                                        </td>
                                    </tr>
                                    
                                <?php endforeach;
                                    else: ?>
                                    <tr rowspan="1">
                                        <tr colspan = "4">
                                            <h6 class = "text-danger text-center">No se encontraron productos</h6>
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