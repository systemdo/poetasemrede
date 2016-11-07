<div class="col-md-10 col-sm-10">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#amigos" aria-controls="amigos" role="tab" data-toggle="tab">Amigos</a></li>
        <li role="presentation"><a href="#procurar" aria-controls="procurar" role="tab" data-toggle="tab">Procurar</a></li>
        <li role="presentation"><a href="#pendentes" aria-controls="pendentes" role="tab" data-toggle="tab">Pendentes</a></li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane fade in active" id="amigos">
            <div class=" col-md-12 col-sm-12 buscador">
                <div class="form-group">
                    <input type="text" id="txt-procurar-relacionamentos" class="form-control" placeholder="Procurar">
                </div>  
            </div>        
            <div class="col-md-12 col-sm-12 grid-amigos" id="grid-relacionamento">
                <?php $this->getSliceView('amigos/verAmigos', array('relacionamentos' => $relacionamentos)); ?>
            </div>       
        </div>
        <div role="tabpanel" class="tab-pane fade " id="procurar">
            <div class="col-md-12 col-sm-12 buscador buscador-novos-amigos">
                <div class="form-group">
                    <input type="text" id="txt-procurar-amigos" class="form-control" placeholder="Procurar">
                </div>  
            </div>        
            <div class="col-md-12 col-sm-12 grid-amigos grid-novos-amigos" id="grid-novos-amigos">
                <?php $this->getSliceView('amigos/verAmigos', array('relacionamentos' => $relacionamentos)); ?>
            </div>       
        </div>
        <div role="tabpanel" class="tab-pane fade" id="pendentes">
            <?php $this->getSliceView('amigos/verAmigos', array('relacionamentos' => $relacionamentos)); ?>
        </div>
    </div>
</div>