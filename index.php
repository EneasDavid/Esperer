<?php
//Inicializar o php: php -S localhost:8000
error_reporting(E_ERROR | E_PARSE);
include_once 'modules/app_controller.php';
include_once 'modules/action/listar_produto_id.php';
$id = $_GET['id'];
if(isset($id)){
     $listarProdutoCommand = new ListarProdutoPorIdCommand($produtoService);
     $produto = $listarProdutoCommand->execute($id);
    // $produto = $produtoService->pegaProdutoPorId($id);
}
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="icon" href="IMG/logo topo.jpeg" type="image/x-icon">
        <title>Cadastro de produtos</title>
        <link rel="stylesheet" href="CSS/zerar.css">
        <link rel="stylesheet" href="CSS/style.css">
        <script src="https://kit.fontawesome.com/9d829953b5.js" crossorigin="anonymous"></script>
    <head>
    <body>
        <header>
            <nav>
                 <a href="https://lojaesperer.kyte.site/"><img src="IMG/logo.png" alt=""><a>
                 <ul style="margin-right: 20px;">
                     <li><a href="mailto:boutique.esperer@gmail.com?Subject=Ola%20gostarai%20de%20falar%20com%20voces" title="produto"><i class="fas fa-phone-alt"></i></a></li>
                     <li><a href="ListaProdutos.php?acao=listarProdutos" title="Lista de Produtos"><i class="fas fa-list-ol"></i></a></li>
                 </ul>
            </nav>
        </header>
        <main>
            <div class="exibicao" style="margin-bottom: 3%;margin-top: 3%;">
                <div>
                    <h1>Cadastro</h1>
                    <div style="margin: auto;margin-top: 8%;">
                        <form action="modules/app_controller.php" method="POST">
                        <input type="text" name="nome" style="width: 75%;" placeholder="Digite o nome da peça" value=<?=(is_null($produto) ? '' : "{$produto->getNome()}")?>>
                        <input type="hidden" name="id" id="id" value=<?=(is_null($produto) ? '' : "{$produto->getId()}")?>>
                        <input type="hidden" name="acao" id="acao"   value=<?=(is_null($produto) ? 'cadastrarProduto' : 'atualizarProduto')?>>
                        <div id="ultimosAjustes">
                            <div>
                                 <input type="number" name="quantidade" placeholder="Digite a quantidade" value=<?=(is_null($produto) ? '' : "{$produto->getQuantidade()}")?>>
                                 <input type="number" name="preco" step="0.010" placeholder="Digite o preço de venda" value=<?=(is_null($produto) ? '' : "{$produto->getPreco()}")?>>
                            </div>
                            <div>
                                 <button id="cadastrar-peca" type="submit"><?=(is_null($produto) ? 'Cadastrar' : 'Atualizar')?></button>
                            </div>
                        </div>
                        </from>
                    </div>
                </div>
                <div style="height: 20px;"></div>
            </div>
        </main>
        <footer>
            <selection>
                <address>© Copyright Boutique Esperér por Emanuele Maria</address>
                <ul class="rodape">
                    <li><a href="https://wa.me/+55081996376933" target="_blank">(81)99637-6933</a></li>
                    <li><a href="mailto:boutique.esperer@gmail.com" target="_blank" class="list-unstyled">boutique.esperer@gmail.com</a></li>
                    <li><a href="https://www.google.com/maps/place/Limoeiro+-+PE/@-7.8375469,-35.5109661,12z/data=!3m1!4b1!4m5!3m4!1s0x7abbc534bc4c1ad:0xeacf414e098f462c!8m2!3d-7.8771637!4d-35.4450892" target="_blank">Limoeiro, Pernambuco, Brasil.</a></li>
                </ul>
            </selection>
        </footer>
        </body>
</html>