<?php include_once 'autoload.php'; $converter = new Converter(); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Converter</title>

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com.br/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com.br/docs/4.0/examples/album/album.css" rel="stylesheet">

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>
    <script>
        $('.telefone').mask('(00) 0 0000-0000');
        $('.dinheiro').mask('#.##0,00', {reverse: true});
        $('.estado').mask('AA');
    </script>
</head>

<body>

<header>
    <div class="collapse bg-dark" id="navbarHeader">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-md-7 py-4">
                    <h4 class="text-white">Converter</h4>
                    <p class="text-muted">Converta valores numéricos para o modo de escrita</p>
                </div>
            </div>
        </div>
    </div>
    <div class="navbar navbar-dark bg-dark box-shadow">
        <div class="container d-flex justify-content-between">
            <a href="#" class="navbar-brand d-flex align-items-center">
                <strong>Converter</strong>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </div>
</header>

<main role="main">

    <section class="jumbotron text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-2">
                    <h1 class="jumbotron-heading">Converter número</h1>
                    <p class="lead text-muted"></p>

                    <form action="index.php" method="post">
                        <label for="firstName">Informe o valor</label>
                        <input name="valor" type="text" class="form-control" id="dinheiro" placeholder="" value="" required>
                        <br>
                        <button class="btn btn-primary my-2 btn-block" type="submit" name="converter">
                            <i class="fa fa-refresh"></i> Converter
                        </button>
                    </form>
                </div>
            </div>

            <?php
            if(isset($_POST['converter']))
            {
                if(empty($_POST['valor']))
                {
                    echo '<div class="col-md-8 offset-2"><div class="alert alert-danger">o valor primeiro</div></div>';
                }

                else
                {
                    $valor = $_POST['valor'];

                    $format_valor = str_replace('.', '', $valor);
                    $format_valor = str_replace('.', '', $format_valor);
                    $format_valor = str_replace(',', '.', $format_valor);

                    $dim = $converter->extenso($format_valor);
                    $format_valor = number_format($format_valor, 2, ",", ".");

                    echo "<font size='5'>R$ ".$valor." = ".$dim."</font>";
                }
            }
            ?>

        </div>
    </section>

</main>

<footer class="text-muted fixed-bottom">
    <div class="container">
        <p>
            <a href="https://www.anerao.com.br" target="_blank">Antonio Anerão</a>
        </p>
    </div>
</footer>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="https://getbootstrap.com.br/assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
<script src="https://getbootstrap.com.br/assets/js/vendor/popper.min.js"></script>
<script src="https://getbootstrap.com.br/dist/js/bootstrap.min.js"></script>
<script src="https://getbootstrap.com.br/assets/js/vendor/holder.min.js"></script>
</body>
</html>
