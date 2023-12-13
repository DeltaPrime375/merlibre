<?= $this->extend('layouts/base_layout');

$this->section('title')?> Listado de Productos <?= $this->endSection()?>

<?= $this->section('content'); ?> 


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

            <body>
  <div class="card-header">
    <h2 class="card-title">Ultimos Productos</h2>
  </div>

  <div class="grid-container">
    <?php
    if (count($productos) > 0):
    foreach ($productos as $producto): ?>

      <div class="grid-item">
        <a href = "<?= base_url('productos/' . $producto['id_producto']) ?>">
              
            <figure class="img_card">
              <img width="140" height= "50%" src=<?php echo trim($producto['imagen']) ?> alt="..." />
            </figure>

              <?php if ($producto['descuento'] > 0): ?>
                <p ><h7 class="original_price_card text-decoration-line-through">
                  <?= "$",$producto['precio_producto'] ?></h7>
                </p>

                <p ><h4 class="price_card">
                  $<?php echo round (trim((($producto['precio_producto'])/100)*(100-($producto['descuento']))), 2)?></h4>
                </p>
              <?php else: ?>
                <p ><h4 class="price_card">
                  <?= "$",$producto['precio_producto'] ?></h4>
                </p>
              <?php endif?>
                <p class="discount_card">
                  <?php if ($producto['descuento'] > 0) {
                    echo trim($producto['descuento']), "% de descuento";
                  } ?>
                </p>

                <p class="name_card">
                  <?= $producto['nombre_producto'] ?>
                </p>
        </a>
      </div>
      
    <?php endforeach;
    else:?>
      <h6 class="text-danger text-center">No se encontraron productos</h6>
    <?php endif ?>
  </div>

</body>


<?= $this->endSection() ?>