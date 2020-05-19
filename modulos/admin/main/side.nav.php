<!-- MENU LATERAL FIXO -->
<div class="navbar-fixed hide-on-large-only">
    <nav class="blue">
        <h3 class="hide">Menu</h3>        
        <a title="Menu" href="#" data-activates="slide" class="button-collapse menu-admin brand-logo center"><i class="material-icons">menu</i></a>
    </nav>
</div>

<ul id="slide" class="side-nav fixed">

    <li>

        <div class="userView">

            <a title="Sair" href="<?= LinkAdmin ?>?logout" class="right">
                <i class="material-icons red-text">power_settings_new</i></a>

	    <?
	    $listar = listar("usuarios", "where id='" . $_SESSION['id'] . "'");
	    foreach ($listar as $user):endforeach;
	    ?>

            <a title="Mostrar Perfil" href="<?= BaseHost ?>admin/usuarios/perfil/">
		<? if ($user->foto == NULL): ?>
    		<i class="material-icons medium circle grey white-text">perm_identity</i>
		<? else: ?>
    		<img class="circle img-thumb z-depth-1 hoverable" src="<?= BaseHost . DirFoto . $user->foto ?>">
		<? endif; ?>
            </a>
            <a title="Mostrar Perfil" href="<?= BaseHost ?>admin/usuarios/perfil/"><span class="name"><?= $user->nickname ?></span></a>
            <span class="email"><?= $user->email ?></span>

        </div>
    </li>
    <li><div class="divider"></div></li>
    <!-- Accordion -->
    <li class="no-padding">

        <ul class="collapsible collapsible-accordion">

            <!-- Inicio -->
            <li>
                <a class="collapsible-header" href="<?= LinkAdmin ?>"><i class="material-icons">dashboard</i>Dashboard</a>
            </li>

            <!-- Usuarios -->
            <li>
                <a class="collapsible-header blue-text">
                    <i class="material-icons blue-text">person_pin</i>Usuarios
                    <i class="material-icons right">arrow_drop_down</i>
                </a>
                <div class="collapsible-body">
                    <ul>
			<? if ($user->nivel == '1' and $_SESSION['nivel'] == '1' and $_SESSION['nivel'] == $user->nivel): ?>
    			<li><a class="blue-text" href="<?= LinkUsuarios ?>"><i class="material-icons blue-text">people</i>Todos os Usuarios</a></li>
    			<li><a class="blue-text" href="<?= LinkUserNew ?>"><i class="material-icons blue-text">person_add</i>Cadastrar Usuario</a></li>
			<? endif; ?>
                        <li><a class="blue-text" href="<?= LinkPerfil ?>"><i class="material-icons blue-text">assignment_ind</i>Meu Perfil</a></li>
                        <li><div class="divider"></div></li>
                    </ul>
                </div>
            </li>

            <!-- Postagens -->
            <li>
                <a class="collapsible-header green-text">
                    <i class="material-icons green-text">folder</i>Postagens
                    <i class="material-icons right">arrow_drop_down</i>
                </a>
                <div class="collapsible-body">
                    <ul>
                        <li><a class="green-text" href="<?= LinkPostagens ?>">
                                <i class="material-icons green-text">library_books</i>Todos as Postagens</a></li>
                        <li><a class="green-text" href="<?= LinkPostNew ?>">
                                <i class="material-icons green-text">note_add</i>Nova Postagem</a></li>
                        <li><a class="green-text" href="<?= LinkPostRascunhos ?>">
                                <i class="material-icons green-text">note</i>Meus Rascunhos</a></li>
			<? if ($user->nivel == '1' and $_SESSION['nivel'] == '1' and $_SESSION['nivel'] == $user->nivel): ?>
    			<li><div class="divider"></div></li>
    			<li><a class="green-text" href="<?= LinkPostCategoria ?>">
    				<i class="material-icons green-text">book</i>Ger. Categoras</a></li>
			<? endif; ?>
                        <li><div class="divider"></div></li>
                    </ul>
                </div>
            </li>

	    <? if ($user->nivel == '1' and $_SESSION['nivel'] == '1' and $_SESSION['nivel'] == $user->nivel): ?>
    	    <!-- Paginas -->
    	    <li>
    		<a class="collapsible-header purple-text">
    		    <i class="material-icons purple-text">pages</i>Paginas
    		    <i class="material-icons right">arrow_drop_down</i>
    		</a>
    		<div class="collapsible-body">
    		    <ul>
    			<li><a class="purple-text" href="<?= LinkPaginas ?>">
    				<i class="material-icons purple-text">collections_bookmark</i>Todos as Paginas</a></li>
    			<li><a class="purple-text" href="<?= LinkPaginaNew ?>">
    				<i class="material-icons purple-text">library_add</i>Nova Pagina</a></li>
    			<li><div class="divider"></div></li>
    		    </ul>
    		</div>
    	    </li>

    	    <!-- Menu -->
		<? $colorName = 'red-text'; ?>
    	    <li>
    		<a class="collapsible-header <?= $colorName ?>">
    		    <i class="material-icons <?= $colorName ?>">menu</i>Menu
    		    <i class="material-icons right">arrow_drop_down</i>
    		</a>

    		<div class="collapsible-body">
    		    <ul>
    			<li>
    			    <a class="<?= $colorName ?>" href="<?= LinkMenu ?>">
    				<i class="material-icons <?= $colorName ?>">collections_bookmark</i>Itens do Menu</a>
    			</li>
    			<li>
    			    <a class="<?= $colorName ?>" href="<?= LinkMenuConfig ?>">
    				<i class="material-icons <?= $colorName ?>">settings</i>Opções do Menu</a>
    			</li>

    			<li><div class="divider"></div></li>
    		    </ul>
    		</div>

    	    </li>

	    <? endif; ?>

            <!-- Galerias -->
	    <? $colorName = 'indigo-text'; ?>
            <li>
                <a class="collapsible-header <?= $colorName ?>">
                    <i class="material-icons <?= $colorName ?>">image</i>Galerias
                    <i class="material-icons right">arrow_drop_down</i>
                </a>
                <div class="collapsible-body">
                    <ul>
                        <li><a class="<?= $colorName ?>" href="<?= LinkGalerias ?>">
                                <i class="material-icons <?= $colorName ?>">collections_bookmark</i>Listar Galerias</a></li>
                        <li><a class="<?= $colorName ?>" href="<?= LinkGaleriaNew ?>">
                                <i class="material-icons <?= $colorName ?>">library_add</i>Nova Galeria</a></li>
                        <li><div class="divider"></div></li>
                    </ul>
                </div>
            </li>

            <!-- Ferramentas -->
            <li>
                <a class="collapsible-header brown-text">
                    <i class="material-icons brown-text">dvr</i>Ferramentas
                    <i class="material-icons right">arrow_drop_down</i>
                </a>
                <div class="collapsible-body">
                    <ul>
                        <li><a class="brown-text" href="<?= LinkWidBlocos ?>"><i class="material-icons brown-text">view_quilt</i>Blocos</a></li>
                        <li><a class="brown-text" href="<?= LinkWidBanners ?>"><i class="material-icons brown-text">web</i>Banners</a></li>
                        <li><a class="brown-text" href="<?= LinkSlider ?>"><i class="material-icons brown-text">airplay</i>Slider</a></li>
                        <li><div class="divider"></div></li>
                    </ul>
                </div>
            </li>

	    <? if ($user->nivel == '1' and $_SESSION['nivel'] == '1' and $_SESSION['nivel'] == $user->nivel): ?>
                <!-- Config -->
                <li>
                    <a class="collapsible-header orange-text">
                        <i class="material-icons orange-text">settings</i>Configurações
                        <i class="material-icons right">arrow_drop_down</i>
                    </a>
                    <div class="collapsible-body">
                        <ul>
    			<li><a class="orange-text" href="<?= LinkSiteInfo ?>"><i class="material-icons orange-text">settings</i>Site Config</a></li>
    			<li><a class="orange-text" href="<?= LinkHeader ?>"><i class="material-icons orange-text">border_top</i>Cabeçalho</a></li>
    			<li><a class="orange-text" href="<?= LinkLayout ?>"><i class="material-icons orange-text">view_quilt</i>Layout</a></li>
    			<li><a class="orange-text" href="<?= LinkFooter ?>"><i class="material-icons orange-text">border_bottom</i>Rodapé</a></li>
    			<li><div class="divider"></div></li>
                        </ul>
                    </div>
                </li>
	    <? endif; ?>

        </ul>
    </li>

</ul>