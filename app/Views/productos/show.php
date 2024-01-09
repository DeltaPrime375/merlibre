

<?= $this->extend('layouts/base_layout');
$this->section('title')?> Detalles del producto <?= $this->endSection()?>

<?= $this->section('content')?> 

<style>
   .descripcion{
    text-align: justify;
   } 
</style>

<section class="py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">

                    <div class="col-md-6"><img img class="card-img-top" src=<?php echo trim($producto['imagen'])?> alt="..." /></div>
                    <div class="col-md-6">
                        <div class="small mb-1">ID: <?php echo trim($producto['id_producto'])?></div>
                        <div class="mb-1"><?php echo trim($producto['nuevo_usado'])?></div>
                        <h1 class="display-5 fw-bolder"><?php echo trim($producto['nombre_producto'])?></h1>
                        <div class="fs-5 mb-5">
                            
                            <span class="text-decoration-line-through">
                                <?php if($producto['descuento']>0){
                                    echo "$",($producto['precio_producto']);
                                }?>
                            </span>
                            <h1>
                                $<?php echo round (trim((($producto['precio_producto'])/100)*(100-($producto['descuento']))), 2)?>
                            </h1>
                            <span >
                                <?php if ($producto['descuento']>0){
                                    echo trim($producto['descuento']),"% de descuento";
                                }
                                ?>
                            </span>
                        </div>
                        
                        <div >


                            <?php if ( $_SESSION['Usuario'] == $producto['id_proveedor'] ){ ?>
                            <a href = "<?= base_url('productos/edit/'.$producto['id_producto'])?>" class = "btn btn-sm btn-success mx-1" title = "Editar">Editar Producto<i class = "bi bi-pencil-square"></i></a>
                                            
                            <form class = "display-none" method = "post" action = "<?=base_url('productos/'.$producto['id_producto']) ?>" 
                            id = "deleteProducto<?=$producto['id_producto']?>">
                                <input type = "hidden" name = "_method" value = "DELETE">
                                <a href = "javascript:void(0)" onclick = "deleteProducto('deleteProducto<?=$producto['id_producto']?>')" 
                                class="btn btn-sm btn-danger" title="Eliminar">Eliminar Producto<i class="bi bi-trash"></i></a>
                            </form>
                        <?php }else {?>   
                        <?php if(($producto['existencia']) >= 1): ?>
                            <span>
                                <?php if(($producto['existencia']) == 1): ?>
                                    <div class="small mb-1">¡Último disponible!</div>
                                <?php else: ?>
                                    <div><input class="form-control text-center me-3" id="inputQuantity" type="num" value="1" style="max-width: 3rem" /></div>
                                    <div class="small mb-1"><?php echo trim ($producto['existencia'])?> disponibles</div>
                                    
                                <?php endif?> 
                            </span>
                                
                                    <button class="btn btn-primary" type="button">
                                        Comprar ahora
                                    </button>


                                    <button class="btn btn-secondary" type="button">
                                    <i class="bi-cart-fill me-1"></i>
                                        Agregar al carrito
                                    </button>
                                    
                                
                            <?php else: ?>
                                <div class="small mb-1">Este producto no está disponible por el momento</div>
                            <?php endif?> 
                        <?php } ?>
                        </div>

                        

                                        

                        <br><div class="small">Se entrega en <?php echo trim($producto['tiempo_surtido'])?> dias</div>
                        <div class="small">Marca: <?php echo trim($producto['marca'])?></div>

                        <div class="small">Vendido por: <?php 
                        $db = new mysqli("localhost","root","","merlibre");


                        $query = ("SELECT usuarios.apodo_usuario FROM usuarios where id_usuario =".$producto['id_proveedor']);
                        $query2 = ("SELECT usuarios.nombre_usuario FROM usuarios where id_usuario =".$producto['id_proveedor']);

                        $result = mysqli_query($db, $query);
                        $result2 = mysqli_query($db, $query2);
                        
                        while($row = mysqli_fetch_array($result)) {
                            if ($row['apodo_usuario'] == null){
                                while($row = mysqli_fetch_array($result2)) {
                                        echo $row['nombre_usuario']; 
                                }
                            }else
                                echo $row['apodo_usuario']; 
                        }


                        ?></div><br>

                        <p class="lead descripcion"><?php echo trim($producto['descripcion_general'])?></p>
                        
 
    
                    </div>

                </div>
            </div>
        </section>

        <script>
        function deleteProducto(formId){
            let confirm = window.confirm('¿Está seguro que desea eliminar este producto');
            if(confirm){
                document.getElementById(formId).submit();
            }
        }
    </script>
<?= $this->endSection() ?>