<?= $this->extend('layouts/base_layout');
$this->section('title')?> Detalles del Usuario <?= $this->endSection()?>

<?= $this->section('content')?> 
    <div class = "container">
        <div class = "row py-4">
            <div class = "col-x1-12 text-end">
                <a href = "<?= base_url('usuarios')?>" class = "btn btn-primary">Regresar a usuarios</a>
            </div>
        </div>    

        <div class = "row">
            <div class = "col-xl-6 m-auto">
                <div class = "col-sm-12">
                    <div class = "card shadow">
                        <div class = "card-body">
                                <h5 class = "card-title">Detalles de la dirección</h5>
                                <div class = "form-group mb-3">
                                    <label class = "form-label">ID de la direccion del cliente</label>
                                    <input type = "text" class = "form-control" disabled placeholder = "ID de la direccion del cliente" value = "<?php echo trim($direccion_clientes['id_direccioncliente'])?>"/>
                                </div>
                                <div class = "form-group mb-3">
                                    <label class = "form-label">ID del Usuario</label>
                                    <input type = "text" class = "form-control" disabled placeholder = "ID del Usuario" value = "<?php echo trim($direccion_clientes['id_usuario'])?>"/>
                                </div>
                                <div class = "form-group mb-3">
                                    <label class = "form-label">Calle</label>
                                    <input type = "text" class = "form-control" disabled placeholder = "Calle" value = "<?php echo trim($direccion_clientes['calle'])?>"/>
                                </div>
                                <div class = "form-group mb-3">
                                    <label class = "form-label">Número</label>
                                    <input type = "text" class = "form-control" disabled placeholder = "Número" value = "<?php echo trim($direccion_clientes['numero'])?>"/>
                                </div>
                                <div class = "form-group mb-3">
                                    <label class = "form-label">Colonia</label>
                                    <input type = "text" class = "form-control" disabled placeholder = "Colonia" value = "<?php echo trim($direccion_clientes['colonia'])?>"/>
                                </div>
                                <div class = "form-group mb-3">
                                    <label class = "form-label">Ciudad</label>
                                    <input type = "text" class = "form-control" disabled placeholder = "Ciudad" value = "<?php echo trim($direccion_clientes['ciudad'])?>"/>
                                </div>
                                <div class = "form-group mb-3">
                                    <label class = "form-label">Estado</label>
                                    <input type = "text" class = "form-control" disabled placeholder = "Estado" value = "<?php echo trim($direccion_clientes['estado'])?>"/>
                                </div>
                                <div class = "form-group mb-3">
                                    <label class = "form-label">País</label>
                                    <input type = "text" class = "form-control" disabled placeholder = "País" value = "<?php echo trim($direccion_clientes['pais'])?>"/>
                                </div>
                                <div class = "form-group mb-3">
                                    <label class = "form-label">Código Postal</label>
                                    <input type = "text" class = "form-control" disabled placeholder = "Código Postal" value = "<?php echo trim($direccion_clientes['CP'])?>"/>
                                </div>
                                <div class = "form-group mb-3">
                                    <label class = "form-label">Teléfono</label>
                                    <input type = "text" class = "form-control" disabled placeholder = "Teléfono" value = "<?php echo trim($direccion_clientes['telefono'])?>"/>
                                </div>
                                <div class = "form-group mb-3">
                                    <label class = "form-label">Detalles del domicilio</label>
                                    <input type = "text" class = "form-control" disabled placeholder = "Detalles del domicilio" value = "<?php echo trim($direccion_clientes['detalles_domicilio'])?>"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?= $this->endSection() ?>