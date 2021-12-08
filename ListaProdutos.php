<?php
//error_reporting(E_ERROR | E_PARSE);
include_once 'app_controller.php';
include_once 'action/listar_produto_id.php';
$id = $_GET['id'];
if(isset($id)){
$listarProdutoCommand = new ListarProdutoPorIdCommand($produtooService);
$produto = $listarProdutoCommand->execute($id);
//$produto = $produtoService->pegaProdutoPorId($id);
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="ISO-8859-1">
	<link rel="icon" href="logo topo.jpeg" type="image/x-icon">
        <title>Lista de Produtos</title>
        <link rel="stylesheet" href="CSS/zerar.css">
        <link rel="stylesheet" href="CSS/style.css">
        <script src="https://kit.fontawesome.com/9d829953b5.js" crossorigin="anonymous"></script>
    <head>
    <body>
         <header>
             <nav>
                 <a href="https://lojaesperer.kyte.site/"><img src="logo.png" alt=""><a>
                 <ul style="margin-right: 20px;">
                     <li><a href="mailto:boutique.esperer@gmail.com?Subject=Ola%20gostarai%20de%20falar%20com%20voces" title="Contato"><i class="fas fa-phone-alt"></i></a></li>
                     <li><a href="index.php" title="Cadastrar Produtos"><i class="fas fa-home"></i></a></li>
                </ul>
            </nav>
        </header>
        <main>
            <div class="exibicao">
                <div>
                    <h1>Lista de Produtos</h1>
                   	<div style="margin: 50px;">
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Peça</th>
                                <th>Quantidade</th>
                                <th>Valor</th>
                                <th>Ajuste</th>
                            </tr>
                        </thead>
                          <c:forEach var = "Produtos" items = "${produtos}">
                            <tr class="peca">
                                <td>${Produtos.id}</td>
                                <td>${Produtos.peca}</td>
                                <td>${Produtos.quantidade}</td>
                                <td>R$ ${Produtos.preco}</td>
                                <td><a href="AtualizarProdutos.HTML">Editar</a> | <a href="ProdutoServlet?acao=excluir&id=${Produtos.id}">Excluir</a></td>
                            </tr>
						</c:forEach>
                </table>
                    
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