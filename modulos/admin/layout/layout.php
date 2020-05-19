<div class="col s12">
    <h4 class="green-text center">Layout</h4>
    <div class="divider"></div>

    <h5>Configure o padrão de colunas</h5>
</div>

<?
$listar = listar('layout');
foreach ($listar as $coll):endforeach;
?>

<!-- LAYOUT COLUNAS -->

<form action="<?= LinkLayout ?>?update_layout" name="form_layout" method="post">
    <div class="col s12 m6 l6">
        <div class="card-panel">

            <div class="flow-text">Coluna A</div>

            <? $check_a = ($coll->col_a == 1) ? 'checked' : ''; ?>
            <input class="filled-in" id="col-a" type="checkbox" name="col_a" value="1" <?= $check_a ?> />
            <label for="col-a">Ativar</label>

            <div class="input-field">
                <select name="pos_a">
                    <option disabled>Selecione a posição</option>
                    <? if ($coll->pos_a == 0): ?>
                        <option hidden selected value="<?= $coll->pos_a ?>">Esquerda</option>
                        <option hidden value="1">Direita</option>
                    <? else: ?>
                        <option hidden selected value="<?= $coll->pos_a ?>">Direita</option>
                        <option hidden value="0">Esquerda</option>
                    <? endif; ?>
                </select>
                <label>Posição da Coluna A</label>
            </div>
        </div>
    </div>

    <!-- ////////////////////////////////////////////////// -->

    <div class="col s12 m6 l6">
        <div class="card-panel">

            <div class="flow-text">Coluna B</div>

            <? $check_b = ($coll->col_b == 1) ? 'checked' : ''; ?>
            <input class="filled-in" id="col-b" type="checkbox" name="col_b" value="1" <?= $check_b ?> />
            <label for="col-b">Ativar</label>

            <div class="input-field">
                <select name="pos_b">
                    <option disabled>Selecione a posição</option>
                    <? if ($coll->pos_b == 0): ?>
                        <option hidden selected value="<?= $coll->pos_b ?>">Esquerda</option>
                        <option hidden value="1">Direita</option>
                    <? else: ?>
                        <option hidden selected value="<?= $coll->pos_b ?>">Direita</option>
                        <option hidden value="0">Esquerda</option>
                    <? endif; ?>
                </select>
                <label>Posição da Coluna B</label>
            </div>
        </div>
    </div>

    <div class="col s12 center">
        <button title="Salvar Altereções" class="btn-flat btn-large blue white-text" type="submit">
            <i class="material-icons left">save</i> Salvar</button>
    </div>

</form>