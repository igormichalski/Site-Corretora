<?php

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

function enviarArquivo($error, $name, $tmp_name, $id)
{

//    require("/home/igorroberto/Documentos/www/imobiliaria/config.php");
        require("config.php");

//      Verifica se ouve erro na hora de enviar o arquivo
        if ($error)
            die("Falha ao enviar arquivo");

//      Pasta onde os arquivos vão ser salvo
        $pasta = "fotos/";

//      Alterando o nome do arquivo enviado
        $nomeArquivo = $name;
        $newNomeArquivo = uniqid(); //Gera novo nome
        $extensao = strtolower(pathinfo($nomeArquivo, PATHINFO_EXTENSION)); //Pega a extensao do arquivo e deixa minusculo

        if ($extensao != 'jpg' && $extensao != 'png')
            die("Tipo de arquivo invalido");

//      Move o arquivo da pasta temp para a sua de destino e renomeia o arquivo com o nome desejado e sua extensao
        $path = $pasta . $newNomeArquivo . "." . $extensao;
        if (move_uploaded_file($tmp_name, $path)){
            $sql = "INSERT INTO imagens (moveis_id, path) VALUES ($id, \"$path\");";
            mysqli_query($conexao,$sql);
            return true;
        }
        else
            return false;
}

//CONEXAO
//require_once("/home/igorroberto/Documentos/www/imobiliaria/config.php");
require_once("config.php");

if (isset($_FILES)) {
    if (isset($_POST['submit'])) {

        $rua = $_POST["rua"];
        $numero = $_POST["numero"];
        $cidade = $_POST["cidade"];
        $bairro = $_POST["bairro"];
        $descricao = $_POST["descricao"];

//      Converte Chekbox para int
        // Verifica se a chave "destaque" está definida em $_POST
        if (isset($_POST["destaque"])) {
            $destaque = 1;
        } else {
            $destaque = 0;
        }

// Verifica se a chave "alugar" está definida em $_POST
        if (isset($_POST["locar"])) {
            $alugar = 1;
        } else {
            $alugar = 0;
        }

// Verifica se a chave "vender" está definida em $_POST
        if (isset($_POST["vender"])) {
            $comprar = 1;
        } else {
            $comprar = 0;
        }

// Verifica se a chave "terreno" está definida em $_POST
        if (isset($_POST["terreno"])) {
            $terreno = 1;
        } else {
            $terreno = 0;
        }

        if(NULL == $_POST['garagens']) {
            $garagens = 0;
        }else {
            $garagens = $_POST["garagens"];
        }

        if(NULL == $_POST['quartos']) {
            $quartos = 0;
        }else {
            $quartos = $_POST["quartos"];
        }

        if(NULL == $_POST['banheiros']) {
            $banheiros = 0;
        }else {
            $banheiros = $_POST["banheiros"];
        }

        if(NULL == $_POST['suites']) {
            $suites = 0;
        }else {
            $suites = $_POST["suites"];
        }

        if(NULL == $_POST['metrosQuadrado']) {
            $metrosQuadrado = 0;
        }else {
            $metrosQuadrado = $_POST["metrosQuadrado"];
        }

//      Enviar os dados
        $sql = "INSERT INTO imoveis(destaque, alugar, comprar, terreno, rua, numero, cidade, bairro, quartos, suites, banheiros, garagens, metrosQuadrado, descricao)\n"

            . "\n"

            . "     VALUES($destaque, $alugar, $comprar, $terreno, \"$rua\", \"$numero\", \"$cidade\", \"$bairro\", $quartos, $suites, $banheiros, $garagens, $metrosQuadrado, \"$descricao\");";


        if(mysqli_query($conexao,$sql)){  //ERRO AQUI

//          Pega o ultimo id da tabela imoveis para colocar como FK na tab imagens
            $ultimoId = mysqli_insert_id($conexao);

            //      Envia as fotos
            $arquivo = $_FILES['arquivo']; //Var para manipular arquivo
            $tudo_certo = true;

            //Chama a função e roda em cada imagem com um for
            foreach ($arquivo['name'] as $index => $arq) {
                if(enviarArquivo($arquivo['error'][$index], $arquivo['name'][$index], $arquivo['tmp_name'][$index], $ultimoId))
                    $deuCerto = true;
            }
            if($deuCerto)
                echo "Dados Enviados";
        }
        else
            echo "Erro ao enviar Dados";

        mysqli_close($conexao);
    }
}

?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8" name="google" content="notranslate">
    <title>Cadastro</title>
    <link rel="icon" type="img/logo.png" href="img/logoTotal.png"/>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/plus.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<a href="controle.php"><h5>Voltar</h5></a>
<br>
<br>
<br>

<div class="container w-75">

    <form class="row g-3" action="cadastrar.php" method="POST" enctype="multipart/form-data">
        <!-- Endereço -->
        <div class="col-md-4">
            <label for="validationRua" class="form-label">Rua</label>
            <input name="rua" type="text" class="form-control" id="validationRua" required>
        </div>
        <div class="col-md-4">
            <label for="validationNumero" class="form-label">Numero</label>
            <input name="numero" type="text" class="form-control" id="validationNumero" required>
        </div>
        <div class="col-md-4">
            <label for="validationBairro" class="form-label">Bairro</label>
            <input name="bairro" type="text" class="form-control" id="validationBairro" required>
        </div>
        <div class="col-md-6">
            <label for="validationCidade" class="form-label">Cidade</label>
            <input name="cidade" type="text" class="form-control" id="validationCidade" required>
        </div>
        <div class="col-md-6">
            <label for="validationDescricao" class="form-label">Descrição</label>
            <textarea name="descricao" class="form-control" id="validationDescricao" rows="1" required></textarea>
        </div>
        <div class="mb-3">
            <label for="validationimg" class="form-label">Imagens</label>
            <input name="arquivo[]" class="form-control" type="file" id="validationimg" multiple>
        </div>

<!--    Dados da casa-->
        <div class="col-md-4">
            <label for="validationQuartos" class="form-label">Quartos</label>
            <input name="quartos" type="number" class="form-control" id="validationQuartos">
        </div>
        <div class="col-md-4">
            <label for="validationSuites" class="form-label">Suites</label>
            <input name="suites" type="number" class="form-control" id="validationSuites">
        </div>
        <div class="col-md-4">
            <label for="validationBanheiros" class="form-label">Banheiros</label>
            <input name="banheiros" type="number" class="form-control" id="validationBanheiros">
        </div>

        <div class="col-md-4">
            <label for="validationGaragens" class="form-label">Garagens</label>
            <input name="garagens" type="number" class="form-control" id="validationGaragens">
        </div>
        <div class="col-md-4">
            <label for="validationMetros" class="form-label">Metros Quadrado</label>
            <input name="metrosQuadrado" type="number" class="form-control" id="validationMetros">
        </div>

        <div class="col-12">
            <div class="form-check">

               <!-- (0/1) -->
                <input name="destaque" class="form-check-input" type="checkbox" value="1" id="destaque">
                <label class="form-check-label" for="destaque">
                    Destaque
                </label>
            </div>
            <div class="form-check">
                <input name="locar" class="form-check-input" type="checkbox" value="1" id="locar">
                <label class="form-check-label" for="locar">
                    Alugar
                </label>
            </div>
            <div class="form-check">
                <input name="vender" class="form-check-input" type="checkbox" value="1" id="vender">
                <label class="form-check-label" for="vender">
                    Vender
                </label>
            </div>
            <div class="form-check">
                <input name="terreno" class="form-check-input" type="checkbox" value="1" id="terreno">
                <label class="form-check-label" for="terreno">
                    Terreno
                </label>
            </div>
        </div>
        <div class="col-12">
            <button class="btn btn-primary" type="submit" id="submit" name="submit">Enviar Cadastro</button>
            <a class="btn btn-danger" href="controle.php">Cancelar e Retornar</i></a>
        </div>
    </form>
    <br>
    <br>
    <br>
</div>
</body>
</html>


<!--
id
rua
numero
bairro
cidade
imgs
descricao
quartos
suites
banheiros
garagens
metrosQuadrados



-->