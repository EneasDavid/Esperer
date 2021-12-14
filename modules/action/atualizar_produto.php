<?php
class AtualizarProdutoCommand{
    
    private ProdutoService $produtoService;

    public function __construct(ProdutoService $produtoService){
        $this->produtoService = $produtoService;
    }

    public function execute(Produto $produto):void{
        $this->produtoService->atualizarProduto($produto);
    }
}
?>