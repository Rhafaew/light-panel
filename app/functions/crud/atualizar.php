                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <?

function atualizar($id, $tabela, $attributes) {
    // Conecta com Banco de dados
    $pdo = conectar();

    // Inicia variavel do looping
    $values = NULL;

    // Looping pega os valores e add (= :) entre os valores e (,) no final
    foreach ($attributes as $key => $value) {
        $values.=$key . '= :' . $key . ',';
    }

    // Remove a ultima (,)
    $values = (rtrim($values, ','));

    //var_dump("update $tabela set $values where id=:id");

    // Prepara SQL
    $atualizar = $pdo->prepare("update $tabela set $values where id=:id");
    // Passa o ID a ser atualizado
    $attributes['id'] = $id;
    // Executa SQL e retorna verdadeiro ou falso
    return $atualizar->execute($attributes) or die(print_r($atualizar->errorInfo(), true));
}
