<?php 
    class ListarProdutoPorIdCommand{

        private ProdutoService $ProdutoService;

    public function __construct(ProdutoService $ProdutoService){
        $this->ProdutoService = $ProdutoService;
    }

    public function execute($id):Produto{
        return $this->ProdutoService->pegaProdutoPorId($id);
    }
    }
?>