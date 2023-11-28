<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>
<body>
    <div id="imagem">
    </div>
    <div id=divform>
        <div id="divlogotitulo" style="order: 1">
        <h1 id="logotitulo">Wimbra</h1>
        </div>
        <p id="plogin" style="order: 2;">Faça login</p>
        <form id="formulario" method="POST" action="" style="order: 4">
            <input type="text" id="usuario" name="usuario" placeholder="Usuário"><br>
            <input type="password" id="senha" name="senha" placeholder="Senha"><br>
            <input type="submit" id="entrar" value="entrar">
        </form>
        <?php
// Conexão com o banco de dados (substitua com suas próprias credenciais)
$host = "localhost";
$dbname = "porfolio";
$usuario_bd = "root";
$senha_bd = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $usuario_bd, $senha_bd);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro de conexão com o banco de dados: " . $e->getMessage());
}

// Função para validar o login
function validarLogin($usuario, $senha) {
    global $pdo;

    // Consulta SQL para verificar se o usuário e a senha correspondem
    $sql = "SELECT * FROM usuarios WHERE usuario = :usuario AND senha = :senha";

    try {
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':usuario', $usuario, PDO::PARAM_STR);
        $stmt->bindParam(':senha', $senha, PDO::PARAM_STR);
        $stmt->execute();
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($resultado) {
            // Usuário e senha válidos
            return true;
        } else {
            // Usuário ou senha inválidos
            return false;
        }
    } catch (PDOException $e) {
        die("Erro na consulta SQL: " . $e->getMessage());
    }
}

// Verificar se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];

    if (validarLogin($usuario, $senha)) {
        // Login bem-sucedido, redirecionar para index.html
        header("Location: dashboard.html");
        exit; // Certifique-se de sair para evitar qualquer saída adicional
    } else {
        // Login falhou
        echo("<div id='loginfalhou' style='order: 3; font-size: 13px; border: 0.125em solid tomato; padding-left: 8px; padding-right: 8px; border-radius: 8px; background-color: rgba(255, 211, 211, 1);'>
                <p>Usuário ou senha incorreta.</p>
            </div>");
    }
}
?>
    </div>
    
</body>
</html>
