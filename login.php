<!DOCTYPE html>
<?php require_once './includes_global.php'; ?>
<?php require_once './includes_client.php'; ?>

<?
if (isset($_SESSION['nick'])):
    header("Location: " . LinkAdmin);
    exit;
endif;
?>

<html lang="pt-br">
    <head>
        <title>Login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- CSS -->
        <? require_once 'assets/inc_assets/inc.global.css.php'; ?>
        <? require_once 'assets/inc_assets/inc.admin.css.php'; ?>
    </head>

    <body class="grey lighten-4">
        <?
        if (isset($_SESSION['campoVazio'])):
            echo $_SESSION['campoVazio'];
        endif;
        ?>

        <div class="row container">
            <div class="col s12 m6 l4 offset-l4">
                <div class="row">
                    <div class="card">
                        <div class="card-content">
                            <center><span class="card-title">Login</span></center>

                            <form method="post">
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="login" type="text" name="login" required class="validate">
                                        <label for="login">Login</label>
                                    </div>
                                    <div class="input-field col s12">
                                        <input id="password" type="password" name="senha" required class="validate">
                                        <label for="password">Senha</label>
                                    </div>

                                    <div class="input-field col s12">
                                        <center>
                                            <button class="btn-large waves-effect waves-light" type="submit" name="logar">Entrar
                                                <i class="material-icons right">input</i>
                                            </button>
                                        </center>
                                    </div>
                                </div>
                            </form>

                        </div>
                        <div class="card-action">
                            <a href="#">Esqueceu a senha?</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- JavaScript -->
        <? require_once 'assets/inc_assets/inc.js.php'; ?>
        <?
        if (isset($_SESSION['erroLogin'])):
            ?>
            <script>
                // Materialize.toast(message, displayLength, className, completeCallback);
                Materialize.toast('<?= $_SESSION['erroLogin'] ?>', 7200, 'rounded') // 4000 is the duration of the toast
            </script>
            <?
        endif;
        ?>
    </body>
</html>