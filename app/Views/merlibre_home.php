
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Mercado Libre (PRUEBA)</title>
  <meta name="description" content="Compra todo lo que buscas por Mercado Libre">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" type="image/png" href="/favicon.ico">

<style {csp-style-nonce}>
.header {
  overflow: hidden;
  background-color: #FFF24F;
  padding: 20px 10px;
}
.header a {
  float: left;
  color: black;
  text-align: center;
  padding: 12px;
  text-decoration: none;
  font-size: 18px;
  line-height: 25px;
  border-radius: 4px;
}

.header a.logo {
  font-size: 25px;
  font-weight: bold;
}


.header a:hover {
  background-color: yellow;
  color: black;
}

.header-right {
  float: right;
}
html, body {
  color: rgba(33, 37, 41, 1);
  font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji";
  font-size: 16px;
  margin: 0;
  padding: 0;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-rendering: optimizeLegibility;
}

footer {
  background-color: rgba(221, 72, 20, .8);
  text-align: center;
}
footer .environment {
  color: rgba(255, 255, 255, 1);
  padding: 2rem 1.75rem;
}
footer .copyrights {
  background-color: rgba(62, 62, 62, 1);
  color: rgba(200, 200, 200, 1);
  padding: .25rem 1.75rem;
}
table, td, th {  
  border: 1px solid #ddd;
  text-align: left;
}

table {
  border-collapse: collapse;
  width: 100%;
}
th, td {
  padding: 15px;
  text-align: left;
}
@media screen and (max-width: 500px) {
  .header a {
    float: none;
    display: block;
    text-align: left;
  }
  .header-right {
    float: none;
  }
  
}
</style>
</head>
<header class="header">
  <a href="/" class="logo">Mercado Libre</a>
  <div class="header-right">
    <a href="<?= base_url('usuarios')?>">Usuarios</a>
    <a href="<?= base_url('usuarios/new')?>">Creá tu cuenta</a>
    <a href="<?= base_url('usuarios/login')?>">Ingresá</a>
    <a href="<?= base_url('productos/new')?>">Vender</a>
    <a href="<?= base_url('historial')?>">Mis Compras</a>
    <a href="<?= base_url('carrito')?>">Carrito</a>
  </div>
</header>
<body>
  
  <table>
    <div class = "card-header">
      <h2 class = "card-title">Ultimos Productos</h2>
    </div>

    <tbody>
      <?php
      if(count($productos) > 0):
        foreach($productos as $producto): ?>
        <tr>
          <td><img width="150" 
             src=<?php echo trim($producto['imagen'])?> alt="..." /></td>
          <td><?= $producto['nombre_producto']?></td>
          <td><?= $producto['precio_producto']?></td>
          <td><?= $producto['descuento']?>%</td>


          <td class = "d-flex">
              <button><a href = "<?= base_url('productos/'.$producto['id_producto'])?>" class = "btn btn-sm 
              btn-info mx-1" title = "Mostrar">Info</a></button>
          </td>
        </tr>
      <?php endforeach;
      else: ?>
        <tr rowspan="1">
            <tr colspan = "4">
                <h6 class = "text-danger text-center">No se encontraron productos</h6>
            </tr>
        </tr>
      <?php endif ?>
    </tbody>
  </table>
  <div></div>
</body>

<footer>

    <div class="copyrights">

      <p>Este pagina es un proyecto realizado por estudiantes de la Licenciatura en Informatica 
      de la Facultad de Informatica Culiacan de la Universidad Autonoma de Sinaloa para la asignatura de
      Taller Integrador de Especialización, con el proposito de emular el funcionamiento de la plataforma 
      de Mercado Libre y realizada sin fines de lucro</p>

    </div>

</footer>



</html>
