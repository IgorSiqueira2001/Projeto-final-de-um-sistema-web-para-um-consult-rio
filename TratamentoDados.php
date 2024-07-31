<?php
    include_once("Config.php");
    use Modelo\Tratamento;
    use Modelo\Paciente;

    $Paciente = new Paciente();
?>
    
    <form action="TratamentoDados.php" method="POST">
        <label for="id_paciente" class="form-label">id do Paciente:</label>
            <input type="text" class="form-control" id="id_paciente" value="<?= $Paciente->$id?>" placeholder="Digite o id do Paciente" name="id_paciente">
        <label for="data_inicio" class="form-label">Data do início do tratamento:</label>
            <input type="text" class="form-control" id="data_inicio" placeholder="Digite a data do tratamento" name="data_inicio">
        <label for="data_termino" class="form-label">Data de término:</label>
            <input type="text" class="form-control" id="data_termino" placeholder="Digite a data do término do tratamento" name="data_termino">
        <!-- Fazer uma tabela de serviços para poder adicionar na outra tabela ao lado da do serviço, 
        parecido com a venda do exe passado-->
        <br><div class="btn-group">
            <button type="button" class="btn btn-primary">Cadastrar</button>
            <button type="button" class="btn btn-primary">Alterar</button>
            <button type="button" class="btn btn-primary">Pesquisar</button>
            <button type="button" class="btn btn-primary">Excluir</button>
        </div> 
    </form>
    <?php
        include __DIR__.("/Include/Footer.php");
    ?>
    <div class="tabela">
       <div class="container-fluid">
           oi
       </div>    
       <div class="container-fluid">
           oi
       </div>    
    </div>