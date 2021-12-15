<?php
//truncate produto; -- zerar tableta no termianou
//error_reporting(E_ERROR | E_PARSE);
require_once 'modules/service/produto_service.php';
include_once 'modules/app_controller.php';
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
        <?php
            $listaDeProdutos = $produtos;
        ?>

            <div class="exibicao">
                <div>
                    <h1 style="padding: 3%;">Lista de Produtos</h1>
                   	<div style="display:flex;flex-direction: column;align-items: center;justify-content: space-between;">
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Peça</th>
                                <th>Quantidade</th>
                                <th>Valor</th>
                                <th colspan="2" id="tabela-produto-acao" style="text-align: center;width: auto;">Ajuste</th>
                            </tr>
                        </thead>
                        <tbody>
                         <?php foreach ($listaDeProdutos as $produto){
                          ?>         
                         <tr>
                         <td><?=$produto->getId() ?></td>
                         <td><?=$produto->getNome() ?></td>
                         <td><?=$produto->getQuantidade() ?></td>
                         <td><?=$produto->getPreco() ?></td>
                         <td><a href=<?="index.php?id={$produto->getId()}" ?>>Editar</a></td>
                         <td><a href=<?="modules/app_controller.php?acao=removerProduto&id={$produto->getId()}" ?>>Remover</a></td>           
                         </tr>
                         <?php }?>
                        </tbody>
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