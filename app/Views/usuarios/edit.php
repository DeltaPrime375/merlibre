<?= $this->extend('layouts/base_layout');
$this->section('title')?> Modificar datos de un usuario <?= $this->endSection()?>

<?= $this->section('content')?> 
    <div class = "container">
        <div class = "row py-4">
            <div class = "col-x1-12 text-end">
                <a href = "<?= base_url('usuarios')?>" class = "btn btn-primary">Regresar a Usuarios</a>
            </div>

            <div class = "row">
                <div class = "col-xl-6 m-auto">
                    <form action = "<?=base_url('usuarios/'.$usuarios['id_usuario']) ?>" method = "POST"> 
                        <?=csrf_field() ?>
                        <input type = "hidden" name = "_method" value = "PUT">
                        <div class = "row">
                            <div class = "col-sm-12">
                                <div class = "card shadow">
                                    <div class = "card-body">
                                        <h5 class = "card-title">Editar datos del usuario</h5>
                                        <div class = "form-group mb-3">
                                            <label class = "form-label">Nombre del usuario</label>
                                            <input type = "text" class = "form-control" name = "nombre_usuario" placeholder = "Ingrese su nombre"
                                             value = "<?php if($usuarios['nombre_usuario']): echo $usuarios['nombre_usuario']; else: sett_value('nombre_usuario'); endif;?>"/>
                                        </div>
                                        <div class = "form-group mb-3">
                                            <label class = "form-label">Apellido paterno</label>
                                            <input type = "text" class = "form-control" name = "apellido_paterno" placeholder = "Ingrese su apellido paterno" 
                                            value = "<?php if($usuarios['apellido_paterno']): echo $usuarios['apellido_paterno']; else: sett_value('apellido_paterno'); endif;?>"/>
                                        </div>
                                        <div class = "form-group mb-3">
                                            <label class = "form-label">Apellido materno</label>
                                            <input type = "text" class = "form-control" name = "apellido_materno" placeholder = "Ingrese su apellido materno"
                                             value = "<?php if($usuarios['apellido_materno']): echo $usuarios['apellido_materno']; else: sett_value('apellido_materno'); endif;?>"/>
                                        </div>
                                        <div class = "form-group mb-3">
                                            <label class = "form-label">Apodo</label>
                                            <input type = "text" class = "form-control" name = "apodo_usuario" placeholder = "Ingrese un apodo o el nombre de la compañia a la que representa"
                                             value = "<?php if($usuarios['apodo_usuario']): echo $usuarios['apodo_usuario']; else: sett_value('apodo_usuario'); endif;?>"/>
                                        </div>
                                        <div class = "form-group mb-3">
                                            <label class = "form-label">Coreo electronico</label>
                                            <input type = "text" class = "form-control" name = "correo_electronico" placeholder = "Ingrese su correo electronico"
                                             value = "<?php if($usuarios['correo_electronico']): echo $usuarios['correo_electronico']; else: sett_value('correo_electronico'); endif;?>"/>
                                        </div>
                                        <div class = "form-group mb-3">
                                            <label class = "form-label">Telefono</label>
                                            <input type = "text" class = "form-control" name = "telefono" placeholder = "Ingrese su numero telefonico"
                                             value = "<?php if($usuarios['telefono']): echo $usuarios['telefono']; else: sett_value('telefono'); endif;?>"/>
                                        </div>
                                        <div class = "form-group mb-3">
                                            <label class = "form-label">RFC</label>
                                            <input type = "text" class = "form-control" name = "RFC" placeholder = "Ingrese su RFC" 
                                            value = "<?php if($usuarios['RFC']): echo $usuarios['RFC']; else: sett_value('RFC'); endif;?>"/>
                                        </div>
                                        <div class = "form-group mb-3">
                                            <label class = "form-label">Contraseña</label>
                                            <input type = "text" class = "form-control" name = "contrasena" placeholder = "Ingrese su contraseña" 
                                            value = "<?php if($usuarios['contrasena']): echo $usuarios['contrasena']; else: sett_value('contrasena'); endif;?>"/>
                                        </div>
                                        
                                        <button type = "submit" class = "btn btn-success">Modificar usuario</button>
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