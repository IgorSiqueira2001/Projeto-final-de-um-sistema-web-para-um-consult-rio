<?php
    namespace Modelo;

    use \Banco\Database;
    use \PDO;

    class Servico{
        public $id=0;
        public $servico;
        public $preco;

        public function cadastrar(){
            $ObjDatabase = new Database('servico');
            $id = $ObjDatabase->insert([
                'id' => $this->id,
                'servico' => $this->servico,
                'preco' => $this->preco
            ]);
        }

        public function alterar(){
            return (new Database('servico'))->update('id=' . $this->id, [
                'servico' => $this->servico,
                'preco' => $this->preco
            ]);
        }

        public function excluir(){
            return (new Database('servico'))->delete('id=' . $this->id);
        }

        public function getServicos($where = null, $order = null, $limit = null){
            return (new Database('servico'))->select($where, $order, $limit)
                ->fetchAll(PDO::FETCH_CLASS, self::class);
        }

        public function getServicosCodigo($codigo){
            return (new Database('servico'))->select('id=' . $codigo)
                ->fetchObject(self::class);
        }
    }
?>