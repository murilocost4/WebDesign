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
<body style="background-color: rgb(226, 221, 204)">
    <div class="flexbox" style="height: 780px;">
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
        <div class="content" id="contentborder">
            <div id="adicionarpaciente">
                <header class="adicionarhead"><p>Alterando Profissional</p></header>
                <form action="alterar_profissional.php" method="post" id="adicionarpacienteform">
                <?php
                    $variavelId = $_GET['idprofissional'];
                    include "funcoes.php";
                    $conectar = conectarBancoDados();
                    
                    $sql = "SELECT * FROM profissionais WHERE id = '$variavelId'";
                    $stmt = $conectar->prepare($sql);
                    $stmt->execute();
                    $arrayMostrarProfissionais = $stmt->fetchAll(PDO::FETCH_OBJ);

                    foreach($arrayMostrarProfissionais as $profissionais) {
                        $nomeantigo = $profissionais->nome;
                        $cpfantigo = $profissionais->cpf;
                        $rgantigo = $profissionais->rg;
                        $nascimento = $profissionais->nascimento;
                        $sexo = $profissionais->sexo;
                        $especialidade = $profissionais->especialidade;
                        $emailantigo = $profissionais->email;
                        $celularantigo = $profissionais->celular;
                        $descricaoantiga = $profissionais->descricao;
                    }

                ?>
                    <input type="hidden" class="formulario" name="idprofissional" id="idprofissional" value="<?php echo($variavelId) ?>">
                    <div class="divinput">
                        <label for="nome" class="labelform">Nome</label><br>
                        <input type="text" class="formulario" name="nome" id="nome" value="<?php echo($nomeantigo) ?>">
                        <p class="label-abaixo">Nome Completo</p>
                    </div>
                    <div class="divinput">
                        <label for="cpf" class="labelform">CPF</label><br>
                        <input type="text" class="formulario" name="cpf" id="cpf" data-mask="___.___.___-__" data-mask-selectonfocus="true" value="<?php echo($cpfantigo) ?>">
                        <p class="label-abaixo">CPF</p>
                    </div>
                    <div class="divinput">
                        <label for="rg" class="labelform">RG</label><br>
                        <input type="text" class="formulario" name="rg" id="rg" value="<?php echo($rgantigo) ?>">
                        <p class="label-abaixo">RG</p>
                    </div>
                    <div class="divinput">
                        <label for="nascimento" class="labelform">Nascimento</label><br>
                        <input type="text" class="formulario" name="nascimento" id="nascimento" data-mask="__/__/____" data-mask-selectonfocus="true" value="<?php echo($nascimento) ?>">
                        <p class="label-abaixo">Data de Nascimento</p>
                    </div>    
                    <div class="divinput">
                        <label for="sexo" class="labelform">Sexo</label><br>
                        <input type="text" class="formulario" name="sexo" id="sexo" value="<?php echo($sexo) ?>">
                        <p class="label-abaixo">Sexo</p>
                    </div>
                    <div class="divinput">
                        <label for="especialidade" class="labelform">Especialidade</label><br>
                        <input type="text" class="formulario" name="especialidade" id="endereco" value="<?php echo($especialidade) ?>">
                        <p class="label-abaixo">Especialidade médica</p>
                    </div>
                    <div class="divinput">
                        <label for="email" class="labelform">E-mail</label><br>
                        <input type="text" class="formulario" name="email" id="email" value="<?php echo($emailantigo) ?>">
                        <p class="label-abaixo">email@exemplo.com</p>
                    </div>
                    <div class="divinput">
                        <label for="celular" class="labelform">Celular</label><br>
                        <input type="text" class="formulario" name="celular" id="celular" data-mask="(__)_____-____" data-mask-selectonfocus="true" value="<?php echo($celularantigo) ?>">
                        <p class="label-abaixo">Celular</p>
                    </div>
                    <div class="divinput">
                        <label for="descricao" class="labelform">Descricao</label><br>
                        <input type="text" class="formulario" name="descricao" id="descricao" value="<?php echo($descricaoantiga) ?>">
                        <p class="label-abaixo">Descrição</p>
                    </div>
                    <div class="formsubmit">
                        <input type="submit" id="enviar" value="Salvar">
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</body>
</html>