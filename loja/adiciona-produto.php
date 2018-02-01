<?php 
     include("cabecalho.php");
     include("conecta.php");
     include("banco-produto.php");

   
    $produto = $_POST['nome_produto'];
    $preco = $_POST['preco_produto'];
    $descricao = $_POST['descricao_produto'];
    $categoria_produto = $_POST['categoria_produto'];
    if(array_key_exists('usado',$_POST)){
        $usado = "true";
    }else{
        $usado = "false";
    }
   
    
    if(insereProduto($conexao,$produto,$preco,$descricao,$categoria_produto,$usado)){
        echo"<h3 class='alert-success'>Produto ".$produto." no valor de R$".$preco." adicionado com sucesso!</h3>";
    }
    else{
        echo"<h3 class='alert-danger'>Produto ".$produto." não foi adicionado.</h3>";
        echo $msg = mysqli_error($conexao);
    }

    mysqli_close($conexao);
   
?>
<?php include "rodape.php"?>