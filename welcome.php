<script>
function goBack() {
    window.history.back();
}
</script>
<?php
    session_start();
    require_once "config.php"; 
    if (empty($_SESSION["userid"])) {
        header("Location: login.php");
        exit;
    }
    
    $stmt = $pdo->prepare("SELECT name, email FROM users WHERE id = ?");
    $stmt->execute([$_SESSION["userid"]]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$user) {
        header("Location: login.php");
        exit;
    }
    $requiredRole = 'usuario'; // Definir el rol requerido para acceder a la página o función
    
    // Obtener el rol del usuario desde la sesión
    $userRole = $_SESSION['roles'][0];
    
    if ($userRole !== $requiredRole) {
        // Mostrar un mensaje de acceso denegado o redirigir a una página de error
        echo "<center>Acceso denegado. No tienes permisos suficientes para acceder a esta página.</center>";
        echo '<br><center><button onclick="goBack()">Volver</button></center>';
        exit;
    }
?>
<!doctype html>
<html lang="en" class="h-100">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="CarlosMNV">
    <meta name="generator" content="Hugo 0.104.2">
    <title>Bienvenido <?php echo $user['name']; ?></title>
    <link rel="icon" type="image/x-icon" href="https://raw.githubusercontent.com/CarloSMnv/imagess/main/icon.png" />

   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    

    

<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="cover.css" rel="stylesheet">
  </head>
  <body class="d-flex h-100 text-center text-bg-dark">
    
<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
  <header class="mb-auto">
    <div>
      <h3 class="float-md-start mb-0">TSWLOGIN</h3>
      <nav class="nav nav-masthead justify-content-center float-md-end">
        <a class="nav-link fw-bold py-1 px-0 active" aria-current="page" href="#">Inicio</a>
        <a class="nav-link fw-bold py-1 px-0" href="#">Consultas</a>
        <a href="cerrar-sesion.php" class="nav-link fw-bold py-1 px-0" role="button" aria-pressed="true">Cerrar sesión</a>
    
      </nav>
    </div>
  </header>

  <main class="px-3">
    <h1>Hola, <strong><?php echo $user['name']; ?></strong>. <br> Bienvenido a tu sitio </br></h1>
    <p class="lead">Revisa tus notificaciones</p>
    <p class="lead">
      <a href="#" class="btn btn-lg btn-secondary fw-bold border-white bg-white">AQUI</a>
    </p>
  </main>

  <footer class="mt-auto text-white-50">
    <p>Derechos reservados <a href="https://github.com/CarloSMnv" class="text-white">Carlos</a>, by <a href="https://github.com/CarloSMnv" class="text-white">CarlosMNV</a>.</p>
  </footer>
</div>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
  </body>
</html>
