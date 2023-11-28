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
    <div class="flexbox" style="height: 1600px;">
        <div class="navmenu2">
            <div id="headernav">
                <h1 id="logonav">Wimbra</h1>
            </div>
            <div id="navigation">
                <nav id = "navigationnav">
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
            <div class="tabelahead">
                <a id="btnadicionar" href="adicionar_paciente.php">Adicionar</a>
                <form action="pacientes_pesquisa.php" method="$_POST">
                    <select name="parametro" id="comboparametro">
                        <option value="" disabled selected>Parâmetro</option>
                        <option value="id">Id</option>
                        <option value="nome">Nome</option>
                        <option value="cpf">Cpf</option>
                    </select>
                    <input type="text" id="pesquisar" name="pesquisar" placeholder="Pesquisar">
                    <button type="submit" id="btnpesquisar"><i class="fa fa-search"></i></button>
                </form>
            </div>
            <div class="tabela">
                <?php
                    include "funcoes.php";
                    $conn = conectarBancoDados();
        
                    listarPacientes($conn);
        
                    $conn = null;
                ?>
            </div>
        </div>
    </div>
</body>
</html>