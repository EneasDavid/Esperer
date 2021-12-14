<?php


class ProdutoRepository{
  
    private Conexao $conexao;

    public function __construct(Conexao $conexao){
        $this->conexao = $conexao;
    }

    public function salvarProduto(Produto $produto){
        $mysql_con = $this->conexao->conecta();
        $query = "insert into Produto(nome, quantidade, preco) values ('{$produto->getNome()}','{$produto->getQuantidade()}','{$produto->getPreco()}')";
        $sucesso = $mysql_con->query($query);
        
        if($sucesso === TRUE){
            echo "Produto registrado com sucesso!";
            return;
        }else{
            echo "Ocorreu o seguinte erro ao executar a consulta: ".$mysql_con->error.PHP_EOL;
            echo "Consulta: ".$query;
        }
        $this->conexao->desconecta();
        return $sucesso;
    }


    public function listarProdutos():array{
        $query = "select id, nome, quantidade, preco from produto;";       
        $mysql_con = $this->conexao->conecta();
        $resultSet = $mysql_con->query($query);

        $Produtos = array();

        if($resultSet->num_rows > 0){
            while ($linha = $resultSet->fetch_assoc()) {
                $produto = new Produto( $linha['nome'],$linha['quantidade'],$linha['preco']);
                $produto->setId($linha['id']);
                
                
                array_push($Produtos, $produto);
            }
        }
            return $Produtos;
    }


    public function atualizarProduto(Produto $Produto){
        $mysql_con = $this->conexao->conecta();
        $query = "update Produto set nome='{$Produto->getNome()}', quantidade='{$Produto->getquantidade()}', preco='{$Produto->getpreco()}' where id='{$Produto->getId()}'";
        $sucesso = $mysql_con->query($query);

        if($sucesso === TRUE){
            echo "Produto registrado com sucesso!";
            return;
        }else{
            echo "Ocorreu o seguinte erro ao executar a consulta: ".$mysql_con->error.PHP_EOL;
            echo "Consulta: ".$query;
        }
        $this->conexao->desconecta();
        return $sucesso;
    }

    public function pegaPorId(int $id):Produto{
        $mysql_con = $this->conexao->conecta();
        $query = "select id, nome, quantidade, preco from Produto where id=$id;";
        $resultSet = $mysql_con->query($query);
        $Produto = null;
        if($resultSet->num_rows > 0){
            $linha = $resultSet->fetch_assoc();
            $Produto = new Produto($linha['nome'],$linha['quantidade'],$linha['preco']);
            $Produto->setId($linha['id']);
        }
        if($resultSet === FALSE){
            echo "Ocorreu o seguinte erro ao executar a consulta: ".$mysql_con->error.PHP_EOL;
            echo "Consulta: ".$query;
        }
        $this->conexao->desconecta();
        return $Produto;
    }

    public function removerProduto($id):bool{
        $mysql_con = $this->conexao->conecta();
        $query = "delete from Produto where id='$id';";
        $sucesso = $mysql_con->query($query);

       /* if($resultSet === TRUE){
            echo 'Produto removido com sucesso.';
            }
           else{
        echo 'Ocorreu o seguinte erro ao remover o Produto: '.$mysql_con->error.PHP_EOL;
              echo 'Consulta '.$query;
           }*/
            return $sucesso;
    }
}



?>