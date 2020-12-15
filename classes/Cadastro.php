<?php

//Chama a conexão com o banco de dados.
require_once("Conexao.php");

class Cadastro{

    /* Validade se está sendo cadastrado produto ou categoria */
    public function Valida(){

        /* Recebe o nome da categoria */
        @$categoria = $_POST['categoria'];
        
        /* Recebe os dados do produto */
        $nome = $_POST['produto'];
        $marca = $_POST['marca'];
        $preco = $_POST['preco'];
        $quantidade = $_POST['quantidade'];
        $categoria_selec = $_POST['categoria_selec'];
        
        //Instancia um objeto da classe conexão.
        $Conexao = new Conexao();
        $Conexao->Conecta();

        if(!empty($_REQUEST['param']) && $_REQUEST['param'] == 'Cadastrar Categorias' && !empty($categoria)){
            //Insere a categoria no banco de dados
            $sql = ("INSERT INTO categorias (categoria) VALUES ('".$categoria."')");
            $Conexao->conexao->query($sql);
        }
        
        else if (!empty($_REQUEST['param']) && $_REQUEST['param'] == 'Cadastrar Produtos'){
            //select no id da categoria para adicionar como chave estrangeira em produto
            $sql = $Conexao->conexao->query("SELECT id_categoria FROM categorias where categoria = '".$categoria_selec."' "); 
            $categoria_id = ($sql->fetch(\PDO::FETCH_COLUMN));
            //Insere o produto no banco de dados
            $sql = ("INSERT INTO produtos (categoria_id,nome,marca,preco,quantidade) VALUES ('".$categoria_id."','".$nome."','".$marca."','".$preco."','".$quantidade."')");
            $Conexao->conexao->query($sql);
        }

    }
}
$execute = new Cadastro();
$execute->Valida();
?>