<?= $this->extend('layouts/base_layout');
$this->section('title')?> Modificar datos de un producto <?= $this->endSection()?>

<?= $this->section('content')?> 
    <div class = "container">
        <div class = "row py-4">

            <div class = "row">
                <div class = "col-xl-6 m-auto">
                    <form action = "<?=base_url('productos/'.$producto['id_producto']) ?>" method = "POST"> 
                        <?=csrf_field() ?>
                        <input type = "hidden" name = "_method" value = "PUT">
                        <div class = "row">
                            <div class = "col-sm-12">
                                <div class = "card shadow">
                                    <div class = "card-body">
                                        <h5 class = "card-title">Editar datos del  producto</h5>
                                        <div class = "form-group mb-3">
                                            <label class = "form-label">ID del Proveedor</label>
                                            <input type = "text" class = "form-control" name = "id_proveedor" placeholder = "
                                            Ingrese el ID del proveedor" value = "<?php if($producto['id_proveedor']): echo $producto['id_proveedor']; else: sett_value('id_proveedor'); endif;?>"/>
                                        </div>
                                        <div class = "form-group mb-3">
                                            <label class = "form-label">Nombre del Producto</label>
                                            <input type = "text" class = "form-control" name = "nombre_producto" placeholder = "
                                            Ingrese el nombre del producto" value = "<?php if($producto['nombre_producto']): echo $producto['nombre_producto']; else: sett_value('nombre_producto'); endif;?>"/>
                                        </div>
                                        <div class = "form-group mb-3">
                                            <label class = "form-label">Precio del Producto</label>
                                            <input type = "text" class = "form-control" name = "precio_producto" placeholder = "
                                            Ingrese el precio del producto" value = "<?php if($producto['precio_producto']): echo $producto['precio_producto']; else: sett_value('precio_producto'); endif;?>"/>
                                        </div>
                                        <div class = "form-group mb-3">
                                            <label class = "form-label">Descuento</label>
                                            <input type = "text" class = "form-control" name = "descuento" placeholder = "
                                            Ingrese la cantidad de existencia del producto" value = "<?php if($producto['descuento']): echo $producto['descuento']; else: sett_value('descuento'); endif;?>"/>
                                        </div>
                                        <div class = "form-group mb-3">
                                            <label class = "form-label">Existencia</label>
                                            <input type = "text" class = "form-control" name = "existencia" placeholder = "
                                            Ingrese la cantidad de existencia del producto" value = "<?php if($producto['existencia']): echo $producto['existencia']; else: sett_value('existencia'); endif;?>"/>
                                        </div>
                                        <div class = "form-group mb-3">
                                            <label class = "form-label">Mercancia/Transito</label>
                                            <input type = "text" class = "form-control" name = "mercancia_transito" placeholder = "
                                            Ingrese el precio del producto" value = "<?php if($producto['mercancia_transito']): echo $producto['mercancia_transito']; else: sett_value('mercancia_transito'); endif;?>"/>
                                        </div>
                                        <div class = "form-group mb-3">
                                            <label class = "form-label">Nuevo/Usado</label>
                                            <input type = "text" class = "form-control" name = "nuevo_usado" placeholder = "
                                            Ingrese si el producto es nuevo o usado" value = "<?php if($producto['nuevo_usado']): echo $producto['nuevo_usado']; else: sett_value('nuevo_usado'); endif;?>"/>
                                        </div>
                                        <div class = "form-group mb-3">
                                            <label class = "form-label">Descripcion</label>
                                            <input type = "text" class = "form-control" name = "descripcion_general" placeholder = "
                                            Ingrese una descripcion del producto" value = "<?php if($producto['descripcion_general']): echo $producto['descripcion_general']; else: sett_value('descripcion_general'); endif;?>"/>
                                        </div>
                                        <button type = "submit" class = "btn btn-success">Modificar Producto</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>