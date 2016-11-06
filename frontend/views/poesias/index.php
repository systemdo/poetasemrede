<?php $user = UserSystem::user(); ?>
<?php if (empty($poesias)) { ?>
    <header class="jumbotron hero-spacer">
        <h3>Sem Inspiração nos últimos dias?</h3>
    </header>

    <?php
} else {
    foreach ($poesias as $key => $poesia) {
        ?>        
        <div class="panel panel-default panel-poesia" id="panel-poesia">
            <div class="panel-heading panel-heading-poesia"><!--header poesia-->
                <div class="col-md-9 ">
                    <h3 class="titulo-poesia" id="titulo-poesia-<?php echo $poesia->idPoesia ?>"><?php echo $poesia->titulo ?></h3>
                </div>	
                <div class="icon-esquerda col-md-3">
                    <?php
                    //se ja tem um like 
                    if (empty($poesia->idLikePoesia)) {
                        ?>

                        <span class="glyphicon glyphicon-pencil icon-header-poesia btn-do-like" idpoesia="<?php echo $poesia->idPoesia ?>" aria-hidden="true" title="É Lindo o Poema?"></span>

                    <?php } else { ?>

                        <span class="glyphicon glyphicon-pencil icon-header-poesia btn-do-not-like" idlikepoesia="<?php echo $poesia->idLikePoesia ?>" aria-hidden="true" title="É Lindo o Poema?"></span>

                    <?php } ?>        
                    <span class="glyphicon glyphicon-sunglasses icon-header-poesia ver-poesia-completa btn-ver-poesia-completa" idPoesia="<?php echo $poesia->idPoesia ?>" aria-hidden="true" title="Ver Texto Completo"></span>
                    <span class="glyphicon glyphicon-share icon-header-poesia" aria-hidden="true" title="Quer enviar para alguém ou para voce?"></span>
                </div>		
            </div>
            <div class="panel-body" id="corpo-poesia-<?php echo $poesia->idPoesia ?>"><!--corpo poesia-->
                <?php echo $poesia->corpo ?>
                <hr/>
                    <span class="glyphicon glyphicon-comment icon-header-poesia btn-comentarios" idPoesia="<?php echo $poesia->idPoesia ?>" aria-hidden="true" title="É Lindo o Poema?"></span>

                <?php if ($user->getId() == $poesia->idUsuario) { ?>
                    <span class="glyphicon glyphicon-edit icon-header-poesia btn-update-poesia" id="update"  data-id="<?php echo $poesia->idPoesia ?>" aria-hidden="true" title="atualizar poema?"></span>
                    <span class="glyphicon glyphicon-trash icon-header-poesia btn-delete-poesia" id="delete" data-id="<?php echo $poesia->idPoesia ?>" aria-hidden="true" title="Excluir poema?"></span>
                <?php } ?>
                     <span class="quantidade-comentario" id="quantidade-comentario-<?php echo $poesia->idPoesia ?>"><?php echo $comentarios->obterQuantidadeComentariosPorPoesia($poesia->idPoesia)->quantidade?> <a href="#" idPoesia="<?php echo $poesia->idPoesia ?>" id="link-ver-todos-comentarios-<?php echo $poesia->idPoesia ?>" class="ver-todos-comentarios" >Ver todos</a></span>
            </div>
            <div class="panel-footer"><!-- footer poesia, botões de comentario, editar e deletar poesia-->
                <div class="col-md-12 grid-comentarios" id="grid-comentarios-<?php echo $poesia->idPoesia ?>">
                    <div class="row lista-comentarios">
                        
                        <?php
                        
                        $cs = $comentarios->obterComentariosPorPoesia($poesia->idPoesia);
                        if (!empty($cs)) {
                            //retorna um html da vista
                            echo $this->getSliceViewHtml('comentarios/comentarios', array('comentarios' => $cs));
                        }
                        ?>
                      
                    </div>    
                </div>
                <!--textarea escondido para fazer comentários-->
                <div class="col-md-12 grid-comentar" id="grid-comentar-<?php echo $poesia->idPoesia ?>">
                    <textarea class="form-control txt_comentario" id="txt_comentario_<?php echo $poesia->idPoesia ?>"></textarea>
                    <p class="p-btn-enviar-comentarios">
                        <button class="btn btn-success btn-enviar-comentarios" idComentarioResposta="not" idPoesia="<?php echo $poesia->idPoesia ?>" >comentar</button>
                    </p>    
                </div>

                <!--<span class="glyphicon"></span>-->
                <!--<span class="clear-fix"></span>-->
                
            </div><!--footer poesia-->
        </div><!--panel poesia-->
        <?php
    }
}
?>




