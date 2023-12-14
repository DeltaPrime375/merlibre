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
                                <h5 class = "card-title">Detalles del Usuario</h5>
                                <div class = "form-group mb-3">
                                    <label class = "form-label">ID del Usuario</label>
                                    <input type = "text" class = "form-control" disabled placeholder = "ID del Usuario" value = "<?php echo trim($usuarios['id_usuario'])?>"/>
                                </div>
                                <div class = "form-group mb-3">
                                    <label class = "form-label">Nombre del Usuario</label>
                                    <input type = "text" class = "form-control" disabled placeholder = "Nombre del Usuario" value = "<?php echo trim($usuarios['nombre_usuario'])?>"/>
                                </div>
                                <div class = "form-group mb-3">
                                    <label class = "form-label">Apellido Paterno</label>
                                    <input type = "text" class = "form-control" disabled placeholder = "Apellido Paterno" value = "<?php echo trim($usuarios['apellido_paterno'])?>"/>
                                </div>
                                <div class = "form-group mb-3">
                                    <label class = "form-label">Apellido Materno</label>
                                    <input type = "text" class = "form-control" disabled placeholder = "Apellido Materno" value = "<?php echo trim($usuarios['apellido_materno'])?>"/>
                                </div>
                                <div class = "form-group mb-3">
                                    <label class = "form-label">Apodo Usuario</label>
                                    <input type = "text" class = "form-control" disabled placeholder = "Apodo Usuario" value = "<?php echo trim($usuarios['apodo_usuario'])?>"/>
                                </div>
                                <div class = "form-group mb-3">
                                    <label class = "form-label">Correo Electrónico</label>
                                    <input type = "text" class = "form-control" disabled placeholder = "Correo Electrónico" value = "<?php echo trim($usuarios['correo_electronico'])?>"/>
                                </div>
                                <div class = "form-group mb-3">
                                    <label class = "form-label">Teléfono</label>
                                    <input type = "text" class = "form-control" disabled placeholder = "Teléfono" value = "<?php echo trim($usuarios['telefono'])?>"/>
                                </div>
                                <div class = "form-group mb-3">
                                    <label class = "form-label">RFC</label>
                                    <input type = "text" class = "form-control" disabled placeholder = "RFC" value = "<?php echo trim($usuarios['RFC'])?>"/>
                                </div>
                                <div class = "form-group mb-3">
                                    <label class = "form-label">Contraseña</label>
                                    <input type = "text" class = "form-control" disabled placeholder = "Contraseña" value = "<?php echo trim($usuarios['contraseña'])?>"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?= $this->endSection() ?>