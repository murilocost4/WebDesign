<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <title>Document</title>
</head>
<body>
    <div class="flexbox">
    <div class="navmenu">
            <div class="headernav">
                <h1 class="logonav">Wimbra</h1>
            </div>
            <div class="navigation">
                <nav class = "navigationnav">
                    <a href="dashboard.html"><img class="iconnav" src="images/dashboard.png" alt="">Dashboard</a>
                    <a class="linkativo" href="cadastro-pacientes.php"><img class="iconnav" src="images/cadastro_ativo.png" alt="">Cadastro Pacientes</a>
                    <a href="cadastro-profissionais.php"><img class="iconnav" src="images/cadastro.png" alt="">Cadastro Profissionais</a>
                    <a href="agenda.html"><img class="iconnav" src="images/calendario.png" alt="">Agenda</a>
                    <a href="solicitacoes.php"><img class="iconnav" src="images/solicitacoes.png" alt="">Solicitações</a>
                    <a href="configuracoes.html"><img class="iconnav" src="images/configuracoes.png" alt="">Configurações</a>
                </nav>
            </div>
        </div>
        <div class="content">
            <?php
                include "funcoes.php";

                $conn = conectarBancoDados();
                
                $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
                    $nome = $dados['nome'];
                    $cpf = $dados['cpf'];
                    $rg = $dados['rg'];
                    $nascimento = $dados['nascimento'];
                    $sexo = $dados['sexo'];
                    $endereco = $dados['endereco'];
                    $email = $dados['email'];
                    $celular = $dados['celular'];
                    $descricao = $dados['descricao'];
                    $idpaciente = $dados['idpaciente'];
                
                    $retornoDaFuncao = alterarPaciente( $conn, $nome, $cpf, $rg, $nascimento, $sexo, $endereco, $email, $celular, $descricao, $idpaciente);
                
                if ($retornoDaFuncao == true) {
                    header("Location: cadastro-pacientes.php");
                } else {
                    echo "Erro ao inserir o produto.";
                }
            ?>
        </div>
    </div>
</body>
</html>