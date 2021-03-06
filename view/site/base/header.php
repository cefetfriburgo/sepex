<!DOCTYPE html>
<html lang="pt">
<head>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-143511127-2"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-143511127-2');
    </script>

    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="author" content="ColorLib">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <title><?php echo $titulo; ?> • CEFET-RJ campus Nova Friburgo</title>
    <link href="../../public/assets/css/bootstrap.min.css" rel="stylesheet">

    <link href="../../public/assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="../../public/assets/css/et-line.css" rel="stylesheet">
    <link href="../../public/assets/css/ionicons.min.css" rel="stylesheet">
    <link href="../../public/assets/css/owl.carousel.min.css" rel="stylesheet">
    <link href="../../public/assets/css/owl.theme.default.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../public/assets/css/animate.min.css">
    <link href="../../public/assets/css/main.css" rel="stylesheet">
</head>
<body>
<div class="loader">
    <div class="loader-outter"></div>
    <div class="loader-inner"></div>
</div>

<header class="header navbar fixed-top navbar-expand-md sticky_header">
    <div class="container">
        <a class="navbar-brand logo" href="#">
            <img src="../../public/images/logo.png" alt="Evento"/>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#headernav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="lnr lnr-text-align-right"></span>
        </button>
        <div class="collapse navbar-collapse flex-sm-row-reverse" id="headernav">
            <ul class=" nav navbar-nav menu">
                <li class="nav-item">
                    <a class="nav-link active" href="/#home">Início</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="/#atividade">Atividades</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="/relatorio">Minhas Inscrições</a>
                </li>
            </ul>
        </div>
    </div>
</header>