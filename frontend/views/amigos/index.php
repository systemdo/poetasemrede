<div class="col-md-12">
    <div class="row">
        <div class="col-md-7"></div>
        <div class="col-md-3">
            <button type="submit" title="Escrever uma nova Poesia" id="btn-escrever-relacionamento" class="btn btn-default btn-escrever-relacionamento">Estou Inspirado</button>
        </div>
    </div>    
</div>    
<?php 
    if(empty($relacionamentos)){?>
       <header class="jumbotron hero-spacer">
            <h3>Sem Inspiração nos últimos dias?</h3>
        </header>

<?php }else{
    foreach ($relacionamentos as $key => $relacionamento){
?>        
<div class="panel panel-default panel-relacionamento" id="panel-relacionamento">
    <div class="panel-heading panel-heading-relacionamento">
        <div class="col-md-9 ">
            <h3 class="titulo-relacionamento"><?php echo $relacionamento->titulo?></h3>
        </div>	
        <div class="icon-esquerda col-md-3">
            <span class="glyphicon glyphicon-pencil icon-header-relacionamento" aria-hidden="true" title="É Lindo o Poema?"></span>
            <span class="glyphicon glyphicon-sunglasses icon-header-relacionamento ver-relacionamento-completa" aria-hidden="true" title="Ver Texto Completo"></span>
            <span class="glyphicon glyphicon-share icon-header-relacionamento" aria-hidden="true" title="Quer enviar para alguém ou para voce?"></span>
        </div>		
    </div>
    <div class="panel-body">
        <?php echo $relacionamento->corpo?>
    </div>
    <div class="panel-footer">
        
        <span class="glyphicon glyphicon-edit icon-header-relacionamento btn-update-relacionamento" id="update"  data-id="<?php echo $relacionamento->id?>" aria-hidden="true" title="atualizar poema?"></span>
        <span class="glyphicon glyphicon-trash icon-header-relacionamento btn-delete-relacionamento" id="delete" data-id="<?php echo $relacionamento->id?>"aria-hidden="true" title="Excluir poema?"></span>
    </div>
</div>
<?php } }?>

<div class="modal fade modal-relacionamento-content" id="modal-relacionamento-content" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modal-titulo-relacionamento"></h4>
            </div>
            <div class="modal-body">
                
            </div>
<!--            <div class="modal-footer">
                <div class="col-md-9">
                </div>
                <div class="icon-esquerda col-md-3">
                    <span class="glyphicon glyphicon-pencil icon-header-relacionamento" aria-hidden="true" title="É Lindo o Poema?"></span>
                    <span class="glyphicon glyphicon-sunglasses icon-header-relacionamento" aria-hidden="true" title="Ver Texto Completo"></span>
                    <span class="glyphicon glyphicon-share icon-header-relacionamento" aria-hidden="true" title="Quer enviar para alguém ou para voce?"></span>
                </div>		
            </div>-->
        </div>
    </div>
</div>




