<?php
    require_once("Config.php");
    use Modelo\Paciente;
    use Modelo\Servico;


    function dateFormater($data){
        if(isset($data)){
            $dados = explode("/", $data);

            $day = trim($dados[0]);
            $month = trim($dados[1]);
            $year = trim($dados[2]);

            $dataBanco = $year . $month . $day;
        }

        return $dataBanco;
    }

    /*function imprimeTabela($lista){
        $resultados = "";
        foreach($lista as $l){
            $paciente = Paciente::getPacientespNome();
            $tabela .= "<tr>";

                $tabela .= "<td>". $paciente->id . "</td>";
                $tabela .= "<td>". $paciente->nome . "</td>";
                $tabela .= "<td>". $paciente->telefone . "</td>";
                $tabela .= "<td>". $paciente->endereco . "</td>";
                $tabela .= "<td>". $paciente->cidade . "</td>";
                $tabela .= "<td>". $paciente->uf . "</td>";
                $tabela .= "<td>". $paciente->cep . "</td>";
                $tabela .= "<td>". $paciente->data_nasc . "</td>";
                $tabela .= "<td>". $paciente->responsavel . "</td>";     
            
            $tabela .= "</tr>";
            $resultados .="<main>";
            $resultados .="<div class='container'>". "<table class='table table-sm'>";
                $resultados .="<thread><tr>";
                    $resultados .= "<td>Codigo</td>";
                    $resultados .= "<td>Nome</td>";
                    $resultados .= "<td>Telefone</td>";
                    $resultados .= "<td>Endereço</td>";
                    $resultados .= "<td>Cidade</td>";
                    $resultados .= "<td>UF</td>";
                    $resultados .= "<td>CEP</td>";
                    $resultados .= "<td>Data de Nascimento</td>";
                    $resultados .= "<td>Responsável</td>";
                    $resultados .= "<tbody>";
                        $resultados .= "<?=" . $tabela . "?>";
                    $resultados .= "</tbody>";
                $resultados .= "</table>";
            $resultados .= "</div>";
            $resultados .= "</main>";
                $resultados .= "</tr>";
        
            return $resultados;
        }
    }*/

    function retornaTamanhoLista($lista){
        
        $tam = sizeof($lista, 0);
        return $tam;
    }

    function montaTabelaPacientes(){
        $paciente = Paciente::getPacientes();
        $tabela = " ";
        
        foreach($paciente as $p){

            //quando for fazer tabela de pacientePNome colocar somente um if, if($p->nome == $dado).
            $tabela .= "<tr>";
                $tabela .= "<td>". $p->id . "</td>";
                $tabela .= "<td>". $p->nome . "</td>";
                $tabela .= "<td>". $p->telefone . "</td>";
                $tabela .= "<td>". $p->endereco . "</td>";
                $tabela .= "<td>". $p->cidade . "</td>";
                $tabela .= "<td>". $p->uf . "</td>";
                $tabela .= "<td>". $p->cep . "</td>";
                $tabela .= "<td>". $p->data_nasc . "</td>";
                $tabela .= "<td>". $p->responsavel . "</td>";
                $tabela .= "<td>" . "<a href='PacienteFront.php?op=1&id=$p->id' class='btn btn-primary'>". 'Editar'. "</a>". "</td>";
            $tabela .= "</tr>";
        } 
        $tabelaFormatada = editaTabelaP($tabela);
             
        return $tabelaFormatada;
    }

    function editaTabelaP($dados){
        $resultados = " ";
        $tabela = $dados;

        $resultados .="<main>";
            $resultados .="<div class='container'>". "<table class='table table-sm'>";
                $resultados .="<thread><tr>";
                    $resultados .= "<th>Codigo</th>";
                    $resultados .= "<th>Nome</th>";
                    $resultados .= "<th>Telefone</th>";
                    $resultados .= "<th>Endereço</th>";
                    $resultados .= "<th>Cidade</th>";
                    $resultados .= "<th>UF</th>";
                    $resultados .= "<th>CEP</th>";
                    $resultados .= "<th>Data de Nascimento</th>";
                    $resultados .= "<th>Responsável</th>";
                    $resultados .= "<tbody>";
                        $resultados .= $tabela;
                    $resultados .= "</tbody>";
                $resultados .= "</table>";
            $resultados .= "</div>";
            $resultados .= "</main>";
                $resultados .= "</tr>";
        
        return $resultados;
    }

    function montaTabelaServicos(){
        $servico = Servico::getServicos();
        $tabela = " ";

        foreach($servico as $s){

            //quando for fazer tabela de pacientePNome colocar somente um if, if($p->nome == $dado).
            $tabela .= "<tr>";
                $tabela .= "<td>". $s->id . "</td>";
                $tabela .= "<td>". $s->servico . "</td>";
                $tabela .= "<td>". $s->preco . "</td>";
                $tabela .= "<td>" . "<a href='ServicoFront.php?op=1&id=$s->id' class='btn btn-primary'>". 'Editar'. "</a>". "</td>";
            $tabela .= "</tr>";
        } 
        $tabelaFormatada = editaTabelaS($tabela);
             
        return $tabelaFormatada;
    }

    function editaTabelaS($tabela){
        $resultados = " ";

        $resultados .="<main>";
            $resultados .="<div class='container'>". "<table class='table table-sm'>";
                $resultados .="<thread><tr>";
                    $resultados .= "<th>Codigo</th>";
                    $resultados .= "<th>Tipo de Serviço</th>";
                    $resultados .= "<th>Preço</th>";
                    $resultados .= "<tbody>";
                        $resultados .= $tabela;
                    $resultados .= "</tbody>";
                $resultados .= "</table>";
            $resultados .= "</div>";
            $resultados .= "</main>";
                $resultados .= "</tr>";
        
        return $resultados;
    }
?>