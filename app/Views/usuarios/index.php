<?= $this->extend('layouts/base_layout');

$this->section('title')?> Listado de Usuarios <?= $this->endSection()?>

<?= $this->section('content'); ?> 

    <div class = "row py-2">
        <div class = "col-x1-12">
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
                    <h5 class = "card-title">Usuarios</h5>
                </div>
                <div class="card-body">
                    <table class ="table table-striped">
                        <theah>
                            <tr>
                                <th>Nombre Usuario</th>
                                <th>Apodo Usuario</th>

                                <th>Accion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if(count($usuarios) > 0):
                                    foreach($usuarios as $usuario): ?>
                                    <tr>
                                        <td><?= $usuario['nombre_usuario']?></td>
                                        <td><?= $usuario['apodo_usuario']?></td>


                                        <td class = "d-flex">
                                            <a href = "<?= base_url('usuarios/'.$usuario['id_usuario'])?>" class = "btn btn-sm btn-info mx-1" title = "Mostrar"><i class = "bi bi-info-square"></i></a>
                                            
                                            <a href = "<?= base_url('usuarios/edit/'.$usuario['id_usuario'])?>" class = "btn btn-sm btn-success mx-1" title = "Editar"><i class = "bi bi-pencil-square"></i></a>
                                            
                                            <form class = "display-none" method = "post" action = "<?=base_url('usuarios/'.$usuario['id_usuario']) ?>" 
                                        id = "deleteUsuario<?=$usuario['id_usuario']?>">
                                        <input type = "hidden" name = "_method" value = "DELETE"/>
                                            <a href = "javascript:void(0)" onclick = "deleteUsuario('deleteUsuario<?=$usuario['id_usuario']?>')" 
                                            class="btn btn-sm btn-danger" title="Eliminar"><i class="bi bi-trash"></i></a>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach;
                                    else: ?>
                                    <tr rowspan="1">
                                        <tr colspan = "4">
                                            <h6 class = "text-danger text-center">No hay usuario registrados</h6>
                                        </tr>
                                    </tr>
                                <?php endif ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        function deleteUsuario(formId){
            let confirm = window.confirm('¿Está seguro que desea eliminar este usuario');
            if(confirm){
                document.getElementById(formId).submit();
            }
        }
    </script>

<?= $this->endSection() ?>