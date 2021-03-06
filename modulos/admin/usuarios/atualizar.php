<div class="row">
    <div class="col s12">
        
        <p>
            <span class="left">
                <a title="Voltar para Lista de Usuarios" href="<?= LinkUsuarios ?>" class="btn green"><i class="material-icons">arrow_back</i></a>
            </span>
        </p>
        <div class="clearfix hide-on-med-and-up"></div>
        
        <h4 class="blue-text center">                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  Atualizar Usuario</h4>
        <div class="divider"></div>
    </div>
</div>
<?php
$listar = listar("usuarios", "where id =" . $_GET['id']);
foreach ($listar as $user):endforeach;
?>

<div class="col s12">
    <form action="<?= LinkUserUpdate ?>?update_nivel&id=<?= $_GET['id'] ?>" method="post">

        <div class="card col s12 m6 l4">
            <div class="card-content">

                <div class="input-field">
                    <div class="row">
                        <span class="flow-text"><b>Usuario:</b> <?= $user->nome ?></span>
                    </div>
                </div>

                <div class="input-field">
                    <select name="nivel">
                        <option disabled>Selecione um status</option>
                        <? if ($user->nivel == 1): ?>
                            <option hidden selected value="<?= $user->nivel ?>">Administrador</option>
                            <option hidden value="0">Editor</option>
                        <? else: ?>
                            <option hidden selected value="<?= $user->nivel ?>">Editor</option>
                            <option hidden value="1">Administrador</option>
                        <? endif; ?>
                    </select>
                    <label>Alterar Nivel de Acesso</label>
                </div>
            </div>

            <div class="card-action center-align">
                <button class="btn blue" type="submit"><i class="material-icons left">save</i> Atualizar</button>
            </div>
        </div>
    </form>
</div>