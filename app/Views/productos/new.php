
<?= $this->extend('layouts/base_layout');
$this->section('title')?> Registrar nuevo producto <?= $this->endSection()?>

<?= $this->section('content')?> 
    <div class = "container">
        <div class = "row py-4">

            <div class = "row">
                <div class = "col-xl-6 m-auto">
                    <form action = "<?=base_url('productos') ?>" method = "POST"> 
                        <?=csrf_field() ?>
                        <div class = "row">
                            <div class = "col-sm-12">
                                <div class = "card shadow">
                                    <div class = "card-body">
                                        <h5 class = "card-title">Registrar nuevo producto para la venta</h5>
                                        <div class = "form-group mb-3">
                                            <label class = "form-label">ID del Proveedor</label>
                                            <input type = "text" class = "form-control" name = "id_proveedor" placeholder = "Ingrese el ID del proveedor"/>
                                        </div>
                                        <div class = "form-group mb-3">
                                            <label class = "form-label">Nombre del Producto</label>
                                            <input type = "text" class = "form-control" name = "nombre_producto" placeholder = "Ingrese el nombre del producto"/>
                                        </div>

                                        <div class = "form-group mb-3">
                                            <label class = "form-label">Marca del Producto</label>
                                            <input type = "text" class = "form-control" name = "marca" placeholder = "Ingrese la marca del producto"/>
                                        </div>
                                        
                                        <div class = "form-group mb-3">
                                            <label class = "form-label">Precio del Producto</label>
                                            <input type = "text" class = "form-control" name = "precio_producto" placeholder = "Ingrese el precio del producto"/>
                                        </div>
                                        <div class = "form-group mb-3">
                                            <label class = "form-label">Descuento</label>
                                            <input type = "text" class = "form-control" name = "descuento" placeholder = "Ingrese porcentaje de descuento"/>
                                        </div>
                                        <div class = "form-group mb-3">
                                            <label class = "form-label">Existencia</label>
                                            <input type = "text" class = "form-control" name = "existencia" placeholder = "Ingrese la cantidad de existencia del producto"/>
                                        </div>
                                        <div class = "form-group mb-3">
                                            <label class = "form-label">Mercancia/Transito</label>
                                            <input type = "text" class = "form-control" name = "mercancia_transito" placeholder = "Ingrese la cantidad de la mercancia que se encuentra en transito"/>
                                        </div>
                                        <div class = "form-group mb-3">
                                            <label class = "form-label" >Nuevo/Usado</label>
                                                <select name="nuevo_usado" id="nuevo_usado" class = "form-control">
                                                    <option value="Nuevo">Nuevo</option>
                                                    <option value="Usado">Usado</option>
                                                    
                                            </select>
                                        </div>
                                        <div class = "form-group mb-3">
                                            <label class = "form-label">Descripcion</label>
                                            <input type = "text" class = "form-control" name = "descripcion_general" placeholder = "Ingrese una descripcion a detalle del producto"/>
                                        </div>
                                        <div class = "form-group mb-3">
                                            <label class = "form-label">Imagen</label>
                                            <input type = "text" class = "form-control" name = "imagen" placeholder = "Ingrese el enlace web de la imagen"/>
                                        </div>
                                        <div class = "form-group mb-3">
                                            <label class = "form-label">Imagen</label>
                                            <input type = "text" class = "form-control" name = "tiempo_surtido" placeholder = "Ingrese en cuanto tiempo se surtira el producto"/>
                                        </div>
                                        <button type = "submit" class = "btn btn-success">Guardar Producto</button>
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