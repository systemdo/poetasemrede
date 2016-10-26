<div id="content" class="span10">
			<!-- content starts -->
			
			<div>
				<ul class="breadcrumb">
					<li>	
						<a href="<?php echo helper_build_url('fotos/new_year');?>" class="btn btn-inverse" data-rel="popover" data-content="Crear nuevo Año" title="Nuevo">Nuevo Año</a>
					</li>
				</ul>
			</div>
	<?php foreach($item['years'] as $years => $year)
	{
	 ?>
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-picture"></i><?php echo $year->ye_year;?></h2>
						<div class="box-icon">
							<!--<a href="<?php echo helper_build_url('fotos/new_event/'.$year->ye_id);?>" class="btn btn-setting btn-round"  data-id="<?php echo $year->ye_id;?>> <i class="icon-cog"></i></a>-->
							<a href="#" class="btn btn-setting btn-info new"  id="new_event" data-url="<?php echo helper_build_url('fotos/save_event');?>" data-id="<?php echo $year->ye_id;?>"> 
								Nuevo Evento
							</a>
							<a href="#" class="btn btn-minimize btn-success" data-uri="fotos/events_by_years" data-id="<?php echo $year->ye_id;?>">Eventos</a>
							<a href="#" class="btn btn-close btn-danger borrar_foto" data-url="<?php echo helper_build_url('fotos/delete_year');?>" data-id="<?php echo $year->ye_id;?>">Borrar</a>
						</div>
					</div>
					<div class="box-content" style="display: none;">
						
					</div>
				</div><!--/span-->
			
			</div><!--/row-->
    <?php 
		} 
    ?>
					<!-- content ends -->
			</div><!--/#content.span10-->
				</div><!--/fluid-row-->
