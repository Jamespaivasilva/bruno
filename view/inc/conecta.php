<?php
// Constantes com os parâmetros de acesso ao BD
    define("SERVIDOR", "localhost");
    define("USUARIO", "root");
    define("SENHA", "");
    define("BANCO", "db_searchnow");

// Script para conexão ao servidor de BD usando o driver/API MySQLi orientado a objetos
$conexao = new MySQLi(SERVIDOR, USUARIO, SENHA, BANCO);

// Definindo o padrão de caracteres para a conexão
$conexao->set_charset("utf8");

// Se houver algum erro durante a conexão, mostre o erro
if ($conexao->connect_errno){
    die("Erro ao conectar: " .$conexao->connect_error);
}
?>