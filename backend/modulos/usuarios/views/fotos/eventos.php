<div id="content" class="span12">
			<!-- content starts -->
		
	<?php 
	if($item['events'] == false)
	{
	?>
		<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
							
					<div class="box-content">
					
					</div>
				</div><!--/span-->
			
			</div><!--/row-->	
	<?php }else{ ?>

	
	<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Evento</th>
								  <th>Acciones</th>
								  <!--<th>Estado</th>
								  <th>Acción</th>-->
							  </tr>
						  </thead>   
						  <tbody>
	<?php 
	foreach($item['events'] as $events => $event)
	{
	 ?>
			<tr>
				<td><?php echo $event->ev_name;?></td>
					
						<td class="center">	
							<a href="<?php echo helper_build_url('fotos/new_fotos/'.$event->ev_id);?>">
								<button class="btn btn-info">Nueva Foto</button>
							</a>
						</td>	

						<td class="center">			
							  <a href="<?php echo helper_build_url('fotos/imgs_by_event/'.$event->ev_id);?>">
								<button class="btn btn-success">Ver Imagenes</button>
							  </a>
						</td>	  
						<td class="center">	  
							  <a href="#" class="borrar_foto" data-url="<?php echo helper_build_url('fotos/delete_event');?>" data-id="<?php echo $event->ev_id;?>">
								<button class="btn btn-danger">Borrar Eventos</button>	
							  </a>
						</td>
			</tr>				  
	<?php 
		} }
    ?>
				 </tbody>
					  </table>
			</div><!--/#content.span10-->
				</div><!--/fluid-row-->
