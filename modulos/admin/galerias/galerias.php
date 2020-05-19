<div class=" col s12">

    <p>
        <span class="left">
            <a title="Nova Publicação" href="<?= LinkGaleriaNew ?>" class="btn indigo"><i class="material-icons">note_add</i></a>
        </span>
    </p>

    <h4 class="green-text center">Galerias</h4>
    <div class="divider"></div>

    <?
    $nivelAcesso = ($_SESSION['nivel'] == "1") ? '' : "where autor='" . $_SESSION['id'] . "' ";
    $listar = listar('galerias', "ORDER BY id DESC");
    $count = count($listar);
    if ($count == 0):
	echo '<center><h4>Nenhuma galeria criado por você.</h4></center>';
    else:
	?>
        <table class="highlight responsive-table bordered">
    	<thead>
    	    <tr class="blue-text">
    		<th class="center-align">ID</th>
    		<th>Titulo</th>
    		<th>Descrição</th>
    		<th class="center-align">Autor</th>
    		<th class="center-align">Data</th>
    		<th class="center-align">Status</th>
    		<th class="center-align">Ações</th>
    	    </tr>
    	</thead>
    	<tbody>

		<?
		foreach ($listar as $galerias):
		    $listar = listar("usuarios", "where id='" . $galerias->autor . "'");
		    foreach ($listar as $user):endforeach;

		    $data = explode(' ', $galerias->data);
		    ?>
		    <tr>
			<td class="center-align"><?= $galerias->id ?></td>
			<td><a title="Abrir Galeria" class="blue-text" href="<?= LinkGaleriaFotos . $galerias->titulo_url ?>">
				<i class="material-icons left">launch</i><?= $galerias->titulo ?></a></td>
			<td><?= utf8_encode(substr(utf8_decode($galerias->descricao), 0, 56)) . "..." ?></td>
			<td class="center-align"><?= $user->nome ?></td>
			<td class="center-align"><?= $data[0] ?></td>
			<td class="center-align">
			    <?
			    $iconStatus = ($galerias->status == '1') ?
				    '<i class="material-icons green-text">visibility</i>' :
				    '<i class="material-icons blue-grey-text">visibility_off</i>';
			    ?>
			    <a title="Alterar Status" href="<?= LinkPostUpdate ?>?update_galeria_status&id=<?= $galerias->id ?>"><?= $iconStatus ?></a>
			</td>
			<td class="center-align">

			    <?
			    if ($user->nivel == "0"):
				?>
	    		    <a class="btn-flat green-text" href="<?= LinkGaleriaUpdate ?>?id=<?= $galerias->id ?>">
	    			<i class="material-icons green-text">mode_edit</i></a>

	    		    <button data-target="d<?= $galerias->id ?>" title="Apagar" class="btn-flat red-text modal-trigger" type="submit">
	    			<i class="material-icons">delete</i></button>
			    <? else: ?>

				<? if ($_SESSION['nivel'] == "1"):
				    ?>
				    <a class="btn-flat green-text" href="<?= LinkGaleriaUpdate ?>?id=<?= $galerias->id ?>">
					<i class="material-icons green-text">mode_edit</i></a>

				    <button data-target="d<?= $galerias->id ?>" title="Apagar" class="btn-flat red-text modal-trigger" type="submit">
					<i class="material-icons">delete</i></button>
				<? endif; ?>
			    <? endif; ?>
			</td>
		    </tr>

		    <!-- Modal Structure - APAGAR -->
		<div id="d<?= $galerias->id ?>" class="modal">
		    <div class="modal-content">
			<h5>Apagar Galeria "<?= $galerias->titulo ?>"</h5>
			<p>Se esta galeria for apagada todos as fotos também seram apagadas. Deseja continuar?</p>
		    </div>
		    <div class="modal-footer">
			<a href="<?= LinkGalerias ?>?del_galeria&id=<?= $galerias->id ?>" class="waves-effect waves-red btn-flat red-text">
			    <i class="material-icons left">delete_forever</i>Sim</a>
			<a class="modal-action modal-close waves-effect waves-green btn-flat blue-text">
			    <i class="material-icons left">arrow_back</i>Não</a>
		    </div>
		</div>

		<?
	    endforeach;
	endif;
	?>
        </tbody>
    </table>

</div>