<?php
class ListarProdutoCommand{
    
    private ProdutoService $produtoService;

    public function __construct(ProdutoService $produtoService){
        $this->produtoService = $produtoService;
    }

    public function execute(){
        return $this->produtoService->listarProdutos();
    }
}
?>