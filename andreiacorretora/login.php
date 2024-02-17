<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="icon" type="img/logo.png" href="img/logoTotal.png"/>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/plus.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<a href="index.php"><h5>Voltar</h5></a>

<!--LOGIN !-->
<div class="container w-25">
    <br>
    <br>
<form action="testLogin.php" method="POST">
    <input type="text" name="nome" placeholder="Nome" required>
    <br><br>
    <input type="password" name="senha" placeholder="Senha" required>
    <br><br>
    <input class="btn btn-success" type="submit" name="submit" value="Enviar">
</form>
</div>

</body>
</html>