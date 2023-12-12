<?= $this->extend('layouts/base_layout');
$this->section('title')?> Inicio de sesión<?= $this->endSection()?>

<?= $this->section('content')?> 
    <div class = "container">
        <div class = "row py-4">

            <div class = "row">
                <div class = "col-xl-6 m-auto">

                    <form action = "<?=base_url('usuarios/login') ?> " method="POST"> 

                        <?=csrf_field() ?>
                        <div class = "row">
                            <div class = "col-sm-12">
                                <div class = "card shadow">
                                    <div class = "card-body">

                                        <h5 class = "card-title">Inserte sus datos para iniciar sesión</h5>

                                        <div class = "form-group mb-3">
                                            <label class = "form-label">Apodo</label>
                                            <input type = "text" class = "form-control" name = "apodo_usuario" placeholder = "Ingrese su apodo de usuario"/>
                                        </div>
                                        <div class = "form-group mb-3">
                                            <label class = "form-label">Contraseña</label>
                                            <input type = "text" class = "form-control" name = "contraseña" placeholder = "Ingrese su contraseña"/>
                                        </div>
                                        <button name = "btn_ingresar" type = "submit" class = "btn btn-success" >Iniciar sesión</button>

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