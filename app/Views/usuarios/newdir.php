<?= $this->extend('layouts/base_layout');
$this->section('title')?> Registrar nuevo usuario <?= $this->endSection()?>

<?= $this->section('content')?> 
    <div class = "container">
        <div class = "row py-4">
            <div class = "col-x1-12 text-end">
                <a href = "<?= base_url('usuarios')?>" class = "btn btn-primary">Regresar a usuarios</a>
            </div>

            <div class = "row">
                <div class = "col-xl-6 m-auto">
                    <form action = "<?=base_url('usuarios/createdir/'.$usuarios['id_usuario']) ?>" method = "POST"> 
                        <?=csrf_field() ?>
                        <div class = "row">
                            <div class = "col-sm-12">
                                <div class = "card shadow">
                                    <div class = "card-body">
                                        <h5 class = "card-title">Registrar domicilio</h5>
                                        <div class = "form-group mb-3">
                                            <label class = "form-label">ID Usuario</label>
                                            <input type = "text" class = "form-control" name = "id_usuario"  value = "<?php echo trim($usuarios['id_usuario'])?>"/>
                                        </div>
                                        <div class = "form-group mb-3">
                                            <label class = "form-label">Calle</label>
                                            <input type = "text" class = "form-control" name = "calle" placeholder = "Ingrese la calle"/>
                                        </div>
                                        <div class = "form-group mb-3">
                                            <label class = "form-label">Número</label>
                                            <input type = "text" class = "form-control" name = "numero" placeholder = "Ingrese el numero"/>
                                        </div>
                                        <div class = "form-group mb-3">
                                            <label class = "form-label">colonia</label>
                                            <input type = "text" class = "form-control" name = "colonia" placeholder = "Ingrese la colonia"/>
                                        </div>
                                        <div class = "form-group mb-3">
                                            <label class = "form-label">ciudad</label>
                                            <input type = "text" class = "form-control" name = "ciudad" placeholder = "Ingrese la ciudad"/>
                                        </div>
                                        <div class = "form-group mb-3">
                                            <label class = "form-label">estado</label>
                                            <input type = "text" class = "form-control" name = "estado" placeholder = "Ingrese el estado"/>
                                        </div>
                                        <div class = "form-group mb-3">
                                            <label class = "form-label">pais</label>
                                            <input type = "text" class = "form-control" name = "pais" placeholder = "Ingrese el pais"/>
                                        </div>
                                        <div class = "form-group mb-3">
                                            <label class = "form-label">CP</label>
                                            <input type = "text" class = "form-control" name = "CP" placeholder = "Ingrese el CP"/>
                                        </div>
                                        <div class = "form-group mb-3">
                                            <label class = "form-label">telefono</label>
                                            <input type = "text" class = "form-control" name = "telefono" placeholder = "Ingrese el telefono"/>
                                        </div>
                                        <div class = "form-group mb-3">
                                            <label class = "form-label">Detalles del domicilio</label>
                                            <input type = "text" class = "form-control" name = "detalles_domicilio" placeholder = "Ingrese detalles del domicilio"/>
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