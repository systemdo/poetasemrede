<div class="col-md-12">
    <div class="row">
        <div class="col-md-7"></div>
        <div class="col-md-3">
            <button type="submit" title="Escrever uma nova Poesia" id="btn-escrever-poesia" class="btn btn-default btn-escrever-poesia">Estou Inspirado</button>
        </div>
    </div>    
</div>    
<?php 
    if(empty($poesias)){?>
       <header class="jumbotron hero-spacer">
            <h3>Sem Inspiração nos últimos dias?</h3>
        </header>

<?php }else{
    foreach ($poesias as $key => $poesia){
?>        
<div class="panel panel-default panel-poesia" id="panel-poesia">
    <div class="panel-heading panel-heading-poesia">
        <div class="col-md-9 ">
            <h3 class="titulo-poesia"><?php echo $poesia->titulo?></h3>
        </div>	
        <div class="icon-esquerda col-md-3">
            <?php 
            var_dump($poesia->idLikePoesia);
            if(empty($poesia->idLikePoesia)){ ?>
            <span class="glyphicon glyphicon-pencil icon-header-poesia btn-do-like" idpoesia="<?php echo $poesia->idPoesia?>" aria-hidden="true" title="É Lindo o Poema?"></span>
            <?php }else{ ?>
                <span class="glyphicon glyphicon-pencil icon-header-poesia btn-do-not-like" idlikepoesia="<?php echo $poesia->idLikePoesia?>" aria-hidden="true" title="É Lindo o Poema?"></span>
            <?php }?>        
            <span class="glyphicon glyphicon-sunglasses icon-header-poesia ver-poesia-completa" aria-hidden="true" title="Ver Texto Completo"></span>
            <span class="glyphicon glyphicon-share icon-header-poesia" aria-hidden="true" title="Quer enviar para alguém ou para voce?"></span>
        </div>		
    </div>
    <div class="panel-body">
        <?php echo $poesia->corpo?>
    </div>
    <div class="panel-footer">
        
        <span class="glyphicon glyphicon-edit icon-header-poesia btn-update-poesia" id="update"  data-id="<?php echo $poesia->id?>" aria-hidden="true" title="atualizar poema?"></span>
        <span class="glyphicon glyphicon-trash icon-header-poesia btn-delete-poesia" id="delete" data-id="<?php echo $poesia->id?>"aria-hidden="true" title="Excluir poema?"></span>
    </div>
</div>
<?php } }?>

<div class="modal fade modal-poesia-content" id="modal-poesia-content" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modal-titulo-poesia"></h4>
            </div>
            <div class="modal-body">
                
            </div>
<!--            <div class="modal-footer">
                <div class="col-md-9">
                </div>
                <div class="icon-esquerda col-md-3">
                    <span class="glyphicon glyphicon-pencil icon-header-poesia" aria-hidden="true" title="É Lindo o Poema?"></span>
                    <span class="glyphicon glyphicon-sunglasses icon-header-poesia" aria-hidden="true" title="Ver Texto Completo"></span>
                    <span class="glyphicon glyphicon-share icon-header-poesia" aria-hidden="true" title="Quer enviar para alguém ou para voce?"></span>
                </div>		
            </div>-->
        </div>
    </div>
</div>




