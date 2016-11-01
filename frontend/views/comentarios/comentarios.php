<div class="row lista-comentarios">
    <?php
    if (!empty($comentarios)) {
        foreach ($comentarios as $key => $comentario) {
            ?>
            <div class="col-md-12">
                <div class="col-md-2">
                    <img width="10%" class="img img-circle" src="frontend/web/uploads/imgteste.jpg" >
                </div>

                <div class="col-md-8">
                    <span class="glyphicon glyphicon-option-vertical icon-header-poesia btn-comentarios"  aria-hidden="true" title="É Lindo o Poema?"></span>
                    <?php echo $comentario->comentario ?>  
                </div>
            </div>    
            <?php
        }
    }
    ?>
</div>