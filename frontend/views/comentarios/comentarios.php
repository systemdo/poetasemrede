<div class="row lista-comentarios">
    
    <?php
    //print_r($comentarios);
    if (!empty($comentarios)) {
        foreach ($comentarios as $key => $comentario) {
            //print_r($comentario);
            ?>
            <div class="col-md-12">
                <div class="col-md-2">
                    <img width="10%" class="img img-circle" src="frontend/web/uploads/imgteste.jpg" >
                </div>

                <div class="col-md-8">
                    <?php echo $comentario->comentario ?>
                    <?php
                    //se ja tem um like 
                    if (empty($comentario->idLikeComentario)) {
                        ?>
                        <span class="glyphicon glyphicon-pencil icon-header-poesia btn-do-like-comentario" idComentario="<?php echo $comentario->id ?>" aria-hidden="true" title="É Lindo o Poema?"></span>
                    <?php } else { ?>
                        <span class="glyphicon glyphicon-pencil icon-header-poesia btn-do-not-like-comentario" idComentario="<?php echo $comentario->id ?>" aria-hidden="true" title="É Lindo o Poema?"></span>
                <?php } ?>  
                    <span class="glyphicon glyphicon-option-vertical icon-header-poesia btn-comentarios" idComentario="<?php echo $comentario->id?>" aria-hidden="true" title="É Lindo o Poema?"></span>

                </div>
            </div>    
            <?php
        }
    }
    ?>
</div>