<!DOCTYPE html>
<html lang="es">
<style {csp-style-nonce}>
.header {
  overflow: hidden;
  background-color: #FFF159;
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
  background-color: #FFF150;
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

.grid-container {
      display: grid;
      row-gap: 10px;
      grid-template-columns: auto auto auto auto;
      background-color: #F5F5F5;
      padding: 10px;
      

    }

    .grid-item {
      background-color: #FFFFFF;
      border: 10px solid #F5F5F5;
      padding: 20px;
      
      text-align: center;
      height: 450px;

      position: relative;
    }
    .img_card{
      position: absolute;
    top: 20px;

    left: 60px;
    right: 60px;
    }
    .name_card{
      position: absolute;
    top: 250px;
    text-align: left;
    left: 30px;
    right: 30px;
    color: black;
   } 
   .original_price_card{
      position: absolute;
    bottom: 80px;
    left: 30px;
    color: black;
    }
    .price_card{
      position: absolute;
    bottom: 45px;
    left: 30px;
    color: black;
    }
    .discount_card{
      position: absolute;
    bottom: 10px;
    left: 30px;
    color: black;
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
<header class="header">
  <a href="/" class="logo">Mercado Libre</a>
  <div class="header-right">

  <a>
    <form action="<?= base_url('productos/search')?>">
      <input id= "search_query" type="search" method = "get" placeholder = "Buscar productos" name="buscar">
      <button type="submit">Buscar</button>
    </form>
    </a>
<!--
    <a href="<?= base_url('usuarios')?>">Usuarios</a>


    <a href="<?= base_url('usuarios/new')?>">Creá tu cuenta</a>
    <a href="<?= base_url('usuarios/login')?>">Ingresá</a>


    <a href="<?= base_url('productos/new')?>">Vender</a>

    <a href="<?= base_url('historial')?>">Mis Compras</a>
    
    <a href="<?= base_url('carrito')?>">Carrito</a>

  -->
  <?php 
        if ( $_SESSION['Usuario'] != 0 ){
          ?>
            <a href="<?= base_url('usuarios')?>"><?php echo '<h5> <FONT COLOR="black"> Perfil</FONT></h5>'?></a>
            <a href="<?= base_url('productos/new')?>"><?php echo '<h5> <FONT COLOR="black"> Vender</FONT></h5>'?></a>
            <a href="<?= base_url('compras')?>"><?php echo '<h5> <FONT COLOR="black"> Mis Compras</FONT></h5>'?></a>
            <a href="<?= base_url('carrito')?>"><?php echo '<h5> <FONT COLOR="black"> Carrito</FONT></h5>'?></a>
            <a href="<?= base_url('ventas/domicilio/'.$_SESSION['Usuario'])?>"><?php echo '<h5> <FONT COLOR="black"> Pagar</FONT></h5>'?></a>
            <br>
          <?php 
        }else {
          ?>
            <a href="<?= base_url('usuarios/login')?>">Perfil</a>
            <a href="<?= base_url('usuarios/new')?>">Creá tu cuenta</a>
            <a href="<?= base_url('usuarios/login')?>">Ingresá</a>
            <a href="<?= base_url('usuarios/login')?>">Vender</a>
            <a href="<?= base_url('usuarios/login')?>">Mis Compras</a>
            <a href="<?= base_url('usuarios/login')?>">Carrito</a>
            <a>Pagar</a>
          <?php 

        }
      ?>

  </div>
</header>
<?php /*if ($_SESSION['Usuario'] <> 0){
    echo '<div style="position: absolute;top:  2px;left: 890px;"><big><FONT COLOR="red"> Usuario:  '.$_SESSION['Nombre'].'</FONT></big></div>';
} */?>
    <head>
        <meta charset = "UTF-8">
        <meta http-equiv = "X-UA-Compatible" content = "IE-Edge">
        <meta name = "viewport" content = "width=device-width, initial-scale = 1.0">
        <title>Mercado Libre (PRUEBA) | <?= $this->renderSection('title')?></title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
    </head>

    <body>
        <div class = "container-fluid py-4">
            <?= $this->renderSection('content')?>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
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