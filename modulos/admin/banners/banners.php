<h4 class="blue-text center">                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  Banners</h4>

<div class="card">
    <div class="card-title">
        <ul class="tabs normal">
            <li class="tab"><a class="blue-grey-text" href="#test1">256x256</a></li>
            <li class="tab"><a class="blue-grey-text" href="#test2">728x90</a></li>
            <li class="tab"><a class="blue-grey-text" href="#test3">960x180</a></li>
            <li class="tab"><a class="blue-grey-text" href="#test4">320x90</a></li>
            <li class="tab"><a class="blue-grey-text" href="#test5">320x180</a></li>
            <li class="tab"><a class="blue-grey-text" href="#test6">320x320</a></li>
        </ul>
    </div>


    <div class="input-field col s12 m6">
	<input id="last_name" name="nome" type="text" class="validate">
	<label for="last_name">Nome do Bloco</label>
    </div>
    <div class="card-content">

        <div id="test1">

	    <form action="?new_banner" method="post">

		<span class="flow-text">Enviar Banner</span>

		<div class="clearfix"></div>






		<div class="input-field col s12 m6">
		    <div class="file-field ">
			<div class="btn">
			    <span>Imagem</span>
			    <input type="file" name="img">
			</div>
			<div class="file-path-wrapper">
			    <input class="file-path validate" placeholder="Selecione" type="text">
			</div>

		    </div>
		</div>




		<div class="input-field col s12 m3">
		    <select name="tipo">
			<option value="" disabled selected>Selecione um tipo</option>
			<option value="img">Imagem (png, jpg, gif)</option>
			<option value="html">HTML5</option>
		    </select>
		    <label>Tipo do Banner</label>
		</div>


		<div class="input-field col s12 m2">
		    <button title="Enviar Banner" class="btn btn-large blue display-full" name="enviar" type="submit">
			<i class="material-icons left">send</i>Enviar Banner</button>
		</div>

	    </form>

	    <div class="clearfix"></div>
	    <hr>

	    <span class="flow-text">Todos os Banners</span>
        </div>

        <div id="test2">
            728x90
        </div>

        <div id="test3">
            960x180
        </div>

        <div id="test4">
            320x90
        </div>

        <div id="test5">
            320x180
        </div>

        <div id="test6">
            320x320
        </div>

    </div>
</div>