<style type="text/css">
label {
margin-left: 0px;

}
.control-group 
{
margin-bottom: 9px;
margin-left: 12px;
}
.save {
margin: 22px;
margin-left: 3pc;
}
</style>
<div class="box span10">
	
	<div class="control-group warning">
		<label class="control-label" for="Titulo">Titulo</label>
		<div class="controls">
			<input type="text" id="inputWarning" data-operacion="new_video" value="">
			<span class="help-inline"  style="display:none" id="Warning">Hay que poner un titulo</span>
		</div>
	</div>
	<div class="control-group error">
		<label class="control-label" for="url">Url</label>
		<div class="controls">
			<input type="text" id="url" value="">
			<span class="help-inline"  style="display:none" id="Error">Hay que poner una url</span>
		</div>
	</div>

	<div class="box span3" style="display:none" id="video">
						<div class="box-content">
							<img src="" id="img_video" alt="" />
						</div>
	</div>					
	<a class="btn btn-primary save" id='new_video' data-url="<?php echo helper_build_url('videos/new_video')?>" href="#">Guardar</a>					
	
	</div><!--/span-->
					  
