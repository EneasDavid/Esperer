<?php
class Produto{
    private int $id;
    private string $nome;
    private int $quantidade;
    private float $preco;

    public function __construct(string $nome, int $quantidade, float $preco){
        $this->nome = $nome;
        $this->quantidade = $quantidade;
        $this->preco = $preco;
    }

    public function getId():int{
        return $this->id;
    }

    public function setId(int $id):void{
        $this->id = $id;
    }

    public function getNome():string{
        return $this->nome;
    }
    

    public function getQuantidade():int{
        return $this->quantidade;
    }

    public function getPreco():float{
        return $this->preco;
    }
}
?>