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
                    <a class="linkativo" href="cadastro-pacientes.php"><img class="iconnav" src="images/cadastro.png" alt="">Cadastro Pacientes</a>
                    <a href="cadastro-profissionais.php"><img class="iconnav" src="images/cadastro.png" alt="">Cadastro Profissionais</a>
                    <a href="agenda.html"><img class="iconnav" src="images/calendario.png" alt="">Agenda</a>
                    <a class="linkativo" href="solicitacoes.php"><img class="iconnav" src="images/solicitacoes_ativo.png" alt="">Solicitações</a>
                    <a href="configuracoes.html"><img class="iconnav" src="images/configuracoes.png" alt="">Configurações</a>
                </nav>
            </div>
        </div>
        <div class="content">
            <?php
                include "funcoes.php";

                $conn = conectarBancoDados();
                
                $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
                    $paciente = $dados['paciente'];
                    $profissional = $dados['profissional'];
                    $data = $dados['data'];
                    $data_agendamento = $dados['data_agendamento'];
                    $descricao = $dados['descricao'];
                    $status = $dados['status'];
                
                
                    $retornoDaFuncao = inserirSolicitacoes( $conn, $paciente, $profissional, $data, $data_agendamento, $descricao, $status);
                
                if ($retornoDaFuncao == true) {
                    header("Location: solicitacoes.php");
                } else {
                    echo "Erro ao inserir solicitacao.";
                }
            ?>
        </div>
    </div>
</body>
</html>