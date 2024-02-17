<?php

//PARA MOSTRAR OS ERROS
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//require_once("/home/igorroberto/Documentos/www/imobiliaria/config.php");

require_once("config.php");

session_start();
if ((!isset($_SESSION['nome']) == true) and (!isset($_SESSION['senha']) == true)) {
    unset($_SESSION['nome']);
    unset($_SESSION['nome']);
    header('Location: login.php');
}


$sql = "SELECT * FROM imoveis;";

$result = mysqli_query($conexao,$sql);

?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8" name="google" content="notranslate">
    <title>Controlador Sistema</title>
    <link rel="icon" type="img/logo.png" href="img/logoTotal.png"/>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/plus.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


<div class="container w-75">
    <div class="row">
        <div class="col-5">
            <br>
            <a class="btn btn-danger" href="sair.php">Log Out</a>
        </div>
        <div class="col-2">
            <br>
            <h3><strong>Cadastros</strong></h3>
        </div>
        <div class="col-3"></div>
        <div class="col-2">
            <br>
            <a class="btn btn-primary" href="cadastrar.php">Novo Registro</a>
        </div>
    </div>
    <div class="row">
        <table class="table table-bordered border border-3">
            <thead>
                <th>Preview</th>
                <th>Conteudo</th>
                <th>Ações</th>
            </thead>
            <tbody>
                <?php
                while ($userData = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <td>

                        <?php
                        $id = $userData['id'];
                        $sql = "SELECT * FROM imagens WHERE moveis_id = $id;";
                        $resultadoCarrosel = mysqli_query($conexao, $sql);
                        $linhaCarrosel = mysqli_fetch_assoc($resultadoCarrosel);
                        ?>
                        <img height="200" src="<?php echo $linhaCarrosel['path']?>" alt="erro<?php echo $userData['id']; ?>">

                    </td>
                    <td>
                        <br>
                        <?php
                        if($userData['alugar'] == 1)
                            echo "Alugar" . " #" . $userData['id'];
                        else
                            echo "Comprar" . " #" . $userData['id'];
                        ?>

<!--                    Dados do imovel-->
                        <h5 class="card-title cor-customizada"><?php echo $userData['rua'] . " " . $userData['numero'] .  " - " . $userData['bairro']; ?></h5>
                        <br>
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
                    </td>
                    <td>

<!--                    Botões-->
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a class="btn btn-warning" href=""><i class="bi bi-pencil"></i></a>
                            <a class="btn btn-danger" href="deletar.php?id=<?php echo $userData['id']; ?>"><i class="bi bi-trash3"></i></a>
                        </div>

                    </td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>

    </div>
</div>
<br>
<br>
<br>

</body>
</html>
