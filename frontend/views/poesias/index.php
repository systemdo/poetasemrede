
<?php $user = UserSystem::user(); 

//var_dump($poesias);
if (empty($poesias)) { ?>
    <header class="jumbotron hero-spacer">
        <h3>Sem Inspiração nos últimos dias!</h3>
    </header>

    <?php
} else {
    foreach ($poesias as $poesia) {
    ?>        
        <div class="panel panel-default panel-poesia" id="panel-poesia">
            <div class="panel-heading panel-heading-poesia"><!--header poesia-->
                <div class="col-md-9 ">
                    <h3 class="titulo-poesia"  id="titulo-poesia-<?php echo $poesia->getId() ?>"><?php echo $poesia->getTitulo() ?></h3>
                    
                </div>
                <div class="icon-esquerda col-md-3">
                    <?php
                    //se ja tem um like 
                    if (!$poesia->getLike()) {
                        ?>

                        <span class="glyphicon glyphicon-book icon-header-poesia btn-do-like" idpoesia="<?php echo $poesia->getId() ?>" aria-hidden="true" title="É Lindo o Poema?Essa Merece está em um Livro"></span>

                    <?php } else { ?>

                        <span class="glyphicon glyphicon-ok-sign icon-header-poesia btn-do-not-like" idpoesia="<?php echo $poesia->getId() ?>" idlikepoesia="<?php echo $poesia->getLike() ?>" aria-hidden="true" title="É Lindo o Poema?Essa Merece está em um Livro"></span>

                    <?php } ?>        
                    <span class="glyphicon glyphicon-sunglasses icon-header-poesia ver-poesia-completa btn-ver-poesia-completa" idPoesia="<?php echo $poesia->getId() ?>" aria-hidden="true" title="Ver Texto Completo"></span>
                    <span class="glyphicon glyphicon-share icon-header-poesia" aria-hidden="true" title="Quer enviar para alguém ou para voce?"></span>
                </div>		
            </div>
            <div class="panel-body" id="corpo-poesia-<?php echo $poesia->getId() ?>"><!--corpo poesia-->
                <?php echo $poesia->getCorpo() ?>
                <hr/>
                    <span class="glyphicon glyphicon-comment icon-header-poesia btn-comentarios" idPoesia="<?php echo $poesia->getId() ?>" aria-hidden="true" title="É Lindo o Poema?"></span>

                <?php if ($user->getId() == $poesia->getIdUsuario()) { ?>
                    <span class="glyphicon glyphicon-edit icon-header-poesia btn-update-poesia" id="update"  data-id="<?php echo $poesia->getId() ?>" aria-hidden="true" title="atualizar poema?"></span>
                    <!--<span class="glyphicon glyphicon-trash icon-header-poesia btn-delete-poesia" id="delete" data-id="<?php //echo $poesia->getId() ?>" aria-hidden="true" title="Excluir poema?"></span>-->
                <?php } ?>
                    <span class="quantidade-comentario" id="quantidade-comentario-<?php echo $poesia->getId() ?>"><?php echo $comentarios->obterQuantidadeComentariosPorPoesia($poesia->getId())->quantidade?> <a href="#" idPoesia="<?php echo $poesia->getId() ?>"></a></span>
                     <span class="quantidade-likes" id="quantidade-likes-<?php echo $poesia->getId() ?>"><?php echo $poesia->getCountLike() ?> pessoas gostaram</span>
            </div>
            <div class="panel-footer"><!-- footer poesia, botões de comentario, editar e deletar poesia-->
                <div class="col-md-12 grid-comentarios" id="grid-comentarios-<?php echo $poesia->getId() ?>">
                    <div class="row lista-comentarios">
                        
                        <?php
                        
                        $cs = $comentarios->obterComentariosPorPoesia($poesia->getId());
                        if (!empty($cs)) {
                            //retorna um html da vista
                            echo $this->getSliceViewHtml('comentarios/comentarios', array('comentarios' => $cs));
                        }
                        ?>
                      
                    </div>    
                </div>
                <!--textarea escondido para fazer comentários-->
                <div class="col-md-12 grid-comentar" id="grid-comentar-<?php echo $poesia->getId() ?>">
                    <textarea class="form-control txt_comentario" id="txt_comentario_<?php echo $poesia->getId() ?>"></textarea>
                    <p class="p-btn-enviar-comentarios">
                        <button class="btn btn-success btn-enviar-comentarios" idComentarioResposta="not" idPoesia="<?php echo $poesia->getId() ?>" >comentar</button>
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




