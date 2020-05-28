<?
$listar = listar('footer');
foreach ($listar as $footer):endforeach;
?>
<footer class="page-footer brown" style="margin-top: 0">
    <h1 class="hide">Footer</h1>

    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <?= html_entity_decode($footer->bloco1, ENT_QUOTES) ?>
            </div>
            <div class="col l3 s12">
                <?= html_entity_decode($footer->bloco2, ENT_QUOTES) ?>
            </div>
            <div class="col l3 s12">
                <?= html_entity_decode($footer->bloco3, ENT_QUOTES) ?>
            </div>
        </div>
    </div>

    <div class="footer-copyright">
        <div class="container center-align">
            <?= $footer->copy ?>
            <small style="float: right"><a class="btn-flat" target="_blank" href="<?= BaseHost ?>admin">Admin</a></small>
        </div>
    </div>
</footer>