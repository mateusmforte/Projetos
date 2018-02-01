<?php 
    include("cabecalho.php");
    include("conecta.php");
    include("banco-categoria.php");
    include("banco-produto.php");

    $id = $_POST['id'];
    $produto = buscaProduto($conexao,$id);
    $categorias = listaCategorias($conexao);
    $usado = $produto['usado'] ? 'checked = "checked"' : "";
?>
    <h1>Alteração de Produto</h1>
    <form action="altera-produto.php" method="POST">
        <table class="table">
            <input type="hidden" name="id" value="<?=$produto['id']?>";
            <tr>
                <td><label for="produto">Nome do Produto: </label></td>
                <td><input class="form-control"type="text" name="nome_produto" id="produto" value="<?=$produto['nome']?>"></td>
            </tr>
            <tr>
                <td><label for="preco">Preço do Produto: </label></td>
                <td><input class="form-control" type="number" name="preco_produto" id="preco" value="<?=$produto['preco']?>"></td>
            </tr>
            <tr>
            <tr>
                <td></td>
                <td><input type="checkbox" name="usado" <?=$usado?> value="true">Usado</td>
            </tr>
                <td><label for="categoria">Categoria: </td>
                <td>
                    <select name="categoria_produto" class="form-control">
                    <?php foreach($categorias as $categoria): 
                        $essaEhACategoria =  $produto['categoria_id'] == $categoria['id'];
                        $selecao = $essaEhACategoria ? "selected='selected'" : "";
                        ?>
                        <option value="<?=$categoria['id']?>" id="categoria_produto" <?=$selecao?>>
                        <?=$categoria['nome']?></br>
                    <?php endforeach?>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="descricao">Descrição do Produto: </label></td>
                <td><textarea class="form-control"name="descricao_produto" id="descricao"><?=$produto['descricao']?></textarea></td>
            </tr>
            <tr>
                <td><button class="btn btn-warning" type="submit">Alterar</button></td>
            </tr>
        </table>
    </form> 
<?php include("rodape.php")?>