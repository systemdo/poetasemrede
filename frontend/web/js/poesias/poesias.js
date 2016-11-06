poesias = {
    abrirGridComentarios: function () {
        $('.btn-comentarios').on('click', function () {
            var idPoesia = $(this).attr('idPoesia');
            $('#grid-comentar-' + idPoesia).show();
        });
    },
    verPoesiaCompleta: function () {
        $('.btn-ver-poesia-completa').on('click', function () {
            var idPoesia = $(this).attr('idPoesia');
            var titulo = $('#titulo-poesia-' + idPoesia).html();

            var corpo = $('#corpo-poesia-' + idPoesia).html();

            $("#modal-poesia-content #modal-titulo-poesia").html(titulo);
            $("#modal-poesia-content .modal-body").html(corpo);
            $("#modal-poesia-content").modal('show');
            $(".modal-header").css('text-align', 'center');

        });
    },
    verTodosComentarios: function () {
        $('.panel').on('click', '.ver-todos-comentarios', function (e) {
        //$('.ver-todos-comentarios').on('click', function (e) {
            e.preventDefault();
            
            var idPoesia = $(this).attr('idPoesia');
            $('#grid-comentarios-' + idPoesia).show();
            $(this).removeClass('ver-todos-comentarios');
            $(this).addClass('fechar-todos-comentarios');
            $(this).text('Fechar');
        });
    },
    fecharTodosComentarios: function () {
        
        $('.panel').on('click', '.fechar-todos-comentarios', function (e) {
    
            e.preventDefault();

            var idPoesia = $(this).attr('idPoesia');
            $('#grid-comentarios-' + idPoesia).hide();
            $(this).removeClass('fechar-todos-comentarios');
            $(this).addClass('ver-todos-comentarios');
             $(this).text('Ver todos');
        });
    }


}

$(document).ready(function () {
    poetas.abrirTelaEditor('btn-escrever-poesia', 'modal-poesia-content', 'poesias/htmlEditorPoesias');
    //poetas.ckEditor();

    $('.modal').on('click', '#enviar-poesia', function (e) {
        e.preventDefault();

        poetas.setCKEditorToAjaxTextarea();
        //console.debug($('#form-poesia').serialize());

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
        poetas.setCKEditorToAjaxTextarea();
        poetas.enviarFormulario('poesias/update/' + id, $('#form-poesia').serialize());
    });

    $('.btn-delete-poesia').on('click', function (e) {
        e.preventDefault();
        if (confirm("Deseja Jogar fora essa poesia")) {
            var id = $(this).attr('data-id');

            $.post('poesias/delete/' + id)
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

    poesias.abrirGridComentarios();
    poesias.verPoesiaCompleta();
    poesias.verTodosComentarios();
    poesias.fecharTodosComentarios();

});

/*Vida dura de Programador 
 
 Vida dura de Trabalhor 
 
 No qual seu amor 
 
 São os código que saem 
 
 Do seu computador*/