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
    <style>
        a:link {
            text-decoration: none;
            color: rgba(157, 148, 175, 1);
            z-index: 1;

        }
        a:visited {
            text-decoration: none;
            color: rgba(157, 148, 175, 1);
            z-index: 1;
        }
        a:hover {
            text-decoration: none;
            color: rgba(157, 148, 175, 1);
            z-index: 1;
        }
        a:active {
            text-decoration: none;
            color: rgba(157, 148, 175, 1);
        }
    </style>
</head>
<body style="background-color: rgb(226, 221, 204);">
    <div class="flexbox">
        <div class="navmenu">
            <div class="headernav">
                <h1 class="logonav">Wimbra</h1>
            </div>
            <div class="navigation">
                <nav class = "navigationnav">
                    <a href="dashboard.html"><img class="iconnav" src="images/dashboard.png" alt="">Dashboard</a>
                    <a href="cadastro-pacientes.php"><img class="iconnav" src="images/cadastro.png" alt="">Cadastro Pacientes</a>
                    <a class="linkativo" href="cadastro-profissionais.php"><img class="iconnav" src="images/cadastro_ativo.png" alt="">Cadastro Profissionais</a>
                    <a href="agenda.html"><img class="iconnav" src="images/calendario.png" alt="">Agenda</a>
                    <a href="solicitacoes.php"><img class="iconnav" src="images/solicitacoes.png" alt="">Solicitações</a>
                    <a href="configuracoes.html"><img class="iconnav" src="images/configuracoes.png" alt="">Configurações</a>
                </nav>
            </div>
        </div>
        <div class="content">
            <div class="tabelahead">
                <a id="btnadicionar" href="adicionar_profissional.html">Adicionar</a>
                <form action="" method="$_POST">
                    <select name="parametro" id="comboparametro">
                        <option value="" disabled selected>Parâmetro</option>
                        <option value="id">id</option>
                        <option value="nome">nome</option>
                        <option value="cpf">cpf</option>
                        <option value="especialidade">especialidade</option>
                    </select>
                    <input type="text" id="pesquisar" name="pesquisar" placeholder="Pesquisar">
                    <button type="submit" id="btnpesquisar"><i class="fa fa-search"></i></button>
                </form>
            </div>
            <div class="tabela">
                <?php
                    include "funcoes.php";
                    $conn = conectarBancoDados();
        
                    listarProfissionais($conn);
        
                    $conn = null;
                ?>
            </div>
        </div>
    </div>
</body>
</html>