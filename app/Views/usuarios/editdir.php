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
                    <form action = "<?=base_url('usuarios/editdir/'.$direccion_clientes['id_direccioncliente']) ?>" method = "POST"> 
                        <?=csrf_field() ?>
                        <input type = "hidden" name = "_method" value = "PUT">
                        <div class = "row">
                            <div class = "col-sm-12">
                                <div class = "card shadow">
                                    <div class = "card-body">
                                        <h5 class = "card-title">Editar datos del  usuario</h5>
                                        <div class = "form-group mb-3">
                                            <label class = "form-label">ID de la dirección del usuario</label>
                                            <input type = "text" class = "form-control" name = "id_direccioncliente" placeholder = "
                                            Ingrese el ID de la dirección del usuario<" value = "<?php if($direccion_clientes['id_direccioncliente']): echo $direccion_clientes['id_direccioncliente']; else: sett_value('id_direccioncliente'); endif;?>" readonly/>
                                        </div>
                                        <div class = "form-group mb-3">
                                            <label class = "form-label">id del usuario</label>
                                            <input type = "text" class = "form-control" name = "id_usuario" placeholder = "
                                            Ingrese el id del usuario" value = "<?php if($direccion_clientes['id_usuario']): echo $direccion_clientes['id_usuario']; else: sett_value('id_usuario'); endif;?>" readonly/>
                                        </div>
                                        <div class = "form-group mb-3">
                                            <label class = "form-label">Calle</label>
                                            <input type = "text" class = "form-control" name = "calle" placeholder = "
                                            Ingrese la Calle" value = "<?php if($direccion_clientes['calle']): echo $direccion_clientes['calle']; else: sett_value('calle'); endif;?>"/>
                                        </div>
                                        <div class = "form-group mb-3">
                                            <label class = "form-label">Número</label>
                                            <input type = "text" class = "form-control" name = "numero" placeholder = "
                                            Ingrese el Número" value = "<?php if($direccion_clientes['numero']): echo $direccion_clientes['numero']; else: sett_value('numero'); endif;?>"/>
                                        </div>
                                        <div class = "form-group mb-3">
                                            <label class = "form-label">Colonia</label>
                                            <input type = "text" class = "form-control" name = "colonia" placeholder = "
                                            Ingrese la Colonia" value = "<?php if($direccion_clientes['colonia']): echo $direccion_clientes['colonia']; else: sett_value('colonia'); endif;?>"/>
                                        </div>
                                        <div class = "form-group mb-3">
                                            <label class = "form-label">Estado</label>
                                            <input type = "text" class = "form-control" name = "estado" placeholder = "
                                            Ingrese el Estado" value = "<?php if($direccion_clientes['estado']): echo $direccion_clientes['estado']; else: sett_value('estado'); endif;?>"/>
                                        </div>
                                        <div class = "form-group mb-3">
                                            <label class = "form-label">País</label>
                                            <input type = "text" class = "form-control" name = "pais" placeholder = "
                                            Ingrese el País " value = "<?php if($direccion_clientes['pais']): echo $direccion_clientes['pais']; else: sett_value('pais'); endif;?>"/>
                                        </div>
                                        <div class = "form-group mb-3">
                                            <label class = "form-label">CP</label>
                                            <input type = "text" class = "form-control" name = "CP" placeholder = "
                                            Ingrese el Codigo Póstal" value = "<?php if($direccion_clientes['CP']): echo $direccion_clientes['CP']; else: sett_value('CP'); endif;?>"/>
                                        </div>
                                        <div class = "form-group mb-3">
                                            <label class = "form-label">Teléfono</label>
                                            <input type = "text" class = "form-control" name = "telefono" placeholder = "
                                            Ingrese el Teléfono" value = "<?php if($direccion_clientes['telefono']): echo $direccion_clientes['telefono']; else: sett_value('telefono'); endif;?>"/>
                                        </div>
                                        <div class = "form-group mb-3">
                                            <label class = "form-label">Detalles del domicilio</label>
                                            <input type = "text" class = "form-control" name = "detalles_domicilio" placeholder = "
                                            Ingrese los Detalles del domicilio" value = "<?php if($direccion_clientes['detalles_domicilio']): echo $direccion_clientes['detalles_domicilio']; else: sett_value('detalles_domicilio'); endif;?>"/>
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