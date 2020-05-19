<main class="container">
    <h1 class="hide">Principal</h1>
    <div class="row"></div>

    <div class="row">
        <?
        $asideA = ($col->col_a == '0') ? '' : $asideA = ($col->pos_a == '0') ? asideA() : '';
        $asideA = ($col->col_b == '0') ? '' : $asideB = ($col->pos_b == '0') ? asideB() : '';
        ?>
        <!-- INCUI PAGINAS -->
        <section class="col s12 m12 <?= $colCenter ?>">
            <h1 class="hide">Pagina</h1>
            <?php require_once 'modulos/inc.paginas.php'; ?>
        </section>
        <?
        $asideA = ($col->col_a == '0') ? '' : $asideA = ($col->pos_a == '1') ? asideA() : '';
        $asideA = ($col->col_b == '0') ? '' : $asideB = ($col->pos_b == '1') ? asideB() : '';
        ?>
    </div>
</main>