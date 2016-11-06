<div class="lista-comentarios">

    <?php
    if (!empty($comentarios)) {
        foreach ($comentarios as $key => $comentario) {
           //print_r($comentario);
            ?>
            <div class="media" id="media-comentario-<?php echo $comentario->id ?>">
                <div class="media-left">
                    <a href="<?php echo SD::getAppUrl()?>/profile/<?php echo $comentario->idUsuario?>">
                        <img class="img img-circle img-amigo-comentario" src="<?php echo SD::getUrlUpload() ?>/imgteste.jpg" >
                    </a>
                </div>
                <div class="media-body">

                    <h6 class="media-heading nome-comentario"><?php echo $comentario->nomeUsuario.' '. $comentario->sobrenomeUsuario?> disse que:</h6>

                    <p class="box-btn-comentario-acoes"> 
                        <?php
                        //se ja tem um like 
                        if (empty($comentario->idLikeComentario)) {
                            ?>
                            <span class="glyphicon glyphicon-pencil icon-header-poesia btn-do-like-comentario" idComentario="<?php echo $comentario->id ?>" aria-hidden="true" title="É Lindo o Poema?"></span>
                        <?php } else { ?>
                            <span class="glyphicon glyphicon-pencil icon-header-poesia btn-do-not-like-comentario" idComentario="<?php echo $comentario->id ?>" aria-hidden="true" title="É Lindo o Poema?"></span>
                        <?php } ?>  
                        <span class="glyphicon glyphicon-trash icon-header-poesia btn-delete-comentario" idComentario="<?php echo $comentario->id ?>" aria-hidden="true" title="Excluir Comentário?"></span>
                    </p>    

                    
                    <?php echo $comentario->comentario ?>
                </div>
            </div>
            <?php
        }
    }
    ?>
</div>
