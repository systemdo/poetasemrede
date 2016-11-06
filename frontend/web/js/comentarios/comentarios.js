comentarios = {
    insertComent: function (idPoesia, comentario, obj) {
        $.ajax({
            url: 'comentarios/inserir',
            method: "POST",
            data: {idPoesia: idPoesia, comentario: comentario },
            dataType: "json",
            success: function (data) {
                console.debug(data.resposta);
                if (data.resposta) {
                           ///alert(idPoesia);
                    comentarios.getHtmlComentarios(idPoesia, 'grid-comentarios-'+idPoesia);        
                }                    
            }
        });
    },
    getHtmlComentarios : function(idPoesia, lugar){
        console.debug(lugar);
        $.ajax({
            url: 'comentarios/htmlComentarios',
            method: "POST",
            data: {idPoesia: idPoesia},
            dataType: "html",
            success: function (data) {
                $('#'+lugar).html(data);
                $('#'+lugar).show();
                $('#link-ver-todos-comentarios-'+idPoesia).removeClass('ver-todos-comentarios');
                $('#link-ver-todos-comentarios-'+idPoesia).addClass('fechar-todos-comentarios');
                $('#link-ver-todos-comentarios-'+idPoesia).text('Fechar');
                var qtdComent = $('#quantidade-comentario-'+idPoesia).text();
               // alert(qtdComent);
                $('#quantidade-comentario-'+idPoesia).text( parseInt(qtdComent)+1);
                
                $('#txt_comentario_'+idPoesia).val('');
            }
        });
    },
    updateComent: function (idComentario, comentario ,obj) {
        $.ajax({
            url: 'comentarios/inserir',
            method: "POST",
            data: { idComentario: idComentario ,comentario:comentario},
            dataType: "json",
            success: function (data) {
                console.debug(data.resposta);
                if (data.resposta) {
                    obj.removeClass('btn-do-like');
                    obj.addClass('btn-do-not-like');
                }

            }
        });
    },
    deleteComent: function (idComentario, obj) {
        $.ajax({
            url: 'comentarios/delete',
            method: "POST",
            data: {idComentario: idComentario},
            dataType: "json",
            success: function (data) {
                console.debug(data.resposta);
                if (data.resposta) {
                    $('#media-comentario-'+idComentario).remove();
                }

            }
        });
    },
    eventComent: function () {
        $('.btn-enviar-comentarios').on('click', function () {
            var idPoesia = $(this).attr('idPoesia');
            var txt_comentario = $('#txt_comentario_'+idPoesia).val();
//            var idComentarioResposta =  $(this).attr('idComentarioResposta');
            comentarios.insertComent(idPoesia, txt_comentario  ,$(this));
        });
    },
    /*eventUpdateComent: function () {
        $('.btn-do-like').on('click', function () {
            var idComentario = $(this).attr('idComentario');
            var txt_comentario = $('#txt_comentario_'+idPoesia).val();
            likes.insertLikes(idComentario, $(this));
        });
    },*/
    eventDeleteComent: function () {
        $('.btn-delete-comentario').on('click', function () {
            var idComentario = $(this).attr('idComentario');
            if(confirm("Tem certeza que quer deletar o comentário?")){
                comentarios.deleteComent(idComentario, $(this));
            }
        });
    }
}


/*Vida dura de Programador 
 
 Vida dura de Trabalhor 
 
 No qual seu amor 
 
 São os código que saem 
 
 Do seu computador*/