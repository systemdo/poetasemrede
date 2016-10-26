<?php $this->setHeader('head2')?>
<style type="text/css">
label {
margin-left: 0px;

}
</style>
<div class="box span10" >
<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-edit"></i> Editar Informe</h2>
						</div>
					</div>
	<div class="box-content">
				
		<div class="control-group">
			<div class="controls" >
			  <label class="control-label" for="Titulo">Titulo </label>	
			  <input type="text" id="inputWarning" name="titulo_home" data-operacion="editar_informe" value="<?php echo $item['evento']->titulo?>">
			  <span class="help-inline" id="Warning" style="display:none">Hay que poner un Titulo</span>
			</div>
			<div class="controls" >
			 <label class="control-label" for="informe"><?php echo htmlentities('Información')?></label>
			  <div class="controls">
				<textarea style="width: 429px; height: 279px;" class="cleditor" id="informe" name="informe" value="" rows="6"><?php echo $item['evento']->informe;?></textarea>
			  </div>
			</div>
			<div class="controls">
				<img src="<?php echo M_PATH_IMG ?>home/thumbnail/<?php echo $item['evento']->img?>">
			  </div>
		</div>
		<div class="form-actions">
			<button type="button" data-url="<?php echo helper_build_url('dashboard/edit_home')?>" data-id="<?php echo $item['evento']->id?>" class="btn btn-primary save">Guardar</button>
		</div>	
			
			
	</div>
</div>
			
</div><!--/span-->
<script src="<?php echo M_PATH_JS?>jquery-1.7.2.min.js"></script>
<script src="<?php echo M_PATH_JS?>jquery-ui-1.8.21.custom.min.js"></script>
<script src="<?php echo M_PATH_JS?>jquerymeleva.js?=<?php echo rand();?>"></script>
<script type="text/javascript">

$(document).ready(function(){
	
$('#informe').cleditor();

});	
</script>

	<script src="<?php echo M_PATH_JS?>jquery.cleditor.js"></script>
	<script src="<?php echo M_PATH_JS?>jquery.cleditor.min.js"></script>
	
