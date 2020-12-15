<?php

/* Constantes */
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DBNAME', 'cadastros');
define('PORT', '');
define('METATAG','utf8');

/* Conexão */
class Conexao {

    public $conexao;
    
    function Conecta ()
    {
		try
		{
			$this->conexao = new pdo('mysql:host=' . HOST . ';port=' . PORT . ';dbname=' . DBNAME . ';charset=utf8', USER, PASS);
		}
		catch (PDOException $e)
		{
			echo "Erro: A conexão com banco de dados não foi realizada com sucesso. Erro gerado " . $e->getMessage();
		}
	}
}
