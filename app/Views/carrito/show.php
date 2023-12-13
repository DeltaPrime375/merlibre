<?= $this->extend('layouts/base_layout') ?>
<?= $this->section('title') ?>Detalles del producto<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <section class="py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="row gx-4 gx-lg-5 align-items-center">
                <div class="col-md-6"><img img class="card-img-top" src="<?php echo trim($producto['imagen']) ?>" alt="..." /></div>
                <div class="col-md-6">
                    <div class="small mb-1"><?php echo trim($producto['nuevo_usado']) ?></div>
                    <h1 class="display-5 fw-bolder"><?php echo trim($producto['nombre_producto']) ?></h1>
                    <div class="fs-5 mb-5">
                        <span class="text-decoration-line-through">
                            <?php if ($producto['descuento'] > 0) {
                                echo "$", ($producto['precio_producto']);
                            } ?>
                        </span>
                        <h1>
                            $<?php echo round(trim((($producto['precio_producto']) / 100) * (100 - ($producto['descuento']))), 2) ?>
                        </h1>
                        <span>
                            <?php if ($producto['descuento'] > 0) {
                                echo trim($producto['descuento']), "% de descuento";
                            } ?>
                        </span>
                    </div>

                    <div class="d-flex">
                        <input class="form-control text-center me-3" id="inputQuantity" type="num" value="1" style="max-width: 3rem" />
                        <span>
                            <?php
                            if (($producto['existencia']) == 1) {
                                echo "¡Último disponible!";
                            } else {
                                echo trim($producto['existencia']), " disponibles";
                            } ?>
                        </span>
                    </div>

                    <button class="btn btn-primary" type="button">
                        Comprar ahora
                    </button>
                    <button class="btn btn-secondary" type="button">
                        <i class="bi-cart-fill me-1"></i>
                        Agregar al carrito
                    </button>
                    <div class="small mb-1">Vendido por: </div>
                    <p class="lead"><?php echo trim($producto['descripcion_general']) ?></p>
                </div>
            </div>
        </div>
    </section>
<?= $this->endSection() ?>