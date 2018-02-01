<?php   
    include("conecta.php");
    function listaProduto($conexao){
        $produtos = array();
        $resultadoQuery = mysqli_query($conexao,"select p.*,c.nome as categoria_nome from produtos as p join categorias as c on c.id=p.categoria_id");
        while($produto = mysqli_fetch_assoc($resultadoQuery)){
            array_push($produtos,$produto);
        }
    
        return $produtos;
    }
    function buscaProduto($conexao,$id){
        $query = "SELECT * FROM produtos WHERE id = {$id}";
        $resultadoQuery = mysqli_query($conexao,$query);
        return mysqli_fetch_assoc($resultadoQuery);
    }
    function insereProduto($conexao,$nome_produto,$preco_produto,$descricao_produto,$categoria_produto,$usado){
        $query = "insert into produtos (nome,preco,descricao,categoria_id,usado) values ('{$nome_produto}',{$preco_produto},'{$descricao_produto}',{$categoria_produto},{$usado})";
        if($conexao != NULL && $nome_produto != "" && $preco_produto != ""){
            return mysqli_query($conexao,$query);
        }
        return NULL;
    
    }

    function alteraProduto($conexao, $id,$nome_produto,$preco_produto,$descricao_produto,$categoria_produto,$usado){
        $query = "update produtos set nome = '{$nome_produto}' , preco = {$preco_produto} , descricao = '{$descricao_produto}' , categoria_id = {$categoria_produto}, usado = {$usado} where id = '{$id}'";
        return mysqli_query($conexao,$query);
    }

    function removeProduto($conexao,$id){
        $query = "delete from produtos where id={$id}";
        return(mysqli_query($conexao,$query));
    }
