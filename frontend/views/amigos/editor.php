
    <form id="form-poesia" name="" action="" method="">    
        <div class="form-group">
            <label for="exampleInputEmail1">Titulo</label>
            <input  type="text" class="form-control" name="titulo" id="titulo" placeholder="Titulo" value="<?php echo !empty($poesia->titulo)?$poesia->titulo:''?>">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Corpo</label>
            <textarea  name="corpo" id="txtTexto"><?php echo !empty($poesia->corpo)? $poesia->corpo:''?></textarea>
        </div>
        <p align="center" >
            <?php if(!empty($poesia->id)) { ?>
            <button title="Atualizar Poesia" id="atualizar-poesia" data-id=<?php echo $poesia->id?> class="btn btn-default">Indo para o Forno</button>
            <?php }else{ ?>        
                <button title="Escrever uma nova Poesia" id="enviar-poesia" class="btn btn-default">Indo para o Forno</button>
            <?php } ?>
        <p>
    </form>    
