<?php 
if(!empty($mensagem)){
    if($mensagem['editar']['resultado']){ ?>
    <div class="alert alert-success" role="alert">Inserido com sucesso</div>
<?php }else{?>
    <div class="alert alert-danger" role="alert"><?php echo $mensagem['editar']['mensagem']?></div>
<?php
    }
}
?>
<form action="EditarUsuarios" method="post" name="cadastra_usuario" id="cadastrar_usuario">
    <input type="hidden" name="id" value="<?php echo $usuario->getId()?>">
    <div class="col-md-9 form-cadastro"> 
        <label for="exampleInputEmail1">Nome </label>
        <input type="text" class="form-control input-lg" maxlength="50" name="nome" id="nome" required="required" placeholder="Nome" value="<?php echo $usuario->getNome() ?>">
    </div>
    <div class="col-md-9 form-cadastro">
        <label for="exampleInputEmail1">Pseudonimo</label>
        <input type="text" class="form-control input-lg" maxlength="60" name="pseudonimo" required id="pseudonimo" placeholder="Pseudonimo" value="<?php echo $usuario->getPseudonimo() ?>">
    </div>
    <div class="col-md-9 form-cadastro">  	 
        <label for="exampleInputEmail1">Sobrenome</label>
        <input type="text" class="form-control input-lg" maxlength="300" name="sobrenome" required id="sobrenome" placeholder="Sobrenome" value="<?php echo $usuario->getSobrenome() ?>">
    </div>
    <div class="col-md-9 form-cadastro">      
        <!-- <label for="exampleInputEmail1">Principio de Sua existência</label> -->
        <div class="row">
            <div class="col-md-3">
                <label for="dia">Dia</label>    
                <select required name="nascimento-dia" id="dia" class="form-control input-lg">
                    <?php foreach(DateSystem::getArrayDays() as $day){?>
                    <option ><?php echo $day ?></option>
                    <?php } ?>
                </select>
            </div>
          
             <div class="col-md-3">
                <label for="exampleInputEmail1">Mês</label>    
                <select required name="nascimento-mes" id="" class="form-control input-lg">
                    <?php foreach(DateSystem::getArrayMonth() as $mes){?>
                    <option ><?php echo  ($mes< 10)? "0".$mes: $mes?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-md-3">
                <label for="exampleInputEmail1">Ano</label>    
                <select name="nascimento-ano" class="form-control input-lg">
                    <?php 
                    $years = range(1900,1998);
                    foreach($years as $year){?>
                        <option ><?php echo $year?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
    </div>
    <p align="center" class="col-md-9">      
        <button class="btn btn-primary btn-lg">Editar</button>
    </p>
    <!--<div class="col-md-6 form-cadastro">
        <label for="exampleInputFile">Coloque uma imagem que mais pareça com você</label>
        <input type="file" id="img-form">
        <p class="help-block"></p>
    </div>--> 
</form>
