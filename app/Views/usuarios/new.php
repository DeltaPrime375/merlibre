<?= $this->extend('layouts/base_layout');
$this->section('title')?> Registrar nuevo usuario <?= $this->endSection()?>

<?= $this->section('content')?> 
    <div class = "container">
        <div class = "row py-4">


            <div class = "row">
                <div class = "col-xl-6 m-auto">
                    <form action = "<?=base_url('usuarios') ?>" method = "POST"> 
                        <?=csrf_field() ?>
                        <div class = "row">
                            <div class = "col-sm-12">
                                <div class = "card shadow">
                                    <div class = "card-body">
                                        <h5 class = "card-title">Registra tus datos</h5>
                                        <div class = "form-group mb-3">
                                            <label class = "form-label">Nombre</label>
                                            <input type = "text" class = "form-control" name = "nombre_usuario" placeholder = "Ingrese su nombre"/>
                                        </div>
                                        <div class = "form-group mb-3">
                                            <label class = "form-label">Apellido paterno</label>
                                            <input type = "text" class = "form-control" name = "apellido_paterno" placeholder = "Ingrese su apellido paterno"/>
                                        </div>
                                        <div class = "form-group mb-3">
                                            <label class = "form-label">Apellido materno</label>
                                            <input type = "text" class = "form-control" name = "apellido_materno" placeholder = "Ingrese su apellido materno"/>
                                        </div>
                                        <div class = "form-group mb-3">
                                            <label class = "form-label">Apodo</label>
                                            <input type = "text" class = "form-control" name = "apodo_usuario" placeholder = "Ingrese un apodo o el nombre de la compañia a la que representa"/>
                                        </div>
                                        <div class = "form-group mb-3">
                                            <label class = "form-label">Correo Electronico</label>
                                            <input type = "text" class = "form-control" name = "correo_electronico" placeholder = "Ingrese su correo electronico"/>
                                        </div>
                                        <div class = "form-group mb-3">
                                            <label class = "form-label">Telefono</label>
                                            <input type = "text" class = "form-control" name = "telefono" placeholder = "Ingrese su numero telefonico"/>
                                        </div>
                                        <div class = "form-group mb-3">
                                            <label class = "form-label">RFC</label>
                                            <input type = "text" class = "form-control" name = "RFC" placeholder = "Ingrese su RFC"/>
                                        </div>
                                        <div class = "form-group mb-3">
                                            <label class = "form-label">Contraseña</label>
                                            <input type = "text" class = "form-control" name = "contraseña" placeholder = "Ingrese su contraseña"/>
                                        </div>
                                        <button type = "submit" class = "btn btn-success">Guardar usuario</button>
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