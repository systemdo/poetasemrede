				<div class="box span8">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> Homes</h2>
						<div class="box-icon">
							<a class="btn btn-large btn-info btn-setting" href="<?php echo helper_build_url('dashboard/new_home') ?>">Nuevo Folder</a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Titulo</th>
								  <th>Estado En la Home</th>
								  <th>Actions</th>
								  <th>Activar en la Home</th>
								  <th>Estado en Eventos</th>
								  <th>Activar en Eventos</th>
							  </tr>
						  </thead>   
						  <tbody>
			<?php 
					//var_dump($item['home']['count']);
					if($item['home'] != false)
					{
						foreach($item['home'] as $homes => $home)
						{	
							if($homes['count'])
								break;
							
			?>	  				
							<tr>
								<td><?php echo $home->titulo ?></td>
								<td class="center">
									<?php if($home->status == 1)
									{ 
									?>	
										<span class="label label-success" id='la_act_home'>Activado</span>
									<?php }
											else{
									?>				
													<span class="label label-inverse" id='la_desact_home'>Desactivado</span>
									<?php 			
												}
									?>
								</td>
								<td class="center">
									<a href="<?php echo helper_build_url('dashboard/editar_home/'.$home->id) ?>" class="btn  btn-info editar_eventos editar" data-edit="<?php echo $home->id ?>">
										Editar                                            
									</a>
									<a href="#" class="btn 	btn-danger borrar_eventos borrar" data-borrar="<?php echo $home->id ?>"> 
										Borrar
									</a>
								</td>	
								<td>	
									<?php if($home->status == 0){ ?>
									<a href="#" class="btn  btn-success activar" data-activar="<?php echo $home->id ?>">
										Activar
									</a>
									<?php
									}else{
									?>
											<a href="#" class="btn  btn-inverse desactivar" data-desactivar="<?php echo $home->id ?>">
												Desactivar
											</a>
									
									<?php 
										}
									?>
									</td>
									<td class="center">
									<?php if($home->is_event == 1)
									{ 
									?>
										<span class="label label-success" id='la_act_event'>Activado</span>
									<?php }
											else{
									?>				
													<span class="label label-inverse" id="la_desact_event">Desactivado</span>
									<?php 			
												}
									?>
								</td>
									<td>		
									<?php if($home->is_event == 0){ ?>
									<a href="#" class="btn act_evento" data-activar="<?php echo $home->id ?>">
										Activar Evento
									</a>
									<?php
									}else{
									?>
											<a href="#" class="btn  btn-danger desac_evento" data-desactivar="<?php echo $home->id ?>">
												Desactivar Evento
											</a>
									
									<?php 
										}
									?>
								</td>
							</tr>
			<?php } ?>
						  </tbody>
					  </table>
					 
					<?php }else{ 
					?>				
					<?php } ?>				
					</div>
</div><!--/span-->
			
