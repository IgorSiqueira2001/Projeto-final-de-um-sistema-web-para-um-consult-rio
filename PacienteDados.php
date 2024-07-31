<?php
    include_once("Config.php");
    require_once "Funcoes.php";

    use Modelo\Paciente;
    
    $paciente = new paciente();

    if(isset($_POST["nome"])){
        $nome = $_POST["nome"];
        if($_POST["opcao"] == "Pesquisar"){
            $paciente = Paciente::getPacientespNome($nome);
            
        }
    
    }
    if(isset($_GET["op"])){
        if($_GET['op'] == 1){      
            $paciente = Paciente::getPacientepCodigo($_GET['id']);
        }
    }
?>  
    
    <form action="PacienteFront.php" method="POST">
        <input type="text" value="<?= $paciente->id?>" name="id" class="oculto">
        <label for="nome" class="form-label">Nome:</label>
            <input type="text" class="form-control" name="nome" value="<?= $paciente->nome?>" placeholder="Digite o nome do Paciente" name="nome">
        <label for="tel" class="form-label">Telefone:</label>
            <input type="text" class="form-control" name="tel" value="<?= $paciente->telefone?>" placeholder="Digite o telefone do Paciente" name="tel">
        <label for="endereco" class="form-label">Endereço:</label>
            <input type="text" class="form-control" name="endereco" value="<?= $paciente->endereco?>" placeholder="Digite o endereço do Paciente" name="endereco">
        <div class="row">
            <div class="col">
                <label for="cidade" class="form-label">Cidade:</label>
                    <input type="text" class="form-control" name="cidade" value="<?= $paciente->cidade?>" placeholder="Digite a cidade do Paciente" name="cidade">
            </div>
            <div class="col">
                <label for="uf" class="form-label">Unidade Federativa:</label>
                    <input type="text" class="form-control" name="uf" value="<?= $paciente->uf?>" placeholder="Digite o UF do Paciente" name="uf">
            </div>
        </div>
        <label for="cep" class="form-label">Cep:</label>
            <input type="text" class="form-control" name="cep" value="<?= $paciente->cep?>" placeholder="Digite o CEP do Paciente" name="cep">
        <label for="data_nasc" class="form-label">Data de Nascimento:</label>
            <input type="text" class="form-control" name="data_nasc" value="<?= $paciente->data_nasc?>" placeholder="Digite a data de nascimento do Paciente dia/mes/ano" name="data_nasc">    
        <label for="responsavel" class="form-label">Responsável:</label>
            <input type="text" class="form-control" name="responsavel" value="<?= $paciente->responsavel?>" placeholder="Digite o responsável do Paciente" name="responsavel"><br>
        <div class="btn-group">
            <button type="submit" name="opcao" value="Cadastrar" class="btn btn-primary">Cadastrar</button>
            <button type="submit" name="opcao" value="Alterar" class="btn btn-primary">Alterar</button>
            <button type="submit" name="opcao" value="Excluir" class="btn btn-primary">Excluir</button>
            <button type="submit" name="opcao" value="Listar" class="btn btn-primary">Pacientes</button>
        </div> 
    </form>

<?php

    if(isset($_POST["nome"])){
        $paciente->id= $_POST["id"];
        $paciente->nome = $_POST["nome"];
        $paciente->telefone = $_POST["tel"];
        $paciente->endereco = $_POST["endereco"];
        $paciente->cidade = $_POST["cidade"];
        $paciente->uf = $_POST["uf"];
        $data_nasc = $_POST["data_nasc"];
        $paciente->cep = $_POST["cep"];
        $paciente->responsavel = $_POST["responsavel"];

        if($_POST["data_nasc"] != null){
            $paciente->data_nasc = dateFormater($data_nasc);
        }

        if($_POST["opcao"] == "Cadastrar"){
            $paciente->cadastrar(); 
        }

        if($_POST["opcao"] == "Alterar"){
            $paciente->alterar();
        }

        if($_POST["opcao"] == "Excluir"){
            $paciente->excluir();
        }

        if($_POST["opcao"] == "Listar"){
            $tabela = montaTabelaPacientes();
            echo($tabela);
        }
    }
?>