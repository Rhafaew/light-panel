<div class="row">
    <div class="col s12">

	<h4 class="brown-text center">Rodapé</h4>
	<div class="divider"></div>
    </div>
</div>

<?
$listar = listar('footer');
foreach ($listar as $footer):endforeach;
?>

<div class="col s12">
    <form action="<?= LinkFooter ?>?update_copy" method="post">
        <div class="card">
            <div class="card-content">
                <div class="card-title">Copyright</div>

		<div class="input-field">
                    <textarea name="copy" class="materialize-textarea validate" required><?= $footer->copy ?></textarea>
                </div>
                <button class="btn blue" type="submit"><i class="material-icons left">save</i> Salvar</button>
            </div>
        </div>
    </form>
</div>

<div class="divider"></div>

<div class="col s12 l4">
    <form action="<?= LinkFooter ?>?update=copy" method="post">
        <div class="card">
            <div class="card-content">
                <div class="card-title">Bloco 1</div>

		<div class="input-field">
                    <label for="descricao" class="active">Descrição</label>
                    <textarea id="descricao" name="descricao" class="materialize-textarea validate editor_txt" required></textarea>
                </div>
                <button class="btn blue" type="submit"><i class="material-icons left">save</i> Salvar</button>
            </div>
        </div>
    </form>
</div>

<div class="col s12 l4">
    <form action="<?= LinkFooter ?>?update=copy" method="post">
        <div class="card">
            <div class="card-content">
                <div class="card-title">Bloco 2</div>

		<div class="input-field">
                    <label for="descricao" class="active">Descrição</label>
                    <textarea id="descricao" name="descricao" class="materialize-textarea validate" required></textarea>
                </div>
                <button class="btn blue" type="submit"><i class="material-icons left">save</i> Salvar</button>
            </div>
        </div>
    </form>
</div>

<div class="col s12 l4">
    <form action="<?= LinkFooter ?>?update=copy" method="post">
        <div class="card">
            <div class="card-content">
                <div class="card-title">Bloco 3</div>

		<div class="input-field">
                    <label for="descricao" class="active">Descrição</label>
                    <textarea id="descricao" name="descricao" class="materialize-textarea validate" required></textarea>
                </div>
                <button class="btn blue" type="submit"><i class="material-icons left">save</i> Salvar</button>
            </div>
        </div>
    </form>
</div>