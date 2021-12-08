<?php
class AtualizarProdutoCommand{
    
    private ProdutoService $ProdutoService;

    public function __construct(ProdutoService $ProdutoService){
        $this->ProdutoService = $ProdutoService;
    }

    public function execute(Produto $Produto):void{
        $this->ProdutoService->atualizarProduto($Produto);
    }
}
?>