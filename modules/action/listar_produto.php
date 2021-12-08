<?php
class ListarProdutoCommand{
    
    private ProdutoService $ProdutoService;

    public function __construct(ProdutoService $ProdutoService){
        $this->ProdutoService = $ProdutoService;
    }

    public function execute(){
        return $this->ProdutoService->listarProdutos();
    }
}
?>