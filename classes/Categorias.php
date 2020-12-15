
<?php
header("Content-Type: text/html; charset=UTF-8",true);
require_once("Conexao.php");

class Categorias {

    public function Select(){
         
        //Instancia um objeto da classe conexão.
        $Conexao = new Conexao();
        $Conexao->Conecta();
        
        $sql = $Conexao->conexao->query("SELECT categoria FROM categorias"); 
        $categorias =  Array($sql->fetchAll(\PDO::FETCH_COLUMN));

        echo json_encode(array($categorias),
        JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK);
    }

}

$execute = new Categorias();
$execute->Select();

?>