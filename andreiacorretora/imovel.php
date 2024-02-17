<?php



if(!empty($_GET['id'])) {
//    require_once("/home/igorroberto/Documentos/www/imobiliaria/config.php");
    require_once("config.php");


    $id = $_GET['id'];
    // print_r($id);
    $sqlSelect = "SELECT *  FROM imoveis WHERE id=$id";

    $result = mysqli_query($conexao, $sqlSelect);

}else
    header('Location: index.php');
?>

<!DOCTYPE html>
<html lang="pt-BR" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8" name="google" content="notranslate">
    <title>Corretora Andreia - Sua casa aqui</title>
    <link rel="icon" type="img/logoicone.png" href="img/logoicone.png"/>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/plus.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<!-- Topo preto-->
<div class="container-fluid" style="background-color:#272727; color: white">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-10 d-flex align-items-center">
                <a href="https://wa.me/5566992429525" style="font-size:80%; text-decoration: none;" class="bi bi-whatsapp text-white-50 bg-dark text-white"  target="_blank"> (66) 99242-9525</a>
                &nbsp&nbsp&nbsp
                <a href="https://wa.me/5566992240840" style="font-size:80%; text-decoration: none;" class="bi bi-whatsapp text-white-50 bg-dark text-white" target="_blank"> (66) 99224-0840</a>
                &nbsp&nbsp&nbsp
                <a href="mailto:andreiajakqueline@hotmail.com" style="font-size:80%; text-decoration: none;" class="bi bi-envelope text-white-50 bg-dark text-white" target="_blank"> andreiajakqueline@hotmail.com</a>
                &nbsp&nbsp&nbsp
                <a href="mailto:andreiajakqueline@creci.or.br" style="font-size:80%; text-decoration: none;" class="bi bi-envelope text-white-50 bg-dark text-white" target="_blank"> andreiajakqueline@creci.or.br</a>
            </div>
            <div class="col-sm-2 align-items-center" align="right">
                <a style="font-size:80%; text-decoration: none;" class=" text-white-50 bg-dark text-white"  target="_blank">CRECI-MT 8506</a>
            </div>
        </div>
    </div>
</div>

<!-- Parte com logo-->
<div class="container-fluid position-relative" style="background-color:#EFECE8">
    <div class="container-lg">
        <div class="row">
            <div class="col-2">
                <a href="index.php"> <img src="img/logoTotal.png" alt="Logo" width="80%"></a>
            </div>
            <div class="col-9 d-flex align-items-center">
                <ul class="nav nav-underline">
                    <li class="nav-item">
                        <a class="nav-link text-black" aria-current="page" href="index.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-black" href="alugar.php">Alugar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-black" href="comprar.php">Comprar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-black" href="terreno.php">Terreno</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-black" href="contato.html">Fale Conosco</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-black" href="sobre.html">Sobre</a>
                    </li>
                </ul>
            </div>
            <div class="position-relative">
            <div class="col-1 position-absolute top-100 start-100 translate-middle" style="margin-bottom: -50px;z-index: 100">
                <div class="custom-card" id="mobileCard">
                    <div class="card text-center" style="width: 100%;">
                        <div class="card-body">
                            <p class="card-text" style="font-size: 70%">Acesse pelo Celular</p>
                        </div>
                        <?php
                        echo '<img src="https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl=https://www.andreiacorretora.com.br/imovel.php?id='. $id . '" class="card-img-top" alt="QR Code">';
                        ?>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>



<script src="js/qrLen.js"></script>


<?php
$userData = mysqli_fetch_assoc($result);
?>



<div class="container-lg">
    <div class="row">
        <br>
    </div>
    <div class="row">
        <div class="col-12" align="center">
            <div id="carouselExample<?php echo $userData['id']; ?>" class="carousel slide">
                <div class="carousel-inner">
                    <?php
                    $controle_activo = 1;
                    $id = $userData['id'];
                    $sql = "SELECT * FROM imagens WHERE moveis_id = $id;";
                    $resultadoCarrosel = mysqli_query($conexao, $sql);
                    while($linhaCarrosel = mysqli_fetch_assoc($resultadoCarrosel)){
                        if($controle_activo){
                            ?>
                            <div class="carousel-item active">
                                <img src="<?php echo $linhaCarrosel['path']?>" class="d-block w-100" alt="erro<?php echo $userData['id']; ?>">
                            </div>
                            <?php
                            $controle_activo = 0;
                        }else{ ?>
                            <div class="carousel-item">
                                <img src="<?php echo $linhaCarrosel['path']?>" class="d-block w-100" alt="erro<?php echo $userData['id']; ?>">
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>

                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample<?php echo $userData['id']; ?>" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample<?php echo $userData['id']; ?>" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
    <div class="row">
        <br>
    </div>
    <div class="row">
        <div class="col-8">
            <h5 class="card-title cor-customizada" style="font-size: xx-large"><?php echo $userData['rua'] . " " . $userData['numero'] .  " - " . $userData['bairro']; ?></h5>
                <?php if ($userData['quartos'] > 0){?>
                    <i class="bi bi-door-open"> <?php echo $userData['quartos']; ?> quartos</i>
                    &nbsp
                <?php } ?>

                <?php if ($userData['suites'] > 0){?>
                    <i class="bi bi-droplet-half"> <?php echo $userData['suites']; ?> Suite</i>
                    &nbsp
                <?php } ?>

                <?php if ($userData['banheiros'] > 0){?>
                    <i class="bi bi-droplet"> <?php echo $userData['banheiros']; ?> Banheiros</i>
                    <br>
                <?php } ?>

                <?php if ($userData['garagens'] > 0){?>
                    <i class="bi bi-car-front-fill"> <?php echo $userData['garagens']; ?> vagas</i>
                    <br>
                <?php } ?>

                <?php if($userData['metrosQuadrado'] > 0){?>
                    <i class="bi bi-front"> <?php echo $userData['metrosQuadrado']; ?> m² de Lote</i>
                <?php }?>

            <br>
            <div class="row">
                <strong style="font-size: x-large">Descrição: </strong>
                <div class="descricao-container" style="max-height: 200px; overflow: auto; word-wrap: break-word;">
                    <?php echo $userData['descricao']; ?>
                </div>
            </div>

        </div>
        <!-- Parte Verde -->
        <div class="col-md-4">
            <div class="row">
                <div class="col">
                    <br>
                </div>
            </div>
            <div class="row" style="background: #0f5132" align="center">
                <div class="col">
                    <strong class="text-white" style="font-size: xx-large">Fale Conosco</strong>
                </div>
            </div>
            <div class="row" style="background: #0f5132" align="center">
                <div class="col">
                    <a href="https://wa.me/5566992429525" target="_blank" style="text-decoration: none;"> <strong class="bi bi-whatsapp text-white"> (66) 99242-9525</strong> </a>
                </div>
            </div>
            <div class="row" style="background: #0f5132" align="center">
                <div class="col">
                    <a href="https://wa.me/5566992240840" target="_blank" style="text-decoration: none;"> <strong class="bi bi-whatsapp text-white"> (66) 99224-0840</strong> </a>
                </div>
            </div>
            <div class="row" style="background: #0f5132" align="center">
                <div class="col">
                    <a href="mailto:andreiajakqueline@hotmail.com" style="text-decoration: none;" target="_blank"> <strong class="bi bi-envelope text-white"> andreiajakqueline@hotmail.com</strong> </a>
                </div>
                <div class="col">
                    <a href="mailto:andreiajakqueline@creci.org.br" style="text-decoration: none;" target="_blank"> <strong class="bi bi-envelope text-white"> andreiajakqueline@creci.org.br</strong> </a>        
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <br>
                </div>
            </div>
        </div>
    </div>
</div>

<br>
<br>
<br>

<iframe src="https://www.google.com/maps?q=<?php echo $userData['rua'] . " " . $userData['numero'] .  " " . $userData['cidade']; ?>&amp;output=embed" width="100%" height="450" frameborder="0" style="border: 0px; height: 433.1px;" allowfullscreen=""></iframe>


<!-- Botão Whats -->
<a href="https://wa.me/5566992429525" target="_blank"><img src="img/whatsapp.png" style="height:64px; position:fixed; bottom: 25px; right:25px; z-index:99999;" data-selector="img"></a>



<!-- Baixo do Site -->
<footer style="background-color:#272727; color: white">
    <div  class="container-lg">
        <br>
        <div class="row">
            <div class="col-sm-3">
                <strong>NAVEGAÇÃO</strong>
                <script src="js/click.js"></script>
                <br>
                <a href="index.php" style="color: white; text-decoration: none">Início</a>
                <br>
                <a href="alugar.php" style="color: white; text-decoration: none">Alugar</a>
                <br>
                <a href="comprar.php" style="color: white; text-decoration: none">Comprar</a>
                <br>
                <a href="contato.html" style="color: white; text-decoration: none">Contato</a>
                <br>
                <a href="sobre.html" style="color: white; text-decoration: none">Sobre</a>
                <br>
            </div>
            <div class="col-sm-4">
                <strong>CONTATO</strong>
                <br>
                <a href="https://wa.me/5566992429525" style="text-decoration: none;" class="text-white" target="_blank"><img width="7%" src="img/whatsapp.png"> (66) 99242-9525</a>
                <br>
                <a href="https://wa.me/5566992240840" style="text-decoration: none;" class="text-white" target="_blank"><img width="7%" src="img/whatsapp.png"> (66) 99224-0840</a>
                <br>
                <a href="mailto:andreiajakqueline@hotmail.com" style="text-decoration: none;" class="text-white" target="_blank" ><img width="7%" src="img/gmail.png"> andreiajakqueline@hotmail.com</a>
                <br>
                <a href="mailto:andreiajakqueline@creci.org.br" style="text-decoration: none;" class="text-white" target="_blank" ><img width="7%" src="img/gmail.png"> andreiajakqueline@creci.org.br</a>
                <br>
            </div>
            <div class="col-sm-4">
                <strong>ENDEREÇO</strong>
                <br>
                <img width="7%" src="img/mapa.png"> Rua das Flores, 254 - Centro - Santo Antonio do Leste/MT
                <br>
            </div>
            <br>
            <br>
        </div>
        <div class="col-sm-1">
        </div>
    </div>
    </div>
    </div>
    <br>
</footer>
<address>
    <div class="container w-75">
        <div class="row">
            <div class="col-sm-10">
                <em>Igor Roberto Michalski de Souza</em>
            </div>
            <div align="right" class="col-sm-2">
                <em>2023</em>
            </div>
        </div>
    </div>
</address>

</body>
</html>

