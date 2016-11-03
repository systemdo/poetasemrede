<div class="jumbotron">
  <div class="container">
    <img width="100%" class="img" src="<?php echo SD::getAppUrlPublicFiles()?>/uploads/imgteste.jpg" >
    <img style="position:absolute;top:75px;right: 43px;" width="20%" class="img img-circle" src="<?php echo SD::getAppUrlPublicFiles()?>/uploads/imgteste.jpg" >
  </div>
</div>
<style type="text/css">
    .panel-poesia{
        width: 100%;
        float:none;
        margin-left: 0px;
    }
</style>
<div class="col-md-12 ">
    <div class="col-md-6">
         <?php $this->getSliceView('poesias/index', array('poesias' => $poesias, 'comentarios' => $comentarios)); ?>
    </div>
    <div class="col-md-6">
        
        <?php
            if(!empty($relacionamentos)){
            foreach($relacionamentos as $rel => $amigo){?>
            <div class="col-md-3">
                <a href="<?php echo SD::getAppUrl() . '/profiles/'.$amigo->pseudonimo.'/'. $amigo->id?>">
                <div class="col-md-12">
                    <img width="100%" class="img" src="<?php echo SD::getAppUrlPublicFiles()?>/uploads/imgteste.jpg" >
                </div>
                <div class="col-md-12">
                    <?php echo $amigo->nome?>
                </div>
                </a>    
            </div>
            <?php } }else{?>
        <a href="<?php echo SD::getAppUrl() . '/amigos' ?>" class="btn btn-primary">Procurar Amigos</a>
            <?php } ?>
         
    </div>        
</div>
