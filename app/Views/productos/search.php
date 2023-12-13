<!DOCTYPE html>
<html lang="en">

<?= $this->extend('layouts/base_layout');
?>

<?= $this->section('content')?> 


<body>
  <div class="card-header">
    <h2 class="card-title">Resultados de la busqueda</h2>
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
        <h6>No hay publicaciones que coincidan con tu búsqueda</h6><br>
        <ul>
            <li>Revisa la ortografía de la palabra.</li>
            <li>Utiliza palabras más genéricas o menos palabras.</li>
        </ul>
    <?php endif ?>
  </div>

</body>


<?= $this->endSection() ?>