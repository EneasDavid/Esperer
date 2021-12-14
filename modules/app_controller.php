<?php

require_once 'service/produto_service.php';
require_once 'action/cadastrar_Produto.php';
require_once 'action/atualizar_Produto.php';
require_once 'action/remover_Produto.php';
require_once 'action/listar_Produto.php';
require_once 'entity/Produto.php';
require_once 'repository/Produto_repository.php';
require_once 'action/listar_Produto_id.php';
require_once 'repository/infra/conexao.php';



define('dadosConexao',[
    'host' => 'localhost',
    'usuario'=> 'esperer',
    'senha' => 'esperer',
    'bd' => 'esperer'
]);


$conexao = new Conexao(dadosConexao['host'],dadosConexao['usuario'],dadosConexao['senha'],dadosConexao['bd']);
    
$produtoRepository = new ProdutoRepository($conexao);
$produtoService = new ProdutoService($produtoRepository);
$produto = null;
$produtos = array();

$listaDeComandos = [
    'cadastrarProduto'=> new CadastrarProdutoCommand($produtoService),
    'atualizarProduto'=> new AtualizarProdutoCommand($produtoService),
    'removerProduto'=> new RemoverProdutoCommand($produtoService),
    'listarProdutos'=> new ListarProdutoCommand($produtoService),
    'listarProdutoPorId'=> new ListarProdutoPorIdCommand($produtoService)  
];


if($_SERVER['REQUEST_METHOD'] == 'POST'){
   //echo PHP_EOL.' METODO '.$acao;
   if(array_key_exists('acao',$_POST)){
     $acao = $_POST['acao'];
     $comando = $listaDeComandos[$acao];

     $produto = produtoMapper($_POST);

     $comando->execute($produto);
    }else{
     echo 'chave não encontrada.';
    }}else{
         if(array_key_exists('acao',$_GET)){
             $acao = $_GET['acao'];     
             $comando = $listaDeComandos[$acao];  
             if($acao == 'removerProduto'){
                  $comando->execute($_GET['id']);
             }
         $produtos =  $comando->execute($produto);
        }
}

function produtoMapper(array $httpMethod):Produto{
    $novoProduto = new Produto($httpMethod['nome'],$httpMethod['quantidade'],$httpMethod['preco']);
    $id = $httpMethod['id'];
    if(isset($id)){
        $novoProduto->setId(intval($id));
    }
    return $novoProduto;    
}



?>