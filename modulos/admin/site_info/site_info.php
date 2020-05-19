<div class="row">
    <div class="col s12">
        <h4 class="green-text center">Informações do Site</h4>
        <div class="divider"></div>
    </div>
</div>

<?
$listar = listar('site_info');
foreach ($listar as $site):endforeach;
?>

<!-- // INFOS // -->
<div class="col s12">
    <form action="<?= LinkSiteInfo ?>?update_info" name="form_info" method="post">

        <div class="card">
            <div class="card-content">
                <div class="card-title">Dados do Site <i class="material-icons md-16 tooltipped orange-text text-lighten-3" data-position="top" data-delay="50" data-tooltip="Dicas: para ver dicas e informações passe o mouse sobre os icones dos campos.">help</i></div>


                <!-- // TITULO // -->
                <div class="col s12 m6 l6">
                    <div class="input-field">
                        <i class="material-icons prefix tooltipped blue-text" data-position="top" data-delay="50" data-tooltip="
                           Titulo: aparece na aba dos navegadores - É usado pelos buscadores para ajudar na busca.">title</i>

                        <input name="titulo" value="<?= $site->titulo ?>" placeholder="Inserir Titulo" id="titulo" type="text" class="validate">
                        <label for="titulo">Titulo do Site</label>
                    </div>

                    <!-- // DESCRIÇÃO // -->
                    <div class="input-field">
                        <i class="material-icons prefix tooltipped orange-text" data-position="top" data-delay="50" data-tooltip="
                           Descrição: texto curto para descrever o site. - É usado pelos buscadores para ajudar na busca.">description</i>
                        <textarea name="descricao" id="descricao" class="materialize-textarea" style="margin-bottom: 0"><?= $site->description ?></textarea>
                        <label for="descricao">Descrição do Site</label>
                    </div>
                </div>

                <!-- // URL // -->
                <div class="col s12 m6 l6">
                    <div class="input-field">
                        <i class="material-icons prefix tooltipped green-text" data-position="top" data-delay="50" data-tooltip="
                           URL: é o endereço do site na internet.
                           - Obs. inclua o http:// ou https:// antes e sem barra '/' no final do endereço.
                           Se esse campo ficar vazio o sistema tentará pegar a url automaticamente.
                           - IMPORTANTE: NÃO coloque nenhum valor diferente da URL DO SITE, se colocar ocorrerá um erro no carregamento.">http</i>

                        <input name="url" value="<?= $site->url ?>" id="url" type="text" class="validate">
                        <label for="url">URL Padrão do Site</label>
                    </div>

                    <div class="input-field">

                        <i class="material-icons prefix tooltipped red-text" data-position="top" data-delay="50" data-tooltip="
                           KEYWORDS: são usadas pelos robôs de busca para indexar e melhorar o resultados de busca.
                           - Obs.: separa-se as palavras ou frases apenas com virgula ou virgula e espaço.">local_offer</i>

                        <input name="tag" value="<?= $site->keywords ?>" placeholder="Inserir Titulo" id="tag" type="text" class="validate">
                        <label for="tag">Palavras Chave</label>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>

            <div class="card-action">
                <button title="Salvar" class="btn blue" type="submit"><i class="material-icons left">save</i> Salvar</button>
            </div>
        </div>
    </form>
</div>

<!-- // FAVICON // -->

<div class="col s12">
    <form action="<?= LinkSiteInfo ?>?update_favicon" name="form_favicon" method="post" enctype="multipart/form-data">

        <div class="card-panel">
	    <div class="card-title">
		<i class="material-icons orange-text md-16 tooltipped" data-position="bottom" data-delay="50" data-tooltip="
		   Apenas imagens .PNG ou .GIF e tamanho maximo de 128x128 pixels. 
		   - Obs.: Se quando a imagem for enviado não aparecer no navegador tente forçar a atualização com
		   [ Ctrl ] + [ Shift ] + [ R ], ou tente limpar o cache de navegação.">help</i>
		Favicon: <img width="16" height="16" src="<?= BaseHost ?><?= $site->favicon ?>?<?= time($siteinfo->favicon);?>" alt="Favicon">
	    </div>
	    <div class="col s12 m10 l6">
		<div class="file-field input-field">
		    <div class="btn orange">
			<span><i class="material-icons">image</i></span>
			<input name="favicon" title="Alterar" type="file">
		    </div>
		    <div class="file-path-wrapper">
			<input class="file-path validate" type="text">
		    </div>
                </div>
            </div>
	    <div class="col s12 m2 l6 center-align">
		<button title="Salvar" class="btn-large blue" type="submit">
		    <i class="material-icons">save</i></button>
            </div>

            <div class="clearfix"></div>
        </div>

    </form>
</div>