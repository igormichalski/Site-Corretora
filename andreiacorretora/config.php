$host = "localhost";
$user = "root";
$pass = "";
$bd = "imoveis-andreia";

$conexao = mysqli_connect($host, $user, $pass, $bd);

/* Chegando a conexão */
if($conexao->connect_errno) {
    echo "Erro na conexão: " . $conexao->connect_error;
   exit();
}


