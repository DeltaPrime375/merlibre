<?= $this->extend('layouts/base_layout');
$this->section('title')?> Detalles del producto <?= $this->endSection()?>

<?= $this->section('content')?> 
<!--    
<div class = "container">


        <div class = "row">
            <div class = "col-xl-6 m-auto">
                <div class = "col-sm-12">
                    <div class = "card shadow">
                        <div class = "card-body">
                                <h5 class = "card-title">Detalles del producto</h5>
                                <div class = "form-group mb-3">
                                    <label class = "form-label">ID del Producto</label>
                                    <input type = "text" class = "form-control" disabled placeholder = "ID del Proveedor" value = "<?php echo trim($producto['id_producto'])?>"/>
                                </div>
                                <div class = "form-group mb-3">
                                    <label class = "form-label">ID del Proveedor</label>
                                    <input type = "text" class = "form-control" disabled placeholder = "ID del Proveedor" value = "<?php echo trim($producto['id_proveedor'])?>"/>
                                </div>
                                <div class = "form-group mb-3">
                                    <label class = "form-label">Nombre del Producto</label>
                                    <input type = "text" class = "form-control" disabled placeholder = "Nombre del Producto" value = "<?php echo trim($producto['nombre_producto'])?>"/>
                                </div>
                                <div class = "form-group mb-3">
                                    <label class = "form-label">Precio del Producto</label>
                                    <input type = "text" class = "form-control" disabled placeholder = "Precio del Producto" value = "<?php echo trim($producto['precio_producto'])?>"/>
                                </div>
                                <div class = "form-group mb-3">
                                    <label class = "form-label">Descuento</label>
                                    <input type = "text" class = "form-control" disabled placeholder = "Descuento" value = "<?php echo trim($producto['descuento'])?>"/>
                                </div>
                                <div class = "form-group mb-3">
                                    <label class = "form-label">Existencia</label>
                                    <input type = "text" class = "form-control" disabled placeholder = "Existencia" value = "<?php echo trim($producto['existencia'])?>"/>
                                </div>
                                <div class = "form-group mb-3">
                                    <label class = "form-label">Mercancia/Transito</label>
                                    <input type = "text" class = "form-control" disabled placeholder = "Mercancia/Transito" value = "<?php echo trim($producto['mercancia_transito'])?>"/>
                                </div>
                                <div class = "form-group mb-3">
                                    <label class = "form-label">Nuevo/Usado</label>
                                    <input type = "text" class = "form-control" disabled placeholder = "Nuevo/Usado" value = "<?php echo trim($producto['nuevo_usado'])?>"/>
                                </div>
                                <div class = "form-group mb-3">
                                    <label class = "form-label">Descripcion</label>
                                    <input type = "text" class = "form-control" disabled placeholder = "Descripcion" value = "<?php echo trim($producto['descripcion_general'])?>"/>
                                </div>
                                <button class = "btn btn-success">Comprar ahora</button>
                                <button class = "btn btn-success">Agregar al carrito</button>

                                            <a href = "<?= base_url('productos/edit/'.$producto['id_producto'])?>" class = "btn btn-sm btn-success mx-1" title = "Editar"><i class = "bi bi-pencil-square"></i></a>
                                            
                                            <form class = "display-none" method = "post" action = "<?=base_url('productos/'.$producto['id_producto']) ?>" 
                                        id = "deleteProducto<?=$producto['id_producto']?>">
                                        <input type = "hidden" name = "_method" value = "DELETE"/>
                                            <a href = "javascript:void(0)" onclick = "deleteProducto('deleteProducto<?=$producto['id_producto']?>')" 
                                            class="btn btn-sm btn-danger" title="Eliminar"><i class="bi bi-trash"></i></a>
                                            </form>
                            </div>
                        </div>
                    </div>
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
-->
<section class="py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-6"><img img class="card-img-top" src=<?php echo trim($producto['imagen'])?> alt="..." /></div>
                    <div class="col-md-6">
                        <div class="small mb-1"><?php echo trim($producto['nuevo_usado'])?></div>
                        <!--<div class="small mb-1">ID del Producto: <?php echo trim($producto['id_producto'])?></div>-->
                        <h1 class="display-5 fw-bolder"><?php echo trim($producto['nombre_producto'])?></h1>
                        <div class="fs-5 mb-5">
                            
                            <span class="text-decoration-line-through">$
                                <?php echo trim($producto['precio_producto'])?>
                            </span>
                            <h1>
                                $<?php echo round (trim((($producto['precio_producto'])/100)*(100-($producto['descuento']))), 2)?>
                            </h1>
                            <span >
                                <?php if ($producto['descuento']>0){
                                    echo trim($producto['descuento']),"% de descuento";
                                }
                                ?>
                            </span>
                        </div>
                        
                        <div class="d-flex">
                            <input class="form-control text-center me-3" id="inputQuantity" type="num" value="1" style="max-width: 3rem" />
                            <span>
                                <?php
                                if (($producto['existencia']) == 1){
                                    echo "¡Último disponible!";
                                }else{
                                    echo trim($producto['existencia']), " disponibles";
                                } ?>  
                            </span>                           
                        </div>

                        <button class="btn btn-primary" type="button">
                                Comprar ahora
                            </button>
                            <button class="btn btn-secondary" type="button">
                                <i class="bi-cart-fill me-1"></i>
                                Agregar al carrito
                            </button>
                        <div class="small mb-1">Vendido por: </div>
                        <p class="lead"><?php echo trim($producto['descripcion_general'])?></p>
                    </div>
                </div>
            </div>
        </section>
<?= $this->endSection() ?>