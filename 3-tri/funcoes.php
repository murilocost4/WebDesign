<?php
    function conectarBancoDados():object {
        $usuario = "root";
        $senha = "";
        $conn = new PDO("mysql:host=localhost;dbname=porfolio",$usuario, $senha);
    
        return $conn;
    }

    function listarPacientes(object $conn):void {
        $comandoSQL = "select * from pacientes";
        $retornoBanco = $conn -> prepare($comandoSQL);
        $retornoBanco->execute();
        $registros = $retornoBanco->fetchall(PDO::FETCH_OBJ);
        ?>
        <table class="tabela-listar">
                <tr>
                    <th id="thid">Id</th>
                    <th id="thnome">Nome</th>
                    <th id="thcpf">Cpf</th>
                    <th id="thcel">Celular</th>
                    <th id="thalterar">Alterar</th></th>
                </tr>
        <?php
        foreach($registros as $linha){
            echo("  <tr>
                        <td id='tdid'>$linha->id</td>
                        <td>$linha->nome</td>
                        <td>$linha->cpf</td>
                        <td>$linha->celular</td>
                        <td><a href='alterarpaciente.php?idpaciente=".$linha->id."'>Alterar</a></td>
                    </tr>");
            
        }
        echo("</table>");
        return;
    }
    function listarProfissionais(object $conn):void {
        $comandoSQL = "select * from profissionais";
        $retornoBanco = $conn -> prepare($comandoSQL);
        $retornoBanco->execute();
        $registros = $retornoBanco->fetchall(PDO::FETCH_OBJ);
        ?>
        <table class="tabela-listar">
                <tr>
                    <th id="thid">Id</th>
                    <th id="thnome">Nome</th>
                    <th id="thcpf">Cpf</th>
                    <th id="thcel">Especialidade</th>
                    <th id="thalterar">Alterar</th></th>
                </tr>
        <?php
        foreach($registros as $linha){
            echo("  <tr>
                        <td id='tdid'>$linha->id</td>
                        <td>$linha->nome</td>
                        <td>$linha->cpf</td>
                        <td>$linha->especialidade</td>
                        <td><a href='alterarprofissional.php?idprofissional=".$linha->id."'>Alterar</a></td>
                    </tr>");
            
        }
        echo("</table>");
        return;
    }
    function listarPacientePesquisado(object $conn, $parametro, $pesquisa):void {
        $stmt=$conn->prepare("SELECT * FROM pacientes WHERE $parametro = ?");
        $stmt->bindParam(1, $pesquisa);
        $stmt->execute();
        $registros = $stmt->fetchall(PDO::FETCH_OBJ);
        ?>
        <table class="tabela-listar">
                <tr>
                    <th id="thid">Id</th>
                    <th id="thnome">Nome</th>
                    <th id="thcpf">Cpf</th>
                    <th id="thcel">Celular</th>
                </tr>
        <?php
        foreach($registros as $linha){
            echo("  <tr>
                        <td id='tdid'>$linha->id</td>
                        <td>$linha->nome</td>
                        <td>$linha->cpf</td>
                        <td>$linha->celular</td>
                    </tr>");
            
        }
        echo("</table>");
        return;
    }
    function inserirPaciente(object $conn, $nome, $cpf, $rg, $nascimento, $sexo, $endereco, $email, $celular, $descricao):bool {
        $conn = conectarBancoDados();

        $sql = "INSERT INTO pacientes (nome, cpf, rg, nacimento, sexo, endereco, email, celular, descricao) VALUES ('$nome', '$cpf', '$rg', '$nascimento', '$sexo', '$endereco', '$email', '$celular', '$descricao')";
    
        if ($conn->query($sql) == TRUE) {
            return true;
        } else {
            return false;
        }
    
        $conn->close();
    }
    function inserirProfissional(object $conn, $nome, $cpf, $rg, $nascimento, $sexo, $especialidade, $email, $celular, $descricao):bool {
        $conn = conectarBancoDados();

        $sql = "INSERT INTO profissionais (nome, cpf, rg, nascimento, sexo, especialidade, email, celular, descricao) VALUES ('$nome', '$cpf', '$rg', '$nascimento', '$sexo', '$especialidade', '$email', '$celular', '$descricao')";
    
        if ($conn->query($sql) == TRUE) {
            return true;
        } else {
            return false;
        }
    
        $conn->close();
    }
    function listarSolicitacoes(object $conn):void {
        $comandoSQL = "select * from solicitacoes";
        $retornoBanco = $conn -> prepare($comandoSQL);
        $retornoBanco->execute();
        $registros = $retornoBanco->fetchall(PDO::FETCH_OBJ);
        ?>
        <table class="tabela-listar">
                <tr>
                    <th id="thid">Id</th>
                    <th id="thnome">Paciente</th>
                    <th id="thcpf">Profissional</th>
                    <th id="thcel">Data</th>
                    <th id="thcel">Status</th>
                </tr>
        <?php
        foreach($registros as $linha){
            echo("  <tr>
                        <td id='tdid'>$linha->id</td>
                        <td>$linha->paciente</td>
                        <td>$linha->profissional</td>
                        <td>$linha->data_agendamento</td>
                        <td>$linha->status_sol</td>
                    </tr>");
            
        }
        echo("</table>");
        return;
    }
    function inserirSolicitacoes(object $conn, $paciente, $profissional, $data, $data_agendamento, $descricao, $status):bool {
        $conn = conectarBancoDados();

        $sql = "INSERT INTO solicitacoes (paciente, profissional, data_solicitacao, data_agendamento, descricao, status_sol) VALUES ('$paciente', '$profissional', '$data', '$data_agendamento', '$descricao', '$status')";
    
        if ($conn->query($sql) == TRUE) {
            return true;
        } else {
            return false;
        }
    
        $conn->close();
    }
    function alterarPaciente(object $conn, $nome, $cpf, $rg, $nascimento, $sexo, $endereco, $email, $celular, $descricao, $idpaciente) {
        $stmt=$conn->prepare("UPDATE pacientes SET nome=?, cpf=?, rg=?, nacimento=?, sexo=?, endereco=?, email=?, celular=?, descricao=? WHERE id = ?");
        $stmt->bindParam(1, $nome, PDO::PARAM_STR);
        $stmt->bindParam(2, $cpf, PDO::PARAM_STR);
        $stmt->bindParam(3, $rg, PDO::PARAM_STR);
        $stmt->bindParam(4, $nascimento, PDO::PARAM_STR);
        $stmt->bindParam(5, $sexo, PDO::PARAM_STR);
        $stmt->bindParam(6, $endereco, PDO::PARAM_STR);
        $stmt->bindParam(7, $email, PDO::PARAM_STR);
        $stmt->bindParam(8, $celular, PDO::PARAM_STR);
        $stmt->bindParam(9, $descricao, PDO::PARAM_STR);
        $stmt->bindParam(10, $idpaciente, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }

    }
    function alterarProfissional( $conn, $nome, $cpf, $rg, $nascimento, $sexo, $especialidade, $email, $celular, $descricao, $idprofissional) {
        $stmt=$conn->prepare("UPDATE profissionais SET nome=?, cpf=?, rg=?, nascimento=?, sexo=?, especialidade=?, email=?, celular=?, descricao=? WHERE id = ?");
        $stmt->bindParam(1, $nome, PDO::PARAM_STR);
        $stmt->bindParam(2, $cpf, PDO::PARAM_STR);
        $stmt->bindParam(3, $rg, PDO::PARAM_STR);
        $stmt->bindParam(4, $nascimento, PDO::PARAM_STR);
        $stmt->bindParam(5, $sexo, PDO::PARAM_STR);
        $stmt->bindParam(6, $especialidade, PDO::PARAM_STR);
        $stmt->bindParam(7, $email, PDO::PARAM_STR);
        $stmt->bindParam(8, $celular, PDO::PARAM_STR);
        $stmt->bindParam(9, $descricao, PDO::PARAM_STR);
        $stmt->bindParam(10, $idprofissional, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
?>