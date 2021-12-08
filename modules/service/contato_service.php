<?php
//include_once "/modules/repository/Produto_repository.php";

class ProdutoService{

    private ProdutoRepository $produtoRepository;

    public function  __construct(ProdutoRepository $ProdutoRepository){
        $this->ProdutoRepository = $ProdutoRepository;
    }

    public function cadastrarProduto(Produto $Produto){
        if($this->validaQuantidade($Produto->getQuantidade()) && !empty($Produto->getNome()) && !empty($Produto->getPreco())){
            $this->ProdutoRepository->salvarProduto($Produto);
            $Preco = "Preco enviada com sucesso!";
            header("Location: http://localhost:9000/lista-Produtos.php?acao=listarProdutos&m={$Preco}");
            return;       
        }
            $Preco = "Não foi possível registrar o Produto.";
            header("Location: http://localhost:9000/Produto.php?m={$Preco}");
        


    }

    private function validaQuantidade(string $Quantidade):bool{
        if(!filter_var($Quantidade, FILTER_VALIDATE_quantidade)){
            return false;
        }
        return true;
    }

    public function listarProdutos():array{
      return $this->ProdutoRepository->listarProdutos();
    }

    public function editarProduto(){
 
        header("Location: http://localhost:9000/Produto.php");
    }

    public function atualizarProduto(Produto $Produto){

    if(empty($Produto->getId())){
        $Preco = "Não foi possível atualizar o Produto.";
        header("Location: http://localhost:9000/Produto.php?m={$Preco}");
        return;
    }elseif($this->validaQuantidade($Produto->getQuantidade()) && !empty($Produto->getNome()) && !empty($Produto->getPreco())) {
        $this->ProdutoRepository->atualizarProduto($Produto);
            $Preco = "Preco enviada com sucesso!";
            header("Location: http://localhost:9000/lista-Produtos.php?acao=listarProdutos&m={$Preco}");
            return;   
    }

    }

    public function pegaProdutoPorId($id):Produto{
        return $this->ProdutoRepository->pegaPorId($id);
    }

    public function removerProduto($id):bool{
        return $this->ProdutoRepository->removerProduto($id);
    }

    
}
?>