comentarios = {
    insertComent: function (idPoesia, comentario ,idComentarioResposta, obj) {
        $.ajax({
            url: 'comentarios/inserir',
            method: "POST",
            data: {idPoesia: idPoesia, comentario: comentario ,idComentarioResposta: idComentarioResposta},
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

                }

            }
        });
    },
    eventComent: function () {
        $('.btn-enviar-comentarios').on('click', function () {
            var idPoesia = $(this).attr('idPoesia');
            var txt_comentario = $('#txt_comentario_'+idPoesia).val();
            var idComentarioResposta =  $(this).attr('idComentarioResposta');
            comentarios.insertComent(idPoesia, txt_comentario ,idComentarioResposta ,$(this));
        });
    },
    eventUpdateComent: function () {
        $('.btn-do-like').on('click', function () {
            var idComentario = $(this).attr('idComentario');
            var txt_comentario = $('#txt_comentario_'+idPoesia).val();
            likes.insertLikes(idComentario, $(this));
        });
    },
    eventDeleteComent: function () {
        $('.btn-do-not-like').on('click', function () {
            var idComentario = $(this).attr('idComentario');
            comentarios.deleteComent(idComentario, $(this));
        });
    }
}


/*Vida dura de Programador 
 
 Vida dura de Trabalhor 
 
 No qual seu amor 
 
 São os código que saem 
 
 Do seu computador*/