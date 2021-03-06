<div class="col s12">

    <p>
        <span class="left">
            <a title="Cadastrar Novo Usuario" href="<?= LinkUserNew ?>" class="btn green"><i class="material-icons">person_add</i></a>
        </span>
    </p>
    <div class="clearfix hide-on-med-and-up"></div>

    <h4 class="blue-text center">                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  Usuarios</h4>
    <div class="divider"></div>

    <table class="responsive-table highlight striped">
        <thead>
            <tr class="grey lighten-2 blue-text">
                <th class="center-align">ID</th>
                <th>Nome</th>
                <th>Nick</th>
                <th>Telefone</th>
                <th>E-mail</th>
                <th class="center-align">
                    Nivel
                    <span class="hide-on-small-and-down">|</span>
                    <br class="hide-on-med-and-up">
                    Status
                    <span class="hide-on-small-and-down">|</span>
                    <br class="hide-on-med-and-up">
                    Ações
                </th>
            </tr>
        </thead>
        <tbody>

            <?
            $listar = listar("usuarios", "ORDER BY nome ASC");
            foreach ($listar as $user):
                ?>

                <tr>
                    <td class="center-align"><b><?= $user->id ?></b></td>
                    <td><?= $user->nome ?></td>
                    <td><?= $user->nickname ?></td>
                    <td><?= $user->fone ?></td>
                    <td><?= $user->email ?></td>
                    <td class="center-align">
                        <?
                        $iconNivel = ($user->nivel == '1') ?
                                '<i class="material-icons orange-text">star</i>' :
                                '<i class="material-icons blue-grey-text">star</i>';
                        ?>
                        <a title="Alterar Nivel" href="<?= LinkUsuarios ?>atualizar/?id=<?= $user->id ?>" class="btn-flat btn-small"><?= $iconNivel ?></a>
                        <br class="hide-on-med-and-up">

                        <?
                        $iconStatus = ($user->status == '1') ?
                                '<i class="material-icons light-blue-text">visibility</i>' :
                                '<i class="material-icons blue-grey-text">visibility_off</i>';
                        ?>
                        <a title="Alterar Status" href="<?= LinkUsuarios ?>?update_user_status&id=<?= $user->id ?>" class="btn-flat btn-small"><?= $iconStatus ?></a>
                        <br class="hide-on-med-and-up">

                        <button title="Deletar Usuário" data-target="<?= $user->id ?>" class="btn-flat btn-small red-text modal-trigger">
                            <i class="material-icons">delete</i></button>
                    </td>

                    <!-- Modal Structure -->
            <div id="<?= $user->id ?>" class="modal">
                <div class="modal-content">
                    <h5>Apagar Usuario "<?= $user->nome ?>"</h5>
                    <p>Este usuário será apagado permanentemente, todos os dados seram perdidos e o usuario não terá mais acesso.<br>Deseja continuar?</p>
                </div>
                <div class="modal-footer">
                    <a class=" modal-action modal-close waves-effect waves-green btn-flat blue-text">
                        <i class="material-icons left">arrow_back</i>Não</a>
                    <a href="<?= LinkUsuarios ?>?del_user&id=<?= $user->id ?>" class="waves-effect waves-red btn-flat red-text">
                        <i class="material-icons left">delete_forever</i>Sim</a>
                </div>
            </div>
            </tr>

        <? endforeach; ?>
        </tbody>
    </table>
</div>