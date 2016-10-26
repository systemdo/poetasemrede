<div id="content" class="span10">
<div id="content" class="span12">
<div class="box-content">

	<?php if($item['imgs']){ ?>
	<ul class="thumbnails gallery">
	<?php 
		
		$x= 1;
	foreach($item['imgs'] as $imgs => $img)
	{	
	 ?>
						
	<li id="image-<?php echo $x?>" class="thumbnail">
		<a class="cboxElement">
			<img class="" src="<?php echo M_PATH_IMG.'galeria/thumbnail/'.$img->img_name;?>" alt="Sample Image 1">
		</a>
		<div class="well gallery-controls" style="margin-top:0">
			<p>
				<a href="#" data-url="<?php echo M_PATH_IMG.'galeria/'.$img->img_name;?>" class="gallery-edit btn ver_img">
					<i class="icon-edit"></i>
				</a> 
				<a href="#" data-url="<?php echo helper_build_url('fotos/delete_fotos');?>" data-id="<?php echo $img->img_id;?>" class="gallery-delete btn" ><i class="icon-remove"></i></a>
			</p>
		</div>
		
	</li>
					
    <?php 
		$x++;
		} 
    ?>
		</ul>
	<?php 
		}
	?>
</div>		<!-- content ends -->
			</div><!--/#content.span10-->
				</div><!--/fluid-row-->
	</div>
</div>
