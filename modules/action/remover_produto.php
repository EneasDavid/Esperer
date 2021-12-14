<?php
class RemoverProdutoCommand{
    private ProdutoService $produtoService;

    public function __construct(ProdutoService $produtoService){
        $this->produtoService = $produtoService;
    }

    public function execute($id){
         $this->produtoService->removerProduto($id);
         $mensagem = "Produto removido com sucesso!";
         header("Location: http://localhost:8000/ListaProdutos.php?acao=listarProdutos&m={$mensagem}");
        }

}
?>