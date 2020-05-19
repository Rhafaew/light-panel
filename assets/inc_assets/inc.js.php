<script src="<?= LinkJS ?>jquery.min.js"></script>
<script src="<?= LinkJS ?>prism.js"></script>
<script src="<?= LinkJS ?>materialize.min.js"></script>
<script src="<?= LinkJS ?>tinymce/jquery.tinymce.min.js"></script>
<script src="<?= LinkJS ?>tinymce/tinymce.min.js"></script>

<? require_once 'assets/inc_assets/inc.tinymce.php'; ?>

<?
if (isset($_SESSION['msgUpdate'])):
    ?>
    <script>
        // Materialize.toast(message, displayLength, className, completeCallback);
        Materialize.toast('<?= $_SESSION['msgUpdate'] ?>', 5000, 'rounded') // 4000 is the duration of the toast
    </script>
    <?
    unset($_SESSION['msgUpdate']);
endif;
?>


<script>

    $(document).ready(function () {

        // MENU MOBILE OPTIONS
        $('.menu-front').sideNav({
            menuWidth: 240, // Default is 240
            edge: 'left', // Choose the horizontal origin
            closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
            draggable: true // Choose whether you can drag to open on touch screens
        });

        // MENU MOBILE OPTIONS ADMIN
        $('.menu-admin').sideNav({
            edge: 'left', // Choose the horizontal origin
            closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
            draggable: true // Choose whether you can drag to open on touch screens
        });

        // DROPDOWN
        $('.dropdown-button').dropdown('open');

        // SELECT
        $('select').material_select();

        // MODAL
        // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
        $('.modal').modal({
            dismissible: true, // Modal can be dismissed by clicking outside of the modal
            opacity: 0.8 // Opacity of modal background
        });

        // DATEPICKER
        $('.datepicker').pickadate({
            selectMonths: true, // Cria um dropdown para seleção de mes
            selectYears: 200, // Cria um dropdown de 15 anos para seleção de ano
            format: 'dd/mm/yyyy', // Formato da data - Default: 'dd/mmmm/yyyy' - Outro: 'dd/mm/yy'
            // TRADUÇÃO
            labelMonthNext: "Proximo Mes", labelMonthPrev: "Mes Anterior",
            labelMonthSelect: "Selecione um Mes",
            labelYearSelect: "Selecione um Ano",
            today: "Hoje",
            clear: "Limpar",
            close: "Fechar",
            // DIAS DA SEMANA
            weekdaysLetter: ["D", "S", "T", "Q", "Q", "S", "S"],
            weekdaysShort: ["Don", "Seg", "Ter", "Qua", "Qui", "Sex", "Sab"],
            weekdaysFull: ["Domingo", "Segunda", "Terça", "Quarta", "Quinta", "Sexta", "Sabado"],
            // MESES
            monthsShort: ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"],
            monthsFull: ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"]
        });

        // CAROSEL SLIDE
        $('.carousel.carousel-slider').carousel({full_width: true});

        // SLIDE
        $('.slider').slider({
            full_width: true,
            indicators: true, // Set to false to hide slide indicators. (Default: True)
            height: 400, // Set height of slider. (Default: 400)
            transition: 500, // Set the duration of the transition animation in ms. (Default: 500)
            interval: 6000      // Set the duration between transitions in ms. (Default: 6000)
        });

        // MATERIAL BOX
        $('.materialboxed').materialbox();
    });

/////////////////// FIM MATERIALIZE //////////////////////

    // SELECT AUTO SEND
    function Menu(targ, selObj, restore) { //v3.0
        eval(targ + ".location='" + selObj.options[selObj.selectedIndex].value + "'");
        if (restore)
            selObj.selectedIndex = 0;
    }

    //CHECK BOX E RADIOS
    $(document).ready(function () {
        //selecionar todos os checkbox
        var checkAll = $('input.all');
        var checkboxes = $('input.item');

        //Opção para selecionar todos os checkbox
        checkAll.on('ifChecked ifUnchecked', function (event) {
            if (event.type == 'ifChecked') {
                checkboxes.iCheck('checked');
            } else {
                checkboxes.iCheck('uncheck');
            }
        });//fim checkAll.on

        checkboxes.on('ifChanged', function (event) {
            if (checkboxes.filter(':checked').length == checkboxes.length) {
                checkAll.prop('checked', 'checked');
            } else {
                checkAll.removeProp('checked');
            }
            checkAll.iCheck('update');
        });//fim checkboxes.on
    });

</script>