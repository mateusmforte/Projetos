<?php 
    include("cabecalho.php");
    include("conecta.php");
    include("banco-categoria.php");

    $categorias = listaCategorias($conexao);
?>
    <h1>Formulário de Produto</h1>
    <form action="adiciona-produto.php" method="POST">
        <table class="table">
            <tr>
                <td><label for="produto">Nome do Produto: </label></td>
                <td><input class="form-control"type="text" name="nome_produto" id="produto"></td>
            </tr>
            <tr>
                <td><label for="preco">Preço do Produto: </label></td>
                <td><input class="form-control" type="number" name="preco_produto" id="preco"></td>
            </tr>
            <tr>
            <tr>
                <td></td>
                <td><input type="checkbox" name="usado" value="true">Usado</td>
            </tr>
                <td><label for="categoria">Categoria: </td>
                <td>
                    <select name="categoria_produto" class="form-control">
                    <?php foreach($categorias as $categoria): ?>
                        <option value="<?=$categoria['id']?>" id="categoria_produto">
                        <?=$categoria['nome']?></br>
                    <?php endforeach?>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="descricao">Descrição do Produto: </label></td>
                <td><textarea class="form-control"name="descricao_produto" id="descricao"></textarea></td>
            </tr>
            <tr>
                <td><button class="btn btn-primary" type="submit">Cadastrar</button></td>
            </tr>
        </table>
    </form> 
<?php include("rodape.php")?>