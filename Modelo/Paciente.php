<?php
    namespace Modelo;

    use \Banco\Database;
    use \PDO;

    class Paciente{

        public $id=0;
        public $nome; 
        public $telefone;
        public $endereco;
        public $cidade;
        public $uf;
        public $cep;
        public $data_nasc;
        public $responsavel;


        public function cadastrar(){
            $objDatabase = new Database('paciente');
            $id = $objDatabase->insert([
                'id' => $this->id,
                'nome' => $this->nome,
                'telefone' =>$this->telefone,
                'endereco' =>$this->endereco,
                'cidade' =>$this->cidade,
                'uf' =>$this->uf,
                'cep' =>$this->cep,
                'data_nasc' =>$this->data_nasc,
                'responsavel' =>$this->responsavel                
            ]);
        }

        public function alterar(){
            return (new Database('paciente'))->update('id=' . $this->id, [
                'nome' => $this->nome,
                'telefone' =>$this->telefone,
                'endereco' =>$this->endereco,   
                'cidade' =>$this->cidade,
                'uf' =>$this->uf,
                'cep' =>$this->cep,
                'data_nasc' =>$this->data_nasc,
                'responsavel' =>$this->responsavel  
            ]);
        }

        public function excluir(){
            return (new Database('paciente'))->delete('id=' . $this->id);
        }

        public static function getPacientes($where = null, $order = null, $limit = null){
            return(new Database('paciente'))->select($where, $order, $limit)
                ->fetchAll(PDO::FETCH_CLASS, self::class);
        }

        public static function getPacientespNome($name){
            $nome = "'" . $name . "%" . "'";
            return(new Database('paciente'))->select('nome '. 'like ' . $nome, "", "")
                ->fetchAll(PDO::FETCH_CLASS, self::class);
        }

        public static function getPacientepCodigo($codigo){
            return(new Database('paciente'))->select('id=' . $codigo)
                ->fetchObject(self::class);
        }

    }

?>