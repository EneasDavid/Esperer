<?php
include_once "modules/repository/produto_repository.php";

class ProdutoService{

    private ProdutoRepository $produtoRepository;

    public function  __construct(ProdutoRepository $ProdutoRepository){
        $this->ProdutoRepository = $ProdutoRepository;
    }

    public function cadastrarProduto(Produto $Produto){
        if($this->validaQuantidade($Produto->getQuantidade()) && !empty($Produto->getNome()) && !empty($Produto->getPreco())){
            $this->ProdutoRepository->salvarProduto($Produto);
            $mensagem = "Produto cadastrado com sucesso!";
            header("Location: http://localhost:8000/m={$mensagem}");
            return;       
        }
        $mensagem = "Erro ao cadastrar podruto!";
            header("Location: http://localhost:8000/m={$mensagem}");
        


    }

    private function validaQuantidade(int $Quantidade):bool{
        if(!filter_var($Quantidade)){
            return false;
        }
        return true;
    }

    public function listarProdutos():array{
      return $this->ProdutoRepository->listarProdutos();
    }

    public function editarProduto(){
        $mensagem = "Produto editado com sucesso!";
        header("Location: http://localhost:8000/index.phpm={$mensagem}");
    }

    public function atualizarProduto(Produto $Produto){

    if(empty($Produto->getId())){
        $mensagem = "Não foi possível atualizar o Produto.";
        header("Location: http://localhost:8000/index.php?m={$mensagem}");
        return;
    }elseif($this->validaQuantidade($Produto->getQuantidade()) && !empty($Produto->getNome()) && !empty($Produto->getPreco())) {
        $this->ProdutoRepository->atualizarProduto($Produto);
            $mensagem = "Produto cadastrado com sucesso!";
            header("Location: http://localhost:8000/index.php?m={$mensagem}");
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