<div class=" col s12">
    <p>
        <span class="left">
            <a title="Nova Publicação" href="<?= LinkPostNew ?>" class="btn light-blue"><i class="material-icons">note_add</i></a>
        </span>
    </p>
    <div class="clearfix hide-on-med-and-up"></div>

    <h4 class="green-text center">Publicações</h4>
    <div class="divider"></div>

    <table class="responsive-table highlight striped">
        <thead>
            <tr>
                <th class="center-align">ID</th>
                <th>
                    Titulo
                    <div class="divider"></div>
                    <small>Texto</small>
                </th>
                <th class="center-align">Categ.</th>
                <th class="center-align">Autor</th>
                <th class="center-align">
                    Postado
                    <div class="divider"></div>
                    Atualizado
                </th>
                <th class="center-align">Status</th>
                <th class="center-align">Ações</th>
            </tr>
        </thead>
        <tbody>
	    <?
	    $nivelAcesso = ($_SESSION['nivel'] == "1") ? "where rascunho='0'" : "where rascunho='0' ";

	    $conteudoTotal = 10; // <- Valor 2 |#| 5/10/20/40/80 
	    $pageReturn = pageReturn(URL::getURL(2), $conteudoTotal); // VALOR 1: RETORNO NUMERO DA PAGINA * VALOR 2: LIMITA CONTEUDO NA PAGINA
	    $listar = listar('conteudo', $nivelAcesso . "ORDER BY id DESC LIMIT $pageReturn[1], $pageReturn[2]");
	    foreach ($listar as $post):
		$resumoTexto = (strlen(strip_tags(html_entity_decode($post->texto, ENT_QUOTES))) > 80) ? " <small>...</small>" : "";

		$listar = listar("usuarios", "where id='" . $post->autor . "'");
		foreach ($listar as $user):endforeach;
		?>
    	    <tr>
    		<td class="center-align"><?= $post->id ?></td>
    		<td style="max-width: 320px">
			<? if ($post->imagem == NULL):else: ?>
			    <img class="img-thumb-50p circle left z-depth-1" src="<?= BaseHost . DirIMG . $post->imagem ?>">
			<? endif; ?>
    		    <span class=" blue-text"><?= $post->titulo ?></span>
    		    <div class="divider"></div>
    		    <small><?= substr(strip_tags(html_entity_decode($post->texto, ENT_QUOTES)), 0, 120) . $resumoTexto ?></small>
    		</td>

    		<td class="center-align"><?= $post->categoria ?></td>
    		<td class="center-align"><?= $user->nome ?></td>

    		<td class="center-align">
			<?= $post->data ?>
    		    <div class="divider"></div>
			<?= $dataMod = ($post->data_mod == NULL) ? '' : $post->data_mod ?>
    		</td>

    		<td class="center-align">
			<?
			$iconStatus = ($post->status == '1') ?
				'<i class="material-icons green-text">visibility</i>' :
				'<i class="material-icons blue-grey-text">visibility_off</i>';
			?>
    		    <a title="Alterar Status" href="<?= LinkPostUpdate ?>?update_post_status&id=<?= $post->id ?>"><?= $iconStatus ?></a>
    		</td>

    		<td class="center-align">

			<?
			if ($user->nivel == "0"):
			    ?>
			    <a class="btn-flat green-text" href="<?= LinkPostUpdate ?>?id=<?= $post->id ?>">
				<i class="material-icons green-text">mode_edit</i></a>

			    <button data-target="<?= $post->id ?>" class="btn-flat red-text modal-trigger">
				<i class="material-icons red-text">delete</i></button>
			<? else: ?>

			    <? if ($_SESSION['nivel'] == "1"):
				?>
	    		    <a class="btn-flat green-text" href="<?= LinkPostUpdate ?>?id=<?= $post->id ?>">
	    			<i class="material-icons green-text">mode_edit</i></a>

	    		    <button data-target="<?= $post->id ?>" class="btn-flat red-text modal-trigger">
	    			<i class="material-icons red-text">delete</i></button>
			    <? endif; ?>
			<? endif; ?>
    		</td>
    	    </tr>

    	    <!-- Modal Structure -->
    	<div id="<?= $post->id ?>" class="modal">
    	    <div class="modal-content">
    		<h5>Apagar Conteudo "<span class="red-text"><?= $post->titulo ?></span>"</h5>
    		<p>Este conteudo será apagado. Deseja continuar?</p>
    	    </div>
    	    <div class="modal-footer">
    		<a href="<?= LinkPostagens ?>?del_post&id=<?= $post->id ?>" class="waves-effect waves-red btn-flat red-text">
    		    <i class="material-icons left">delete_forever</i>Sim</a>
    		<a class=" modal-action modal-close waves-effect waves-green btn-flat blue-text">
    		    <i class="material-icons left">arrow_back</i>Não</a>
    	    </div>
    	</div>

	<? endforeach; ?>
        </tbody>
    </table>

    <!-- PAGINAÇÃO -->
    <ul class="pagination">
	<?
	// CONFIG QUANTIDADE DE PAGINAS
	$listar = listar('conteudo', $nivelAcesso);
	$countResult = count($listar);
	$numLinks = 5;
	// ESTRUTURA
	$liOpen = '<li class="waves-effect waves-purple">';
	$liActive = '<li class="active blue">';
	$liEnd = '</li> ';
	$IconFirst = '<i class="material-icons">first_page</i>';
	$IconPrev = '<i class="material-icons">chevron_left</i>';
	$IconProx = '<i class="material-icons">chevron_right</i>';
	$IconLast = '<i class="material-icons">last_page</i>';
	if ($countResult > $pageReturn[2]):
	    FirstBackPage(LinkPostagens, $pageReturn[0], $liOpen, $liEnd, $IconFirst, $IconPrev);
	    NumLoop(LinkPostagens, $pageReturn[0], $numLinks, $countResult, $pageReturn[2], $liOpen, $liEnd, $liActive);
	    NextLastPage(LinkPostagens, $pageReturn[0], $countResult, $pageReturn[2], $liOpen, $liEnd, $IconProx, $IconLast);
	endif;
	?>
    </ul>

</div>