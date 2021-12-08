<?php
class RemoverProdutoCommand{
    private ProdutoService $ProdutoService;

    public function __construct(ProdutoService $ProdutoService){
        $this->ProdutoService = $ProdutoService;
    }

    public function execute($id){
         $this->ProdutoService->removerProduto($id);
         $mensagem = "Produto removido com sucesso!";
         header("Location: http://localhost:9000/lista-Produtos.php?acao=listarProdutos&m={$mensagem}");
        }

}
?>