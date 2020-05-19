<?
$listar = listar('galerias', "where titulo_url='" . Url::getURL(3) . "'");
foreach ($listar as $gal):

    $listar_user = listar("usuarios", "where id='" . $gal->autor . "'");
    foreach ($listar_user as $user):endforeach;

endforeach;
?>

<div class="row">
    <div class=" col s12">
        <p>
            <span class="left">
                <a href="<?= LinkGalerias ?>" class="btn orange"><i class="material-icons">arrow_back</i></a>
            </span>
        </p>
        <div class="clearfix hide-on-med-and-up"></div>

        <h4 class="green-text center"><?= $gal->titulo ?></h4>
        <div class="divider"></div>
    </div>
</div>

<? if ($user->nivel == "0"): ?>
    <div class="col s12">
        <div class="card-panel">
    	<form action="<?= LinkGaleriaNew ?>?new_foto&galeria=<?= $gal->id ?>" name="form_foto" method="post" enctype="multipart/form-data">

    	    <div class="row">
    		<div class="col s12 m12 l4">
    		    <div class="file-field input-field">
    			<div class="btn light-blue lighten-3">
    			    <span><i class="material-icons left">add</i>Fotos</span><input name="foto[]" type="file" multiple required>
    			</div>
    			<div class="file-path-wrapper">
    			    <input class="file-path validate" type="text">
    			</div>
    		    </div>
    		</div>

    		<div class="col s12 m12 l4 center-on-small-only">
    		    <button class="btn-large blue" type="submit"><i class="material-icons left">image</i> Enviar Fotos</button>
    		</div>
    		<div class="col s12 center-on-small-only">
    		    <small class="red-text">
    			<i class="material-icons left">info_outline</i>
    			• Tamanho máximo individual das imagens: <b>2MB</b> /
    			• Tamanho máximo total de upload multiplo: <b><?= $max_mb = "20MB" ?></b>.
    		    </small>
    		</div>

    	    </div>
    	</form>
        </div>
    </div>
<? else: if ($_SESSION['nivel'] == "1"): ?>
	<div class="col s12">
	    <div class="card-panel">
		<form action="<?= LinkGaleriaNew ?>?new_foto&galeria=<?= $gal->id ?>" name="form_foto" method="post" enctype="multipart/form-data">

		    <div class="row">
			<div class="col s12 m12 l4">
			    <div class="file-field input-field">
				<div class="btn light-blue lighten-3">
				    <span><i class="material-icons left">add</i>Fotos</span><input name="foto[]" type="file" multiple required>
				</div>
				<div class="file-path-wrapper">
				    <input class="file-path validate" type="text">
				</div>
			    </div>
			</div>

			<div class="col s12 m12 l4 center-on-small-only">
			    <button class="btn-large blue" type="submit"><i class="material-icons left">image</i> Enviar Fotos</button>
			</div>
			<div class="col s12 center-on-small-only">
			    <small class="red-text">
				<i class="material-icons left">info_outline</i>
				• Tamanho máximo individual das imagens: <b>2MB</b> /
				• Tamanho máximo total de upload multiplo: <b><?= $max_mb = "20MB" ?></b>.
			    </small>
			</div>

		    </div>
		</form>
	    </div>
	</div>
	<?
    endif;
endif;
?>


<div class=" col s12">
    <div class="card-panel">
        <form action="<?= LinkGaleriaFotos ?>?del_mult&galeria=<?= $gal->id ?>" name="form_mult" method="post">

	    <? if ($user->nivel == "0"): ?>
    	    <div class="row">
    		<div class="col s12 m12 l4 center-on-small-only">
    		    <!--input id="chkAll" type="checkbox" class="all" /-->
    		    <label for="chkAll"></label>
    		    <button class="btn red" type="submit"><i class="material-icons left">delete</i>Apagar Seleção</button>
    		</div>
    	    </div>
	    <? else: if ($_SESSION['nivel'] == "1"): ?>
		    <div class="row">
			<div class="col s12 m12 l4 center-on-small-only">
			    <!--input id="chkAll" type="checkbox" class="all" /-->
			    <label for="chkAll"></label>
			    <button class="btn red" type="submit"><i class="material-icons left">delete</i>Apagar Seleção</button>
			</div>
		    </div>
		    <?
		endif;
	    endif;
	    $listar = listar('galerias_fotos', "where id_galeria='" . $gal->id . "' order by id DESC");
	    foreach ($listar as $fotos):

		$desc = ($fotos->descricao == NULL) ? 'Sem Descrição' : $fotos->descricao;
		$data = explode(' ', $fotos->data);
		?>

    	    <div class="col s12 m4 l3">
    		<article class="card small hoverable">
    		    <h1 class="hide">Foto da Galeria <?= $gal->titulo ?></h1>
    		    <div class="card-image">
    			<img class="responsive-img materialboxed" data-caption="<?= $desc . ' (' . $data[0] . ')' ?>" src="<?= BaseHost . DirGalerias . $fotos->foto ?>">
    		    </div>

    		    <div class="card-content">
    			<small class="grey-text truncate"><?= $desc ?></small>
    		    </div>

			<? if ($user->nivel == "0"): ?>
			    <div class="card-action">
				<input name="del[]" type="checkbox" class="item" id="ck<?= $fotos->id ?>" value="<?= $fotos->id ?>" />
				<label for="ck<?= $fotos->id ?>"></label>

				<button data-target="d<?= $fotos->id ?>" title="Apagar" class="btn-link red-text right modal-trigger" type="submit">
				    <i class="material-icons">delete</i></button>
				<button data-target="e<?= $fotos->id ?>" title="Editar" class="btn-link blue-text right modal-trigger" type="submit">
				    <i class="material-icons">mode_edit</i></button>
			    </div>
			<? else: if ($_SESSION['nivel'] == "1"): ?>
	    		    <div class="card-action">
	    			<input name="del[]" type="checkbox" class="item" id="ck<?= $fotos->id ?>" value="<?= $fotos->id ?>" />
	    			<label for="ck<?= $fotos->id ?>"></label>

	    			<button data-target="d<?= $fotos->id ?>" title="Apagar" class="btn-link red-text right modal-trigger" type="submit">
	    			    <i class="material-icons">delete</i></button>
	    			<button data-target="e<?= $fotos->id ?>" title="Editar" class="btn-link blue-text right modal-trigger" type="submit">
	    			    <i class="material-icons">mode_edit</i></button>
	    		    </div>
			    <? endif;
			endif;
			?>

    		</article>
    	    </div>
<? endforeach; ?>
        </form>

	<?
	// SELECTs MODAL
	$listar = listar('galerias_fotos', "where id_galeria='" . $gal->id . "' order by id DESC");
	foreach ($listar as $fotos):
	    ?>
    	<!-- Modal Structure - EDITAR -->
    	<div id="e<?= $fotos->id ?>" class="modal">
    	    <form action="<?= LinkGaleriaUpdate ?>?update_foto&id=<?= $fotos->id ?>" name="form_foto" method="post">
    		<input name="galeria" type="hidden" value="<?= $fotos->id_galeria ?>">
    		<input name="liminte" type="hidden" value="120"><!-- Valor do length -->
    		<div class="modal-content">
    		    <h5>Alterar Descrição</h5>
    		    <div class="input-field">
    			<label for="descricao" class="active">Descrição</label>
    			<textarea id="descricao" name="descricao" class="materialize-textarea" length="120" required><?= $fotos->descricao ?></textarea>
    			<blockquote class="red-text"><i class="material-icons left">info_outline</i>
    			    Evite usar Áspas, <b>" "</b> ou <b>' '</b>, na descrição.</blockquote>
    		    </div>
    		</div>
    		<div class="modal-footer">
    		    <button type="submit" class="waves-effect waves-purple btn-flat blue-text">
    			<i class="material-icons left">save</i>Salvar</button>
    		    <a class="modal-action modal-close waves-effect waves-green btn-flat">
    			<i class="material-icons left">arrow_back</i>Cancelar</a>
    		</div>
    	    </form>
    	</div>
    	<!-- Modal Structure - APAGAR -->
    	<div id="d<?= $fotos->id ?>" class="modal">
    	    <div class="modal-content">
    		<h5>Apagar Foto</h5>
    		<p>Esta foto será apagada. Deseja continuar?</p>
    	    </div>
    	    <div class="modal-footer">
    		<a href="<?= LinkGaleriaFotos ?>?del_foto&id=<?= $fotos->id ?>" class="waves-effect waves-red btn-flat red-text">
    		    <i class="material-icons left">delete_forever</i>Sim</a>
    		<a class="modal-action modal-close waves-effect waves-green btn-flat blue-text">
    		    <i class="material-icons left">arrow_back</i>Não</a>
    	    </div>
    	</div>
<? endforeach; ?>

        <div class="clearfix"></div>
    </div>
</div>