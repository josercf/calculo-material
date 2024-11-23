<?php
//Diz ao PHP que vamos trabalhar usando o protocolo JSON para comunicação
header('Content-Type: application/json');

//Verificamos se a requisição é do tipo POST,
//Caso não seja, retornamos uma mensagem de erro
if($_SERVER['REQUEST_METHOD'] == 'POST'){

    //filtramos os dados da requisição e 
    //atribuímos à uma variável chamada $dados
    $dados = json_decode(file_get_contents("php://input"));

    $areaComodo = $dados->comodoLargura * $dados->comodoComprimento;
    $areaPiso = $dados->pisoLargura * $dados->pisoComprimento;

    $quantidadePiso = $areaComodo / $areaPiso;

    //10% = 0.1
    //100m * 0.1 = 10m
    $margem = $quantidadePiso * ($dados->margem / 100);

    $quantidadeTotal = $quantidadePiso + $margem;

    echo json_encode([
        "areaComodo" => $areaComodo,
        "areaPiso" => $areaPiso,
        "quantidade" => $quantidadePiso,
        "quantidadeMargem" => $margem,
        "quantidadeTotal" => $quantidadeTotal
    ]);
} else {
    echo json_encode(['erro' => 'Método não suportado. USe o POST']);
}
?>