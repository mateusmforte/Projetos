<?php 
 include("cabecalho.php");
 include("conecta.php");
 include("banco-produto.php");

 if(array_key_exists("removido",$_GET) && $_GET['removido']==true){
    echo "<p class='alert-success'>Produto removido com sucesso!</p>";
 }
?>

<table class="table table-striped table-bordered">  
<?php
    $produtos = listaProduto($conexao);
    foreach($produtos as $produto):
    ?>
        <tr>
            <td><?=$produto['nome']?></td>
            <td><?=$produto['preco']?></td>
            <td><?=$produto['categoria_nome']?></td>
            <td><?=substr($produto['descricao'],0,40)."..."?></td>
            <td><?=($produto['usado'] == 0) ? 'Não usado' : 'Usado'?></td>
            <td>
                <form action="altera-formulario.php" method="POST">
                    <input type="hidden" name="id" value="<?=$produto['id']?>">
                    <button class="btn btn-warning">Alterar</button>
                </form>
            </td>
            <td>
                <form action="remove-produto.php" method="POST">
                    <input type="hidden" name="id" value="<?=$produto['id']?>">
                    <button class="btn btn-danger">Remover</button>
                </form>
            </td>
        </tr>
    <?php
    endforeach

    ?>
</table>
<?php include("rodape.php");?>