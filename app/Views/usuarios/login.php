<?= $this->extend('layouts/base_layout');
$this->section('title')?> Inicio de sesión<?= $this->endSection()?>

<?= $this->section('content')?> 
    <div class = "container">
        <div class = "row py-4">

            <div class = "row">
                <div class = "col-xl-6 m-auto">

                    <form action = "<?=base_url('inicio') ?>"> 

                        <?=csrf_field() ?>
                        <div class = "row">
                            <div class = "col-sm-12">
                                <div class = "card shadow">
                                    <div class = "card-body">

                                        <h5 class = "card-title">Inserte sus datos para iniciar sesión</h5>

                                        <div class = "form-group mb-3">
                                            <label class = "form-label">Correo Electronico</label>
                                            <input type = "text" class = "form-control" name = "correo_electronico" placeholder = "Ingrese su correo electronico"/>
                                        </div>
                                        <div class = "form-group mb-3">
                                            <label class = "form-label">Contraseña</label>
                                            <input type = "password" class = "form-control" autocomplete = "off" name = "contrasena" placeholder = "Ingrese su contraseña"/>
                                        </div>
                                        <button type = "submit" class = "btn btn-success">Iniciar sesión</button>

                                        <div class = "form-group mb-3">
                                            <br><a href="<?= base_url('usuarios/new')?>">Crear Cuenta</a>
                                        </div>
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