<?php
    namespace Modelo;

    use \Banco\Database;
    use \PDO;


    class Tratamento{
        public $id; 
        public $id_paciente;
        public $data_inicio;
        public $data_termino;
        public $total;
        public $itensTratamento = array();

        public function cadastrar(){
            $ObjDatabase = new Database('tratamento');
            $id = $ObjDatabase->insert([
                'id_paciente' => $this->id_paciente,
                'data_inicio' =>$this->data_inicio,
                'data_termino' =>$this->data_termino,
                'total' =>$this->total
            ]);

            $itens = $this->itensTratamento;
            $objDatabase = new Database('itensTratamento');
            foreach($itens as $it){
                $cod = $objDatabase->insert([
                    'id_tratamento' => $id,
                    'id_servico'=>$it['id_servico'],
                    'quantidade' => $it['quantidade'],
                    'preco' =>$it['preco']]);
            }
        }

        public function alterar(){
            return (new Database('tratamento'))->update('id=' . $this->id, [
                'id_paciente' => $this->id_paciente,
                'id_servico' => $this->id_servico,
                'data_inicio' =>$this->data_inicio,
                'data_termino' =>$this->data_termino,
                'total' =>$this->total
            ]);
        }

        public function excluir(){
            return (new Database('tratamento'))->delete('id=' . $this->id);
        }

        public function getTratamentos($where = null, $order = null, $limit = null){
            return (new Database('tratamento'))->select($where, $order, $limit)
                ->fetchALL(PDO::FETCH_CLASS, self::class);
        }

        public function getTratamentoCodigo($codigo){
            return (new Database('tratamento'))->select('id=' . $this->id)
                ->fetchObject(self::class);
        }

        public function totalItens(){
            return sizeof($this->itensTratamento);
        }

        /*public function adicionaItens(){
            $this->itensTratamento = array(
                'id_tratamento' => $this->id,
                'id_servico' => $this->id_servico,
                'quantidade' => 
            );
        }*/

    }
?>