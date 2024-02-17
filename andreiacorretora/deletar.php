<?php

if(!empty($_GET['id']))
{
//    require_once("/home/igorroberto/Documentos/www/imobiliaria/config.php");
    require_once("config.php");


    $id = $_GET['id'];

    $sqlSelect = "SELECT *  FROM imoveis WHERE id=$id";

    $result = mysqli_query($conexao,$sqlSelect);

    if($result->num_rows > 0)
    {
        //Deleta as imagens da pasta [Fisico]
        $sql = "SELECT * FROM imagens WHERE moveis_id = $id;";
        $resultadoCarrosel = mysqli_query($conexao, $sql);
        while($linhaCarrosel = mysqli_fetch_assoc($resultadoCarrosel)){
            unlink($linhaCarrosel['path']);
        }

        //Roda a consulta que deleta [Logico] + dados da casa (CASCATA MOD)
        $sqlDelete = "DELETE FROM imoveis WHERE id=$id";
        $resultDelete = mysqli_query($conexao,$sqlDelete);
    }
}
header('Location: controle.php');

?>