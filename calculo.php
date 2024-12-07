<?php
//Diz ao PHP que vamos trabalhar usando o protocolo JSON para comunicação
header('Content-Type: application/json');

//Verificamos se a requisição é do tipo POST,
//Caso não seja, retornamos uma mensagem de erro
if($_SERVER['REQUEST_METHOD'] == 'POST'){

    //filtramos os dados da requisição e 
    //atribuímos à uma variável chamada $dados
    $dados = json_decode(file_get_contents("php://input"));

    $feedback = [];

    if(empty($dados->identificador)){
        $feedback[] = [
            "idCampo" => "identificador",
            "mensagem" => "O nome do comôdo/calculo é obrigatório"
        ] ;
    }

    if($dados->comodoLargura <= 0){
        $feedback[] = [
            "idCampo" => "comodo-largura",
            "mensagem" => "O valor da largura do comodo deve ser maior que zero"
        ] ;
    }

    if($dados->comodoComprimento <= 0){
        $feedback[] = [
            "idCampo" => "comodo-comprimento",
            "mensagem" => "O valor do comprimento do comodo deve ser maior que zero"
        ];
    }

    if($dados->pisoLargura <= 0){
        $feedback[] = [
            "idCampo" => "piso-largura",
            "mensagem" => "O valor da largura do piso deve ser maior que zero"
        ];
    }

    if($dados->pisoComprimento <= 0){
        $feedback[] = [
            "idCampo" => "piso-comprimento",
            "mensagem" => "O valor do comprimento do piso deve ser maior que zero"
        ];
    }

    if($dados->margem <= 0){
        $feedback[] = [
            "idCampo" => "margem",
            "mensagem" => "O valor da margem deve ser maior que zero"
        ];
    }
   
    if(!empty($feedback)){
        echo json_encode(["erro" => $feedback]);
        exit;
    }
    $areaComodo = $dados->comodoLargura * $dados->comodoComprimento;
    $areaPiso = $dados->pisoLargura * $dados->pisoComprimento;

    $quantidadePiso = $areaComodo / $areaPiso;
    //sleep(10);

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