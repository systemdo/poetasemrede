<div class="box span10">
	<div class="control-group warning">
		<label class="control-label" for="Titulo">Titulo</label>
		<div class="controls">
			<input type="text" id="inputWarning" data-operation="editar_video" value="<?php echo $items['video']->vi_titulo?>">
			<span class="help-inline" id="Warning">Hay que poner un titulo</span>
		</div>
	</div>
	<div class="control-group error">
		<label class="control-label" for="url">url</label>
		<div class="controls">
			<input type="text" id="url" value="<?php php echo $items['video']->vi_url?>">
			<span class="help-inline" id="Error">Hay que poner una url</span>
		</div>
	</div>

	<div class="box span3" style="display:none">
						<div class="box-content" id="video">
						
						</div>
	</div><!--/span-->
	
	<a class="btn btn-primary save" id='save_video' data-id="<?php php echo $items['video']->id?>"" data-url="<?php echo helper_build_url('videos/save')?>" href="#">Guardar</a>
</div>							  