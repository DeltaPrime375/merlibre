<?= $this->extend('layouts/base_layout');
$this->section('title')?> Detalles del usuario <?= $this->endSection()?>

<?= $this->section('content')?> 

    <div class = "container">
        <div class = "row py-4">
            <div class = "col-x1-12 text-end">
                <a href = "<?= base_url('/')?>" class = "btn btn-primary">Regresar a Pagina de inicio</a>
            </div>
        </div>    

        <div class = "row">
            <div class = "col-xl-6 m-auto">
                <div class = "col-sm-12">
                    <div class = "card shadow">
                        <div class = "card-body">
                                <h5 class = "card-title">Informacion general del usuario</h5>
                                <div class = "form-group mb-3">
                                    <label class = "form-label">ID del usuario</label>
                                    <input type = "text" class = "form-control" disabled placeholder = "ID del usuario" value = "<?php echo trim($usuario['id_usuario'])?>"/>
                                </div>
                                <div class = "form-group mb-3">
                                    <label class = "form-label">Nombre del usuario</label>
                                    <input type = "text" class = "form-control" disabled placeholder = "Nombre del usuario" value = "<?php echo trim($usuario['nombre_usuario'])?>"/>
                                </div>
                                <div class = "form-group mb-3">
                                    <label class = "form-label">Apellido paterno</label>
                                    <input type = "text" class = "form-control" disabled placeholder = "Apellido paterno" value = "<?php echo trim($usuario['apellido_paterno'])?>"/>
                                </div>
                                <div class = "form-group mb-3">
                                    <label class = "form-label">Apellido materno</label>
                                    <input type = "text" class = "form-control" disabled placeholder = "Apellido materno" value = "<?php echo trim($usuario['apellido_materno'])?>"/>
                                </div>
                                <div class = "form-group mb-3">
                                    <label class = "form-label">Apodo de usuario</label>
                                    <input type = "text" class = "form-control" disabled placeholder = "Apodo de usuario" value = "<?php echo trim($usuario['apodo_usuario'])?>"/>
                                </div>
                                <div class = "form-group mb-3">
                                    <label class = "form-label">Correo electronico</label>
                                    <input type = "text" class = "form-control" disabled placeholder = "Correo electronico" value = "<?php echo trim($usuario['correo_electronico'])?>"/>
                                </div>
                                <div class = "form-group mb-3">
                                    <label class = "form-label">Telefono</label>
                                    <input type = "text" class = "form-control" disabled placeholder = "Telefono" value = "<?php echo trim($usuario['telefono'])?>"/>
                                </div>
                                <div class = "form-group mb-3">
                                    <label class = "form-label">RFC</label>
                                    <input type = "text" class = "form-control" disabled placeholder = "RFC" value = "<?php echo trim($usuario['RFC'])?>"/>
                                </div>


                                            <a href = "<?= base_url('usuarios/edit/'.$usuario['id_usuario'])?>" class = "btn btn-sm btn-success mx-1" title = "Editar"><i class = "bi bi-pencil-square"></i></a>
                                            
                                            <form class = "display-none" method = "post" action = "<?=base_url('usuarios/'.$usuario['id_usuario']) ?>" 
                                        id = "deleteUsuario<?=$usuario['id_usuario']?>">
                                        <input type = "hidden" name = "_method" value = "DELETE"/>
                                            <a href = "javascript:void(0)" onclick = "deleteUsuario('deleteUsuario<?=$usuario['id_usuario']?>')" 
                                            class="btn btn-sm btn-danger" title="Eliminar"><i class="bi bi-trash"></i></a>
                                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function deleteUsuario(formId){
            let confirm = window.confirm('¿Está seguro que desea eliminar este usuario?');
            if(confirm){
                document.getElementById(formId).submit();
            }
        }
    </script>


<?= $this->endSection() ?>