$(document).ready(function () {
    poetas.abrirTelaEditor('btn-escrever-poesia', 'modal-poesia-content', 'poesias/htmlEditorPoesias');
    //poetas.ckEditor();

    $('.modal').on('click', '#enviar-poesia', function (e) {
        e.preventDefault();
        poetas.enviarFormulario('poesias/inserir', $('#form-poesia').serialize());
    });

    $('.btn-update-poesia').on('click', function (e) {
        e.preventDefault();
        var id = $(this).attr('data-id');
        poetas.abrirTelaModalComEditor('modal-poesia-content', 'poesias/htmlEditorPoesias/' + id);

    });

    $('.modal').on('click', '#atualizar-poesia', function (e) {
        e.preventDefault();
        var id = $(this).attr('data-id');
        poetas.enviarFormulario('poesias/update/' + id, $('#form-poesia').serialize());
    });

    $('.btn-delete-poesia').on('click', function (e) {
        e.preventDefault();
        if(confirm("Deseja Jogar fora essa poesia")){
             var id = $(this).attr('data-id');
           
            $.post('poesias/delete/'+id)
                   .done(function (dados) {
                        if (dados.resposta) {
                            alert(dados.mensagem);
                            location.reload();
                        } else {
                            alert(dados.mensagem);
                        }
                    });
        }        
    });


});

/*Vida dura de Programador 
 
 Vida dura de Trabalhor 
 
 No qual seu amor 
 
 São os código que saem 
 
 Do seu computador*/