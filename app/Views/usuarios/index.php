<?= $this->extend('layouts/base_layout');

$this->section('title')?> Listado de usuarios <?= $this->endSection()?>

<?= $this->section('content'); ?> 
<!--
    <div class = "container">
        <div class = "row py-4">
            <div class = "col-xl-12 text-end">
                <a href = "<?= base_url('usuarios/new')?>" class = "btn btn-primary">Nuevo Usuario</a>
            </div>
        </div>
    </div>
-->
    <div class = "row py-2">
        <div class = "col-xl-12">
            <?php 
            if(session()->getFlashdata('success')): ?>
                <div class = "alert alert-success alert-dismissible">
                    <button type = "button" class = "btn-close" data-bs-dismiss = "alert">&times;</button>
                    <?php echo session()->getFlashdata('success') ?>
                </div>
            <?php elseif(session()->getFlashdata('failed')): ?>
                <div class = "alert alert-danger alert-dismissible">
                    <button type = "button" class = "btn-close" data-bs-dismiss = "alert">&times;</button>
                    <?php echo session()->getFlashdata('failed') ?>
                </div>
            <?php endif; ?>
            <div class = "card">
                <div class = "card-header">
                    <h5 class = "card-title">Perfil</h5>
                </div>
                <div class="card-body">
                    <table class ="table table-striped">
                        <thead>
                            <tr>
                                <th>Id Usuario </th>
                                <th>Nombre Usuario</th>
                                <th>Apellido Paterno</th>
                                <th>Apellido Materno</th>
                                <th>Apodo Usuario</th>
                                <th>Correo Electrónico</th>
                                <th>Teléfono</th>
                                <th>RFC</th>
                                <th>Contraseña</th>
                                <th>Accion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if(count($usuarios) > 0):
                                    foreach($usuarios as $usuario): ?>
                                    <tr>
                                        <td><?= $usuario->id_usuario?></td>
                                        <td><?= $usuario->nombre_usuario ?></td>
                                        <td><?= $usuario->apellido_paterno?></td>
                                        <td><?= $usuario->apellido_materno?></td>
                                        <td><?= $usuario->apodo_usuario ?></td>
                                        <td><?= $usuario->correo_electronico?></td>
                                        <td><?= $usuario->telefono?></td>
                                        <td><?= $usuario->RFC?></td>
                                        <td><?= $usuario->contrasena?></td>
                                        <td class="d-flex">
                                        <a href="<?= base_url('usuarios/newdir/'.$usuario->id_usuario)?>" class="btn btn-warning" title="Agregar Domicilio"><i class="bi bi-pin-map-fill"></i></a>
                                            <a href="<?= base_url('usuarios/'.$usuario->id_usuario)?>" class="btn btn-sm btn-info mx-1" title="Mostrar Información"><i class="bi bi-info-square"></i></a>
                                            <a href = "<?= base_url('usuarios/edit/'.$usuario->id_usuario)?>" class="btn btn-sm btn-success mx-1" title="Editar Información"><i class="bi bi-pencil-square"></i></a>
                                            <a href="<?= base_url('usuarios/showdir/'.$usuario->id_usuario)?>" class="btn btn-sm btn-info mx-1" title="Mostrar Domicilio"><i class="bi bi-info-circle-fill"></i></a>
                                            <a href = "<?= base_url('usuarios/editdir/'.$usuario->id_usuario)?>" class="btn btn-sm btn-success mx-1" title="Editar Domicilio"><i class="bi bi-pencil-fill"></i></a>
                                            <form class="display-none" method="post" action="<?=base_url('usuarios/'.$usuario->id_usuario) ?>" id="deleteUser<?=$usuario->id_usuario?>">
                                            <input type="hidden" name="_method" value="DELETE"/>
                                                <a href="javascript:void(0)" onclick="deleteUser('deleteUser<?=$usuario->id_usuario?>')" class="btn btn-sm btn-danger" title="Eliminar"><i class="bi bi-trash"></i></a>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php endforeach;
                                    else: ?>
                                    <tr rowspan="1">
                                        <td colspan = "4">
                                            <h6 class = "text-danger text-center">No se encontraron usuarios</h6>
                                        </td>
                                    </tr>
                                    <?php endif ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        function deleteUser(formId){
            let confirm = window.confirm('¿Esta seguro que desea eliminar este usuario');
            if(confirm){
                document.getElementById(formId).submit();
            }
        }
    </script>

<?= $this->endSection(); ?>