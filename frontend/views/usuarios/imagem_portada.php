<?php 
if(!empty($mensagem)){
    if($mensagem['imagem']['resultado']){ ?>
    <div class="alert alert-success" role="alert">Inserido com sucesso</div>
<?php }else{?>
    <div class="alert alert-danger" role="alert"><?php echo $mensagem['imagem']['mensagem']?></div>
<?php
    }
}
?>
    
    <div class="col-md-12">
        <!--<img width="800" height="400" class="img-portada" src="<?php //echo UserSystem::getPathPortadaImageUser()?>" >-->
        <img width="800" height="400" class="" src="<?php echo UserSystem::getPathPortadaImageUser()?>" >
    </div> 
    <div class="col-md-8">
        <form action="inserirImagemPortada" enctype="multipart/form-data" method="post" name="imagem_usuario" id="form_imgem_perfil">
        <input type="hidden" name="id" value="<?php echo $usuario->getId()?>">
         <div class="col-md-6 form-cadastro">
            <label for="exampleInputFile">Coloque uma imagem que mais pareça com você</label>
            <input type="file" name="image_portada" id="img-form">
            <p class="help-block"></p>
        </div> 
        <p align="center" class="col-md-9">      
            <button class="btn btn-primary btn-lg">Inserir</button>
        </p>
       </form>
    </div>     
    
      
  
  
