<?php
//Desenvolvido por Felipe Rudek Schner -  19-06-2024


session_start();
require_once("views/portal/verifica.php");
require_once("classes/conexao.class.php");
require_once("funcoes/funcoes.php");
$si = $_SESSION['login'];
$no = $_SESSION['nome'];
$gr = $_SESSION['grupos'];

$objetoConexaosql = new Conexao_pdosql();
$connpdo = $objetoConexaosql->conectar_pdosql();

//DEFINIR OS CABEÇALHOS DE PERMISSÃO DE ACESSO A API
header('Content-Type: text/html; charset=UTF-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header('Access-Control-Allow-Headers: Content-Type');


if($_SERVER['REQUEST_METHOD'] === 'GET'){

    // SOLICITAR AO BANCO PARA PEGAR DADOS DA TABELA
    $query = "select id, tipo, link, 'nivel3' as nivel 
                from card 
                union all
                select Id2 as id, titulo as tipo, link, 'nivel2' as nivel 
                from vertical 
                order by tipo asc;";
    $stmt = $connpdo->prepare($query);
    $stmt->execute();
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    
    
    http_response_code($users ? 200 : 400);
    //200 - OK
    //400 - ERRO
    
    //RESPOSTA
    echo json_encode($users);
    
    
    }
