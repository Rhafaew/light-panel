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

<form action="<?= LinkFooter ?>?update_copy" method="post">
    <div class="col s12">
        <div class="col s12">
            <div class="card">
                <div class="card-content">
                    <div class="card-title">Copyright</div>

                    <div class="input-field">
                        <textarea name="copy" class="materialize-textarea validate" ><?= $footer->copy ?></textarea>
                    </div>
                </div>
            </div>

        </div>

        <div class="divider"></div>


        <div class="col s12 l4">

            <div class="card">
                <div class="card-content">
                    <div class="card-title">Bloco 1</div>

                    <div class="input-field">
                        <label for="bloco1" class="active">Descrição</label>
                        <textarea id="bloco1" name="bloco1" class="materialize-textarea validate editor_txt" ><?= $footer->bloco1 ?></textarea>
                    </div>
                </div>
            </div>

        </div>


        <div class="col s12 l4">

            <div class="card">
                <div class="card-content">
                    <div class="card-title">Bloco 2</div>

                    <div class="input-field">
                        <label for="bloco2" class="active">Descrição</label>
                        <textarea id="bloco2" name="bloco2" class="materialize-textarea validate editor_txt" ><?= $footer->bloco2 ?></textarea>
                    </div>
                </div>
            </div>

        </div>


        <div class="col s12 l4">

            <div class="card">
                <div class="card-content">
                    <div class="card-title">Bloco 3</div>

                    <div class="input-field">
                        <label for="bloco3" class="active">Descrição</label>
                        <textarea id="bloco3" name="bloco3" class="materialize-textarea validate editor_txt" ><?= $footer->bloco3 ?></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col s12 center">
        <button title="Salvar Altereções" class="btn-flat btn-large blue white-text" type="submit">
            <i class="material-icons left">save</i> Salvar</button>
    </div>

</form>