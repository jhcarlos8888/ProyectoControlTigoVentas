<!DOCTYPE html>
<html lang="es">
<head>

    <title>404 | No Existe la Pagina</title>
    <link rel="shortcut icon" href="<?php assets("img/icon-dev.svg")?>" type="image/svg+xml">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <style type="text/css">
        body {
            padding: 30px 20px;
            font-family: -apple-system, BlinkMacSystemFont,
            "Segoe UI", "Roboto", "Oxygen", "Ubuntu", "Cantarell",
            "Fira Sans", "Droid Sans", "Helvetica Neue", sans-serif;
            color: #ffffff;
            line-height: 1.6;
            background-image: url("<?php assets("img/")?>");
            background-color: #007bff;
            background-position: center center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
        }

        h1 {
            margin: 0 0 40px;
            font-size: 60px;
            line-height: 1;
            color: #3a3a3a;
            font-weight: 600;
            text-shadow: 2px 2px #666762;
        }

        h2 {
            margin: 50px 0 0;
            font-size: 2rem;
            font-weight: 600;
            letter-spacing: 0.1em;
            color: #ffffff;
            text-transform: capitalize;
        }

        p {
            font-size: 18px;
            margin: 1em 0;
            text-align: justify;
        }

        .go-back a {
            display: inline-block;
            margin-top: 3em;
            padding: 10px;
            color: #2e2d2d;
            font-weight: 700;
            border: solid 2px #c3c0c0;
            text-decoration: none;
            font-size: 16px;
            text-transform: uppercase;
            letter-spacing: 0.1em;
        }

        .go-back a:hover {
            border-color: #3e3e3e;
        }

        @media screen and (min-width: 768px) {
            body {
                padding: 40px;
            }
        }

        @media screen and (max-width: 480px) {
            h1 {
                font-size: 48px;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <a href="<?php url("") ?>" class="brand">
        <img src="<?php assets("img/logo_project_control_max.png") ?>" width="120"
             height="100" alt=""></a>

    <h2>Error 404</h2>
    <h1>Página No Encontrada</h1>

    <p>Lo sentimos, pero parece que no podemos encontrar la página que estaba buscando. Por lo general, esto ocurre
        debido a que se eliminó una página que existía anteriormente o si ingresó mal la dirección.</p>

    <span class="go-back"><a href="<?php url("") ?>">Regresar al Inicio</a></span>
</div>

</body>
</html>