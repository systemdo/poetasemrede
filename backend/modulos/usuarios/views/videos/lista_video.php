<div class="box span10">
<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> Videos</h2>
						<div class="box-icon">
							<a class="btn btn-large btn-info btn-setting" href="<?php echo helper_build_url('videos/nuevo_video')?>">Nuevo Video</a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Titulo</th>
								  <th>Video</th> 
								  <th>Acciones</th>
							  </tr>
						  </thead>   
						  <tbody>
			<?php 
					if($item['videos'] != false)
					{
						foreach($item['videos'] as $videos => $video)
						{	
			?>	  				
							<tr>
								<td><?php echo $video->vi_titulo ?></td>
								
								<td class="center">
									<a href="<?php echo helper_build_url('videos/see_video/'.$video->id)?>" >
										<img src="http://img.youtube.com/vi/<?php echo $video->vi_url ?>/2.jpg" alt=""/>                                  
									</a>
								</td>
								<td class="center">
									<a href="<?php echo helper_build_url('videos/editar/'.$video->id)?>" class="btn  btn-info editar" data-edit="<?php echo $video->id ?>">
										Editar                                            
									</a>
									<a href="#" data-url = "<?php echo helper_build_url('videos/borrar')?>" data-operacion="borrar_video" class="btn btn-danger borrar" data-id="<?php echo $video->id ?>"> 
										Borrar
									</a>
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
</div>			

