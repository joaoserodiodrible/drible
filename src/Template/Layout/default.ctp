<!doctype html>
<html lang="en">
<head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="generator" content="Jekyll v3.6.0">
      <meta name="robots" content="noindex,nofollow">

      <title>Drible &middot; Página de Introdução e Trabalho</title>

      <!-- Bootstrap core CSS -->

      <link href="/css/bootstrap.min.css" rel="stylesheet">

      <!-- Documentation extras -->

      <link href="/css/docs.min.css" rel="stylesheet">
      <link href="/css/drible.css" rel="stylesheet">

      <!-- Favicons -->
      <link rel="apple-touch-icon" href="/img/favicons/apple-touch-icon.png" sizes="180x180">
      <link rel="icon" href="/img/favicons/favicon-32x32.png" sizes="32x32" type="img/png">
      <link rel="icon" href="/img/favicons/favicon-16x16.png" sizes="16x16" type="img/png">
      <link rel="manifest" href="#">
      <link rel="mask-icon" href="#" color="#000">
      <link rel="icon" href="#">
      <meta name="msapplication-config" content="#">
      <meta name="theme-color" content="#000">


      <!-- Meta -->
      <meta name="description" content="Drible - Página de Introdução e Trabalho">
      <meta name="author" content="Drible">

      <!-- Twitter -->
      <meta name="twitter:site" content="@getbootstrap">
      <meta name="twitter:creator" content="@getbootstrap">


      <meta name="twitter:card" content="summary_large_image">
      <meta name="twitter:title" content="Drible">
      <meta name="twitter:description" content="Drible - Página de Introdução e Trabalho">
      <meta name="twitter:image" content="https://getbootstrap.com/assets/brand/bootstrap-social.png">


      <!-- Facebook -->

      <meta property="og:url" content="https://getbootstrap.com">
      <meta property="og:title" content="Drible">
      <meta property="og:description" content="Drible - Página de Introdução e Trabalho">

      <meta property="og:image" content="http://getbootstrap.com/assets/brand/bootstrap-social.png">
      <meta property="og:image:secure_url" content="https://getbootstrap.com/assets/brand/bootstrap-social.png">
      <meta property="og:image:type" content="image/png">
      <meta property="og:image:width" content="1200">
      <meta property="og:image:height" content="630">




</head>
<body>
      <nav class="navbar navbar-expand-lg navbar-dark">
            <a class="navbar-brand mr-0 mr-md-2" href="/">
                  <img src="/img/drible_logo.png">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse"  id="navbarNavDropdown">
                  <ul class="navbar-nav">
                        <li class="nav-item">
                              <a class="nav-link active" href="/">Início</a>
                        </li>
                        <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Estagiários</a>
                              <div class="dropdown-menu" aria-labelledby="dropdown01">
                                    <a class="dropdown-item" href="/estagiarios/home">Início</a>
                                    <a class="dropdown-item" href="/estagiarios/web">Estagiários de Web</a>
                                    <a class="dropdown-item" href="/estagiarios/design">Estagiários de Design</a>
                                    <a class="dropdown-item" href="/estagiarios/marketingdigital">Estagiários de Marketing Digital</a>
                                    <a class="dropdown-item" href="/estagiarios/lastday">Último Dia</a>
                              </div>
                        </li>
                        <li class="nav-item">
                              <a class="nav-link " href="/design/home">Design</a>
                        </li>
                        <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle" href="#" id="dropdown02" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Web</a>
                              <div class="dropdown-menu" aria-labelledby="dropdown02">
                                    <a class="dropdown-item" href="/web/home">Início</a>
                                    <a class="dropdown-item" href="/web/scripts">Scripts</a>
                                    <a class="dropdown-item" href="/web/processos">Processos</a>
                                    <a class="dropdown-item" href="/web/twig">Frontend</a>
                              </div>
                        </li>
                        <li class="nav-item">
                              <a class="nav-link " href="/marketing">Marketing Digital</a>
                        </li>
                  </ul>
            </div>
      </nav>

      <?= $this->fetch('content') ?>

      <footer class="bd-footer text-muted">
            <div class="container-fluid p-3 p-md-5">
                  <ul class="bd-footer-links">
                        <li><a href="/estagiarios/home">Estagiários</a></li>
                        <li><a href="/design/home">Design</a></li>
                        <li><a href="/web/home">Web</a></li>
                        <li><a href="/marketingdigital/home">Marketing Digital</a></li>
                  </ul>
                  <p>Empresa: <a href="https://www.drible.pt/" target="_blank" rel="noopener">Drible</a></p>
            </div>
      </footer>

      <script src="/js/vendor/jquery-slim.min.js"></script>
      <script src="/js/vendor/popper.min.js"></script>
      <script src="/js/bootstrap.min.js"></script>

</body>
</html>
