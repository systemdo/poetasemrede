<div class="box span10">
	<div class="control-group warning">
		<label class="control-label" for="Titulo">Titulo</label>
		<div class="controls">
			<input type="text" id="inputWarning" data-operacion="editar_video" value="<?php echo $items['video']->vi_titulo?>">
			<span class="help-inline" id="Warning" style="display:none">Hay que poner un titulo</span>
		</div>
	</div>
	<div class="control-group error">
		<label class="control-label" for="url">url</label>
		<div class="controls">
			<input type="text" id="url" value="<?php echo $items['video']->vi_url?>">
			<span class="help-inline" id="Error" style="display:none">Hay que poner una url</span>
		</div>
	</div>

	<div class="box span3" >
						<div class="box-content">
							<img src="http://img.youtube.com/vi/<?php echo $items['video']->vi_url?>/2.jpg" id="img_video"/>
						</div>
		<a class="btn btn-primary save" id='save_video' data-id="<?php echo $items['video']->id?>" data-url="<?php echo helper_build_url('videos/save')?>" href="#">Guardar</a>				
	</div><!--/span-->
	
	
</div>							  