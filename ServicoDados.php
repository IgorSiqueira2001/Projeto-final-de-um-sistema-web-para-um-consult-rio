<?php
    include_once("Config.php");
    require_once "Funcoes.php";
    
    use Modelo\Servico;

    $servico = new Servico;

    if(isset($_GET['op'])){
        if($_GET['op'] == 1){
            $servico = Servico::getServicosCodigo($_GET['id']);
        }
    }
?>
    
    <form action="ServicoFront.php" method="POST">
        <input type="text" value="<?= $servico->id?>" name="id" class="oculto">
        <label for="servico" class="form-label">Tipo de Serviço:</label>
            <input type="text" class="form-control" id="servico" placeholder="Digite o serviço" name="tiposervico" value="<?= $servico->servico?>">
        <label for="preco" class="form-label">Preço do Serviço:</label>
            <input type="text" class="form-control" id="preco" placeholder="Digite o preço do serviço" name="preco" value="<?= $servico->preco?>"><br>
        <div class="btn-group">
            <button type="submit" name="opcao" value="Cadastrar" class="btn btn-primary">Cadastrar</button>
            <button type="submit" name="opcao" value="Alterar" class="btn btn-primary">Alterar</button>
            <button type="submit" name="opcao" value="Excluir" class="btn btn-primary">Excluir</button>
            <button type="submit" name="opcao" value="Servicos" class="btn btn-primary">Serviços</button>
        </div>
    </form>

<?php
    if(isset($_POST['tiposervico'])){
        $servico->id = $_POST['id'];
        $servico->servico = $_POST["tiposervico"];
        $servico->preco = $_POST["preco"];

        if($_POST['opcao'] == "Cadastrar"){
            $servico->cadastrar();
        }

        if($_POST['opcao'] == "Servicos"){
            $tabela = montaTabelaServicos();
            echo($tabela);
        }

        if($_POST['opcao'] == 'Excluir'){
            $servico->excluir();
        }


    }
    ?>