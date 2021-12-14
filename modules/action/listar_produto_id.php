<?php 
    class ListarProdutoPorIdCommand{

        private ProdutoService $podutoService;

        public function __construct(ProdutoService $produtoService){
            $this->produtoService = $produtoService;
        }
        public function execute($id):Produto{
            return $this->produtoService->pegaProdutoPorId($id);
        }
    }
?>