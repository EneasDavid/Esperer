<?php

class CadastrarProdutoCommand{

    private ProdutoService $produtoService;

    public function __construct(ProdutoService $produtoService){
        $this->produtoService = $produtoService;
    }

    public function execute(Produto $produto):void{
        $this->produtoService->cadastrarProduto($produto);
    }
}
?>