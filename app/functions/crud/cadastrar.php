                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              <?php

function cadastrar($tabela, $attributes) {
    // Conecta com Banco de dados
    $pdo = conectar();

    // Pega indices
    $keys = array_keys($attributes);

    // Nomes em forma de string
    $camposTB = implode(',', $keys);

    // Inicia variavel do looping
    $values = NULL;

    // Looping pega os valores e add (:) na frente
    foreach ($keys as $key) {
        $values.=', :' . $key;
    }

    // Tira espaços em branco e a primeira (,)
    $values = (trim(ltrim($values, ',')));

    // Prepara SQL
    $cadastrar = $pdo->prepare("insert into $tabela ($camposTB) values($values)");
    // Executa SQL
    $cadastrar->execute($attributes) or die(print_r($cadastrar->errorInfo(), true));
    // Retorna ultimo ID inserido
    return $pdo->lastInsertId();
}
